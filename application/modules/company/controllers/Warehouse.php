<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Warehouse extends MYcom_Controller {

	private $view_folder = 'company/warehouse/';
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
        
        $this->load->model('company/warehouse_model');
    }

    /*Default index call*/
	function index()
	{
		$this->listing();
	}

    /*Listing all warehouses*/
	function listing()
    {
        $data = array();
        
        $this->load->view($this->view_folder.'listing', $data);
    }

    /*List all warehouse by ajax call*/
    function ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->warehouse_model->get_datatables();
        $data = array();

        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->warehouse_model->count_filtered(),'sort'=>'asc','field'=>'company_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
    } 

    /*Add new warehouse*/
    function add()
    {
        $data = array();
       
        $this->form_validation->set_rules('name',$this->lang->line('field_name'),'required|trim');

        $this->form_validation->set_rules('address',$this->lang->line('field_address'),'required|trim');
        $this->form_validation->set_rules('address_line_1',$this->lang->line('field_address_line_1'),'required|trim');
        $this->form_validation->set_rules('address_line_2',$this->lang->line('field_address_line_2'),'required|trim');
        $this->form_validation->set_rules('city',$this->lang->line('field_city'),'required|trim');
        $this->form_validation->set_rules('state',$this->lang->line('field_state'),'required|trim');
        $this->form_validation->set_rules('country',$this->lang->line('field_country'),'required|trim');
        $this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'required|trim');

        $this->form_validation->set_rules('telephone_number',$this->lang->line('field_telephone_number'),'required|trim');
        $this->form_validation->set_rules('void',$this->lang->line('field_void'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('status',$this->lang->line('field_status'),'required|trim|in_list[A,N]');
        
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view($this->view_folder.'add', $data);
        } 
        else 
        {   

            $params = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'address_line1' => $this->input->post('address_line_1'),
                'address_line2' => $this->input->post('address_line_2'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
                'zipcode' => $this->input->post('zipcode'),
                'telephone_number' => $this->input->post('telephone_number'),
                'void' => $this->input->post('void'),
                'status' => $this->input->post('status'),
            );

            if(!empty($this->input->post('latitude'))){
                $params['latitude'] = $this->input->post('latitude');
            }
            if(!empty($this->input->post('longitude'))){
                $params['longitude'] = $this->input->post('longitude');
            }

            $id = $this->warehouse_model->add_warehouse($params);
 
            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_warehouse_add_success'));
            redirect('company/warehouse/listing/','refresh');
        }
    }

  
    /*Update warehouse details*/
    function edit()
    {
        $warehouse_id = $this->uri->segment(4);

        $data = array();
        $warehouse_data = $data['result'] = $this->warehouse_model->get_warehouse_data($warehouse_id);
        if(empty($warehouse_data))
            redirect('company/warehouse/listing','refresh');
        
        
        $this->form_validation->set_rules('name',$this->lang->line('field_name'),'required|trim');

        $this->form_validation->set_rules('address',$this->lang->line('field_address'),'required|trim');
        $this->form_validation->set_rules('address_line_1',$this->lang->line('field_address_line_1'),'required|trim');
        $this->form_validation->set_rules('address_line_2',$this->lang->line('field_address_line_2'),'required|trim');
        $this->form_validation->set_rules('city',$this->lang->line('field_city'),'required|trim');
        $this->form_validation->set_rules('state',$this->lang->line('field_state'),'required|trim');
        $this->form_validation->set_rules('country',$this->lang->line('field_country'),'required|trim');
        $this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'required|trim');

        $this->form_validation->set_rules('telephone_number',$this->lang->line('field_telephone_number'),'required|trim');
        $this->form_validation->set_rules('void',$this->lang->line('field_void'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('status',$this->lang->line('field_status'),'required|trim|in_list[A,N]');

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view($this->view_folder.'edit', $data);
        } 
        else 
        {
            $params = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'address_line1' => $this->input->post('address_line_1'),
                'address_line2' => $this->input->post('address_line_2'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
                'zipcode' => $this->input->post('zipcode'),
                'telephone_number' => $this->input->post('telephone_number'),
                'void' => $this->input->post('void'),
                'status' => $this->input->post('status'),
            );

            if(!empty($this->input->post('latitude'))){
                $params['latitude'] = $this->input->post('latitude');
            }
            if(!empty($this->input->post('longitude'))){
                $params['longitude'] = $this->input->post('longitude');
            }
            
            // Update warehouse details 
            $this->warehouse_model->update_warehouse($warehouse_id, $params);

            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_warehouse_update_success'));
            redirect('company/warehouse/listing/', 'refresh');
        }
    }

    /*View warehouse profile*/
    function view()
    {
        if (!$this->uri->segment(4)) 
        {
            redirect('company/warehouse/listing','refresh');
        }
        $data = array();
        if(!empty($this->input->cookie('tab_id', TRUE))){
            $data['tab_id'] = $this->input->cookie('tab_id', TRUE);
        } else {
            $data['tab_id'] = "1";
        }
        $data['result'] = $this->warehouse_model->get_warehouse_data($this->uri->segment(4));
        $this->load->view($this->view_folder.'view', $data);
    }

    /*Change warehouse status*/
    function warehouse_state()
    {   
        if (!$this->uri->segment(4) && !$this->uri->segment(5)) {
            echo json_encode();
        }
        $ID = $this->uri->segment(4);
        $state = $this->uri->segment(5);
        $this->warehouse_model->warehouse_state($ID,$state);
        
        echo json_encode();
    }

    /* Delete warehouse */
    function delete($warehouse_id)
    {   
        if (!$warehouse_id) {
            echo json_encode();
        }
        $this->warehouse_model->update_warehouse($warehouse_id,array('void' => 'Yes'));
        echo json_encode();
    }
 }
