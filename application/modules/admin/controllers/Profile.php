<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends MY_Controller
{
    private $view_folder = 'admin/profile/';
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('admin/profile_model');
    }

    /*Load profile view*/
    function index()
    {
        $data = array();
        $data['result'] = $this->profile_model->get_admin_data($this->session->userdata('admin_id'));
        $data['tab_id'] = '1';

        $this->load->view($this->view_folder.'profile', $data);
    }

    /*Update admin profile*/
    function update_personal_details()
    {
        $AllPostData = $this->input->post();
        $data = array();

        $user_data = $this->profile_model->get_admin_data($this->session->userdata('admin_id'));
        $data['result'] = $user_data;

        $this->form_validation->set_rules('name',$this->lang->line('field_name'),'required|trim');
        if(!empty($user_data['email']) && !empty($AllPostData['email']) && $AllPostData['email'] != $user_data['email'])
            $this->form_validation->set_rules('email', $this->lang->line('field_email'), 'required|trim|valid_email|is_unique[tbl_admin.email]', array('is_unique' => $this->lang->line('user_email')));
        $this->form_validation->set_rules('country_code',$this->lang->line('field_country_code'),'trim|required');
        $this->form_validation->set_rules('phone',$this->lang->line('field_phone_number'),'trim|required');
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $data['tab_id']="1";
            $this->load->view($this->view_folder.'profile', $data);
        } 
        else 
        {
            $params = array(
                'name'  => trim($this->input->post('name')),
                'email'   => trim($this->input->post('email')),
                'country_code'   => trim($this->input->post('country_code')),
                'phone'   => trim($this->input->post('phone')),
            );

            if (!empty($_FILES['profile_image']) && $_FILES['profile_image']['size'] > 0) 
            {
                $params['profile_image'] = $this->common->image_upload($field = 'profile_image',$path = './'.ADMIN_IMAGE);
                
                if (!$params['profile_image']) 
                {
                    $this->session->set_flashdata('err_msg1', $this->upload->display_errors('', ''));
                    $data['tab_id']="1";
                    $this->load->view($this->view_folder.'profile', $data);
                    return;
                }
                else
                {
                    if(basename($user_data['profile_image']) != 'default-user.png') 
                    {
                        @unlink("./".ADMIN_IMAGE.basename($user_data['profile_image']));
                        @unlink("./".ADMIN_IMAGE_THUMB.basename($user_data['profile_image']));
                    }
                    $this->session->set_userdata('admin_profile_image',base_url().ADMIN_IMAGE_THUMB.$params['profile_image']);
                }
            }

            $result = $this->profile_model->update_personal_details($this->session->userdata('admin_id'),$params);
            if($result==!0)
            {
                $this->session->set_userdata('admin_name', trim($this->input->post('name')));
                $this->session->set_userdata('admin_email', trim($this->input->post('email')));
                $this->session->set_flashdata('succ_msg1', 'Personal details saved sucessfully');
            }
            else
            {
                $this->session->set_flashdata('err_msg1', 'Personal details has not updated');
            }
            redirect('admin/profile/');
        }
    }

    /*Change admin password*/
    function change_password()
    {
        $AllPostData = $this->input->post();
        
        $this->form_validation->set_rules('old_password','Old Password','required|trim');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|trim|matches[new_password]');

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE) 
        {
            $data['tab_id']="3";
            $this->session->set_flashdata('err_msg1','Please provide valid details');
            redirect(base_url()."admin/profile/index"."/3");
        }
        else
        {
            $id = $this->session->userdata('admin_id'); 
            $this->db->select('*');
            $this->db->from('tbl_admin');
            $this->db->where('id', $id);
            $this->db->where('password',$this->common->AES_encrypt($AllPostData['old_password']));
            $this->db->limit(1);
            $query = $this->db->get();
            if($query->num_rows() == 1)
            {
                $data_array = array(
                    'password' => $this->common->AES_encrypt($AllPostData['new_password'])
                );
                
                $this->db->where('id',$id);
                $this->db->update('tbl_admin', $data_array);
                $this->session->set_flashdata('succ_msg1','Password changed successfully');
                redirect(base_url()."admin/profile/");
            }
            else
            {
                $data['tab_id']="3";
                $this->session->set_flashdata('err_msg1','Old password is incorrect');
                redirect(base_url()."admin/profile/index"."/3");
            }
        }
    }
}

