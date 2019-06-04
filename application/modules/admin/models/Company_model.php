<?php
class Company_model extends CI_Model {

    var $column_search = array('name','address','city','state','zipcode','telephone_number','fax_number','email','website','exchange_rate'); //set column field database for datatable searchable 
    var $order = array('c.id' => 'DESC'); // default order 

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
        $this->db->select("c.id as company_id,c.*,
                CONCAT('".base_url().COMPANY_IMAGE."','',logo) as logo");
        $this->db->from('tbl_company c');
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

    /* create database of company */
    function create_database($id){
        
        $new_database = 'facilmobile_darabase_'.$id;
        $this->db->query('CREATE DATABASE IF NOT EXISTS `'.$new_database.'` CHARACTER SET utf8 COLLATE utf8_general_ci');
        
        $table_name = $this->db->query("select table_name from information_schema.tables where TABLE_SCHEMA='facilmobile_embarquesoft' ");
        
        if($table_name->num_rows() > 0)
        {
            foreach ($table_name->result() as $row)
            {
                /*$this->db->query('CREATE TABLE `'.$new_database.'`. `'.$row->table_name.'` SELECT * FROM `embarquesoft`.`'.$row->table_name.'` ');*/

                $this->db->query('CREATE TABLE `'.$new_database.'`. `'.$row->table_name.'` LIKE `facilmobile_embarquesoft`.`'.$row->table_name.'` ');

                $this->db->query('INSERT INTO `'.$new_database.'`. `'.$row->table_name.'` SELECT * FROM `facilmobile_embarquesoft`.`'.$row->table_name.'` ');
                //print_r($row->table_name);
            }
        }
        return $new_database;
    }

    /* Add data of company in table and return id of it */
    function add_company($params){
        $this->db->insert('tbl_company', $params);
        return $this->db->insert_id();
    }

    /* Update copany data */
    function update_company($id,$params)
    {
        $this->db->where('id',$id);
        $this->db->update('tbl_company',$params);
    }
}
?>