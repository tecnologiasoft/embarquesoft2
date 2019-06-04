<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends MY_Controller
{
    private $view_folder = 'vendor/profile/';
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
        
        $this->load->model('vendor/profile_model');

    }


    function index()
    {
        redirect(base_url().$this->view_folder."/view");
    }

    function view()
    {
        $data = array();

        /* if (!$this->uri->segment(4)) {
            redirect('vendor/dashboard');
        }
        $user_id = base64_decode($this->uri->segment(4));
        $data['result'] = $this->profile_model->get_user_data($user_id); */

        $data['category_list'] = $this->common->category_list();
        $data['result'] = $this->profile_model->get_user_data($this->session->userdata('company_id'));
        $data['tab_id']="1";

        $this->load->view($this->view_folder.'profile', $data);
    }

    function update_personal_details()
    {
        $AllPostData = $this->input->post();
        $data = array();

        $data['category_list'] = $this->common->category_list();
        $data['result'] = $this->profile_model->get_user_data($this->session->userdata('vendor_id'));
        $data['result_vendor'] = $this->profile_model->get_user_vendor_data($this->session->userdata('vendor_id'));
        $user_data = $this->profile_model->get_user_data($this->session->userdata('vendor_id'));

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');

        $this->form_validation->set_rules('first_name',$this->lang->line('field_first_name'),'required|trim');
        $this->form_validation->set_rules('last_name',$this->lang->line('field_last_name'),'required|trim');
        $this->form_validation->set_rules('country_code',$this->lang->line('field_country_code'),'required|trim');
        $this->form_validation->set_rules('phone_number',$this->lang->line('field_phone_number'),'required|trim');
       
        if ($this->form_validation->run() == FALSE)
        {
            $data['tab_id']="1";
            $this->load->view($this->view_folder.'profile', $data);
        } 
        else 
        {

            $params = array(
                'first_name'  => trim($this->input->post('first_name')),
                'last_name'   => trim($this->input->post('last_name')),
                'country_code'  => trim($this->input->post('country_code')),
                'phone_number'    => trim($this->input->post('phone_number')),
                'updatetime' => date('Y-m-d H:i:s'),
            );

            if (!empty($_FILES['profile_image']) && $_FILES['profile_image']['size'] > 0) 
            {
                $params['profile_image'] = $this->common->image_upload($field = 'profile_image',$path = './'.USER_IMAGE);
                
                if (!$params['profile_image']) 
                {
                    $data['error_msg'] = $this->upload->display_errors('', '');
                    $data['tab_id']="1";
                    $this->load->view($this->view_folder.'profile', $data);
                    return;
                }
                else
                {
                    if ($user_data['profile_image'] != 'default-user.png') 
                    {
                        @unlink("./".USER_IMAGE.$user_data['profile_image']);
                        @unlink("./".USER_IMAGE_THUMB.$user_data['profile_image']);
                    }
                    $this->session->set_userdata('vendor_profile_image',base_url().USER_IMAGE_THUMB.$params['profile_image']);
                }
            }

            $result = $this->profile_model->update_personal_details($this->session->userdata('vendor_id'),$params);
            
            if($result==!0)
            {

                $this->session->set_userdata('vendor_name', trim($this->input->post('first_name'))." ".trim($this->input->post('last_name')));
                $this->session->set_flashdata('succ_msg1', 'Personal details saved sucessfully');
            }
            else
            {
                $this->session->set_flashdata('err_msg1', 'Personal details has not saved');
            }
            redirect('vendor/profile/view');
        }
    }
    

    function update_vendor_details()
    {
        $AllPostData = $this->input->post();
        $data = array();
        $data['category_list'] = $this->common->category_list();
        $data['result'] = $this->profile_model->get_user_data($this->session->userdata('vendor_id'));
        $data['result_vendor'] = $this->profile_model->get_user_vendor_data($this->session->userdata('vendor_id'));
        $user_vendor_data = $this->profile_model->get_user_vendor_data($this->session->userdata('vendor_id'));
        
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');

        $this->form_validation->set_rules('name','name','required|trim');
        $this->form_validation->set_rules('category_id','category','required|trim');
        $this->form_validation->set_rules('location','location','required|trim');
        $this->form_validation->set_rules('latitude','latitude','required|trim');
        $this->form_validation->set_rules('longitude','longitude','required|trim');
        $this->form_validation->set_rules('area','area','required|trim');
        $this->form_validation->set_rules('about','about','required|trim');
        $this->form_validation->set_rules('phone','phone','required|trim');
        $this->form_validation->set_rules('website','website','required|trim');
       
        if ($this->form_validation->run() == FALSE)
        {
            $data['tab_id']="2";
            $this->load->view($this->view_folder.'profile', $data);
        } 
        else 
        {            
            $cat_params = array(
                'name'  => trim($this->input->post('name')),
                'category_id'  => trim($this->input->post('category_id')),
                'location'   => trim($this->input->post('location')),
                'area'   => trim($this->input->post('area')),
                'latitude'       => trim($this->input->post('latitude')),
                'longitude'    => trim($this->input->post('longitude')),
                'about'    => trim($this->input->post('about')),
                'phone'    => trim($this->input->post('phone')),
                'website'    => trim($this->input->post('website')),
                'updatetime' => trim(date('Y-m-d H:i:s')),
            );

            if (!empty($_FILES['store_image']) && $_FILES['store_image']['size'] > 0) 
            {
                $cat_params['logo'] = $this->common->image_upload($field = 'store_image',$path = './'.STORE_IMAGE);
                
                if (!$cat_params['logo']) 
                {
                    $data['error_msg'] = $this->upload->display_errors('', '');
                    $data['tab_id']="2";
                    $this->load->view($this->view_folder.'profile', $data);
                    return;
                }
                else
                {
                    if ($user_vendor_data['logo'] != 'default-store.png') 
                    {
                        @unlink("./".STORE_IMAGE.$user_vendor_data['logo']);
                        @unlink("./".STORE_IMAGE_THUMB.$user_vendor_data['logo']);
                    }
                }
            }

            $result = $this->profile_model->update_vendor_details($this->session->userdata('vendor_id'),$cat_params); 
            if($result==!0)
            {
                $this->session->set_flashdata('succ_msg1', 'Vendor details saved sucessfully');
            }
            else
            {
                $this->session->set_flashdata('err_msg1', 'Vendor details has not saved');
            }
            redirect('vendor/profile/view');
        }
    }

    function change_password()
    {

        $AllPostData = $this->input->post();

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        
        
        $this->form_validation->set_rules('old_password','Old Password','required|trim');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|trim');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|trim|matches[new_password]');


        //print_r($AllPostData);

        if ($this->form_validation->run() == FALSE) 
        {
            $data['tab_id']="3";
            $this->session->set_flashdata('err_msg1','Please provide valid details');
            redirect(base_url()."vendor/profile/view"."/3");
        }
        else
        {
        
            $id = $this->session->userdata('vendor_id'); 
            $this->db->select('*');
            $this->db->from('tbl_user');
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
                $this->db->update('tbl_user', $data_array);
                $this->session->set_flashdata('succ_msg1','Password changed successfully');
                redirect(base_url()."vendor/profile/view");
            }
            else
            {
                $data['tab_id']="3";
                $this->session->set_flashdata('err_msg1','Old password is incorrect');
                redirect(base_url()."vendor/profile/view"."/3");
            }
        }
    }

}

