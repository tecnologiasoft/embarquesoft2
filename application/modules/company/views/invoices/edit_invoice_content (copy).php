 <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                <?php echo $this->lang->line('title_edit_invoices'); ?>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    &times;
                </span>
            </button>
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

                                        <a href = "javascript:void(0);" class = "btn btn-info float-right btn-sm" id = "cancel_customer" >
                                        <?php echo $this->lang->line('label_cancel'); ?>
                                        </a>

                                        <a href = "javascript:void(0);" class = "btn btn-info float-right btn-sm" id = "add_new_customer" style = "margin-right: 11px;">
                                        <?php echo $this->lang->line('label_add'); ?>
                                        </a>
                                        
                            </div>
                                            <!-- <select class="form-control m-input" name="customer_id" id="customer_id" placeholder="<?php echo $this->lang->line('label_customer'); ?>" >
                                                <option value=""><?php echo $this->lang->line('label_customer'); ?></option>
                                                <?php 
                                                    if(!empty($customer_list)){
                                                        foreach ($customer_list as $key => $value) {
                                                ?>
                                                            <option value="<?php echo $value['id']; ?>"><?php echo $value['fname']." ".$$value['lname']." - ".$value['address']; echo (!empty($value['cellphone_number'])) ? " (".$value['cellphone_number'].")": ""; echo (!empty($value['telephone_number'])) ? " (".$value['telephone_number'].")": ""; ?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select> -->
                                            <!-- <div class="m-typeahead"> -->
                                            <input type="text" class="form-control m-input" name="edit_customer_id" id="edit_customer_id" placeholder="<?php echo $this->lang->line('label_customer'); ?>" value="<?php echo set_value('edit_customer_id'); ?>">
                                            
                                            <input type="hidden" name="edit_text_customer_id" id="edit_text_customer_id" value="<?php if(!empty($result['customer_id'])) echo $result['customer_id']; else echo set_value('edit_text_customer_id'); ?>" maxlength="20">
                                            <!-- </div> -->
                                            <?php echo form_error('customer_id'); ?>
                                        </div> 
                                        <div id="customer_details"> 
                                            <div class="form-group m-form__group row"> 
                                                <div class="col-xl-6 col-lg-6">
                                                <input type="text" class="form-control m-input" name="edit_customer_fname" id="edit_customer_fname" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php  if(!empty($result['customer_data']['fname'])) echo $result['customer_data']['fname']; else echo set_value('edit_customer_fname'); ?>" maxlength="64" required="">
                                                    <?php echo form_error('edit_customer_fname'); ?>
                                                </div> 
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control m-input" name="edit_customer_lname" id="edit_customer_lname" placeholder="<?php echo $this->lang->line('label_last_name'); ?>" value="<?php if(!empty($result['customer_data']['lname'])) echo $result['customer_data']['lname']; else echo set_value('edit_customer_lname'); ?>" maxlength="64"  required="">
                                                    <?php echo form_error('edit_customer_lname'); ?>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row"> 
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control m-input" name="edit_customer_address" id="edit_customer_address" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php  if(!empty($result['customer_data']['address'])) echo $result['customer_data']['address']; else echo set_value('edit_customer_address'); ?>"  required="">
                                                    <input type="hidden" name="edit_customer_latitude" id="edit_customer_latitude" value="<?php if(!empty($result['customer_data']['latitude'])) echo $result['customer_data']['latitude']; else echo set_value('edit_customer_latitude'); ?>">
                                                    <input type="hidden" name="edit_customer_longitude" id="edit_customer_longitude" value="<?php if(!empty($result['customer_data']['longitude'])) echo $result['customer_data']['longitude']; else echo set_value('edit_customer_longitude'); ?>">
                                                    <?php echo form_error('edit_customer_address'); ?>
                                                </div>
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control m-input" name="edit_customer_borough" id="edit_customer_borough" placeholder="<?php echo $this->lang->line('label_borough'); ?>" value="<?php  if(!empty($result['customer_data']['borough'])) echo $result['customer_data']['borough']; else echo set_value('edit_customer_borough'); ?>" maxlength="64"  required="">
                                                    <?php echo form_error('edit_customer_borough'); ?>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row"> 
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control m-input" name="edit_customer_city" id="edit_customer_city" placeholder="<?php echo $this->lang->line('label_city'); ?>" value="<?php if(!empty($result['customer_data']['city'])) echo $result['customer_data']['city']; else echo set_value('customer_city'); ?>" maxlength="64"  required="">
                                                    <?php echo form_error('edit_customer_city'); ?>
                                                </div>
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control m-input" name="edit_customer_state" id="edit_customer_state" placeholder="<?php echo $this->lang->line('label_state'); ?>" value="<?php if(!empty($result['customer_data']['state'])) echo $result['customer_data']['state']; else echo set_value('edit_customer_state'); ?>" maxlength="64"  required="">
                                                    <?php echo form_error('edit_customer_state'); ?>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row"> 
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control m-input" name="edit_customer_country" id="edit_customer_country" placeholder="<?php echo $this->lang->line('label_country'); ?>" value="<?php if(!empty($result['customer_data']['country'])) echo $result['customer_data']['country']; else echo set_value('edit_customer_country'); ?>" maxlength="64"  required="">
                                                    <?php echo form_error('edit_customer_country'); ?>
                                                </div>
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control m-input" name="edit_customer_zipcode" id="edit_customer_zipcode" placeholder="<?php echo $this->lang->line('label_zipcode'); ?>" value="<?php if(!empty($result['customer_data']['zipcode'])) echo $result['customer_data']['zipcode']; else echo set_value('edit_customer_zipcode'); ?>" maxlength="32"  required="">
                                                    <?php echo form_error('edit_customer_zipcode'); ?>
                                                </div>
                                            </div>  

                                            <div class="form-group m-form__group row"> 
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control m-input" name="edit_customer_telephone_number" id="edit_customer_telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php if(!empty($result['customer_data']['telephone_number'])) echo $result['customer_data']['telephone_number']; else echo set_value('edit_customer_telephone_number'); ?>" maxlength="14" required="">
                                                    <?php echo form_error('edit_customer_telephone_number'); ?>
                                                </div>
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control m-input" name="edit_customer_cellphone_number" id="edit_customer_cellphone_number" placeholder="<?php echo $this->lang->line('label_cellphone_number'); ?>" value="<?php if(!empty($result['customer_data']['cellphone_number'])) echo $result['customer_data']['cellphone_number']; else echo set_value('edit_customer_cellphone_number'); ?>" maxlength="14" required="">
                                                    <?php echo form_error('edit_customer_cellphone_number'); ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group m-form__group row" id="div_shipto_id" style="margin-bottom: 5px;">
                                            <label class="col-form-label-right">
                                                <?php echo $this->lang->line('label_ship_to'); ?>:
                                            </label>
                                            <select class="form-control m-input" name="edit_shipto_id" id="edit_shipto_id" placeholder="<?php echo $this->lang->line('label_ship_to'); ?>">
                                                <option value=""><?php echo $this->lang->line('label_ship_to'); ?></option> 
                                            </select>
                                            <?php echo form_error('edit_shipto_id'); ?>
                                        </div> 
                                        <div id="shipto_details"> 

                                            <div class="form-group m-form__group row">                                                 
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control m-input" name="edit_shipto_fname" id="edit_shipto_fname" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php if(!empty($result['shipto_data']['fname'])) echo $result['shipto_data']['fname']; else echo set_value('edit_shipto_fname'); ?>" maxlength="64"  required="">
                                                    <?php echo form_error('edit_shipto_fname'); ?>
                                                </div>
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control m-input" name="edit_shipto_lname" id="edit_shipto_lname" placeholder="<?php echo $this->lang->line('label_last_name'); ?>" value="<?php if(!empty($result['shipto_data']['lname'])) echo $result['shipto_data']['lname']; else echo set_value('edit_shipto_lname'); ?>" maxlength="64"  required="">
                                                    <?php echo form_error('edit_shipto_lname'); ?>
                                                </div>
                                            </div> 
                                            <div class="form-group m-form__group row">                                                 
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control m-input" name="edit_shipto_address" id="edit_shipto_address" placeholder="<?php echo $this->lang->line('label_address_1'); ?>" value="<?php if(!empty($result['shipto_data']['address'])) echo $result['shipto_data']['address']; else echo set_value('edit_shipto_address'); ?>"  required="">
                                                    <input type="hidden" name="edit_shipto_latitude" id="edit_shipto_latitude" value="<?php if(!empty($result['shipto_data']['latitude'])) echo $result['shipto_data']['latitude']; else echo set_value('edit_shipto_latitude'); ?>">
                                                    <input type="hidden" name="edit_shipto_longitude" id="edit_shipto_longitude" value="<?php if(!empty($result['shipto_data']['longitude'])) echo $result['shipto_data']['longitude']; else echo set_value('edit_shipto_longitude'); ?>">
                                                    <?php echo form_error('edit_shipto_address'); ?>
                                                </div>
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control m-input" name="edit_shipto_address_1" id="edit_shipto_address_1" placeholder="<?php echo $this->lang->line('label_address_2'); ?>" value="<?php if(!empty($result['shipto_data']['address_line1'])) echo $result['shipto_data']['address_line1']; else echo set_value('edit_shipto_address_1'); ?>" > 
                                                    <?php echo form_error('edit_shipto_address_1'); ?>
                                                </div>
                                            </div> 
                                            <div class="form-group m-form__group row">                                                 
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control m-input" name="edit_shipto_borough" id="edit_shipto_borough" placeholder="<?php echo $this->lang->line('label_borough'); ?>" value="<?php if(!empty($result['shipto_data']['borough'])) echo $result['shipto_data']['borough']; else echo set_value('edit_shipto_borough'); ?>" maxlength="64"  required="">
                                                    <?php echo form_error('edit_shipto_borough'); ?>
                                                </div>
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control m-input" name="edit_shipto_city" id="edit_shipto_city" placeholder="<?php echo $this->lang->line('label_city'); ?>" value="<?php if(!empty($result['shipto_data']['city'])) echo $result['shipto_data']['city']; else echo set_value('edit_shipto_city'); ?>" maxlength="64"  required="">
                                                    <?php echo form_error('edit_shipto_city'); ?>
                                                </div>
                                            </div> 
                                            <div class="form-group m-form__group row">                                                 
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control m-input" name="edit_shipto_state" id="edit_shipto_state" placeholder="<?php echo $this->lang->line('label_state'); ?>" value="<?php if(!empty($result['shipto_data']['state'])) echo $result['shipto_data']['state']; else echo set_value('edit_shipto_state'); ?>" maxlength="64"  required="">
                                                    <?php echo form_error('edit_shipto_state'); ?>
                                                </div>
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control m-input" name="edit_shipto_country" id="edit_shipto_country" placeholder="<?php echo $this->lang->line('label_country'); ?>" value="<?php if(!empty($result['shipto_data']['country'])) echo $result['shipto_data']['country']; else echo set_value('edit_shipto_country'); ?>" maxlength="64"  required="">
                                                    <?php echo form_error('edit_shipto_country'); ?>
                                                    <input type="hidden" name="edit_shipto_zipcode" id="edit_shipto_zipcode" value="<?php if(!empty($result['shipto_data']['zipcode'])) echo $result['shipto_data']['zipcode']; else echo set_value('edit_shipto_zipcode'); ?>">
                                                </div>
                                            </div> 
                                            <div class="form-group m-form__group row"> 
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control m-input" name="edit_shipto_telephone_number" id="edit_shipto_telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php if(!empty($result['shipto_data']['telephone_number'])) echo $result['shipto_data']['telephone_number']; else echo set_value('edit_shipto_telephone_number'); ?>" maxlength="18"  required="">
                                                    <?php echo form_error('edit_shipto_telephone_number'); ?>
                                                </div>
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control m-input" name="edit_shipto_cellphone_number" id="edit_shipto_cellphone_number" placeholder="<?php echo $this->lang->line('label_cellphone_number'); ?>" value="<?php if(!empty($result['shipto_data']['cellphone_number'])) echo $result['shipto_data']['cellphone_number']; else echo set_value('edit_shipto_cellphone_number'); ?>" maxlength="16" required="">
                                                    <?php echo form_error('edit_shipto_cellphone_number'); ?>                                                    
                                                </div>
                                            </div>  

                                        </div>
                                    </div>
                                </div>
                                <div id="invoice_details">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    * <?php echo $this->lang->line('label_date'); ?>:
                                                </label>
                                                <div class="col-xl-8 col-lg-8">
                                                    <input type="text" class="form-control m-input" name="edit_date" id="edit_date" placeholder="<?php echo $this->lang->line('label_date'); ?>" value="<?php if(!empty($result['invoice_date'])) echo date('d/m/Y',strtotime($result['invoice_date'])); else echo set_value('edit_date'); ?>" required="">
                                                    <?php echo form_error('edit_date'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    <?php echo $this->lang->line('label_due_date'); ?>:
                                                </label>
                                                <div class="col-xl-8 col-lg-8">
                                                    <input type="text" class="form-control m-input" name="edit_due_date" id="edit_due_date" placeholder="<?php echo $this->lang->line('label_due_date'); ?>" value="<?php if(!empty($result['duedate'])) echo date('d/m/Y',strtotime($result['duedate'])); else echo set_value('edit_due_date'); ?>" >
                                                    <?php echo form_error('edit_due_date'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    * <?php echo $this->lang->line('label_user'); ?>:
                                                </label>
                                                <div class="col-xl-8 col-lg-8">
                                                    <input type="text" class="form-control m-input" name="edit_user" id="edit_user" placeholder="<?php echo $this->lang->line('label_user'); ?>" value="<?php if(!empty($result['user_name'])) echo $result['user_name']; else echo set_value('edit_user'); ?>" required="">
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
                                                    <input type="text" class="form-control m-input" name="edit_agent" id="edit_agent" placeholder="<?php echo $this->lang->line('label_agent'); ?>" value="<?php  if(!empty($result['agent'])) echo $result['agent']; else echo set_value('edit_agent'); ?>" >
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
                                                    <select class="form-control m-input" name="edit_driver_id" id="edit_driver_id" placeholder="<?php echo $this->lang->line('label_driver'); ?>"  required data-parsley-trigger="focusin focusout" data-parsley-errors-container="#edit_driver_error">
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
                                                    <input type="text" class="form-control m-input" name="edit_pay_term" id="edit_pay_term" placeholder="<?php echo $this->lang->line('label_pay_term'); ?>" value="<?php if(!empty($result['pay_term'])) echo $result['pay_term']; else echo set_value('edit_pay_term'); ?>"  required="">
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
                                                    <input type="text" class="form-control m-input" name="edit_tot_box" id="edit_tot_box" placeholder="<?php echo $this->lang->line('label_total_box'); ?>" value="<?php if(!empty($result['total_packages'])) echo $result['total_packages']; else echo set_value('edit_tot_box', 0); ?>" maxlength="12" readonly  required="" >
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
                                                    $0.00
                                                </label></h5>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                                    <?php echo $this->lang->line('label_balance'); ?>:
                                                </label>
                                                <h5><label class="col-xl-8 col-lg-8 col-form-label text-left" id="edit_balance">
                                                    $0.00
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

                                <div id="invoice_items">
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

                                <div id="edit_invoice_multiple_items">
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
                                            <input type="text" class="form-control m-input" name="edit_qty[]" id="edit_qty<?php echo $key; ?>" placeholder="<?php echo $this->lang->line('label_qty'); ?>" maxlength="8" required="" data-parsley-type="number" min="1" data-index="<?php echo $key; ?>" value="<?php echo $value['qty']; ?>">
                                        </label>
                                        <label class="col-xl-1 col-lg-1 text-left">
                                            <input type="text" class="form-control m-input" name="edit_price[]" id="edit_price<?php echo $key; ?>" placeholder="<?php echo $this->lang->line('label_price'); ?>" maxlength="14" required="" data-parsley-type="number" min="1" data-index="<?php echo $key; ?>" value="<?php echo $value['rate']; ?>">
                                        </label>
                                        <label class="col-xl-1 col-lg-1 text-left">
                                            <input type="text" class="form-control m-input" name="edit_discount[]" id="edit_discount<?php echo $key; ?>" placeholder="<?php echo $this->lang->line('label_discount'); ?>" maxlength="14" required=""  data-parsley-type="number" min="0" data-index="<?php echo $key; ?>" value="<?php echo $value['discount']; ?>">
                                        </label>                                        
                                        <label class="col-xl-1 col-lg-1 text-left">
                                            <input type="text" class="form-control m-input" name="edit_insurance[]" id="edit_insurance<?php echo $key; ?>" placeholder="<?php echo $this->lang->line('label_insurance'); ?>" maxlength="14" required="" data-parsley-type="number" min="0" data-index="<?php echo $key; ?>" value="<?php echo $value['insurance']; ?>">
                                        </label>
                                        <label class="col-xl-1 col-lg-1 text-left">
                                            <input type="text" class="form-control m-input" name="edit_tax[]" id="edit_tax<?php echo $key; ?>" placeholder="<?php echo $this->lang->line('label_tax'); ?>"  maxlength="14" required=""   data-parsley-type="number" min="0" data-index="<?php echo $key; ?>"  value="<?php echo $value['tax']; ?>">
                                        </label>
                                        <label class="col-xl-2 col-lg-2 text-left">
                                            <input type="text" class="form-control m-input" name="edit_total[]" id="edit_total<?php echo $key; ?>" placeholder="<?php echo $this->lang->line('label_total'); ?>" maxlength="14" readonly required="" data-parsley-type="number" min="0" data-index="<?php echo $key; ?>" value="<?php echo $value['total_price']; ?>">
                                        </label>
                                        <div class="col-xl-1 col-lg-1">
                                            <button type="button" class="btn btn-sm <?php if($invoice_item_count==$key+1){ echo 'btn-success'; } else{ echo 'btn-danger'; } ?>" data-index="<?php echo $key; ?>" id="edit_btn_add_remove_<?php echo $key; ?>" onclick="<?php if($invoice_item_count==$key+1){ echo 'edit_add_more_button();'; } else{ echo 'edit_remove_field(this);'; } ?>"><?php if($invoice_item_count==$key+1){ echo '<i class="fa fa-plus"></i>'; } else{ echo '<i class="fa fa-minus"></i>'; } ?></button>
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
                                        <input type="text" class="form-control m-input" name="edit_sub_total" id="edit_sub_total" placeholder="<?php echo $this->lang->line('label_sub_total'); ?>" value="<?php if(!empty($result['sub_total'])) echo $result['sub_total']; else echo set_value('edit_sub_total', '0.00'); ?>"  required="" data-parsley-type="number" min="0">
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2">
                                    <div class="form-group m-form__group">
                                        <label for="sub_total" class="text-white">
                                            <?php echo $this->lang->line('label_tax'); ?>
                                        </label>
                                        <input type="text" class="form-control m-input" name="edit_final_tax" id="edit_final_tax" placeholder="<?php echo $this->lang->line('label_tax'); ?>" value="<?php if(!empty($result['final_tax'])) echo $result['final_tax']; else echo set_value('edit_final_tax', '0.00'); ?>"  required="" data-parsley-type="number" min="0">
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2">
                                    <div class="form-group m-form__group">
                                        <label for="sub_total" class="text-white">
                                            <?php echo $this->lang->line('label_discount'); ?>
                                        </label>
                                        <input type="text" class="form-control m-input" name="edit_final_discount" id="edit_final_discount" placeholder="<?php echo $this->lang->line('label_discount'); ?>" value="<?php if(!empty($result['final_discount'])) echo $result['final_discount']; else echo set_value('edit_final_discount', '0.00'); ?>"  required="" data-parsley-type="number" min="0">
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2">
                                    <div class="form-group m-form__group">
                                        <label for="sub_total" class="text-white">
                                            <?php echo $this->lang->line('label_insurance'); ?>
                                        </label>
                                        <input type="text" class="form-control m-input" name="edit_final_insurance" id="edit_final_insurance" placeholder="<?php echo $this->lang->line('label_insurance'); ?>" value="<?php if(!empty($result['final_insurance'])) echo $result['final_insurance']; else echo set_value('edit_final_insurance', '0.00'); ?>"  required="" data-parsley-type="number" min="0">
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2">
                                    <div class="form-group m-form__group">
                                        <label for="sub_total" class="text-white">
                                            <?php echo $this->lang->line('label_payment'); ?>
                                        </label>                                        
                                        <input type="text" class="form-control m-input" name="edit_final_payment" id="edit_final_payment" placeholder="<?php echo $this->lang->line('label_payment'); ?>" value="<?php if(!empty($result['final_payment'])) echo $result['final_payment']; else echo set_value('edit_final_payment', '0.00'); ?>"  required="" data-parsley-type="number" min="0">
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2">
                                    <div class="form-group m-form__group">
                                        <label for="sub_total" class="text-white">
                                            <?php echo $this->lang->line('label_balance'); ?>
                                        </label>
                                        <input type="text" class="form-control m-input" name="edit_final_balance" id="edit_final_balance" placeholder="<?php echo $this->lang->line('label_balance'); ?>" value="<?php if(!empty($result['final_balance'])) echo $result['final_balance']; else echo set_value('edit_final_balance', '0.00'); ?>"  required="" data-parsley-type="number" min="0">
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
                <!--begin::Page Snippets -->
        <script type="text/javascript">
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

            jQuery(document).ready(function() {
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
                /*$("#customer_id").select2({
                    dropdownParent: $("#new_invoice_model"),
                    minimumInputLength: 1,
                    tags: [],
                    ajax: {
                        url: "<?php echo base_url('company/invoices/get_customer_list_json'); ?>",
                        dataType: 'json',
                        type: "GET",
                        quietMillis: 50,
                        data: function (term) {
                            return {
                                term: term
                            };
                        },
                        processResults: function (data) {
                            return {
                                results: $.map(data, function (item) {
                                    return {
                                        text: item.fname + " " +item.lname + " ("+item.address+") (" + item.telephone_number + ")",
                                        id: item.id
                                    }
                                })
                            }; 
                        }
                    }
                });*/
                $("#edit_shipto_id").select2({
                    dropdownParent: $("#edit_invoice_model")
                });
                $("#edit_driver_id").select2({
                    dropdownParent: $("#edit_invoice_model")
                });

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
                Inputmask.init()
            });  

            /* date picker */
            var BootstrapDatepicker = function() {
                var t = function() {
                    $("#edit_date").datepicker({
                        todayHighlight: !0,
                        orientation: "bottom left",
                        templates: {
                            leftArrow: '<i class="la la-angle-left"></i>',
                            rightArrow: '<i class="la la-angle-right"></i>'
                        },
                        autoclose: true,
                        /*format: "yyyy-mm-dd"*/
                        format: "dd/mm/yyyy"
                    })
                    $("#edit_due_date").datepicker({
                        todayHighlight: !0,
                        orientation: "bottom left",
                        templates: {
                            leftArrow: '<i class="la la-angle-left"></i>',
                            rightArrow: '<i class="la la-angle-right"></i>'
                        },
                        autoclose: true,
                        /*format: "yyyy-mm-dd"*/
                        format: "dd/mm/yyyy"
                    })
                };
                return {
                    init: function() {
                        t()
                    }
                }
            }();
            jQuery(document).ready(function() {
                BootstrapDatepicker.init();
                /*$("#edit_date").datepicker("setDate", new Date());*/
            });
            

            $(document).ready(function()
            {
                var componentForm = {
                    /*street_number: 'short_name',
                    route: 'long_name',*/
                    sublocality_level_1: 'long_name', // borough
                    locality: 'long_name', // city
                    administrative_area_level_1: 'long_name', // State
                    country: 'long_name', // country
                    postal_code: 'short_name' // Zip code
                }; 

                /*geocomplete*/
                $("#edit_customer_address").geocomplete().bind("geocode:result", function(event, result){
                    //console.log(result.address_components);
                    var address_line_1 = "";
                    document.getElementById("edit_customer_latitude").value = result.geometry.location.lat();
                    document.getElementById("edit_customer_longitude").value = result.geometry.location.lng();
                    /*for (var component in componentForm) {
                      document.getElementById("customer_"+component).value = '';
                      document.getElementById("customer_"+component).disabled = false;
                    }*/
                    document.getElementById("edit_customer_borough").value = "";
                    document.getElementById("edit_customer_city").value = "";
                    document.getElementById("edit_customer_state").value = "";
                    document.getElementById("edit_customer_country").value = "";
                    document.getElementById("edit_customer_zipcode").value = "";

                    for (var i = 0; i < result.address_components.length; i++) {
                        var addressType = result.address_components[i].types[0];
                        if (componentForm[addressType]) {
                            var val = result.address_components[i][componentForm[addressType]];
                            if(addressType == "sublocality_level_1"){
                                document.getElementById("edit_customer_borough").value = val;
                            } else if(addressType == "locality"){
                                document.getElementById("edit_customer_city").value = val;
                            } else if(addressType == "administrative_area_level_1"){
                                document.getElementById("edit_customer_state").value = val;
                            } else if(addressType == "country"){
                                document.getElementById("edit_customer_country").value = val;
                            } else if(addressType == "postal_code"){
                                document.getElementById("edit_customer_zipcode").value = val;
                            }
                        }

                        if(addressType == "street_number" || addressType == "route"){
                            address_line_1 = address_line_1 + result.address_components[i]["long_name"]+ ", ";
                        }
                    }
                    $("#edit_customer_address").val(address_line_1.trim());
                });

                /*geocomplete*/
                $("#edit_shipto_address").geocomplete().bind("geocode:result", function(event, result){
                    //console.log(result.address_components);
                    var address_line_1 = "";
                    document.getElementById("edit_shipto_latitude").value = result.geometry.location.lat();
                    document.getElementById("edit_shipto_longitude").value = result.geometry.location.lng();
                    /*for (var component in componentForm) {
                      document.getElementById("shipto_"+component).value = '';
                      document.getElementById("shipto_"+component).disabled = false;
                    }*/
                    document.getElementById("edit_shipto_borough").value = "";
                    document.getElementById("edit_shipto_city").value = "";
                    document.getElementById("edit_shipto_state").value = "";
                    document.getElementById("edit_shipto_country").value = "";
                    document.getElementById("edit_shipto_zipcode").value = "";

                    for (var i = 0; i < result.address_components.length; i++) {
                        var addressType = result.address_components[i].types[0];
                        if (componentForm[addressType]) {
                            var val = result.address_components[i][componentForm[addressType]];
                            if(addressType == "sublocality_level_1"){
                                document.getElementById("edit_shipto_borough").value = val;
                            } else if(addressType == "locality"){
                                document.getElementById("edit_shipto_city").value = val;
                            } else if(addressType == "administrative_area_level_1"){
                                document.getElementById("edit_shipto_state").value = val;
                            } else if(addressType == "country"){
                                document.getElementById("edit_shipto_country").value = val;
                            } else if(addressType == "postal_code"){
                                document.getElementById("edit_shipto_zipcode").value = val;
                            }
                        }

                        if(addressType == "street_number" || addressType == "route"){
                            address_line_1 = address_line_1 + result.address_components[i]["long_name"]+ ", ";
                        }
                    }
                    $("#edit_shipto_address").val(address_line_1.trim());
                });

                /*geocomplete for country */
                $("#edit_shipto_country").geocomplete().bind("geocode:result", function(event, result){
                    for (var i = 0; i < result.address_components.length; i++) {
                        var addressType = result.address_components[i].types[0];
                        if (addressType == "country") {
                            $("#edit_shipto_country").val(result.address_components[i]['long_name']);
                        }
                    }
                });
                /*geocomplete for country */
                $("#edit_customer_country").geocomplete().bind("geocode:result", function(event, result){
                    for (var i = 0; i < result.address_components.length; i++) {
                        var addressType = result.address_components[i].types[0];
                        if (addressType == "country") {
                            $("#edit_customer_country").val(result.address_components[i]['long_name']);
                        }
                    }
                });
            });
 
            jQuery(document).ready(function() {
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
                $("#edit_customer_id").typeahead(null, {
                    name: "best-pictures",
                    display: "name",
                    valueKey: "id",
                    source: e,
                    limit: Infinity,
                    templates: {
                        suggestion: Handlebars.compile("<div>{{name}},{{address}},{{telephone_number}})</div>")
                    }
                }).on('typeahead:selected', function (e, suggestion, name) {
                    edit_get_customer_data(suggestion.id);
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
                        if(data.result){
                            $("#edit_text_customer_id").val(data.result.id);
                            $("#edit_customer_fname").val(data.result.fname);
                            $("#edit_customer_lname").val(data.result.lname);
                            $("#edit_customer_email").val(data.result.email);
                            $("#edit_customer_address").val(data.result.address);
                            $("#edit_customer_latitude").val(data.result.latitude);
                            $("#edit_customer_longitude").val(data.result.longitude);
                            $("#edit_customer_city").val(data.result.city);
                            $("#edit_customer_state").val(data.result.state);
                            $("#edit_customer_country").val(data.result.country);
                            $("#edit_customer_zipcode").val(data.result.zipcode);
                            $("#edit_customer_borough").val(data.result.borough);
                            $("#edit_customer_telephone_number").val(data.result.telephone_number);
                            $("#edit_customer_cellphone_number").val(data.result.cellphone_number);
                        } else {
                            $("#text_customer_id").val("");
                            $("#edit_customer_fname").val("");
                            $("#edit_customer_lname").val("");
                            $("#edit_customer_email").val("");
                            $("#edit_customer_address").val("");
                            $("#edit_customer_latitude").val("");
                            $("#edit_customer_longitude").val("");
                            $("#edit_customer_city").val("");
                            $("#edit_customer_state").val("");
                            $("#edit_customer_country").val("");
                            $("#edit_customer_zipcode").val("");
                            $("#edit_customer_borough").val("");
                            $("#edit_customer_telephone_number").val("");
                            $("#edit_customer_cellphone_number").val("");
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){ 
                        $("#text_customer_id").val("");
                        $("#edit_customer_fname").val("");
                        $("#edit_customer_lname").val("");
                        $("#edit_customer_email").val("");
                        $("#edit_customer_address").val("");
                        $("#edit_customer_latitude").val("");
                        $("#edit_customer_longitude").val("");
                        $("#edit_customer_city").val("");
                        $("#edit_customer_state").val("");
                        $("#edit_customer_country").val("");
                        $("#edit_customer_zipcode").val("");
                        $("#edit_customer_borough").val("");
                        $("#edit_customer_telephone_number").val("");              
                        $("#edit_customer_cellphone_number").val("");              
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

                $.ajax({
                    url:  "<?php echo base_url(); ?>company/invoices/get_customer_shipto/"+id,
                    type: "GET",
                    success: function(data)
                    {
                        $("#edit_shipto_id").empty().append(new Option("<?php echo $this->lang->line('label_ship_to'); ?>", ""));
                        data = JSON.parse(data);                         
                        if(data.result){
                            var first = "";
                            $.each(data.result, function() {
                                $("#edit_shipto_id").append(new Option(this.fname + " " +this.lname , this.id));
                                if(first == ""){
                                   first = this.id;
                                }
                            });
                        }
                        $('#edit_shipto_id').val($('#edit_shipto_id option[value="'+first+'"]').val()).trigger('change');
                        edit_get_shipto_data();
                    },
                    error: function(jqXHR, textStatus, errorThrown){ 

                    },
                    complete: function(){
                    }
                }); // END OF AJAX CALL
            }

            /* get ship to details */
            $('#edit_shipto_id').on('select2:select', function (e) {
                edit_get_shipto_data();
            });

            function edit_get_shipto_data(){
                $.ajax({
                    url:  "<?php echo base_url(); ?>company/invoices/get_shipto_data/"+$('#edit_shipto_id').val(),
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
                            $("#edit_shipto_latitude").val(data.result.latitude);
                            $("#edit_shipto_longitude").val(data.result.longitude);
                            $("#edit_shipto_city").val(data.result.city);
                            $("#edit_shipto_state").val(data.result.state);
                            $("#edit_shipto_country").val(data.result.country);
                            $("#edit_shipto_zipcode").val(data.result.zipcode);
                            $("#edit_shipto_borough").val(data.result.borough);
                            $("#edit_shipto_telephone_number").val(data.result.telephone_number);
                            $("#edit_shipto_cellphone_number").val(data.result.cellphone_number);
                        } else {
                            $("#edit_text_shipto_id").val("<?php echo $next_shipto_id; ?>");
                            $("#edit_shipto_fname").val("");
                            $("#edit_shipto_lname").val("");
                            $("#edit_shipto_address").val("");
                            $("#edit_shipto_latitude").val("");
                            $("#edit_shipto_longitude").val("");
                            $("#edit_shipto_city").val("");
                            $("#edit_shipto_state").val("");
                            $("#edit_shipto_country").val("");
                            $("#edit_shipto_zipcode").val("");
                            $("#edit_shipto_borough").val("");
                            $("#edit_shipto_telephone_number").val("");
                            $("#edit_shipto_cellphone_number").val("");
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){ 
                        $("#edit_text_shipto_id").val("<?php echo $next_shipto_id; ?>");
                        $("#edit_shipto_fname").val("");
                        $("#edit_shipto_lname").val("");
                        $("#edit_shipto_address").val("");
                        $("#edit_shipto_latitude").val("");
                        $("#edit_shipto_longitude").val("");
                        $("#edit_shipto_city").val("");
                        $("#edit_shipto_state").val("");
                        $("#edit_shipto_country").val("");
                        $("#edit_shipto_zipcode").val("");
                        $("#edit_shipto_borough").val("");
                        $("#edit_shipto_telephone_number").val("");              
                    },
                    complete: function(){
                        if(is_submited){
                            $('.edit_invoices').parsley().validate()
                        }
                    }
                }); // END OF AJAX CALL
            }
            
            /*var max_fields_limit = 10; //set limit for maximum input fields*/
            var edit_x = "<?php echo $invoice_item_count; ?>"; //initialize counter for text box                        
            var edit_y=0;
            function edit_add_more_button()
            {   
                edit_y=edit_x-1;      
                
                /*if (x < max_fields_limit) { //check conditions*/
                    $('#edit_invoice_multiple_items').append('<div class="form-group m-form__group row">'
                                                + '<label class="col-xl-4 col-lg-4 text-left ">'
                                                    + '<div class="m-typeahead">'
                                                        + '<input type="text" class="form-control m-input" name="edit_item[]" id="edit_item_'+edit_x+'" placeholder="<?php echo $this->lang->line('label_item'); ?>" maxlength="128" required="" data-index="'+edit_x+'" data-index="0">'
                                                    + '</div>'
                                                + '</label>'
                                                + '<label class="col-xl-1 col-lg-1 text-left ">'
                                                   + '<input type="text" class="form-control m-input" name="edit_qty[]" id="edit_qty'+edit_x+'" placeholder="<?php echo $this->lang->line('label_qty'); ?>" maxlength="8" required="" data-parsley-type="number" min="1" value="1" data-index="'+edit_x+'">'
                                                + '</label>'
                                                + '<label class="col-xl-1 col-lg-1 text-left ">'
                                                    + '<input type="text" class="form-control m-input" name="edit_price[]" id="edit_price'+edit_x+'" placeholder="<?php echo $this->lang->line('label_price'); ?>"   maxlength="14" required="" data-parsley-type="number" min="1" value="0.00" data-index="'+edit_x+'">'
                                                + '</label>'
                                                + '<label class="col-xl-1 col-lg-1 text-left ">'
                                                    + '<input type="text" class="form-control m-input" name="edit_discount[]" id="edit_discount'+edit_x+'" placeholder="<?php echo $this->lang->line('label_discount'); ?>"  maxlength="14" required="" data-parsley-type="number" min="0" value="0.00" data-index="'+edit_x+'">'
                                                + '</label>'
                                                + '<label class="col-xl-1 col-lg-1 text-left ">'
                                                    + '<input type="text" class="form-control m-input" name="edit_insurance[]" id="edit_insurance'+edit_x+'" placeholder="<?php echo $this->lang->line('label_insurance'); ?>"  maxlength="14" required="" data-parsley-type="number" min="0" value="0.00" data-index="'+edit_x+'">'
                                                + '</label>'
                                                + '<label class="col-xl-1 col-lg-1 text-left ">'
                                                    + '<input type="text" class="form-control m-input" name="edit_tax[]" id="edit_tax'+edit_x+'" placeholder="<?php echo $this->lang->line('label_tax'); ?>"  maxlength="14" required="" data-parsley-type="number" min="0" value="0.00" data-index="'+edit_x+'">'
                                                + '</label>'
                                                + '<label class="col-xl-2 col-lg-2 text-left ">'
                                                    + '<input type="text" class="form-control m-input" name="edit_total[]" id="edit_total'+edit_x+'" placeholder="<?php echo $this->lang->line('label_total'); ?>"  maxlength="14" required="" readonly  data-parsley-type="number" min="0" value="0.00" data-index="'+edit_x+'">'
                                                + '</label>'
                                                + '<div class="col-xl-1 col-lg-1">'
                                                    + '<button type="button"  id="edit_btn_add_remove_'+edit_x+'" class="btn btn-sm btn-success" data-index="'+edit_x+'"><i class="fa fa-minus"></i> </button>'
                                                + '</div>'
                                            + '</div>'); //add input field  
                /*}*/
                

                
                $("#edit_btn_add_remove_"+edit_x).html('<i class="fa fa-plus"></i>');                
                $("#edit_btn_add_remove_"+edit_x).addClass("btn-success");
                $("#edit_btn_add_remove_"+edit_x).attr("onclick","edit_add_more_button();");        
                 
                $("#edit_btn_add_remove_"+edit_y).html('<i class="fa fa-minus"></i>');                                
                $("#edit_btn_add_remove_"+edit_y).removeClass("btn-success");                
                $("#edit_btn_add_remove_"+edit_y).addClass("btn-danger");                
                $("#edit_btn_add_remove_"+edit_y).attr("onclick","edit_remove_field(this);");                                

                edit_item_popup(edit_x);

                edit_x++;
            }
            
            function edit_remove_field(btn)
            {                             
                $(btn).parent().parent('div').remove();
                edit_calculation($(btn).data("index"));                
            }

            /* reinit item dropdown */
            function edit_item_popup(id){
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
                        total_qty+=parseFloat(val);
                    }
                });
                $('#edit_tot_box').val(total_qty.toFixed(2));
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
                    final_balance = final_balance - $("#edit_final_payment").val();
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

        </script>