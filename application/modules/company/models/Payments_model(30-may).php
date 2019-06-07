<?php
class Payments_model extends My_Model {

    

    function __construct()
    {
        parent::__construct();        
    }


    function insert_manage_type($post){

        $post['type'] = 'payment';
        $post['user_id'] = $this->id;
        $data['insert'] = $post;
        $data['table'] = 'common_type';
        $response = $this->insertRecord($data);

        if($response){
            
                $res['status'] = SUCCESS_CODE;
                $res['message'] = $this->lang->line('payment_type_created_sccuessfully');

        }else{
            
            $res['status'] = SUCCESS_CODE;
            $res['message'] = $this->lang->line('error_message');
        }


        return $res;
        

    }

    public function update($params,$id){

        $data['update'] = $params;
        $data['table'] = 'common_type';
        $data['where'] = ['id' => $id];
        $this->updateRecords($data);
        $res['status'] = SUCCESS_CODE;
        $res['message'] = $this->lang->line('');
        return  $res;


    }

    public function pay_invoices($post){

        

        $count = count($post['invoice_details']);
        for($i=0;$i<$count;$i++){
            $invoiceId = $post['invoice_details'][$i]['invoice_id'];
            $p_amount = abs($post['invoice_details'][$i]['amount']);
            $tbalance = $post['invoice_details'][$i]['balance'];
         
           
            $data['insert'] = ['user_id' => $this->id,
                           'invoice_id' => $invoiceId,
                           'exchange_rate' => isset($post['p_exchange_rate']) ? $post['p_exchange_rate']:"",
                           'amount' =>1000,
                           'payed' => 200,
                           'balance' => $tbalance,
                           'currency' => $post['p_currency'],
                           'payment_type' => $post['p_payment_type'],
                           'receipt_number' => $post['p_receipt_number'],
                           'reffeence' => @$post['p_reffeence']
                          
                             ];

        $data['table'] = 'invoice_header_payment';
        //print_r($data); die();
        $id = $this->insertRecord($data);
        if($post['balance_type'] == 'add'){
            $sql = "update tbl_invoice_header set balance = balance+$p_amount,final_balance = final_balance-$p_amount,payments = payments+$p_amount where id = '$invoiceId'";
            //$sql_customer = "update tbl_customer set balance = balance+$p_amount where id =52";
        }else{
            $sql = "update tbl_invoice_header set balance = balance-$p_amount,final_balance = final_balance-$p_amount,payments = payments+$p_amount where id = '$invoiceId'";
            //$sql_customer = "update tbl_customer set balance = balance-$p_amount where id =52";
        }
        

        $this->company_db->query($sql);
        //$this->company_db->query($sql_customer);

        }
        //$sql = "update tbl_customer set balance = balance+$p_amount where id =". $this->id;

        $sql = "update tbl_invoice_header set status = 'Paid' where balance = '0.00'";
        $this->company_db->query($sql);
        


        $res['status'] = SUCCESS_CODE;
        $res['message'] = $this->lang->line('payment_has_done_successfully');

        echo json_encode($res);
    }

    
}
?>
