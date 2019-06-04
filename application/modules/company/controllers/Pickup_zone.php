<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pickup_zone extends MYcom_Controller
{

    private $view_folder = 'company/pickup_zone/';
    public function __construct()
    {
        parent::__construct();

        $this->load->model('company/pickup_zone_model');
    }

    /*Default index call*/
    public function index()
    {
        $this->listing();
    }

    /*Listing all pickup_zone*/
    public function listing()
    {
        $data = array();
        $data['title'] = $this->lang->line('title_pickup_zone_list');
        $data['second_title'] = '';
        $data['css'] = ['custom'];
        $this->loadView($this->view_folder . 'listing', $data);
    }

    /*List all pickup_zone by ajax call*/
    public function ajax_list()
    {
        $AllPostData = $this->input->post();
        $list = $this->pickup_zone_model->get_datatables();
        $data = array();

        $output = array(
            "meta" => array('page' => $AllPostData['datatable']['pagination']['page'], 'pages' => $AllPostData['datatable']['pagination']['pages'], 'perpage' => $AllPostData['datatable']['pagination']['perpage'], 'total' => $this->pickup_zone_model->count_filtered(), 'sort' => 'asc', 'field' => 'company_id'),
            "data" => $list,
        );
        //output to json format
        echo json_encode($output);
    }

    /*Add new pickup_zone*/
    public function add()
    {
        $data = array();
        $data['title'] = $this->lang->line('title_add_new_pickup_zone');
        $data['second_title'] = $this->lang->line('title_pickup_zone_list');
        $data['css'] = ['custom'];
        $data['js'] = ['pickup_zone'];
        $data['function'] = 'add';
        $data['formAction'] = 'company/pickup_zone/add/';

        $this->form_validation->set_rules('description', $this->lang->line('field_description'), 'required|trim');
        $this->form_validation->set_rules('stops', $this->lang->line('field_stops'), 'required|trim');
        $this->form_validation->set_rules('country', $this->lang->line('field_country'), 'required|trim');
        $this->form_validation->set_rules('zone', $this->lang->line('field_zone'), 'required|trim');

        //$this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'required|trim|in_list[Yes,No]');

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == false) {
            $this->loadView($this->view_folder . 'add', $data);
        } else {
            $params = array(
                'description' => $this->input->post('description'),
                'stops' => $this->input->post('stops'),
                'zone' => $this->input->post('zone'),
                'validation' => $this->input->post('validation'),
                'country' => $this->input->post('country'),
                'zipcode' => '',
            );

            $id = $this->pickup_zone_model->add_pickup_zone($params);

            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_pickup_zone_add_success'));
            redirect('company/pickup_zone/listing/', 'refresh');
        }
    }

    /*Update pickup_zone details*/
    public function edit()
    {
        $pickup_zone_id = $this->uri->segment(4);

        $data = array();

        $pickup_zone_data = $data['result'] = $this->pickup_zone_model->get_pickup_zone_data($pickup_zone_id);
        if (empty($pickup_zone_data)) {
            redirect('company/pickup_zone/listing', 'refresh');
        }
        $data['title'] = $this->lang->line('title_edit_pickup_zone');
        $data['second_title'] = $this->lang->line('title_pickup_zone_list');
        $data['css'] = ['custom'];
        $data['js'] = ['pickup_zone'];
        $data['function'] = 'add';
        $data['formAction'] = 'company/pickup_zone/add/';

        $this->form_validation->set_rules('description', $this->lang->line('field_description'), 'required|trim');
        $this->form_validation->set_rules('stops', $this->lang->line('field_stops'), 'required|trim');
        $this->form_validation->set_rules('country', $this->lang->line('field_country'), 'required|trim');
        $this->form_validation->set_rules('zone', $this->lang->line('field_zone'), 'required|trim');

        //$this->form_validation->set_rules('zipcode',$this->lang->line('field_zipcode'),'required|trim|in_list[Yes,No]');

        $this->form_validation->set_error_delimiters('<div class="has-danger"><div class="form-control-feedback">', '</div></div>');
        if ($this->form_validation->run() == false) {
            $this->loadView($this->view_folder . 'add', $data);
        } else {
            $params = array(
                'description' => $this->input->post('description'),
                'stops' => $this->input->post('stops'),
                'zone' => $this->input->post('zone'),
                'validation' => $this->input->post('validation'),
                'country' => $this->input->post('country'),
                'zipcode' => '',
            );

            $this->pickup_zone_model->update_pickup_zone($pickup_zone_id, $params);

            $this->session->set_flashdata('succ_msg1', $this->lang->line('text_pickup_zone_update_success'));
            redirect('company/pickup_zone/listing/', 'refresh');

        }
    }
    /*View pickup_zone profile*/
    public function view()
    {
        if (!$this->uri->segment(4)) {
            redirect('company/pickup_zone/listing', 'refresh');
        }
        $data = array();
        if (!empty($this->input->cookie('tab_id', true))) {
            $data['tab_id'] = $this->input->cookie('tab_id', true);
        } else {
            $data['tab_id'] = "1";
        }
        $data['result'] = $this->pickup_zone_model->get_pickup_zone_data($this->uri->segment(4));
        $this->load->view($this->view_folder . 'view', $data);
    }

    /*Delete pickup_zone*/
    public function delete($pickup_zone_id)
    {
        if (!$pickup_zone_id) {
            echo json_encode();
        }
        $this->pickup_zone_model->update_pickup_zone($pickup_zone_id, array('void' => 'Yes'));
        echo json_encode();
    }
}
