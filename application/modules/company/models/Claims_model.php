
<?php
class Claims_model extends CI_Model {

    var $column_search = array("CONCAT(c.fname, ' ', c.lname)", "c.claim_date", "c.telephone_number", "c.cellphone_number"); //set column field database for datatable searchable 
    var $order = array('c.id' => 'DESC'); // default order 

    function __construct()
    {
        parent::__construct();        
    }


    /* get a driver record counts */
    function claims_count()
    {
        $this->company_db->from('tbl_claims');
        return $this->company_db->count_all_results();
    }

    // claims Models
    function _get_datatables_query()
    {
        $this->company_db->select("c.id as claims_id,c.*, CONCAT(c.fname, ' ', c.lname) as name,u.user_name as creator,
        c.insertdate as created_date,c.updatetime as updated_date");
        $this->company_db->join('tbl_user u', 'u.master_user_id = c.user_id','LEFT');
        $this->company_db->from('tbl_claims c');
        $this->company_db->where('c.void','No');
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

    /*Get claims records pagination*/
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
    
    /*Get claims counter*/
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->company_db->get();
        return $query->num_rows();
    }

    /*Get claims details*/
    function get_claims_data($claims_id)
    {
        $this->company_db->select("c.*,u.user_name,u1.user_name as updated_by");
        $this->company_db->from('tbl_claims c');
        $this->company_db->join('tbl_user u', 'u.master_user_id = c.user_id','LEFT');
        $this->company_db->join('tbl_user u1', 'u1.master_user_id = c.updated_by','LEFT');



        $this->company_db->where('c.id', $claims_id);    
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
    function add_claims($params){
        $this->company_db->insert('tbl_claims', $params);
        return $this->company_db->insert_id();
    }

    /* Update copany data */
    function update_claims($id,$params)
    {
        $this->company_db->where('id',$id);
        $this->company_db->update('tbl_claims',$params);
    }

    /* Check params in table */
    function check_param($where)
    {
        $this->company_db->select("*");
        $this->company_db->from('tbl_claims');
        $this->company_db->where($where);
        $query = $this->company_db->get();

        if($query->num_rows() >= 1)
        {
            return $query->row_array();
        }
        else
        {
            return false;
        }
    }

    /* Get list of warehouses */
    function get_warehouse_list()
    {
        $this->company_db->select("*");
        $this->company_db->from('tbl_warehouse');
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