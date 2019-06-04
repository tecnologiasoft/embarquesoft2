<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Back_office extends MYcom_Controller {

	private $view_folder = 'company/back_office/';
	function __construct()
    {
        parent::__construct();

        
    }

    /*Default index call*/
	function index()
	{
        $this->load->view('company/under_development', $data);
	}
}
