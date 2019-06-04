<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Claims extends MYcom_Controller {

	private $view_folder = 'company/claims/';
	function __construct()
    {
        parent::__construct();
        
        $this->load->model('company/claims_model','this_model');
    }

    /*Default index call*/
	function index()
	{
		$this->listing();
	}

    /*Listing all claims*/
	function listing()
    {
        
        $data = array();
        $data['title']= $this->lang->line('title_view_claims');
        $data['second_title']= $this->lang->line('title_claims_list');
        $this->loadView($this->view_folder.'listing', $data);
    }

    /*List all claims by ajax call*/
    function ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->this_model->get_datatables();
        $data = array();

        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->this_model->count_filtered(),'sort'=>'asc','field'=>'company_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
    } 

    /*Add new claims*/
    function add()
    {
        $data = array();
        $data['title']= $this->lang->line('title_add_new_claims');
        $data['second_title']= $this->lang->line('title_claims_list');
        $data['css'] = ['customer'];
        $data['js'] = ['claim'];
        $data['function'] = 'add';
        $data['formAction'] = SITE_URL+'company/claims/add';
        $data['max_value']= $this->Main_model->maxId('tbl_claims');
        $this->form_validation->set_rules('claim_date',$this->lang->line('field_claim_date'),'required|trim');
        $this->form_validation->set_rules('fname',$this->lang->line('field_first_name'),'required|trim');
        $this->form_validation->set_rules('lname',$this->lang->line('field_last_name'),'required|trim');

        if($this->input->post('telephone_number') == "" && $this->input->post('cellphone_number') == ""){
        $this->form_validation->set_rules('telephone_number',$this->lang->line('field_telephone_number'),'required|trim');
        $this->form_validation->set_rules('cellphone_number',$this->lang->line('field_cellphone_number'),'required|trim');
        }

        $this->form_validation->set_rules('invoice_number',$this->lang->line('field_invoice_number'),'required|trim');
        $this->form_validation->set_rules('status',$this->lang->line('field_status'),'required|trim|in_list[Open,Processing,Closed]');
        $this->form_validation->set_rules('claim',$this->lang->line('label_claim'),'required|trim');

        $this->form_validation->set_rules('created_date',$this->lang->line('label_created_date'),'required|trim');
        $this->form_validation->set_rules('created_by',$this->lang->line('label_created_by'),'required|trim');

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $this->loadView($this->view_folder.'add', $data);
        } 
        else 
        {   
            $claim_history = $this->username.'  '.date('m-d-Y h:i A').'<br/>'.$this->input->post('claim');
            
            $params = array(
                'claim_date' => date("Y-m-d",strtotime($this->input->post('claim_date'))),
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'telephone_number' => $this->input->post('telephone_number'),
                'cellphone_number' => $this->input->post('cellphone_number'),
                'invoice_number' => $this->input->post('invoice_number'),
                'status' => $this->input->post('status'),
                'claim' => $this->input->post('claim'),
                'claim_history' => $claim_history,
                'user_id' => $this->id,
            );

            
            $id = $this->this_model->add_claims($params);
 
            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_claims_add_success'));
            redirect('company/claims/listing/','refresh');
        }
    }

  
    /*Update claims details*/
    function edit()
    {
        $claims_id = $this->uri->segment(4);

        $data = array();
        $data['title']= $this->lang->line('title_edit_claims');
        $data['second_title']= $this->lang->line('title_claims_list');
        $data['css'] = ['customer'];
        $data['js'] = ['claim'];
        $data['function'] = 'add';
        $data['max_value']= $this->Main_model->maxId('tbl_claims');
        $data['formAction'] = SITE_URL.'company/claims/edit/'.$claims_id;
        $claims_data = $data['result'] = $this->this_model->get_claims_data($claims_id);
        
        if(empty($claims_data))
        redirect('company/claims/listing','refresh');

        
        $this->form_validation->set_rules('fname',$this->lang->line('field_first_name'),'required|trim');
        $this->form_validation->set_rules('lname',$this->lang->line('field_last_name'),'required|trim');

        if($this->input->post('telephone_number') == "" && $this->input->post('cellphone_number') == ""){
        $this->form_validation->set_rules('telephone_number',$this->lang->line('field_telephone_number'),'required|trim');
        $this->form_validation->set_rules('cellphone_number',$this->lang->line('field_cellphone_number'),'required|trim');
        }

        $this->form_validation->set_rules('status',$this->lang->line('field_status'),'required|trim|in_list[Open,Processing,Closed]');
        $this->form_validation->set_rules('claim',$this->lang->line('label_claim'),'required|trim');

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $this->loadView($this->view_folder.'add', $data);
        } 
        else 
        {   
            $claim_history = $this->username.'  '.date('m-d-Y h:i A').'<br/>'.$this->input->post('claim').'<br/><br/>'.$claims_data['claim_history'];
            
            $params = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'telephone_number' => $this->input->post('telephone_number'),
                'cellphone_number' => $this->input->post('cellphone_number'),
                'status' => $this->input->post('status'),
                'claim' => $this->input->post('claim'),
                'claim_history' => $claim_history,
                'updated_by' => $this->id,
            );


        
       
            $this->this_model->update_claims($claims_id, $params);
            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_claims_update_success'));
            redirect('company/claims/listing/', 'refresh');
        
    }
    }
    /*View claims profile*/
    function view()
    {
        if (!$this->uri->segment(4)) 
        {
            redirect('company/claims/listing','refresh');
        }
        $data = array();
        if(!empty($this->input->cookie('tab_id', TRUE))){
            $data['tab_id'] = $this->input->cookie('tab_id', TRUE);
        } else {
            $data['tab_id'] = "1";
        }
        $data['result'] = $this->this_model->get_claims_data($this->uri->segment(4));
        $this->load->view($this->view_folder.'view', $data);
    }

    /*Delete claims*/
    function delete($claim_id)
    {   
        if (!$claim_id) {
            echo json_encode();
        }
        $this->this_model->update_claims($claim_id,array('void' => 'Yes'));
        echo json_encode();
    }
}