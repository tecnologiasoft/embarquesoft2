<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends MYcom_Controller {

	private $view_folder = 'company/reports/';
	function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('company_id'))
        {
            redirect('company/login/', 'refresh');
        }
        
        if ($this->session->userdata('admin_login') == '0') 
        {
            redirect('company/lock', 'refresh');
        }
    }

    /*Default index call*/
	function index()
	{
        $this->load->view('company/under_development', $data);
	}
}
