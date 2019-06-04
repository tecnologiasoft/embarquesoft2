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
          <button type="button" class="close"  onclick = "$('#another_popup').modal('hide');">
              <span aria-hidden="true">&times;</span>
          </button>
         </div>
         
      <?php 
         $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'invoice_m_form_1','enctype'=>'multipart/form-data'); 
         echo form_open('',$form_data); 
         ?> 

      <div class="modal-body">
        <input type = "hidden" name = "customer_id" id = "customer_id" value = "<?=$customer_id?>">
         <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="">
            <div class="row">
               <div class="col-lg-4">
                  <div class="row mb-3">
                     <label class="form_label col-md-6 col-lg-5 text-right">
                     <?=$this->lang->line('label_date')?>*
                     </label>
                     <div class="col-md-6 col-lg-7">
                        <input type="text" class="form-control m-input" name="p_due_date" id="p_due_date" value = "" readonly required>
                     </div>
                  </div>

                  <div class="row mb-3">
                     <label class="form_label col-md-6 col-lg-5 text-right">
                     <?=$this->lang->line('label_amount')?>*
                     </label>
                     <div class="col-md-6 col-lg-7">
                        <input type="text" class="form-control m-input" name="p_amount" id="p_amount" placeholder = "<?=$this->lang->line('label_amount')?>" required>
                     </div>
                  </div>

                  <div class="row mb-3">
                     <label class="form_label col-md-6 col-lg-5 text-right">
                     <?=$this->lang->line('label_personal')?>*
                     </label>
                     <div class="col-md-6 col-lg-7">
                                 <select class="form-control" name="p_driver" id="p_driver" placeholder="<?php echo $this->lang->line('label_driver'); ?>"  required data-parsley-trigger="focusin focusout" data-parsley-errors-container="#driver_error" style = "height:28px;" required>
                                            <option value=""><?php echo $this->lang->line('label_driver'); ?></option>
                                            
                                            <?php 
                                                if(!empty($driver_list)){
                                                    foreach ($driver_list as $key => $value) {
                                            ?>
                                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['fname']." ".$value['lname']; ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                        
                     </div>
                  </div>


                  <div class="row mb-3">
                     <label class="form_label col-md-6 col-lg-5 text-right">
                     <?=$this->lang->line('label_receipt_number')?>*
                     </label>
                     <div class="col-md-6 col-lg-7">
                        <input type="text" class="form-control m-input" name="p_receipt_number" id="p_receipt_number" placeholder = "<?=$this->lang->line('label_receipt_number')?>" required>
                     </div>
                  </div>

                  
                  
                 


               </div>
               <div class="col-lg-4">
                  
               <div class="row mb-3">
                     <label class="form_label col-md-6 col-lg-5 text-right">
                     <?=$this->lang->line('label_currency')?>*
                     </label>
                     <div class="col-md-6 col-lg-7">
                        <select class  = "form-control m-input" id = "p_currency" name = "p_currency" style = "height:30px;" required>
                           <option value=""><?php echo $this->lang->line('label_currency'); ?></option>
                           <option value = "dollor"><?=$this->lang->line('label_dollor')?></option>
                           1
                           <option value = "peso"><?=$this->lang->line('label_peso')?></option>
                        </select>
                     </div>
                  </div>

                  <div class="row mb-3">
                     <label class="form_label col-md-6 col-lg-5 text-right">
                     <?=$this->lang->line('field_exchange_rate')?>
                     </label>
                     <div class="col-md-6 col-lg-7">
                        <input type="text" class="form-control m-input" name="p_exchange_rate" id="p_exchange_rate" placeholder = "00.00" disabled>
                     </div>
                  </div>


                  <div class="row mb-3">
                     <label class="form_label col-md-6 col-lg-5 text-right">
                     <?=$this->lang->line('label_pay_type')?>*
                     </label>
                     <div class="col-md-6 col-lg-7">
                        <select class="form-control m-input" id = "p_payment_type" name = "p_payment_type" style = "height:30px;" required>
                        <option value=""><?php echo $this->lang->line('label_pay_type'); ?></option>
                          <?php foreach($payment_type as $value){?>
                           <option value = "<?php echo $value->id; ?>"><?php echo $value->name ?></option>
                          <? } ?>
                        </select>
                     </div>
                  </div>

                  <div class="row mb-3">
                  
                     <div class="col-md-6 col-lg-7">
                  <a href="javascript:void(0);" 
                  class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" id = "submit_btn">
                                                        <span>
                                                           
                                                            <span>
                                                            <?php echo $this->lang->line('label_submit'); ?>
                                                            </span>
                                                        </span>
                                                    </a>
                                                    </div>
                  </div>



                 
               </div>
               <div class="col-lg-4">
                 
                 
               <div class="row mb-3">
                     <label class="form_label col-md-6 col-lg-5 text-right">
                     <?=$this->lang->line('label_reffeence')?>
                     </label>
                     <div class="col-md-6 col-lg-7">
                        <input type="text" class="form-control m-input" name="p_reffeence" id="p_reffeence" placeholder = "<?=$this->lang->line('label_reffeence')?>" >
                     </div>
                  </div>
                  <div class="row mb-3">
                     <label class="form_label col-md-6 col-lg-5 text-right">
                     <?=$this->lang->line('label_total_peso')?>
                     </label>
                     <div class="col-md-6 col-lg-7">
                     
                        <input type="text" class="form-control m-input" id = "p_total_peso" name = "p_total_peso" placeholder = "<?=$this->lang->line('label_total_peso')?>" disabled>
                     </div>
                  </div>


                  <div class="row mb-3">
                     <label class="form_label col-md-6 col-lg-5 text-right">
                     <?=$this->lang->line('label_total_dollor')?>
                     </label>
                     <div class="col-md-6 col-lg-7">
                     
                        <input type="text" class="form-control m-input" id = "p_total_dollor" name = "p_total_dollor" placeholder = "<?=$this->lang->line('label_total_dollor')?>"value = "<?=$result['balance']?>" disabled>
                     </div>
                  </div>

                 

                  
               </div>
            </div>
            <?php echo form_close(); ?>
            <div class="col-xl-2 order-1 order-xl-2 m--align-right">
                                                    <select id = "m_form_status" name = "m_form_status" class = "form-control m-input">
                                                    <option value = "All"><?php echo $this->lang->line('label_all'); ?></option>
                                                      <option value = "Open" selected><?php echo $this->lang->line('label_open'); ?></option>
                                                      <option value = "Paid"><?php echo $this->lang->line('label_paid'); ?></option>
                                                    </select>
                                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                </div><br/>
            <div class="v" id="ajax_data">
         </div>
         </div>
       
      </div>
   
   
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
                url: "<?php echo site_url('company/invoices/ajax_list/'.$customer_id)?>",
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
        //sortable: !1,
        width: 50,
        selector: false,
        textAlign: "center"
    }, {
        field: "name",
        title: "<?php echo $this->lang->line('label_customer'); ?>",
    }, {
        field: "invoice_number",
        title: "<?php echo $this->lang->line('label_invoice_number'); ?>",
    }, {
        field: "invoice_date",
        title: "<?php echo $this->lang->line('label_date'); ?>",
    }, {
        field: "final_balance",
        title: "<?php echo $this->lang->line('label_amount'); ?>",
        template: function(t) {
            
            /*\t\t\t\t\t\t<a href="<?php echo base_url()."company/invoices/view/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-eye"></i>\t\t\t\t\t\t</a>*/
            /*\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url()."company/invoices/edit/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>*/
            return '<span id = "p_'+t.id+'">'+t.final_balance+'</span>'
            /*data-toggle="modal" data-target="#edit_invoice_model" */
        }
    }, {
        field: "balance",
        title: "<?php echo $this->lang->line('label_balance'); ?>",
        template: function(t) {
            
            /*\t\t\t\t\t\t<a href="<?php echo base_url()."company/invoices/view/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-eye"></i>\t\t\t\t\t\t</a>*/
            /*\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url()."company/invoices/edit/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>*/
            return '<span id = "sp_'+t.id+'">'+t.balance+'</span>'
            /*data-toggle="modal" data-target="#edit_invoice_model" */
        }
      
        
    }, {
        field: "paymentss",
        title: "<?php echo $this->lang->line('label_balance'); ?>",
        class:'demo_class',
        
        template: function(t) {
            
            /*\t\t\t\t\t\t<a href="<?php echo base_url()."company/invoices/view/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-eye"></i>\t\t\t\t\t\t</a>*/
            /*\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url()."company/invoices/edit/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>*/
            return '<input type = "text" class="form-control m-input partial_amount" id = "'+t.id+'" name = "total_payment[]" placeholder = "00.00">'
            /*data-toggle="modal" data-target="#edit_invoice_model" */
        }
        
    }, 
    {
        field: "Actions",
        width: 155,
        title: "<?php echo $this->lang->line('label_actions'); ?>",
        sortable: !1,
        overflow: "visible",
        template: function(t) {
            
            /*\t\t\t\t\t\t<a href="<?php echo base_url()."company/invoices/view/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-eye"></i>\t\t\t\t\t\t</a>*/
            /*\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url()."company/invoices/edit/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>*/
            return '<a href = "javascript:void(0);" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill btn_apply" data-id = "'+t.id+'" >Apply</a>'
            /*data-toggle="modal" data-target="#edit_invoice_model" */
        }
    }]
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

});

