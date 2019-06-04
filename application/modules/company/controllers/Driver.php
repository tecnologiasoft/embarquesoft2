<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Driver extends MYcom_Controller {

	private $view_folder = 'company/driver/';
	function __construct()
    {
        parent::__construct();
        
       

        $this->load->model('company/driver_model');
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
        $data['title'] = $this->lang->line('title_driver_list');
        $data['second_title'] = $this->lang->line('title_add_new_driver');
        
        $this->loadView($this->view_folder.'listing', $data);
    }

    /*List all driver by ajax call*/
    function ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->driver_model->get_datatables();
        $data = array();

        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->driver_model->count_filtered(),'sort'=>'asc','field'=>'company_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
    } 

    /*Add new driver*/
    function add()
    {
        $data = array();
        /*$data['title'] = $this->lang->line('title_driver_list');
        $data['second_title'] = $this->lang->line('title_add_new_driver');*/
        $data['title'] = $this->lang->line('title_add_new_driver');
        $data['second_title'] = $this->lang->line('title_driver_list');
        $data['css'] = ['customer'];
        $data['max_value']= $this->Main_model->maxId('tbl_driver');
        $data['formAction'] = 'company/driver/add/';
        $data['js'] = ['https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js',MAP_API_URL,'driver'];
        $data['function'] = 'add';
        $this->load->model('company/branch_model');
        $data['branch_list'] = $this->branch_model->getBranch($id);
        $data['next_id'] = $this->driver_model->get_next_id();

        //$this->form_validation->set_rules('co_driverid',$this->lang->line('field_driverid'),'required|trim');
        //$this->form_validation->set_rules('company_name',$this->lang->line('field_company_name'),'required|trim');
        //$this->form_validation->set_rules('driver_code',$this->lang->line('field_driver_code'),'required|trim');
        $this->form_validation->set_rules('username',$this->lang->line('field_user_name'),'required|trim');
        $this->form_validation->set_rules('fname',$this->lang->line('field_first_name'),'required|trim');
        $this->form_validation->set_rules('lname',$this->lang->line('field_last_name'),'required|trim');
        $this->form_validation->set_rules('email', $this->lang->line('field_email'), 'required|trim|valid_email');
        $this->form_validation->set_rules('password',$this->lang->line('field_password'),'required|trim|min_length[4]');
        $this->form_validation->set_rules('confirmpassword', $this->lang->line('field_confirm_password'), 'required|trim|matches[password]');

        $this->form_validation->set_rules('address',$this->lang->line('field_address'),'required|trim');
        $this->form_validation->set_rules('address_line_1',$this->lang->line('field_address_line_1'),'trim');
        
        //$this->form_validation->set_rules('borough',$this->lang->line('field_borough'),'required|trim');
        $this->form_validation->set_rules('city',$this->lang->line('field_city'),'required|trim');
        $this->form_validation->set_rules('state',$this->lang->line('field_state'),'required|trim');
        $this->form_validation->set_rules('country',$this->lang->line('field_country'),'required|trim');
        $this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'required|trim');

        if(empty($this->input->post('cellphone_number'))){
            $this->form_validation->set_rules('cellphone_number',$this->lang->line('field_cellphone_number'),'required|trim');
        } 
        if(empty($this->input->post('telephone_number'))){
            $this->form_validation->set_rules('telephone_number',$this->lang->line('field_telephone_number'),'required|trim');
        }
        //$this->form_validation->set_rules('container',$this->lang->line('field_container'),'trim');
        //$this->form_validation->set_rules('country_ship_to',$this->lang->line('field_country_ship_to'),'required|trim');
        //$this->form_validation->set_rules('void',$this->lang->line('field_void'),'required|trim|in_list[Yes,No]');
       #$this->form_validation->set_rules('driver_group',$this->lang->line('field_driver_group'),'required|trim|in_list[Agent,Branch]');
        //$this->form_validation->set_rules('cnum',$this->lang->line('field_cnum'),'required|trim|in_list[Yes,No]');
        //$this->form_validation->set_rules('driver',$this->lang->line('field_driver'),'required|trim|in_list[Yes,No,Both]');
        #$this->form_validation->set_rules('start_time',$this->lang->line('field_start_time'),'required|trim');
        #$this->form_validation->set_rules('end_time',$this->lang->line('field_end_time'),'required|trim');

        #$this->form_validation->set_rules('barcode',$this->lang->line('field_barcode'),'required|trim');
        #$this->form_validation->set_rules('invoice_number',$this->lang->line('field_invoice_number'),'required|trim');
        #$this->form_validation->set_rules('receipt_number',$this->lang->line('field_receipt_number'),'required|trim');
        #$this->form_validation->set_rules('expense_number',$this->lang->line('field_expense_number'),'required|trim');
        #$this->form_validation->set_rules('customer_number',$this->lang->line('field_customer_number'),'required|trim');
        #$this->form_validation->set_rules('appcode',$this->lang->line('field_appcode'),'required|trim');
        /*$this->form_validation->set_rules('days',$this->lang->line('field_days'),'required|trim');*/
       # $this->form_validation->set_rules('sec_add_cust',$this->lang->line('field_sec_add_cust'),'required|trim|in_list[Yes,No]');
        #$this->form_validation->set_rules('sec_add_pickup',$this->lang->line('field_sec_add_pickup'),'required|trim|in_list[Yes,No]');
        #$this->form_validation->set_rules('sec_only_pickup',$this->lang->line('field_sec_only_pickup'),'required|trim|in_list[Yes,No]');
        #$this->form_validation->set_rules('branch_id',$this->lang->line('field_branch'),'required|trim');
        
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
            /* check driver name already registered or not? */
            $already_register = $this->driver_model->check_param(array('user_name' => $this->input->post('username')));
            if(!empty($already_register)){
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_user_name_exist'));
                $this->loadView($this->view_folder.'add', $data);
                //$this->load->view($this->view_folder.'add', $data); 
                return;
            }
            /* check email already registered or not? */
            $already_register = $this->driver_model->check_param(array('email' => $this->input->post('email')));
            if(!empty($already_register)){
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_email_exist'));
                $this->loadView($this->view_folder.'add', $data);
                //$this->load->view($this->view_folder.'add', $data); 
                return;
            }

            

            /*'co_driverid' => $this->input->post('co_driverid'),
            'company_name' => $this->input->post('company_name'),
            'cnum' => $this->input->post('cnum'),
            'driver' => $this->input->post('driver'),
            'void' => $this->input->post('void'),*/
            $params = array(
                'user_name' => $this->input->post('username'),
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
//                'borough' => $this->input->post('borough'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
                'zipcode' => $this->input->post('zipcode'),
                'password' => md5($this->input->post('password')),
                'branch_id' => $this->input->post('branch_id'),
            );

            if(!empty($this->input->post('telephone_number'))){
                $params['telephone_number'] = $this->input->post('telephone_number');
            } else {
                $params['telephone_number'] = "";
            }

            if(!empty($this->input->post('cellphone_number'))){
                $params['cellphone_number'] = $this->input->post('cellphone_number');
            } else {
                $params['cellphone_number'] = "";
            } 
             if(!empty($this->input->post('cellphone_number'))){
                $params['address_line2'] = $this->input->post('address_line_2');
            } else {
                $params['address_line2'] = "";
            }
            

            if(!empty($this->input->post('latitude'))){
                $params['latitude'] = $this->input->post('latitude');
            }
            if(!empty($this->input->post('longitude'))){
                $params['longitude'] = $this->input->post('longitude');
            }
            if(!empty($this->input->post('address_line_1'))){
                $params['address_line1'] = $this->input->post('address_line_1');
            } 
            
            

            $id = $this->driver_model->add_driver($params);
            $this->Main_model->updateCompanyRefIds('driver_id',$id);
            // Update driver details 
            //$this->driver_model->update_driver($id, array('driver_code' => $id));

            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_driver_add_success'));
            redirect('company/driver/','refresh');
        }
    }

    function edit(){
        
        $driver_id = $this->uri->segment(4);
        $data = array();
        $driver_data = $data['result'] = $this->driver_model->get_driver_data($driver_id);
        /*$data['title'] = $this->lang->line('title_driver_list');
        $data['second_title'] = $this->lang->line('title_add_new_driver');*/
        $data['title'] = "Edit Driver Details";
        $data['second_title'] = $this->lang->line('title_driver_list');
        $data['css'] = ['customer'];
        $data['max_value']= $this->Main_model->maxId('tbl_driver');
        $data['formAction'] = 'company/driver/edit/'.$driver_id;
        $data['js'] = ['https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js',MAP_API_URL,'driver'];
        $data['function'] = 'add';
        $this->load->model('company/branch_model');
        $data['branch_list'] = $this->branch_model->getBranch($id);

        //$this->form_validation->set_rules('co_driverid',$this->lang->line('field_driverid'),'required|trim');
        //$this->form_validation->set_rules('company_name',$this->lang->line('field_company_name'),'required|trim');
        //$this->form_validation->set_rules('driver_code',$this->lang->line('field_driver_code'),'required|trim');
        $this->form_validation->set_rules('username',$this->lang->line('field_user_name'),'required|trim');
        $this->form_validation->set_rules('fname',$this->lang->line('field_first_name'),'required|trim');
        $this->form_validation->set_rules('lname',$this->lang->line('field_last_name'),'required|trim');
        $this->form_validation->set_rules('email', $this->lang->line('field_email'), 'required|trim|valid_email');
        if($this->input->post('password') != ''){
        $this->form_validation->set_rules('password',$this->lang->line('field_password'),'required|trim|min_length[4]');
        $this->form_validation->set_rules('confirmpassword', $this->lang->line('field_confirm_password'), 'required|trim|matches[password]');
        }

        $this->form_validation->set_rules('address',$this->lang->line('field_address'),'required|trim');
        $this->form_validation->set_rules('address_line_1',$this->lang->line('field_address_line_1'),'trim');
        
        //$this->form_validation->set_rules('borough',$this->lang->line('field_borough'),'required|trim');
        $this->form_validation->set_rules('city',$this->lang->line('field_city'),'required|trim');
        $this->form_validation->set_rules('state',$this->lang->line('field_state'),'required|trim');
        $this->form_validation->set_rules('country',$this->lang->line('field_country'),'required|trim');
        $this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'required|trim');

        if(empty($this->input->post('cellphone_number'))){
            $this->form_validation->set_rules('cellphone_number',$this->lang->line('field_cellphone_number'),'required|trim');
        } 
        if(empty($this->input->post('telephone_number'))){
            $this->form_validation->set_rules('telephone_number',$this->lang->line('field_telephone_number'),'required|trim');
        }
        //$this->form_validation->set_rules('container',$this->lang->line('field_container'),'trim');
        //$this->form_validation->set_rules('country_ship_to',$this->lang->line('field_country_ship_to'),'required|trim');
        //$this->form_validation->set_rules('void',$this->lang->line('field_void'),'required|trim|in_list[Yes,No]');
       #$this->form_validation->set_rules('driver_group',$this->lang->line('field_driver_group'),'required|trim|in_list[Agent,Branch]');
        //$this->form_validation->set_rules('cnum',$this->lang->line('field_cnum'),'required|trim|in_list[Yes,No]');
        //$this->form_validation->set_rules('driver',$this->lang->line('field_driver'),'required|trim|in_list[Yes,No,Both]');
        #$this->form_validation->set_rules('start_time',$this->lang->line('field_start_time'),'required|trim');
        #$this->form_validation->set_rules('end_time',$this->lang->line('field_end_time'),'required|trim');

        #$this->form_validation->set_rules('barcode',$this->lang->line('field_barcode'),'required|trim');
        #$this->form_validation->set_rules('invoice_number',$this->lang->line('field_invoice_number'),'required|trim');
        #$this->form_validation->set_rules('receipt_number',$this->lang->line('field_receipt_number'),'required|trim');
        #$this->form_validation->set_rules('expense_number',$this->lang->line('field_expense_number'),'required|trim');
        #$this->form_validation->set_rules('customer_number',$this->lang->line('field_customer_number'),'required|trim');
        #$this->form_validation->set_rules('appcode',$this->lang->line('field_appcode'),'required|trim');
        /*$this->form_validation->set_rules('days',$this->lang->line('field_days'),'required|trim');*/
       # $this->form_validation->set_rules('sec_add_cust',$this->lang->line('field_sec_add_cust'),'required|trim|in_list[Yes,No]');
        #$this->form_validation->set_rules('sec_add_pickup',$this->lang->line('field_sec_add_pickup'),'required|trim|in_list[Yes,No]');
        #$this->form_validation->set_rules('sec_only_pickup',$this->lang->line('field_sec_only_pickup'),'required|trim|in_list[Yes,No]');
        #$this->form_validation->set_rules('branch_id',$this->lang->line('field_branch'),'required|trim');
        
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            // echo validation_errors();
            // die;
            //$this->load->view($this->view_folder.'edit', $data);
            $this->loadView($this->view_folder.'add', $data);
        } 
        else 
        {
            /* check email already registered or not? */
            $already_register = $this->driver_model->check_param(array('email' => $this->input->post('email'), 'id !=' => $driver_id  ));
            if(!empty($already_register)){
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_email_exist'));
                //$this->load->view($this->view_folder.'edit', $data); return;
                redirect(base_url('company/driver/edit/').$driver_id, 'refresh');
            }

            /* check user name already registered or not? */
            $already_register = $this->driver_model->check_param(array('user_name' => $this->input->post('user_name'), 'id !=' => $driver_id));
            if(!empty($already_register)){
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_user_name_exist'));
                redirect(base_url('company/driver/edit/').$driver_id, 'refresh');
            }


            /*'co_driverid' => $this->input->post('co_driverid'),
            'company_name' => $this->input->post('company_name'),
            'cnum' => $this->input->post('cnum'),
            'driver' => $this->input->post('driver'),
            'driver_code' => $this->input->post('driver_code'),
            'void' => $this->input->post('void'),*/
          /*'co_driverid' => $this->input->post('co_driverid'),
            'company_name' => $this->input->post('company_name'),
            'cnum' => $this->input->post('cnum'),
            'driver' => $this->input->post('driver'),
            'void' => $this->input->post('void'),*/
            $params = array(
                'user_name' => $this->input->post('username'),
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
               'address_line2' => $this->input->post('address_line_2'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
                'zipcode' => $this->input->post('zipcode'),
                
                'branch_id' => $this->input->post('branch_id'),
            );

            if($this->input->post('password') != ''){
                $params['password'] = md5($this->input->post('password'));
            }

            if(!empty($this->input->post('telephone_number'))){
                $params['telephone_number'] = $this->input->post('telephone_number');
            } else {
                $params['telephone_number'] = "";
            }

            if(!empty($this->input->post('cellphone_number'))){
                $params['cellphone_number'] = $this->input->post('cellphone_number');
            } else {
                $params['cellphone_number'] = "";
            } 

            if(!empty($this->input->post('latitude'))){
                $params['latitude'] = $this->input->post('latitude');
            }
            if(!empty($this->input->post('longitude'))){
                $params['longitude'] = $this->input->post('longitude');
            }
            if(!empty($this->input->post('address_line_1'))){
                $params['address_line1'] = $this->input->post('address_line_1');
            } 

            // Update driver details 
            $this->driver_model->update_driver($driver_id, $params);

            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_driver_update_success'));
            redirect('company/driver/listing/', 'refresh');
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
    function delete($driver_id)
    {   
        if (!$driver_id) {
            echo json_encode();
        }
        $this->driver_model->update_driver($driver_id,array('void' => 'Yes'));
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
