<?php
class Branch_model extends My_model {

    var $column_search = array("b.name", "CONCAT(b.address_line1, ' ', b.address_line2)", "CONCAT(b.tele_country_code1, ' ', b.telephone_number1)", "CONCAT(b.tele_country_code2, ' ', b.telephone_number2)"); //set column field database for datatable searchable 
    var $order = array('b.id' => 'DESC'); // default order 

    function __construct()
    {
        parent::__construct();        
    }


    /* get a driver record counts */
    function branch_count()
    {
        $this->company_db->from('tbl_branch');
        return $this->company_db->row();
    }

    // branch Models
    function _get_datatables_query()
    {
        $this->company_db->select("b.id as branch_id,b.*, CONCAT(b.address_line1, ' ', b.address_line2) as address, CONCAT(b.tele_country_code1, ' ', b.telephone_number1) as telephone_number1, CONCAT(b.tele_country_code2, ' ', b.telephone_number2) as telephone_number2,");
        $this->company_db->from('tbl_branch b');
        $this->company_db->where('b.void','No');
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

    /*Get branch records pagination*/
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
    
    /*Get branch counter*/
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->company_db->get();
        return $query->num_rows();
    }

    /*Get branch details*/
    function get_branch_data($branch_id)
    {
        $this->company_db->select("b.*");
        $this->company_db->from('tbl_branch b');
        $this->company_db->where('b.id', $branch_id);    
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
    function add_branch($params){
        $this->company_db->insert('tbl_branch', $params);
        return $this->company_db->insert_id();
    }

    /* Update copany data */
    function update_branch($id,$params)
    {
        $this->company_db->where('id',$id);
        $this->company_db->update('tbl_branch',$params);
    }

    /* Check params in table */
    function check_param($where)
    {
        $this->company_db->select("*");
        $this->company_db->from('tbl_branch');
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

    public function getBranch($data=""){
       
        $data['select'] = ['id','concat(id,"-",name) as branch_name'];
        $data['table'] = 'tbl_branch';
        $response = $this->selectRecords($data);
        
        return $response;
        
    }
}
?>