<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lock extends MYcom_Controller {

	private $view_folder = 'company/lock/';
    
	function __construct()
    {
        parent::__construct();
        $this->load->model('company/login_model');
        
        if(empty($this->session->userdata('company_id')))
        {
            redirect('company/login/', 'refresh');
        }             		
    }

	public function index()
	{
        $this->session->set_userdata('company_login', '0');                
        $this->load->view($this->view_folder.'lock_screen');
	}


    public function check()
    {
        //$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if($this->form_validation->run() == FALSE)
        {
            //Field validation failed.  User redirected to login page            
            $this->load->view($this->view_folder.'lock_screen');
        }
        else
        {
            $email = $this->session->userdata('company_email');
            $password = $this->input->post('password');
            $result = $this->login_model->login($email, $password);

            if($result)
            {   
                $this->session->set_userdata('company_login', '1');              
                redirect('company/dashboard', 'refresh');
            }
            else
            {
                $this->session->set_flashdata('error_msg','Invalid Password');
                redirect('company/lock/', '');
            }           
        }       
    }

    public function login()
    {
        $this->session->unset_userdata('company_id');
        $this->session->unset_userdata('company_name');
        $this->session->unset_userdata('company_profile_image');
        $this->session->unset_userdata('company_email');
        $this->session->unset_userdata('company_login');  
        $this->session->unset_userdata('company_database');   
        /*$this->session->sess_destroy();*/
        redirect('company/login/', '');
    }

}
