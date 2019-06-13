<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Customer extends MYcom_Controller
{

    private $view_folder = 'company/customer/';
    private $payment_view_folder = 'company/payments/';
    public function __construct()
    {

        parent::__construct();

        $this->load->model('company/customer_model');
    }

    /*Default index call*/
    public function index()
    {
       
       
        $this->listing();
    }

    /*Listing all customer*/
    public function listing()
    {
        $this->session->unset_userdata('redirect_url');
        $data = array();
         

        $data['title'] = $this->lang->line('title_customer_list');
        $data['second_title'] = $this->lang->line('title_customer_list');
        $this->loadView($this->view_folder . 'listing', $data);
    }

    /*List all Customer by ajax call*/
    public function ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->customer_model->get_datatables();
        $data = array();

        $output = array(
            "meta" => array('page' => $AllPostData['datatable']['pagination']['page'], 'pages' => $AllPostData['datatable']['pagination']['pages'], 'perpage' => $AllPostData['datatable']['pagination']['perpage'], 'total' => $this->customer_model->count_filtered(), 'sort' => 'asc', 'field' => 'company_id'),
            "data" => $list,
        );
        //output to json format
        echo json_encode($output);
    }

    /* List all invoice by customer id ajax call*/
    public function invoice_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->customer_model->get_invoice_datatables();
        $data = array();

        $output = array(
            "meta" => array('page' => $AllPostData['datatable']['pagination']['page'], 'pages' => $AllPostData['datatable']['pagination']['pages'], 'perpage' => $AllPostData['datatable']['pagination']['perpage'], 'total' => $this->customer_model->count_invoice_filtered(), 'sort' => 'asc', 'field' => 'company_id'),
            "data" => $list,
        );
        //output to json format
        echo json_encode($output);
    }

    public function add()
    {
        $data = array();
        $data['next_id'] = $this->customer_model->get_next_id();
        $data['title'] = "Add New Customer";
        $data['second_title'] = "Customer List";
        $data['js'] = ['https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js', MAP_API_URL, 'customer'];
        $data['css'] = ['customer'];
        $data['function'] = 'add';
        $this->load->model('company/branch_model');
        $data['branch_list'] = $this->branch_model->getBranch();
        $data['current_user_branchId'] = $this->customer_model->get_cur_branchId($this->id);
        $this->loadView($this->view_folder . 'add', $data);
    }
  /*Add new Customer*/
    public function save()
    {

        //$data = array();
        $data = array();
        $data['next_id'] = $this->customer_model->get_next_id();
        $data['title'] = $this->lang->line('label_add_customer');
        $data['second_title'] = $this->lang->line('label_add_customer');
        $data['js'] = ['https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js', MAP_API_URL, 'customer'];
        $data['css'] = ['customer'];
        $data['function'] = 'add';
        $this->load->model('company/branch_model');
        $data['branch_list'] = $this->branch_model->getBranch();

        $this->form_validation->set_rules('fname', $this->lang->line('field_first_name'), 'required|trim');
        $this->form_validation->set_rules('lname', $this->lang->line('field_last_name'), 'required|trim');
       $this->form_validation->set_rules('address_line1', $this->lang->line('field_address_line_1'), 'trim');
        $this->form_validation->set_rules('city', $this->lang->line('field_city'), 'required|trim');
        $this->form_validation->set_rules('state', $this->lang->line('field_state'), 'required|trim');
        
        if (($this->input->post('cellphone_number') != '') && ($this->input->post('telephone_number') != '')) {

            $this->form_validation->set_rules('telephone_number', $this->lang->line('field_telephone_number'), 'required|trim');
            $this->form_validation->set_rules('cellphone_number', $this->lang->line('field_cellphone_number'), 'required|trim');
        }
        $this->form_validation->set_rules('language',$this->lang->line('field_language'),'trim|required|in_list[English,Spanish]');
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == false) {
            //die(validation_errors());
            $this->loadView($this->view_folder . 'add', $data);
        } else {
            /* check email already registered or not? */
            if($this->input->post('email') != ''){
            $already_register = $this->customer_model->check_param(array('email' => $this->input->post('email')));
            if (!empty($already_register)) {
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_email_exist'));
                $this->loadView($this->view_folder . 'add', $data);return;
            }
        }
            if ($this->input->post('user_name') != '') {
                /* check user name already registered or not? */
                $already_register = $this->customer_model->check_param(array('user_name' => $this->input->post('user_name')));
                if (!empty($already_register)) {
                    $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_user_name_exist'));
                    $this->loadView($this->view_folder . 'add', $data);return;
                }
            }

            $lic_picture = "";
            //$this->lang->line('text_customer_email_exist')
            if (!empty($_FILES['lic_picture']) && $_FILES['lic_picture']['size'] > 0) {
                $lic_picture = $this->common->image_upload($field = 'lic_picture', $path = './' . CUSTOMER_IMAGES);
                if (!$lic_picture) {
                    $this->session->set_flashdata('err_msg1', $this->upload->display_errors('', ''));
                    $this->loadView($this->view_folder . 'add', $data);return;
                }
            } 

            $params = array(
                'fname' => $this->input->post('fname'),
                'branch_id' => $this->input->post('branch'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'address_line1' => $this->input->post('address_line1'),
                'address_line2' => $this->input->post('address_line2'),
                
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'apartment' => $this->input->post('apartment'),
                'borough' => '',
                'zipcode' => $this->input->post('zipcode'),
                'lic_picture' => $lic_picture,
                'language' => $this->input->post('language'),
            );
           
            if (!empty($this->input->post('website'))) {
                $params['website'] = $this->input->post('website');
            }
            if (!empty($this->input->post('company_name'))) {
                $params['company_name'] = $this->input->post('company_name');
            }
            if (!empty($this->input->post('user_name'))) {
                $params['user_name'] = $this->input->post('user_name');
            }
            if (!empty($this->input->post('password'))) {
                $params['password'] = $this->common->AES_encrypt($this->input->post('password'));
            }
            if (!empty($this->input->post('lic_id'))) {
                $params['lic_id'] = $this->input->post('lic_id');
            }
            if (!empty($this->input->post('price_code'))) {
                $params['price_code'] = $this->input->post('price_code');
            }
            if (!empty($this->input->post('agent_code'))) {
                $params['agent_code'] = $this->input->post('agent_code');
            }
            if (!empty($this->input->post('disable_pickup'))) {
                $params['disable_pickup'] = $this->input->post('disable_pickup');
            }
            if (!empty($this->input->post('latitude'))) {
                $params['latitude'] = $this->input->post('latitude');
            }
            if (!empty($this->input->post('longitude'))) {
                $params['longitude'] = $this->input->post('longitude');
            }
            if (!empty($this->input->post('address_line_1'))) {
                $params['address_line1'] = $this->input->post('address_line_1');
            }
            if (!empty($this->input->post('address_line_2'))) {
                $params['address_line2'] = $this->input->post('address_line_2');
            }
            if (!empty($this->input->post('telephone_number'))) {
                $params['telephone_number'] = $this->input->post('telephone_number');
            }
            if (!empty($this->input->post('office_phone_number'))) {
                $params['office_phone_number'] = $this->input->post('office_phone_number');
            }
            if (!empty($this->input->post('cellphone_number'))) {
                $params['cellphone_number'] = $this->input->post('cellphone_number');
            }
            if (!empty($this->input->post('fax_number'))) {
                $params['fax_number'] = $this->input->post('fax_number');
            }
            if (!empty($this->input->post('notes'))) {
                $params['notes'] = $this->input->post('notes');
            }

            $id = $this->customer_model->add_customer($params);

            /* add customer pickup when it was created at first time */
            $params = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'address_line1' => $this->input->post('address_line1'),
                'apartment' => $this->input->post('apartment'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => '',
                'borough' => '',
                'zipcode' => $this->input->post('zipcode'),
                'customer_id' => $id,
            );
            if (!empty($this->input->post('company_name'))) {
                $params['company_name'] = $this->input->post('company_name');
            }
           
            if ($this->input->post('address_line_2') != "") {
                $params['address_line2'] = $this->input->post('address_line_2');
            }
            if (!empty($this->input->post('telephone_number'))) {
                $params['telephone_number'] = $this->input->post('telephone_number');
            }
            if (!empty($this->input->post('cellphone_number'))) {
                $params['cellphone_number'] = $this->input->post('cellphone_number');
            }
            if (!empty($this->input->post('latitude'))) {
                $params['latitude'] = $this->input->post('latitude');
            }
            if (!empty($this->input->post('longitude'))) {
                $params['longitude'] = $this->input->post('longitude');
            }
            $id = $this->customer_model->add_customer_pickup($params);
            $this->Main_model->updateCompanyRefIds('cust_id', $id);
            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_customer_add_success'));
            if (!empty($this->session->userdata('redirect_url'))) {
                redirect($this->session->userdata('redirect_url'), 'refresh');
            }
            redirect('company/customer/listing/', 'refresh');
        }
    }
