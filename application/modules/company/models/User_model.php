<?php
class User_model extends My_Model {

    var $column_search = array("u.address", "CONCAT(u.tele_country_code, ' ', u.telephone_number)", "CONCAT(u.cell_country_code , ' ', u.cellphone_number)", "CONCAT(u.fname, ' ', u.lname)",'u.user_name'); //set column field database for datatable searchable 
    var $order = array('u.id' => 'DESC'); // default order 

    function __construct()
    {
        parent::__construct();        
    }


    /* get a driver record counts */
    function user_count()
    {
        $this->company_db->from('tbl_user');
        return $this->company_db->count_all_results();
    }

    function getMaxId(){

        $next = $this->db->query("SHOW TABLE STATUS LIKE 'user'");
        $next = $next->row(0);
        return $next->Auto_increment;

        
        
    }
   
    function getUserDetails($data = ""){
        $data['select'] = ['*'];
        $data['table'] = 'tbl_user';
        $response = $this->selectRecords($data,true);

        return $response;
             
         

    }

    public function updateUser($params,$id){

        $data['update'] = $params;
        $data['where'] = ['master_user_id' => $id];
        $data['table'] = 'tbl_user';
        $this->updateRecords($data);
        
        
    }
  public function delete_user($id){

      $data['where'] = ['master_user_id' => $id];
      $data['table'] = 'tbl_user';
      $this->deleteRecords($data);

      $this->db->where('id', $id);
      $this-> db->delete('user');
      
  }
    function updateMasterUser($params,$id){

        $this->db->where('id', $id);
        $this->db->update('user', $params);
        
        
    }
   public function getRights($id){
    
    $this->db->select('modules');
    $this->db->where('user_id',$id);
    $this->db->from('rights');
    $res = $this->db->get()->row_array();
    return $res;

   }
    public function setRights($post){
        
        $this->db->select('id');
        $this->db->where('user_id',$post['master_user']);
        $this->db->from('rights');
        $res = $this->db->get()->result();
        $jsonData = json_encode($post);
        $arr = ['user_id' => $post['master_user'],'modules' => $jsonData];

        if($res){
        //{"master_user":"15","rights":{"Customer":"company\/customer\/","Invoice":[{"url":"company\/invoice\/createInvoice"}]}}
        $this->db->where('user_id', $post['master_user']);
        $this->db->update('rights', $arr);
            
        }else{
            $this->db->insert('rights',$arr);
        

        }
        
        
        


    }

    function addMasterUser($params)
    {
        $this->db->insert('user', $params);
        return $this->db->insert_id();
    }

    // User Models
    function _get_datatables_query()
    {
        $this->company_db->select("u.id as user_id,u.*, u.address, CONCAT(u.tele_country_code, ' ', u.telephone_number) as telephone_number, CONCAT(u.cell_country_code , ' ', u.cellphone_number) as cellphone_number, CONCAT(u.fname, ' ', u.lname) as name");
        $this->company_db->from('tbl_user u');
        $this->company_db->where('u.void','No');
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
    function get_user_data($user_id)
    {
        $this->company_db->select("u.*");
        $this->company_db->from('tbl_user u');
        $this->company_db->where('u.id', $user_id);    
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
    function add_user($params){
        $this->company_db->insert('tbl_user', $params);
        return $this->company_db->insert_id();
    }

    /* Update copany data */
    function update_user($id,$params)
    {
        $this->company_db->where('id',$id);
        $this->company_db->update('tbl_user',$params);
    }

    /* Check params in table */
    function check_param($where)
    {
        $this->company_db->select("*");
        $this->company_db->from('tbl_user');
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