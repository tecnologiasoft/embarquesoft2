<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee extends MYcom_Controller {

	private $view_folder = 'company/employee/';
	function __construct()
    {
        parent::__construct();

        $this->load->model('company/employee_model','this_model');
        //dd($this->session->userdata('userdata'));

        
     

    }

     /*Default index call*/
	function index()
	{
        
		$this->listing();
	}

    /*Listing all users*/
	function listing()
    {
        $data = array();
        $data['title'] = $this->lang->line('employee_list');
        
        
        $this->loadView($this->view_folder.'listing', $data);
    }

    /*List all inventory by ajax call*/
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

    public function checkDuplicateEmail(){

        if($this->this_model->checkDuplicateEmail($this->input->post('email'))){
       $this->form_validation->set_message('checkDuplicateEmail', $this->lang->line("text_customer_email_exist")); 
       return false;
        }
       else{
       return true;
       }
        
    }
    /*Add new inventpry*/
    function add()
    {


      
        
        $data = array();
        $data['max_value'] = $this->Main_model->maxId('employee');
        $data['title'] = $this->lang->line('add_new_employee');
        $data['second_title'] = $this->lang->line('employee_list');
        $data['css'] = ['custom'];
        $data['js'] = ['employee',MAP_API_URL];
        $data['function'] = 'add';
        $data['formAction'] = 'company/employee/add';
        $this->load->model('company/branch_model');

        $data['branch_list'] = $this->branch_model->getBranch();
        $this->form_validation->set_rules('first_name',$this->lang->line('label_first_name'),'required|trim');
        $this->form_validation->set_rules('last_name',$this->lang->line('label_last_name'),'required|trim');
        $this->form_validation->set_rules('telephone', 'tel', 'required|trim|min_length[8]|max_length[14]');
        $this->form_validation->set_rules('country',$this->lang->line('label_country'),'required|trim');
        $this->form_validation->set_rules('branch', 'branch', 'required|trim');
       // $this->form_validation->set_rules('is_driver','is_driver', 'required|trim');
        $this->form_validation->set_rules('is_warehouse', 'is_warehouse','required|trim');
        if($this->input->post('email') != ''){
            $this->form_validation->set_rules('email', 'email','valid_email|callback_checkDuplicateEmail');
        }
        

        
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        
        if ($this->form_validation->run() == FALSE)
        {
            // echo validation_errors();
            // die;
            $this->loadView($this->view_folder.'add', $data);
        } 
        else 
        {   
            $params = array(
                'emp_code' => $this->input->post('item_number_hdn'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'address1' => $this->input->post('address1'),
                'address2' => $this->input->post('address2'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zipcode' => $this->input->post('zipcode'),
                'country' => $this->input->post('country'),
                'cel' => $this->input->post('cel'),
                'tel' => $this->input->post('telephone'),
                'email' => $this->input->post('email'),
                'branch_id' => $this->input->post('branch'),
                
                'is_warehouse' => $this->input->post('is_warehouse'),
                'dob' => $this->input->post('dob'),
                'social_security' => $this->input->post('social_security'),
            );
        
            $id = $this->this_model->add_employee($params);
            $this->Main_model->updateCompanyRefIds('emp_id',$id);
        

             
            
 
            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_employee_add_success'));
            redirect('company/employee/','refresh');
        }
    }



    /*Add new inventpry*/
    function edit($id)
    {
       
        if (!ctype_digit($id)) 
        {
            redirect('company/employee/listing','refresh');
        }
        $data = array();
        
        $data['result'] = $this->this_model->get_employee_data($id);   
        $data['title'] = $this->lang->line('edit').' '.$this->lang->line('label_employee');
        $data['second_title'] = $this->lang->line('employee_list');
        $data['css'] = ['custom'];
        $data['js'] = ['employee',MAP_API_URL];
        $data['function'] = 'add';
        $this->load->model('company/branch_model');
        $data['branch_list'] = $this->branch_model->getBranch();
        $data['formAction'] = 'company/employee/edit/'.$id;
        // echo '<pre>';
        // print_r($data['result']);
        // die;

        $this->form_validation->set_rules('first_name',$this->lang->line('label_first_name'),'required|trim');
        $this->form_validation->set_rules('last_name',$this->lang->line('label_last_name'),'required|trim');
        $this->form_validation->set_rules('telephone', 'telephone', 'required|trim|min_length[8]|max_length[14]');
        $this->form_validation->set_rules('country',$this->lang->line('label_country'),'required|trim');
        $this->form_validation->set_rules('branch', 'branch', 'required|trim');
        //$this->form_validation->set_rules('is_driver','is_driver', 'required|trim');
        $this->form_validation->set_rules('is_warehouse', 'is_warehouse','required|trim');
        if(($this->input->post('email') != '') && ($data['result']['email'] != $this->input->post('email'))){
           $this->form_validation->set_rules('email', 'email','valid_email|callback_checkDuplicateEmail');
        }
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        
        if ($this->form_validation->run() == FALSE)
        {
            // echo validation_errors();
            // die;
            $this->loadView($this->view_folder.'add', $data);
        } 
        else 
        {   

            
    
            $params = array(
                'emp_code' => $this->input->post('item_number_hdn'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'address1' => $this->input->post('address1'),
                'address2' => $this->input->post('address2'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'zipcode' => $this->input->post('zipcode'),
                'country' => $this->input->post('country'),
                'cel' => $this->input->post('cel'),
                'tel' => $this->input->post('telephone'),
                'email' => $this->input->post('email'),
                'branch_id' => $this->input->post('branch'),
                
                'is_warehouse' => $this->input->post('is_warehouse'),
                'dob' => $this->input->post('dob'),
                'social_security' => $this->input->post('social_security'),
            );
            
            $this->this_model->update_employee($id, $params);

            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_employee_updated_success'));
            redirect('company/employee/','refresh');

                     
            
            //$id = $this->this_model->add_inventory($params);

            
 
            
        }
    }
    

    /*Add new inventpry*/
    function edit11($id)
    {
        if (!ctype_digit($id)) 
        {
            redirect('company/inventory/listing','refresh');
        }
        $data = array();
        
        $data['result'] = $this->this_model->get_inventory_data($id);   
        
        
        
        $this->form_validation->set_rules('description',$this->lang->line('field_description'),'required|trim');
        $this->form_validation->set_rules('price',$this->lang->line('field_price'),'required|trim');
        $this->form_validation->set_rules('cost', $this->lang->line('field_cost'), 'required|trim');
        $this->form_validation->set_rules('type',$this->lang->line('field_type'),'required|trim|in_list[Service,Inventory]');
        $this->form_validation->set_rules('qty', $this->lang->line('field_qty'), 'required|trim');
        $this->form_validation->set_rules('recorder_point', $this->lang->line('field_recorder_point'), 'required|trim');
        $this->form_validation->set_rules('driver_inventory', $this->lang->line('field_driver_inventory'), 'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('air', $this->lang->line('field_air'), 'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('country', $this->lang->line('field_country'), 'required|trim');
        $this->form_validation->set_rules('zone', $this->lang->line('field_zone'), 'required|trim');

        // $this->form_validation->set_rules('weight', $this->lang->line('field_weight'), 'required|trim');
        // $this->form_validation->set_rules('width', $this->lang->line('field_width'), 'required|trim');
        // $this->form_validation->set_rules('height', $this->lang->line('field_height'), 'required|trim');
        //$this->form_validation->set_rules('depth', $this->lang->line('field_depth'), 'required|trim');
        $this->form_validation->set_rules('volume_price', $this->lang->line('field_volume_price'), 'required|trim');
        //$this->form_validation->set_rules('weight_price', $this->lang->line('field_weight_price'), 'required|trim');
        $this->form_validation->set_rules('has_insurane', $this->lang->line('field_has_insurane'), 'required|trim|in_list[Yes,No]');
        $this->form_validation->set_rules('insurance_price', $this->lang->line('field_insurance_price'), 'required|trim');
        $this->form_validation->set_rules('insurance_percentage', $this->lang->line('field_insurance_percentage'), 'required|trim');
        $this->form_validation->set_rules('calculate_price', $this->lang->line('field_calculate_price'), 'required|trim');
        //$this->form_validation->set_rules('scanner_type', $this->lang->line('field_scanner_type'), 'required|trim');
         $this->form_validation->set_rules('weight_price_from', 'weight_price_from', 'required|numeric|trim|callback_checkFromTo');
         $this->form_validation->set_rules('weight_price_to', 'weight_price_to','required|numeric|trim');
         $this->form_validation->set_rules('factor_of_volume', 'factor_of_volume','required|trim');
         
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        
        if ($this->form_validation->run() == FALSE)
        {
            // echo validation_errors();
            // die;
            $this->loadView($this->view_folder.'edit', $data);
        } 
        else 
        {   
            $params = array(
                'item_number' => $this->input->post('item_number_hdn'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'cost' => $this->input->post('cost'),
                'type' => $this->input->post('type'),
                'qty' => $this->input->post('qty'),
                'recorder_point' => $this->input->post('recorder_point'),
                'driver_inventory' => $this->input->post('driver_inventory'),
                'air' => $this->input->post('air'),
                'country' => $this->input->post('country'),
                'zone' => $this->input->post('zone'),
                'weight' => '',
                'width' => '',
                'height' => '',
                'depth' => '',
                'volume_price' => $this->input->post('volume_price'),
                'weight_price' => '',
                'has_insurane' => $this->input->post('has_insurane'),
                'insurance_price' => $this->input->post('insurance_price'),
                'insurance_percentage' => $this->input->post('insurance_percentage'),
                'calculate_price' => $this->input->post('calculate_price'),
                'scanner_type' => '',
                'weight_price_from' => $this->input->post('weight_price_from'),
                'weight_price_to' => $this->input->post('weight_price_to'),
                'factor_of_volume' => $this->input->post('factor_of_volume')
            );
            
            $this->this_model->update_inventory($id, $params);
            //$id = $this->this_model->add_inventory($params);

            
 
            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_inventory_update_success'));
            redirect('company/inventory/', 'refresh');
        }
    }
 

     public function checkFromTo(){
         if($this->input->post('weight_price_from') >= $this->input->post('weight_price_to')){

            
            $this->form_validation->set_message('checkFromTo', $this->lang->line("min_max_validation"));
            return false;
             
         }else{
            return true;
         }
     }  

   

    /*View Inventory details*/
    function view()
    {
        if (!$this->uri->segment(4)) 
        {
            if ($this->agent->is_referral())
            {
                redirect($this->agent->referrer(),'refresh');
            }
            redirect('company/inventory/listing','refresh');
        }
        $data = array();

        $data['result'] = $this->this_model->get_inventory_data($this->uri->segment(4));
        $this->load->view($this->view_folder.'view', $data);
    }

    /* Delete inventory */
    function delete()
    {   
        if (!$this->uri->segment(4)) {
            echo json_encode();
        }
        $ID = $this->uri->segment(4);
        $this->this_model->update_employee($ID,array('void' => 'Yes'));
        echo json_encode();
    }



}