/*4-Jun-2019*/
public function invoiceview()
    {
       $data['title'] = $this->lang->line('title_view_invoice');
        $data['second_title'] = $this->lang->line('title_invoice_details');
        $data['js'] = ['https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js', MAP_API_URL, 'customer'];
        $data['css'] = ['custom'];
        $data['function'] = 'edit';
        $data = array();
        $data['result'] = $this->customer_model->get_invoice_data($this->uri->segment(4));
        $this->load->view($this->view_folder . 'view_invoice', $data);
    }
    /*Load user profile details*/
    public function edit()
    {
        $data['title'] = $this->lang->line('title_edit_customer');
        $data['second_title'] = $this->lang->line('title_customer_list');
        $data['js'] = ['https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js', MAP_API_URL, 'customer'];
        $data['css'] = ['custom'];
        $data['function'] = 'edit';
        $this->load->model('company/branch_model');
        $data['branch_list'] = $this->branch_model->getBranch();

        if (!$this->uri->segment(4)) {
            redirect('company/customer/listing', 'refresh');
        }

        if (!empty($this->input->cookie('tab_id', true))) {
            $data['tab_id'] = $this->input->cookie('tab_id', true);
        } else {
            $data['tab_id'] = "1";
        }

        $data['invoice'] =  $this->customer_model->get_invoice_data($this->uri->segment(4));
        $data['result'] = $this->customer_model->get_customer_data($this->uri->segment(4));
        /*10-jan-2019 count the invoice of the customer*/
        $data['countInvoice'] = $this->customer_model->countInvoiceData($this->uri->segment(4));
        /*12-jan-2019 count the shipTo of the customer*/
        $data['countShipTo'] = $this->customer_model->countShipToData($this->uri->segment(4));
        if (!empty($data['result'])) {
            $this->loadView($this->view_folder . 'edit', $data);
        } else {
            redirect('company/customer/listing', 'refresh');
        }

    }

    public function customer_update_in_pickup(){

        if($this->input->is_ajax_request() && $this->input->post()){
            $customer_id  = $this->input->post('customer_id');
            $this->form_validation->set_rules('customer_fname', $this->lang->line('label_first_name'), 'required|trim');
            $this->form_validation->set_rules('customer_lname', $this->lang->line('customer_lname'), 'required|trim');
            $this->form_validation->set_rules('customer_address_line_1', $this->lang->line('label_address_1'), 'required|trim');
            $this->form_validation->set_rules('customer_city', $this->lang->line('label_city'), 'required|trim');
            $this->form_validation->set_rules('customer_state', $this->lang->line('label_state'), 'required|trim');
            $this->form_validation->set_rules('customer_balance', $this->lang->line('label_balance'), 'required|trim');
            $this->form_validation->set_rules('customer_zipcode', $this->lang->line('label_zipcode'), 'required|trim');
            if (($this->input->post('customer_telephone_number') != '') && ($this->input->post('customer_cellphone_number') != '')) {

                $this->form_validation->set_rules('customer_telephone_number', $this->lang->line('field_telephone_number'), 'required|trim');
                $this->form_validation->set_rules('customer_cellphone_number', $this->lang->line('field_cellphone_number'), 'required|trim');
            }
            $this->form_validation->set_rules('customer_language',$this->lang->line('field_language'),'trim|required|in_list[English,Spanish]');

            if ($this->form_validation->run() == false) {
                $res['status'] = ERROR_CODE;
                $res['data'] = '';
                $res['message'] = validation_errors();
                echo json_encode($res);
                die;
            }else{

                $params = array(
                    'company_name' => $this->input->post('company_name'),
                    'fname' => $this->input->post('customer_fname'),
                    'lname' => $this->input->post('customer_lname'),
                    'address_line1' => $this->input->post('customer_address_line_1'),
                    'city' => $this->input->post('customer_city'),
                    'state' => $this->input->post('customer_state'),
                    'balance' => $this->input->post('customer_balance'),
                    'zipcode' => $this->input->post('customer_zipcode'),
                    'language' => $this->input->post('customer_language'),
                    'apartment' => $this->input->post('apartment'),
                );
                
                $this->customer_model->update_customer($customer_id, $params);
                $res['status'] = SUCCESS_CODE;
                $res['data'] = '';
                $res['message'] = $this->lang->line('text_customer_update_success');
                echo json_encode($res);

            }
        
        }

    }

    public function create_invoice_customer(){
        if($this->input->is_ajax_request() && $this->input->post()){
            $this->form_validation->set_rules('customer_fname', $this->lang->line('label_first_name'), 'required|trim');
            $this->form_validation->set_rules('customer_lname', $this->lang->line('label_last_name'), 'required|trim');
            $this->form_validation->set_rules('customer_address_line_1', $this->lang->line('label_address_1'), 'required|trim');
            $this->form_validation->set_rules('customer_city', $this->lang->line('label_city'), 'required|trim');
            $this->form_validation->set_rules('customer_state', $this->lang->line('label_state'), 'required|trim');
            $this->form_validation->set_rules('customer_zipcode', $this->lang->line('label_zipcode'), 'required|trim');
            if (($this->input->post('customer_telephone_number') == '') && ($this->input->post('customer_cellphone_number') == '')) {

                $this->form_validation->set_rules('customer_telephone_number', $this->lang->line('field_telephone_number'), 'required|trim|max_length[12]');
                $this->form_validation->set_rules('customer_cellphone_number', $this->lang->line('field_cellphone_number'), 'required|trim|max_length[12]');
            }
            if ($this->form_validation->run() == false) {
                $res['status'] = ERROR_CODE;
                $res['data'] = '';
                $res['message'] = validation_errors();
                echo json_encode($res);
                die;
            }else{

                $params = array(
                    'user_id' => $this->id,
                    'fname' => $this->input->post('customer_fname'),
                    'lname' => $this->input->post('customer_lname'),
                    'address_line1' => $this->input->post('customer_address_line_1'),
                    'latitude' => $this->input->post('customer_latitude'),
                    'longitude' => $this->input->post('customer_longitude'),
                    'address_line2' => $this->input->post('customer_address_line_2'),
                    'city' => $this->input->post('customer_city'),
                    'state' => $this->input->post('customer_state'),
                    'zipcode' => $this->input->post('customer_zipcode'),
                    'telephone_number' => $this->input->post('customer_telephone_number'),
                    'cellphone_number' => $this->input->post('customer_cellphone_number'),
                    'lic_id' => $this->input->post('customer_lic')
                    
                );
                
                $id = $this->customer_model->add_customer($params);
                $res['status'] = SUCCESS_CODE;
                $res['data'] = ['id' => $id];
                $res['message'] = $this->lang->line('text_customer_add_success');
                echo json_encode($res);

            }
        
        }

    }

    function customer_check_phone(){
        $response = $this->customer_model->check_dupicate_customer();
        if($response == false){
            echo json_encode(['status' => ERROR_CODE,'message' => $this->lang->line('telephone_number_is_already_exist')]);
        }
    }
    /*Update user details*/
    public function update()
    {
        $user_id = $this->input->post('id');
        $data = array();
        if (!empty($this->input->cookie('tab_id', true))) {
            $data['tab_id'] = $this->input->cookie('tab_id', true);
        } else {
            $data['tab_id'] = "1";
        }
        $data['result'] = $this->customer_model->get_customer_data($user_id);
        
        
        if (empty($data['result'])) {
            redirect('company/customer/listing', 'refresh');
        }
        
        $this->form_validation->set_rules('fname', $this->lang->line('field_first_name'), 'required|trim');
        $this->form_validation->set_rules('lname', $this->lang->line('field_last_name'), 'required|trim');
        $this->form_validation->set_rules('address_line1', $this->lang->line('address_line1'), 'required|trim');
        $this->form_validation->set_rules('city', $this->lang->line('field_city'), 'required|trim');
        $this->form_validation->set_rules('state', $this->lang->line('field_state'), 'required|trim');
        $this->form_validation->set_rules('branch', $this->lang->line('label_branch'), 'required|trim');

        if (($this->input->post('cellphone_number') != '') && ($this->input->post('telephone_number') != '')) {

            $this->form_validation->set_rules('telephone_number', $this->lang->line('field_telephone_number'), 'required|trim');
            $this->form_validation->set_rules('cellphone_number', $this->lang->line('field_cellphone_number'), 'required|trim');
        }
        $this->form_validation->set_rules('language',$this->lang->line('field_language'),'trim|required|in_list[English,Spanish]');
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == false) {
            
            $this->load->view($this->view_folder . 'edit', $data);
        } else {
            /* check email already registered or not? */
            if(($this->input->post('email') != $data['result']['email']) && ($this->input->post('email') != '')){
            $already_register = $this->customer_model->check_param(array('email' => $this->input->post('email'), 'id !=' => $user_id));
            if (!empty($already_register)) {
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_email_exist'));
                redirect(base_url('company/customer/edit/') . $user_id, 'refresh');
            }
        }

            if (!empty($this->input->post('user_name'))) {
                /* check user name already registered or not? */
                $already_register = $this->customer_model->check_param(array('user_name' => $this->input->post('user_name'), 'id !=' => $user_id));
                if (!empty($already_register)) {
                    $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_user_name_exist'));
                    redirect(base_url('company/customer/edit/') . $user_id, 'refresh');
                }
            }

            $lic_picture = $user_data['lic_picture'];
            if (!empty($_FILES['lic_picture']) && $_FILES['lic_picture']['size'] > 0) {
                $lic_picture = $this->common->image_upload($field = 'lic_picture', $path = './' . CUSTOMER_IMAGES);
                if (!$lic_picture) {
                    $this->session->set_flashdata('err_msg1', $this->upload->display_errors('', ''));
                    redirect(base_url('company/customer/edit/') . $user_id, 'refresh');
                }
            }
            $params = array(
                            'branch_id' => $this->input->post('branch'),
                            'fname' => $this->input->post('fname'),
                            'lname' => $this->input->post('lname'),
                            'email' => $this->input->post('email'),
                            'address_line1' => $this->input->post('address_line1'),
                            'address_line2' => $this->input->post('address_line2'),
                            'borough' => $this->input->post('borough'),
                            'apartment' => $this->input->post('apartment'),
                            'city' => $this->input->post('city'),
                            'state' => $this->input->post('state'),
                            'country' => $this->input->post('country'),
                            'zipcode' => $this->input->post('zipcode'),
                            'lic_picture' => $lic_picture,
                            'language' => $this->input->post('language'),
                        );
                        
            if (!empty($this->input->post('password'))) {
                $params['password'] = $this->common->AES_encrypt($this->input->post('password'));
            }
            if (!empty($this->input->post('company_name'))) {
                $params['company_name'] = $this->input->post('company_name');
            } else {
                $params['company_name'] = "";
            }
            if (!empty($this->input->post('user_name'))) {
                $params['user_name'] = $this->input->post('user_name');
            } else {
                $params['user_name'] = "";
            }
            if (!empty($this->input->post('website'))) {
                $params['website'] = $this->input->post('website');
            } else {
                $params['website'] = "";
            }
            if (!empty($this->input->post('lic_id'))) {
                $params['lic_id'] = $this->input->post('lic_id');
            } else {
                $params['lic_id'] = "";
            }
            if (!empty($this->input->post('price_code'))) {
                $params['price_code'] = $this->input->post('price_code');
            }
            if (!empty($this->input->post('agent_code'))) {
                $params['agent_code'] = $this->input->post('agent_code');
            }
            if (!empty($this->input->post('disable_pickup'))) {
                $params['disable_pickup'] = $this->input->post('disable_pickup');
            }
            if (!empty($this->input->post('latitude'))) {
                $params['latitude'] = $this->input->post('latitude');
            }
            if (!empty($this->input->post('longitude'))) {
                $params['longitude'] = $this->input->post('longitude');
            }
            
            if ($this->input->post('address_line_2') != '') {
                $params['address_line2'] = $this->input->post('address_line2');
            } else {
                $params['address_line2'] = "";
            }
            if (!empty($this->input->post('telephone_number'))) {
                $params['telephone_number'] = $this->input->post('telephone_number');
            } else {
                $params['telephone_number'] = "";
            }
            if (!empty($this->input->post('office_phone_number'))) {
                $params['office_phone_number'] = $this->input->post('office_phone_number');
            } else {
                $params['office_phone_number'] = "";
            }
            if (!empty($this->input->post('cellphone_number'))) {
                $params['cellphone_number'] = $this->input->post('cellphone_number');
            } else {
                $params['cellphone_number'] = "";
            }
            if (!empty($this->input->post('fax_number'))) {
                $params['fax_number'] = $this->input->post('fax_number');
            } else {
                $params['fax_number'] = "";
            }
            if (!empty($this->input->post('notes'))) {
                $params['notes'] = $this->input->post('notes');
            } else {
                $params['notes'] = "";
            }
            // Update customer details
            $this->customer_model->update_customer($user_id, $params);
            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_customer_update_success'));
            redirect('company/customer/listing/', 'refresh');
        }
    }

    /*View user profile*/
    public function view()
    {
        if (!$this->uri->segment(4)) {
            redirect('company/customer/listing', 'refresh');
        }
        $data = array();
        if (!empty($this->input->cookie('tab_id', true))) {
            $data['tab_id'] = $this->input->cookie('tab_id', true);
        } else {
            $data['tab_id'] = "1";
        }
        $data['result'] = $this->customer_model->get_customer_data($this->uri->segment(4));
        $this->load->view($this->view_folder . 'view', $data);
    }

    /*Change user status*/
    public function user_state()
    {
        if (!$this->uri->segment(4) && !$this->uri->segment(5)) {
            echo json_encode();
        }
        $ID = $this->uri->segment(4);
        $state = $this->uri->segment(5);
        $this->customer_model->user_state($ID, $state);
        echo json_encode();
    }

    /*List all shipto of customer by ajax call*/
    public function shipto_ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->customer_model->get_shipto_datatables();
        $data = array();
        $output = array(
            "meta" => array('page' => $AllPostData['datatable']['pagination']['page'], 'pages' => $AllPostData['datatable']['pagination']['pages'], 'perpage' => $AllPostData['datatable']['pagination']['perpage'], 'total' => $this->customer_model->shipto_count_filtered(), 'sort' => 'asc', 'field' => 'company_id'),
            "data" => $list,
        );
        //output to json format
        echo json_encode($output);
    }
