<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Agent extends MYcom_Controller {

	private $view_folder = 'company/agent/';
	function __construct()
    {
        parent::__construct();
        
       

        $this->load->model('company/agent_model');
    }

    /*Default index call*/
	function index()
	{
		$this->listing();
	}

    /*Listing all drivers*/
	function listing()
    {
        $data = array();
        $data['title'] = $this->lang->line('title_agent_list');
        $data['second_title'] = $this->lang->line('title_add_agent');
        
        $this->loadView($this->view_folder.'listing', $data);
    }

    /*List all driver by ajax call*/
    function ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->agent_model->get_datatables();
        $data = array();

        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->agent_model->count_filtered(),'sort'=>'asc','field'=>'company_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
    } 

    /*Add new driver*/
    function add()
    {
        $data = array();
        /*$data['title'] = $this->lang->line('title_agent_list');
        $data['second_title'] = $this->lang->line('title_add_agent');*/
        $data['title'] = $this->lang->line('title_add_agent');
        $data['second_title'] = $this->lang->line('title_agent_list');
        $data['css'] = ['customer'];
        $data['max_value']= $this->Main_model->maxId('agent');
        $data['formAction'] = 'company/agent/add/';
        $data['js'] = ['https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js',MAP_API_URL,'agent'];
        $data['function'] = 'add';
         $this->form_validation->set_rules('agent_company',$this->lang->line('label_agent_company'),'required|trim');
        $this->form_validation->set_rules('fname',$this->lang->line('field_first_name'),'required|trim');
        $this->form_validation->set_rules('lname',$this->lang->line('field_last_name'),'required|trim');
        $this->form_validation->set_rules('address_1',$this->lang->line('field_address'),'required|trim');
        //$this->form_validation->set_rules('address_2',$this->lang->line('field_address'),'trim');
        $this->form_validation->set_rules('city',$this->lang->line('field_city'),'required|trim');
        $this->form_validation->set_rules('state',$this->lang->line('field_state'),'required|trim');
        $this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'required|trim');
        $this->form_validation->set_rules('telephone_number',$this->lang->line('field_telephone_number'),'required'); 
        $this->form_validation->set_rules('cellphone_number',$this->lang->line('field_cellphone_number'),'required');
        if($this->input->post('email') != ''){

            $this->form_validation->set_rules('email',$this->lang->line('label_email'),'valid_email');
        }
       
        //$this->form_validation->set_rules('header',$this->lang->line('label_header'),'required|trim');
        //$this->form_validation->set_rules('percentage',$this->lang->line('label_percentage'),'required|trim|numeric');
        //$this->form_validation->set_rules('agent_module',$this->lang->line('label_agent_module'),'required|trim');
        //$this->form_validation->set_rules('comment',$this->lang->line('label_comment'),'required|trim');
        
        // if(empty($this->input->post('cellphone_number'))){
        //     $this->form_validation->set_rules('telephone_number',$this->lang->line('field_telephone_number'),'required|trim');
        // } 
        // if(empty($this->input->post('telephone_number'))){
        //     $this->form_validation->set_rules('cellphone_number',$this->lang->line('field_cellphone_number'),'required|trim');
        // }
        
        
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            //$this->loadView($this->view_folder.'listing', $data);
            // echo validation_errors();
            // die;
            $this->loadView($this->view_folder.'add', $data);
        } 
        else 
        {   

            /* check email already registered or not? */
            $already_register = $this->agent_model->check_param(array('email' => $this->input->post('email')));
            if(!empty($already_register)){
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_email_exist'));
                //$this->load->view($this->view_folder.'add', $data);
                $this->loadView($this->view_folder.'add', $data);
                 return;
            }
        
            $params = array(
                'user_id' => $this->id,
                'company_name'=>'',
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'address_1' => $this->input->post('address_1'),
                'address_2' => $this->input->post('address_2'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zipcode' => $this->input->post('zipcode'),
                'telephone' => $this->input->post('telephone_number'),
                'cellphone' => $this->input->post('cellphone_number'),
                'header' => $this->input->post('header'),
                'comment ' => $this->input->post('comment'),
                'agent_company ' => $this->input->post('agent_company'),
                'percentage  ' => $this->input->post('percentage'),
                'agent_module  ' => $this->input->post('agent_module'),
            );

            $id = $this->agent_model->add_agent($params);
            $this->Main_model->updateCompanyRefIds('agent_id',$id);
            $this->session->set_flashdata('succ_msg1', $this->lang->line('label_agent_added_successfully'));

            redirect('company/agent/','refresh');
        }
    }

    function edit(){
        
        $agent_id = $this->uri->segment(4);
        $data = array();
        $agent_data = $data['result'] = $this->agent_model->get_agent_data($agent_id);
        
        /*$data['title'] = $this->lang->line('title_agent_list');
        //$data['second_title'] = $this->lang->line('title_add_new_driver');
        $data['second_title'] = "Edit Agent";*/

        $data['title'] = "Edit Agent Details";
        $data['second_title'] = "Agent List";
        $data['css'] = ['customer'];
        $data['formAction'] = 'company/agent/edit/'.$agent_id;
        $data['js'] = ['https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js',MAP_API_URL,'agent'];
        $data['function'] = 'add';
        

        $this->form_validation->set_rules('fname',$this->lang->line('field_first_name'),'required|trim');
        $this->form_validation->set_rules('lname',$this->lang->line('field_last_name'),'required|trim');
        $this->form_validation->set_rules('address_1',$this->lang->line('field_address'),'required|trim');
        $this->form_validation->set_rules('address_2',$this->lang->line('field_address'),'trim');
        $this->form_validation->set_rules('city',$this->lang->line('field_city'),'required|trim');
        $this->form_validation->set_rules('state',$this->lang->line('field_state'),'required|trim');
        $this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'required|trim');
        $this->form_validation->set_rules('email',$this->lang->line('label_email'),'required|trim|valid_email');
        $this->form_validation->set_rules('agent_company',$this->lang->line('label_agent_company'),'required|trim');
       // $this->form_validation->set_rules('header',$this->lang->line('label_header'),'required|trim');
        $this->form_validation->set_rules('percentage',$this->lang->line('label_percentage'),'required|trim|numeric');
        $this->form_validation->set_rules('agent_module',$this->lang->line('label_agent_module'),'required|trim');
        //$this->form_validation->set_rules('comment',$this->lang->line('label_comment'),'required|trim');
        

        if(empty($this->input->post('cellphone_number'))){
            $this->form_validation->set_rules('telephone_number',$this->lang->line('field_telephone_number'),'required|trim');
        } 
        if(empty($this->input->post('telephone_number'))){
            $this->form_validation->set_rules('cellphone_number',$this->lang->line('field_cellphone_number'),'required|trim');
        }
        
        
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            //$this->loadView($this->view_folder.'listing', $data);
            
            $this->loadView($this->view_folder.'add', $data);
        } 
        else 
        {   

            /* check email already registered or not? */
            if($agent_data['email'] != $this->input->post('email')){
                $already_register = $this->agent_model->check_param(array('email' => $this->input->post('email')));
                if(!empty($already_register)){
                    $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_email_exist'));
                    $this->load->view($this->view_folder.'add', $data); return;
                }
            }


            if($agent_data['telephone'] != $this->input->post('telephone_number')){
                $already_register = $this->agent_model->check_param(array('telephone' => $this->input->post('telephone_number')));
                if(!empty($already_register)){
                    $this->session->set_flashdata('err_msg1', $this->lang->line('telephone_number_is_already_exist'));
                    $this->load->view($this->view_folder.'add', $data); return;
                }
            }


            if($agent_data['cellphone'] != $this->input->post('cellphone_number')){
                $already_register = $this->agent_model->check_param(array('cellphone' => $this->input->post('cellphone_number')));
                if(!empty($already_register)){
                    $this->session->set_flashdata('err_msg1', $this->lang->line('cellphone_number_is_already_exist'));
                    $this->load->view($this->view_folder.'add', $data); return;
                }
            }


        
            $params = array(
                'user_id' => $this->id,
                'company_name'=>'',
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'address_1' => $this->input->post('address_1'),
                'address_2' => $this->input->post('address_2'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zipcode' => $this->input->post('zipcode'),
                'telephone' => $this->input->post('telephone_number'),
                'cellphone' => $this->input->post('cellphone_number'),
                'header' => $this->input->post('header'),
                'comment ' => $this->input->post('comment'),
                'agent_company ' => $this->input->post('agent_company'),
                'percentage  ' => $this->input->post('percentage'),
                'agent_module  ' => $this->input->post('agent_module'),
            );

            
            $this->agent_model->update_driver($agent_id,$params);
        

            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_agent_update_success'));
            redirect('company/agent/', 'refresh');
        }

    }
  
   

    /*View driver profile*/
    function view()
    {
        if (!$this->uri->segment(4)) 
        {
            redirect('company/driver/listing','refresh');
        }
        $data = array();
        if(!empty($this->input->cookie('tab_id', TRUE))){
            $data['tab_id'] = $this->input->cookie('tab_id', TRUE);
        } else {
            $data['tab_id'] = "1";
        }
        $data['result'] = $this->driver_model->get_driver_data($this->uri->segment(4));
        $this->load->view($this->view_folder.'view', $data);
    }

    /*Change driver status*/
    function driver_state()
    {   
        if (!$this->uri->segment(4) && !$this->uri->segment(5)) {
            echo json_encode();
        }
        $ID = $this->uri->segment(4);
        $state = $this->uri->segment(5);
        $this->driver_model->driver_state($ID,$state);
        
        echo json_encode();
    }

    /* Delete driver */
    function delete($agent_id)
    {   
        if (!$agent_id) {
            echo json_encode();
        }
        $this->agent_model->update_driver($agent_id,array('void' => 'Yes'));
        echo json_encode();
    }

    /* Generate unique user name */
    function unique_user_name(){
        $data = array('user_name' => "");
        if(!empty($this->input->post('fname')) && !empty($this->input->post('lname'))){
            $data['user_name'] = str_replace(" ", "_", strtolower(substr(trim($this->input->post('fname')),0,1).trim($this->input->post('lname'))));

            $i = 0;
            /* check user name exist in database or not? */
            read:
                $already_register = $this->driver_model->check_param(array('user_name' => $data['user_name']));
                if(!empty($already_register)){
                    $i++;
                    $data['user_name'] = $data['user_name'].$i;
                    goto read;
                }
        } 
        header('Content-Type: application/json');
        die(json_encode($data));
    }

 }
