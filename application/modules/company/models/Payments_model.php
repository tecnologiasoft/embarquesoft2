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
        $customer_id = $post['p_customer_id'];
        $p_remain_dollor = $post['p_remain_dollor'];

        if($p_remain_dollor == ''){
            $p_remain_dollor = '';
        }else{
            $p_remain_dollor = $post['p_remain_dollor'];
        }

        if($customer_id == ''){
            $customer_id = '';
        }else{
            $customer_id = $post['p_customer_id'];
        }
        $count = count($post['invoice_details']);
        for($i=0;$i<$count;$i++){
            $invoiceId = $post['invoice_details'][$i]['invoice_id'];
            $pamount = $post['invoice_details'][$i]['pamount'];
            $p_amount = abs($post['invoice_details'][$i]['amount']);
            $tbalance = $post['invoice_details'][$i]['balance']; 
            $transaction_id = rand();
            $receipt_number = $post['p_receipt_number'];
            $pay_amount = $post['invoice_details'][$i]['amount'];
            $balance = $pamount -  $pay_amount;
            $ex_rate="";
            if(isset($post['p_exchange_rate'])){
                $ex_rate = $post['p_exchange_rate'];
            }else{
                 $ex_rate = 0;
            }
            $insert_query = "INSERT INTO `invoice_header_payment` (`id`, `user_id`, `invoice_id`, `driver_id`, `exchange_rate`, `amount`, `payed`, `balance`, `currency`, `payment_type`, `reffeence`, `receipt_number`, `transaction_id`, `payment_date`, `customer_id`,`created_date`,`curry_dollor`) VALUES (NULL, $this->id, $invoiceId, '0', '0', $pamount, $pay_amount, $balance, 'dollor', '3', '1', $receipt_number, $transaction_id, CURRENT_TIMESTAMP, $customer_id, CURRENT_TIMESTAMP,$p_remain_dollor)";
            $this->company_db->query($insert_query);
            if($insert_query){
                if($post['balance_type'] == 'add'){
                    $sql = "update tbl_invoice_header set balance = balance+$p_amount,final_balance = final_balance-$p_amount,payments = payments+$p_amount where id = '$invoiceId'";
                }else{
                    $sql = "update tbl_invoice_header set balance = balance-$p_amount,final_balance = final_balance-$p_amount,payments = payments+$p_amount where id = '$invoiceId'";
                }
                $this->company_db->query($sql);
                $sql = "update tbl_invoice_header set status = 'Paid' where balance = '0.00'";
                $this->company_db->query($sql);
                $res['status'] = SUCCESS_CODE;
                $res['message'] = $this->lang->line('payment_has_done_successfully');
            }else{
                $res['status'] = SUCCESS_CODE;
                $res['message'] = $this->lang->line('payment_has_not_done_successfully');
            }
        }
        echo json_encode($res);
    }


}
?>
