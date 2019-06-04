<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Branch extends MYcom_Controller {

	private $view_folder = 'company/branch/';
	function __construct()
    {
        parent::__construct();
       
        
        $this->load->model('company/branch_model');
    }

    /*Default index call*/
	function index()
	{
		$this->listing();
	}

    /*Listing all branch*/
	function listing()
    {
        $data = array();
        $data['title'] = $this->lang->line('title_branch_list'); 
        $data['second_title'] = $this->lang->line('title_branch_list');
        
        $this->loadView($this->view_folder.'listing', $data);
    }

    /*List all branch by ajax call*/
    function ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->branch_model->get_datatables();
        $data = array();

        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->branch_model->count_filtered(),'sort'=>'asc','field'=>'company_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
    } 

    /*Add new branch*/
    function add()
    {
        
        $data['css'] = ['custom'];
        $data['title'] = $this->lang->line('title_add_new_branch');
        $data['second_title'] = $this->lang->line('title_branch_list');
        $data['js'] = ['branch','jquery.geocomplete',MAP_API_URL];
        $data['function'] = 'add';
        $data['formAction'] = 'company/branch/add/';
        $data['max_value'] =    $this->Main_model->maxId('tbl_branch');
        $this->form_validation->set_rules('name',$this->lang->line('field_name'),'required|trim');
        $this->form_validation->set_rules('address_line_1',$this->lang->line('field_address_line_1'),'required|trim');
        $this->form_validation->set_rules('address_line_2',$this->lang->line('field_address_line_2'),'required|trim');
        $this->form_validation->set_rules('city',$this->lang->line('field_city'),'required|trim');
        $this->form_validation->set_rules('state',$this->lang->line('field_state'),'required|trim');
        $this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'required|trim');
        $this->form_validation->set_rules('telephone_number1',$this->lang->line('field_telephone_number'),'required|trim');
        $this->form_validation->set_rules('telephone_number2',$this->lang->line('field_telephone_number'),'required|trim');
        $this->form_validation->set_rules('print',$this->lang->line('field_print'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('country',$this->lang->line('field_country'),'required|trim');

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');

        if ($this->form_validation->run() == FALSE)
        {
            
            $this->loadView($this->view_folder.'add', $data);
        } 
        else 
        {   
            /* check email already registered or not? */
            $already_register = $this->branch_model->check_param(array('email' => $this->input->post('email')));
            if(!empty($already_register)){
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_email_exist'));
                $this->load->view($this->view_folder.'add', $data); return;
            }

            /* 
                'invoice_number' => $this->input->post('invoice_number'),
                'receipt_number' => $this->input->post('receipt_number'),
                'barcode_number' => $this->input->post('barcode_number'),
                'expense_number' => $this->input->post('expense_number'),
            */

            $params = array(
                'name' => $this->input->post('name'),
                'email' => '',
                'address' => '',
                'address_line1' => $this->input->post('address_line_1'),
                'address_line2' => $this->input->post('address_line_2'),
                'borough' => '',
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
                'zone' => '',
                'zipcode' => $this->input->post('zipcode'),
                'telephone_number1' => $this->input->post('telephone_number1'),
                'telephone_number2' => $this->input->post('telephone_number2'),
                'container' => '',
                'type' => '',
                'report_group' => '',
                'print' => $this->input->post('print'),
            );

            if(!empty($this->input->post('latitude'))){
                $params['latitude'] = $this->input->post('latitude');
            }
            if(!empty($this->input->post('longitude'))){
                $params['longitude'] = $this->input->post('longitude');
            }

            $id = $this->branch_model->add_branch($params);
            $this->Main_model->updateCompanyRefIds('branch_id',$id);
            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_branch_add_success'));
            redirect('company/branch/listing/','refresh');
        }
    }

  
    /*Update branch details*/
    function edit($branch_id)
    {
         if(!ctype_digit($branch_id)){
            redirect('company/branch/listing/', 'refresh');
         }

        $data = array();
        $data['css'] = ['custom'];
        $data['title'] = $this->lang->line('title_edit_branch');
        $data['second_title'] = $this->lang->line('title_branch_list');
        $data['js'] = ['branch','jquery.geocomplete',MAP_API_URL];
        $data['function'] = 'add';
        $data['max_value'] =  $branch_id  ;
        
        $data['result'] = $this->branch_model->get_branch_data($branch_id);
        
        $data['formAction'] = 'company/branch/edit/'.$branch_id;

        if(empty($data['result']))
        redirect('company/branch/listing','refresh');

        $this->form_validation->set_rules('name',$this->lang->line('field_name'),'required|trim');
        $this->form_validation->set_rules('address_line_1',$this->lang->line('field_address_line_1'),'required|trim');
        $this->form_validation->set_rules('address_line_2',$this->lang->line('field_address_line_2'),'required|trim');
        $this->form_validation->set_rules('city',$this->lang->line('field_city'),'required|trim');
        $this->form_validation->set_rules('state',$this->lang->line('field_state'),'required|trim');
        $this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'required|trim');
        $this->form_validation->set_rules('telephone_number1',$this->lang->line('field_telephone_number'),'required|trim');
        $this->form_validation->set_rules('telephone_number2',$this->lang->line('field_telephone_number'),'required|trim');
        $this->form_validation->set_rules('print',$this->lang->line('field_print'),'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('country',$this->lang->line('field_country'),'required|trim');

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');

        if ($this->form_validation->run() == FALSE)
        {
            $this->loadView($this->view_folder.'add', $data);
        } 
        else 
        {   
           

            $params = array(
                'name' => $this->input->post('name'),
                'email' => '',
                'address' => '',
                'address_line1' => $this->input->post('address_line_1'),
                'address_line2' => $this->input->post('address_line_2'),
                'borough' => '',
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
                'zone' => '',
                'zipcode' => $this->input->post('zipcode'),
                'telephone_number1' => $this->input->post('telephone_number1'),
                'telephone_number2' => $this->input->post('telephone_number2'),
                'container' => '',
                'type' => '',
                'report_group' => '',
                'print' => $this->input->post('print')
            );

            if(!empty($this->input->post('latitude'))){
                $params['latitude'] = $this->input->post('latitude');
            }
            if(!empty($this->input->post('longitude'))){
                $params['longitude'] = $this->input->post('longitude');
            }

            // Update branch details 
            $this->branch_model->update_branch($branch_id, $params);

            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_branch_update_success'));
            redirect('company/branch/listing/', 'refresh');
        }

    }

    /*View branch profile*/
    function view()
    {
        if (!$this->uri->segment(4)) 
        {
            redirect('company/branch/listing','refresh');
        }
        $data = array();
        if(!empty($this->input->cookie('tab_id', TRUE))){
            $data['tab_id'] = $this->input->cookie('tab_id', TRUE);
        } else {
            $data['tab_id'] = "1";
        }
        $data['result'] = $this->branch_model->get_branch_data($this->uri->segment(4));
        $this->load->view($this->view_folder.'view', $data);
    }

    /*Change branch status*/
    function branch_state()
    {   
        if (!$this->uri->segment(4) && !$this->uri->segment(5)) {
            echo json_encode();
        }
        $ID = $this->uri->segment(4);
        $state = $this->uri->segment(5);
        $this->branch_model->branch_state($ID,$state);
        
        echo json_encode();
    }

    /* Delete branch */
    function delete($branch_id)
    {   
        if (!$branch_id) {
            echo json_encode();
        }
        $this->branch_model->update_branch($branch_id,array('void' => 'Yes'));
        echo json_encode();
    }
    function getBranch(){
        if($this->input->post() && $this->input->is_ajax_request()){
                        $where['where'] = ['zipcode' => $this->input->post('zipcode')];
            $response = $this->branch_model->getBranch($where);
            if($response){
                apiResponse(1,$response[0]);
            }else{
                apiResponse(0,"","Branch not found");
            }
            

        }
    }
 }
