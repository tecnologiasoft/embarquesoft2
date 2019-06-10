<?php
class Customer_model extends CI_Model {

    var $column_search = array("c.address_line1","c.address_line2", "c.address", "CONCAT(tele_country_code, ' ', telephone_number)", "CONCAT(cell_country_code , ' ', cellphone_number)", "CONCAT(fname, ' ', lname)",'c.balance'); //set column field database for datatable searchable 
    var $order = array('c.id' => 'DESC'); // default order 

    function __construct()
    {
        parent::__construct();        
    }


    /* get a driver record counts */
    function customer_count()
    {
        $this->company_db->from('tbl_customer');
        return $this->company_db->count_all_results();
    }

    // User Models
    function _get_datatables_query()
    {
        $this->company_db->select("c.id as customer_id,c.*, CONCAT(tele_country_code, ' ', telephone_number) as telephone_number, CONCAT(cell_country_code , ' ', cellphone_number) as cellphone_number, CONCAT(fname, ' ', lname) as name,sum(ih.balance) as balance");
        $this->company_db->from('tbl_customer c');
        $this->company_db->join('tbl_invoice_header ih','c.id = ih.customer_id','left');
        $this->company_db->group_by('c.id'); 
        
      //  $this->company_db->where('c.void','No');
        
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
     /* 10-JUN-2019 count invoice data of the customer */
    function countInvoiceData($customerId)
    {
        $this->company_db->select("customer_id");
        $this->company_db->from('tbl_invoice_header');
        $this->company_db->where('customer_id',$customerId);
        $query = $this->company_db->get();
        if($query->num_rows() >= 1){
            return $query->result_array();
        }else{
            return array();
        }
    }
 // invoice Models
    function _get_invoice_datatables_query()
    {
       
        $this->company_db->select("c.*");
        $this->company_db->from('tbl_invoice_header c');
        $this->company_db->where('c.customer_id', $_REQUEST['datatable']['customer_id']);
        
        
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
         //echo $this->company_db->last_query();die;
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

    /*Get invoice records pagination*/
    function get_invoice_datatables()
    {
        $offset = ($_REQUEST['datatable']['pagination']['page'] - 1)*$_REQUEST['datatable']['pagination']['perpage'];
        $this->_get_invoice_datatables_query();
        if($_REQUEST['datatable']['pagination']['perpage'] != -1)
        $this->company_db->limit($_REQUEST['datatable']['pagination']['perpage'], $offset);
        $query = $this->company_db->get();
        
         //echo $this->company_db->last_query();die;
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
    /* Get invoice counter*/
    function count_invoice_filtered()
    {
        $this->_get_invoice_datatables_query();
        $query = $this->company_db->get();
        return $query->num_rows();
    }

    /*Get user details*/
    function get_customer_data($user_id)
    {
        $this->company_db->select("c.*");
        $this->company_db->from('tbl_customer c');
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
    /* 4-jan -2019 Get invoice details*/
    function get_invoice_data($invoice_id){
        //$customer_id = 52;
        $this->company_db->select("c.*");
        $this->company_db->from('invoice_header_payment c');
        $this->company_db->where('c.invoice_id', $invoice_id);
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
    function add_customer($params){
        $this->company_db->insert('tbl_customer', $params);
        return $this->company_db->insert_id();
    }

    /* Update copany data */
    function update_customer($id,$params)
    {
        $this->company_db->where('id',$id);
        $this->company_db->update('tbl_customer',$params);
    }
   

    /*delete customer */

    function customer_delete($id){
        
        $this->company_db->where('id',$id);
        $this->company_db->delete('tbl_customer');

    }
    /* Check params in table */
    function check_param($where)
    {
        $this->company_db->select("*");
        $this->company_db->from('tbl_customer');
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

    // Ship to Models
    function _get_shipto_datatables_query()
    {
        $this->company_db->select("s.id as shipto_id,ihp.receipt_number as receiptnumber,s.*, CONCAT(s.tele_country_code, ' ', s.telephone_number) as telephone_number, CONCAT(s.cell_country_code , ' ', s.cellphone_number) as cellphone_number, CONCAT(s.fname, ' ', s.lname) as name");
        $this->company_db->from('tbl_shipto s');
        $this->company_db->from('invoice_header_payment ihp');
        $this->company_db->where('s.void','No');
        $this->company_db->where('s.customer_id', $_REQUEST['datatable']['customer_id']);
        $i = 0;

        $column_search = array("s.address_line1","s.address_line2", "s.address", "CONCAT(s.tele_country_code, ' ', s.telephone_number)", "CONCAT(s.cell_country_code , ' ', s.cellphone_number)", "CONCAT(s.fname, ' ', s.lname)"); //set column field database for datatable searchable 
        $order = array('s.id' => 'DESC'); // default order 
        
        if(isset($_REQUEST['datatable']['query']['generalSearch']) && !empty($_REQUEST['datatable']['query']['generalSearch'])) // if datatable send POST for search
        {
            foreach ($column_search as $item) // loop column 
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
 
                if(count($column_search) - 1 == $i) //last loop
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
        else if(isset($order))
        {
            $this->company_db->order_by(key($order), $order[key($order)]);
        }
    }

    /*Get user records pagination*/
    function get_shipto_datatables()
    {
        $offset = ($_REQUEST['datatable']['pagination']['page'] - 1)*$_REQUEST['datatable']['pagination']['perpage'];
        $this->_get_shipto_datatables_query();
        if($_REQUEST['datatable']['pagination']['perpage'] != -1)
        $this->company_db->limit($_REQUEST['datatable']['pagination']['perpage'], $offset);
        $query = $this->company_db->get();

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

// 4-Jun-2019 invoice details to Models
    function _get_invoice_details_datatables_query()
    {
        $invoice_id = $this->uri->segment(4);
        $this->company_db->select("s.*");
        $this->company_db->from('invoice_header_payment');
        $this->company_db->where('s.invoice_id', $invoice_id);
        $i = 0;

        $column_search = array("s.address_line1","s.address_line2", "s.address", "CONCAT(s.tele_country_code, ' ', s.telephone_number)", "CONCAT(s.cell_country_code , ' ', s.cellphone_number)", "CONCAT(s.fname, ' ', s.lname)"); //set column field database for datatable searchable 
        $order = array('s.id' => 'DESC'); // default order 
        
        if(isset($_REQUEST['datatable']['query']['generalSearch']) && !empty($_REQUEST['datatable']['query']['generalSearch'])) // if datatable send POST for search
        {
            foreach ($column_search as $item) // loop column 
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
 
                if(count($column_search) - 1 == $i) //last loop
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
        else if(isset($order))
        {
            $this->company_db->order_by(key($order), $order[key($order)]);
        }
    }
    /*4-Jun-2019 Get invoice details records pagination*/
    function get_invoice_details_datatables()
    {
        $offset = ($_REQUEST['datatable']['pagination']['page'] - 1)*$_REQUEST['datatable']['pagination']['perpage'];
        $this->_get_invoice_details_datatables_query();
        if($_REQUEST['datatable']['pagination']['perpage'] != -1)
        $this->company_db->limit($_REQUEST['datatable']['pagination']['perpage'], $offset);
        $query = $this->company_db->get();
        //print_r($query);
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
    function shipto_count_filtered()
    {
        $this->_get_shipto_datatables_query();
        $query = $this->company_db->get();
        return $query->num_rows();
    }
/*4-Jun-2019*/
function invoice_details_count_filtered()
    {
        $this->_get_invoice_details_datatables_query();
        $query = $this->company_db->get();
        return $query->num_rows();
    }
    /* Check params in table */
    function check_shipto_param($where)
    {
        $this->company_db->select("*");
        $this->company_db->from('tbl_shipto');
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

    /*Get user details*/
    function get_shipto_data($shipto_id)
    {
        $this->company_db->select("s.*");
        $this->company_db->from('tbl_shipto s');
        $this->company_db->where('s.id', $shipto_id);    
        $query = $this->company_db->get();
        if($query->num_rows() >= 1)
        {
            return $query->row_array();
        }
        else
        {
            return array();
        }
    }
    
    /* Add data of shipto in table and return id of it */
    function add_shipto($params){
        $this->company_db->insert('tbl_shipto', $params);
        return $this->company_db->insert_id();
    }

    /* Update shipto data */
    function update_shipto($id,$params)
    {
        $this->company_db->where('id',$id);
        $this->company_db->update('tbl_shipto',$params);
    }
    /*Get Current User BranchId*/
    function get_cur_branchId($id){

        $row = $this->company_db->query('SELECT `branch_id` FROM `tbl_user` where master_user_id ='.$id)->row();
        //echo $id;
        //print_r("test"+$row);
        //die();
        if ($row) {
            return $row->branch_id; 
        }
        
    }

    /* Get next id from database */
    function get_next_id(){
        
        $maxid = 0;
        $row = $this->company_db->query('SELECT MAX(id) AS `maxid` FROM `tbl_customer`')->row();
        if ($row) {
            $maxid = $row->maxid; 
        }
        return $maxid +1;
    }

    /* Get next id from database */
    function get_next_shipto_id(){
        $next = $this->company_db->query("SHOW TABLE STATUS LIKE 'tbl_shipto'");
        $next = $next->row(0);
        return $next->Auto_increment;
    }


    // Ship to Models
    function _get_pickup_datatables_query()
    {
        $this->company_db->select("p.id as customer_id,p.*, CONCAT(p.tele_country_code, ' ', p.telephone_number) as telephone_number, CONCAT(p.cell_country_code, ' ', p.cellphone_number) as cellphone_number, CONCAT(p.fname, ' ', p.lname) as name");
        $this->company_db->from('tbl_pickup p');
        $this->company_db->where('p.void','No');
        $this->company_db->where('p.customer_id', $_REQUEST['datatable']['customer_id']);
        
        $i = 0;
        
        $column_search = array("p.address_line1","p.address_line2", "p.address", "CONCAT(p.tele_country_code, ' ', p.telephone_number)", "CONCAT(p.cell_country_code, ' ', p.cellphone_number)", "CONCAT(p.fname, ' ', p.lname)", "p.item_1", "p.item_2", "p.pickup_date"); //set column field database for datatable searchable 
        $order = array('p.id' => 'DESC'); // default order 

        if(isset($_REQUEST['datatable']['query']['generalSearch']) && !empty($_REQUEST['datatable']['query']['generalSearch'])) // if datatable send POST for search
        {
            foreach ($column_search as $item) // loop column 
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
 
                if(count($column_search) - 1 == $i) //last loop
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
    function get_pickup_datatables()
    {
        $offset = ($_REQUEST['datatable']['pagination']['page'] - 1)*$_REQUEST['datatable']['pagination']['perpage'];
        $this->_get_pickup_datatables_query();
        if($_REQUEST['datatable']['pagination']['perpage'] != -1)
        $this->company_db->limit($_REQUEST['datatable']['pagination']['perpage'], $offset);
        $query = $this->company_db->get();
        /* echo $this->company_db->last_query();die;*/
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $row->pickup_date = date("m/d/Y", strtotime($row->pickup_date));
            }
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    /*Get user counter*/
    function pickup_count_filtered()
    {
        $this->_get_pickup_datatables_query();
        $query = $this->company_db->get();
        return $query->num_rows();
    }

    /* Add data of customer pickup in table and return id of it */
    function add_customer_pickup($params){
        $this->company_db->insert('tbl_customer_pickup', $params);
        return $this->company_db->insert_id();
    }

    public function check_dupicate_customer(){
  
        $this->company_db->select('id');
        $this->company_db->from('tbl_customer');
        
        $this->company_db->where('telephone_number',$this->input->post('customer_telephone_number'));
        
        $response = $this->company_db->get()->result();
        if($response){
            
        return false;

        }else{

            return true;

        }
    }

}
?>
