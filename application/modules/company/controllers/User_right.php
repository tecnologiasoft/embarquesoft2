<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_right extends MYcom_Controller {

	private $view_folder = 'company/user_right/';
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
        
        $this->load->model('company/user_right_model');
    }

    /*Default index call*/
	function index()
	{
		$this->listing();
	}

    /*Listing all user_rights*/
	function listing()
    {
        $data = array();
        
        $this->load->view($this->view_folder.'listing', $data);
    }

    /*List all user_right by ajax call*/
    function ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->user_right_model->get_datatables();
        $data = array();

        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->user_right_model->count_filtered(),'sort'=>'asc','field'=>'company_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
    } 

    /*Add new user_right*/
    function add()
    {
        $data = array();
        $data['branch_list'] = $this->user_right_model->get_branch_list();
        $data['user_list'] = $this->user_right_model->get_user_list();

        $this->form_validation->set_rules('user_id',$this->lang->line('field_user_id'),'required|trim');
        $this->form_validation->set_rules('branch_id',$this->lang->line('field_branch_id'),'required|trim');
        $this->form_validation->set_rules('description',$this->lang->line('field_description'),'required|trim');
        $this->form_validation->set_rules('supervisor',$this->lang->line('field_supervisor'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('similar',$this->lang->line('field_similar'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('view_branch_invoice',$this->lang->line('field_view_branch_invoice'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('report_branch',$this->lang->line('field_report_branch'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('view_office',$this->lang->line('field_view_office'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('petty_cash',$this->lang->line('field_petty_cash'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('level_invoice',$this->lang->line('field_level_invoice'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('print_invoice',$this->lang->line('field_print_invoice'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('level_payment',$this->lang->line('field_level_payment'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('return_payment',$this->lang->line('field_return_payment'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('level_warehouse',$this->lang->line('field_level_warehouse'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('change_barcode',$this->lang->line('field_change_barcode'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('delete_payment',$this->lang->line('field_delete_payment'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('pickup',$this->lang->line('field_pickup'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('show_pickup',$this->lang->line('field_show_pickup'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('employee',$this->lang->line('field_employee'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('clients',$this->lang->line('field_clients'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('autocall',$this->lang->line('field_autocall'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('distribution',$this->lang->line('field_distribution'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('warehouse',$this->lang->line('field_warehouse'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('customer',$this->lang->line('field_customer'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('item',$this->lang->line('field_item'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('invoice',$this->lang->line('field_invoice'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('payment',$this->lang->line('field_payment'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('office',$this->lang->line('field_office'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('reports',$this->lang->line('field_reports'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('access_from_ip',$this->lang->line('field_access_from_ip'),'trim|valid_ip');
        $this->form_validation->set_rules('current_ip',$this->lang->line('field_current_ip'),'required|trim|valid_ip');
        $this->form_validation->set_rules('access_time_from',$this->lang->line('field_access_time_from'),'trim');
        $this->form_validation->set_rules('access_time_to',$this->lang->line('field_access_time_to'),'trim');
        
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view($this->view_folder.'add', $data);
        } 
        else 
        {   

            /* check email already registered or not? */
            $already_register = $this->user_right_model->check_param(array('user_id' => $this->input->post('user_id')));
            if(!empty($already_register)){
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_user_right_exist'));
                $this->load->view($this->view_folder.'add', $data); return;
            }
 
            $params = array(
                'user_id' => $this->input->post('user_id'),
                'branch_id' => $this->input->post('branch_id'),
                'description' => $this->input->post('description'),
                'supervisor' => $this->input->post('supervisor'),
                'similar' => $this->input->post('similar'),
                'view_branch_invoice' => $this->input->post('view_branch_invoice'),
                'report_branch' => $this->input->post('report_branch'),
                'view_office' => $this->input->post('view_office'),
                'petty_cash' => $this->input->post('petty_cash'),
                'level_invoice' => $this->input->post('level_invoice'),
                'print_invoice' => $this->input->post('print_invoice'),
                'level_payment' => $this->input->post('level_payment'),
                'return_payment' => $this->input->post('return_payment'),
                'level_warehouse' => $this->input->post('level_warehouse'),
                'change_barcode' => $this->input->post('change_barcode'),
                'delete_payment' => $this->input->post('delete_payment'),
                'pickup' => $this->input->post('pickup'),
                'show_pickup' => $this->input->post('show_pickup'),
                'employee' => $this->input->post('employee'),
                'clients' => $this->input->post('clients'),
                'autocall' => $this->input->post('autocall'),
                'distribution' => $this->input->post('distribution'),
                'warehouse' => $this->input->post('warehouse'),
                'customer' => $this->input->post('customer'),
                'item' => $this->input->post('item'),
                'invoice' => $this->input->post('invoice'),
                'payment' => $this->input->post('payment'),
                'office' => $this->input->post('office'),
                'reports' => $this->input->post('reports'),
                'current_ip' => $this->input->post('current_ip'),
            );  
            if(!empty($this->input->post('access_from_ip'))){
                $params['access_from_ip'] = $this->input->post('access_from_ip');
            } 
            if(!empty($this->input->post("access_time_from")) && $this->input->post("access_time_from") != $this->input->post("access_time_to")){
                $params['access_time_from'] = $this->common->from_date_convert(date("H:i:s", strtotime($this->input->post("access_time_from"))), $this->session->userdata('web_timezone'), 'UTC', 'H:i:s');
            }
            if(!empty($this->input->post("access_time_to")) && $this->input->post("access_time_from") != $this->input->post("access_time_to")){
                $params['access_time_to'] = $this->common->from_date_convert(date("H:i:s", strtotime($this->input->post("access_time_to"))), $this->session->userdata('web_timezone'), 'UTC', 'H:i:s');
            }

            $id = $this->user_right_model->add_user_right($params);
 
            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_user_right_add_success'));
            redirect('company/user_right/listing/','refresh');
        }
    }

  
    /*Update user_right details*/
    function edit()
    {
        $user_right_id = $this->uri->segment(4);

        $data = array();
        $user_right_data = $data['result'] = $this->user_right_model->get_user_right_data($user_right_id);
        if(empty($user_right_data))
            redirect('company/user_right/listing','refresh');

        $data['branch_list'] = $this->user_right_model->get_branch_list();
        $data['user_list'] = $this->user_right_model->get_user_list();
        
        /*$this->form_validation->set_rules('user_id',$this->lang->line('field_user_id'),'required|trim');*/
        $this->form_validation->set_rules('branch_id',$this->lang->line('field_branch_id'),'required|trim');
        $this->form_validation->set_rules('description',$this->lang->line('field_description'),'required|trim');
        $this->form_validation->set_rules('supervisor',$this->lang->line('field_supervisor'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('similar',$this->lang->line('field_similar'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('view_branch_invoice',$this->lang->line('field_view_branch_invoice'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('report_branch',$this->lang->line('field_report_branch'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('view_office',$this->lang->line('field_view_office'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('petty_cash',$this->lang->line('field_petty_cash'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('level_invoice',$this->lang->line('field_level_invoice'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('print_invoice',$this->lang->line('field_print_invoice'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('level_payment',$this->lang->line('field_level_payment'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('return_payment',$this->lang->line('field_return_payment'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('level_warehouse',$this->lang->line('field_level_warehouse'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('change_barcode',$this->lang->line('field_change_barcode'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('delete_payment',$this->lang->line('field_delete_payment'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('pickup',$this->lang->line('field_pickup'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('show_pickup',$this->lang->line('field_show_pickup'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('employee',$this->lang->line('field_employee'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('clients',$this->lang->line('field_clients'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('autocall',$this->lang->line('field_autocall'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('distribution',$this->lang->line('field_distribution'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('warehouse',$this->lang->line('field_warehouse'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('customer',$this->lang->line('field_customer'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('item',$this->lang->line('field_item'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('invoice',$this->lang->line('field_invoice'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('payment',$this->lang->line('field_payment'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('office',$this->lang->line('field_office'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('reports',$this->lang->line('field_reports'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('access_from_ip',$this->lang->line('field_access_from_ip'),'trim|valid_ip');
        $this->form_validation->set_rules('current_ip',$this->lang->line('field_current_ip'),'required|trim|valid_ip');
        $this->form_validation->set_rules('access_time_from',$this->lang->line('field_access_time_from'),'trim');
        $this->form_validation->set_rules('access_time_to',$this->lang->line('field_access_time_to'),'trim');
        
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view($this->view_folder.'edit', $data);
        } 
        else 
        {

            /*'user_id' => $this->input->post('user_id'),*/
            $params = array(
                'branch_id' => $this->input->post('branch_id'),
                'description' => $this->input->post('description'),
                'supervisor' => $this->input->post('supervisor'),
                'similar' => $this->input->post('similar'),
                'view_branch_invoice' => $this->input->post('view_branch_invoice'),
                'report_branch' => $this->input->post('report_branch'),
                'view_office' => $this->input->post('view_office'),
                'petty_cash' => $this->input->post('petty_cash'),
                'level_invoice' => $this->input->post('level_invoice'),
                'print_invoice' => $this->input->post('print_invoice'),
                'level_payment' => $this->input->post('level_payment'),
                'return_payment' => $this->input->post('return_payment'),
                'level_warehouse' => $this->input->post('level_warehouse'),
                'change_barcode' => $this->input->post('change_barcode'),
                'delete_payment' => $this->input->post('delete_payment'),
                'pickup' => $this->input->post('pickup'),
                'show_pickup' => $this->input->post('show_pickup'),
                'employee' => $this->input->post('employee'),
                'clients' => $this->input->post('clients'),
                'autocall' => $this->input->post('autocall'),
                'distribution' => $this->input->post('distribution'),
                'warehouse' => $this->input->post('warehouse'),
                'customer' => $this->input->post('customer'),
                'item' => $this->input->post('item'),
                'invoice' => $this->input->post('invoice'),
                'payment' => $this->input->post('payment'),
                'office' => $this->input->post('office'),
                'reports' => $this->input->post('reports'),
                'current_ip' => $this->input->post('current_ip'),
            );  
            if(!empty($this->input->post('access_from_ip'))){
                $params['access_from_ip'] = $this->input->post('access_from_ip');
            } 
            if(!empty($this->input->post("access_time_from")) && $this->input->post("access_time_from") != $this->input->post("access_time_to")){
                $params['access_time_from'] = $this->common->from_date_convert(date("H:i:s", strtotime($this->input->post("access_time_from"))), $this->session->userdata('web_timezone'), 'UTC', 'H:i:s');
            }
            if(!empty($this->input->post("access_time_to")) && $this->input->post("access_time_from") != $this->input->post("access_time_to")){
                $params['access_time_to'] = $this->common->from_date_convert(date("H:i:s", strtotime($this->input->post("access_time_to"))), $this->session->userdata('web_timezone'), 'UTC', 'H:i:s');
            }

            // Update user_right details 
            $this->user_right_model->update_user_right($user_right_id, $params);

            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_user_right_update_success'));
            redirect('company/user_right/listing/', 'refresh');
        }
    }

    /*View user_right profile*/
    function view()
    {
        if (!$this->uri->segment(4)) 
        {
            redirect('company/user_right/listing','refresh');
        }
        $data = array();
        if(!empty($this->input->cookie('tab_id', TRUE))){
            $data['tab_id'] = $this->input->cookie('tab_id', TRUE);
        } else {
            $data['tab_id'] = "1";
        }
        $data['result'] = $this->user_right_model->get_user_right_data($this->uri->segment(4));
        $this->load->view($this->view_folder.'view', $data);
    }

    /*Change user_right status*/
    function user_right_state()
    {   
        if (!$this->uri->segment(4) && !$this->uri->segment(5)) {
            echo json_encode();
        }
        $ID = $this->uri->segment(4);
        $state = $this->uri->segment(5);
        $this->user_right_model->user_right_state($ID,$state);
        
        echo json_encode();
    }

    /* Delete user_right */
    function delete($user_right_id)
    {   
        if (!$user_right_id) {
            echo json_encode();
        }
        $this->user_right_model->update_user_right($user_right_id,array('void' => 'Yes'));
        echo json_encode();
    }

 }
