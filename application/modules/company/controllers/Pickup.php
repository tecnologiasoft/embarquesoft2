<?php
use Dompdf\Dompdf;
defined('BASEPATH') OR exit('No direct script access allowed');
class Pickup extends MYcom_Controller {

	private $view_folder = 'company/pickup/';
	function __construct()
    {
        parent::__construct();
        
        // if(!$this->session->userdata('company_id'))
        // {
        //     redirect('company/login/', 'refresh');
        // }
        
        // if ($this->session->userdata('admin_login') == '0') 
        // {
        //     redirect('company/lock', 'refresh');
        // }

        $this->load->model('company/pickup_model');
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
        $this->session->set_userdata('redirect_url', base_url('company/pickup/listing'));
        $this->session->unset_userdata('new_pickup_customer_id','');
        $this->session->unset_userdata('new_pickup_customer_pickup_id','');
        $data['title'] = $this->lang->line('title_pickup_list');
        $this->loadView($this->view_folder.'listing', $data);
    }
  public function pickup_managment(){
    $data = array();
    $this->session->set_userdata('redirect_url', base_url('company/pickup/listing'));
    $this->session->unset_userdata('new_pickup_customer_id','');
    $this->session->unset_userdata('new_pickup_customer_pickup_id','');

    $data['title'] = $this->lang->line('title_pickup_managment');
    $data['driver_list'] = $this->pickup_model->get_driver_list();
    
    
    $data['zone_list'] = $this->pickup_model->get_zone_list();
    $data['css'] = ['custom'];
    
    
    $this->loadView($this->view_folder.'pickup_managment', $data);
    
  }
    /*Listing all customers */
    function customer_listing()
    {
        $data = array();
        $this->session->unset_userdata('new_pickup_customer_id','');
        $this->session->unset_userdata('new_pickup_customer_pickup_id','');
        $data['title'] = $this->lang->line('title_customer_list');
        $this->loadView($this->view_folder.'customer_listing', $data);
    }

