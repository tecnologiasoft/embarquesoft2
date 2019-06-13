<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batch_distribution extends MYcom_Controller {

	private $view_folder = 'company/batch_distribution/';
	public function __construct()
	{
		parent::__construct();

		$this->load->model('company/Batch_distribution_model');
	}

    /*Default index call*/
	function index()
	{
		$this->listing();
	}

    /*Listing all batch*/
	function listing()
    {
        $data = array();
        $data['title'] = $this->lang->line('title_batch_list');
        //$data['second_title'] = $this->lang->line('title_add_new_batch');

        $this->loadView($this->view_folder.'listing', $data);
    }

    /*List all driver by ajax call*/
    function ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->Batch_distribution_model->get_datatables();
        $data = array();

        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->Batch_distribution_model->count_filtered(),'sort'=>'asc','field'=>'company_id'),
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
        $data['title'] = $this->lang->line('title_add_new_batch');
        //$data['second_title'] = $this->lang->line('title_batch_list');
        $data['css'] = ['customer'];
       //* $data['max_value']= $this->Main_model->maxId('tbl_driver');
       // $data['formAction'] = 'company/batch_distribution/add/';
        $data['js'] = ['https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js',MAP_API_URL,'driver'];
        $data['function'] = 'add';
        $this->load->model('company/branch_model');
        $data['zone_list'] = $this->Batch_distribution_model->getZone();
        $data['status_list'] = $this->Batch_distribution_model->getStatus();
        $data['driver_list'] = $this->Batch_distribution_model->getDriver();
       //* $data['next_id'] = $this->driver_model->get_next_id();

        $this->form_validation->set_rules('zone',$this->lang->line('label_zone'),'required|trim');
        $this->form_validation->set_rules('status',$this->lang->line('label_status'),'required|trim');
        $this->form_validation->set_rules('driver',$this->lang->line('label_driver'),'required|trim');
        $this->form_validation->set_rules('date',$this->lang->line('label_date'),'required|trim');
        $this->form_validation->set_rules('type',$this->lang->line('label_type'),'required|trim');


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
            /*$already_register = $this->Batch_distribution_model->check_param(array('user_name' => $this->input->post('username')));
            if(!empty($already_register)){
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_user_name_exist'));
                $this->loadView($this->view_folder.'add', $data);
                //$this->load->view($this->view_folder.'add', $data);
                return;
            }
             check email already registered or not?
            $already_register = $this->Batch_distribution_model->check_param(array('email' => $this->input->post('email')));
            if(!empty($already_register)){
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_email_exist'));
                $this->loadView($this->view_folder.'add', $data);
                //$this->load->view($this->view_folder.'add', $data);
                return;
            }*/



            /*'co_driverid' => $this->input->post('co_driverid'),
            'company_name' => $this->input->post('company_name'),
            'cnum' => $this->input->post('cnum'),
            'driver' => $this->input->post('driver'),
            'void' => $this->input->post('void'),*/
            $params = array(
                'MDist_Zone' => $this->input->post('zone'),
                'MDist_status' => $this->input->post('status'),
                'MDist_Driver' => $this->input->post('driver'),
                'MDist_Date' => date("Y-m-d", strtotime($this->input->post('date'))),
                'MDist_BType' => $this->input->post('type'),
                'MDist_Exchange_Rate' => $this->input->post('exchange_rate'),
                'MDist_Comment' => $this->input->post('comment'),
                'user_created' => $this->username,

       //
            );




            $id = $this->Batch_distribution_model->add_Batch($params);
            $this->Main_model->updateCompanyRefIds('batch_id',$id);
            // Update driver details
            //$this->driver_model->update_driver($id, array('driver_code' => $id));

            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_driver_add_success'));
            redirect('company/batch_distribution/','refresh');
        }
    }

    function edit(){

        $batch_id = $this->uri->segment(4);
        $data = array();
        $data['result'] = $this->Batch_distribution_model->get_driver_data($batch_id);
        $data['zone_list'] = $this->Batch_distribution_model->getZone();
        //var_dump( $data['zone_list']);
        $data['status_list'] = $this->Batch_distribution_model->getStatus();
        $data['driver_list'] = $this->Batch_distribution_model->getDriver();
        $data['type_list'] = $this->Batch_distribution_model->getType();
        //var_dump($driver_data);exit;
        /*$data['title'] = $this->lang->line('title_driver_list');
        $data['second_title'] = $this->lang->line('title_add_new_driver');*/
        $data['title'] = $this->lang->line('title_edit_batch_list');
        $data['second_title'] = $this->lang->line('title_edit_batch_list');
        $data['css'] = ['customer'];
        $data['max_value']= $this->Main_model->maxId('tbl_driver');
        $data['formAction'] = 'company/batch_distribution/edit/'.$batch_id;
        $data['js'] = ['https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js',MAP_API_URL,'driver'];//yaOk
        $data['function'] = 'add';
        $this->load->model('company/Batch_distribution_model');

        $this->form_validation->set_rules('zone',$this->lang->line('label_zone'),'required|trim');
        $this->form_validation->set_rules('status',$this->lang->line('label_status'),'required|trim');
        $this->form_validation->set_rules('driver',$this->lang->line('label_driver'),'required|trim');
        $this->form_validation->set_rules('date',$this->lang->line('label_date'),'required|trim');
        $this->form_validation->set_rules('type',$this->lang->line('label_type'),'required|trim');


        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == FALSE)
        {
            // echo validation_errors();
            // die;
            //$this->load->view($this->view_folder.'edit', $data);
            $this->loadView($this->view_folder.'edit', $data);
        }
        else
        {
            /* check email already registered or not? */
            /*$already_register = $this->driver_model->check_param(array('email' => $this->input->post('email'), 'id !=' => $driver_id  ));
            if(!empty($already_register)){
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_email_exist'));
                //$this->load->view($this->view_folder.'edit', $data); return;
                redirect(base_url('company/driver/edit/').$driver_id, 'refresh');
            }*/

            /* check user name already registered or not?
            $already_register = $this->driver_model->check_param(array('user_name' => $this->input->post('user_name'), 'id !=' => $driver_id));
            if(!empty($already_register)){
                $this->session->set_flashdata('err_msg1', $this->lang->line('text_customer_user_name_exist'));
                redirect(base_url('company/driver/edit/').$driver_id, 'refresh');
            }*/


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
                'MDist_Zone' => $this->input->post('zone'),
                'MDist_status' => $this->input->post('status'),
                'MDist_Driver' => $this->input->post('driver'),
                'MDist_Date' => date("Y-m-d", strtotime($this->input->post('date'))),
                'MDist_BType' => $this->input->post('type'),
                'MDist_Exchange_Rate' => $this->input->post('exchange_rate'),
                'MDist_Comment' => $this->input->post('comment'),
                'user_update' => $this->username,
//
            );

             /*echo "<pre>";
            var_dump($params);exit;
            echo "</pre>";*/

 /*           if($this->input->post('password') != ''){
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
            } */

            // Update driver details
            $this->Batch_distribution_model->update_driver($batch_id, $params);

            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_driver_update_success'));
            redirect('company/batch_distribution/listing/', 'refresh');
        }

    }



    /*View driver profile*/
    function view()
    {
        if (!$this->uri->segment(4))
        {
            redirect('company/batch_distribution/listing','refresh');
        }
        $data = array();
        if(!empty($this->input->cookie('tab_id', TRUE))){
            $data['tab_id'] = $this->input->cookie('tab_id', TRUE);
        } else {
            $data['tab_id'] = "1";
        }
        $data['result'] = $this->Batch_distribution_model->get_driver_data($this->uri->segment(4));
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
        if (!$batch_id) {
            echo json_encode();
        }
        $this->Batch_distribution_model->update_driver($batch_id,array('void' => 'Yes'));
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


    /*List all driver by ajax call*/
    function ajax_list_invoice()
    {
        $data = array();
        $AllPostData = $this->input->post();
        $list = $this->Batch_distribution_model->get_datatables_invoice();
        $data['result'] = $list;
       // $data['list'] = $this->Batch_distribution_model->get_datatables_invoice();

        /*echo "<pre>";
        var_dump($data['result']);exit;
        echo "</pre>";*/

        $output = array(
                    "meta" => array('page'=>$AllPostData['datatable']['pagination']['page'],'pages'=>$AllPostData['datatable']['pagination']['pages'],'perpage'=>$AllPostData['datatable']['pagination']['perpage'],'total'=>$this->Batch_distribution_model->count_filtered_invoice(),'sort'=>'asc','field'=>'invoice_number'),
                    "data" => $list
                );
        //output to json format
        echo json_encode($output);
        //$this->load->view($this->view_folder.'edit', $data);
    }




            public function addTran()
        {

             if (!$this->input->is_ajax_request())
            {
                redirect('404');
            }else
            {
               //echo "hola";
                
               //  $this->form_validation->set_rules('uid_usuario', 'Asignar Roles', 'required');            
                 $this->form_validation->set_rules('id', 'id', 'Required|callback_batch_check');  
                 $this->form_validation->set_rules('invoice', 'invoice', 'Required');  

                 $this->form_validation->set_message('batch_check','Esta Factura ya esta asignada a este batch');          
                


                if ($this->form_validation->run()== false) 
                {
                     
                     echo json_encode(array('st'=>0, 'msg' => '<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><small>'.  validation_errors().'</small></div>'));         
                }

                else{
                     
                       $params = 
                        array(
 
                          'MDist_Batch'               => $this->input->post('id'),
                          'MDist_TInvNUm'             => $this->input->post('invoice'),
                          'MDist_TCustID'             => $this->input->post('customer'),
                          'MDist_ShipTo'              => $this->input->post('nameShipto'),
                          'MDist_TBox'                => $this->input->post('total_packages'),
                          'MDist_TBalance'            => $this->input->post('balance'),
                          'MDist_TDate'               => $this->input->post('invoice_date'),
                          'MDist_Exchange_Balance'    => $this->input->post('exchange_balance')
         
                        );   

                        /*echo "<pre>";
                        var_dump($params);exit;
                        echo "</pre>";*/
                        $this->Batch_distribution_model->add_Tran($params);
                       echo json_encode(array('st'=>1, 'msg' => '<div class="alert alert-dismissable alert-success">Creado</div>'));

                
                }
            
            }
        }

    function batch_check(){
        $batch = $this->input->post('id');        
        $invoice = $this->input->post('invoice');       

         return $this->Batch_distribution_model->batch_ck($batch, $invoice);
         echo json_encode(array('st'=>0, 'msg' => '<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><small>'.  validation_errors().'</small></div>'));
     }



      public function delete_batch($id)
      {
        $this->Batch_distribution_model->delete_batch($id);
        echo json_encode(array('st'=>1, 'msg' => '<div class="alert alert-dismissable alert-success"></div>'));;
      }

    function update_status(){
      //var_dump($this->input->post());

        if($this->input->post() && $this->input->is_ajax_request()){

            $this->Batch_distribution_model->update_status($this->input->post());
        }
    }

    function update_status_paid(){
      //var_dump($this->input->post());

        if($this->input->post() && $this->input->is_ajax_request()){

            $this->Batch_distribution_model->update_status_paid($this->input->post());
        }
    }


}

/* End of file Batch_distribution.php */
/* Location: ./application/modules/company/controllers/Batch_distribution.php */