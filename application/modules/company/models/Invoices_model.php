
<?php
class Invoices_model extends My_Model {

    var $column_search = array("c.address", "CONCAT(c.tele_country_code, ' ', c.telephone_number)", "CONCAT(c.cell_country_code , ' ', c.cellphone_number)", "CONCAT(c.fname, ' ', c.lname)","c.state","ih.balance","ih.invoice_number","CONCAT(s.fname, ' ', s.lname)"); //set column field database for datatable searchable for datatable searchable 
    var $order = array('ih.id' => 'DESC'); // default order 

    function __construct()
    {
        parent::__construct();        
    }


    /* get a driver record counts */
    function invoices_count()
    {
        $this->company_db->from('tbl_invoice_header');
        return $this->company_db->count_all_results();
    }

    // invoices Models
    function _get_datatables_query($customer_id = "")
    {
        /*$this->company_db->select("ih.*");
        $this->company_db->from('invoice_header_payment ih');
        $this->company_db->where('ih.customer_id' ,$customer_id);*/
        $this->company_db->select("ih.sub_total as sub_total,ih.id as invoices_id,ih.*, c.email,c.address_line1, CONCAT(c.tele_country_code, ' ', c.telephone_number) as telephone_number, CONCAT(c.cell_country_code , ' ', c.cellphone_number) as cellphone_number, CONCAT(c.fname, ' ', c.lname) as name, c.state, CONCAT(s.fname, ' ', s.lname) as consignee");
        $this->company_db->from('tbl_invoice_header ih');
        $this->company_db->join('tbl_customer c','ih.customer_id = c.id');
        $this->company_db->join('tbl_shipto s','ih.shipto_id = s.id');
        //$this->company_db->join('invoice_header_payment ihp','ih.id = ihp.invoice_id');
        
        if($customer_id){
            $this->company_db->where('ih.customer_id' ,$customer_id);
        }
        //$this->company_db->where('ih.void','No');
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

        if(!empty($_REQUEST['datatable']['query']['Status']) && $_REQUEST['datatable']['query']['Status'] == 'open') // Active or Inactive check
        {
        
            $this->company_db->where('ih.balance >','0');
        }
        else if(!empty($_REQUEST['datatable']['query']['Status']) && $_REQUEST['datatable']['query']['Status'] == 'paid') // Active or Inactive check
        {
            $this->company_db->where('ih.balance <=','0');
        }else if(!empty($_REQUEST['datatable']['query']['Status']) && $_REQUEST['datatable']['query']['Status'] == 'all'){
         
        }else{

            $this->company_db->where('ih.balance >','0');
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
/*rajesh*/

function _get_datatables_queryss($customer_id = "")
    {
        $this->company_db->select("ih.*");
        $this->company_db->from('invoice_header_payment ih');
        //if($customer_id){
            $this->company_db->where('ih.invoice_id' ,$customer_id);
            // $this->company_db->get();
       
        //}
        //$this->company_db->where('ih.void','No');
        $i = 0;
        
        

    }

    /*Get invoices records pagination*/
    function get_datatables($customer_id = "")
    {
        $offset = ($_REQUEST['datatable']['pagination']['page'] - 1)*$_REQUEST['datatable']['pagination']['perpage'];
        $this->_get_datatables_query($customer_id);
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

    function get_datatablesss($customer_id = "")
    {


        $offset = ($_REQUEST['datatable']['pagination']['page'] - 1)*$_REQUEST['datatable']['pagination']['perpage'];
        $this->_get_datatables_queryss($customer_id);
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
    
    /*Get invoices counter*/
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->company_db->get();
        return $query->num_rows();
    }
    /*Rajesh*/
    function count_filteredss()
    {
        $this->_get_datatables_queryss();
        $query = $this->company_db->get();
        return $query->num_rows();
    }

    /*Get invoices details*/
    function get_invoices_data($invoices_id)
    {
        $data['select'] = ['ih.*,concat(d.fname," ",d.lname) as driver_name'];
        $data['table'] = 'tbl_invoice_header ih';
        $data['where'] = ['ih.id' => $invoices_id];
        $data['join'] = [
            'tbl_driver d' => ['ih.driver_id = d.id','LEFT']
        ];
        $response = $this->selectFromJoin($data,true);
        return count($response) == 1 ? $response[0]:$response;
    }


    public function pay_invoice($post){
        
        $invoiceId = $post['p_invoice_id'];
        $response = $this->get_invoices_data($invoiceId);
        
        $p_amount = $post['p_amount'];
        if(($response['balance'] < $p_amount) || ($p_amount < 1)){
            $res['status'] = ERROR_CODE;
            $res['message'] = $this->lang->line('payment_amount_is_greater_than_balance');

            echo json_encode($res);
            die;
        }
        $p_reffeence = $post['p_reffeence'];
        $p_receipt_number = $post['p_receipt_number'];
        $currency = $post['p_currency'];
        $balance = $post['m_amount'] - $post['p_amount'];
        if(isset($post['p_exchange_rate'])){
        $exchange_rate = $post['p_exchange_rate'];
        }else{
            $exchange_rate = '';   
        }
//m_amount m_amount
        $data['insert'] = ['user_id' => $this->id,'invoice_id' => $invoiceId,'exchange_rate' => $exchange_rate,
        'amount' => $post['m_amount'],'payed' => $post['p_amount'],'balance' => $balance,'currency' => $currency,'payment_type' => $post['p_payment_type'],'driver_id' => $post['p_driver'],'receipt_number' =>$post['p_receipt_number']];
        $data['table'] = 'invoice_header_payment';
        $id = $this->insertRecord($data);
        $sql = "update tbl_invoice_header set balance = balance-$p_amount, final_balance = final_balance-$p_amount where id = '$invoiceId'";
        $this->company_db->query($sql);
        
        /*$this->company_db->select("payments");
        $this->company_db->from('tbl_invoice_header');
        $this->company_db->where('id', $invoiceId);    
        $query = $this->db->get()->row()->payments;
        $tot_payment = $query + $p_amount;
        */

        $sql1 = "update tbl_invoice_header set payments = payments+$p_amount where id = '$invoiceId'";
        $this->company_db->query($sql1);

        $res['status'] = SUCCESS_CODE;
        $res['message'] = $this->lang->line('payment_has_done_successfully');

        echo json_encode($res);
        




        //$sql = "update tbl_invoice_header set reffeence = '$p_reffeence' AND currency = '$currency',balance = ";


    }

    /*Get invoices details*/
    function get_invoices_items($invoices_id)
    {
        $this->company_db->select("ii.*");
        $this->company_db->from('tbl_invoice_item ii');
        $this->company_db->where('ii.header_id', $invoices_id);    
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
 
    /* Add data of company in table and return id of it */
    function add_invoices($params){
        $this->company_db->insert('tbl_invoice_header', $params);
        return $this->company_db->insert_id();
    }
 
    /* Add data of company in table and return id of it */
    function add_invoice_items($params){
        return $this->company_db->insert_batch('tbl_invoice_item', $params);
    }

    /* Update copany data */
    function update_invoices($id,$params)
    {
        $this->company_db->where('id',$id);
        $this->company_db->update('tbl_invoice_header',$params);
    }

    function delete($id){
        $data['where'] = ['id' => $id];
        $data['table'] = 'tbl_invoice_header';
        $this->deleteRecords($data);
    }
 
    /* Add data of company in table and return id of it */
    function add_customer($params){
        $this->company_db->insert('tbl_customer', $params);
        return $this->company_db->insert_id();
    }
 
    /* Add data of shipto in table and return id of it */
    function add_shipto($params){
        $this->company_db->insert('tbl_shipto', $params);
        return $this->company_db->insert_id();
    }

    function check_param($where)
    {
        $this->company_db->select("*");
        $this->company_db->from('tbl_invoice_header');
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
    
    /* Get list of branches */
    function get_driver_list()
    {
        $this->company_db->select("*");
        $this->company_db->from('tbl_driver');
       // $this->company_db->where('void','No');
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

    function get_agent_list()
    {
        $this->company_db->select("*");
        $this->company_db->from('agent');
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
    
    /* Get list of warehouses */
    function get_customer_list()
    {
        $this->company_db->select("c.*");
        $this->company_db->from('tbl_customer c');
       // $this->company_db->where('c.void', 'No');
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

    function get_claim_data($claims_id){
        $this->company_db->select("c.claim_history,c.invoice_number");
        $this->company_db->from('tbl_claims c');
        



        $this->company_db->where('c.invoice_number', $claims_id);    
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
    public function add_claim($post){

        $res = $this->get_claim_data($post['claim_invoice_number']);

        $data['where'] = ['invoice_number' => $post['claim_invoice_number']];
        $data['table'] = 'tbl_claims';
        if(count($res) > 0){
        $claim_history = $this->username.'  '.date('m-d-Y h:i A').'<br/>'.$post['claim'].'<br/><br/>'.$res ['claim_history'];
        $params =[
                'claim' => $post['claim'],
                'claim_history' => $claim_history,
                'updated_by' => $this->id,
                ];
       $data['update'] = $params;
       $this->updateRecords($data);
       $res['status'] = SUCCESS_CODE;
       $res['message'] = $this->lang->line('text_claims_update_success');
       
     }else{

        $claim_history = $this->username.'  '.date('m-d-Y h:i A').'<br/>'.$post['claim'];
        
        $params =[
                'claim' => $post['claim'],
                'claim_history' => $claim_history,
                'claim_history' => $claim_history,
                'invoice_number' => $post['claim_invoice_number'],
                'claim_date' => date('Y-m-d'),
                'user_id' => $this->id,
                ];

       $data['insert'] = $params;
       $this->insertRecord($data);
       $res['status'] = SUCCESS_CODE;
       $res['message'] = $this->lang->line('text_claims_add_success');

     }
      return $res;
    }
    /* Get list of warehouses */
    function get_customer_list_search($terms)
    {
        $this->company_db->select("c.*, CONCAT(c.tele_country_code, ' ', c.telephone_number) as telephone_number, CONCAT(c.cell_country_code , ' ', c.cellphone_number) as cellphone_number, CONCAT(c.fname, ' ', c.lname) as name");
        $this->company_db->from('tbl_customer c');
        //$this->company_db->where('c.void', 'No');
        $column_search = array("c.address_line1", "CONCAT(c.tele_country_code, ' ', c.telephone_number)", "CONCAT(c.cell_country_code , ' ', c.cellphone_number)", "CONCAT(c.fname, ' ', c.lname)");

        if(isset($terms) && !empty($terms)) // if datatable send POST for search
        {
            $i = 0;
            foreach ($column_search as $item) // loop column 
            {        
                if($i===0) // first loop
                {
                    $this->company_db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->company_db->like($item, $terms);
                }
                else
                {
                    $this->company_db->or_like($item, $terms);
                }
 
                if(count($column_search) - 1 == $i) //last loop
                    $this->company_db->group_end(); //close bracket
                
                $i++;
            }
        }

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
    
    /* Get list of warehouses */
    function get_item_list_search($terms)
    {
        $this->company_db->select("i.*");
        $this->company_db->from('tbl_inventory i');
        //$this->company_db->where('i.void', 'No');
        $column_search = array("CONVERT(i.description USING utf8)", "i.item_number");

        if(isset($terms) && !empty($terms)) // if datatable send POST for search
        {
            $i = 0;
            foreach ($column_search as $item) // loop column 
            {        
                if($i===0) // first loop
                {
                    $this->company_db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->company_db->like($item, $terms);
                }
                else
                {
                    $this->company_db->or_like($item, $terms);
                }
 
                if(count($column_search) - 1 == $i) //last loop
                    $this->company_db->group_end(); //close bracket
                
                $i++;
            }
        }

        $query = $this->company_db->get();
        
        if($query->num_rows() >= 1)
        {
            foreach ($query->result() as $key => $value) {
                $value->description = strtolower($value->description);
            }
            return $query->result_array();
        }
        else
        {
            return array();
        }
    }

    /*Get customer pickup data*/
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

    /*Get customer pickup data*/
    function get_customer_shipto($customer_id)
    {
        $this->company_db->select("s.*");
        $this->company_db->from('tbl_shipto s');
        //$this->company_db->where('s.void', 'No');
        $this->company_db->where('s.customer_id', $customer_id);    
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
    function get_shipto_data($shipto_id)
    {
        $this->company_db->select("s.*");
        $this->company_db->from('tbl_shipto s');
        $this->company_db->where('s.id', $shipto_id);    
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
    function get_next_shipto_id(){
        $next = $this->company_db->query("SHOW TABLE STATUS LIKE 'tbl_shipto'");
        $next = $next->row(0);
        return $next->Auto_increment;
    }

    /* Delete invoice items by invoice id */
    function delete_invoice_items($id){
        $this->company_db->delete('tbl_invoice_item', array("header_id"=>$id));
    }

    /* Update customer data by id */
    function update_customer($customer_id,$params){
        $this->company_db->update('tbl_customer', $params,array("id"=>$customer_id));        
    }

    /* Update shipto data by id */
    function update_shipto($shipto_id,$params){
        $this->company_db->update('tbl_shipto', $params,array("id"=>$shipto_id));        
    }


    /*customer edit page payment screen*/
    function get_payment_datatables($customer_id = "")
    {
        $offset = ($_REQUEST['datatable']['pagination']['page'] - 1)*$_REQUEST['datatable']['pagination']['perpage'];
        $this->_get_datatables_payment_query($customer_id);
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

    // customer edit page payment screen abhishek
    function _get_datatables_payment_query($customer_id = "")
    {
        $this->company_db->select("ih.*,p.sub_total as sub_total");
        $this->company_db->from('invoice_header_payment ih');
        $this->company_db->where('ih.customer_id' ,$customer_id);
        //$this->company_db->where('ih.customer_id' ,$customer_id);
        $this->company_db->join('tbl_invoice_header p','ih.invoice_id = p.id');
        //$this->company_db->where('ih.balance ==' 0);
        /*$this->company_db->select("ih.sub_total as sub_total,ih.id as invoices_id,ih.*, c.email,c.address_line1, CONCAT(c.tele_country_code, ' ', c.telephone_number) as telephone_number, CONCAT(c.cell_country_code , ' ', c.cellphone_number) as cellphone_number, CONCAT(c.fname, ' ', c.lname) as name, c.state, CONCAT(s.fname, ' ', s.lname) as consignee");
        $this->company_db->from('tbl_invoice_header ih');
        $this->company_db->join('tbl_customer c','ih.customer_id = c.id');
        $this->company_db->join('tbl_shipto s','ih.shipto_id = s.id');*/
        // $this->company_db->join('invoice_header_payment p','ih.id = p.invoice_id');
        if($customer_id){
            $this->company_db->where('ih.customer_id' ,$customer_id);
        }
        //$this->company_db->where('ih.void','No');
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

        if(!empty($_REQUEST['datatable']['query']['Status']) && $_REQUEST['datatable']['query']['Status'] == 'open') // Active or Inactive check
        {
        
            $this->company_db->where('ih.balance >','0');
        }
        else if(!empty($_REQUEST['datatable']['query']['Status']) && $_REQUEST['datatable']['query']['Status'] == 'paid') // Active or Inactive check
        {
            $this->company_db->where('ih.balance <=','0');
        }else if(!empty($_REQUEST['datatable']['query']['Status']) && $_REQUEST['datatable']['query']['Status'] == 'all'){
         
        }else{

            $this->company_db->where('ih.balance <=','0');
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
/*rajesh*/

}
?>