$(document).on('click','.btn_apply',function(){
 
    if($("#p_amount").val()==""){
        return false;
    }
  var total_value = 0;
  $('.partial_amount').each(function(){
      if($(this).val().trim() != ""){
        total_value = total_value+Math.abs(parseFloat($(this).val()));
      }
  });
  
  var invoice_amount = parseFloat($("#p_amount").val());
  var idInstance = $(this).data('id');
  var balance = parseFloat($("#sp_"+idInstance).text());
  var amount = parseFloat($("#p_"+idInstance).text());

  if(isNaN(invoice_amount) == false && invoice_amount < 0){
    
    invoice_amount = Math.abs(invoice_amount)
    console.log(total_value +'=='+ invoice_amount)
    if(total_value == invoice_amount){

        return false;

    }else{
        
    invoice_amount = invoice_amount-total_value;
    
    if(amount >= invoice_amount){

        $("#"+idInstance).val(-Math.abs(invoice_amount.toFixed(2)));
        var bb = invoice_amount+balance;
        var cc = amount-invoice_amount;
        

        $("#sp_"+idInstance).text(bb.toFixed(2));
        $("#p_"+idInstance).text(cc.toFixed(2));

    }else{

        var ams = -Math.abs(amount.toFixed(2));
        
        $("#"+idInstance).val(ams);
        $("#sp_"+idInstance).val(parseFloat(amount+balance).toFixed(2));
        $("#p_"+idInstance).val((amount-$("#"+idInstance).val()).toFixed(2));
    }

}

}else{


    if(total_value == invoice_amount){

return false;

}else{

invoice_amount = invoice_amount-total_value;

}


if(balance >= invoice_amount){
    $("#"+idInstance).val(invoice_amount.toFixed(2));
    var amount = (balance - invoice_amount) + amount
    $("#p_"+idInstance).text(amount.toFixed(2));
    }else{
    $("#"+idInstance).val(balance);
    var amount = (balance - balance) + amount
    $("#p_"+idInstance).text(amount.toFixed(2));

}

}

})








