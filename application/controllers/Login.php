<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Login
 * This controller handel all kind of login user from common user table
 *
 */
class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->controller = 'login';
        $this->url = SITE_URL . $this->controller;
        $this->load->model($this->controller . '_model', 'this_model');
    }

    /**
     * setRules()
     * This method check server side validation
     */
    public function setRules()
    {
        $this->rules[] = [

            "field" => "txtUsername",
            "label" => "txtUsername",
            "rules" => "trim|xss_clean|required|valid_email",
            "errors" => [
                'required' => "please enter email address",
                'valid_email' => "please enter a valid email address",
            ],
        ]
        ;

        $this->rules[] = [

            "field" => "pwdPassword",
            "label" => "pwdPassword",
            "rules" => "trim|xss_clean|required|min_length[6]",
            "errors" => [
                'required' => "Please enter password",
                'min_length' => "password length must be greater then 6",
            ],
        ];
    }

    /**
     * index
     * landing page open login page.
     */
    public function company()
    {
        
        if ($this->id) {
            redirect(site_url('company/customer'));
        }

        $data['controllerName'] = $this->controller;
        $data['heading'] = null;
        $data['js'] = [
            'parsley.min',
            'login',
        ];
        $data['init'] = [
            'user.init()',
        ];
        $data['formAction'] = SITE_URL . 'company/login/signin';
        $data['title'] = APP_NAME;
        $data['type'] = COMPANY;

        $this->loadView($this->controller . '/login_view', $data);

    }


 
    public function logout()
    {

        $this->session->unset_userdata('userdata');
        redirect(SITE_URL);
    }

    public function errorHandler()
    {

        echo 232323;
        die;
        die;
    }
}
