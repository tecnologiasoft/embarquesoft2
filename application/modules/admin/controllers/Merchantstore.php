<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchantstore extends MY_Controller {

	private $view_folder = 'admin/merchantstore/';
	function __construct()
    {
        parent::__construct();
        $this->load->model('admin/merchant_model');
        $this->load->model('admin/merchantstore_model');
    }

    /*Load default*/
	function index()
	{
		$this->listing();
	}

    /*merchantstore listing*/
	function listing()
    {
        $data = array();
        
        $this->load->view($this->view_folder.'listing', $data);
    }

    /*Ajax listing*/
    function ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->merchantstore_model->get_datatables();
        $data = array();

        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->merchantstore_model->count_filtered(),'sort'=>'asc','field'=>'user_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
    }

    /*Add new merchantstore*/
    function add()
    {
        $data = array();
        //$data['category_list'] = $this->common->category_list();
        //$data['merchant_list'] = $this->merchant_model->merchant_list();

        $this->form_validation->set_rules('merchant_id', 'Select Merchant','required|trim');
        $this->form_validation->set_rules('category_id', 'Select Category','required|trim');
        $this->form_validation->set_rules('store_name', 'Store Name','required|trim');
        $this->form_validation->set_rules('contact_name', 'Contact Name','required|trim');
        $this->form_validation->set_rules('contact_phone', 'Contact Phone','trim|required');
        $this->form_validation->set_rules('address', 'Address','trim|required');
        $this->form_validation->set_rules('latitude', 'Latitude','trim|required');
        $this->form_validation->set_rules('longitude', 'Longitude','trim|required');
        $this->form_validation->set_rules('website', 'Website','trim|required');
        $this->form_validation->set_rules('about', 'About','trim|required');
        if(empty($_FILES['store_logo']['name']))
            $this->form_validation->set_rules('store_logo', 'Store Logo','trim|required');
        if(empty($_FILES['store_banner']['name']))
            $this->form_validation->set_rules('store_banner', 'Store Banner','trim|required');

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view($this->view_folder.'add', $data);
        } 
        else 
        {
            $AllPostData = $this->input->post();
            
            $store_logo = '';
            if (!empty($_FILES['store_logo']) && $_FILES['store_logo']['size'] > 0) 
            {   
                $store_logo = $this->common->image_upload($field = 'store_logo',$path = './'.MERCHANTSTORELOGO_IMAGE);
                if (!$store_logo) 
                {
                    $this->session->set_flashdata('err_msg1', $this->upload->display_errors('', ''));
                    $this->load->view($this->view_folder.'add', $data); return;
                }
            }

            $store_banner = '';
            if (!empty($_FILES['store_banner']) && $_FILES['store_banner']['size'] > 0) 
            {   
                $store_banner = $this->common->image_upload($field = 'store_banner',$path = './'.MERCHANTSTORE_IMAGE);
                if (!$store_banner) 
                {
                    $this->session->set_flashdata('err_msg1', $this->upload->display_errors('', ''));
                    $this->load->view($this->view_folder.'add', $data); return;
                }
            }
            
            $params = array(
                'merchant_id' => $AllPostData['merchant_id'],
                'category_id' => $AllPostData['category_id'],
                'store_name' => $AllPostData['store_name'],
                'store_logo' => $store_logo,
                'store_banner' => $store_banner,
                'contact_name' => $AllPostData['contact_name'],
                'contact_phone' => $AllPostData['contact_phone'],
                'address' => $AllPostData['address'],
                'latitude' => $AllPostData['latitude'],
                'longitude' => $AllPostData['longitude'],
                'website' => $AllPostData['website'],
                'about' => $AllPostData['about'],
                'status' => 'Verified',
            );

            // Add merchant store
            $this->db->insert('tbl_merchant_store', $params);
            $merchant_store_id = $this->db->insert_id();
            
            //Add subcategory
            $sub_params = array(
                'merchant_id' => $AllPostData['merchant_id'],
                'merchant_store_id' => $merchant_store_id,
                'category_id' => $AllPostData['category_id'],
                'subcategory_id' => $AllPostData['subcategory_id'],
            );
            $this->db->insert('tbl_merchant_category', $sub_params);

            $this->session->set_flashdata('succ_msg1', 'Merchant store added sucessfully');
            redirect('admin/merchantstore/listing/');
        }
    }

    /*Edit merchantstore details*/
    function edit()
    {
        $AllPostData = $this->input->post();
        $data['category_list'] = $this->common->category_list();
        $data['merchant_list'] = $this->merchant_model->merchant_list();

        if(!empty($AllPostData))
        {
            $merchantstore_id = base64_decode($AllPostData['merchantstore_id']);
            $merchantstore_data = $this->merchantstore_model->get_merchantstore_data($merchantstore_id);

            $this->form_validation->set_rules('merchant_id', 'Select Merchant','required|trim');
            $this->form_validation->set_rules('category_id', 'Select Category','required|trim');
            $this->form_validation->set_rules('store_name', 'Store Name','required|trim');
            $this->form_validation->set_rules('contact_name', 'Contact Name','required|trim');
            $this->form_validation->set_rules('contact_phone', 'Contact Phone','trim|required');
            $this->form_validation->set_rules('address', 'Address','trim|required');
            $this->form_validation->set_rules('latitude', 'Latitude','trim|required');
            $this->form_validation->set_rules('longitude', 'Longitude','trim|required');
            $this->form_validation->set_rules('website', 'Website','trim|required');
            $this->form_validation->set_rules('about', 'About','trim|required');
            $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view($this->view_folder.'edit', $data);
            } 
            else 
            {
                $params = array(
                    'merchant_id' => $AllPostData['merchant_id'],
                    'category_id' => $AllPostData['category_id'],
                    'store_name' => $AllPostData['store_name'],
                    'contact_name' => $AllPostData['contact_name'],
                    'contact_phone' => $AllPostData['contact_phone'],
                    'address' => $AllPostData['address'],
                    'latitude' => $AllPostData['latitude'],
                    'longitude' => $AllPostData['longitude'],
                    'website' => $AllPostData['website'],
                    'about' => $AllPostData['about'],
                );

                /*Update store logo*/
                if (!empty($_FILES['store_logo']) && $_FILES['store_logo']['size'] > 0) 
                {
                    $params['store_logo'] = $this->common->image_upload($field = 'store_logo',$path = './'.MERCHANTSTORELOGO_IMAGE);
                    if (!$params['store_logo']) 
                    {
                        $this->session->set_flashdata('err_msg1', $this->upload->display_errors('', ''));
                        $this->load->view($this->view_folder.'edit', $data);
                        return;
                    }
                    else
                    {
                        if (basename($merchantstore_data['store_logo']) != '') 
                        {
                            @unlink("./".MERCHANTSTORELOGO_IMAGE.basename($merchantstore_data['store_logo']));
                            @unlink("./".MERCHANTSTORELOGO_IMAGE_THUMB.basename($merchantstore_data['store_logo']));
                        }
                    }
                }

                /*Update store banner*/
                if (!empty($_FILES['store_banner']) && $_FILES['store_banner']['size'] > 0) 
                {
                    $params['store_banner'] = $this->common->image_upload($field = 'store_banner',$path = './'.MERCHANTSTORE_IMAGE);
                    if (!$params['store_banner']) 
                    {
                        $this->session->set_flashdata('err_msg1', $this->upload->display_errors('', ''));
                        $this->load->view($this->view_folder.'edit', $data);
                        return;
                    }
                    else
                    {
                        if (basename($merchantstore_data['store_banner']) != '') 
                        {
                            @unlink("./".MERCHANTSTORE_IMAGE.basename($merchantstore_data['store_banner']));
                            @unlink("./".MERCHANTSTORE_IMAGE_THUMB.basename($merchantstore_data['store_banner']));
                        }
                    }
                }

                // Update Personal Details 
                $this->db->where('id', $merchantstore_id);
                $this->db->update('tbl_merchant_store', $params);

                /*Remove existing category*/
                $this->db->delete('tbl_merchant_category',array('merchant_store_id'=>$merchantstore_data['id']));
                //Add subcategory
                $sub_params = array(
                    'merchant_id' => $AllPostData['merchant_id'],
                    'merchant_store_id' => $merchantstore_data['id'],
                    'category_id' => $AllPostData['category_id'],
                    'subcategory_id' => $AllPostData['subcategory_id'],
                );
                $this->db->insert('tbl_merchant_category', $sub_params);

                $this->session->set_flashdata('succ_msg1', 'Merchant store updated sucessfully');
                redirect('admin/merchantstore/edit/'.base64_encode($merchantstore_id));
            }
        }
        else
        {
            if(!$this->uri->segment(4)) 
            {
                redirect('admin/merchantstore/listing');
            }
            $data['result'] = $this->merchantstore_model->get_merchantstore_data(base64_decode($this->uri->segment(4)));
            $this->load->view($this->view_folder.'edit', $data);
        }
    }

    /*View merchantstore details*/
    function view()
    {
        if (!$this->uri->segment(4)) 
        {
            redirect('admin/merchantstore/listing');
        }
        $user_id = base64_decode($this->uri->segment(4));

        $data = array();
        $data['result'] = $this->merchantstore_model->get_merchantstore_data($user_id);
        //echo "<pre>";print_r($data);die;
        $this->load->view($this->view_folder.'view', $data);
    }

    /*Change merchantstore status*/
    function merchantstore_state()
    {   
        if (!$this->uri->segment(4) && !$this->uri->segment(5)) {
            echo json_encode();
        }
        $ID = $this->uri->segment(4);
        $state = $this->uri->segment(5);
        $this->merchantstore_model->merchantstore_state($ID,$state);
        
        echo json_encode();
    }
    
    /*Get sub category json list*/
    function subcategorylist($category_id)
    {
        $subcategorylist = $this->common->subcategory_list($category_id);
        echo json_encode($subcategorylist);
    }
}
