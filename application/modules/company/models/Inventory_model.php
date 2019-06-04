<?php
class Inventory_model extends CI_Model {

    var $column_search = array("item_number","CONVERT(description USING utf8)","price","cost","type","qty"); //set column field database for datatable searchable 
    var $order = array('i.id' => 'DESC'); // default order 

    function __construct()
    {
        parent::__construct();        
    }


    /* get a driver record counts */
    function inventory_count()
    {
        $this->company_db->from('tbl_inventory');
        return $this->company_db->count_all_results();
    }
   
    function getMaxId(){

        $this->company_db->select("MAX(id) as maxid");
        $this->company_db->from('tbl_inventory');
        $query = $this->company_db->get()->result();
        return $query[0]->maxid+1;
        
        

    }
    // User Models
    function _get_datatables_query()
    {
        $this->company_db->select("i.id as inventory_id,i.*");
        $this->company_db->from('tbl_inventory i');
        $this->company_db->where('i.void','No');
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

    /*Get user records pagination*/
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
    
    /*Get user counter*/
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->company_db->get();
        return $query->num_rows();
    }

    /*Get user details*/
    function get_inventory_data($user_id)
    {
        $this->company_db->select("c.*");
        $this->company_db->from('tbl_inventory c');
        $this->company_db->where('c.id', $user_id);    
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
 
    /* Add data of inventory in table and return id of it */
    function add_inventory($params){
        $this->company_db->insert('tbl_inventory', $params);
        return $this->company_db->insert_id();
    }

    /* Update inventory data */
    function update_inventory($id,$params)
    {
        $this->company_db->where('id',$id);
        $this->company_db->update('tbl_inventory',$params);
    }

    /* Update inventory data */
    function delete_inventory($id)
    {
        $this->company_db->where('id',$id);
        $this->company_db->delete('tbl_inventory');
    }

    /* Check params in table */
    function check_param($where)
    {
        $this->company_db->select("*");
        $this->company_db->from('tbl_inventory');
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
}
?>