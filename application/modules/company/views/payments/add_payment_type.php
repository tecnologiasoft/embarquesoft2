<div class="m-content">
   <!--begin::Form-->
   <?php 
      $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'm_form_1','enctype'=>'multipart/form-data'); 
      echo form_open('company/payments/manage_type/',$form_data); 
      ?>  
      <input type = "hidden" name = "id" id = "id">
   <div class="row">
      <div class="col-xl-12">
         <div class="m-portlet m-portlet--tab">
            <div class="m-portlet__body">
               <div class="m-form__section m-form__section--first">
                  
                  
                  <div class="form-group m-form__group row">
                     <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                           * <?php echo $this->lang->line('label_payment_type'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="name" id="name" placeholder="<?php echo $this->lang->line('label_payment_type'); ?>" maxlength="20" >
                              <?php echo form_error('shipto_id'); ?>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-8 ml-lg-auto m-form__actions">
                        <button type="button" class="btn btn-success mr-30" id = "btn" style = "margin-left: 150px;">
                        <?php echo $this->lang->line('label_submit'); ?>  </button>
                     </div>
                  </div>
                  
               </div>
               
            </div>
            <div class="m-portlet__body"> 
            <div class="table-responsive">
            <table class="table">
  <thead class="bg-dark text-dark">
    <tr style = "background-color:#265790;">
      <th class="text-white" scope="col">#</th>
      <th class="text-white" scope="col"><?=$this->lang->line('label_payment_type')?></th>
      <th class="text-white" scope="col"><?=$this->lang->line('label_actions')?></th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach($payment_type as $value) {?>
    <tr>
      <th scope="row"><?=$value->id?></th>
      <td><?=$value->name?></td>
      <td>
      <a href="javascript:void(0);"  data-id = "<?=$value->id?>" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" data-name = "<?=$value->name?>">	<i class="la la-edit"></i>
                     </a>
                     <a href="javascript:;"  data-id = "<?=$value->id?>"  class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete">
                     <i class="la la-trash"></i>
                     </a>
      
      </td>
      
    </tr>
  <?php } ?>
  </tbody>
</table>
</div></div>

            



         </div>
         
      </div>
      

      
   
   <?php echo form_close(); ?>







   </div>

   
</div>

<script>

$(document).on('click','.delete',function(){
   var url = SITE_URL+'company/payments/delete';
   var data = {id:$(this).data('id')};
   var $this = $(this);
   ajaxCall(url,data,function(response){

      getMessage(response.status,response.message);
      $this.closest('tr').remove();

   })


});


$(document).on('click','.edit',function(){

   $('#name').val($(this).data('name'));
   $('#name').focus();
   $('#id').val($(this).data('id'));
   $("#m_form_1").attr('action',SITE_URL+'company/payments/edit');
   return false;

})


$(document).on('click','#btn',function(){
var data = $("#m_form_1").serialize();
var url = $("#m_form_1").attr('action');

ajaxCall(url,data,function(response){

   getMessage(response.status,response.message);
   if(response.status == SUCCESS_CODE){
   setTimeout(function(){
      window.location.reload();
   },2000);
}

});

});
</script>>