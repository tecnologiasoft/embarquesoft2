<?php
class User_model extends CI_Model {

    var $column_search = array('fname','lname','email','country_code','phone','dob','login','status'); //set column field database for datatable searchable 
    var $order = array('u.id' => 'DESC'); // default order 

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->utc_time = time();
        $this->output->enable_profiler(FALSE);        
    }

    // User Models
    function _get_datatables_query()
    {
        $this->db->select("u.id as user_id,u.*,,u.id as encode_id,
                CONCAT(country_code,'',phone) as phone,
                CONCAT('".base_url().USER_IMAGE_THUMB."','',profile_image) as profile_image_thumb,
                CONCAT('".base_url().USER_IMAGE."','',profile_image) as profile_image");
        $this->db->from('tbl_user u');
        $i = 0;
        
        if(isset($_REQUEST['datatable']['query']['generalSearch']) && !empty($_REQUEST['datatable']['query']['generalSearch'])) // if datatable send POST for search
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

        if(!empty($_REQUEST['datatable']['query']['Status'])) // Active or Inactive check
        {
            $this->db->where('status',$_REQUEST['datatable']['query']['Status']);
        }

        if(isset($_REQUEST['datatable']['query']['Type']) && !empty($_REQUEST['datatable']['query']['Type']))  // Login or Logout check
        {
            $this->db->where('login',$_REQUEST['datatable']['query']['Type']);
        }
         
        if(isset($_REQUEST['datatable']['sort']['field'])) // && in_array($_REQUEST['datatable']['sort']['field'], $column_search)) // here order processing
        {
            $this->db->order_by($_REQUEST['datatable']['sort']['field'], $_REQUEST['datatable']['sort']['sort']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    /*Get user records pagination*/
    function get_datatables()
    {
        $offset = ($_REQUEST['datatable']['pagination']['page'] - 1)*$_REQUEST['datatable']['pagination']['perpage'];
        $this->_get_datatables_query();
        if($_REQUEST['datatable']['pagination']['perpage'] != -1)
        $this->db->limit($_REQUEST['datatable']['pagination']['perpage'], $offset);
        $query = $this->db->get();
        // echo $this->db->last_query();die;
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                if($row->status == 'Active')
                {
                    $row->status = '1';
                    $row->reverse_state = '0';
                }
                elseif ($row->status == 'Inactive') {
                    $row->reverse_state = '1';
                    $row->status = '0';
                }
                $row->encode_id = base64_encode($row->encode_id);
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
        $query = $this->db->get();
        return $query->num_rows();
    }

    /*Get user details*/
    function get_user_data($user_id)
    {
        $this->db->select("u.id as user_id,u.*,
                CONCAT('".base_url().USER_IMAGE_THUMB."','',profile_image) as user_image_thumb,
                CONCAT('".base_url().USER_IMAGE."','',profile_image) as user_image");
        $this->db->from('tbl_user u');
        $this->db->where('u.id', $user_id);    
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        if($query->num_rows() >= 1)
        {
            return $query->row_array();
        }
        else
        {
            return false;
        }
    }

    /*Change user status*/
    function user_state($id,$state)
    {
        if ($state == '0') 
        {
            $this->db->delete('tbl_user_device',array('user_id'=>$id));

            $data_array['status'] = 'Inactive';
            $data_array['login'] = 'Offline';
        }
        else
            $data_array['status'] = 'Active';

        $this->db->where('id',$id);
        $this->db->update('tbl_user', $data_array);
    }

}
?>