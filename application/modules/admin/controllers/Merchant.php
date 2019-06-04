<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchant extends MY_Controller {

	private $view_folder = 'admin/merchant/';
	function __construct()
    {
        parent::__construct();
        
        $this->load->model('admin/merchant_model');
    }

    /*Load default*/
	function index()
	{
		$this->listing();
	}

    /*Merchant listing*/
	function listing()
    {
        $data = array();
        
        $this->load->view($this->view_folder.'listing', $data);
    }

    /*Ajax listing*/
    function ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->merchant_model->get_datatables();
        $data = array();

        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->merchant_model->count_filtered(),'sort'=>'asc','field'=>'user_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
    }

    /*Add new merchant*/
    function add()
    {
        $AllPostData = $this->input->post();
        $data = array();

        $this->form_validation->set_rules('fname',$this->lang->line('field_first_name'),'required|trim');
        $this->form_validation->set_rules('lname',$this->lang->line('field_last_name'),'required|trim');
        $this->form_validation->set_rules('email', $this->lang->line('field_email'), 'required|trim|valid_email|is_unique[tbl_merchant.email]', array('is_unique' => $this->lang->line('user_email')));
        $this->form_validation->set_rules('password', 'Password', 'min_length[3]');
        $this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'min_length[3]|matches[password]');
        $this->form_validation->set_rules('password', $this->lang->line('field_password'), 'required|trim');
        $this->form_validation->set_rules('country_code',$this->lang->line('field_country_code'),'trim|required');
        $this->form_validation->set_rules('phone',$this->lang->line('field_phone_number'),'trim|required');

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view($this->view_folder.'add', $data);
        } 
        else 
        {
            $profile_image = 'default-user.png';
            if (!empty($_FILES['profile_image']) && $_FILES['profile_image']['size'] > 0) 
            {   
                $profile_image = $this->common->image_upload($field = 'profile_image',$path = './'.MERCHANT_IMAGE);
                if (!$profile_image) 
                {
                    $this->session->set_flashdata('err_msg1', $this->upload->display_errors('', ''));
                    $this->load->view($this->view_folder.'add', $data); return;
                }
            }
            
            $params = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'password' => $this->common->AES_encrypt($this->input->post('password')),
                'country_code' => $this->input->post('country_code'),
                'phone' => $this->input->post('phone'),
                'profile_image' => $profile_image,
                'login' => 'Offline',
                'is_verified' => 'Unverified',
                'status' => 'Pending',
            );
            /*Send activation mail*/
            //$this->common->merchant_signup_mail($params);die;
            // Add Merchant Details 
            $this->db->insert('tbl_merchant', $params);
            $this->session->set_flashdata('succ_msg1', 'Merchant details added sucessfully');
            redirect('admin/merchant/listing/');
        }
    }

    /*Edit merchant details*/
    function edit()
    {
        $AllPostData = $this->input->post();
        
        if(!empty($AllPostData))
        {
            $merchant_id = base64_decode($AllPostData['merchant_id']);
            $merchant_data = $this->merchant_model->get_merchant_data($merchant_id);

            $this->form_validation->set_rules('fname',$this->lang->line('field_first_name'),'required|trim');
            $this->form_validation->set_rules('lname',$this->lang->line('field_last_name'),'required|trim');
            if(!empty($merchant_data['email']) && !empty($AllPostData['email']) && $AllPostData['email'] != $merchant_data['email'])
                $this->form_validation->set_rules('email', $this->lang->line('field_email'), 'is_unique[tbl_merchant.email]',
                            array('is_unique' => $this->lang->line('user_email')));
            $this->form_validation->set_rules('country_code',$this->lang->line('field_country_code'),'trim|required');
            $this->form_validation->set_rules('phone',$this->lang->line('field_phone_number'),'trim|required');
            if(!empty($AllPostData['password']) && !empty($AllPostData['confirmpassword']))
            {   $this->form_validation->set_rules('password', 'Password', 'min_length[3]');
                $this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'min_length[3]|matches[password]');
            }
            $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view($this->view_folder.'edit', $data);
            } 
            else 
            {
                $params = array(
                    'fname' => $this->input->post('fname'),
                    'lname' => $this->input->post('lname'),
                    'email' => $this->input->post('email'),
                    'country_code' => $this->input->post('country_code'),
                    'phone' => $this->input->post('phone'),
                );

                if(!empty($AllPostData['password']) && !empty($AllPostData['confirmpassword']))
                {
                    $params['password'] = $this->common->AES_encrypt(($this->input->post('password')));
                }

                if (!empty($_FILES['profile_image']) && $_FILES['profile_image']['size'] > 0) 
                {
                    $params['profile_image'] = $this->common->image_upload($field = 'profile_image',$path = './'.MERCHANT_IMAGE);
                    
                    if (!$params['profile_image']) 
                    {
                        $this->session->set_flashdata('err_msg1', $this->upload->display_errors('', ''));
                        $this->load->view($this->view_folder.'edit', $data);
                        return;
                    }
                    else
                    {
                        if (basename($merchant_data['profile_image']) != 'default-user.png') 
                        {
                            @unlink("./".MERCHANT_IMAGE.basename($merchant_data['profile_image']));
                            @unlink("./".MERCHANT_IMAGE_THUMB.basename($merchant_data['profile_image']));
                        }
                    }
                }

                // Update Personal Details 
                $this->db->where('id', $merchant_id);
                $this->db->update('tbl_merchant', $params);

                $this->session->set_flashdata('succ_msg1', 'Merchant profile updated sucessfully');
                redirect('admin/merchant/edit/'.base64_encode($merchant_id));
            }
        }
        else
        {
            if(!$this->uri->segment(4)) 
            {
                redirect('admin/merchant/listing');
            }
            $data['result'] = $this->merchant_model->get_merchant_data(base64_decode($this->uri->segment(4)));
            $this->load->view($this->view_folder.'edit', $data);
        }
    }

    /*View merchant details*/
    function view()
    {
        if (!$this->uri->segment(4)) 
        {
            redirect('admin/merchant/listing');
        }
        $user_id = base64_decode($this->uri->segment(4));

        $data = array();
        $data['result'] = $this->merchant_model->get_merchant_data($user_id);
        
        $this->load->view($this->view_folder.'view', $data);
    }

    /*Change merchant status*/
    function merchant_state()
    {   
        if (!$this->uri->segment(4) && !$this->uri->segment(5)) {
            echo json_encode();
        }
        $ID = $this->uri->segment(4);
        $state = $this->uri->segment(5);
        $this->merchant_model->merchant_state($ID,$state);
        
        echo json_encode();
    }
  
}
