<?php
class Pickup_model extends My_Model {

    var $column_search = array("p.address_line1","p.address_line2", "p.address", "CONCAT(p.tele_country_code, ' ', p.telephone_number)", "CONCAT(p.cell_country_code, ' ', p.cellphone_number)", "CONCAT(p.fname, ' ', p.lname)", "p.item_1", "p.item_2", "p.pickup_date", "c.balance","p.zipcode","p.city","p.update_count"); //set column field database for datatable searchable 
    var $order = array('p.id' => 'DESC'); // default order 

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
        $this->company_db->select("p.id as customer_id,p.*, CONCAT(p.tele_country_code, ' ', p.telephone_number) as telephone_number, CONCAT(p.cell_country_code, ' ', p.cellphone_number) as cellphone_number, CONCAT(p.fname, ' ', p.lname) as name, c.balance");
        $this->company_db->from('tbl_pickup p');
        $this->company_db->join('tbl_customer c','c.id = p.customer_id');
        $this->company_db->where('p.void','No');
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
        $pickup_date = "";

        
        if(!empty($_REQUEST['datatable']['query']['pickup_date'])) // Active or Inactive check
        { 
            
            $pickup_date = $_REQUEST['datatable']['query']['pickup_date'];
            $splitDate = explode('___',$pickup_date);
            
            
            if(count($splitDate) == 2){

            $this->company_db->where('pickup_date >=',date("Y-m-d",strtotime($splitDate[0])));
            $this->company_db->where('pickup_date <=',date("Y-m-d",strtotime($splitDate[1])));

            }else{
                
                $this->company_db->where('pickup_date =',date("Y-m-d",strtotime($pickup_date)));

            }
        }else{
            if(isset($_REQUEST['datatable']['pickup_date']) && !empty($_REQUEST['datatable']['pickup_date'])){
                
                $this->company_db->where('pickup_date =',date("Y-m-d",strtotime($_REQUEST['datatable']['pickup_date'])));

            }
        }
        
        if(isset($_REQUEST['datatable']['query']['zone_id']) && !empty($_REQUEST['datatable']['query']['zone_id'])){
            $this->company_db->where('p.zone =',$_REQUEST['datatable']['query']['zone_id']);
        }
        

        if(isset($_REQUEST['datatable']['query']['pickup_status']) && $_REQUEST['datatable']['query']['pickup_status'] == 'Not Assigned'){
            $this->company_db->where('p.driver_id =',"0");
        }

        else if(isset($_REQUEST['datatable']['query']['pickup_status']) && $_REQUEST['datatable']['query']['pickup_status'] == 'Assigned'){
            $this->company_db->where('p.driver_id !=',"0");
        }else{
            if(isset($_REQUEST['datatable']['query']['pickup_status']) && !empty($_REQUEST['datatable']['query']['pickup_status'])){
                $this->company_db->where('p.status =',$_REQUEST['datatable']['query']['pickup_status']);
            }
        }

        

