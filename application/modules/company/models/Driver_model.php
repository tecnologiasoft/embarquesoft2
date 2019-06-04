<?php
class Driver_model extends CI_Model {

    var $column_search = array("d.address_line1","d.address_line2", "d.address", "CONCAT(d.tele_country_code, ' ', d.telephone_number)", "CONCAT(d.cell_country_code , ' ', d.cellphone_number)", "CONCAT(d.fname, ' ', d.lname)",'d.user_name'); //set column field database for datatable searchable 
    var $order = array('d.id' => 'DESC'); // default order 

    function __construct()
    {
        parent::__construct();        
    }


    /* get a driver record counts */
    function driver_count()
    {
        $this->company_db->from('tbl_driver');
        return $this->company_db->count_all_results();
    }

    // driver Models
    function _get_datatables_query()
    {
        $this->company_db->select("d.id as driver_id,d.*, CONCAT(d.tele_country_code, ' ', d.telephone_number) as telephone_number, CONCAT(d.cell_country_code , ' ', d.cellphone_number) as cellphone_number, CONCAT(d.fname, ' ', d.lname) as name");
        $this->company_db->from('tbl_driver d');
        $this->company_db->where('d.void','No');
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

    /*Get driver details*/
    function get_driver_data($driver_id)
    {
        $this->company_db->select("d.*");
        $this->company_db->from('tbl_driver d');
        $this->company_db->where('d.id', $driver_id);    
        $query = $this->company_db->get();
        //echo $this->company_db->last_query();die;
        if($query->num_rows() >= 1)
        {
            return $query->row_array();
        }
        else
        {
            return array();
        }
    }
 
    /* Add data of company in table and return id of it */
    function add_driver($params){
        //print_r($params);//exit();
        $this->company_db->insert('tbl_driver', $params);
        return $this->company_db->insert_id();
    }

    /* Update copany data */
    function update_driver($id,$params)
    {
        
        $this->company_db->where('id',$id);
        $this->company_db->update('tbl_driver',$params);
    }

    /* Check params in table */
    function check_param($where)
    {
        //print_r($where);

        $this->company_db->select("*");
        $this->company_db->from('tbl_driver');
        $this->company_db->where($where);
        $query = $this->company_db->get();
                //exit();

        if($query->num_rows() >= 1)
        {
            return $query->row_array();
        }
        else
        {
            return false;
        }
    }

    /* Get next id from database */
    function get_next_id(){
        $next = $this->company_db->query("SHOW TABLE STATUS LIKE 'tbl_driver'");
        $next = $next->row(0);
        return $next->Auto_increment;
    }

    /* Get list of branches */
    function get_branch_list()
    {
        $this->company_db->select("*");
        $this->company_db->from('tbl_branch');
        /*$this->company_db->where($where);*/
        $query = $this->company_db->get();

        if($query->num_rows() >= 1)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        }
    }
}
?>