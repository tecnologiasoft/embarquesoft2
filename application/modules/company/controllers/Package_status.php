<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package_status extends MYcom_Controller {

	private $view_folder = 'company/package_status/';
	function __construct()
    {
        parent::__construct();
        
        /*if(!$this->session->userdata('company_id'))
        {
            redirect('company/login/', 'refresh');
        }
        
        if ($this->session->userdata('admin_login') == '0') 
        {
            redirect('company/lock', 'refresh');
        }*/
        
        $this->load->model('company/package_status_model');
    }

    /*Default index call*/
	function index()
	{
		$this->listing();
	}

    /*Listing all package_status*/
	function listing()
    {
        $data = array();
        
        $this->load->view($this->view_folder.'listing', $data);
    }

    /*List all package_status by ajax call*/
    function ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->package_status_model->get_datatables();
        $data = array();

        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->package_status_model->count_filtered(),'sort'=>'asc','field'=>'company_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
    } 

    /*Add new package_status*/
    function add()
    {
        $data = array();
        $data['warehouse_list'] = $this->package_status_model->get_warehouse_list();

        $this->form_validation->set_rules('description',$this->lang->line('field_description'),'required|trim');
        $this->form_validation->set_rules('warehouse_id',$this->lang->line('field_warehouse_id'),'required|trim');
        //$this->form_validation->set_rules('active',$this->lang->line('field_active'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('clear_warehouse',$this->lang->line('field_clear_warehouse'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('tran_type',$this->lang->line('field_tran_type'),'required|trim|in_list[Warehouse,Transit,Container,Delivery]');
        $this->form_validation->set_rules('scanner_country',$this->lang->line('field_scanner_country'),'required|trim');
        
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view($this->view_folder.'add', $data);
        } 
        else 
        {   

            /*'active' => $this->input->post('active'),*/
            $params = array(
                'description' => $this->input->post('description'),
                'warehouse_id' => $this->input->post('warehouse_id'),
                'clear_warehouse' => $this->input->post('clear_warehouse'),
                'scanner_country' => $this->input->post('scanner_country'),
                'tran_type' => $this->input->post('tran_type'),
            );

            $id = $this->package_status_model->add_package_status($params);
 
            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_package_status_add_success'));
            redirect('company/package_status/listing/','refresh');
        }
    }

  
    /*Update package_status details*/
    function edit()
    {
        $package_status_id = $this->uri->segment(4);

        $data = array();
        $data['warehouse_list'] = $this->package_status_model->get_warehouse_list();
        
        $package_status_data = $data['result'] = $this->package_status_model->get_package_status_data($package_status_id);
        if(empty($package_status_data))
            redirect('company/package_status/listing','refresh');
        
        $this->form_validation->set_rules('description',$this->lang->line('field_description'),'required|trim');
        $this->form_validation->set_rules('warehouse_id',$this->lang->line('field_warehouse_id'),'required|trim');
        //$this->form_validation->set_rules('active',$this->lang->line('field_active'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('clear_warehouse',$this->lang->line('field_clear_warehouse'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('tran_type',$this->lang->line('field_tran_type'),'required|trim|in_list[Warehouse,Transit,Container,Delivery]');
        $this->form_validation->set_rules('scanner_country',$this->lang->line('field_scanner_country'),'required|trim');
        
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view($this->view_folder.'edit', $data);
        } 
        else 
        {
            /*'active' => $this->input->post('active'),*/
            $params = array(
                'description' => $this->input->post('description'),
                'warehouse_id' => $this->input->post('warehouse_id'),
                'clear_warehouse' => $this->input->post('clear_warehouse'),
                'scanner_country' => $this->input->post('scanner_country'),
                'tran_type' => $this->input->post('tran_type'),
            );

            // Update package_status details 
            $this->package_status_model->update_package_status($package_status_id, $params);

            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_package_status_update_success'));
            redirect('company/package_status/listing/', 'refresh');
        }
    }

    /*View package_status profile*/
    function view()
    {
        if (!$this->uri->segment(4)) 
        {
            redirect('company/package_status/listing','refresh');
        }
        $data = array();
        if(!empty($this->input->cookie('tab_id', TRUE))){
            $data['tab_id'] = $this->input->cookie('tab_id', TRUE);
        } else {
            $data['tab_id'] = "1";
        }
        $data['result'] = $this->package_status_model->get_package_status_data($this->uri->segment(4));
        $this->load->view($this->view_folder.'view', $data);
    }

    /*Change package_status status*/
    function package_status_state()
    {   
        if (!$this->uri->segment(4) && !$this->uri->segment(5)) {
            echo json_encode();
        }
        $ID = $this->uri->segment(4);
        $state = $this->uri->segment(5);
        $this->package_status_model->package_status_state($ID,$state);
        
        echo json_encode();
    }

    /* Delete package status */
    function delete($package_status_id)
    {   
        if (!$package_status_id) {
            echo json_encode();
        }
        $this->package_status_model->update_package_status($package_status_id,array('void' => 'Yes'));
        echo json_encode();
    }
 }
