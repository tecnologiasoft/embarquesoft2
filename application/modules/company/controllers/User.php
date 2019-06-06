<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MYcom_Controller {

	private $view_folder = 'company/user/';
	function __construct()
    {
        parent::__construct();
        
        
        $this->load->model('company/user_model');
        
    }

    /*Default index call*/
	function index()
	{
        $this->session->set_userdata('tab','test');
		$this->listing();
	}

    /*Listing all users*/
	function listing()
    {
        $data = array();
        $data['title'] = $this->lang->line('title_user_list');
        $data['css'] = ['custom'];
        $this->loadView($this->view_folder.'listing', $data);
    }

    /*List all user by ajax call*/
    function ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->user_model->get_datatables();
        $data = array();

        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->user_model->count_filtered(),'sort'=>'asc','field'=>'company_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
    } 

    /*Add new user*/
    function add()
    {
        
        $data = array();
        $data['title'] = $this->lang->line('title_add_new_user');
        $data['max_value'] = $this->user_model->getMaxId();
        $data['second_title'] = $this->lang->line('title_user_list');
        $data['css'] = ['custom'];
        $data['js'] = ['https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js',MAP_API_URL,'user'];
        $data['function'] = 'add';
        $this->load->model('company/branch_model');
        $data['branch_list'] = $this->branch_model->getBranch($id);
        
        
        
        
       // $this->form_validation->set_rules('username',$this->lang->line('field_user_name'),'required|trim');
       // $this->form_validation->set_rules('fname',$this->lang->line('field_first_name'),'required|trim');
       // $this->form_validation->set_rules('lname',$this->lang->line('field_last_name'),'required|trim');
        //$this->form_validation->set_rules('email', $this->lang->line('field_email'), 'required|trim|valid_email');
        $this->form_validation->set_rules('password',$this->lang->line('field_password'),'required|trim|min_length[4]');
        //$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required|trim|matches[password]');

        $this->form_validation->set_rules('address',$this->lang->line('field_address'),'required|trim');
        //$this->form_validation->set_rules('address_line_1',$this->lang->line('field_address_line_1'),'trim');
       // $this->form_validation->set_rules('address_line_2',$this->lang->line('field_address_line_2'),'trim');
      //  $this->form_validation->set_rules('borough',$this->lang->line('field_borough'),'required|trim');
        $this->form_validation->set_rules('city',$this->lang->line('field_city'),'required|trim');
        $this->form_validation->set_rules('state',$this->lang->line('field_state'),'required|trim');
        $this->form_validation->set_rules('country',$this->lang->line('field_country'),'required|trim');
        $this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'required|trim');

        $this->form_validation->set_rules('telephone_number',$this->lang->line('field_telephone_number'),'trim');
        $this->form_validation->set_rules('cellphone_number',$this->lang->line('field_cellphone_number'),'required|trim');
    //    $this->form_validation->set_rules('container',$this->lang->line('field_container'),'trim');
  //      $this->form_validation->set_rules('country_ship_to',$this->lang->line('field_country_ship_to'),'trim');
