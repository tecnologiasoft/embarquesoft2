<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	private $view_folder = 'admin/login/';
	function __construct()
    {
        parent::__construct();

        //get site related setting details
        $this->site_name = $this->common->getSettingsValue('project_name');
        $this->header_logo = $this->common->getSettingsValue('header_logo');
        $this->fav_icon = $this->common->getSettingsValue('fav_icon');
        $this->from_email = $this->common->getSettingsValue('from_email');
        $this->fogot_password_limit = $this->common->getSettingsValue('fogot_password_limit');
        
        /* Load Model */
        $this->load->model('admin/login_model');
        
    }

    /*Load default dashboard*/
	function index()
	{
        if($this->session->userdata('admin_id'))
        {
            if ($this->session->userdata('admin_login') == '0') 
            {
                redirect('admin/lock', 'refresh');
            }
            else redirect('admin/dashboard');
        }

        $this->load->view($this->view_folder.'signin');
    }

    /*Load login page*/
    function signin()
    { 
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if($this->form_validation->run() == FALSE)
        {
            $data['is_data'] = '0';
            echo json_encode($data);
        }
        else
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $result = $this->login_model->login($email, $password);

            if($result)
            {               
                $this->session->set_userdata('admin_id', $result->id);
                $this->session->set_userdata('admin_name', $result->name);
                $this->session->set_userdata('admin_profile_image', $result->profile_image);
                $this->session->set_userdata('admin_email', $result->email);
                $this->session->set_userdata('admin_role', $result->role);                
                $this->session->set_userdata('admin_login', '1');

                $data['is_data'] = '1';
                echo json_encode($data);
            }
            else
            {
                $data['is_data'] = '0';
                echo json_encode($data);
            }           
        }       
    }

    /*Unset all login session*/
    function logout()
    {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_profile_image');
        $this->session->unset_userdata('admin_email');
        $this->session->unset_userdata('admin_role');  
        $this->session->unset_userdata('admin_login');  
        /*$this->session->sess_destroy();*/
        redirect('admin/login/', '');
    }

    /*Change login password*/
    function change_password()
    {
        $AllPostData = $this->input->post();

        $this->form_validation->set_rules('old_password','user_code','required|trim');
        $this->form_validation->set_rules('new_password', 'password', 'required|trim');
        $this->form_validation->set_rules('confirm_password', 'password confirmation', 'required|trim|matches[new_password]');

        $this->form_validation->set_error_delimiters('<label class="form-errors">', '</label>');
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('err_msg1','Please provide valid details');
            redirect($this->agent->referrer());
        }
        else
        {
            $id = $this->session->userdata('admin_id'); 
            $this->db->select('*');
            $this->db->from('tbl_admin_details');
            $this->db->where('id', $id);
            $this->db->where('password',$this->common->AES_encrypt($AllPostData['old_password']));
            $this->db->limit(1);
            $query = $this->db->get();
            if($query->num_rows() == 1)
            {
                $data_array = array(
                    'password' => $this->common->AES_encrypt($this->input->post('new_password'))
                );
                $this->db->where('id',$id);
                $this->db->update('tbl_admin_details', $data_array);
                $this->session->set_flashdata('succ_msg1','Password changed successfully');
                redirect($this->agent->referrer());
            }
            else
            {
                $this->session->set_flashdata('err_msg1','Old password is incorrect');
                redirect($this->agent->referrer());
            }
        }
    }
}
