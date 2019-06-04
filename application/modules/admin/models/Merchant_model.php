<?php
class Merchant_model extends CI_Model {

    var $column_search = array('m.fname','m.lname','m.email','m.country_code','m.phone','m.last_login','m.login','m.is_verified','m.status'); //set column field database for datatable searchable 
    var $order = array('m.status' => 'ASC', 'm.id' => 'DESC'); // default order 

    var $column_search_merchant_image = array('id', 'category_details_id','image','height','width','insertdate'); //set column column field database for datatable searchable 

    function __construct()
    {
        parent::__construct();
    }

    // Merchant Models
    function _get_datatables_query()
    {
        $this->db->select("m.*,
                CONCAT('".base_url().MERCHANT_IMAGE_THUMB."','',profile_image) as profile_image_thumb,
                CONCAT('".base_url().MERCHANT_IMAGE."','',profile_image) as profile_image");
        $this->db->from('tbl_merchant m');
        $i = 0;
        
        if(!empty($_REQUEST['datatable']['query']['generalSearch'])) // if datatable send POST for search
        {
            foreach ($this->column_search as $item) // loop column 
            {        
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_REQUEST['datatable']['query']['generalSearch']);
                }
                else
                {
                    $this->db->or_like($item, $_REQUEST['datatable']['query']['generalSearch']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
                
                $i++;
            }
        }

        if(!empty($_REQUEST['datatable']['query']['Status']) && $_REQUEST['datatable']['query']['Status'] == 'Unverified') // Active or Inactive check
        {
            $this->db->where('m.is_verified',$_REQUEST['datatable']['query']['Status']);
        }

        if(!empty($_REQUEST['datatable']['query']['Status']) && $_REQUEST['datatable']['query']['Status'] != 'Unverified') // Active or Inactive check
        {
            $this->db->where('m.status',$_REQUEST['datatable']['query']['Status']);
        }

        if(!empty($_REQUEST['datatable']['query']['Type']))  // Login or Logout check
        {
            $this->db->where('login',$_REQUEST['datatable']['query']['Type']);
        }
         
        if(!empty($_REQUEST['datatable']['sort']['field'])) //&& in_array($_REQUEST['datatable']['sort']['field'], $column_search)) // here order processing
        {
            $this->db->order_by($_REQUEST['datatable']['sort']['field'], $_REQUEST['datatable']['sort']['sort']);
        } 
        else if(!empty($this->order))
        {   
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    
    /*Get merchant table data*/
    function get_datatables()
    {
        $offset = ($_REQUEST['datatable']['pagination']['page'] - 1)*$_REQUEST['datatable']['pagination']['perpage'];
        $this->_get_datatables_query();
        if($_REQUEST['datatable']['pagination']['perpage'] != -1)
        $this->db->limit($_REQUEST['datatable']['pagination']['perpage'], $offset);
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                if($row->status == 'Pending')
                {
                    $row->status = '2';
                    $row->reverse_state = '1';
                }
                else if($row->status == 'Inactive')
                {
                    $row->status = '0';
                    $row->reverse_state = '1';
                }
                elseif ($row->status == 'Active') {
                    $row->status = '1';
                    $row->reverse_state = '0';
                }
                $row->encode_id = base64_encode($row->id);
            }
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    /*Get counts of merchant*/
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    /*Get merchant details*/
    function get_merchant_data($merchant_id)
    {
        $this->db->select("m.*,
                CONCAT('".base_url().MERCHANT_IMAGE_THUMB."','',profile_image) as merchant_image_thumb,
                CONCAT('".base_url().MERCHANT_IMAGE."','',profile_image) as merchant_image");
        $this->db->from('tbl_merchant m');
        $this->db->where('m.id', $merchant_id);    
        $query = $this->db->get();
        if($query->num_rows() >= 1)
        {
            return $query->row_array();
        }
        else
        {
            return false;
        }
    }

    /*Get all merchant list*/
    function merchant_list()
    {
        $this->db->select("*");
        $this->db->from('tbl_merchant');
        //$this->db->where('status','Active');
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        if($query->num_rows() >= 1)
        {  
            return $query->result_array();
        }
        else
        {
            return array();
        }
    }

    /*Change merchant status*/
    function merchant_state($id,$state)
    {
        if ($state == '0') 
        {
            $this->db->delete('tbl_user_device',array('user_id'=>$id));

            $data_array['login'] = 'Offline';
            $data_array['status'] = 'Inactive';
        }
        else
            $data_array['status'] = 'Active';   

        $this->db->where('id',$id);
        $this->db->update('tbl_merchant', $data_array);
    }

}
?>