//        $this->form_validation->set_rules('user_group',$this->lang->line('field_user_group'),'required|trim|in_list[Agent,Branch]');
        $this->form_validation->set_rules('driver',$this->lang->line('field_driver'),'required|trim|in_list[Yes,No,Both]');
        $this->form_validation->set_rules('start_time',$this->lang->line('field_start_time'),'required|trim');
        $this->form_validation->set_rules('end_time',$this->lang->line('field_end_time'),'required|trim');
        $this->form_validation->set_rules('branch',$this->lang->line('field_branch'),'required|trim');
        $this->form_validation->set_rules('ip',$this->lang->line('field_ip'),'required|trim');
        //$this->form_validation->set_rules('appcode',$this->lang->line('field_appcode'),'required|trim');
        
        
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_userdata('tab','test');
            $this->loadView($this->view_folder.'add', $data);
        } 
        else
        {   
           
            if($this->session->userdata('tab') == 'false'){
                redirect('company/user/listing/');
                
                return true;
            }
            /* check email already registered or not? */
            if($this->input->post('email') != ''){
            $already_register = $this->user_model->check_param(array('email' => $this->input->post('email')));
            if(!empty($already_register)){
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_email_exist'));
                $this->loadView($this->view_folder.'add', $data); return;
            }
        }
            /* check user name already registered or not? */
            $already_register = $this->user_model->check_param(array('user_name' => $this->input->post('user_name')));
            if(!empty($already_register)){
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_user_name_exist'));
                $this->loadView($this->view_folder.'add', $data); return;
            }
            
               
            $paramsMasterDb = array(

                'username' => $this->input->post('username'),
                'first_name' => $this->input->post('fname'),
                
                'last_name' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'company_id' => $this->company_id,
                'company_db' => $this->database,
                'address1' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
                'zip_code' => $this->input->post('zipcode'),
                'password' => md5($this->input->post('password')),
                'type' => PORTAL_USER,
                'status' => '1',
                'is_deleted' => '0',
                'ip' => $this->input->post('ip')
                
            );
            
            $lastId = $this->user_model->addMasterUser($paramsMasterDb);
            if(!$lastId){
                $this->session->set_flashdata('succ_msg1', $this->lang->line('error_message'));
                redirect('company/user/listing/','refresh');
            }
            $this->Main_model->updateCompanyRefIds('user_id',$lastId);


            $params = array(
                'master_user_id' => $lastId,
                'user_name' => $this->input->post('username'),
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'borough' => '',
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
                'zipcode' => $this->input->post('zipcode'),
                'password' => $this->common->AES_encrypt($this->input->post('password')),
                'user_group' => '',
                'driver' => $this->input->post('driver'),
                'customer_number' => '',
                'appcode' => '',
                'branch_id' => $this->input->post('branch'),
                'ip' => $this->input->post('ip'),
                'warehouse' => $this->input->post('warehouse')
            );
            if(!empty($this->input->post('cellphone_number'))){
                $params['cellphone_number'] = $this->input->post('cellphone_number');
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
            if(!empty($this->input->post('address_line_2'))){
                $params['address_line2'] = $this->input->post('address_line_2');
            }
            if(!empty($this->input->post('telephone_number'))){
                $params['telephone_number'] = $this->input->post('telephone_number');
            }
            if(!empty($this->input->post('container'))){
                $params['container'] = $this->input->post('container');
            }
            if(!empty($this->input->post('country_ship_to'))){
                $params['country_ship_to'] = $this->input->post('country_ship_to');
            }
            if(count($this->input->post("days")) > 0){
                $params['days'] = implode(",", $this->input->post("days"));
            }
            if(!empty($this->input->post("start_time")) && $this->input->post("start_time") != $this->input->post("end_time")){
                $params['start_time'] = $this->common->from_date_convert(date("H:i:s", strtotime($this->input->post("start_time"))), $this->session->userdata('web_timezone'), 'UTC', 'H:i:s');
            }
            if(!empty($this->input->post("end_time")) && $this->input->post("start_time") != $this->input->post("end_time")){
                $params['end_time'] = $this->common->from_date_convert(date("H:i:s", strtotime($this->input->post("end_time"))), $this->session->userdata('web_timezone'), 'UTC', 'H:i:s');
            }

            $id = $this->user_model->add_user($params);

            $this->session->set_userdata('tab','true'); 
            
            $data['master_user_id'] = $lastId;
            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_user_add_success'));
            $this->loadView($this->view_folder.'add', $data);
            //redirect('company/user/add/','refresh');
        }
    }

  public function addrights(){

      if($this->input->post() && $this->input->post('master_user') !=''){
          
        
        $this->user_model->setRights($this->input->post());
        $this->session->set_flashdata('succ_msg1', $this->lang->line('user_rights_added_successfully'));
        redirect('company/user/','refresh');

      }
      
  }



    /*Add new user*/
    function edit()
    {
        $data = array();
        $data['title'] = $this->lang->line('title_edit_user');
        $data['max_value'] = $id;
        $data['second_title'] = $this->lang->line('title_user_list');
        $data['css'] = ['custom'];
        $data['js'] = ['https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js',MAP_API_URL,'user'];
        $data['function'] = 'edit';
        $where['where'] = ['master_user_id' => $id];
        $data['result'] = $this->user_model->getUserDetails($where);
        $data['result_rights'] = $this->user_model->getRights($id);

        $this->load->model('company/branch_model');
        $data['branch_list'] = $this->branch_model->getBranch($id);
        
        if(count($data['result']) != 1){
            $this->session->set_flashdata('succ_msg1', $this->lang->line('error_message'));
            redirect('company/user/listing/','refresh');
        }
        
        $data['result'] = $data['result'][0];
        // dd($data['result']);
        // die;
        
        $this->form_validation->set_rules('username',$this->lang->line('field_user_name'),'required|trim');
        $this->form_validation->set_rules('fname',$this->lang->line('field_first_name'),'required|trim');
        $this->form_validation->set_rules('lname',$this->lang->line('field_last_name'),'required|trim');
          $this->form_validation->set_rules('ip',$this->lang->line('field_ip'),'required|trim');
       // $this->form_validation->set_rules('email', $this->lang->line('field_email'), 'required|trim|valid_email');
        //$this->form_validation->set_rules('password',$this->lang->line('field_password'),'required|trim|min_length[4]');
        //$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required|trim|matches[password]');

        $this->form_validation->set_rules('address',$this->lang->line('field_address'),'required|trim');
        //$this->form_validation->set_rules('address_line_1',$this->lang->line('field_address_line_1'),'trim');
       // $this->form_validation->set_rules('address_line_2',$this->lang->line('field_address_line_2'),'trim');
      //  $this->form_validation->set_rules('borough',$this->lang->line('field_borough'),'required|trim');
        $this->form_validation->set_rules('city',$this->lang->line('field_city'),'required|trim');
        $this->form_validation->set_rules('state',$this->lang->line('field_state'),'required|trim');
        $this->form_validation->set_rules('country',$this->lang->line('field_country'),'required|trim');
        $this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'required|trim');

        $this->form_validation->set_rules('telephone_number',$this->lang->line('field_telephone_number'),'trim');
        $this->form_validation->set_rules('cellphone_number',$this->lang->line('field_cellphone_number'),'trim');
    //    $this->form_validation->set_rules('container',$this->lang->line('field_container'),'trim');
  //      $this->form_validation->set_rules('country_ship_to',$this->lang->line('field_country_ship_to'),'trim');