        if(isset($_REQUEST['datatable']['query']['driver_id']) && !empty($_REQUEST['datatable']['query']['driver_id'])){
            $this->company_db->where('p.driver_id =',$_REQUEST['datatable']['query']['driver_id']);
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
        
        $this->session->set_userdata('last_pickup_report_query',$this->company_db->last_query());
       
        
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $now = strtotime(str_replace('/', '-', $_REQUEST['datatable']['pickup_date'])); // or your date as well
                $your_date = strtotime($row->pickup_date);
                $datediff = $now - $your_date;

                $days = round($datediff / (60 * 60 * 24));
                if($days > 2)
                    $row->pickup_date = "<label class='text-danger'>".date("m/d/Y", strtotime($row->pickup_date))."</label>";
                else if($days > 1)
                    $row->pickup_date = "<label class='text-warning'>".date("m/d/Y", strtotime($row->pickup_date))."</label>";
                else
                    $row->pickup_date = date("m/d/Y", strtotime($row->pickup_date));
                
                if($row->status != "Done"){
                    $row->chk_status = "<label class='m-checkbox m-checkbox--solid m-checkbox--brand'><input type='checkbox' id='chk_status_$row->id' value = '$row->id' class = 'chk_status' name='chk_status[]' data-id ='$row->id'>
                    <span></span></label>
                    ";
                } else {
                    $row->chk_status = "<label class='m-checkbox m-checkbox--solid m-checkbox--brand'><input type='checkbox' id='chk_status_$row->id' value = '$row->id' class = 'chk_status' name='chk_status[]' data-id ='$row->id' checked>
                    <span></span></label>";
                }

                $row->chk_print = "<label class='m-checkbox m-checkbox--solid m-checkbox--brand'>
                                    <input type='checkbox' class = 'chk_print' name='chk_print[]' data-id ='$row->id' checked>
                                    <span></span>
											</label>";

                if($row->driver_id != '0'){

                $row->chk_driver = "<label class='m-checkbox m-checkbox--solid m-checkbox--brand'><input type='checkbox' class = 'chk_driver'  name='chk_driver[]' data-id ='$row->id' checked>
                                    <span></span></label>";

                }else{

                    $row->chk_driver = "<label class='m-checkbox m-checkbox--solid m-checkbox--brand'><input type='checkbox' class = 'chk_driver'  name='chk_driver[]' data-id ='$row->id'>
                                        <span></span></label>
                                        ";    
                }
               
            
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

    public function update_history_from_managment($post){
       
       
       if($post['type'] == 'status'){

            $status_key =  'status';
            $key_value = $post['status'];

        }
        if($post['type'] == 'driver'){

            $status_key = 'driver_id';
            $key_value = $post['driver_id'];

        }
        if($post['type'] == 'date'){
            
            $status_key = 'pickup_date';
            $key_value =  date('Y-m-d',strtotime($post['move_date']));
        }
        dd($post['id']);
        die;
        $data['select'] = ['*'];
        $data['table'] = 'tbl_history';
        $data['where_in'] = ['primery_key' => $post['id']];
        $data['where'] = ['tbl' => 'tbl_pickup'];
        $response = $this->selectRecords($data);
        
        

        if($response){
            
            foreach($response as $value){

               if($value->data){
                   $array = json_decode($value->data,TRUE);
                  
                   foreach($array as $key => $v){
                    $bb = array_key_exists($status_key,$v);
                        
                    if($bb){

                            $array[$key][$status_key] = $key_value;
                            $array[$key]['is_update'] = $key_value;

                            
                        }
                        
                   }

                   $array[] = ['updated_by' => $this->username, 'is_update' => 'false'];
                   $array[] = ['updated_date' => date('d-m-Y h:i:s'), 'is_update' => 'false'];
               }
               
          
          
          


        
           $json = json_encode($array);
           
           
               
            }
        }else{
            $array[] = ['updated_by' => $this->username, 'is_update' => 'false'];
            $array[] = ['updated_date' => date('d-m-Y h:i:s'), 'is_update' => 'false'];
            $array[] = [$status_key=>$key_value,'is_update' => 'true'];
            $json = json_encode($array);
                    
        }
        

        if($json){
            $data['insert'] = ['user_id' => $this->id,'tbl' => 'tbl_pickup','primery_key' => $value->primery_key,'data' => $json];
            $data['table'] = 'tbl_history';
            $js = $this->insertRecord($data);
            
             }
        
       
    }

   function update_status($post){

      $this->update_history_from_managment($post);
      
    $message = '';
    if($post['type'] == 'status'){
        $data['update'] = ['status' => $post['status']];
    }
    if($post['type'] == 'driver'){
        $data['update'] = ['driver_id' => $post['driver_id']];
        $message  = $this->lang->line('text_driver_update_success');
    }
    if($post['type'] == 'date'){
        
        $data['update'] = ['pickup_date' => date('Y-m-d',strtotime($post['move_date']))];
        
        $lds = implode(',',$post['id']);
        $sql=  "update tbl_pickup set update_count = update_count+1 where id in($lds)";
        $this->company_db->query($sql);

        $message  = $this->lang->line('pickup_date_moved_successfully');
    }
    $data['where_in'] = ['id' => $post['id']];
    $data['table'] = 'tbl_pickup';
    $this->updateRecords($data);
    
    $res['status'] = SUCCESS_CODE;
    $res['data'] = '';
    $res['message'] = $message;
    apiResponse($res);

   }
    public function update_pickup_date($post){

        $data['update'] = ['pickup_date' => date('Y-m-d',strtotime($post['move_date']))];
        $data['where_in'] = ['id' => $post['id']];
        $data['table'] = 'tbl_pickup';
        $this->updateRecords($data);

        $res['status'] = SUCCESS_CODE;
        $res['data'] = '';
        $res['message'] = $this->lang->line('pickup_date_moved_successfully');
        
        apiResponse($res);
    }

    /*Get user details*/
    function get_pickup_data($user_id)
    {
        $this->company_db->select("p.*");
        $this->company_db->from('tbl_pickup p');
        $this->company_db->where('p.id', $user_id);    
        $query = $this->company_db->get();
        //echo $this->company_db->last_query();die;
        if($query->num_rows() >= 1)
        {
            $row = $query->row_array();
            $row['customer_data'] = $this->company_db->select('*')->from('tbl_customer')->where('id', $row['customer_id'])->limit(1)->get()->row_array();
            $row['branch_data'] = $this->company_db->select('*')->from('tbl_branch')->where('id', $row['branch_id'])->limit(1)->get()->row_array();
            $row['zone_data'] = $this->company_db->select('*')->from('tbl_pickup_zone')->where('id', $row['zone'])->limit(1)->get()->row_array();
            if($row['shipto_id'] != ""){
            $row['shipto_data'] = $this->company_db->select('*')->from('tbl_shipto')->where('id', $row['shipto_id'])->limit(1)->get()->row_array();
            }else{
                $row['shipto_data'] = "";    
            }
            return $row;
        }
        else
        {
            return array();
        }
    }
 
    /* Add data of company in table and return id of it */
    function add_pickup($params){
        $this->company_db->insert('tbl_pickup', $params);
        return $this->company_db->insert_id();
    }

    /* Update copany data */
    function update_pickup($id,$params)
    {
        $this->company_db->where('id',$id);
        $this->company_db->update('tbl_pickup',$params);
    }

    /* Check params in table */
    function check_param($where)
    {
        $this->company_db->select("*");
        $this->company_db->from('tbl_pickup');
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
    function _get_customer_datatables_query()
    {
        $this->company_db->select("c.id as customer_id,c.*, CONCAT(tele_country_code, ' ', telephone_number) as telephone_number, CONCAT(cell_country_code , ' ', cellphone_number) as cellphone_number, CONCAT(fname, ' ', lname) as name,sum(ih.balance) as balance");
        $this->company_db->from('tbl_customer c');
        $this->company_db->join('tbl_invoice_header ih','c.id = ih.customer_id','left');
        $this->company_db->group_by('c.id');
        $this->company_db->where('c.disable_pickup','No'); 
        $i = 0;
            
        $column_search = array("c.address_line1","c.address_line2", "c.address", "CONCAT(tele_country_code, ' ', telephone_number)", "CONCAT(cell_country_code , ' ', cellphone_number)", "CONCAT(fname, ' ', lname)",'c.balance'); //set column field database for datatable searchable 
        $order = array('c.id' => 'DESC'); // default order 

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
    function get_customer_datatables()
    {
        $offset = ($_REQUEST['datatable']['pagination']['page'] - 1)*$_REQUEST['datatable']['pagination']['perpage'];
        $this->_get_customer_datatables_query();
        if($_REQUEST['datatable']['pagination']['perpage'] != -1)
        $this->company_db->limit($_REQUEST['datatable']['pagination']['perpage'], $offset);
        $query = $this->company_db->get();
        /* echo $this->company_db->last_query();die;*/
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
    
    /*Get customer counter*/
    function customer_count_filtered()
    {
        $this->_get_customer_datatables_query();
        $query = $this->company_db->get();
        return $query->num_rows();
    } 

    /*Get customer details*/
    function get_customer_data($customer_id)
    {
        $this->company_db->select("c.*");
        $this->company_db->from('tbl_customer c');
        $this->company_db->where('c.id', $customer_id);    
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

    /*Get customer pickup list */
    function get_customer_pickup_list($customer_id)
    {
        $this->company_db->select("cp.*");
        $this->company_db->from('tbl_customer_pickup cp');
        $this->company_db->where('cp.customer_id', $customer_id);    
        $this->company_db->where('cp.void', 'No');    
        $this->company_db->order_by('cp.id', 'ASC');    
        $query = $this->company_db->get();
        //echo $this->company_db->last_query();die;
        if($query->num_rows() >= 1)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        }
    }

    /*Get customer pickup data*/
    function get_customer_pickup_data($pickup_id)
    {
        $this->company_db->select("cp.*");
        $this->company_db->from('tbl_customer_pickup cp');
        $this->company_db->where('cp.id', $pickup_id);    
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

    /* Get next id from database */
    function get_next_id(){
        $next = $this->company_db->query("SHOW TABLE STATUS LIKE 'tbl_pickup'");
        $next = $next->row(0);
        return $next->Auto_increment;
    }
    /* Get next id from database */
    function get_next_customer_pickup_id(){
        $next = $this->company_db->query("SHOW TABLE STATUS LIKE 'tbl_customer_pickup'");
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

    /* Get list of branches */
    function get_driver_list()
    {
        $this->company_db->select("*");
        $this->company_db->from('tbl_driver');
        $this->company_db->where('void','No');
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
    
    /* Get list of branches */
    function get_zone_list()
    {
        $this->company_db->select("*");
        $this->company_db->from('tbl_pickup_zone');
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

    /* Add data of customer in table and return id of it */
    function add_customer_pickup($params){
        $this->company_db->insert('tbl_customer_pickup', $params);
        return $this->company_db->insert_id();
    }

    /* Update copany data */
    function update_customer_pickup($id,$params)
    {
        $this->company_db->where('id',$id);
        $this->company_db->update('tbl_customer_pickup',$params);
        
    }

    public function updateHistory($result,$params,$pickup_id){
         $data['where'] = ['master_user_id' => $result['user_id']];
         $res = $this->Main_model->getUserInfo($data);
         
         
        foreach($params as $key => $value){
            if($params[$key] != $result[$key]){
                $is_update = 'true';
            }else{
                $is_update = 'false';
            }

            $newArray[] = [$key => $value,'is_update' => $is_update];

        }
          $newArray[] = ['updated_by' => $this->username, 'is_update' => 'false'];
          $newArray[] = ['created_by' => $res->user_name, 'is_update' => 'false'];
          $newArray[] = ['updated_date' => date('d-m-Y h:i:s'), 'is_update' => 'false'];
          $newArray[] = ['created_date' => $result['insertdate'], 'is_update' => 'false'];
          


          unset($data);
          $json = json_encode($newArray);
          if($json){
          $data['insert'] = ['user_id' => $this->id,'tbl' => 'tbl_pickup','primery_key' => $pickup_id,'data' => $json];
          $data['table'] = 'tbl_history';
          $js = $this->insertRecord($data);
          }

    
          
    }

    function pickup_history($pickup_id){
        $result =$this->Main_model->getHistory('tbl_pickup',$pickup_id);
        
        if(count($result) > 0){
            
            foreach($result as $key => $value){

                $newArray[] = json_decode($value->data,true);
                
            }
        }
        

        return $newArray;
        
        
      }

    // Ship to Models
    function _get_shipto_datatables_query()
    {
        $this->company_db->select("s.id as shipto_id,s.*, CONCAT(s.tele_country_code, ' ', s.telephone_number) as telephone_number, CONCAT(s.cell_country_code , ' ', s.cellphone_number) as cellphone_number, CONCAT(s.fname, ' ', s.lname) as name");
        $this->company_db->from('tbl_shipto s');
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
        /* echo $this->company_db->last_query();die;*/
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


    /* Get next id from database */
    function get_next_shipto_id(){
        $next = $this->company_db->query("SHOW TABLE STATUS LIKE 'tbl_shipto'");
        $next = $next->row(0);
        return $next->Auto_increment;
    }

    public function get_pdf_data($post){
        $ids = explode('_',base64_decode($post));
        
        $this->company_db->select("s.fname as shipto_fname,s.lname as shipto_lname,
        s.address_line1 as shipto_address_line1,s.address_line2 as shipto_address_line2,s.address_line3 as shipto_address_line3,
        s.sector as shipto_sector,s.province as shipto_province,s.telephone_number as shipto_telephone_number,
        p.id as customer_id,p.*, CONCAT(p.tele_country_code, ' ', p.telephone_number) as telephone_number, CONCAT(p.cell_country_code, ' ', p.cellphone_number) as cellphone_number, CONCAT(p.fname, ' ', p.lname) as name, c.balance");
        $this->company_db->from('tbl_pickup p');
        $this->company_db->join('tbl_customer c','c.id = p.customer_id');
        $this->company_db->join('tbl_shipto s','p.shipto_id = s.id','left');
        $this->company_db->where('p.void','No');
        $this->company_db->where_in('p.id',$ids);
        $query = $this->company_db->get()->result();

        return $query;
        
    }
  public function checkPickupValdiation($edit = false){

    $this->company_db->select("id");
    $this->company_db->from('tbl_pickup');
    $this->company_db->where('telephone_number',$this->input->post('telephone_number'));    
    $this->company_db->where('address',$this->input->post('address_line_1'));    
    $this->company_db->where('shipto_id',$this->input->post('shipto_id'));    
    if($edit ==true){
        $this->company_db->where('id !=',$this->input->post('pickup_id'));    
    }
    $this->company_db->where('pickup_date',date('Y-m-d',strtotime($this->input->post('pickup_date'))));    
    
    $query = $this->company_db->get()->result();
    if($query){
        $r = true;
    }else{
        $r=false;
    }
    
    return $r;

    

    



  }
}
?>