<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payments extends MYcom_Controller {

    private $view_folder = 'company/payments/';
    function __construct()
    {
        parent::__construct();
        $this->load->model('company/payments_model','this_model');
        
    }

    /*Default index call*/
    public function index()
    {
       
       
        $this->listing();
    }

    /*Listing all customer*/
    public function listing()
    {
        
        $data = array();
        $data['title'] = $this->lang->line('title_customer_list');
        $data['second_title'] = $this->lang->line('title_customer_list');
        $data['js'] = [base_url().'assets/demo/default/custom/components/parsley/dist/parsley.min.js'];
        $this->loadView($this->view_folder . 'customer_listing', $data);
    }

    /*List all Customer by ajax call*/
    public function ajax_list()
    {
        $AllPostData = $this->input->post();
        $this->load->model('company/customer_model');
        $list = $this->customer_model->get_datatables();
        $data = array();

        $output = array(
            "meta" => array('page' => $AllPostData['datatable']['pagination']['page'], 'pages' => $AllPostData['datatable']['pagination']['pages'], 'perpage' => $AllPostData['datatable']['pagination']['perpage'], 'total' => $this->customer_model->count_filtered(), 'sort' => 'asc', 'field' => 'company_id'),
            "data" => $list,
        );
        //output to json format
        echo json_encode($output);
    }
    
    public function get_invoice_list(){

        if($this->input->post() && $this->input->is_ajax_request()){

        $data = array();
        $this->load->model('company/invoices_model');
        $data['driver_list'] = $this->invoices_model->get_driver_list();
        $data['payment_type'] = $this->Main_model->getType('payment');
        $data['customer_id'] = $this->input->post('id');
        $string =  $this->load->view($this->view_folder.'payment_screen',$data,true);

        $res['status'] = SUCCESS_CODE;
        $res['data'] = $string;
        $res['message'] = '';
        echo json_encode($res);
        die;
        
        

        }else{

        }
        

        
    }
 function pay_invoices(){
    //print_r($this->input->post());
    //die();

    if($this->input->post() && $this->input->is_ajax_request()){

        
        $this->form_validation->set_rules('p_currency', $this->lang->line('label_currency'), 'required|trim');
        $this->form_validation->set_rules('p_amount', $this->lang->line('label_amount'), 'required|trim|numeric');
        $this->form_validation->set_rules('p_payment_type', $this->lang->line('label_payment_type'), 'required|trim|numeric');
        $this->form_validation->set_rules('p_driver', $this->lang->line('label_driver'), 'required|trim|numeric');
        
        if ($this->input->post('p_currency') == 'peso') {

            $this->form_validation->set_rules('p_exchange_rate', $this->lang->line('field_exchange_rate'), 'required|trim|numeric');
            //$this->form_validation->set_rules('p_total_peso', $this->lang->line('label_total_peso'), 'required|trim|numeric');
        }

        if ($this->form_validation->run() == false) {

            $res['status'] = ERROR_CODE;
            $res['data'] = '';
            $res['message'] = validation_errors();
            echo json_encode($res);
            die;
        }
        $this->this_model->pay_invoices($this->input->post());
    }
    die;
 }
    function manage_type(){


        if($this->input->post() && $this->input->is_ajax_request()){

            $this->form_validation->set_rules('name',$this->lang->line('label_payment_type'),'required|trim');
            if ($this->form_validation->run() == FALSE)
            {
                $res['res'] = ERROR_CODE;
                $res['message'] = validation_errors();

                echo json_encode($res,true);
                die;
        
            } else{
                
                $response = $this->this_model->insert_manage_type($this->input->post());

                echo json_encode($response);
                die;


            }


        }

        $data['title'] = $this->lang->line('payment_maintenance');
        $data['payment_type'] = $this->Main_model->getType('payment');
        
        
        $this->loadView($this->view_folder.'add_payment_type',$data);
        
        
    }

    public function delete(){

        if($this->input->post() && $this->input->is_ajax_request()){

             $params = ['void' => '1'];
             $id = $this->input->post('id');

             $response = $this->this_model->update($params,$id);

             $res['message'] = $this->lang->line('payment_type_deleted_successfully');
             $res['status'] = SUCCESS_CODE;

             echo json_encode($res,true);
             die;



        }else{


            die('eerror');
        }
    }

    public function edit()
    {

        

        $this->form_validation->set_rules('name',$this->lang->line('label_payment_type'),'required|trim');
            if ($this->form_validation->run() == FALSE)
            {
                $res['res'] = ERROR_CODE;
                $res['message'] = validation_errors();

                echo json_encode($res,true);
                die;
        
            }else{

                $params = ['name' => $this->input->post('name')];
                $id = $this->input->post('id');
                $response = $this->this_model->update($params,$id);
                $res['message'] = $this->lang->line('payment_type_updated_successfully');
                $res['status'] = SUCCESS_CODE;
                echo json_encode($res,true);
                die;

            }

   
    }
}
