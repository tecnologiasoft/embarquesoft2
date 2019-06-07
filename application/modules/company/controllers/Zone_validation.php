<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Zone_validation extends MYcom_Controller {

	private $view_folder = 'company/zone_validation/';
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
        
        $this->load->model('company/zone_validation_model');
    }

    /*Default index call*/
	function index()
	{
		$this->listing();
	}

    /*Listing all zone_validation*/
	function listing()
    {
        $data = array();
        
        $this->load->view($this->view_folder.'listing', $data);
    }

    /*List all zone_validation by ajax call*/
    function ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->zone_validation_model->get_datatables();
        $data = array();

        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->zone_validation_model->count_filtered(),'sort'=>'asc','field'=>'company_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
    } 

    /*Add new zone_validation*/
    function add()
    {
        $data = array();

        $this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'required|trim');

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view($this->view_folder.'add', $data);
        } 
        else 
        {   
            /* check zipcode already registered or not? */
            $already_register = $this->zone_validation_model->check_param(array('zip' => $this->input->post('zipcode')));
            if(!empty($already_register)){
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_zone_validation_zipcode_exist'));
                $this->load->view($this->view_folder.'add', $data); return;
            }

            $params = array(
                'zip' => $this->input->post('zipcode'),
            );

            $id = $this->zone_validation_model->add_zone_validation($params);
 
            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_zone_validation_add_success'));
            redirect('company/zone_validation/listing/','refresh');
        }
    }

  
    /*Update zone_validation details*/
    function edit()
    {
        $zone_validation_id = $this->uri->segment(4);

        $data = array();
        
        $zone_validation_data = $data['result'] = $this->zone_validation_model->get_zone_validation_data($zone_validation_id);
        if(empty($zone_validation_data))
            redirect('company/zone_validation/listing','refresh');
        
        $this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'required|trim');

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view($this->view_folder.'edit', $data);
        } 
        else 
        {
            /* check zipcode already registered or not? */
            $already_register = $this->zone_validation_model->check_param(array('zip' => $this->input->post('zipcode'), 'id !=' => $zone_validation_id));
            if(!empty($already_register)){
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_zone_validation_zipcode_exist'));
                $this->load->view($this->view_folder.'edit', $data); return;
            }

            $params = array(
                'zip' => $this->input->post('zipcode'),
            );
            // Update zone_validation details 
            $this->zone_validation_model->update_zone_validation($zone_validation_id, $params);

            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_zone_validation_update_success'));
            redirect('company/zone_validation/listing/', 'refresh');
        }
    }

    /*View zone_validation profile*/
    function view()
    {
        if (!$this->uri->segment(4)) 
        {
            redirect('company/zone_validation/listing','refresh');
        }
        $data = array();
        if(!empty($this->input->cookie('tab_id', TRUE))){
            $data['tab_id'] = $this->input->cookie('tab_id', TRUE);
        } else {
            $data['tab_id'] = "1";
        }
        $data['result'] = $this->zone_validation_model->get_zone_validation_data($this->uri->segment(4));
        $this->load->view($this->view_folder.'view', $data);
    }

    /*Delete zone_validation*/
    function delete($zone_validation_id)
    {   
        if (!$zone_validation_id) {
            echo json_encode();
        }
        $this->zone_validation_model->update_zone_validation($zone_validation_id,array('void' => 'Yes'));
        echo json_encode();
    }
 }