    /*List all pickup by ajax call*/
    function ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->pickup_model->get_datatables();
        $data = array();

        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->pickup_model->count_filtered(),'sort'=>'asc','field'=>'company_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
    } 
 
  function pickup_managment_ajax_list(){

     $AllPostData = $this->input->post();
        $list = $this->pickup_model->get_datatables();
        $data = array();

        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->pickup_model->count_filtered(),'sort'=>'asc','field'=>'company_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
  }
    /* session for select customer */
    function select_customer($customer_id = ""){
        if(!empty($customer_id)){
            $this->session->set_userdata('new_pickup_customer_id', $customer_id);
            redirect(base_url("company/pickup/add"));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    /* session for select customer pickup */
    function select_customer_pickup($customer_pickup_id = ""){
        if(!empty($customer_pickup_id)){
            
            $this->session->set_userdata('new_pickup_customer_pickup_id', $customer_pickup_id);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    /*Add new pickup*/
    function add()
    {
        $data = array();
        
        if(empty($this->session->userdata('new_pickup_customer_id'))){
            redirect(base_url("company/pickup/customer_listing"));
        }
        
        $this->session->set_userdata('redirect_url', base_url('company/pickup/add'));
        $data['css'] = ['custom'];
        $data['js'] = ['pickup'];
        $data['function'] = 'add';
        $data['next_id'] = $this->Main_model->maxId('tbl_pickup');
        $data['next_customer_pickup_id'] = $this->Main_model->maxId('tbl_customer_pickup');
        
        $data['branch_list'] = $this->pickup_model->get_branch_list();
        $data['driver_list'] = $this->pickup_model->get_driver_list();
        $data['zone_list'] = $this->pickup_model->get_zone_list();
        $data['customer_details'] = $this->pickup_model->get_customer_data($this->session->userdata('new_pickup_customer_id'));
        $data['title'] = $this->lang->line('title_add_new_pickup');
        
        $data['second_title'] = $this->lang->line('title_pickup_list');
        /*echo "<pre>";
        print_r($data); die;*/
        if($data['customer_details']['disable_pickup'] == "Yes"){
            $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_pickup_disable'));
            redirect(base_url("company/pickup/customer_listing"));   
        }

        $data['customer_pickup_list'] = $this->pickup_model->get_customer_pickup_list($this->session->userdata('new_pickup_customer_id'));
        if(!empty($this->session->userdata('new_pickup_customer_pickup_id'))){
            $data['customer_pickup_details'] = $this->pickup_model->get_customer_pickup_data($this->session->userdata('new_pickup_customer_pickup_id'));
        } else if(!empty($data['customer_pickup_list'])){
            $this->session->set_userdata('new_pickup_customer_pickup_id', $data['customer_pickup_list'][0]['id']);
            $data['customer_pickup_details'] = $this->pickup_model->get_customer_pickup_data($this->session->userdata('new_pickup_customer_pickup_id'));
        }
        
        if($this->input->post() && $this->input->post('pickup_time') == '00:00') {
            $_POST['pickup_time'] = '';
            
           }
           
           
        $this->form_validation->set_rules('fname',$this->lang->line('field_first_name'),'required|trim');
        $this->form_validation->set_rules('lname',$this->lang->line('field_last_name'),'required|trim');
        //$this->form_validation->set_rules('address',$this->lang->line('field_address'),'required|trim');
        $this->form_validation->set_rules('address_line_1',$this->lang->line('field_address_line_1'),'trim');
        $this->form_validation->set_rules('address_line_2',$this->lang->line('field_address_line_2'),'trim');
        $this->form_validation->set_rules('city',$this->lang->line('field_city'),'required|trim');
        //$this->form_validation->set_rules('borough',$this->lang->line('field_borough'),'required|trim');
        $this->form_validation->set_rules('state',$this->lang->line('field_state'),'required|trim');
        //$this->form_validation->set_rules('country',$this->lang->line('field_country'),'required|trim');
        $this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'required|trim');
        if(empty($this->input->post('cellphone_number'))){
            $this->form_validation->set_rules('telephone_number',$this->lang->line('field_telephone_number'),'required|trim');
        } 
        if(empty($this->input->post('telephone_number'))){
            $this->form_validation->set_rules('cellphone_number',$this->lang->line('field_cellphone_number'),'required|trim');
        }
      //  $this->form_validation->set_rules('branch_id',$this->lang->line('field_branch'),'required|trim');
        $this->form_validation->set_rules('status',$this->lang->line('field_branch'),'required|trim|in_list[Done,Not Done,Cancel,Rescheduled]');
        $this->form_validation->set_rules('comment',$this->lang->line('field_branch'),'trim');
        $this->form_validation->set_rules('item_1',$this->lang->line('field_item_1'),'required|trim');
        $this->form_validation->set_rules('item_2',$this->lang->line('field_item_2'),'trim');
       $this->form_validation->set_rules('driver_id',$this->lang->line('label_driver'),'trim');
        $this->form_validation->set_rules('pickup_date',$this->lang->line('field_pickup_date'),'required|trim');
        $this->form_validation->set_rules('pickup_time',$this->lang->line('field_pickup_time'),'trim');
        $this->form_validation->set_rules('zone',$this->lang->line('field_zone'),'required');
        
        

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            
            $this->loadView($this->view_folder.'add', $data);
        } 
        else 
        {   
            $validationResponse = $this->pickup_model->checkPickupValdiation();
            if($validationResponse){
                
                $this->session->set_flashdata('err_msg1', $this->lang->line('label_pickup_is_already_registered_with_same'));
                $this->loadView($this->view_folder . 'add', $data);return;
                
            }

            $params = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'address' => $this->input->post('address_line_1'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => '',
                'borough' => '',
                'zipcode' => $this->input->post('zipcode'),
                'branch_id' => '',
                'customer_id' => $this->session->userdata('new_pickup_customer_id'),
                'apartment' => $this->input->post('apartment'),
                'user_id' => $this->id,
                
            );

            if(!empty($this->input->post('address_line_1'))){
                $params['address_line1'] = $this->input->post('address_line_1');
            }
            if(!empty($this->input->post('address_line_2'))){
                $params['address_line2'] = $this->input->post('address_line_2');
            }
            if(!empty($this->input->post('telephone_number'))){
                $params['telephone_number'] = $this->input->post('telephone_number');
            }
            if(!empty($this->input->post('cellphone_number'))){
                $params['cellphone_number'] = $this->input->post('cellphone_number');
            } 
            if(!empty($this->input->post('latitude'))){
                $params['latitude'] = $this->input->post('latitude');
            }
            if(!empty($this->input->post('longitude'))){
                $params['longitude'] = $this->input->post('longitude');
            }

            /* add customer pickup if not select from list */
            if(empty($this->session->userdata('new_pickup_customer_pickup_id'))){
                $customer_pickup_id = $this->pickup_model->add_customer_pickup($params);
                $params['customer_pickup_id'] = $customer_pickup_id;
            } else {
                $this->pickup_model->update_customer_pickup($this->session->userdata('new_pickup_customer_pickup_id'),$params);
                $params['customer_pickup_id'] = $this->session->userdata('new_pickup_customer_pickup_id');
            }

            if(!empty($this->input->post('comment'))){
                $params['comment'] = $this->input->post('comment');
            }
            if(!empty($this->input->post('zone'))){
                $params['zone'] = $this->input->post('zone');
            }
            if(!empty($this->input->post('status'))){
                $params['status'] = $this->input->post('status');
            }
            if(!empty($this->input->post('comment'))){
                $params['comment'] = $this->input->post('comment');
            }
            if(!empty($this->input->post('item_1'))){
                $params['item_1'] = $this->input->post('item_1');
            }
            if(!empty($this->input->post('item_2'))){
                $params['item_2'] = $this->input->post('item_2');
            }
            if(!empty($this->input->post('driver_id'))){
                $params['driver_id'] = $this->input->post('driver_id');
            }
            if(!empty($this->input->post('pickup_date'))){
                $params['pickup_date'] = date("Y-m-d",strtotime($this->input->post('pickup_date')));
            }
            if(!empty($this->input->post('pickup_time'))){
                
                $params['pickup_time'] = $this->common->from_date_convert(date("H:i:s", strtotime($this->input->post('pickup_time'))), $this->session->userdata('web_timezone'), 'UTC', 'H:i:s'); 
            }
            if(!empty($this->input->post('zone'))){
                $params['zone'] = $this->input->post('zone');
            }
            $params['boxes'] = $this->input->post('boxes');
            $params['barrels'] = $this->input->post('barrels');
            $params['shipto_id'] = $this->input->post('shipto_id');
            $id = $this->pickup_model->add_pickup($params);
            $this->Main_model->updateCompanyRefIds('pickup_id',$id);

            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_pickup_add_success'));
            redirect('company/pickup/edit/'.$id,'refresh');
        }
    }
    

    /*Add new pickup*/
    function edit()
    {
        
        $pickup_id = $this->uri->segment(4);

        $data = array();
        $data['result'] = $this->pickup_model->get_pickup_data($pickup_id);
        //$this->pickup_model->updateHistory('tbl_pickup',$data['result'],$pickup_id);
        $data['result']['pickup_time']  = local_time($data['result']['pickup_time'],'h:i A');
        
        

        if(empty($data['result']))
            redirect('company/pickup/listing','refresh');

        $this->session->set_userdata('redirect_url', base_url('company/pickup/edit/'.$this->uri->segment(4)));

        $data['branch_list'] = $this->pickup_model->get_branch_list();
        $data['next_customer_pickup_id'] = $this->pickup_model->get_next_customer_pickup_id();
        $data['driver_list'] = $this->pickup_model->get_driver_list();
        $data['zone_list'] = $this->pickup_model->get_zone_list();
        $data['customer_details'] = $this->pickup_model->get_customer_data($data['result']['customer_id']);
        $data['customer_pickup_list'] = $this->pickup_model->get_customer_pickup_list($data['result']['customer_id']);
        $data['pickup_history'] = $this->pickup_model->pickup_history($pickup_id);
        // dd($data['pickup_history']);
        // die;
        
        if(isset($data['result']['user_id'])){
            
        $data_in['where'] = ['master_user_id' => $data['result']['user_id']];
        $data['user_info'] = $this->Main_model->getUserInfo($data_in);
        
        }
        
        
        
        
        
        
        $data['title'] = $this->lang->line('title_edit_pickup');
        $data['second_title'] = $this->lang->line('title_pickup_list');
        $data['css'] = ['custom'];
        $data['js'] = ['pickup'];
        $data['function'] = 'edit';
        if(!empty($this->session->userdata('new_pickup_customer_pickup_id'))){
            $data['customer_pickup_details'] = $this->pickup_model->get_customer_pickup_data($this->session->userdata('new_pickup_customer_pickup_id'));
        }
        
        $this->form_validation->set_rules('fname',$this->lang->line('field_first_name'),'required|trim');
        $this->form_validation->set_rules('lname',$this->lang->line('field_last_name'),'required|trim');
        //$this->form_validation->set_rules('address',$this->lang->line('field_address'),'required|trim');
        $this->form_validation->set_rules('address_line_1',$this->lang->line('field_address_line_1'),'trim');
        $this->form_validation->set_rules('address_line_2',$this->lang->line('field_address_line_2'),'trim');
        $this->form_validation->set_rules('city',$this->lang->line('field_city'),'required|trim');
        //$this->form_validation->set_rules('borough',$this->lang->line('field_borough'),'required|trim');
        $this->form_validation->set_rules('state',$this->lang->line('field_state'),'required|trim');
        //$this->form_validation->set_rules('country',$this->lang->line('field_country'),'required|trim');
        $this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'required|trim');
        if(empty($this->input->post('cellphone_number'))){
            $this->form_validation->set_rules('telephone_number',$this->lang->line('field_telephone_number'),'required|trim');
        } 
        if(empty($this->input->post('telephone_number'))){
            $this->form_validation->set_rules('cellphone_number',$this->lang->line('field_cellphone_number'),'required|trim');
        }
        //$this->form_validation->set_rules('branch_id',$this->lang->line('field_branch'),'required|trim');
        $this->form_validation->set_rules('status',$this->lang->line('field_branch'),'required|trim|in_list[Done,Not Done,Cancel,Rescheduled]');
        $this->form_validation->set_rules('comment',$this->lang->line('field_branch'),'trim');
        $this->form_validation->set_rules('item_1',$this->lang->line('field_item_1'),'required|trim');
        $this->form_validation->set_rules('item_2',$this->lang->line('field_item_2'),'trim');
        $this->form_validation->set_rules('driver_id',$this->lang->line('field_driver_id'),'trim');
        $this->form_validation->set_rules('pickup_date',$this->lang->line('field_pickup_date'),'required|trim');
        $this->form_validation->set_rules('pickup_time',$this->lang->line('field_pickup_time'),'trim');
        $this->form_validation->set_rules('zone',$this->lang->line('field_zone'),'required');
        

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $this->loadView($this->view_folder.'edit', $data);
        } 
        else 
        {   

            $validationResponse = $this->pickup_model->checkPickupValdiation($edit = true);
            if($validationResponse){
                
                $this->session->set_flashdata('err_msg1', $this->lang->line('label_pickup_is_already_registered_with_same'));
                $this->loadView($this->view_folder . 'add', $data);return;
                
            }

            $params = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'address' => $this->input->post('address_line_1'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                //'country' => $this->input->post('country'),
                //'borough' => $this->input->post('borough'),
                'zipcode' => $this->input->post('zipcode'),
                //'branch_id' => $this->input->post('branch_id'),
                'apartment' => $this->input->post('apartment')
                 
            );
            if(!empty($this->input->post('address_line_1'))){
                $params['address_line1'] = $this->input->post('address_line_1');
            } else {
                $params['address_line1'] = "";
            }
            if(!empty($this->input->post('address_line_2'))){
                $params['address_line2'] = $this->input->post('address_line_2');
            } else {
                $params['address_line2'] = "";
            }
            if(!empty($this->input->post('telephone_number'))){
                $params['telephone_number'] = $this->input->post('telephone_number');
            } else {
                $params['telephone_number'] = "";
            }
            if(!empty($this->input->post('cellphone_number'))){
                $params['cellphone_number'] = $this->input->post('cellphone_number');
            }  else {
                $params['cellphone_number'] = "";
            } 
            if(!empty($this->input->post('latitude'))){
                $params['latitude'] = $this->input->post('latitude');
            }
            if(!empty($this->input->post('longitude'))){
                $params['longitude'] = $this->input->post('longitude');
            }

            /* add customer pickup if not select from list */
            if(empty($this->session->userdata('new_pickup_customer_pickup_id'))){
                $this->pickup_model->update_customer_pickup($data['result']['customer_pickup_id'],$params);
            } else {
                $this->pickup_model->update_customer_pickup($this->session->userdata('new_pickup_customer_pickup_id'),$params);
                $params['customer_pickup_id'] = $this->session->userdata('new_pickup_customer_pickup_id');
            }

            if(!empty($this->input->post('comment'))){
                $params['comment'] = $this->input->post('comment');
            } else {
                $params['comment'] = "";
            }
            if(!empty($this->input->post('zone'))){
                $params['zone'] = $this->input->post('zone');
            } else {
                $params['zone'] = "";
            }
            if(!empty($this->input->post('status'))){
                $params['status'] = $this->input->post('status');
            } else {
                $params['status'] = "";
            }
            if(!empty($this->input->post('comment'))){
                $params['comment'] = $this->input->post('comment');
            } else {
                $params['comment'] = "";
            }
            if(!empty($this->input->post('item_1'))){
                $params['item_1'] = $this->input->post('item_1');
            } else {
                $params['item_1'] = "";
            }
            if(!empty($this->input->post('item_2'))){
                $params['item_2'] = $this->input->post('item_2');
            } else {
                $params['item_2'] = "";
            }
            if(!empty($this->input->post('driver_id'))){
                $params['driver_id'] = $this->input->post('driver_id');
            } else {
                $params['driver_id'] = "";
            }
            if(!empty($this->input->post('pickup_date'))){
                $params['pickup_date'] = date("Y-m-d",strtotime($this->input->post('pickup_date')));
            } else {
                $params['pickup_date'] = "";
            }
            if(!empty($this->input->post('pickup_time')) && $this->input->post('pickup_time') != '00:00'){
                $params['pickup_time'] = $this->common->from_date_convert(date("H:i:s", strtotime($this->input->post('pickup_time'))), $this->session->userdata('web_timezone'), 'UTC', 'H:i:s'); 
            } else {
                $params['pickup_time'] = "";
            }
            if(!empty($this->input->post('zone'))){
                $params['zone'] = $this->input->post('zone');
            } else {
                $params['zone'] = "";
            }
            $params['boxes'] = $this->input->post('boxes');
            $params['barrels'] = $this->input->post('barrels');
            $params['shipto_id'] = $this->input->post('shipto_id');
            if(strtotime($this->input->post('pickup_date')) > strtotime($data['result']['pickup_date']) ){
             $params['update_count'] = $data['result']['update_count']+1;
            }
            // Update picup details 
            
            
            $this->pickup_model->update_pickup($pickup_id,$params);
            $this->pickup_model->updateHistory($data['result'],$params,$pickup_id);

            
            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_pickup_update_success'));
            redirect('company/pickup/listing/','refresh');
        }
    }

    function add_customer_pickup(){
        if(!empty($this->session->userdata('new_pickup_customer_id')) || !empty($this->uri->segment(4))) {
            $customer_id = "";
            if(!empty($this->session->userdata('new_pickup_customer_id'))){
                $customer_id = $this->session->userdata('new_pickup_customer_id');
            } else if (!empty($this->uri->segment(4))) {
                $customer_id = $this->uri->segment(4);
            }

            $data = array(); 

            $this->form_validation->set_rules('model_fname',$this->lang->line('field_first_name'),'required|trim');
            $this->form_validation->set_rules('model_lname',$this->lang->line('field_last_name'),'required|trim');
            //$this->form_validation->set_rules('model_address',$this->lang->line('field_address'),'required|trim');
            $this->form_validation->set_rules('model_address_line_1',$this->lang->line('field_address_line_1'),'trim');
            $this->form_validation->set_rules('model_address_line_2',$this->lang->line('field_address_line_2'),'trim');
            $this->form_validation->set_rules('model_city',$this->lang->line('field_city'),'required|trim');
           // $this->form_validation->set_rules('model_borough',$this->lang->line('field_borough'),'required|trim');
            $this->form_validation->set_rules('model_state',$this->lang->line('field_state'),'required|trim');
            //$this->form_validation->set_rules('model_country',$this->lang->line('field_country'),'required|trim');
           // $this->form_validation->set_rules('model_zipcode',$this->lang->line('field_zipcode'),'required|trim');
            if(empty($this->input->post('model_cellphone_number'))){
                $this->form_validation->set_rules('model_telephone_number',$this->lang->line('field_telephone_number'),'required|trim');
            } 
            if(empty($this->input->post('model_telephone_number'))){
                $this->form_validation->set_rules('model_cellphone_number',$this->lang->line('field_cellphone_number'),'required|trim');
            }
            //$this->form_validation->set_rules('model_branch_id',$this->lang->line('field_branch'),'required|trim');
            
            $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
            if ($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('error_msg', validation_errors());
                if(!empty($this->session->userdata('redirect_url'))){
                    redirect($this->session->userdata('redirect_url'),'refresh');
                }
                redirect('company/pickup/add','refresh');
            } 
            else 
            {   
                $params = array(
                    'fname' => $this->input->post('model_fname'),
                    'lname' => $this->input->post('model_lname'),
                    //'address' => $this->input->post('model_address'),
                    'city' => $this->input->post('model_city'),
                    'state' => $this->input->post('model_state'),
                    'address_line1' => $this->input->post('model_address_line_1'),
                    'apartment' => $this->input->post('apartment'),
                    ///'country' => $this->input->post('model_country'),
                   // 'borough' => $this->input->post('model_borough'),
                    'zipcode' => $this->input->post('model_zipcode'),
                    //'branch_id' => $this->input->post('model_branch_id'),
                    'customer_id' => $customer_id 
                );
                if(!empty($this->input->post('model_address_line_1'))){
                    $params['address_line1'] = $this->input->post('model_address_line_1');
                }
                if(!empty($this->input->post('model_address_line_2'))){
                    $params['address_line2'] = $this->input->post('model_address_line_2');
                }
                if(!empty($this->input->post('model_telephone_number'))){
                    $params['telephone_number'] = $this->input->post('model_telephone_number');
                }
                if(!empty($this->input->post('model_cellphone_number'))){
                    $params['cellphone_number'] = $this->input->post('model_cellphone_number');
                } 
                if(!empty($this->input->post('model_latitude'))){
                    $params['latitude'] = $this->input->post('model_latitude');
                }
                if(!empty($this->input->post('model_longitude'))){
                    $params['longitude'] = $this->input->post('model_longitude');
                }

                $this->pickup_model->add_customer_pickup($params);
     
                $this->session->set_flashdata('succ_msg1', $this->lang->line('text_pickup_add_success'));
                if(!empty($this->session->userdata('redirect_url'))){
                    redirect($this->session->userdata('redirect_url'),'refresh');
                }
            }
        }
        else {
            if(!empty($this->session->userdata('redirect_url'))){
                redirect($this->session->userdata('redirect_url'),'refresh');
            }
            redirect('company/pickup/add','refresh');
        }
    }

    /*View user profile*/
    function view()
    {
        if (!$this->uri->segment(4)) 
        {
            redirect('company/pickup/listing','refresh');
        }
        $data = array();
        
        $data['result'] = $this->pickup_model->get_pickup_data($this->uri->segment(4));
        $this->load->view($this->view_folder.'view', $data);
    }

    /*Change user status*/
    function user_state()
    {   
        if (!$this->uri->segment(4) && !$this->uri->segment(5)) {
            echo json_encode();
        }
        $ID = $this->uri->segment(4);
        $state = $this->uri->segment(5);
        $this->pickup_model->user_state($ID,$state);
        
        echo json_encode();
    }


    /*List all shipto of pickup by ajax call*/
    function customer_ajax_list()
    {
        $AllPostData = $this->input->post();
        
        
        $list = $this->pickup_model->get_customer_datatables();
        $data = array();

        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->pickup_model->customer_count_filtered(),'sort'=>'asc','field'=>'company_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
    } 

    /* Delete pickup */
    function delete($pickup_id)
    {   
        if (!$pickup_id) {
            echo json_encode();
        }
        $this->pickup_model->update_pickup($pickup_id,array('void' => 'Yes'));
        echo json_encode();
    }



    /*List all shipto of customer by ajax call*/
    function shipto_ajax_list()
    {
        $AllPostData = $this->input->post();
        
        
        $list = $this->pickup_model->get_shipto_datatables();
        
        $data = array();

        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->pickup_model->shipto_count_filtered(),'sort'=>'asc','field'=>'company_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
    }

    /*Add new shipto*/
    function add_shipto()
    {
        if(!empty($this->session->userdata('new_pickup_customer_id')) || !empty($this->uri->segment(4))) {
            $customer_id = "";
            if(!empty($this->session->userdata('new_pickup_customer_id'))){
                $customer_id = $this->session->userdata('new_pickup_customer_id');
            } else if (!empty($this->uri->segment(4))) {
                $customer_id = $this->uri->segment(4);
            }

            $data = array();
            $data['user_result'] = $this->pickup_model->get_customer_data($customer_id);
            $data['next_id'] = $this->pickup_model->get_next_shipto_id();

            $this->form_validation->set_rules('company_name',$this->lang->line('field_company_name'),'trim');
            $this->form_validation->set_rules('fname',$this->lang->line('field_first_name'),'required|trim');
            $this->form_validation->set_rules('lname',$this->lang->line('field_last_name'),'required|trim');
            $this->form_validation->set_rules('email', $this->lang->line('field_email'), 'required|trim|valid_email');

            $this->form_validation->set_rules('address',$this->lang->line('field_address'),'required|trim');
            $this->form_validation->set_rules('address_line_1',$this->lang->line('field_address_line_1'),'trim');
            $this->form_validation->set_rules('address_line_2',$this->lang->line('field_address_line_2'),'trim');
            $this->form_validation->set_rules('address_line_3',$this->lang->line('field_address_line_3'),'trim');
            $this->form_validation->set_rules('city',$this->lang->line('field_city'),'required|trim');
            $this->form_validation->set_rules('borough',$this->lang->line('field_borough'),'trim');
            $this->form_validation->set_rules('state',$this->lang->line('field_state'),'required|trim');
            $this->form_validation->set_rules('country',$this->lang->line('field_country'),'required|trim');
            $this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'trim');
            $this->form_validation->set_rules('shipto_cedula',$this->lang->line('field_shipto_cedula'),'required|trim');

            if(empty($this->input->post('cellphone_number'))){
                $this->form_validation->set_rules('telephone_number',$this->lang->line('field_telephone_number'),'required|trim');
            } 
            if(empty($this->input->post('telephone_number'))){
                $this->form_validation->set_rules('cellphone_number',$this->lang->line('field_cellphone_number'),'required|trim');
            }
            $this->form_validation->set_rules('fax_number',$this->lang->line('field_fax_number'),'trim');
            
            $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view($this->view_folder.'add_shipto', $data);
            } 
            else 
            {   
                /* check email already registered or not? */
                $already_register = $this->pickup_model->check_shipto_param(array('email' => $this->input->post('email')));
                if(!empty($already_register)){
                    $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_email_exist'));
                    $this->load->view($this->view_folder.'add_shipto', $data); return;
                }  
                
                $params = array(
                    'customer_id' => $this->input->post('customer_id'),
                    'fname' => $this->input->post('fname'),
                    'lname' => $this->input->post('lname'),
                    'email' => $this->input->post('email'),
                    'address' => $this->input->post('address'),
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'country' => $this->input->post('country'),
                    'shipto_cedula' => $this->input->post('shipto_cedula'),
                );
                if(!empty($this->input->post('company_name'))){
                    $params['company_name'] = $this->input->post('company_name');
                }
                if(!empty($this->input->post('zipcode'))){
                    $params['zipcode'] = $this->input->post('zipcode');
                }
                if(!empty($this->input->post('borough'))){
                    $params['borough'] = $this->input->post('borough');
                }
                if(!empty($this->input->post('address_line_1'))){
                    $params['address_line1'] = $this->input->post('address_line_1');
                }
                if(!empty($this->input->post('address_line_2'))){
                    $params['address_line2'] = $this->input->post('address_line_2');
                }
                if(!empty($this->input->post('address_line_3'))){
                    $params['address_line3'] = $this->input->post('address_line_3');
                }
                if(!empty($this->input->post('cellphone_number'))){
                    $params['cellphone_number'] = $this->input->post('cellphone_number');
                }
                if(!empty($this->input->post('telephone_number'))){
                    $params['telephone_number'] = $this->input->post('telephone_number');
                }
                if(!empty($this->input->post('fax_number'))){
                    $params['fax_number'] = $this->input->post('fax_number');
                }
                if(!empty($this->input->post('latitude'))){
                    $params['latitude'] = $this->input->post('latitude');
                }
                if(!empty($this->input->post('longitude'))){
                    $params['longitude'] = $this->input->post('longitude');
                }
                $id = $this->pickup_model->add_shipto($params);
     
                $this->session->set_flashdata('succ_msg1', $this->lang->line('text_shipto_add_success'));
                if(!empty($this->session->userdata('redirect_url'))){
                    redirect($this->session->userdata('redirect_url'),'refresh');
                }
                redirect('company/pickup/add','refresh');
            }
        } else {
            redirect(base_url("company/pickup"), "refresh");
        }

    }

    /*Update shipto details*/
    function edit_shipto()
    {
        $shipto_id = $this->uri->segment(4);

        $data = array();
        $data['result'] = $this->pickup_model->get_shipto_data($shipto_id);
        if(empty($data['result'])){
            if ($this->agent->is_referral())
            {
                redirect($this->agent->referrer(),'refresh');
            }
            redirect('company/pickup/add','refresh');
        }
        
        $this->form_validation->set_rules('company_name',$this->lang->line('field_company_name'),'trim');
        $this->form_validation->set_rules('fname',$this->lang->line('field_first_name'),'required|trim');
        $this->form_validation->set_rules('lname',$this->lang->line('field_last_name'),'required|trim');
        $this->form_validation->set_rules('email', $this->lang->line('field_email'), 'required|trim|valid_email');

        $this->form_validation->set_rules('address',$this->lang->line('field_address'),'required|trim');
        $this->form_validation->set_rules('address_line_1',$this->lang->line('field_address_line_1'),'trim');
        $this->form_validation->set_rules('address_line_2',$this->lang->line('field_address_line_2'),'trim');
        $this->form_validation->set_rules('address_line_3',$this->lang->line('field_address_line_3'),'trim');
        $this->form_validation->set_rules('borough',$this->lang->line('field_borough'),'trim');
        $this->form_validation->set_rules('city',$this->lang->line('field_city'),'required|trim');
        $this->form_validation->set_rules('state',$this->lang->line('field_state'),'required|trim');
        $this->form_validation->set_rules('country',$this->lang->line('field_country'),'required|trim');
        $this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'trim');
        $this->form_validation->set_rules('shipto_cedula',$this->lang->line('field_shipto_cedula'),'required|trim');
        
        if(empty($this->input->post('cellphone_number'))){
            $this->form_validation->set_rules('telephone_number',$this->lang->line('field_telephone_number'),'required|trim');
        } 
        if(empty($this->input->post('telephone_number'))){
            $this->form_validation->set_rules('cellphone_number',$this->lang->line('field_cellphone_number'),'required|trim');
        }
        $this->form_validation->set_rules('fax_number',$this->lang->line('field_fax_number'),'trim');
        
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view($this->view_folder.'edit_shipto', $data);
        } 
        else 
        {
            /* check email already registered or not? */
            $already_register = $this->pickup_model->check_shipto_param(array('email' => $this->input->post('email'), 'id !=' => $shipto_id  ));
            if(!empty($already_register)){
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_email_exist'));
                redirect(base_url('company/pickup/edit_shipto/').$shipto_id, 'refresh');
            }

            $params = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
                'shipto_cedula' => $this->input->post('shipto_cedula'),
            );
            if(!empty($this->input->post('company_name'))){
                $params['company_name'] = $this->input->post('company_name');
            } else {
                $params['company_name'] = "";
            }
            if(!empty($this->input->post('zipcode'))){
                $params['zipcode'] = $this->input->post('zipcode');
            } else {
                $params['zipcode'] = "";
            }
            if(!empty($this->input->post('borough'))){
                $params['borough'] = $this->input->post('borough');
            } else {
                $params['borough'] = "";
            }
            if(!empty($this->input->post('address_line_1'))){
                $params['address_line1'] = $this->input->post('address_line_1');
            } else {
                $params['address_line1'] = "";
            }
            if(!empty($this->input->post('address_line_2'))){
                $params['address_line2'] = $this->input->post('address_line_2');
            } else {
                $params['address_line2'] = "";
            }
            if(!empty($this->input->post('address_line_3'))){
                $params['address_line3'] = $this->input->post('address_line_3');
            }  else {
                $params['address_line3'] = "";
            }
            if(!empty($this->input->post('cellphone_number'))){
                $params['cellphone_number'] = $this->input->post('cellphone_number');
            } else {
                $params['cellphone_number'] = "";
            }
            if(!empty($this->input->post('telephone_number'))){
                $params['telephone_number'] = $this->input->post('telephone_number');
            } else {
                $params['telephone_number'] = "";
            }
            if(!empty($this->input->post('fax_number'))){
                $params['fax_number'] = $this->input->post('fax_number');
            }  else {
                $params['fax_number'] = "";
            }
            if(!empty($this->input->post('latitude'))){
                $params['latitude'] = $this->input->post('latitude');
            }
            if(!empty($this->input->post('longitude'))){
                $params['longitude'] = $this->input->post('longitude');
            }

            // Update customer details 
            $this->pickup_model->update_shipto($shipto_id, $params);

            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_shipto_update_success'));
            if(!empty($this->session->userdata('redirect_url'))){
                redirect($this->session->userdata('redirect_url'),'refresh');
            }
            redirect('company/pickup/add', 'refresh');
        }
    }

    /* Delete shipto */
    function delete_shipto($shipto_id)
    {   
        if (!$shipto_id) {
            echo json_encode();
        }
        $this->pickup_model->update_shipto($shipto_id,array('void' => 'Yes'));
        echo json_encode();
    }

    /*function update_list(){
        print_r($this->input->post()); die;
    }*/

    function update_status(){
        if($this->input->post() && $this->input->is_ajax_request()){
            
            $this->pickup_model->update_status($this->input->post());
        }
    }
   
     public function pdf($reportType,$ids){

        
        
            // instantiate and use the dompdf class
    $dompdf = new Dompdf();

//    $this->load->view($this->view_folder.'/pickup_print','');
     $data['result'] = $this->pickup_model->get_pdf_data($ids);
     
    if($reportType == '1'){

        $html = $this->load->view($this->view_folder.'/detail_report',$data,true);
        $reportName = 'detail_report_'.$this->username.'.pdf';

        
        

    }if($reportType == '2'){

        $html = $this->load->view($this->view_folder.'/basic_report',$data,true);
        
        $reportName = 'basic_report_'.$this->username.'.pdf';
    } 
     
    
    //$this->db->query()
    
    
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($reportName);
    
        
     }
    

}
