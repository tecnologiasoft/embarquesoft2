<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lock extends CI_Controller {

	private $view_folder = 'admin/lock/';
	function __construct()
    {
        parent::__construct();
        //$this->load->model('common');
        $this->load->model('admin/login_model');
    }

    /*Load default view*/
	function index()
	{
        $this->session->set_userdata('admin_login', '0');                
        $this->load->view($this->view_folder.'lock_screen');
	}

    /*Check login session*/
    function check()
    {
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if($this->form_validation->run() == FALSE)
        {
            //Field validation failed.  User redirected to login page            
            $this->load->view($this->view_folder.'lock_screen');
        }
        else
        {
            $email = $this->session->userdata('admin_email');
            $password = $this->input->post('password');
            $result = $this->login_model->login($email, $password);

            if($result)
            {   
                $this->session->set_userdata('admin_login', '1');              
                redirect('admin/dashboard', 'refresh');
            }
            else
            {
                $this->session->set_flashdata('error_msg','Invalid Password');
                redirect('admin/lock/', '');
            }           
        }       
    }
    
    /*Unset existing session and re-login*/
    function login()
    {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_email');
        $this->session->unset_userdata('admin_role');  
        $this->session->unset_userdata('admin_login');  
        /*$this->session->sess_destroy();*/
        redirect('admin/login/', '');
    }

}
