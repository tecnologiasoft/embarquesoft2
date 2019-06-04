<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MYcom_Controller {

    private $view_folder = 'company/login/';
    
    function __construct()
    {
         parent::__construct();
            
        /* Load Model */
        $this->load->model('company/login_model','this_model');
        
    }

    

	function signin()
    { 
        
        $this->form_validation->set_rules('username', $this->lang->line('field_emal'), 'trim|required');
        $this->form_validation->set_rules('password', $this->lang->line('field_password'), 'trim|required');
        $this->form_validation->set_rules('company_id', $this->lang->line('company_id'), 'trim|required');
        
        if($this->form_validation->run() == FALSE)
        {
            
            $data['is_data'] = '0';
            echo json_encode($data);
        }
        else
        {
            
            
            $result = $this->this_model->login($this->input->post());

            

            

            if($result)
            {               
                
                
                // $this->session->set_userdata('company_id', $result->id);
                // $this->session->set_userdata('company_name', $result->name);
                // $this->session->set_userdata('company_profile_image', $result->logo);
                // $this->session->set_userdata('company_email', $result->email);
                // $this->session->set_userdata('company_telephone_number', $result->telephone_number);
                // $this->session->set_userdata('company_database', $result->database_name);
                // $this->session->set_userdata('company_login', '1');

                /*$login_data = array('last_login' => date('Y-m-d H:i:s'),'login' => 'login' );
                $this->db->where('id',$result->id);
                $this->db->update('tbl_user',$login_data);*/

                $data['is_data'] = '1';
                //$this->session->set_userdata('company_id', $result->id);
                echo json_encode($data);
            }
            else
            {
                $data['is_data'] = '0';
                echo json_encode($data);
            }           
        }       
    }//function login


    function logout()
    {
        $this->session->unset_userdata('company_id');
        $this->session->unset_userdata('company_name');
        $this->session->unset_userdata('company_profile_image');
        $this->session->unset_userdata('company_email');
        $this->session->unset_userdata('company_login');  
        $this->session->unset_userdata('company_database');  

        
        $this->session->unset_userdata('new_pickup_customer_id');
        /*$this->session->sess_destroy();*/
        redirect('company/login/', '');
    }

    /*function change_password()
    {
        $AllPostData = $this->input->post();

        $this->form_validation->set_error_delimiters('<label class="form-errors">', '</label>');
        
        
        
        $this->form_validation->set_rules('old_password','user_code','required|trim');
        $this->form_validation->set_rules('new_password', 'password', 'required|trim');
        $this->form_validation->set_rules('confirm_password', 'password confirmation', 'required|trim|matches[new_password]');

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
    } */
}