/*4-Jun-2019*/
    public function invoice_detail_ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->customer_model->get_invoice_details_datatables();
        $data = array();
        $output = array(
            "meta" => array('page' => $AllPostData['datatable']['pagination']['page'], 'pages' => $AllPostData['datatable']['pagination']['pages'], 'perpage' => $AllPostData['datatable']['pagination']['perpage'], 'total' => $this->customer_model->invoice_details_count_filtered(), 'sort' => 'asc', 'field' => 'company_id'),
            "data" => $list,
        );
        $data['result'] = $output;
        $this->load->view($this->view_folder . 'view_invoice', $data);
        
    }
    public function create_invoice_shipto(){
        if($this->input->post('customer_id') == ''){
            $res['status'] = ERROR_CODE;
            $res['data'] = '';
            $res['message'] = $this->lang->line('please_add_a_customer_before_add_shipto');
            echo json_encode($res);
            die;
        }
        $this->form_validation->set_rules('shipto_fname', $this->lang->line('field_first_name'), 'required|trim');
        $this->form_validation->set_rules('shipto_lname', $this->lang->line('field_last_name'), 'required|trim');
        $this->form_validation->set_rules('shipto_address', $this->lang->line('field_address'), 'required|trim');
        $this->form_validation->set_rules('shipto_address_1', $this->lang->line('field_address_line_1'), 'required|trim');
        /*Updated 13-jun-2019*/
        /*$this->form_validation->set_rules('shipto_address_2', $this->lang->line('field_address_line_2'), 'trim|required');*/
        $this->form_validation->set_rules('shipto_province', $this->lang->line('label_province'), 'required|trim');
        $this->form_validation->set_rules('shipto_sector', $this->lang->line('label_sector'), 'required|trim');
        if (($this->input->post('shipto_telephone_number') == '') && ($this->input->post('shipto_cellphone_number') == '')) {
            $this->form_validation->set_rules('shipto_telephone_number', $this->lang->line('field_telephone_number'), 'required|trim');
            $this->form_validation->set_rules('shipto_cellphone_number', $this->lang->line('field_cellphone_number'), 'required|trim');
        }
        if ($this->form_validation->run() == false) {
            $res['status'] = ERROR_CODE;
            $res['data'] = '';
            $res['message'] = validation_errors();
            echo json_encode($res);
            die;

        } else {
            $params = array(
                'user_id' => $this->id,
                'customer_id' => $this->input->post('customer_id'),
                'fname' => $this->input->post('shipto_fname'),
                'lname' => $this->input->post('shipto_lname'),
                'address' => $this->input->post('shipto_address'),
                'address_line1' => $this->input->post('shipto_address_1'),
                'address_line2' => $this->input->post('shipto_address_2'),
                'sector' => $this->input->post('shipto_sector'),
                'province' => $this->input->post('shipto_province'),
                'lic_id' => $this->input->post('shipto_lic'),
                'latitude' => $this->input->post('shipto_latitude'),
                'longitude' => $this->input->post('shipto_longitude'),
                'telephone_number' => $this->input->post('shipto_telephone_number'),
                'cellphone_number' => $this->input->post('shipto_cellphone_number')
            );
            $id = $this->customer_model->add_shipto($params);
            $this->Main_model->updateCompanyRefIds('shipto_id', $id);
            $res['status'] = SUCCESS_CODE;
            $res['data'] = ['id' => $id];
            $res['message'] = $this->lang->line('text_shipto_add_success');
            echo json_encode($res);
            die;
        }

                
    }
    /*Add new shipto*/
    public function add_shipto($customer_id = "")
    {
        if (empty($customer_id)) {
            redirect(base_url("company/customer"), "refresh");
        }
        $data = array();
        $data['title'] = $this->lang->line('title_add_new_shipto');
        $data['second_title'] = $this->lang->line('title_edit_customer');
        $data['css'] = ['custom'];
        $data['js'] = ['https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js', MAP_API_URL, 'customer'];
        $data['function'] = 'add_shipto';
        $data['user_result'] = $this->customer_model->get_customer_data($customer_id);
        $data['next_id'] = $this->customer_model->get_next_shipto_id();
        if(($_SERVER['HTTP_REFERER'] == SITE_URL.'company/pickup/add') || 
        ($_SERVER['HTTP_REFERER'] == $this->session->userdata('redirect_url'))){
            $this->session->set_userdata('pickup_redirect',$_SERVER['HTTP_REFERER']);
        }
        $this->form_validation->set_rules('company_name', $this->lang->line('field_company_name'), 'trim');
        $this->form_validation->set_rules('fname', $this->lang->line('field_first_name'), 'required|trim');
        $this->form_validation->set_rules('lname', $this->lang->line('field_last_name'), 'required|trim');
        if($this->input->post('email') != '')
        $this->form_validation->set_rules('email', $this->lang->line('field_email'), 'trim|valid_email');
        $this->form_validation->set_rules('address', $this->lang->line('field_address'), 'required|trim');
        $this->form_validation->set_rules('address_line_1', $this->lang->line('field_address_line_1'), 'trim');
        $this->form_validation->set_rules('address_line_2', $this->lang->line('field_address_line_2'), 'trim');
        $this->form_validation->set_rules('country', $this->lang->line('field_country'), 'required|trim');
        $this->form_validation->set_rules('province', $this->lang->line('label_province'), 'required|trim');
        $this->form_validation->set_rules('sector', $this->lang->line('label_sector'), 'required|trim');
        if (($this->input->post('cellphone_number') != '') && ($this->input->post('telephone') != '')) {

            $this->form_validation->set_rules('telephone', $this->lang->line('field_telephone_number'), 'required|trim');
            $this->form_validation->set_rules('cellphone_number', $this->lang->line('field_cellphone_number'), 'required|trim');
        }
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == false) {

            $this->loadView($this->view_folder . 'add_shipto', $data);
        } else {

            /* check email already registered or not? */
            if($this->input->post('email')!=''){
            $already_register = $this->customer_model->check_shipto_param(array('email' => $this->input->post('email')));
            if (!empty($already_register)) {

                $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_email_exist'));
                $this->loadView($this->view_folder . 'add_shipto', $data);
                return;
            }
        }

            $lic_picture = "";
            if (!empty($_FILES['lic_picture']) && $_FILES['lic_picture']['size'] > 0) {

                $lic_picture = $this->common->image_upload($field = 'lic_picture', $path = './' . SHIPT_TO_IMAGES);
                if (!$lic_picture) {
                    
                    
                    $this->session->set_flashdata('err_msg1', $this->upload->display_errors('', ''));
                    $this->load->view($this->view_folder . 'add', $data);return;
                }
            }

            $params = array(
                'customer_id' => $this->input->post('customer_id'),
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'address_line1' => $this->input->post('address_line_1'),
                'address_line2' => $this->input->post('address_line_2'),
                'city' => '',
                'state' => '',
                'country' => $this->input->post('country'),
                'shipto_cedula' => '',
                'borough' => '',
                'region' => $this->input->post('region'),
                'municipal' => $this->input->post('municipal'),
                'lic_picture' => $lic_picture,
                'lic_id' => $this->input->post('lic_id'),
                'province' => $this->input->post('province'),
                'sector' => $this->input->post('sector'),

            );

            if (!empty($this->input->post('zipcode'))) {
                $params['zipcode'] = $this->input->post('zipcode');
            }

            if (!empty($this->input->post('borough'))) {
                $params['borough'] = $this->input->post('borough');
            }
            if (!empty($this->input->post('company_name'))) {
                $params['company_name'] = $this->input->post('company_name');
            }
            if (!empty($this->input->post('address_line_1'))) {
                $params['address_line1'] = $this->input->post('address_line_1');
            }
            if (!empty($this->input->post('address_line_2'))) {
                $params['address_line2'] = $this->input->post('address_line_2');
            }
            if (!empty($this->input->post('address_line_3'))) {
                $params['address_line3'] = $this->input->post('address_line_3');
            }
            if (!empty($this->input->post('cellphone_number'))) {
                $params['cellphone_number'] = $this->input->post('cellphone_number');
            }
            if (!empty($this->input->post('telephone'))) {
                $params['telephone_number'] = $this->input->post('telephone');
            }
            if (!empty($this->input->post('fax_number'))) {
                $params['fax_number'] = $this->input->post('fax_number');
            }
            if (!empty($this->input->post('latitude'))) {
                $params['latitude'] = $this->input->post('latitude');
            }
            if (!empty($this->input->post('longitude'))) {
                $params['longitude'] = $this->input->post('longitude');
            }
            $id = $this->customer_model->add_shipto($params);

            $this->Main_model->updateCompanyRefIds('shipto_id', $id);
            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_shipto_add_success'));
            if($this->session->userdata('pickup_redirect') != ''){

                $pickupRedirect = $this->session->userdata('pickup_redirect');
                $this->session->unset_userdata('pickup_redirect');
                redirect($pickupRedirect);

            }else{
                redirect('company/customer/edit/' . $customer_id, 'refresh');
            }
            
           
            
        }
    }

    /*View user profile*/
    public function view_shipto()
    {
        if (!$this->uri->segment(4)) {
            if ($this->agent->is_referral()) {
                redirect($this->agent->referrer(), 'refresh');
            }
            redirect('company/customer/listing', 'refresh');
        }
        $data = array();
        $data['result'] = $this->customer_model->get_shipto_data($this->uri->segment(4));
        $this->load->view($this->view_folder . 'view_shipto', $data);
    }

    /*Update shipto details*/
    public function edit_shipto()
    {
        $shipto_id = $this->uri->segment(4);
        $data = array();
        $data['result'] = $this->customer_model->get_shipto_data($shipto_id);
        if (empty($data['result'])) {
            if ($this->agent->is_referral()) {
                redirect($this->agent->referrer(), 'refresh');
            }
            redirect('company/customer/listing', 'refresh');
        }
        $data['title'] = $this->lang->line('title_edit_shipto');
        $data['second_title'] = $this->lang->line('title_edit_customer');
        $data['css'] = ['custom'];
        $data['js'] = ['https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js', MAP_API_URL, 'customer'];
        $data['function'] = 'add_shipto';
        $data['user_result'] = $this->customer_model->get_customer_data($customer_id);

        $data['next_id'] = $this->customer_model->get_next_shipto_id();

        $this->form_validation->set_rules('company_name', $this->lang->line('field_company_name'), 'trim');
        $this->form_validation->set_rules('fname', $this->lang->line('field_first_name'), 'required|trim');
        $this->form_validation->set_rules('lname', $this->lang->line('field_last_name'), 'required|trim');

        if($this->input->post('email') != ''){
        $this->form_validation->set_rules('email', $this->lang->line('field_email'), 'trim|valid_email');
        }

        $this->form_validation->set_rules('address', $this->lang->line('field_address'), 'required|trim');
        $this->form_validation->set_rules('address_line_1', $this->lang->line('field_address_line_1'), 'trim');
        $this->form_validation->set_rules('address_line_2', $this->lang->line('field_address_line_2'), 'trim');
        $this->form_validation->set_rules('country', $this->lang->line('field_country'), 'required|trim');
        $this->form_validation->set_rules('province', $this->lang->line('label_province'), 'required|trim');
        $this->form_validation->set_rules('sector', $this->lang->line('label_sector'), 'required|trim');

        if (($this->input->post('cellphone_number') != '') && ($this->input->post('telephone') != '')) {

            $this->form_validation->set_rules('telephone', $this->lang->line('field_telephone_number'), 'required|trim');
            $this->form_validation->set_rules('cellphone_number', $this->lang->line('field_cellphone_number'), 'required|trim');
        }

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == false) {
            $this->loadView($this->view_folder . 'edit_shipto', $data);
        } else {
            $lic_picture = $data['result']['lic_picture'];
            if (!empty($_FILES['lic_picture']) && $_FILES['lic_picture']['size'] > 0) {

                $lic_picture = $this->common->image_upload($field = 'lic_picture', $path = './' . SHIPT_TO_IMAGES);
                if (!$lic_picture) {
                    $this->session->set_flashdata('err_msg1', $this->upload->display_errors());
                    $this->loadView($this->view_folder . 'edit_shipto', $data);return;
                }
            }
            $params = array(
                'customer_id' => $this->input->post('customer_id'),
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'address_line1' => $this->input->post('address_line_1'),
                'address_line2' => $this->input->post('address_line_2'),
                'city' => '',
                'state' => '',
                'country' => $this->input->post('country'),
                'shipto_cedula' => '',
                'borough' => '',
                'region' => $this->input->post('region'),
                'municipal' => $this->input->post('municipal'),
                'lic_picture' => $lic_picture,
                'lic_id' => $this->input->post('lic_id'),
                'province' => $this->input->post('province'),
                'sector' => $this->input->post('sector')
            );

            if ($this->input->post('zipcode') != '') {
                $params['zipcode'] = $this->input->post('zipcode');
            }
            if ($this->input->post('company_name') != '') {
                $params['company_name'] = $this->input->post('company_name');
            }
            if ($this->input->post('address_line_1') != '') {
                $params['address_line1'] = $this->input->post('address_line_1');
            }
            if (!$this->input->post('address_line_2') != '') {
                $params['address_line2'] = $this->input->post('address_line_2');
            }
            if (!$this->input->post('address_line_3') != '') {
                $params['address_line3'] = $this->input->post('address_line_3');
            }
            if ($this->input->post('cellphone_number') != '') {
                $params['cellphone_number'] = $this->input->post('cellphone_number');
            }
            if ($this->input->post('telephone') != '') {
                $params['telephone_number'] = $this->input->post('telephone');
            }
            if (!$this->input->post('fax_number') != '') {
                $params['fax_number'] = $this->input->post('fax_number');
            }
            if ($this->input->post('latitude') != '') {
                $params['latitude'] = $this->input->post('latitude');
            }
            if ($this->input->post('longitude') != '') {
                $params['longitude'] = $this->input->post('longitude');
            }

            // Update customer details
            $this->customer_model->update_shipto($shipto_id, $params);

            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_shipto_update_success'));
            redirect('company/customer/edit/' . $data['result']['customer_id'], 'refresh');
        }

    }

    /* Delete customer */
    public function delete($customer_id)
    {
        if (!$customer_id) {
            echo json_encode();
        }
        $this->customer_model->customer_delete($customer_id);
        echo json_encode();
    }

    /* Delete shipto */
    public function delete_shipto($shipto_id)
    {
        if (!$shipto_id) {
            echo json_encode();
        }
        $this->customer_model->update_shipto($shipto_id, array('void' => 'Yes'));
        echo json_encode();
    }

    /*List all shipto of customer by ajax call*/
    public function pickup_ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->customer_model->get_pickup_datatables();
        $data = array();

        $output = array(
            "meta" => array('page' => $AllPostData['datatable']['pagination']['page'], 'pages' => $AllPostData['datatable']['pagination']['pages'], 'perpage' => $AllPostData['datatable']['pagination']['perpage'], 'total' => $this->customer_model->pickup_count_filtered(), 'sort' => 'asc', 'field' => 'company_id'),
            "data" => $list,
        );
        //output to json format
        echo json_encode($output);
    }
    public function payment_get_invoice_list(){
        if($this->input->post() && $this->input->is_ajax_request()){
        $data = array();
        $this->load->model('company/invoices_model');
        $data['driver_list'] = $this->invoices_model->get_driver_list();
        $data['payment_type'] = $this->Main_model->getType('payment');
        $data['customer_id'] = $this->input->post('id');
        $string =  $this->load->view($this->payment_view_folder.'payment_screen',$data,true);
        $res['status'] = SUCCESS_CODE;
        $res['data'] = $string;
        $res['message'] = '';
        echo json_encode($res);
        die;   
        }else{

        }        
    }
    // Payment full Details 10-Jun-2019
    public function paymentDetails(){
        if($this->input->post() && $this->input->is_ajax_request()){
        $data = array();
        $this->load->model('company/invoices_model');
        $data['invoiceId'] = $this->input->post('id');
        $data['invoiceList'] = $this->invoices_model->invoiceDetail($this->input->post('id'));
        $string =  $this->load->view($this->view_folder.'view_invoice',$data,true);
        $res['status'] = SUCCESS_CODE;
        $res['data'] = $string;
        $res['message'] = '';
        echo json_encode($res);
        die;   
        }else{
        }        
    }
    // customer edit payment screen
    public function payment_data_list(){

        if($this->input->post() && $this->input->is_ajax_request()){
        $data = array();
        $this->load->model('company/invoices_model');
        $data['customer_id'] = $this->input->post('id');
        $data['driver_list'] = $this->invoices_model->get_driver_list();
        /*10-JUN-2019*/
        $data['totalAmt'] = $this->invoices_model->countTotalAmt($this->input->post('id'));
        $data['totalBal'] = $this->invoices_model->countTotalBal($this->input->post('id'));
       
        $data['payment_type'] = $this->Main_model->getType('payment');
        //10-jan-2019 count the total payment of the customer
        $data['Countpayment'] = $this->invoices_model->countPayment($this->input->post('id'));
        $string =  $this->load->view($this->payment_view_folder.'payments_data_screen',$data,true);
        $res['status'] = SUCCESS_CODE;
        $res['data'] = $string;
        $res['message'] = '';
        echo json_encode($res);
        die;   
        }else{

        }        
    }

}
