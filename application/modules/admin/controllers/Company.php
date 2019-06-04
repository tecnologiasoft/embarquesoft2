<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Company extends MY_Controller {

	private $view_folder = 'admin/company/';
	function __construct()
    {
        parent::__construct();
        
        $this->load->model('admin/company_model');
    }

    /*Default index call*/
	function index()
	{
		$this->listing();
	}

    /*Listing all users*/
	function listing()
    {
        $data = array();
        
        $this->load->view($this->view_folder.'listing', $data);
    }

    /*List all Company by ajax call*/
    function ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->company_model->get_datatables();
        $data = array();

        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->company_model->count_filtered(),'sort'=>'asc','field'=>'company_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
    }

    function add(){

        //$this->company_model->create_database('100');
        $this->load->view($this->view_folder.'add', $data);
    }

    /*Add new Company*/
    function save()
    {
        $AllPostData = $this->input->post();
        $data = array();

        $this->form_validation->set_rules('name',$this->lang->line('field_name'),'required|trim');
        $this->form_validation->set_rules('address',$this->lang->line('field_address'),'required|trim');
        $this->form_validation->set_rules('city',$this->lang->line('field_city'),'required|trim');
        $this->form_validation->set_rules('state',$this->lang->line('field_state'),'required|trim');
        $this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'required|trim');
        $this->form_validation->set_rules('tele_country_code',$this->lang->line('field_tele_country_code'),'required|trim');
        $this->form_validation->set_rules('telephone_number',$this->lang->line('field_telephone_number'),'required|trim');
        $this->form_validation->set_rules('fax_number',$this->lang->line('field_fax_number'),'required|trim');
        $this->form_validation->set_rules('email', $this->lang->line('field_email'), 'required|trim|valid_email|is_unique[tbl_company.email]', array('is_unique' => $this->lang->line('user_email')));
        $this->form_validation->set_rules('password',$this->lang->line('field_password'),'required|trim');
        $this->form_validation->set_rules('website',$this->lang->line('field_website'),'required|trim');
        //$this->form_validation->set_rules('invoice_type',$this->lang->line('field_invoice_type'),'required|trim');
        $this->form_validation->set_rules('exchange_rate',$this->lang->line('field_exchange_rate'),'trim|required');
        $this->form_validation->set_rules('company_call',$this->lang->line('field_company_call'),'trim|required');
        $this->form_validation->set_rules('call_out',$this->lang->line('field_call_out'),'trim|required');
        $this->form_validation->set_rules('company_void',$this->lang->line('field_company_void'),'trim|required');
        $this->form_validation->set_rules('invoice_number',$this->lang->line('field_invoice_number'),'trim|required');
        $this->form_validation->set_rules('receipt_number',$this->lang->line('field_receipt_number'),'trim|required');
        $this->form_validation->set_rules('barcode_number',$this->lang->line('field_barcode_number'),'trim|required');
        $this->form_validation->set_rules('zone_validation',$this->lang->line('field_zone_validation'),'trim|required');

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view($this->view_folder.'add', $data);
        } 
        else 
        {
            
            if (!empty($_FILES['logo']) && $_FILES['logo']['size'] > 0) 
            {   
                $logo_image = $this->common->image_upload($field = 'logo',$path = './'.COMPANY_IMAGE);
                if (!$logo_image) 
                {
                    $this->session->set_flashdata('err_msg1', $this->upload->display_errors('', ''));
                    $this->load->view($this->view_folder.'add', $data); return;
                }
            }else{
                $this->session->set_flashdata('err_msg1','Please provide logo');
                $this->load->view($this->view_folder.'add', $data); return;
            }
            
            $params = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->common->AES_encrypt($this->input->post('password')),
                'website' => $this->input->post('website'),
                'logo' => $logo_image,
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zipcode' => $this->input->post('zipcode'),
                'tele_country_code' => $this->input->post('tele_country_code'), 
                'telephone_number' => $this->input->post('telephone_number'),
                'fax_number' => $this->input->post('fax_number'),
                'exchange_rate' => $this->input->post('exchange_rate'),
                'company_call' => $this->input->post('company_call'),
                'call_out' => $this->input->post('call_out'),
                'company_void' => $this->input->post('company_void'),
                'invoice_number' => $this->input->post('invoice_number'),
                'receipt_number' => $this->input->post('receipt_number'),
                'barcode_number' => $this->input->post('barcode_number'),
                'zone_validation' => $this->input->post('zone_validation'),
            );

            $id = $this->company_model->add_company($params);

            if(isset($id) && $id != ''){
                /* create database of company */
                $new_databasename = $this->company_model->create_database($id);

                /* Update database name in company table */
                $this->company_model->update_company($id, array('database_name'=>$new_databasename));
            }
            $this->session->set_flashdata('succ_msg1', 'Company details added sucessfully');
            redirect('admin/company/listing/');
        }
    }

    /*Load user profile details*/
    function edit()
    {
        if (!$this->uri->segment(4)) {
            redirect('admin/user/listing');
        }
        $user_id = base64_decode($this->uri->segment(4));

        $data['result'] = $this->company_model->get_user_data($user_id);
        $this->load->view($this->view_folder.'edit', $data);
    }

    /*Update user details*/
    function update()
    {
        $AllPostData = $this->input->post();
        $user_id = base64_decode($AllPostData['user_id']);

        $data = array();
        $user_data = $this->company_model->get_user_data($user_id);
        if(empty($user_data))
            redirect('admin/user/listing');

        $this->form_validation->set_rules('fname',$this->lang->line('field_first_name'),'required|trim');
        $this->form_validation->set_rules('lname',$this->lang->line('field_last_name'),'required|trim'); 
        $this->form_validation->set_rules('email', $this->lang->line('field_email'), 'required|trim|valid_email',
                        array('is_unique' => $this->lang->line('user_email')));
        if(!empty($AllPostData['password']) && !empty($AllPostData['confirmpassword']))
        {   $this->form_validation->set_rules('password', 'Password', 'min_length[3]');
            $this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'min_length[3]|matches[password]');
        }
        $this->form_validation->set_rules('country_code',$this->lang->line('field_country_code'),'trim');
        $this->form_validation->set_rules('phone_number',$this->lang->line('field_phone_number'),'trim');
        $this->form_validation->set_rules('dob',$this->lang->line('field_birthdate'),'trim');
        $this->form_validation->set_rules('gender',$this->lang->line('field_gender'),'trim|in_list[male,female]');

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view($this->view_folder.'edit', $data);
        } 
        else 
        {
            $params = array(
                'fname'  => $this->input->post('fname'),
                'lname'   => $this->input->post('lname'),
                'country_code' => $this->input->post('country_code'),
                'phone' => $this->input->post('phone'),
                'dob' => $this->input->post('dob'),
                'gender' => $this->input->post('gender'),
                'email' => $this->input->post('email'),
            );

            if (!empty($_FILES['profile_image']) && $_FILES['profile_image']['size'] > 0) 
            {
                $params['profile_image'] = $this->common->image_upload($field = 'profile_image',$path = './'.USER_IMAGE);
                if (!$params['profile_image']) 
                {
                    $this->session->set_flashdata('err_msg1', $this->upload->display_errors('', ''));
                    $this->load->view($this->view_folder.'edit', $data);
                    return;
                }
                else
                {
                    if(basename($user_data['profile_image']) != 'default-user.png') 
                    {
                        @unlink("./".USER_IMAGE.basename($user_data['profile_image']));
                        @unlink("./".USER_IMAGE_THUMB.basename($user_data['profile_image']));
                    }
                }
            }

            if(!empty($AllPostData['password']) && !empty($AllPostData['confirmpassword']))
            {
                $params['password'] = $this->common->AES_encrypt(($this->input->post('password')));
            }

            // Update user details 
            $this->db->where('id', $user_id);
            $this->db->update('tbl_user', $params);

            $this->session->set_flashdata('succ_msg1', 'User profile updated sucessfully');
            redirect('admin/user/edit/'.base64_encode($user_id));
        }
    }

    /*View user profile*/
    function view()
    {
        if (!$this->uri->segment(4)) 
        {
            redirect('admin/user/listing');
        }
        $data = array();
        $user_id = base64_decode($this->uri->segment(4));

        $data['result'] = $this->company_model->get_user_data($user_id);
        $this->load->view($this->view_folder.'view', $data);
    }

    /*Change user status*/
    function user_state()
    {   
        if (!$this->uri->segment(4) && !$this->uri->segment(5)) {
            echo json_encode();
        }
        $ID = $this->uri->segment(4);
        $state = $this->uri->segment(5);
        $this->company_model->user_state($ID,$state);
        
        echo json_encode();
    }
  
}
