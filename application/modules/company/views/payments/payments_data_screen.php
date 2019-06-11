
<style>
.form_label {
    color: #265791;
    font-weight: bold !important;
}
input[type = 'text'],select{
   color: blue !important; 
   font-weight: bold !important;
}
</style>
<div class="modal-content">
          <div class="modal-header modal_header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $this->lang->line('label_payment'); ?></h5>
          <!-- <button type="button" class="close"  onclick = "$('#another_popup').modal('hide');">
              <span aria-hidden="true">&times;</span>
          </button> -->
         </div>
      <div class="modal-body">
        <input type = "hidden" name = "customer_id" id = "customer_id" value = "<?=$customer_id?>">
         <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="">
          <div class="row">
               <div class="col-lg-4">
                  <div class="row mb-3"> 
                      <label class="form_label col-md-6 col-lg-5 text-right">
                     Total Amount
                     </label>
                      <div class="col-md-6 col-lg-7"> 
                        <!-- 10-jun-2019 -->
                       <input type="text" class="form-control m-input" name="p_amount" id="p_amount" placeholder = "" value="<?php if($totalBal[0]['totalBalance'] == 0 ) echo "0.00";else echo $totalBal[0]['totalBalance'];?>" disabled>
                       <input type="hidden" class="form-control m-input" name="m_amount" id="m_amount" placeholder = "" disabled> 
                      </div> 
                 </div> 
                  <div class="row mb-3">
                     <label class="form_label col-md-6 col-lg-5 text-right">
                     Remaining Balance
                     </label>
                     <div class="col-md-6 col-lg-7">
                      <!-- 10-jun-2019 -->
                        <input type="text" class="form-control m-input" id = "p_remain_dollor" name = "p_remain_dollor" placeholder="" value = "<?php if($totalAmt[0]['totalAmount'] == 0) echo "0.00"; else echo $totalAmt[0]['totalAmount'];?>" disabled>
                     </div>
                  </div> 
              </div>
          </div>
        <div class="v" id="ajax_data">
        </div>
         </div>
       
      </div>
     
  </div>
  <!-- 10-jun-2019 count payment of the customer -->
   <?php if(count($Countpayment) > 0){?>   
<!--begin::Page Snippets -->
<script type="text/javascript">
var m_datatables = null;
var DatatableRemoteAjaxDemo = function() {
var t = function() {
var t = $(".v").mDatatable({
    data: {
        type: "remote",
        source: {
            read: {
                url: "<?php echo site_url('company/invoices/ajax_payment_list/'.$customer_id)?>",
                params:{}
            }
        },
        pageSize: 10,
        saveState: {
            cookie: false,
            webstorage: false
        },
        serverPaging: true,
        serverFiltering: true,
        serverSorting: true
    },
    layout: {
        theme: "default",
        class: "",
        scroll: false,
        footer: false
    },
    sortable: true,
    pagination: true,
    columns: [{
        field: "id",
        title: "#",
        width: 50,
        selector: false,
        textAlign: "center"
    },    
    {
        field: "receipt_number",
        title: "<?php echo 'Receipt Number'; ?>",
    },
    {
        field: "transaction_id",
        title: "<?php echo 'Transaction Id'; ?>",
    },
    {
        field: "invoice_id",
        title: "<?php echo $this->lang->line('label_invoice_number'); ?>",
    }, {
        field: "payment_date",
        title: "<?php echo "Payment Date"; ?>",
    }, {
        field: "sub_total",
        title: "<?php echo $this->lang->line('label_amount'); ?>",
    }
    , {
        field: "balance",
        title: "<?php echo $this->lang->line('label_balance'); ?>",
        template: function(t) {
            return '<input type="hidden" name="tbalance" value="'+t.balance+'" id="tbalance'+t.id+'"><span id = "sp_'+t.id+'">'+t.balance+'</span>'
        }
        
    }
    ]
}),
        e = t.getDataSourceQuery();
        m_datatables = t;
        
        $("#m_form_search").on("keyup", function(e) {
            var a = t.getDataSourceQuery();
            a.generalSearch = $(this).val().toLowerCase(), t.setDataSourceQuery(a), t.load()
        }).val(e.generalSearch),    $("#m_form_status").on("change", function() {
            var e = t.getDataSourceQuery();
            e.Status = $(this).val().toLowerCase(), t.setDataSourceQuery(e), t.load()
        }).val(void 0 !== e.Status ? e.Status : ""), $("#m_form_type").on("change", function() {
            var e = t.getDataSourceQuery();
            e.Type = $(this).val().toLowerCase(), t.setDataSourceQuery(e), t.load()
        }).val(void 0 !== e.Type ? e.Type : ""), $("#m_form_status, #m_form_type").selectpicker()
    };
    return {
        init: function() {
            t()
        }
    }
}();
jQuery(document).ready(function() {
    DatatableRemoteAjaxDemo.init()
    //alert($('#curry_dollor').val());

});
$(document).on('change','.partial_amount',function(){
  var idInstance = $(this).data('id');
  if($("#p_amount").val()==""){
    return false;
  }
  var total_value = 0;
  var invoice_amount = parseFloat($("#p_amount").val());
  var balance = parseFloat($("#sp_"+idInstance).text());
  var amount = parseFloat($("#p_"+idInstance).text());
  $('.partial_amount').each(function () {
    if ($(this).val().trim() != "") {
      total_value = total_value + Math.abs(parseFloat($(this).val()));
    }
  }); 
  if(invoice_amount >= total_value){
  var remain_amount = parseFloat(invoice_amount - total_value).toFixed(2);
  $('#p_remain_dollor').val(remain_amount);
  $("#btn_stop_"+idInstance).show();
  $("#btn_apply_"+idInstance).hide()
  }else{
  alert("Entered amount is greater than remaining amount");
  $('#'+idInstance).val(0.00);
  $(this).focus();
  }
  console.log(idInstance);  
  console.log(invoice_amount);
  console.log(balance);
  console.log(amount);
  console.log(total_value);
});

$(document).on('click','.btn_apply',function(){
  var idInstance = $(this).data('id');
  if($("#p_amount").val()==""){
    return false;
  }
  var total_value = 0;
  var invoice_amount = parseFloat($("#p_amount").val());
  var balance = parseFloat($("#sp_"+idInstance).text());
  var amount = parseFloat($("#p_"+idInstance).text());
  $('.partial_amount').each(function () {
    if ($(this).val().trim() != "") {
      total_value = total_value + Math.abs(parseFloat($(this).val()));
    }
  });   
  if(invoice_amount > total_value){
    var remain_amount = parseFloat(invoice_amount - total_value).toFixed(2);
    
    if(remain_amount >= balance){     
      $("#"+idInstance).val(balance);
      remain_amount = parseFloat(remain_amount - balance).toFixed(2);
      $('#p_remain_dollor').val(remain_amount);
    }else{
      $("#"+idInstance).val(remain_amount);
      $('#p_remain_dollor').val(0);
    }
  }else{
    $('#p_remain_dollor').val(0);
    return false;
  }
  var btntype = $(this).data('btntype');
  if(btntype == "apply"){
    $('#btn_apply_'+idInstance).hide();
    $('#btn_stop_'+idInstance).show();
  }else{
    $('#btn_apply_'+idInstance).show();
    $('#btn_stop_'+idInstance).hide();
  }
});
$(document).on('click','.btn_stop',function(){
  var idInstance = $(this).data('id');
  //alert(idInstance);

$("#btn_stop_"+idInstance).hide();
$("#btn_apply_"+idInstance).show();
//btn_apply_42
  $("#"+idInstance).val('');
  if($("#p_amount").val()==""){
    //alert();
    var btntype = $(this).data('btntype');
    if(btntype == "apply"){
      $('#btn_apply_'+idInstance).hide();
      $('#btn_stop_'+idInstance).show();
    }else{    
      $('#btn_apply_'+idInstance).show();
      $('#btn_stop_'+idInstance).hide();
    }
    return false;
  }
  var total_value = 0;
  var invoice_amount = parseFloat($("#p_amount").val());
  var balance = parseFloat($("#sp_"+idInstance).text());
  var amount = parseFloat($("#p_"+idInstance).text());
  var remain_amount = parseFloat($("#p_remain_dollor").text());
  $('.partial_amount').each(function () {
    if ($(this).val().trim() != "") {
      total_value = total_value + Math.abs(parseFloat($(this).val()));
    }
  });   
  if(invoice_amount > total_value){
    var remain_amount = parseFloat(invoice_amount - total_value).toFixed(2);
    $("#p_remain_dollor").val(remain_amount);
  }else{
    $('#p_remain_dollor').val(0);
    return false;
  }
  var btntype = $(this).data('btntype');
  if(btntype == "apply"){
    $('#btn_apply_'+idInstance).hide();
    $('#btn_stop_'+idInstance).show();
  }else{    
    $('#btn_apply_'+idInstance).show();
    $('#btn_stop_'+idInstance).hide();
  }
});

$("select").selectpicker();

$(document).on('change','#p_currency',function(){
    if($(this).val() == 'peso'){
        $("#p_exchange_rate").val('').prop('disabled',false);
    }else{
        $("#p_exchange_rate,#p_total_peso").val('').prop('disabled',true);
    }
});

$(document).on('change','#p_amount',function(){
  var idInstance = $(this).data('id');
  var total_value = 0;
  var invoice_amount = parseFloat($("#p_amount").val());
  var pre_remain_amount = $("#p_remain_dollor").val();
    $('.partial_amount').each(function () {
    if ($(this).val().trim() != "") {
      total_value = total_value + Math.abs(parseFloat($(this).val()));
    }
  });
    if(invoice_amount >= total_value){
      var remain_amount =parseFloat(invoice_amount - total_value);
       $("#p_remain_dollor").val(remain_amount);
    }else{
      alert('Amount is less than applied amount,Please remove & reapply amount from invoice');
      
      $("#p_remain_dollor").val(0.00);
      $("#p_amount").val(0.00);
      $("#p_total_dollor").val(0.00);
    } 

});

$(document).on('keypress keyup','#p_exchange_rate,#p_amount',function(){
    var val  = $("#p_exchange_rate").val();
    var p_amount  = $('#p_amount').val();
    var remain_amount = $('#p_amount').val();
    console.log(val+' '+p_amount);
    if(isNaN(val) == false && isNaN(p_amount) == false){
    var newAmount = val*p_amount;
    $("#p_total_peso").val(newAmount);
    }
    $("#p_total_dollor").val(p_amount);
    $("#p_remain_dollor").val(remain_amount);
});
   $("#p_due_date").datepicker({
                                    autoclose: true,
                                }).datepicker("setDate", "+0d");
                                $(document).on('click','#submit_btn',function(){
                    var paymentsArray = new Array;
                    $('.partial_amount').each(function(){
                      var ids = parseInt($(this).attr('id'));
                     if($(this).val().trim() != "" && isNaN($(this).val()) === false){
                        paymentsArray.push({invoice_id:ids,amount:$(this).val(),pamount:$('#tbalance'+ids).val()})
                     }
                     }); 
                     var data = {
                        p_due_date:$("#p_due_date").val(),
                        p_currency:$("#p_currency").val(),
                        p_amount:$("#p_amount").val(),
                        p_driver:$("#p_driver").val(),
                        p_driver:$("#p_driver").val(),
                        p_payment_type:$("#p_payment_type").val(),
                        p_receipt_number:$("#p_receipt_number").val(),
                        p_reffeence:$("#p_reffeence").val(),
                        p_exchange_rate:$("#p_exchange_rate").val(),
                        invoice_details:paymentsArray,
                        balance_type:(isNaN($("#p_amount").val()) == false && $("#p_amount").val() < 0) ? 'add':'reduce'
                    }
                    console.log(data);
                    var url  = SITE_URL+'company/payments/pay_invoices';
                    ajaxCall(url,data,function(response){
                            getMessage(response.status,response.message);
                            if(response.status == SUCCESS_CODE){
                              //console.log(data);
                                $("#another_popup").modal('hide');
                                window.location.reload();
                            }
                    });
});
</script>
<?php }else{?>
<span id="noFoundPayment" style="margin: 215px;font-size: 30px;"> <?php echo "No Data Founded";?></span>
<?php }?>
