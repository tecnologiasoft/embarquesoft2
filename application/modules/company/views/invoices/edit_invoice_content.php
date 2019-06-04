<style>
input[type = "text"],select{
    color: blue; font-weight: bold;
}

.modal_header{

background-color:green !important;
}

</style>
<?php //echo "<pre>"; print_r($result); echo "</pre>";?>
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title mt-2" id="exampleModalLabel">
                <?php echo $this->lang->line('title_edit_invoices'); ?>
            </h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    X
                </span> 
            </button>

            <a href="#" id  = "m_money" class="btn btn-success m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill m-btn--air ml-3 " onclick = "payment();">
            <i class="la la-money"></i>
            </a>


            <a href="#" id  = "m_mail" class="btn btn-success m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill m-btn--air ml-3" onclick = "mail('<?php echo $result['customer_data']['email']; ?>');">
            <i class="la la-envelope"></i>
            </a>

            <a href="#" id  = "m_mail" class="btn btn-success m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill m-btn--air ml-3" onclick = "note();">
            <i class="la la-sticky-note"></i>
            </a>


           
            
            
            
        </div>
        <?php 
        $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right edit_invoices','id' => 'm_form_1','enctype'=>'multipart/form-data'); 
        echo form_open('company/invoices/edit/',$form_data); 
        ?> 
        <div class="modal-body">
        
       
       
            <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group m-form__group row" style="margin-bottom: 5px;">
                            <div class="col-form-label-right d-block w-100 mb-1">
                                        <?php echo $this->lang->line('label_customer'); ?>:
                                        <span style = "display:none;" id = "edit_save_cancel_add_customer">
                                            <a href = "javascript:void(0);" class = "btn btn-info float-right btn-sm" id = "edit_cancel_customer" >
                                            <?php echo $this->lang->line('label_cancel'); ?>
                                            </a>

                                            <a href = "javascript:void(0);" class = "btn btn-info float-right btn-sm" id = "edit_add_new_customer" style = "margin-right: 11px;">
                                            <?php echo $this->lang->line('label_save'); ?>
                                            </a>
                                        </span>
                                        
                            </div>
                                            
                                            <!-- <div class="m-typeahead"> -->
                                            <input type="text" class="form-control m-input" name="edit_customer_id" id="edit_customer_id" placeholder="<?php echo $this->lang->line('label_customer'); ?>" value="<?php echo set_value('edit_customer_id'); ?>">
                                            
                                            <input type="hidden" name="edit_text_customer_id" id="edit_text_customer_id" value="<?php if(!empty($result['customer_id'])) echo $result['customer_id']; else echo set_value('edit_text_customer_id'); ?>" maxlength="20">
                                            <!-- </div> -->
                                            <?php echo form_error('customer_id'); ?>
                                        </div> 
                                        <div id="edit_customer_details" class="modal-form-block"> 
                                        <div class="form-group m-form__group row"> 
                                         <div class="col-xl-6 col-lg-6">
                                         <input type="text" class="form-control m-input " name="edit_customer_fname" id="edit_customer_fname" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php  if(!empty($result['customer_data']['fname'])) echo $result['customer_data']['fname']; else echo set_value('edit_customer_fname'); ?>" maxlength="64" required="">
                                                    <?php echo form_error('edit_customer_fname'); ?>

                                                    <input type="text" class="form-control m-input mt-2" name="edit_customer_lname" id="edit_customer_lname" placeholder="<?php echo $this->lang->line('label_last_name'); ?>" value="<?php if(!empty($result['customer_data']['lname'])) echo $result['customer_data']['lname']; else echo set_value('edit_customer_lname'); ?>" maxlength="64"  required="">
                                                    <?php echo form_error('edit_customer_lname'); ?>
                                        
                                                    <input type="text" class="form-control m-input mt-2" name="edit_customer_address_1" id="edit_customer_address_1" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php  if(!empty($result['customer_data']['address_line1'])) echo $result['customer_data']['address_line1']; else echo set_value('edit_customer_address'); ?>"  required="">
                                                    <input type="hidden" name="edit_customer_latitude" id="edit_customer_latitude" value="<?php if(!empty($result['customer_data']['latitude'])) echo $result['customer_data']['latitude']; else echo set_value('edit_customer_latitude'); ?>">
                                                    <input type="hidden" name="edit_customer_longitude" id="edit_customer_longitude" value="<?php if(!empty($result['customer_data']['longitude'])) echo $result['customer_data']['longitude']; else echo set_value('edit_customer_longitude'); ?>">
                                                    <?php echo form_error('edit_customer_address'); ?>

                                        <input type="text" class="form-control m-input mt-2" name="edit_customer_address_2" id="edit_customer_address_2" placeholder="<?php echo $this->lang->line('label_address'); ?> *" value="<?php echo $result['customer_data']['address_line2'] ?>" >

                                       

                                       

                                        
                                        <input type="text" class="form-control m-input mt-2" name="edit_customer_city" id="edit_customer_city" placeholder="<?php echo $this->lang->line('label_city'); ?>" value="<?php if(!empty($result['customer_data']['city'])) echo $result['customer_data']['city']; else echo set_value('customer_city'); ?>" maxlength="64"  required="">
                                                    <?php echo form_error('edit_customer_city'); ?>

                                        
                                    
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        
                                    <input type="text" class="form-control m-input" name="edit_customer_state" id="edit_customer_state" placeholder="<?php echo $this->lang->line('label_state'); ?>" value="<?php if(!empty($result['customer_data']['state'])) echo $result['customer_data']['state']; else echo set_value('edit_customer_state'); ?>" maxlength="64"  required="">
                                                    <?php echo form_error('edit_customer_state'); ?>

                                                    <input type="text" class="form-control m-input mt-2" name="edit_customer_zipcode" id="edit_customer_zipcode" placeholder="<?php echo $this->lang->line('label_zipcode'); ?>" value="<?php if(!empty($result['customer_data']['zipcode'])) echo $result['customer_data']['zipcode']; else echo set_value('edit_customer_zipcode'); ?>" maxlength="32"  required="">
                                                    <?php echo form_error('edit_customer_zipcode'); ?>

                                                    <input type="text" class="form-control m-input mt-2" name="edit_customer_telephone_number" id="edit_customer_telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php if(!empty($result['customer_data']['telephone_number'])) echo $result['customer_data']['telephone_number']; else echo set_value('edit_customer_telephone_number'); ?>" maxlength="12">
                                                    <?php echo form_error('edit_customer_telephone_number'); ?>
                                         
                                                    <input type="text" class="form-control m-input mt-2" name="edit_customer_cellphone_number" id="edit_customer_cellphone_number" placeholder="<?php echo $this->lang->line('label_cellphone_number'); ?>" value="<?php if(!empty($result['customer_data']['cellphone_number'])) echo $result['customer_data']['cellphone_number']; else echo set_value('edit_customer_cellphone_number'); ?>" maxlength="12">
                                                    <?php echo form_error('edit_customer_cellphone_number'); ?>

                                                    <input type="text" class="form-control m-input  mt-2" name="edit_customer_lic" id="edit_customer_lic" placeholder="<?php echo $this->lang->line('label_lic_id'); ?>" value="<?php echo $result['customer_data']['lic_id']; ?>" maxlength="14">
                                                    <?php echo form_error('customer_lic'); ?>
                                    
                                    </div>
                                </div>

                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group m-form__group row" id="div_shipto_id" style="margin-bottom: 5px;">
                                        <div class="col-form-label-right d-block w-100 mb-1">
                                            <?php echo $this->lang->line('label_ship_to'); ?>:
                                        <span style = "display:none;" id = "edit_save_cancel_add_shipto">
                                            <a href = "javascript:void(0);" class = "btn btn-info float-right btn-sm" id = "edit_cancel_shipto">
                                            <?php echo $this->lang->line('label_cancel'); ?>
                                            </a>

                                            <a href = "javascript:void(0);" class = "btn btn-info float-right btn-sm"  id = "edit_add_new_shipto" style = "margin-right: 11px;">
                                            <?php echo $this->lang->line('label_add'); ?>
                                            </a>
                                        </span>
                                        </div>

                                            

                                            <input type = "text" class ="form-control m-input" name="edit_shipto_id" id="edit_shipto_id" placeholder="<?php echo $this->lang->line('label_ship_to'); ?>" disabled>

                                            <input type = "hidden" id =  "edit_text_shipto_id" name = "edit_shipto_id" value = "<?php echo $result['shipto_id']; ?>">

                                            <?php echo form_error('edit_shipto_id'); ?>
                                        </div> 
                                        <div id="edit_shipto_details" class="modal-form-block"> 

                                        <div class="form-group m-form__group row">                                                 
                                         <div class="col-xl-6 col-lg-6">
                                         <input type="text" class="form-control m-input" name="edit_shipto_fname" id="edit_shipto_fname" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php if(!empty($result['shipto_data']['fname'])) echo $result['shipto_data']['fname']; else echo set_value('edit_shipto_fname'); ?>" maxlength="64"  required="">
                                                    <?php echo form_error('edit_shipto_fname'); ?>
                                            
                                            
                                                    <input type="text" class="form-control m-input mt-2" name="edit_shipto_lname" id="edit_shipto_lname" placeholder="<?php echo $this->lang->line('label_last_name'); ?>" value="<?php if(!empty($result['shipto_data']['lname'])) echo $result['shipto_data']['lname']; else echo set_value('edit_shipto_lname'); ?>" maxlength="64"  required="">
                                                    <?php echo form_error('edit_shipto_lname'); ?>
                                            
                                        
                                        
                                                    <input type="text" class="form-control m-input mt-2" name="edit_shipto_address" id="edit_shipto_address" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php if(!empty($result['shipto_data']['address'])) echo $result['shipto_data']['address']; else echo set_value('edit_shipto_address'); ?>"  required="">
                                                    <input type="hidden" name="edit_shipto_latitude" id="edit_shipto_latitude" value="<?php if(!empty($result['shipto_data']['latitude'])) echo $result['shipto_data']['latitude']; else echo set_value('edit_shipto_latitude'); ?>">
                                                    <input type="hidden" name="edit_shipto_longitude" id="edit_shipto_longitude" value="<?php if(!empty($result['shipto_data']['longitude'])) echo $result['shipto_data']['longitude']; else echo set_value('edit_shipto_longitude'); ?>">
                                                    <?php echo form_error('edit_shipto_address'); ?>

                                            
                                               <input type="text" class="form-control m-input mt-2" name="edit_shipto_address_1" id="edit_shipto_address_1" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php if(!empty($result['shipto_data']['address_line1'])) echo $result['shipto_data']['address_line1']; else echo set_value('edit_shipto_address_1'); ?>" > 
                                                    <?php echo form_error('edit_shipto_address_1'); ?>


                                                <input type="text" class="form-control m-input mt-2" name="edit_shipto_address_2" id="edit_shipto_address_2" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php echo $result['shipto_data']['address_line2']; ?>" > 
                                                <?php echo form_error('shipto_address_1'); ?>
                                        
                                        
                                    
                                       

                                    </div>
                                    
                                                                                
                                    <div class="col-xl-6 col-lg-6">

                                    
                                    <input type="text" class="form-control m-input " name="edit_shipto_sector" id="edit_shipto_sector" placeholder="<?php echo $this->lang->line('label_sector'); ?> *" value="<?php echo  $result['shipto_data']['sector']; ?>" maxlength="64"  required="">
                                    <?php echo form_error('shipto_sector'); ?>

                                        <input type="text" class="form-control m-input mt-2" name="edit_shipto_province" id="edit_shipto_province" placeholder="<?php echo $this->lang->line('label_province'); ?> *" value="<?php echo  $result['shipto_data']['province']; ?>" maxlength="64"  required="">
                                        <?php echo form_error('shipto_province'); ?>
                                    
                                        
                                    
                                        <input type="text" class="form-control m-input mt-2" name="edit_shipto_telephone_number" id="edit_shipto_telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php if(!empty($result['shipto_data']['telephone_number'])) echo $result['shipto_data']['telephone_number']; else echo set_value('edit_shipto_telephone_number'); ?>" maxlength="18" >
                                                    <?php echo form_error('edit_shipto_telephone_number'); ?>
                                   
                                   
                                                    <input type="text" class="form-control m-input mt-2" name="edit_shipto_cellphone_number" id="edit_shipto_cellphone_number" placeholder="<?php echo $this->lang->line('label_cellphone_number'); ?>" value="<?php if(!empty($result['shipto_data']['cellphone_number'])) echo $result['shipto_data']['cellphone_number']; else echo set_value('edit_shipto_cellphone_number'); ?>" maxlength="16">
                                                    <?php echo form_error('edit_shipto_cellphone_number'); ?>                                                    


                                        <input type="text" class="form-control m-input mt-2" name="edit_shipto_lic" id="edit_shipto_lic" placeholder="<?php echo $this->lang->line('label_lic_id'); ?>" value="<?php echo  $result['shipto_data']['lic_id']; ?>" maxlength="18">
                                        <?php echo form_error('shipto_lic'); ?>                                                    
                                    </div>
                                </div> 

                                        </div>
                                    </div>
                                </div>
                                <div id="invoice_details" class="modal-form-block">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    * <?php echo $this->lang->line('label_date'); ?>:
                                                </label>
                                                <div class="col-xl-8 col-lg-8">
                                                    <input type="text" class="form-control m-input" name="edit_date" id="edit_date" placeholder="<?php echo $this->lang->line('label_date'); ?>" value="<?php if(!empty($result['invoice_date'])) echo date('m/d/Y',strtotime($result['invoice_date'])); else echo set_value('edit_date'); ?>" required="">
                                                    <?php echo form_error('edit_date'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    <?php echo $this->lang->line('label_due_date'); ?>:
                                                </label>
                                                <div class="col-xl-8 col-lg-8">
                                                    <input type="text" class="form-control m-input" name="edit_due_date" id="edit_due_date" placeholder="<?php echo $this->lang->line('label_due_date'); ?>" value="<?php if(!empty($result['duedate'])) echo date('m/d/Y',strtotime($result['duedate'])); else echo set_value('edit_due_date'); ?>" >
                                                    <?php echo form_error('edit_due_date'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    * <?php echo $this->lang->line('label_user'); ?>:
                                                </label>
                                                <div class="col-xl-8 col-lg-8">
                                                    <input type="text" class="form-control m-input" name="edit_user" id="edit_user" placeholder="<?php echo $this->lang->line('label_user'); ?>" value="<?php echo $this->username; ?>" required="">
                                                    <?php echo form_error('edit_user'); ?>
                                                </div>
                                            </div>                                            
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    <?php echo $this->lang->line('label_misc'); ?>:
                                                </label>
                                                <div class="col-xl-8 col-lg-8">
                                                    <input type="text" class="form-control m-input" name="edit_misc" id="edit_misc" placeholder="<?php echo $this->lang->line('label_misc'); ?>" value="<?php if(!empty($result['misc'])) echo $result['misc']; else echo set_value('edit_misc'); ?>" >
                                                    <?php echo form_error('edit_misc'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    * <?php echo $this->lang->line('label_invoice_hash'); ?>:
                                                </label>
                                                <div class="col-xl-8 col-lg-8">
                                                    <input type="text" class="form-control m-input" name="edit_invoice_hash" id="edit_invoice_hash" placeholder="<?php echo $this->lang->line('label_invoice_hash'); ?>" value="<?php if(!empty($result['invoice_number'])) echo $result['invoice_number']; else echo set_value('edit_invoice_hash'); ?>"  required="">
                                                    <?php echo form_error('edit_invoice_hash'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    <?php echo $this->lang->line('label_agent_invoice'); ?>:
                                                </label>
                                                <div class="col-xl-8 col-lg-8">
                                                    <input type="text" class="form-control m-input" name="edit_agent_invoice" id="edit_agent_invoice" placeholder="<?php echo $this->lang->line('label_agent_invoice'); ?>" value="<?php if(!empty($result['agent_number'])) echo $result['agent_number']; else echo set_value('edit_agent_invoice'); ?>">
                                                    <?php echo form_error('edit_agent_invoice'); ?>
                                                </div>  
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    *<?php echo $this->lang->line('label_container'); ?>:
                                                </label>                                                
                                                <div class="col-xl-8 col-lg-8">
                                                    <input type="text" class="form-control m-input" name="edit_container" id="edit_container" placeholder="<?php echo $this->lang->line('label_container'); ?>" value="<?php if(!empty($result['container'])) echo $result['container']; else echo set_value('edit_container'); ?>"  required="">
                                                    <?php echo form_error('edit_container'); ?>
                                                </div>
                                            </div>                                            
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    <?php echo $this->lang->line('label_agent'); ?>:
                                                </label>
                                                <div class="col-xl-8 col-lg-8">

                                                <select class="form-control m-input" name="agent" id="agent" style="height: 28px;">
                                                <option value = ""><?php echo $this->lang->line('label_agent_invoice'); ?></option>
                                                <?php foreach($agent_list as $value) {?>
                                                <option value = "<?=$value['id']?>" <?=$result['agent'] == $value['id'] ? "selected" : "" ?>>
                                                    <?=$value['fname'].' '.$value['lname']?>  
                                                </option>
                                           <?php } ?>
                                        </select>

                                                    
                                                    <?php echo form_error('edit_agent'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    * <?php echo $this->lang->line('label_driver'); ?>:
                                                </label>
                                                <div class="col-xl-8 col-lg-8">
                                                    <select class="form-control m-input" name="edit_driver_id" id="edit_driver_id" placeholder="<?php echo $this->lang->line('label_driver'); ?>"  required data-parsley-trigger="focusin focusout" data-parsley-errors-container="#edit_driver_error" style = "height:28px;">
                                                        <option value=""><?php echo $this->lang->line('label_driver'); ?></option>
                                                        <?php 
                                                        if(!empty($driver_list)){
                                                            foreach ($driver_list as $key => $value) {
                                                                ?>
                                                                <option value="<?php echo $value['id']; ?>" <?php if($result['driver_id']==$value['id']){ echo "selected"; } ?> ><?php echo $value['fname']." ".$value['lname']; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <div id="edit_driver_error"></div>
                                                    <?php echo form_error('driver_id'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    * <?php echo $this->lang->line('label_pay_term'); ?>:
                                                </label>
                                                <div class="col-xl-8 col-lg-8">
                                                    
                                               

                                                    <select class="form-control m-input" name="edit_pay_term" id="edit_pay_term" style = "height: 28px;">

                                                        <option value = "USA" <?php echo $result['pay_term']=='USA' ? 'selected':''; ?>>USA</option>
                                                        <option value = "RD"  <?php echo $result['pay_term']=='RD' ? 'selected':''; ?>>RD</option>

                                                    </select>
                                                    
                                                    
                                                    <?php echo form_error('edit_pay_term'); ?>
                                                </div>
                                            </div>                                            
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    * <?php echo $this->lang->line('label_status'); ?>:
                                                </label>
                                                <div class="col-xl-8 col-lg-8">
                                                    <input type="text" class="form-control m-input" name="edit_status" id="edit_status" placeholder="<?php echo $this->lang->line('label_invoice_status'); ?>" value="<?php if(!empty($result['status'])) echo $result['status']; else echo set_value('edit_status'); ?>"  required="">
                                                    <?php echo form_error('edit_status'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    * <?php echo $this->lang->line('label_total_box'); ?>:
                                                </label>
                                                <div class="col-xl-8 col-lg-8">
                                                    <input type="text" class="form-control m-input" name="edit_tot_box" id="edit_tot_box" placeholder="<?php echo $this->lang->line('label_total_box'); ?>" value="<?php if(!empty($result['total_packages'])) echo intval($result['total_packages']); else echo set_value('edit_tot_box', 0); ?>" maxlength="12" readonly  required="" >
                                                    <?php echo form_error('edit_tot_box'); ?>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <!-- <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    * <?php echo $this->lang->line('label_branch'); ?>:
                                                </label>
                                                <div class="col-xl-7 col-lg-7">
                                                    <input type="text" class="form-control m-input" name="branch_id" id="branch_id" placeholder="<?php echo $this->lang->line('label_branch_id'); ?>" value="<?php echo set_value('branch_id'); ?>"  required="">
                                                    <?php echo form_error('branch_id'); ?>
                                                </div>
                                            </div> -->
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    <?php echo $this->lang->line('label_total'); ?>:
                                                </label>
                                                <h5><label class="col-xl-8 col-lg-8 col-form-label text-left" id="edit_total">
                                                    $0.00
                                                </label></h5>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    <?php echo $this->lang->line('label_payments'); ?>:
                                                </label>
                                                <h5><label class="col-xl-8 col-lg-8 col-form-label text-left" id="edit_payments">
                                                    $<?php echo $result['payments'] == '' ? '0.00' :$result['payments']; ?>
                                                </label></h5>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    <?php echo $this->lang->line('label_balance'); ?>:
                                                </label>
                                                <h5><label class="col-xl-8 col-lg-8 col-form-label text-left" id="edit_balance">
                                                    $<?php echo $result['balance'] == '' ? '0.00' :$result['balance']; ?>
                                                    <!-- $0.00 -->
                                                </label></h5>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>

                                <!-- <div id="invoice_status">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label-right">
                                                    <?php echo $this->lang->line('label_invoice_status'); ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <div id="invoice_items" class="modal-form-table-view">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 text-left col-form-label-right">
                                                    <?php echo $this->lang->line('label_item'); ?>
                                                </label>
                                                <label class="col-xl-1 col-lg-1 text-left col-form-label-right">
                                                    <?php echo $this->lang->line('label_qty'); ?>
                                                </label>
                                                <label class="col-xl-1 col-lg-1 text-left col-form-label-right">
                                                    <?php echo $this->lang->line('label_price'); ?>
                                                </label>
                                                <label class="col-xl-1 col-lg-1 text-left col-form-label-right">
                                                    <?php echo $this->lang->line('label_discount'); ?>
                                                </label>
                                                <label class="col-xl-1 col-lg-1 text-left col-form-label-right">
                                                    <?php echo $this->lang->line('label_insurance'); ?>
                                                </label>
                                                <label class="col-xl-1 col-lg-1 text-left col-form-label-right">
                                                    <?php echo $this->lang->line('label_tax'); ?>
                                                </label>
                                                <label class="col-xl-2 col-lg-2 text-left col-form-label-right">
                                                    <?php echo $this->lang->line('label_total'); ?>
                                                </label>
                                                <label class="col-xl-1 col-lg-1 text-left col-form-label-right">
                                                    <?php echo $this->lang->line('label_actions'); ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="edit_invoice_multiple_items" class="mt-0 modal-form-table-row" style="border-top: 0px;">
                                    <?php if(!empty($result['invoice_items']))
                                          {
                                            foreach ($result['invoice_items'] as $key => $value) 
                                            {
                                    ?>
                                    <div class="form-group m-form__group row">
                                        <label class="col-xl-4 col-lg-4 text-left">
                                            <div class="m-typeahead">
                                                <input type="text" class="form-control m-input" name="edit_item[]" id="edit_item_<?php echo $key; ?>" placeholder="<?php echo $this->lang->line('label_item'); ?>" maxlength="128" required="" data-index="<?php echo $key; ?>" value="<?php echo $value['description_1']; ?>">
                                            </div>
                                        </label>
                                        <label class="col-xl-1 col-lg-1 text-left">
                                            <input type="text" class="form-control m-input num" name="edit_qty[]" id="edit_qty<?php echo $key; ?>" placeholder="<?php echo $this->lang->line('label_qty'); ?>" maxlength="8" required="" data-parsley-type="number" min="1" data-index="<?php echo $key; ?>" value="<?php echo $value['qty']; ?>">
                                        </label>
                                        <label class="col-xl-1 col-lg-1 text-left">
                                            <input type="text" class="form-control m-input num" name="edit_price[]" id="edit_price<?php echo $key; ?>" placeholder="<?php echo $this->lang->line('label_price'); ?>" maxlength="14" required="" data-parsley-type="number" min="1" data-index="<?php echo $key; ?>" value="<?php echo $value['rate']; ?>">
                                        </label>
                                        <label class="col-xl-1 col-lg-1 text-left">
                                            <input type="text" class="form-control m-input num" name="edit_discount[]" id="edit_discount<?php echo $key; ?>" placeholder="<?php echo $this->lang->line('label_discount'); ?>" maxlength="14" required=""  data-parsley-type="number" min="0" data-index="<?php echo $key; ?>" value="<?php echo $value['discount']; ?>">
                                        </label>                                        
                                        <label class="col-xl-1 col-lg-1 text-left">
                                            <input type="text" class="form-control m-input num" name="edit_insurance[]" id="edit_insurance<?php echo $key; ?>" placeholder="<?php echo $this->lang->line('label_insurance'); ?>" maxlength="14" required="" data-parsley-type="number" min="0" data-index="<?php echo $key; ?>" value="<?php echo $value['insurance']; ?>">
                                        </label>
                                        <label class="col-xl-1 col-lg-1 text-left">
                                            <input type="text" class="form-control m-input num" name="edit_tax[]" id="edit_tax<?php echo $key; ?>" placeholder="<?php echo $this->lang->line('label_tax'); ?>"  maxlength="14" required=""   data-parsley-type="number" min="0" data-index="<?php echo $key; ?>"  value="<?php echo $value['tax']; ?>">
                                        </label>
                                        <label class="col-xl-2 col-lg-2 text-left">
                                            <input type="text" class="form-control m-input num" name="edit_total[]" id="edit_total<?php echo $key; ?>" placeholder="<?php echo $this->lang->line('label_total'); ?>" maxlength="14" readonly required="" data-parsley-type="number" min="0" data-index="<?php echo $key; ?>" value="<?php echo $value['total_price']; ?>">
                                        </label>
                                        <div class="col-xl-1 col-lg-1">
                                            
                                            <button type="button" class="btn btn-sm 
                                            <?php if($invoice_item_count==$key+1){ echo 'btn-success edit_addMore'; } else{ echo 'btn-danger edit_removeMore'; } ?>" data-index="<?php echo $key; ?>" id="edit_btn_add_remove_<?php echo $key; ?>" onclick="<?php if($invoice_item_count==$key+1){ echo 'edit_add_more_button();'; } else{ echo 'edit_remove_field(this);'; } ?>"><?php if($invoice_item_count==$key+1){ echo '<i class="fa fa-plus"></i>'; } else{ echo '<i class="fa fa-minus"></i>'; } ?></button>
                                            <?php if($invoice_item_count==$key+1){?>
 <button type="button" class="btn btn-sm btn-danger edit_removeMore" data-index="<?php echo $key; ?>" id="edit_btn_add_remove_<?php echo $key; ?>" onclick="<?php echo 'edit_remove_field(this)';?>"> <i class="fa fa-minus"></i> </button> 
                                               <?php } ?>
                                        </div>
                                    </div> 
                                    <?php   }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-xl-2 col-lg-2">
                                    <div class="form-group m-form__group">
                                        <label for="sub_total" class="text-white">
                                            <?php echo $this->lang->line('label_sub_total'); ?>
                                        </label>
                                        <input type="text" class="form-control m-input" name="edit_sub_total" id="edit_sub_total" placeholder="<?php echo $this->lang->line('label_sub_total'); ?>" value="<?php if(!empty($result['sub_total'])) echo $result['sub_total']; else echo set_value('edit_sub_total', '0.00'); ?>"  required="" data-parsley-type="number" min="0" readonly>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2">
                                    <div class="form-group m-form__group">
                                        <label for="sub_total" class="text-white">
                                            <?php echo $this->lang->line('label_tax'); ?>
                                        </label>
                                        <input type="text" class="form-control m-input" name="edit_final_tax" id="edit_final_tax" placeholder="<?php echo $this->lang->line('label_tax'); ?>" value="<?php if(!empty($result['final_tax'])) echo $result['final_tax']; else echo set_value('edit_final_tax', '0.00'); ?>"  required="" data-parsley-type="number" min="0" readonly>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2">
                                    <div class="form-group m-form__group">
                                        <label for="sub_total" class="text-white">
                                            <?php echo $this->lang->line('label_discount'); ?>
                                        </label>
                                        <input type="text" class="form-control m-input" name="edit_final_discount" id="edit_final_discount" placeholder="<?php echo $this->lang->line('label_discount'); ?>" value="<?php if(!empty($result['final_discount'])) echo $result['final_discount']; else echo set_value('edit_final_discount', '0.00'); ?>"  required="" data-parsley-type="number" min="0" readonly>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2">
                                    <div class="form-group m-form__group">
                                        <label for="sub_total" class="text-white">
                                            <?php echo $this->lang->line('label_insurance'); ?>
                                        </label>
                                        <input type="text" class="form-control m-input" name="edit_final_insurance" id="edit_final_insurance" placeholder="<?php echo $this->lang->line('label_insurance'); ?>" value="<?php if(!empty($result['final_insurance'])) echo $result['final_insurance']; else echo set_value('edit_final_insurance', '0.00'); ?>"  required="" data-parsley-type="number" min="0" readonly>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2">
                                    <div class="form-group m-form__group">
                                        <label for="sub_total" class="text-white">
                                            <?php echo $this->lang->line('label_payment'); ?>
                                        </label>                                        
                                        <input type="text" class="form-control m-input" name="edit_final_payment" id="edit_final_payment" placeholder="<?php echo $this->lang->line('label_payment'); ?>" value="<?php if(!empty($result['payments'])) echo $result['payments']; else echo set_value('edit_final_payment', '0.00'); ?>"  required="" data-parsley-type="number" min="0" readonly>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2">
                                    <div class="form-group m-form__group">
                                        <label for="sub_total" class="text-white">
                                            <?php echo $this->lang->line('label_balance'); ?>
                                        </label>
                                        <input type="text" class="form-control m-input" name="edit_final_balance" id="edit_final_balance" placeholder="<?php echo $this->lang->line('label_balance'); ?>" value="<?php if(!empty($result['final_balance'])) echo $result['final_balance']; else echo set_value('edit_final_balance', '0.00'); ?>"  required="" data-parsley-type="number" min="0" readonly>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="edit_invoice_id" value="<?php echo $edit_invoice_id; ?>">
                            <button type="button" class="btn btn-success" onclick="edit_check_submit();">
                                <?php echo $this->lang->line('label_submit'); ?>
                            </button>
                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            
  <style>
 @media (min-width: 1280px){
	.modal#another_popup .modal-lg {
	max-width: 900px;
    padding-top: 178px;
	}
}
  </style>
                <div class="modal fade mm" id="another_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-lg modal-dialog-centered " role="document" id = "another_popup_html">
        
                  </div>
</div>    
            
                <!--begin::Page Snippets -->
        <script type="text/javascript">

$(document).on('click','#edit_typeahead_add_new_shipto',function(){
                            
                            $("#edit_shipto_details input[type = 'text']").prop('disabled',false).val('');
                            $("#edit_shipto_fname").focus();
                            $("#edit_shipto_id").val('');
                            $("#edit_save_cancel_add_shipto").show();

                        });





$(document).on('click','#edit_add_new_customer',function(){
var data = {
    customer_fname:$("#edit_customer_fname").val(),
    customer_lname:$("#edit_customer_fname").val(),
    customer_address_line_1:$("#edit_customer_address_1").val(),
    customer_address_line_2:$("#edit_customer_address_2").val(),
    customer_latitude:$("#edit_customer_latitude").val(),
    customer_longitude:$("#edit_customer_longitude").val(),
    customer_city:$("#edit_customer_city").val(),
    customer_state:$("#edit_customer_state").val(),
    customer_zipcode:$("#edit_customer_zipcode").val(),
    customer_telephone_number:$("#edit_customer_telephone_number").val(),
    customer_cellphone_number:$("#edit_customer_cellphone_number").val(),
    customer_lic:$("#edit_customer_lic").val()
};
var url  = "<?php echo site_url('company/customer/create_invoice_customer')?>";
ajaxCall(url,data,function(response){
    if(response.status == SUCCESS_CODE){
    $("#edit_text_customer_id").val(response.data.id);
    edit_getShiptoList('null');
    }
    getMessage(response.status,response.message);
    return false;
});

return false;
});






$(document).on('click','#edit_add_new_shipto',function(){

    //alert(34);

var data = {

    customer_id:$("#edit_text_customer_id").val(),
    shipto_fname:$("#edit_shipto_fname").val(),
    shipto_lname:$("#edit_shipto_lname").val(),
    shipto_address:$("#edit_shipto_address").val(),
    shipto_address_1:$("#edit_shipto_address_1").val(),
    shipto_address_2:$("#edit_shipto_address_2").val(),
    shipto_latitude:$("#edit_shipto_latitude").val(),
    shipto_longitude:$("#edit_shipto_longitude").val(),
    shipto_province:$("#edit_shipto_province").val(),
    shipto_sector:$("#edit_shipto_sector").val(),
    shipto_telephone_number:$("#edit_shipto_telephone_number").val(),
    shipto_cellphone_number:$("#edit_shipto_cellphone_number").val(),
    shipto_lic:$("#edit_shipto_lic").val(),
    
};
console.log(data);

var url  = "<?php echo site_url('company/customer/create_invoice_shipto')?>";
ajaxCall(url,data,function(response){
    if(response.status == SUCCESS_CODE){
    //$("#shipto_id").val(response.data.id);
    //$('#shipto_id').val($('#shipto_id option[value="'+response.data.id+'"]').val()).trigger('change');
   // edit_get_customer_data($("#edit_text_customer_id").val());
    $("#edit_text_shipto_id").val(response.data.id);
                                //$('#shipto_id').val($('#shipto_id option[value="'+response.data.id+'"]').val()).trigger('change');
   $("#edit_save_cancel_add_shipto").hide();
    }
    getMessage(response.status,response.message);
    return false;
});

return false;
});

$(document).on('click','#edit_cancel_shipto,#edit_cancel_customer',function(){
                            if($(this).attr('id') == 'edit_cancel_customer'){
                                $("#edit_customer_details input[type = 'text']").val('').prop('disabled',true);
                                $("#edit_save_cancel_add_customer").hide();
                                 $("#edit_customer_id").focus();
                            }else{
                            $("#edit_shipto_id").focus();
                            $("#edit_save_cancel_add_shipto").hide();
                            }
                            $("#edit_shipto_details input[type = 'text']").val('').prop('disabled',true);
                        });
                        $(document).on('click','#edit_typeahead_add_new_customer',function(){
                            $("#edit_customer_id").typeahead('close');
                            $("#edit_save_cancel_add_customer").show();
                            $("#edit_customer_details input[type = 'text']").prop('disabled',false).val('');
                            $("#edit_customer_fname").focus();
                            $("#edit_customer_id").val('');
                            $("#edit_shipto_id").off();
                            //$("input[type = 'text']").not("#user,#date,#due_date").val('');
                        });
            
                        $(document).ready(function(){
                            $('.close').click(function() {
                                //alert("test");
                                location.reload();
                            });
                           $('.form-control .m-input').click(function() {
                                var nameId = $(this).attr("data-index");
                                //alert(nameId);
                               edit_item_popup(nameId);

                            });
                           var len = $('#edit_invoice_multiple_items .row').length;
                           $('#edit_item_1').click(function() {
                                var nameId = $(this).attr("data-index");
                                //alert(nameId);
                               edit_item_popup(nameId);

                            });
                           $('#edit_item_2').click(function() {
                                var nameId = $(this).attr("data-index");
                                //alert(nameId);
                               edit_item_popup(nameId);

                            });
                           $('#edit_item_3').click(function() {
                                var nameId = $(this).attr("data-index");
                                //alert(nameId);
                               edit_item_popup(nameId);

                            });
                           $('#edit_item_4').click(function() {
                                var nameId = $(this).attr("data-index");
                                //alert(nameId);
                               edit_item_popup(nameId);

                            });
                           $('#edit_item_5').click(function() {
                                var nameId = $(this).attr("data-index");
                                //alert(nameId);
                               edit_item_popup(nameId);

                            });
                           $('#edit_item_6').click(function() {
                                var nameId = $(this).attr("data-index");
                                //alert(nameId);
                               edit_item_popup(nameId);

                            });
                            $('#edit_invoice_multiple_items > * > label.col-xl-4.col-lg-4.text-left > div > span > input').click(function() {
                                var nameId = $(this).attr("data-index");
                                //alert(nameId);
                               edit_item_popup(nameId);

                            });
                            $('#edit_invoice_multiple_items > div:nth-child(2) > label.col-xl-4.col-lg-4.text-left > div > input').click(function() {
                                var nameId = $(this).attr("data-index");
                                //alert(nameId);
                               edit_item_popup(nameId);

                            });
                            $('.m-typeahead > input').click(function() {
                                var nameId = $(this).attr("data-index");
                                //alert(nameId);
                               edit_item_popup(nameId);

                            });
                            $('#edit_invoice_multiple_items > div:nth-child(3) > label.col-xl-4.col-lg-4.text-left > div > input').click(function() {
                                var nameId = $(this).attr("data-index");
                                //alert(nameId);
                               edit_item_popup(nameId);

                            });
                            $('#edit_invoice_multiple_items > * > label:nth-child(2) > input').click(function() {
                               var qtyId = $(this).attr("id");
                                $('input[id='+qtyId+']').on("change", function(e){
                                    edit_calculation($(this).data("index"));
                                });

                            });
                            $('#edit_invoice_multiple_items > * > label:nth-child(3) > input').click(function() {
                               var priceId = $(this).attr("id");
                               $(' input[id='+priceId+']').on("change", function(e){
                                    edit_calculation($(this).data("index"));
                                });

                            });
                            $('#edit_invoice_multiple_items > * > label:nth-child(4) > input').click(function() {
                               var disId = $(this).attr("id");
                               $('input[id='+disId+']').on("change", function(e){
                                    edit_calculation($(this).data("index"));
                                });

                            });
                            $('#edit_invoice_multiple_items > * > label:nth-child(5) > input').click(function() {
                               var insId = $(this).attr("id");
                               $('input[id='+insId+']').on("change", function(e){
                                    edit_calculation($(this).data("index"));
                                });

                            });
                            $('#edit_invoice_multiple_items > * > label:nth-child(6) > input').click(function() {
                               var taxId = $(this).attr("id");
                                $('input[id='+taxId+']').on("change", function(e){
                                    edit_calculation($(this).data("index"));
                                });

                            });
                   $("#edit_date").datepicker({
                    autoclose: true
                   }).on('changeDate', function(ev){
           // set the "toDate" start to not be later than "fromDate" ends:
            var newDate = new Date(ev.date);
            newDate.setDate(newDate.getDate()+30);
            let d = newDate.getDate() < 10 ? '0'+newDate.getDate() : newDate.getDate();
            let m = newDate.getMonth()+1;
            m = m < 10 ? '0'+m : m;
            let y = newDate.getFullYear();
            //alert(m+'/'+d+'/'+y);
             $("#edit_due_date").val(m+'/'+d+'/'+y);
           $('#edit_due_date').datepicker('setStartDate',newDate);
              })
                      $("#edit_due_date").datepicker({
                                    autoclose: true,
                                }).datepicker("setDate", "+30d");
               });

            var is_submited = 0;

            /* function for check allow submit form */
            function edit_check_submit(argument) {
                is_submited = 1;
                $('.edit_invoices').parsley().validate();
                if($('.edit_invoices').parsley().isValid()){
                    /*console.log($('.edit_invoices').serialize());*/
                    $.ajax({
                        url:  "<?php echo base_url(); ?>company/invoices/edit/",
                        type: "POST",
                        data: $('.edit_invoices').serialize(),
                        success: function(data)
                        {
                            //console.log(data);
                            if(data.code == "1"){
                                location.reload(); 
                            } else {
                                edit_show_error(data.message);
                            }
                        },
                            error: function(jqXHR, textStatus, errorThrown){                
                        },
                            complete: function(){
                        }
                    }); // END OF AJAX CALL
                }
                
            }


            function edit_getShiptoList(id){

                $('#edit_shipto_id').off();
var e = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace("name"),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        cache: false,
        url: '<?php echo base_url('company/invoices/get_customer_shipto') ?>/'+id,
        filter: function (data) {
            return data;
        }
    }
});

$("#edit_shipto_id").typeahead(null,{
    name: "best-pictures",
    display: "name",
    valueKey: "id",
    source: e,
    limit: Infinity,
    templates: {

        suggestion: Handlebars.compile("<div style = 'font-weight: bold;'>{{fname}} {{lname}} {{address_line1}} {{address_line2}}</div>"),
        footer:'<div><a href="javascript:void(0);" class="btn btn-info btn-sm" id="edit_typeahead_add_new_shipto">Add New Shipto</a><div>',
        notFound:'<div><a href="javascript:void(0);" class="btn btn-info btn-sm" id="edit_typeahead_add_new_shipto">Add New Shipto</a><div>',
    }
}).on('typeahead:selected', function (e, suggestion, name) {
    $("#edit_shipto_details input[type = 'text']").prop('disabled',false);
    
    edit_get_shipto_data(suggestion.id)

    console.log(name);
    //console.log($(this).closest("div").find("input[id^=item_]").val());
}); 

}

function edit_clear_form(){
                            
                            
                            $("#edit_customer_details input[type = 'text']").prop('disabled',true);
                            $("#edit_shipto_details input[type = 'text']").val('').prop('disabled',true);
                            $('input[type = "text"]').attr('data-parsley-error-message',"");
                            $("#edit_driver_id").attr('data-parsley-error-message',"");
                            $("#edit_save_cancel_add_customer").hide();
                            $("#edit_save_cancel_add_shipto").hide();
                            edit_item_popup('0');

                            }

            jQuery(document).ready(function() {
                // alert("test 4");
                /* parsley validation */
                $('.edit_invoices').parsley();
                var sum=0;
                sum="<?php echo $result['sub_total']; ?>";     
                $('#edit_total').html("$"+sum);
            }); 
            
            $('.m-scrollable').data('max-height', screen.height*0.6);
            

            $("#edit_customer_telephone_number, #edit_customer_cellphone_number").on('change', function() {
                if ($("#edit_customer_telephone_number").val().length > 0 ||
                    $("#edit_customer_cellphone_number").val().length > 0)
                {
                    // If any field is filled, remove required attr
                    $("#edit_customer_telephone_number, #edit_customer_cellphone_number").removeAttr("required");
                } else {
                    // if all fields are empty, set attr required
                    $("#edit_customer_telephone_number, #edit_customer_cellphone_number").attr("required", "required");
                }
                // destroy ParsleyForm instance
                $('.edit_invoices').parsley().destroy();
                
                // bind parsley
                $('.edit_invoices').parsley();

                if(is_submited)
                    $('.edit_invoices').parsley().validate();
            });

            /* select 2 */
            $(document).ready(function() {
                //alert("test 5");
                // $("#edit_shipto_id").select2({
                //     dropdownParent: $("#edit_invoice_model")
                // });
                // $("#edit_driver_id").select2({
                //     dropdownParent: $("#edit_invoice_model")
                // });

                edit_item_popup(0);
            });
            

            /* input mask */
            var Inputmask = {
                init: function() {
                    $("#edit_customer_telephone_number").inputmask("mask", {
                        mask: "999-999-9999"
                    }), $("#edit_customer_cellphone_number").inputmask("mask", {
                        mask: "999-999-9999"
                    }), $("#edit_shipto_telephone_number").inputmask("mask", {
                        mask: "999-999-9999"
                    }), $("#edit_shipto_cellphone_number").inputmask("mask", {
                        mask: "999-999-9999"
                    })
                }
            };
        
           
            jQuery(document).ready(function() {
           //alert("test 1");
                getMapPickup('edit_customer_address_1','edit_customer_state','edit_customer_city','edit_customer_zipcode');
                getMapPickup('edit_shipto_address','edit_shipto_sector','edit_shipto_province','');
                /*$("#edit_date").datepicker("setDate", new Date());*/
            });
            

            
 
            jQuery(document).ready(function() {
 //alert("test 2");
                var e = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.obj.whitespace("name"),
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    remote: {
                        'cache': false,
                        url: '<?php echo base_url('company/invoices/get_customer_list_json') ?>/%QUERY',
                        wildcard: '%QUERY',
                        filter: function (data) {
                            return data;
                        }
                    }
                });
                $("#edit_customer_id").typeahead(null,{
        name: "best-pictures",
        display: "name",
        valueKey: "id",
        source: e,
        limit: Infinity,
        templates: {
            suggestion: Handlebars.compile("<div style = 'font-weight: bold;'>{{name}},&nbsp;&nbsp;&nbsp;{{address_line1}},&nbsp;&nbsp;&nbsp;{{city}},&nbsp;&nbsp;&nbsp;{{telephone_number}})</div>"),
            footer:'<div><a href="javascript:void(0);" class="btn btn-info btn-sm" id="edit_typeahead_add_new_customer">Add New Customer</a><div>',
            notFound:'<div><a href="javascript:void(0);" class="btn btn-info btn-sm" id="edit_typeahead_add_new_customer">Add New Customer</a><div>',
        }
    }).on('typeahead:selected', function (e, suggestion, name) {
        
        edit_clear_form();
        $("#edit_customer_details input[type = 'text']").prop('disabled',false);
        
        edit_get_customer_data(suggestion.id);


        console.log(name);
        //console.log($(this).closest("div").find("input[id^=item_]").val());
    }); 
            });

            //$('#customer_id').on('select2:select', function (e) {
            function edit_get_customer_data(id){
                
                $.ajax({
                    url:  "<?php echo base_url(); ?>company/invoices/get_customer_data/"+id,
                    type: "GET",
                    success: function(data)
                    {
                        data = JSON.parse(data);
                        console.log(data);
                        if(data.result){
                            $("#edit_text_customer_id").val(data.result.id);
                            $("#edit_customer_fname").val(data.result.fname);
                            $("#edit_customer_lname").val(data.result.lname);
                            $("#edit_customer_email").val(data.result.email);
                            $("#edit_customer_address").val(data.result.address_line1);
                            $("#edit_customer_address_1").val(data.result.address_line2);
                            $("#edit_customer_latitude").val(data.result.latitude);
                            $("#edit_customer_longitude").val(data.result.longitude);
                            $("#edit_customer_city").val(data.result.city);
                            $("#edit_customer_state").val(data.result.state);
                            $("#edit_customer_country").val(data.result.country);
                            $("#edit_customer_zipcode").val(data.result.zipcode);
                            $("#edit_customer_borough").val(data.result.borough);
                            $("#edit_customer_telephone_number").val(data.result.telephone_number);
                            $("#edit_customer_cellphone_number").val(data.result.cellphone_number);

                            $("#edit_customer_lic").val(data.result.lic_id);
                            $("#edit_customer_address_1").val(data.result.address_line2);
                            $("#edit_shipto_id").prop('disabled',false);
                            edit_getShiptoList(id);
                        } else {
                            $("#edit_customer_details input[type = 'text']").val('');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){ 
                        $("#edit_customer_details input[type = 'text']").val('');
                    },
                    complete: function(){
                        if ($("#edit_customer_telephone_number").val().length > 0 ||
                            $("#edit_customer_cellphone_number").val().length > 0)
                        {
                            // If any field is filled, remove required attr
                            $("#edit_customer_telephone_number, #edit_customer_cellphone_number").removeAttr("required");
                        } else {
                            // if all fields are empty, set attr required
                            $("#edit_customer_telephone_number, #edit_customer_cellphone_number").attr("required", "required");
                        }
                    }
                }); // END OF AJAX CALL

                // $.ajax({
                //     url:  "<?php echo base_url(); ?>company/invoices/get_customer_shipto/"+id,
                //     type: "GET",
                //     success: function(data)
                //     {
                //         $("#edit_shipto_id").empty().append(new Option("<?php echo $this->lang->line('label_ship_to'); ?>", ""));
                //         data = JSON.parse(data);                         
                //         if(data.result){
                //             var first = "";
                //             $.each(data.result, function() {
                //                 $("#edit_shipto_id").append(new Option(this.fname + " " +this.lname , this.id));
                //                 if(first == ""){
                //                    first = this.id;
                //                 }
                //             });
                //         }
                //         $('#edit_shipto_id').val($('#edit_shipto_id option[value="'+first+'"]').val()).trigger('change');

                //         edit_get_shipto_data();
                //     },
                //     error: function(jqXHR, textStatus, errorThrown){ 

                //     },
                //     complete: function(){
                //     }
                // }); // END OF AJAX CALL
            }

            /* get ship to details */
            // $('#edit_shipto_id').on('select2:select', function (e) {
            //     edit_get_shipto_data();
            // });

            function edit_get_shipto_data(id){
                $.ajax({
                    url:  "<?php echo base_url(); ?>company/invoices/get_shipto_data/"+id,
                    type: "GET",
                    success: function(data)
                    {
                        data = JSON.parse(data);
                        console.log(data);
                        if(data.result){
                            $("#edit_text_shipto_id").val(data.result.id);
                            $("#edit_shipto_fname").val(data.result.fname);
                            $("#edit_shipto_lname").val(data.result.lname);
                            $("#edit_shipto_address").val(data.result.address);
                            $("#edit_shipto_address_1").val(data.result.address_line1);
                            $("#edit_shipto_address_2").val(data.result.address_line2);
                            $("#edit_shipto_latitude").val(data.result.latitude);
                            $("#edit_shipto_longitude").val(data.result.longitude);
                            $("#edit_shipto_city").val(data.result.city);
                            $("#edit_shipto_state").val(data.result.state);
                            $("#edit_shipto_country").val(data.result.country);
                            $("#edit_shipto_zipcode").val(data.result.zipcode);
                            $("#edit_shipto_telephone_number").val(data.result.telephone_number);
                            $("#edit_shipto_cellphone_number").val(data.result.cellphone_number);
                            $("#edit_shipto_province").val(data.result.province);
                            $("#edit_shipto_sector").val(data.result.sector);
                            $("#edit_shipto_lic").val(data.result.lic_id);
                        } else {
                            $("#edit_text_shipto_id").val("<?php echo $next_shipto_id; ?>");
                            $("#edit_shipto_details input[type = 'text']").prop('disabled',false).val('');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){ 
                        $("#edit_text_shipto_id").val("<?php echo $next_shipto_id; ?>");
                        $("#edit_shipto_details input[type = 'text']").prop('disabled',false).val('');           
                    },
                    complete: function(){
                        if(is_submited){
                            $('.edit_invoices').parsley().validate()
                        }
                    }
                }); // END OF AJAX CALL
            }
            
            var edit_x = "<?php echo $invoice_item_count; ?>"; //initialize counter for text box                        
            //var edit_x = 1; //initialize counter for text box                        
$(document).on('click','.edit_addMore',function(){
    //alert(323);
    //$(this).hide();
     var cla = $(this).parent().parent().attr('class').split(' ');
    //console.log($(this).parent().parent().attr('class'));
     if(cla[2] == 'row'){
      $(this).hide();
    } 
     
      if(cla[3] == 'edit_alldiv'){
       $(this).show();
      }
    var string = edit_add_more_button();
    //console.log(string[1]);
    $('.edit_childRemove').remove();
    $("#edit_invoice_multiple_items").append(string[0]);
    edit_item_popup(string[1]);
    edit_x++;
    //$(this).removeClass('edit_addMore btn-success').addClass('edit_removeMore btn-danger').html('<i class="fa fa-minus"></i>');
    $(this).removeClass('edit_addMore btn-success').addClass('edit_removeMore btn-danger').html('<i class="fa fa-minus"></i>');
   
    //$("#edit_tot_box").val($('.edit_removeMore').length);

});




$(document).on('click','.edit_removeMore',function(){
    var cla = $(".edit_removeMore").parent().parent().attr('class').split(' ');
    
     if(cla[2] == 'row'){
       if($('#edit_invoice_multiple_items').children().find('.edit_addMore').length == 1){
         //alert("Plus Button");
        
       }else{
         //alert("NO Plus Button");
            var newcontent = '<button type="button" class="btn btn-sm  btn-success edit_addMore" data-index="4" id="edit_btn_add_remove_4" onclick="edit_add_more_button();"><i class="fa fa-plus"></i></button><button type="button" class="btn btn-sm btn-danger edit_removeMore" data-index="4" id="edit_btn_add_remove_4" onclick="edit_remove_field(this)"> <i class="fa fa-minus"></i> </button> ';
            var lastchi = $('#edit_invoice_multiple_items div:last').html(newcontent);
        }
    }

    $(this).find('#edit_invoice_multiple_items > * > div.btn-success');
    $(this).closest('.edit_alldiv').remove();
     $(this).removeAttr("onclick");
    if($('.edit_alldiv').length == 1 && $('div#edit_invoice_multiple_items .row').length==1){
        $('.edit_removeMore').addClass('edit_addMore btn-success').removeClass('edit_removeMore btn-danger').html('<i class="fa fa-plus"></i>'); 
        edit_calculation($(this).data("index"));
        return true;
    }
    $('.edit_manage:last').html('<button type="button" class="btn btn-sm btn-success edit_addMore" ><i class="fa fa-plus"></i>' 
                                        +'</button>'
                                        + '<button type="button" class="btn btn-sm btn-danger edit_removeMore edit_childRemove"><i class="fa fa-minus"></i>' 
                                        +'</button>');

    if($('.edit_alldiv').length == 0){
        $('.edit_manage:last').html('<button type="button" class="btn btn-sm btn-success edit_addMore" ><i class="fa fa-plus"></i>' 
                                        +'</button>'
                                        + '<button type="button" class="btn btn-sm btn-danger edit_removeMore edit_childRemove"><i class="fa fa-minus"></i>' 
                                        +'</button>');
    }
    edit_calculation($(this).data("index"));
    
});

            /*var max_fields_limit = 10; //set limit for maximum input fields*/
            
            var edit_y=0;
            function edit_add_more_button()
            {   
                edit_y=edit_x-1;      
                
                /*if (x < max_fields_limit) { //check conditions*/
                   var returnString = '<div class="form-group m-form__group row edit_alldiv">'
                                                + '<label class="col-xl-4 col-lg-4 text-left ">'
                                                    + '<div class="m-typeahead">'
                                                        + '<input type="text" class="form-control m-input" name="edit_item[]" id="edit_item_'+edit_x+'" placeholder="<?php echo $this->lang->line('label_item'); ?>" maxlength="128" required="" data-index="'+edit_x+'" data-index="0">'
                                                    + '</div>'
                                                + '</label>'
                                                + '<label class="col-xl-1 col-lg-1 text-left ">'
                                                   + '<input type="text" class="form-control m-input num" name="edit_qty[]" id="edit_qty'+edit_x+'" placeholder="<?php echo $this->lang->line('label_qty'); ?>" maxlength="8" required="" data-parsley-type="number" min="1" value="1" data-index="'+edit_x+'">'
                                                + '</label>'
                                                + '<label class="col-xl-1 col-lg-1 text-left ">'
                                                    + '<input type="text" class="form-control m-input num" name="edit_price[]" id="edit_price'+edit_x+'" placeholder="<?php echo $this->lang->line('label_price'); ?>"   maxlength="14" required="" data-parsley-type="number" min="1" value="0.00" data-index="'+edit_x+'">'
                                                + '</label>'
                                                + '<label class="col-xl-1 col-lg-1 text-left ">'
                                                    + '<input type="text" class="form-control m-input num" name="edit_discount[]" id="edit_discount'+edit_x+'" placeholder="<?php echo $this->lang->line('label_discount'); ?>"  maxlength="14" required="" data-parsley-type="number" min="0" value="0.00" data-index="'+edit_x+'">'
                                                + '</label>'
                                                + '<label class="col-xl-1 col-lg-1 text-left ">'
                                                    + '<input type="text" class="form-control m-input num" name="edit_insurance[]" id="edit_insurance'+edit_x+'" placeholder="<?php echo $this->lang->line('label_insurance'); ?>"  maxlength="14" required="" data-parsley-type="number" min="0" value="0.00" data-index="'+edit_x+'">'
                                                + '</label>'
                                                + '<label class="col-xl-1 col-lg-1 text-left ">'
                                                    + '<input type="text" class="form-control m-input num" name="edit_tax[]" id="edit_tax'+edit_x+'" placeholder="<?php echo $this->lang->line('label_tax'); ?>"  maxlength="14" required="" data-parsley-type="number" min="0" value="0.00" data-index="'+edit_x+'">'
                                                + '</label>'
                                                + '<label class="col-xl-2 col-lg-2 text-left ">'
                                                    + '<input type="text" class="form-control m-input num" name="edit_total[]" id="edit_total'+edit_x+'" placeholder="<?php echo $this->lang->line('label_total'); ?>"  maxlength="14" required="" readonly  data-parsley-type="number" min="0" value="0.00" data-index="'+edit_x+'">'
                                                + '</label>'
                                                + '<div class="col-xl-1 col-lg-1 edit_manage">'
                                                    + '<button type="button" class="btn btn-sm btn-success edit_addMore" ><i class="fa fa-plus"></i>' 
                                                    +'</button>'
                                                    + '<button type="button" class="btn btn-sm btn-danger edit_removeMore edit_childRemove" ><i class="fa fa-minus"></i>' 
                                                    +'</button>'
                                                 + '</div>'
                                            + '</div>'; //add input field  
                /*}*/
                return [returnString,edit_x];

                
                                     

              //  edit_item_popup(edit_x);

                //edit_x++;
            }
            
            function edit_remove_field(btn)
            {                             
                $(btn).parent().parent('div').remove();
                edit_calculation($(btn).data("index"));                
            }

            /* reinit item dropdown */
            function edit_item_popup(id){

                $("#edit_item_"+id).off();
                var e = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.obj.whitespace("description"),
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    remote: {
                        'cache': false,
                        url: '<?php echo base_url('company/invoices/get_item_list_json') ?>/%QUERY',
                        wildcard: '%QUERY',
                        filter: function (data) {
                            return data;
                        }
                    }
                });
                $("#edit_item_"+id).typeahead(null, {
                    name: "best-pictures",
                    display: "description",
                    /*valueKey: "price"*/
                    source: e,
                    limit: Infinity,
                    templates: {
                        suggestion: Handlebars.compile("<div>{{description}} ({{item_number}})</div>")
                    }
                }).on('typeahead:selected', function (e, suggestion, name) {
                    $('#edit_price'+$(this).data("index")).val(suggestion.price);
                    edit_calculation($(this).data("index"));
                    //console.log($(this).closest("div").find("input[id^=item_]").val());
                }); 


                $('input[id=edit_qty'+id+'], input[id=edit_price'+id+'], input[id=edit_insurance'+id+'], input[id=edit_discount'+id+'], input[id=edit_tax'+id+']').on("change", function(e){
                    //alert("test");
                    edit_calculation($(this).data("index"));
                });

                 
            }

            /* function for calculation */
            function edit_calculation(id) {
                var total = 0;
                total = parseFloat($('#edit_qty'+id).val()) * parseFloat($('#edit_price'+id).val());
                total = total - parseFloat($('#edit_discount'+id).val());
                total = total + parseFloat($('#edit_insurance'+id).val());
                total = total + parseFloat($('#edit_tax'+id).val());
                $('#edit_total'+id).val(total.toFixed(2));

                var sum =0;
                var total_qty = 0;
                $('input[id^=edit_total]').each(function(index, item){
                    var val = $(item).val();
                    if(val){
                        sum+=parseFloat(val);
                    }
                });
                $('#edit_total').html("$"+sum.toFixed(2));
                $('#edit_sub_total').val(sum.toFixed(2));

                $('input[id^=edit_qty]').each(function(index, item){
                    var val = $(item).val();
                    if(val){
                        total_qty+=parseInt(val);
                    }
                });
                $('#edit_tot_box').val(total_qty);
                edit_bottom_calculation();
            }

            $("#edit_sub_total, #edit_final_tax, #edit_final_discount, #edit_final_insurance, #edit_final_payment, #edit_final_balance").on("change", function(){
                edit_bottom_calculation()
            });

            /* function for calculation */
            function edit_bottom_calculation() {
                var sub_total =0;
                $('input[id^=edit_total]').each(function(index, item){
                    var val = $(item).val();
                    if(val){
                        sub_total+=parseFloat(val);
                    }
                });
                $('#edit_total').html("$"+sub_total.toFixed(2));
                $('#edit_sub_total').val(sub_total.toFixed(2));
             

                if($("#edit_final_payment").val()){
                    edit_balance = sub_total - $("#edit_final_payment").val();
                }
                //$('#edit_balance').val(edit_balance.toFixed(2));
                $('#edit_balance').html("$"+edit_balance.toFixed(2));

                var final_tax =0;
                $('input[id^=edit_tax]').each(function(index, item){
                    var val = $(item).val();
                    if(val){
                        final_tax+=parseFloat(val);
                    }
                });
                $('#edit_final_tax').val(final_tax.toFixed(2));

                var final_discount =0;
                $('input[id^=edit_discount]').each(function(index, item){
                    var val = $(item).val();
                    if(val){
                        final_discount+=parseFloat(val);
                    }
                });
                $('#edit_final_discount').val(final_discount.toFixed(2));

                var final_insurance =0;
                $('input[id^=edit_insurance]').each(function(index, item){
                    var val = $(item).val();
                    if(val){
                        final_insurance+=parseFloat(val);
                    }
                });
                $('#edit_final_insurance').val(final_insurance.toFixed(2));

                var final_balance = ((sub_total + final_tax + final_insurance) - final_discount);
                if($("#edit_final_payment").val()){
                    final_balance = sub_total - $("#edit_final_payment").val();
                }
                $('#edit_final_balance').val(final_balance.toFixed(2));
            }

            /* show any error */
            function edit_show_error(message){
                swal({
                  title: '',
                  html: ''+message,
                  type: 'error',
                      //timer: 4000, 
                      confirmButtonColor: '#B92D2E',
                  })
            }


            function payment()
            {
               
                $.ajax({
                        url:  "<?php echo base_url(); ?>company/invoices/get_payment_form/"+$("input[name = 'edit_invoice_id']").val(),
                        type: "GET",
                        success: function(data)
                        {
                            //console.log(data);
                            
                            $("#another_popup_html").html("");
                            $("#another_popup_html").html(data);
                            $('#another_popup').modal('show');
                            //$("#edit_invoice_model").modal('show');

                        },
                            error: function(jqXHR, textStatus, errorThrown){                
                        },
                            complete: function(){
                        }
                    }); 

            }
            function note(){


                $.ajax({
                        url:  "<?php echo base_url(); ?>company/invoices/get_claim_form/"+$("input[name = 'edit_invoice_hash']").val(),
                        type: "GET",
                        success: function(data)
                        {
                            $("#another_popup_html").html("");
                             $("#another_popup_html").html(data);
                            $('#another_popup').modal('show');
                        },
                            error: function(jqXHR, textStatus, errorThrown){                
                        },
                            complete: function(){
                        }
                    }); 


            }

            function mail(email)
            {
                
                $("#customer_email_send").val(email);
                $("#emailModal").modal('show');
            }
        </script>