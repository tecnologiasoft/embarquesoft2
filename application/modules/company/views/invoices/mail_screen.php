<style>
   input[type = "text"],select{
   color: blue; font-weight: bold;
   }
</style>
<div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $this->lang->line('label_payment'); ?></h5>
            <button type="button" class="close" onclick = "$('#another_popup').modal('hide');">
              <span aria-hidden="true">×</span>
          </button>
         </div>
     
      <?php 
         $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'p_m_form_1','enctype'=>'multipart/form-data'); 
         echo form_open('company/invoices/send_email/',$form_data); 
         ?> 
      <div class="modal-body">
        <input type = "hidden" name = "p_invoice_id" id = "p_invoice_id" value = "<?=$result['id']?>">
         <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="">
            <div class="row">
               <div class="col-lg-4">
                  <div class="row mb-3">
                     <label class="form_label col-md-6 col-lg-5 text-right">
                     <?=$this->lang->line('label_email')?>
                     </label>
                     <div class="col-md-6 col-lg-7">
                        <input type="text" class="form-control m-input" name="p_due_date" id="p_due_date" value = "" placeholder="<?php echo $this->lang->line('label_email'); ?>">
                     </div>
                  </div>
               </div>

               <div class="row mb-1">
                     <label class="form_label col-md-6 col-lg-5 text-right">
                     </label>
                     <div class="col-md-6 col-lg-7 text-right">
                        <a href="javascript:;" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" id = "p_submit">
                        <?=$this->lang->line('label_send')?>
                        </a>
                     </div>
                  </div>


            </div>
            </div>
            <?php echo form_close(); ?>
         </div>
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
});

       // getMessage(response.status,response.message,SITE_URL+'company/invoices');
    }
    

   });

   return false;
})


</script>