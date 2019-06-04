<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MYcom_Controller extends MY_Controller {
    public $company_db;
    public $MSSQL;

    function __construct() {
        
        parent::__construct();
        

        //get site related setting details
        // $this->site_name = $this->common->getSettingsValue('project_name');
        // $this->header_logo = $this->common->getSettingsValue('header_logo');
        // $this->fav_icon = $this->common->getSettingsValue('fav_icon');
        // $this->from_email = $this->common->getSettingsValue('from_email');
        // $this->fogot_password_limit = $this->common->getSettingsValue('fogot_password_limit');

        /*if(!$this->session->userdata('company_id'))
        {
            redirect('company/login/', 'refresh');
        }

        if ($this->session->userdata('company_id') == '') 
        {
            redirect('company/login/signin', 'refresh');
        }

        if ($this->session->userdata('company_login') == '0') 
        {
            redirect('company/lock', 'refresh');
        }*/

        // $siteLang = $this->session->userdata('site_lang');
        // $this->data['site_lang']=$language = ($siteLang != "") ? $siteLang : "english";
        // $this->config->set_item('language', $language);
        // $this->lang->load('rest_controller',$language);
        // $this->session->set_userdata('site_lang', $language);

        /* Load Database */
        
        if(!empty($this->database)){
            $this->MSSQL =  $db['company_db'] = array(
                'dsn'   => '',
                'hostname' => 'localhost',
                'username' => 'root', 
                'password' => '', 
                'database' => 'embarquesoft_embarquesoft',  // embarquesoft
                'dbdriver' => 'mysqli',
                'dbprefix' => '',
                'pconnect' => FALSE,
                'db_debug' => (ENVIRONMENT !== 'production'),
                'cache_on' => FALSE,
                'cachedir' => '',
                'char_set' => 'utf8',
                'dbcollat' => 'utf8_general_ci',
                'swap_pre' => '',
                'encrypt' => FALSE,
                'compress' => FALSE,
                'stricton' => FALSE,
                'failover' => array(),
                'save_queries' => TRUE
            );
            $this->company_db = $this->load->database($this->MSSQL, TRUE);
            
        }

         /*produccion*/
        /*if(!empty($this->database)){
            $this->MSSQL =  $db['company_db'] = array(
                'dsn'   => '',
                'hostname' => 'localhost',
                'username' => 'embarquesoft_demo', 
                'password' => 'R94kyRPqRs!0', 
                'database' => 'embarquesoft_embarquesoft',  // embarquesoft
                'dbdriver' => 'mysqli',
                'dbprefix' => '',
                'pconnect' => FALSE,
                'db_debug' => (ENVIRONMENT !== 'production'),
                'cache_on' => FALSE,
                'cachedir' => '',
                'char_set' => 'utf8',
                'dbcollat' => 'utf8_general_ci',
                'swap_pre' => '',
                'encrypt' => FALSE,
                'compress' => FALSE,
                'stricton' => FALSE,
                'failover' => array(),
                'save_queries' => TRUE
            );
            $this->company_db = $this->load->database($this->MSSQL, TRUE);
            
        }*/

        
    }

    function datetime() {
        return date('Y-m-d H:i:s');
    }

    function send_email($template_name,$subject,$user_data)
    {
        $currentdatetime = date('YmdHis');

        $this->load->library('email');

        $this->email->from($this->from_email, $this->site_name);

        $this->email->to($user_data['email']);

        $this->email->subject($this->site_name.' - '.$subject);

        $message = $this->load->view('email_template/'.$template_name,$user_data,TRUE);

        //echo $message;

        $this->email->message($message);

        /*print_r($message);
        die();*/

        $this->email->set_header('MIME-Version', '1.0');
        /*$this->email->set_header('Content-type', 'text/html; charset=UTF-8');*/
        $this->email->set_header('X-Priority', '1');

        //echo $this->email->send(); die;

        $this->email->send();
        return;
    }

    
}
