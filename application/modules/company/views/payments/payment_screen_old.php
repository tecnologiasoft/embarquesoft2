<style>
   input[type = "text"],select{
   color: blue; font-weight: bold;
   }
   .modal_header{

      background-color:green !important;
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
         $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'p_m_form_1','enctype'=>'multipart/form-data'); 
         echo form_open('company/invoices/pay_invoice/',$form_data); 
         ?> 

      <div class="modal-body">
        <input type = "hidden" name = "p_invoice_id" id = "p_invoice_id" value = "<?=$result['id']?>">
         <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="">
            <div class="row">
               <div class="col-lg-4">
                  <div class="row mb-3">
                     <label class="form_label col-md-6 col-lg-5 text-right">
                     <?=$this->lang->line('label_date')?>
                     </label>
                     <div class="col-md-6 col-lg-7">
                        <input type="text" class="form-control m-input" name="p_due_date" id="p_due_date" value = "" readonly>
                     </div>
                  </div>

                  <div class="row mb-3">
                     <label class="form_label col-md-6 col-lg-5 text-right">
                     <?=$this->lang->line('label_amount')?>*
                     </label>
                     <div class="col-md-6 col-lg-7">
                        <input type="text" class="form-control m-input" name="p_amount" id="p_amount" placeholder = "<?=$this->lang->line('label_amount')?>" value = "<?=$result['balance']?>">
                     </div>
                  </div>

                  <div class="row mb-3">
                     <label class="form_label col-md-6 col-lg-5 text-right">
                     <?=$this->lang->line('label_personal')?>
                     </label>
                     <div class="col-md-6 col-lg-7">
                                 <select class="form-control" name="p_driver" id="p_driver" placeholder="<?php echo $this->lang->line('label_driver'); ?>"  required data-parsley-trigger="focusin focusout" data-parsley-errors-container="#driver_error" style = "height:28px;">
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

                  
                  
                 


               </div>
               <div class="col-lg-4">
                  
               <div class="row mb-3">
                     <label class="form_label col-md-6 col-lg-5 text-right">
                     <?=$this->lang->line('label_currency')?>
                     </label>
                     <div class="col-md-6 col-lg-7">
                        <select class  = "form-control m-input" id = "p_currency" name = "p_currency" style = "height:30px;">
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
                        <input type="text" class="form-control m-input" name="p_exchange_rate" id="p_exchange_rate" placeholder = "00.000" disabled>
                     </div>
                  </div>


                  <div class="row mb-3">
                     <label class="form_label col-md-6 col-lg-5 text-right">
                     <?=$this->lang->line('label_pay_type')?>
                     </label>
                     <div class="col-md-6 col-lg-7">
                        <select class="form-control m-input" id = "p_payment_type" name = "p_payment_type" style = "height:30px;">
                          <?php foreach($payment_type as $value){?>
                           <option value = "<?php echo $value->id; ?>"><?php echo $value->name ?></option>
                          <? } ?>
                        </select>
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
         </div>
         <div class="modal-footer modal_header">
                <button type="button" class="btn btn-secondary" onclick = "$('#another_popup').modal('hide');"><?=$this->lang->line('label_close')?></button>
                <button type="submit" class="btn btn-success" id = "p_submit"><?=$this->lang->line('label_apply')?></button>
         </div>
      </div>
   
   
<!--begin::Page Snippets -->
<script type="text/javascript">
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
    //$('.modal-dialog modal-lg').modal('hide');
});

       // getMessage(response.status,response.message,SITE_URL+'company/invoices');
       location.reload();
       //$('.modal-dialog modal-lg').modal('hide');
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
});



   $("#p_due_date").datepicker({
                                    autoclose: true,
                                }).datepicker("setDate", "+0d");

                   
               



</script>