<div class="m-content">
   <!--begin::Form-->
   <?php 
      $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'm_form_1','enctype'=>'multipart/form-data'); 
      echo form_open($formAction,$form_data); 
      ?>  
   <div class="row">
      <div class="col-xl-12">
         <div class="m-portlet m-portlet--tab">
            <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">
            <div class="row">
                           
                           <div class="col-lg-6">

                              <div class="row mb-3">
                                    <label class="form_label col-md-4 col-lg-3 text-right">
                                   <span id="astric">*</span> <?php echo $this->lang->line('label_claim_id').'#'; ?>:
                                    </label>
                                    <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="item_number" id="item_number" placeholder="<?php echo $this->lang->line('label_item_number'); ?>" value="<?php echo $result['id']?$result['id']:$max_value; ?>" maxlength="128" disabled = "disabled">
                                       <input type="hidden" name="item_number_hdn" id="item_number_hdn" value="<?php echo $result['id']?$result['id']:$max_value; ?>">
                                       <?php echo form_error('item_number'); ?>
                                    </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_claim_date'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                        <input type="text" class="form-control m-input" name="claim_date" id="claim_date" placeholder="<?php echo $this->lang->line('label_claim_date'); ?>" value="<?php echo set_value('claim_date')?set_value('claim_date'):date('m/d/Y'); ?>" maxlength="64" required
                                        <?=$result['claim_date']?"disabled":""?>>
                                        <?php echo form_error('claim_date'); ?>
                                        <div id="claim_date_msg" class="form-control-feedback" style="display: none;">This field is required </div>
                                 </div>
                              </div>



                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span>  <?php echo $this->lang->line('label_first_name'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="fname" id="fname" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php echo set_value('fname')?set_value('fname'):$result['fname']; ?>" maxlength="64">
                                    <?php //echo form_error('fname'); ?>
                                    <div id="fname_msg" class="form-control-feedback" style="display: none;">This field is required </div>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span>  <?php echo $this->lang->line('label_last_name'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="lname" id="lname" placeholder="<?php echo $this->lang->line('label_last_name'); ?>" value="<?php echo set_value('lname')?set_value('lname'):$result['lname']; ?>" maxlength="64">
                                    <?php //echo form_error('lname'); ?>
                                    <div id="lname_msg" class="form-control-feedback" style="display: none;">This field is required </div>
                                 </div>
                              </div>

                              

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                <span id="astric">*</span> <?php echo $this->lang->line('label_cellphone_number'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="cellphone_number" id="cellphone_number" placeholder="<?php echo $this->lang->line('label_cellphone_number'); ?>" value="<?php echo set_value('cellphone_number')?set_value('cellphone_number'):$result['cellphone_number']; ?>" maxlength="12">
                                    <?php //echo form_error('cellphone_number'); ?>
                                    <div id="cellphone_number_msg" class="form-control-feedback" style="display: none;">This field is required &amp; should be 10 digits</div>
                                 </div>
                              </div>


                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_telephone_number'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="telephone_number" id="telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php echo set_value('telephone_number')?set_value('telephone_number'):$result['telephone_number']; ?>" maxlength="12">
                                    <?php //echo form_error('telephone_number'); ?>

                                    <div id="telephone_number_msg" class="form-control-feedback" style="display: none;">This field is required &amp; should be 10 digits</div>
                                 </div>
                              </div>

                              
                           </div>
                        <div class="col-lg-6">
                              

                              
                        
                        
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span>  <?php echo $this->lang->line('label_invoice_number'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                        <input type="text" class="form-control m-input" name="invoice_number" id="invoice_number" placeholder="<?php echo $this->lang->line('label_invoice_number'); ?>" value="<?php echo set_value('invoice_number')?set_value('invoice_number'):$result['invoice_number']; ?>" maxlength="16" 
                                        <?=$result['invoice_number']?"disabled":""?>>
                                        <?php //echo form_error('invoice_number'); ?>
                                        <div id="invoice_number_msg" class="form-control-feedback" style="display: none;">This field is required </div>
                                 </div>
                              </div>


                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span>  <?php echo $this->lang->line('label_status'); ?>:
                                 </label>
                                 <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="status" value="Open" type="radio" checked="" required>
                                                                <?php echo $this->lang->line('label_open'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="status" value="Processing" type="radio" 
                                                                <?=$result['status']=='Processing'?'checked':''?>
                                                                required>
                                                                <?php echo $this->lang->line('label_processing'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="status" value="Closed" type="radio" 
                                                                <?=$result['status']=='Closed'?'checked':''?>
                                                                required>
                                                                <?php echo $this->lang->line('label_closed'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('status'); ?>
                                                    </div>
                              </div>

                              
                        
                        
                           
                             
                        
                        
                           
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                               <span id="astric">*</span>  <?php echo $this->lang->line('label_created_by'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                 <input type="text" class="form-control m-input" name="created_by" id="created_by" value="<?php echo $result['user_name']==""?$this->username:$result['user_name']; ?>" maxlength="255" readonly required> 
                                    <?php echo form_error('header'); ?>
                                    <div id="created_by_msg" class="form-control-feedback" style="display: none;">This field is required </div>
                                 </div>
                              </div>


                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_created_date'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                 <input type="text" class="form-control m-input" name="created_date" id="created_date" placeholder="<?php echo $this->lang->line('label_created_date'); ?>" value="<?php echo $result['insertdate']?date('m/d/Y',strtotime($result['insertdate'])):date('m/d/Y'); ?>" readonly required>
                                    <?php echo form_error('created_date'); ?>
                                    <div id="created_date_msg" class="form-control-feedback" style="display: none;">This field is required </div>
                                 </div>
                              </div>

                              <?php if($result) { ?>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                  <?php echo $this->lang->line('label_updated_by'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                 <input type="text" class="form-control m-input" name="updated_by" id="updated_by" placeholder = "<?=$this->lang->line('label_updated_by')?>" value="<?php echo $result['updated_by']==""?"":$result['updated_by']; ?>" maxlength="255" readonly >
                                    <?php echo form_error('updated_by'); ?>
                                 </div>
                              </div>


                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_updated_date'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                 <input type="text" class="form-control m-input" name="updated_date" id="updated_date" placeholder="<?php echo $this->lang->line('label_updated_date'); ?>" value="<?php echo $result['updatetime']=="0000-00-00 00:00:00"?"":date('m/d/Y',strtotime($result['updatetime'])); ?>" readonly >
                                    <?php echo form_error('updated_date'); ?>
                                 </div>
                              </div>

                              <?php } ?>


                              

                             



                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                     <span id="astric">*</span><?php echo $this->lang->line('label_write_claim'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                 <textarea class="form-control m-input" name="claim" id="claim" placeholder="<?=$this->lang->line('label_write_claim')?>">
                                   <?php echo set_value('claim')?set_value('claim'):$result['claim']; ?>
                                 </textarea>   
                                 <?php echo form_error('claim'); ?>
                                 <div id="claim_msg" class="form-control-feedback" style="display: none;">This field is required </div>
                                 </div>
                              </div>

                            <?php if($result) { ?>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                    <?php echo $this->lang->line('label_claim_history'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <div style = "height: 150px;overflow-y: scroll;">
                                      <?=$result['claim_history']?>
                                    </div>
                                 
                                 </div>
                              </div>
                            <?php } ?>
                        
                          
                             
                           </div>
                        </div>
                        <div class="form-group m-form__group row">
                           <div class="col-lg-9 ml-lg-auto m-form__actions">
                              <button type="submit" class="btn btn-success" value="update">
                              <?php echo $this->lang->line('label_submit'); ?>
                              </button>
                              <a href="<?php echo base_url('company/claims'); ?>" class="btn btn-secondary">
                              <?php echo $this->lang->line('label_back'); ?>
                              </a>
                           </div>
                        </div>
                     <?php echo form_close(); ?>
                     </div>
            </div>
            </div>
         </div>
      </div>
   </div>
   <?php echo form_close(); ?>
</div>
<script type="text/javascript">
  jQuery(document).ready(function() {
    $("#cellphone_number").inputmask({"mask": "999-999-9999"});
    $("#telephone_number").inputmask({"mask": "999-999-9999"});
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    var claim_date= $('#claim_date').val();
    var fname= $('#fname').val();
    var lname= $('#lname').val();
    var invoice_number= $('#invoice_number').val();
    var created_by = $('#created_by').val();
    var created_date = $('#created_date').val();
    var claim = $('#claim').val();
    var celno  =jQuery('input#cellphone_number').val();
    var telno  =jQuery('input#telephone_number').val();
    var nolength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(celno);
    var tellength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(telno);
    $("#claim_date").change(function() {
        var claim_date = $('#claim_date').val();
        if(claim_date != ''){
          jQuery('#claim_date_msg').hide();
          return true;
        }
    });
    $("#fname").change(function() {
        var fname = $('#fname').val();
        if(fname != ''){
          jQuery('#fname_msg').hide();
          return true;
        }
    });
    $("#lname").change(function() {
        var lname = $('#lname').val();
        if(lname != ''){
          jQuery('#lname_msg').hide();
          return true;
        }
    });
    $("#invoice_number").change(function() {
        var invoice_number = $('#invoice_number').val();
        if(invoice_number != ''){
          jQuery('#invoice_number_msg').hide();
          return true;
        }
    });
    $("#created_by").change(function() {
        var created_by = $('#created_by').val();
        if(created_by != ''){
          jQuery('#created_by_msg').hide();
          return true;
        }
    });
    /*$("#created_date").change(function() {
        var created_date = $('#created_date').val();
        if(created_date != ''){
          jQuery('#created_date_msg').hide();
          return true;
        }
    });*/
    $("#claim").change(function() {
        var claim = $('#claim').val();
        if(claim != ''){
          jQuery('#claim_msg').hide();
          return true;
        }
    });
    
    $("#cellphone_number").change(function() {
      //alert("test");        //var fname = $('input#cellphone_number').val();
        var celno  =jQuery('input#cellphone_number').val();
      
        var nolength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(celno);
    
        if(nolength == false){
          jQuery('#cellphone_number_msg').show();
          $(this).focus();
          return false;
        }else{
          jQuery('#cellphone_number_msg').hide();
          return true;
        }
    });
    $("#telephone_number").change(function() {
      //alert("test");
        //var fname = $('input#telephone_number').val();
        var telno  =jQuery('input#telephone_number').val();
        var tellength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(telno);
        if(tellength == false ){
          //alert("false");
          jQuery('#telephone_number_msg').show();
          $(this).focus();
          return false;
        }else{
          //alert("true");
          jQuery('#telephone_number_msg').hide();
          return true;
        }
    });
    jQuery('button.btn.btn-success').click(function(){
      var claim_date= $('#claim_date').val();
      var fname= $('#fname').val();
      var lname= $('#lname').val();
      var invoice_number= $('#invoice_number').val();
      var created_by = $('#created_by').val();
      //var created_date = $('#created_date').val();
      var claim = $('#claim').val();
      var celno  =jQuery('input#cellphone_number').val();
      var telno  =jQuery('input#telephone_number').val();
      var nolength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(celno);
      var tellength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(telno);

      /*if(fname == '' && lname == '' && claim == '' && nolength== false && tellength == false){
        jQuery('#claim_msg').show();
        jQuery('#fname_msg').show();
        jQuery('#lname_msg').show();
        jQuery('#cellphone_number_msg').show();
        jQuery('#telephone_number_msg').show();
        return false;
      }else */if(fname == '' && lname == '' && invoice_number == '' && claim == '' && nolength== false && tellength == false){
        //jQuery('#claim_date_msg').show();
        jQuery('#claim_msg').show();
        jQuery('#fname_msg').show();
        jQuery('#lname_msg').show();
        jQuery('#cellphone_number_msg').show();
        jQuery('#telephone_number_msg').show();
        jQuery('#invoice_number_msg').show();
        //jQuery('#created_by_msg').show();
        //jQuery('#created_date_msg').show();
        return false;
      }else{  
        if(claim_date == ''){
          jQuery('#claim_date_msg').show();
          return false;
        }else if(fname == ''){
          jQuery('#claim_date_msg').hide();
          jQuery('#fname_msg').show();
          return false;
        }else if(lname == ''){
          jQuery('#claim_date_msg').hide();
          jQuery('#fname_msg').hide();
          jQuery('#lname_msg').show();
          return false;
        }else if(invoice_number == ''){
          jQuery('#claim_date_msg').hide();
          jQuery('#fname_msg').hide();
          jQuery('#lname_msg').hide();
          jQuery('#invoice_number_msg').show();
          return false;
        }/*else if(created_by == ''){
          jQuery('#claim_date_msg').hide();
          jQuery('#fname_msg').hide();
          jQuery('#lname_msg').hide();
          jQuery('#invoice_number_msg').hide();
          jQuery('#created_by_msg').show();
          return false;
        }*//*else if(created_date == ''){
          jQuery('#claim_date_msg').hide();
          jQuery('#fname_msg').hide();
          jQuery('#lname_msg').hide();
          jQuery('#invoice_number_msg').hide();
          jQuery('#created_by_msg').hide();
          jQuery('#created_date_msg').show();
          return false;
        }*/else if(claim == ''){
          jQuery('#claim_date_msg').hide();
          jQuery('#fname_msg').hide();
          jQuery('#lname_msg').hide();
          jQuery('#invoice_number_msg').hide();
          //jQuery('#created_by_msg').hide();
          jQuery('#claim_msg').show();
          return false;
        }else if(tellength == false){
          jQuery('#claim_date_msg').hide();
          jQuery('#fname_msg').hide();
          jQuery('#lname_msg').hide();
          jQuery('#invoice_number_msg').hide();
          //jQuery('#created_by_msg').hide();
          jQuery('#claim_msg').hide();
          jQuery('#telephone_number_msg').show();
          return false;
        }else if( nolength== false){
          jQuery('#claim_date_msg').hide();
          jQuery('#fname_msg').hide();
          jQuery('#lname_msg').hide();
          jQuery('#invoice_number_msg').hide();
          jQuery('#created_by_msg').hide();
          jQuery('#created_date_msg').hide();
          jQuery('#telephone_number_msg').hide();
          jQuery('#cellphone_number_msg').show();
          return false;
        }
        else{
          return true;
        }
      }
    });
  });
</script> 