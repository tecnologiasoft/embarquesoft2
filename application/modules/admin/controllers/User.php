<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller {

	private $view_folder = 'admin/user/';
	function __construct()
    {
        parent::__construct();
        
        $this->load->model('admin/user_model');
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

    /*List all users by ajax call*/
    function ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->user_model->get_datatables();
        $data = array();

        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->user_model->count_filtered(),'sort'=>'asc','field'=>'user_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
    }

    /*Load user profile details*/
    function edit()
    {
        if (!$this->uri->segment(4)) {
            redirect('admin/user/listing');
        }
        $user_id = base64_decode($this->uri->segment(4));

        $data['result'] = $this->user_model->get_user_data($user_id);
        $this->load->view($this->view_folder.'edit', $data);
    }

    /*Update user details*/
    function update()
    {
        $AllPostData = $this->input->post();
        $user_id = base64_decode($AllPostData['user_id']);

        $data = array();
        $user_data = $this->user_model->get_user_data($user_id);
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

        $data['result'] = $this->user_model->get_user_data($user_id);
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
        $this->user_model->user_state($ID,$state);
        
        echo json_encode();
    }
  
}
