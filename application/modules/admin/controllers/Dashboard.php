<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller
{
    private $view_folder = 'admin/dashboard/';
    function __construct()
    {
        parent::__construct();

        $this->load->model('admin/deshboard_model');
    }

    /*Load dashboard by default*/
    function index()
    {
        $data = array();
        
        /*$data['active_user'] = $this->deshboard_model->active_user();
        $data['inactive_user'] = $this->deshboard_model->inactive_user();

        $data['active_merchant'] = $this->deshboard_model->active_merchant();
        $data['inactive_merchant'] = $this->deshboard_model->inactive_merchant();
        $data['not_verify_merchant'] = $this->deshboard_model->not_verify_merchant();

        $start = date('Y-m-d', strtotime('Jan 01'));
        $end = date('Y-m-d', strtotime('Dec 31'));
        $i = 1;
        $month = strtotime($start);
        $months = array();
        while($i <= 12)
        {
            $months[] = date('F Y', strtotime(date('Y-'.$i)));
            $data['month_vise_user'][] = $this->deshboard_model->month_vise_user(date('Y-m-d', $month), date("Y-m-t", $month));

            $data['month_vise_merchant'][] = $this->deshboard_model->month_vise_merchant(date('Y-m-d', $month), date("Y-m-t", $month));    
            $month = strtotime('+1 month', $month);
            $i++;
        }
        $data['months'] = $months;*/
        //echo "<pre>";print_r($data);die;
        $this->load->view($this->view_folder.'dashboard', $data);
    }

    /*Change general setting*/
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
                redirect('admin/dashboard/settings');
            }
            else
                $this->load->view($this->view_folder.'settings', $data);
        }
        else
        {
            $this->load->view($this->view_folder.'settings', $data);
        }   
        
    }
    
}

