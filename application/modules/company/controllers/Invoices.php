<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Invoices extends MYcom_Controller {

    private $view_folder = 'company/invoices/';
    private $payment_view_folder = 'company/payments/';
    function __construct()
    {
        parent::__construct();
        $this->load->model('company/invoices_model');
    }

    /*Default index call*/
    function index()
    {
        $this->listing();
    }

    /*Listing all invoices*/
    function listing()
    {
        $data = array();
        $data['customer_list'] = $this->invoices_model->get_customer_list();
        $data['username'] = $this->username;
        $data['driver_list'] = $this->invoices_model->get_driver_list();
        $data['agent_list'] = $this->invoices_model->get_agent_list();
        $data['next_shipto_id'] = $this->invoices_model->get_next_shipto_id();
        $data['title'] = $this->lang->line('title_invoices_list');
        $data['js'] = [MAP_API_URL,'invoice', base_url().'assets/demo/default/custom/components/parsley/dist/parsley.min.js'];
        $this->loadView($this->view_folder.'listing', $data);
    }

    /*Listing all invoices*/
    function invoice()
    {
        $data = array();
        $data['customer_list'] = $this->invoices_model->get_customer_list();
        $data['driver_list'] = $this->invoices_model->get_driver_list();
        $data['next_shipto_id'] = $this->invoices_model->get_next_shipto_id();
        $this->load->view($this->view_folder.'invoice', $data);
    }

    /**
     * ajax_list
     * This datatable is calling from two methods one from invoice module and payment module
     * 
     * $customer_id is only used to show datatable in payment_module
     * 
     */
    function ajax_list($customer_id = '')
    {
        $AllPostData = $this->input->post();
        $list = $this->invoices_model->get_datatables($customer_id);
        $data = array();
        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->invoices_model->count_filtered(),'sort'=>'asc','field'=>'company_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
    } 
    // customer edit payment screen & update on 10-jun-2019
    function ajax_payment_list($customer_id = '')
    {
        $AllPostData = $this->input->post();
        $list = $this->invoices_model->get_payment_datatables($customer_id);
        $data = array();
        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->invoices_model->count_total_filtered($customer_id),'sort'=>'desc','field'=>'company_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
    } 

function ajax_listss($customer_id = '')
    {
        $AllPostData = $this->input->post();
        $list = $this->invoices_model->get_datatablesss($customer_id);
        $data = array();
        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->invoices_model->count_filteredss(),'sort'=>'asc','field'=>'company_id'),
                    "data" => $list,
                );
        //output to json format
        echo json_encode($output);
    } 
    /*Add new invoices*/
    function add()
    {
        $message = array();
        $this->form_validation->set_rules('date',$this->lang->line('field_date'),'required|trim');
        $this->form_validation->set_rules('due_date',$this->lang->line('field_due_date'),'trim');
        $this->form_validation->set_rules('user',$this->lang->line('field_user'),'trim');
        $this->form_validation->set_rules('misc',$this->lang->line('field_misc'),'trim');
        $this->form_validation->set_rules('invoice_hash',$this->lang->line('field_invoice_number'),'required|trim');
        $this->form_validation->set_rules('agent_invoice',$this->lang->line('field_agent_invoice'),'trim');
        $this->form_validation->set_rules('container',$this->lang->line('field_container'),'required|trim');
        $this->form_validation->set_rules('agent',$this->lang->line('field_agent'),'trim');
        $this->form_validation->set_rules('driver_id',$this->lang->line('field_driver_id'),'required|trim');
        $this->form_validation->set_rules('pay_term',$this->lang->line('field_pay_term'),'required|trim');
        $this->form_validation->set_rules('status',$this->lang->line('field_status'),'required|trim');
        $this->form_validation->set_rules('tot_box',$this->lang->line('field_tot_box'),'required|trim|numeric');
        $this->form_validation->set_rules('sub_total',$this->lang->line('field_sub_total'),'required|trim|numeric');
        $this->form_validation->set_rules('final_tax',$this->lang->line('field_final_tax'),'required|trim|numeric');
        $this->form_validation->set_rules('final_discount',$this->lang->line('field_final_discount'),'required|trim|numeric');
        $this->form_validation->set_rules('final_insurance',$this->lang->line('field_final_insurance'),'required|trim');
        $this->form_validation->set_rules('final_payment',$this->lang->line('field_final_payment'),'required|trim|numeric');
        $this->form_validation->set_rules('final_balance',$this->lang->line('field_final_balance'),'required|trim|numeric');
        $this->form_validation->set_rules('shipto_id',$this->lang->line('label_shipto_details'),'required|trim|numeric');
        $this->form_validation->set_rules('text_customer_id',$this->lang->line('label_customer_details'),'required|trim|numeric');

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $message['code'] = "0";
            $message['message'] = validation_errors();
        } 
        else 
        {   $customer_id = $shipto_id = 0;
           
            $customer_id = $this->input->post('text_customer_id');
            $shipto_id = $this->input->post('shipto_id');
            $has_insrance = (!empty($this->input->post('final_insurance')))? "Yes" : "No";

            /* internal invoice number */
            /* branch_id-nextinvoice_id_of_branch */

            $params = array(
                'customer_id' => $customer_id,
                'shipto_id' => $shipto_id,
                'void' => 'No',
                'user_id' => $this->id,
                'invoice_date' => date("Y-m-d",strtotime(str_replace('/', '-',$this->input->post('date')))),
                'invoice_number' => $this->input->post('invoice_hash'), 
                'agent_number' => $this->input->post('agent_invoice'), 
                'container' => $this->input->post('container'), 
                'driver_id' => $this->input->post('driver_id'), 
                'pay_term' => $this->input->post('pay_term'), 
                'status' => $this->input->post('status'), 
                'sub_total' => $this->input->post('sub_total'), 
                'total_packages' => $this->input->post('tot_box'), 
                'final_tax' => $this->input->post('final_tax'), 
                'final_discount' => $this->input->post('final_discount'), 
                'final_insurance' => $this->input->post('final_insurance'), 
                'final_payment' => $this->input->post('final_payment'), 
                'final_balance' => $this->input->post('final_balance'), 
                'balance' => $this->input->post('final_balance')
            );
            if(!empty($this->input->post('user'))){
                $params['user_name'] = $this->input->post('user');
            }
            if(!empty($this->input->post('misc'))){
                $params['misc'] = $this->input->post('misc');
            }
            if(!empty($this->input->post('agent_invoice'))){
                $params['agent_number'] = $this->input->post('agent_invoice');
            }
            if(!empty($this->input->post('agent'))){
                $params['agent'] = $this->input->post('agent');
            }
            if(!empty($this->input->post('due_date'))){
                $params['duedate'] = date("Y-m-d",strtotime(str_replace('/', '-',$this->input->post('due_date'))));
            }
            $header_last_id = $this->invoices_model->add_invoices($params);

           
            
            /* now add items */
            $item_params = array();
            for ($i=0; $i < count($this->input->post('item')); $i++) { 
                $i_param = array(
                    'header_id' => $header_last_id,
                    'description_1' =>  $this->input->post('item')[$i],
                    'line_number' => ($i+1),
                    'qty' =>  $this->input->post('qty')[$i],
                    'rate' =>  $this->input->post('price')[$i],
                    'discount' =>  $this->input->post('discount')[$i],
                    'insurance' =>  $this->input->post('insurance')[$i],
                    'tax' =>  $this->input->post('tax')[$i],
                    'total_price' =>  $this->input->post('total')[$i],
                );
                $item_params[] = $i_param;
            }
            if(!empty($item_params)){
                $header_id = $this->invoices_model->add_invoice_items($item_params);
            }
            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_invoices_add_success'));
            $message['code'] = "1";
            $message['data_item'] = ['id' => $header_last_id];
            $message['message'] = $this->lang->line('text_invoices_add_success');
        }
        header('Content-Type: application/json');
        echo json_encode($message);
    }

  
    /*View invoices profile*/
    function view()
    {
        if (!$this->uri->segment(4)) 
        {
            redirect('company/invoices/listing','refresh');
        }
        $data = array();
        if(!empty($this->input->cookie('tab_id', TRUE))){
            $data['tab_id'] = $this->input->cookie('tab_id', TRUE);
        } else {
            $data['tab_id'] = "1";
        }
        $data['result'] = $this->invoices_model->get_invoices_data($this->uri->segment(4));
        $this->load->view($this->view_folder.'view', $data);
    }

    /*Delete invoices*/
    function delete($invoice_id)
    {   
        if (!$invoice_id) {
            echo json_encode();
        }
        $this->invoices_model->delete($invoice_id);
        echo json_encode();
    }

    /*Delete invoices*/
    function view_pdf()
    {   
        if (!$this->uri->segment(4)) 
        {
            redirect('company/invoices/listing','refresh');
        }
        $data = array();
        $data['result'] = $this->invoices_model->get_invoices_data($this->uri->segment(4));
        $data['items_list'] = $this->invoices_model->get_invoices_items($this->uri->segment(4));
        $data['customer_data'] = $this->invoices_model->get_customer_data($data['result']['customer_id']);
        $data['shipto_data'] = $this->invoices_model->get_shipto_data($data['result']['shipto_id']);
        $this->load->view($this->view_folder.'invoice', $data);
    }

    public function pay_invoice(){

        if($this->input->post() && $this->input->is_ajax_request()){
            $this->form_validation->set_rules('p_invoice_id', $this->lang->line('label_invoice_hash'), 'required|trim');
            $this->form_validation->set_rules('p_currency', $this->lang->line('label_currency'), 'required|trim');
            $this->form_validation->set_rules('p_amount', $this->lang->line('label_amount'), 'required|trim|numeric');
            $this->form_validation->set_rules('p_payment_type', $this->lang->line('label_payment_type'), 'required|trim|numeric');
            $this->form_validation->set_rules('p_driver', $this->lang->line('label_driver'), 'required|trim|numeric');
            if ($this->input->post('p_currency') == 'peso') {
                $this->form_validation->set_rules('p_exchange_rate', $this->lang->line('field_exchange_rate'), 'required|trim|numeric');
            }
    
            if ($this->form_validation->run() == false) {
                $res['status'] = ERROR_CODE;
                $res['data'] = '';
                $res['message'] = validation_errors();
                echo json_encode($res);
                die;
    
            }
            $this->invoices_model->pay_invoice($this->input->post());
        }
    }
    /* get customer list by ajax */
    function get_customer_list_json()
    {
        $output = $this->invoices_model->get_customer_list_search(strtolower($this->uri->segment(4)));
        echo json_encode($output);
    } 

    function get_payment_form(){
        $data['result'] = $this->invoices_model->get_invoices_data($this->uri->segment(4));
        $data['driver_list'] = $this->invoices_model->get_driver_list();
        $data['payment_type'] = $this->Main_model->getType('payment');
        $data['customer_id'] = $this->input->post('id');
        echo $this->load->view($this->view_folder.'payment_screen',$data,true);
    }

    function get_claim_form(){
        $data['result'] = $this->invoices_model->get_claim_data($this->uri->segment(4));
        echo $this->load->view($this->view_folder.'claim_screen',$data,true);
    }
 function add_claim(){
    if($this->input->post() && $this->input->is_ajax_request()){
        $this->form_validation->set_rules('claim', $this->lang->line('label_invoice_hash'), 'required|trim');
        $this->form_validation->set_rules('claim_invoice_number', $this->lang->line('label_invoice_number'), 'required|trim');
        if ($this->form_validation->run() == false) {
            $res['status'] = ERROR_CODE;
            $res['data'] = '';
            $res['message'] = validation_errors();
            echo json_encode($res);
            die;

        }

        $res = $this->invoices_model->add_claim($this->input->post());
        echo json_encode($res);
        die;
    }
 }
    function get_mail_form(){
        $string = $this->load->view($this->view_folder.'mail_screen','',true);
        echo $string;
        die;
    }

    /* get item list by ajax */
    function get_item_list_json()
    {
        $output = $this->invoices_model->get_item_list_search(strtolower($this->uri->segment(4)));
        echo json_encode($output);
    } 

    /* get customer data by ajax */
    function get_customer_data($customer_id ="")
    {
        $output = array('result'=>'');
        if(!empty($customer_id)){
            $output['result'] = $this->invoices_model->get_customer_data($customer_id);
        }
        echo json_encode($output);
    } 

    /* get shipto list data by ajax */
    function get_customer_shipto($customer_id ="")
    {
        if(!empty($customer_id)){
            $output = $this->invoices_model->get_customer_shipto($customer_id);
        }
        echo json_encode($output);
    } 


    /* get shipto data by ajax */
    function get_shipto_data($shipto_id)
    {
        $output = array('result'=>'');
        if(!empty($shipto_id)){
            $output['result'] = $this->invoices_model->get_shipto_data($shipto_id);
        }
        echo json_encode($output);
        die;
    }

    

    /* send email pdf */
    function send_invoice_email()
    {
        if($this->input->post() && $this->input->is_ajax_request()){
        $AllPostData=$this->input->post();
        $this->form_validation->set_rules('email',$this->lang->line('field_email'),'required|trim|valid_email');
        if ($this->form_validation->run() == FALSE)
        {
            $res['status'] = ERROR_CODE;
            $res['message'] = validation_errors();
            echo json_encode($res);
            die;
        } 
        else 
        {
            $data = array();
            $email=$AllPostData['email'];
            $invoice_id=$AllPostData['invoice_id'];
            $data['result'] = $this->invoices_model->get_invoices_data($invoice_id);
            $data['items_list'] = $this->invoices_model->get_invoices_items($invoice_id);
            $data['customer_data'] = $this->invoices_model->get_customer_data($data['result']['customer_id']);
            $data['shipto_data'] = $this->invoices_model->get_shipto_data($data['result']['shipto_id']);
            $html=$this->load->view($this->view_folder.'invoice_pdf_generate', $data,true);
            $pdfFilePath="assets/upload/invoice_pdf/";
            $pdfFilePath.="invoice_".date("d-m-Y")."_".time().".pdf";
            //load mPDF library
            $this->load->library('m_pdf');
            //generate the PDF from the given html
            $this->m_pdf->pdf->WriteHTML($html);
            $this->m_pdf->pdf->Output($pdfFilePath); 
            $cname=$this->session->userdata('company_name');
            $cemail=$this->session->userdata('company_email');
            $subject="Invoice Email";
            $message="Hello,<br/>Please find invoice attachment.<br/>Thanks,<br/>$cname";
            $mail_arr= array('to' =>$email ,
                "from"=>$cemail,
                "from_name"=>$cname,
                "subject"=>$subject,
                "message"=>$message,
                "attachment"=>$pdfFilePath);
            if($this->common->send_email_pdf($mail_arr))
            {
                $res['status'] = SUCCESS_CODE;
                $res['message'] = $this->lang->line('text_send_invoice_email_success');
                
            }
            else
            {                
                $res['status'] = ERROR_CODE;
                $res['message'] = $this->lang->line('text_send_invoice_email_success');
            }

            echo json_encode($res);
            die;
        }
     }
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
    /* This function is used for load invoice details in ajax */
    function get_invoice_details_ajax($id)
    {        
        $data=array();
        $data['customer_list'] = $this->invoices_model->get_customer_list();
        $data['driver_list'] = $this->invoices_model->get_driver_list();
        $data['next_shipto_id'] = $this->invoices_model->get_next_shipto_id();
        $data['agent_list'] = $this->invoices_model->get_agent_list();
        $data['result'] = $this->invoices_model->get_invoices_data($id);
        $data['result']['customer_data']=$this->invoices_model->get_customer_data($data['result']['customer_id']);
        $data['result']['shipto_data']=$this->invoices_model->get_shipto_data($data['result']['shipto_id']);
        $data['result']['invoice_items']=$this->invoices_model->get_invoices_items($id);
        $inv_count=count($data['result']['invoice_items']);
        $data['invoice_item_count']=$inv_count;
        $data['edit_invoice_id']=$id;
        $html=$this->load->view($this->view_folder.'edit_invoice_content', $data,true);
        print_r($html); die;
    }

    /*Add new invoices*/
    function edit()
    {
        $message = array();
        if($this->input->post('edit_text_customer_id') == ''){
            $message['code'] = "0";
            $res['message'] = $this->lang->line('please_add_a_customer_before_add_shipto');
            echo json_encode($res);
            die;
        }
        
        
        $this->form_validation->set_rules('edit_shipto_fname', $this->lang->line('label_shipto_details').' '.$this->lang->line('field_first_name'), 'required|trim');
        $this->form_validation->set_rules('edit_shipto_lname', $this->lang->line('label_shipto_details').' '.$this->lang->line('field_last_name'), 'required|trim');
        $this->form_validation->set_rules('edit_shipto_address', $this->lang->line('label_shipto_details').' '.$this->lang->line('field_address'), 'required|trim');
        $this->form_validation->set_rules('edit_shipto_address_1', $this->lang->line('label_shipto_details').' '.$this->lang->line('field_address_line_1'), 'required|trim');
        $this->form_validation->set_rules('edit_shipto_address_2', $this->lang->line('label_shipto_details').' '.$this->lang->line('field_address_line_2'), 'trim|required');
      
        $this->form_validation->set_rules('edit_shipto_province', $this->lang->line('label_shipto_details').' '.$this->lang->line('label_province'), 'required|trim');
        $this->form_validation->set_rules('edit_shipto_sector', $this->lang->line('label_shipto_details').' '.$this->lang->line('label_sector'), 'required|trim');
        if (($this->input->post('edit_shipto_telephone_number') == '') && ($this->input->post('edit_shipto_cellphone_number') == '')) {

            $this->form_validation->set_rules('edit_shipto_telephone_number', $this->lang->line('label_shipto_details').' '.$this->lang->line('field_telephone_number'), 'required|trim');
            $this->form_validation->set_rules('edit_shipto_cellphone_number', $this->lang->line('label_shipto_details').' '.$this->lang->line('field_cellphone_number'), 'required|trim');
        }


        // $this->form_validation->set_rules('company_name', $this->lang->line('label_company'), 'required|trim');
        $this->form_validation->set_rules('edit_customer_fname', $this->lang->line('label_customer').' '.$this->lang->line('label_first_name'), 'required|trim');
        $this->form_validation->set_rules('edit_customer_lname', $this->lang->line('label_customer').' '.$this->lang->line('label_last_name'), 'required|trim');
        $this->form_validation->set_rules('edit_customer_address_1', $this->lang->line('label_customer').' '.$this->lang->line('label_address_1'), 'required|trim');
        $this->form_validation->set_rules('edit_customer_city', $this->lang->line('label_customer').' '.$this->lang->line('label_city'), 'required|trim');
        $this->form_validation->set_rules('edit_customer_state', $this->lang->line('label_customer').' '.$this->lang->line('label_state'), 'required|trim');
        //$this->form_validation->set_rules('customer_balance', $this->lang->line('label_balance'), 'required|trim');
        $this->form_validation->set_rules('edit_customer_zipcode', $this->lang->line('label_customer').' '.$this->lang->line('label_zipcode'), 'required|trim');
        
        if (($this->input->post('edit_customer_telephone_number') == '') && ($this->input->post('edit_customer_cellphone_number') == '')) {

            $this->form_validation->set_rules('edit_customer_telephone_number', $this->lang->line('label_customer').' '.$this->lang->line('field_telephone_number'), 'required|trim|max_length[12]');
            $this->form_validation->set_rules('edit_customer_cellphone_number', $this->lang->line('label_customer').' '.$this->lang->line('field_cellphone_number'), 'required|trim|max_length[12]');
        }

        $this->form_validation->set_rules('edit_date',$this->lang->line('field_date'),'required|trim');
        $this->form_validation->set_rules('edit_due_date',$this->lang->line('field_due_date'),'trim');
        $this->form_validation->set_rules('edit_user',$this->lang->line('field_user'),'trim');
        $this->form_validation->set_rules('edit_misc',$this->lang->line('field_misc'),'trim');
        $this->form_validation->set_rules('edit_invoice_hash',$this->lang->line('field_invoice_number'),'required|trim');
        $this->form_validation->set_rules('edit_agent_invoice',$this->lang->line('field_agent_invoice'),'trim');
        $this->form_validation->set_rules('edit_container',$this->lang->line('field_container'),'required|trim');
        $this->form_validation->set_rules('edit_agent',$this->lang->line('field_agent'),'trim');
        $this->form_validation->set_rules('edit_driver_id',$this->lang->line('field_driver_id'),'required|trim');
        $this->form_validation->set_rules('edit_pay_term',$this->lang->line('field_pay_term'),'required|trim');
        $this->form_validation->set_rules('edit_status',$this->lang->line('field_status'),'required|trim');
        $this->form_validation->set_rules('edit_tot_box',$this->lang->line('field_tot_box'),'required|trim');
        $this->form_validation->set_rules('edit_sub_total',$this->lang->line('field_sub_total'),'required|trim');
        $this->form_validation->set_rules('edit_final_tax',$this->lang->line('field_final_tax'),'required|trim');
        $this->form_validation->set_rules('edit_final_discount',$this->lang->line('field_final_discount'),'required|trim');
        $this->form_validation->set_rules('edit_final_insurance',$this->lang->line('field_final_insurance'),'required|trim');
        $this->form_validation->set_rules('edit_final_payment',$this->lang->line('field_final_payment'),'required|trim');
        $this->form_validation->set_rules('edit_final_balance',$this->lang->line('field_final_balance'),'required|trim');
            
        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            $message['code'] = "0";
            $message['message'] = validation_errors();
        } 
        else 
        {   $customer_id = $shipto_id = 0;
            $edit_invoice_id=$this->input->post('edit_invoice_id');

           
                 $customer_id = $this->input->post('edit_text_customer_id');
                $params = array(
                    'user_id' => $this->id,
                    'fname' => $this->input->post('edit_customer_fname'),
                    'lname' => $this->input->post('edit_customer_lname'),
                    'address_line1' => $this->input->post('edit_customer_address_1'),
                    'latitude' => $this->input->post('edit_customer_latitude'),
                    'longitude' => $this->input->post('edit_customer_longitude'),
                    'address_line2' => $this->input->post('edit_customer_address_2'),
                    'city' => $this->input->post('edit_customer_city'),
                    'state' => $this->input->post('edit_customer_state'),
                    'zipcode' => $this->input->post('edit_customer_zipcode'),
                    'telephone_number' => $this->input->post('edit_customer_telephone_number'),
                    'cellphone_number' => $this->input->post('edit_customer_cellphone_number'),
                    'lic_id' => $this->input->post('edit_customer_lic')
                    
                );
                $this->invoices_model->update_customer($customer_id,$params);
                $shipto_id = $this->input->post('edit_shipto_id');
                $params = array(
                    'user_id' => $this->id,
                    'customer_id' => $this->input->post('edit_text_customer_id'),
                    'fname' => $this->input->post('edit_shipto_fname'),
                    'lname' => $this->input->post('edit_shipto_lname'),
                    'address' => $this->input->post('edit_shipto_address'),
                    'address_line1' => $this->input->post('edit_shipto_address_1'),
                    'address_line2' => $this->input->post('edit_shipto_address_2'),
                    'sector' => $this->input->post('edit_shipto_sector'),
                    'province' => $this->input->post('edit_shipto_province'),
                    'lic_id' => $this->input->post('edit_shipto_lic'),
                    'latitude' => $this->input->post('edit_shipto_latitude'),
                    'longitude' => $this->input->post('edit_shipto_longitude'),
                    'telephone_number' => $this->input->post('edit_shipto_telephone_number'),
                    'cellphone_number' => $this->input->post('edit_shipto_cellphone_number')
                );
                $this->invoices_model->update_shipto($shipto_id, $params);
                $has_insrance = (!empty($this->input->post('edit_final_insurance')))? "Yes" : "No";

            /* internal invoice number */
            /* branch_id-nextinvoice_id_of_branch */
            $params = array(
                'customer_id' => $customer_id,
                'shipto_id' => $shipto_id,
                'void' => 'No',
                'invoice_date' => date("Y-m-d",strtotime(str_replace('/', '-',$this->input->post('edit_date')))),
                'invoice_number' => $this->input->post('edit_invoice_hash'), 
                'container' => $this->input->post('edit_container'), 
                'driver_id' => $this->input->post('edit_driver_id'), 
                'agent' => $this->input->post('agent'), 
                'pay_term' => $this->input->post('edit_pay_term'), 
                'status' => $this->input->post('edit_status'), 
                'sub_total' => $this->input->post('edit_sub_total'), 
                'total_packages' => $this->input->post('edit_tot_box'), 
                'final_tax' => $this->input->post('edit_final_tax'), 
                'final_discount' => $this->input->post('edit_final_discount'), 
                'final_insurance' => $this->input->post('edit_final_insurance'), 
                'final_payment' => $this->input->post('edit_final_payment'), 
                'final_balance' => $this->input->post('edit_final_balance'), 
                'balance' => $this->input->post('edit_final_balance'),
            );
            if(!empty($this->input->post('edit_user'))){
                $params['user_name'] = $this->input->post('edit_user');
            }
            if(!empty($this->input->post('edit_misc'))){
                $params['misc'] = $this->input->post('edit_misc');
            }
            if(!empty($this->input->post('edit_agent_invoice'))){
                $params['agent_number'] = $this->input->post('edit_agent_invoice');
            }
            if(!empty($this->input->post('edit_agent'))){
                $params['agent'] = $this->input->post('edit_agent');
            }
            if(!empty($this->input->post('edit_due_date'))){
                $params['duedate'] = date("Y-m-d",strtotime(str_replace('/', '-',$this->input->post('edit_due_date'))));
            }            
            $this->invoices_model->update_invoices($edit_invoice_id,$params);
            
            /* delete existing items*/
            $this->invoices_model->delete_invoice_items($edit_invoice_id);

            /* now add items */
            $item_params = array();
            for ($i=0; $i < count($this->input->post('edit_item')); $i++) { 
                $i_param = array(
                    'header_id' => $edit_invoice_id,
                    'description_1' =>  $this->input->post('edit_item')[$i],
                    'line_number' => ($i+1),
                    'qty' =>  $this->input->post('edit_qty')[$i],
                    'rate' =>  $this->input->post('edit_price')[$i],
                    'discount' =>  $this->input->post('edit_discount')[$i],
                    'insurance' =>  $this->input->post('edit_insurance')[$i],
                    'tax' =>  $this->input->post('edit_tax')[$i],
                    'total_price' =>  $this->input->post('edit_total')[$i],
                );
                $item_params[] = $i_param;
            }
            if(!empty($item_params)){
                $header_id = $this->invoices_model->add_invoice_items($item_params);
            }
            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_invoices_update_success'));
            $message['code'] = "1";
            $message['message'] = $this->lang->line('text_invoices_update_success');
        }
        
        header('Content-Type: application/json');
        echo json_encode($message);
    }

}