$("select").selectpicker();

$(document).on('click','#p_submit',function(){
   var data = $("#p_m_form_1").serialize();
   var url = $("#p_m_form_1").attr('action');

   ajaxCall(url,data,function(response){
   

    


    if(response.status == ERROR_CODE){

        getMessage(response.status,response.message);
    }else{

        swal({
    title: "Wow!",
    type: response.status,
    text: response.message
}).then(function() {

    
    $("#p_payment_form").html('');

    $("#another_popup").modal('hide');
    
});

       // getMessage(response.status,response.message,SITE_URL+'company/invoices');
    }
    

   });

   return false;
})

$(document).on('change','#p_currency',function(){

    
    
    if($(this).val() == 'peso'){

        $("#p_exchange_rate").val('').prop('disabled',false);
        
    }else{

        $("#p_exchange_rate,#p_total_peso").val('').prop('disabled',true);
    }
})
$(document).on('keypress keyup','#p_exchange_rate,#p_amount',function(){
    var val  = $("#p_exchange_rate").val();
    var p_amount  = $('#p_amount').val();
    console.log(val+' '+p_amount);
    if(isNaN(val) == false && isNaN(p_amount) == false){
        
    var newAmount = val*p_amount;
    
    $("#p_total_peso").val(newAmount);


    }
    $("#p_total_dollor").val(p_amount);
});



   $("#p_due_date").datepicker({
                                    autoclose: true,
                                }).datepicker("setDate", "+0d");

                   
               


                                $(document).on('click','#submit_btn',function(){
    $('#invoice_m_form_1').parsley().validate();
                if($('#invoice_m_form_1').parsley().isValid()){
                    var paymentsArray = new Array;
                    $('.partial_amount').each(function(){
                      var ids = parseInt($(this).attr('id'));
                     if($(this).val().trim() != "" && isNaN($(this).val()) === false){
                        paymentsArray.push({invoice_id:ids,amount:$(this).val()})
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
                        invoice_details:paymentsArray,
                        balance_type:(isNaN($("#p_amount").val()) == false && $("#p_amount").val() < 0) ? 'add':'reduce'
                    }

                    var url  = SITE_URL+'company/payments/pay_invoices';
                    ajaxCall(url,data,function(response){
                            getMessage(response.status,response.message);
                            
                            if(response.status == SUCCESS_CODE){
                                $("#another_popup").modal('hide');
                                window.location.reload();
                            }
                            
                    });

                                
                }


});


</script>