//        $this->form_validation->set_rules('user_group',$this->lang->line('field_user_group'),'required|trim|in_list[Agent,Branch]');
        $this->form_validation->set_rules('driver',$this->lang->line('field_driver'),'required|trim|in_list[Yes,No,Both]');
        $this->form_validation->set_rules('start_time',$this->lang->line('field_start_time'),'trim');
        $this->form_validation->set_rules('end_time',$this->lang->line('field_end_time'),'trim');
        $this->form_validation->set_rules('branch',$this->lang->line('field_branch'),'required|trim');
        //$this->form_validation->set_rules('customer_number',$this->lang->line('field_customer_number'),'required|trim');
        //$this->form_validation->set_rules('appcode',$this->lang->line('field_appcode'),'required|trim');
        
        
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            
            $this->loadView($this->view_folder.'edit', $data);
        } 
        else 
        {   

            /* check email already registered or not? */
            if($this->input->post('email') != $data['result']['email']){
            $already_register = $this->user_model->check_param(array('email' => $this->input->post('email')));
            if(!empty($already_register)){
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_email_exist'));
                $this->load->view($this->view_folder.'edit', $data); return;
            }
        }
            /* check user name already registered or not? */
            if($this->input->post('username') != $data['result']['user_name']){
            $already_register = $this->user_model->check_param(array('user_name' => $this->input->post('username')));
            if(!empty($already_register)){
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_user_name_exist'));
                $this->load->view($this->view_folder.'edit', $data); return;
            }
        }
               
            $paramsMasterDb = array(

                'username' => $this->input->post('username'),
                'first_name' => $this->input->post('fname'),
                'last_name' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'address1' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
                'zip_code' => $this->input->post('zipcode'),
                'type' => PORTAL_USER,
                'status' => '1',
                'is_deleted' => '0',
                'ip' => $this->input->post('ip')
                
            );
            if($this->input->post('password') != ''){

                $paramsMasterDb['password'] = md5($this->input->post('password'));
            }
            $this->user_model->updateMasterUser($paramsMasterDb,$id);
            
            


            $params = array(
                'user_name' => $this->input->post('username'),
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'borough' => '',
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
                'zipcode' => $this->input->post('zipcode'),
                'password' => $this->common->AES_encrypt($this->input->post('password')),
                'user_group' => '',
                'driver' => $this->input->post('driver'),
                'customer_number' => '',
                'appcode' => '',
                'branch_id' => $this->input->post('branch'),
                'ip' => $this->input->post('ip'),
                'warehouse' => $this->input->post('warehouse')

            );
            if(!empty($this->input->post('cellphone_number'))){
                $params['cellphone_number'] = $this->input->post('cellphone_number');
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
            if(!empty($this->input->post('address_line_2'))){
                $params['address_line2'] = $this->input->post('address_line_2');
            }
            if(!empty($this->input->post('telephone_number'))){
                $params['telephone_number'] = $this->input->post('telephone_number');
            }
            if(!empty($this->input->post('container'))){
                $params['container'] = $this->input->post('container');
            }
            if(!empty($this->input->post('country_ship_to'))){
                $params['country_ship_to'] = $this->input->post('country_ship_to');
            }
            if(count($this->input->post("days")) > 0){
                $params['days'] = implode(",", $this->input->post("days"));
            }
            if(!empty($this->input->post("start_time")) && $this->input->post("start_time") != $this->input->post("end_time")){
                $params['start_time'] = $this->common->from_date_convert(date("H:i:s", strtotime($this->input->post("start_time"))), $this->session->userdata('web_timezone'), 'UTC', 'H:i:s');
            }
            if(!empty($this->input->post("end_time")) && $this->input->post("start_time") != $this->input->post("end_time")){
                $params['end_time'] = $this->common->from_date_convert(date("H:i:s", strtotime($this->input->post("end_time"))), $this->session->userdata('web_timezone'), 'UTC', 'H:i:s');
            }

            $this->user_model->updateUser($params,$id);
 
            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_user_update_success'));
            redirect('company/user/listing/','refresh');
        }
    }



  
    // /*Update user details*/
    // function edit()
    // {
    //     $user_id = $this->uri->segment(4);

    //     $data = array();
    //     $user_data = $data['result'] = $this->user_model->get_user_data($user_id);
    //     if(empty($user_data))
    //         redirect('company/user/listing','refresh');
        
        
    //     //$this->form_validation->set_rules('co_driverid',$this->lang->line('field_driverid'),'required|trim');
    //     //$this->form_validation->set_rules('company_name',$this->lang->line('field_company_name'),'required|trim');
    //     $this->form_validation->set_rules('user_name',$this->lang->line('field_user_name'),'required|trim');
    //     $this->form_validation->set_rules('fname',$this->lang->line('field_first_name'),'required|trim');
    //     $this->form_validation->set_rules('lname',$this->lang->line('field_last_name'),'required|trim');
    //     $this->form_validation->set_rules('email', $this->lang->line('field_email'), 'required|trim|valid_email');

    //     if(!empty($this->input->post('password'))){
    //         $this->form_validation->set_rules('password',$this->lang->line('field_password'),'required|trim|min_length[4]');
    //         $this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required|trim|matches[password]');
    //     }

    //     $this->form_validation->set_rules('address',$this->lang->line('field_address'),'required|trim');
    //     $this->form_validation->set_rules('address_line_1',$this->lang->line('field_address_line_1'),'trim');
    //     $this->form_validation->set_rules('address_line_2',$this->lang->line('field_address_line_2'),'trim');
    //     $this->form_validation->set_rules('borough',$this->lang->line('field_borough'),'required|trim');
    //     $this->form_validation->set_rules('city',$this->lang->line('field_city'),'required|trim');
    //     $this->form_validation->set_rules('state',$this->lang->line('field_state'),'required|trim');
    //     $this->form_validation->set_rules('country',$this->lang->line('field_country'),'required|trim');
    //     $this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'required|trim');

    //     $this->form_validation->set_rules('telephone_number',$this->lang->line('field_telephone_number'),'trim');
    //     $this->form_validation->set_rules('cellphone_number',$this->lang->line('field_cellphone_number'),'trim');
    //     $this->form_validation->set_rules('container',$this->lang->line('field_container'),'trim');
    //     $this->form_validation->set_rules('country_ship_to',$this->lang->line('field_country_ship_to'),'trim');
    //     //$this->form_validation->set_rules('void',$this->lang->line('field_void'),'required|trim|in_list[Yes,No]');
    //     $this->form_validation->set_rules('user_group',$this->lang->line('field_user_group'),'required|trim|in_list[Agent,Branch]');
    //     //$this->form_validation->set_rules('cnum',$this->lang->line('field_cnum'),'required|trim|in_list[Yes,No]');
    //     $this->form_validation->set_rules('driver',$this->lang->line('field_driver'),'required|trim|in_list[Yes,No,Both]');
    //     $this->form_validation->set_rules('start_time',$this->lang->line('field_start_time'),'trim');
    //     $this->form_validation->set_rules('end_time',$this->lang->line('field_end_time'),'trim');
        
    //     /*$this->form_validation->set_rules('barcode',$this->lang->line('field_barcode'),'required|trim');
    //     $this->form_validation->set_rules('invoice_number',$this->lang->line('field_invoice_number'),'required|trim');
    //     $this->form_validation->set_rules('receipt_number',$this->lang->line('field_receipt_number'),'required|trim');
    //     $this->form_validation->set_rules('expense_number',$this->lang->line('field_expense_number'),'required|trim');*/
    //     $this->form_validation->set_rules('customer_number',$this->lang->line('field_customer_number'),'required|trim');
    //     $this->form_validation->set_rules('appcode',$this->lang->line('field_appcode'),'required|trim');
    //     /*$this->form_validation->set_rules('days',$this->lang->line('field_days'),'required|trim');*/

    //     $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
    //     if ($this->form_validation->run() == FALSE)
    //     {
    //         $this->load->view($this->view_folder.'edit', $data);
    //     } 
    //     else 
    //     {
    //         /* check email already registered or not? */
    //         $already_register = $this->user_model->check_param(array('email' => $this->input->post('email'), 'id !=' => $user_id  ));
    //         if(!empty($already_register)){
    //             $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_email_exist'));
    //             //$this->load->view($this->view_folder.'edit', $data); return;
    //             redirect(base_url('company/user/edit/').$user_id, 'refresh');
    //         }

    //         /* check user name already registered or not? */
    //         $already_register = $this->user_model->check_param(array('user_name' => $this->input->post('user_name'), 'id !=' => $user_id));
    //         if(!empty($already_register)){
    //             $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_user_name_exist'));
    //             redirect(base_url('company/user/edit/').$user_id, 'refresh');
    //         }
 
    //         /* check user name already registered or not? */
    //         /*$already_register = $this->user_model->check_param(array('co_driverid' => $this->input->post('co_driverid'), 'id !=' => $user_id));
    //         if(!empty($already_register)){
    //             $this->session->set_flashdata('err_msg1', $this->lang->line('text_user_driverid_exist'));
    //             redirect(base_url('company/user/edit/').$user_id, 'refresh');
    //         }*/
 
            
    //         /*
    //             'co_driverid' => $this->input->post('co_driverid'),
    //             'void' => $this->input->post('void'),
    //             'company_name' => $this->input->post('company_name'),
    //             'cnum' => $this->input->post('cnum'),
    //             'barcode' => $this->input->post('barcode'),
    //             'invoice_number' => $this->input->post('invoice_number'),
    //             'receipt_number' => $this->input->post('receipt_number'),
    //             'expense_number' => $this->input->post('expense_number'),
    //         */
    //         $params = array(
    //             'user_name' => $this->input->post('user_name'),
    //             'fname' => $this->input->post('fname'),
    //             'lname' => $this->input->post('lname'),
    //             'email' => $this->input->post('email'),
    //             'address' => $this->input->post('address'),
    //             'borough' => $this->input->post('borough'),
    //             'city' => $this->input->post('city'),
    //             'state' => $this->input->post('state'),
    //             'country' => $this->input->post('country'),
    //             'zipcode' => $this->input->post('zipcode'),
    //             'password' => $this->common->AES_encrypt($this->input->post('password')),
    //             'user_group' => $this->input->post('user_group'),
    //             'driver' => $this->input->post('driver'),
    //             'customer_number' => $this->input->post('customer_number'),
    //             'appcode' => $this->input->post('appcode'),
    //         );
    //         if(!empty($this->input->post('cellphone_number'))){
    //             $params['cellphone_number'] = $this->input->post('cellphone_number');
    //         } 
    //         if(!empty($this->input->post('latitude'))){
    //             $params['latitude'] = $this->input->post('latitude');
    //         }
    //         if(!empty($this->input->post('longitude'))){
    //             $params['longitude'] = $this->input->post('longitude');
    //         }
    //         if(!empty($this->input->post('address_line_1'))){
    //             $params['address_line1'] = $this->input->post('address_line_1');
    //         }
    //         if(!empty($this->input->post('address_line_2'))){
    //             $params['address_line2'] = $this->input->post('address_line_2');
    //         }
    //         if(!empty($this->input->post('telephone_number'))){
    //             $params['telephone_number'] = $this->input->post('telephone_number');
    //         }
    //         if(!empty($this->input->post('container'))){
    //             $params['container'] = $this->input->post('container');
    //         }
    //         if(!empty($this->input->post('country_ship_to'))){
    //             $params['country_ship_to'] = $this->input->post('country_ship_to');
    //         }
    //         if(count($this->input->post("days")) > 0){
    //             $params['days'] = implode(",", $this->input->post("days"));
    //         }
    //         if(!empty($this->input->post("start_time")) && $this->input->post("start_time") != $this->input->post("end_time")){
    //             $params['start_time'] = $this->common->from_date_convert(date("H:i:s", strtotime($this->input->post("start_time"))), $this->session->userdata('web_timezone'), 'UTC', 'H:i:s');
    //         }
    //         if(!empty($this->input->post("end_time")) && $this->input->post("start_time") != $this->input->post("end_time")){
    //             $params['end_time'] = $this->common->from_date_convert(date("H:i:s", strtotime($this->input->post("end_time"))), $this->session->userdata('web_timezone'), 'UTC', 'H:i:s');
    //         }

    //         // Update user details 
    //         $this->user_model->update_user($user_id, $params);

    //         $this->session->set_flashdata('succ_msg1', $this->lang->line('text_user_update_success'));
    //         redirect('company/user/listing/', 'refresh');
    //     }
    // }

    /*View user profile*/
    function view()
    {
        if (!$this->uri->segment(4)) 
        {
            redirect('company/user/listing','refresh');
        }
        $data = array();
        if(!empty($this->input->cookie('tab_id', TRUE))){
            $data['tab_id'] = $this->input->cookie('tab_id', TRUE);
        } else {
            $data['tab_id'] = "1";
        }
        $data['result'] = $this->user_model->get_user_data($this->uri->segment(4));
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
        $this->user_model->user_state($ID,$state);
        
        echo json_encode();
    }

    /* Delete user */
    function delete($user_id)
    {   
        if (!$user_id) {
            echo json_encode();
        }
        $this->user_model->delete_user($user_id);
        echo json_encode();
    }

 }
