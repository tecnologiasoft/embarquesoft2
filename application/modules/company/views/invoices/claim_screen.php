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
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $this->lang->line('title_add_new_claims'); ?></h5>
          <button type="button" class="close"  onclick = "$('#another_popup').modal('hide');">
              <span aria-hidden="true">&times;</span>
          </button>
         </div>
         
      <?php 
         $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'claim_p_m_form_1','enctype'=>'multipart/form-data'); 
         echo form_open('company/invoices/add_claim/',$form_data); 
         ?> 

      <div class="modal-body">
        <input type = "hidden" name = "claim_invoice_number" id = "claim_invoice_number">
         <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="">
            <div class="row">
               <div class="col-lg-12">
                                    
                                
                                      <textarea class="form-control m-input" rows="8" name="claim" id="claim" placeholder="<?=$this->lang->line('label_write_claim')?>" required><?php echo set_value('claim')?></textarea>   
                                      <?php echo form_error('claim'); ?>
                                 
               </div>

               <div class="col-lg-12">
               <div style = "height: 150px;overflow-y: scroll;">
                                      <?=$result['claim_history']?$result['claim_history']:'<br/><br/><br/>No claim found'?>
                                    </div>
               </div>
               
            </div>
            <?php echo form_close(); ?>
         </div>
         <div class="modal-footer modal_header">
                <button type="button" class="btn btn-secondary" onclick = "$('#another_popup').modal('hide');"><?=$this->lang->line('label_close')?></button>
                <button type="submit" class="btn btn-success" id = "claim_submit"><?=$this->lang->line('label_submit')?></button>
         </div>
      </div>
   
   
<!--begin::Page Snippets -->
<script type="text/javascript">

$(document).on('click','#claim_submit',function(){
   
   $("#claim_invoice_number").val($('#edit_invoice_hash').val());
   var data = $("#claim_p_m_form_1").serialize();
   var url = $("#claim_p_m_form_1").attr('action');

   ajaxCall(url,data,function(response){
   
    if(response.status == ERROR_CODE){

        getMessage(response.status,response.message);
    }else{

        swal({
         title: "Wow!",
         type: response.status,
         text: response.message
         }).then(function() {
            
            $("#another_popup_html").html('');
            $("#another_popup").modal('hide');
         });
      }
    

   });

   return false;
})




</script>