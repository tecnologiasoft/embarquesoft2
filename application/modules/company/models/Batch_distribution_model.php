<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batch_distribution_model extends My_model {
	
    var $column_search = array("d.MDist_BatchNum","d.MDist_Zone", "d.MDist_status", "d.MDist_Date", "d.MDist_BType", "d.MDist_Driver"); //set column field database for datatable searchable 
    var $order = array('d.MDist_BatchNum' => 'DESC'); // default order 



    /* get a driver record counts */
    function driver_count()
    {
        $this->company_db->from('tbl_driver');
        return $this->company_db->count_all_results();
    }

    // driver Models
    function _get_datatables_query()
    {
        $this->company_db->select("d.MDist_BatchNum, d.MDist_Zone, d.MDist_status, d.MDist_Date, d.MDist_BType, d.MDist_Driver");
        $this->company_db->from('tbl_MDist_Batch d');
        //$this->company_db->where('d.void','No');
        $i = 0;
        
        if(isset($_REQUEST['datatable']['query']['generalSearch']) && !empty($_REQUEST['datatable']['query']['generalSearch'])) // if datatable send POST for search
        {
            foreach ($this->column_search as $item) // loop column 
            {        
                if($i===0) // first loop
                {
                    $this->company_db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->company_db->like($item, $_REQUEST['datatable']['query']['generalSearch']);
                }
                else
                {
                    $this->company_db->or_like($item, $_REQUEST['datatable']['query']['generalSearch']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->company_db->group_end(); //close bracket
                
                $i++;
            }
        }

        if(!empty($_REQUEST['datatable']['query']['Status'])) // Active or Inactive check
        {
            $this->company_db->where('status',$_REQUEST['datatable']['query']['Status']);
        }

        if(isset($_REQUEST['datatable']['query']['Type']) && !empty($_REQUEST['datatable']['query']['Type']))  // Login or Logout check
        {
            $this->company_db->where('login',$_REQUEST['datatable']['query']['Type']);
        }
         
        if(isset($_REQUEST['datatable']['sort']['field'])) // && in_array($_REQUEST['datatable']['sort']['field'], $column_search)) // here order processing
        {
            $this->company_db->order_by($_REQUEST['datatable']['sort']['field'], $_REQUEST['datatable']['sort']['sort']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->company_db->order_by(key($order), $order[key($order)]);
        }
    }

    /*Get driver records pagination*/
    function get_datatables()
    {
        $offset = ($_REQUEST['datatable']['pagination']['page'] - 1)*$_REQUEST['datatable']['pagination']['perpage'];
        $this->_get_datatables_query();
        if($_REQUEST['datatable']['pagination']['perpage'] != -1)
        $this->company_db->limit($_REQUEST['datatable']['pagination']['perpage'], $offset);
        $query = $this->company_db->get();
        // echo $this->company_db->last_query();die;
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                
            }
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    /*Get driver counter*/
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->company_db->get();
        return $query->num_rows();
    }


    public function getZone($data=""){
       
        $data['select'] = ['id','zone'];
        $data['table'] = 'tbl_pickup_zone';
        //var_dump($response);exit();
        $response = $this->selectRecords($data);
        return $response;
        
    }




}

/* End of file Batch_distribucion_model.php */
/* Location: ./application/modules/company/models/Batch_distribucion_model.php */