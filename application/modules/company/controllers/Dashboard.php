<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MYcom_Controller
{
    private $view_folder = 'company/dashboard/';
    function __construct()
    {
        parent::__construct();
        
        /* Load models */
        $this->load->model('company/customer_model');
    }

    function index()
    {
        
        $data = array();
        $data['title'] = $this->lang->line('menu_dashboard');
        $data["user_count"] = $this->customer_model->customer_count();
        $this->loadView($this->view_folder.'test_view', $data);
    }

    function settings()
    {
        $this->load->library('form_validation');

        $AllPostData = $this->input->post();

        $data['result'] = $this->common->getSettingsdetails();
        
        if(isset($AllPostData['edit_settings']) && $AllPostData['edit_settings'] == 'update')
        { 
            $this->form_validation->set_rules('apply_days','apply days','required|numeric');
            
            if($this->form_validation->run())     
            { 
                $this->common->update_settings("apply_days", $AllPostData['apply_days']);
                

                $this->session->set_flashdata('succ_msg1', 'Settings updated successfully.');
                redirect('company/dashboard/settings');
            }
            else
                $this->load->view($this->view_folder.'settings', $data);
        }
        else
        {
            $this->load->view($this->view_folder.'settings', $data);
        }   
    }

    /* 
     * set timezone of browser
     */
    function set_timezone(){
        if(!empty($this->input->get('timezone'))){
            $this->session->set_userdata('web_timezone', $this->input->get('timezone'));
        }
        die(json_encode(array('code' => '1', 'message' => 'session_success')));
    }
    
}

