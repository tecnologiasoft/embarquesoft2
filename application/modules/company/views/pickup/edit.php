
                    <!-- END: Subheader -->
                    <div class="m-content">
                        <div class="row">
                            <div class="col-xl-12 offset-xl-2">
                                <div class="m-form__heading text-center">
                                    <h5 class="m-form__heading-title btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" onclick="hide_show_customer();" id="title_customer_details" style="">
                                        <?php echo $this->lang->line('label_customer_details'); ?> <?php if(!empty($customer_details['fname'])) echo "(".$customer_details['fname']." ".$customer_details['lname'].")"; ?> <i class="la la-angle-down" id="icon_customer_details_toggle"></i>
                                    </h5>
                                    <h5 class="m-form__heading-title btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" onclick="hide_show_shipto();" id="title_customer_shipto" style="">
                                        <?php echo $this->lang->line('label_ship_to'); ?> <i class="la la-angle-down" id="icon_customer_shipto_toggle"></i>
                                    </h5>
                                    <h5 class="m-form__heading-title btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" onclick="hide_show_pickup();" id="title_customer_pickup" style="">
                                        <?php echo $this->lang->line('label_pickup'); ?> <i class="la la-angle-up" id="icon_customer_pickup_toggle"></i>
                                    </h5>

                                    <h5 class="m-form__heading-title btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" onclick="hide_show_pickup();" id="title_customer_pickup" style="">
                                    <a href = "<?php echo site_url('company/pickup'); ?>" style = "color:white;">
                                        <i class="la la-arrow-left" id="icon_customer_pickup_toggle"></i><?php echo $this->lang->line('label_back'); ?> 
                                    </a>
                                    </h5>

                                    
                                </div> 


                                <div class="m-portlet m-portlet--tab" id="customer_details" style="background: #265791; display: none;">
                                    <div class="m-portlet__body">
                                        <div class="m-form__section m-form__section--first">
                                            <!--begin::Form-->
                                            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id = "frm_customer_info">
                                                <div class="m-portlet__body">
                                                <div class="row">
                                                    <div class="col-lg-3 ">
                                                        <div class="row">
                                                            <label class="col-lg-5 col-form-label text-white mb-3 text-right">
                                                                <?php echo $this->lang->line('label_customer_id'); ?>:
                                                            </label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control m-input" name="customer_id" id="customer_id" placeholder="<?php echo $this->lang->line('label_customer_id'); ?>" value="<?php if(!empty($customer_details['id'])) echo $customer_details['id']; else echo set_value('customer_id'); ?>" maxlength="20" readonly> 
                                                            </div>
                                                            
                                                            <label class="col-lg-5 col-form-label text-white mb-3 text-right">
                                                                <?php echo $this->lang->line('label_telephone'); ?>:
                                                            </label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control m-input" name="customer_telephone_number" id="customer_telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php if(!empty($customer_details['telephone_number'])) echo $customer_details['telephone_number']; else echo set_value('customer_telephone_number'); ?>"> 
                                                            </div>

                                                            <label class="col-lg-5 col-form-label text-white mb-3 text-right">
                                                                <?php echo $this->lang->line('label_cellphone'); ?>:
                                                            </label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control m-input" name="customer_cellphone_number" id="customer_cellphone_number" placeholder="<?php echo $this->lang->line('label_cellphone_number'); ?>" value="<?php if(!empty($customer_details['cellphone_number'])) echo $customer_details['cellphone_number']; else echo set_value('customer_cellphone_number'); ?>"> 
                                                            </div>

                                                             <label class="col-lg-5 col-form-label text-white mb-3 text-right">
                                                                    <?php echo $this->lang->line('label_office_phone'); ?>:
                                                                </label>
                                                                <div class="col-lg-7">
                                                                    <input type="text" class="form-control m-input" name="customer_office_phone_number" id="customer_office_phone_number" placeholder="<?php echo $this->lang->line('label_office_phone_number'); ?>" value="<?php if(!empty($customer_details['office_phone_number'])) echo $customer_details['office_phone_number']; else echo set_value('customer_office_phone_number'); ?>"> 
                                                                </div> 

                                                            
                                                            
                                                        </div>

                                                        
                                                    </div> 
                                                    
                                                    <div class="col-lg-3 mb-3">
                                                        <div class="row">

                                                        <label class="col-lg-5 col-form-label text-white mb-3 text-right">
                                                                <?php echo $this->lang->line('label_company'); ?>:
                                                            </label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control m-input" name="company_name" id="company_name" placeholder="<?php echo $this->lang->line('label_company'); ?>" value="<?php if(!empty($customer_details['company_name'])) echo $customer_details['company_name']; else echo set_value('company_name'); ?>" maxlength="128">
                                                                <?php echo form_error('company_name'); ?>
                                                            </div>

                                                           

                                                            <label class="col-lg-5 col-form-label text-white mb-3 text-right">
                                                                <?php echo $this->lang->line('label_first_name'); ?>:
                                                            </label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control m-input" name="customer_fname" id="customer_fname" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php if(!empty($customer_details['fname'])) echo $customer_details['fname']; else echo set_value('customer_fname'); ?>" maxlength="64">
                                                            </div>

                                                            <label class="col-lg-5 col-form-label text-white mb-3 text-right">
                                                                <?php echo $this->lang->line('label_last_name'); ?>:
                                                            </label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control m-input" name="customer_lname" id="customer_lname" placeholder="<?php echo $this->lang->line('label_last_name'); ?>" value="<?php if(!empty($customer_details['lname'])) echo $customer_details['lname']; else echo set_value('customer_lname'); ?>" maxlength="64">
                                                            </div>
                                                            
                                                            <label class="col-lg-5 col-form-label text-white mb-3 text-right">
                                                                <?php echo $this->lang->line('label_address_1'); ?>:
                                                            </label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control m-input" name="customer_address_line_1" id="customer_address_line_1" placeholder="<?php echo $this->lang->line('label_address_1'); ?>" value="<?php if(!empty($customer_details['address_line1'])) echo $customer_details['address_line1']; else echo set_value('customer_address_line_1'); ?>"> 
                                                            </div>

                                                    
                                                           
                                                            
                                                            
                                                        </div> 
                                                    </div>     

                                                    <div class="col-lg-3">
                                                        <div class="row">

                                                        <label class="col-lg-5 col-form-label text-white mb-3 text-right">
                                                                <?php echo $this->lang->line('apartment'); ?>:
                                                            </label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control m-input" name="apartment" id="apartment" placeholder="<?php echo $this->lang->line('apartment'); ?>" value="<?php if(!empty($customer_details['apartment'])) echo $customer_details['apartment']; else echo set_value('apartment'); ?>"  maxlength ="255"> 
                                                                <?php echo form_error('apartment'); ?>

                                                            </div>


                                                        <label class="col-lg-5 col-form-label text-white mb-3 text-right">
                                                                <?php echo $this->lang->line('label_address_2'); ?>:
                                                            </label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control m-input" name="customer_address_line_2" id="customer_address_line_2" placeholder="<?php echo $this->lang->line('label_address_2'); ?>" value="<?php if(!empty($customer_details['address_line2'])) echo $customer_details['address_line2']; else echo set_value('customer_address_line_2'); ?>"> 
                                                            </div>

                                                            

                                                            <label class="col-lg-5 col-form-label text-white mb-3 text-right">
                                                                <?php echo $this->lang->line('label_city'); ?>:
                                                            </label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control m-input" name="customer_city" id="city" placeholder="<?php echo $this->lang->line('label_city'); ?>" value="<?php if(!empty($customer_details['city'])) echo $customer_details['city']; else echo set_value('customer_city'); ?>"> 
                                                            </div> 

                                                            <label class="col-lg-5 col-form-label text-white mb-3 text-right">
                                                                    <?php echo $this->lang->line('label_state'); ?>:
                                                                </label>
                                                                <div class="col-lg-7">
                                                                    <input type="text" class="form-control m-input" name="customer_state" id="state" placeholder="<?php echo $this->lang->line('label_state'); ?>" value="<?php if(!empty($customer_details['state'])) echo $customer_details['state']; else echo set_value('customer_state'); ?>"> 
                                                                </div> 


                                                        </div>
                                                    </div> 

                                                    <div class="col-lg-3 mb-3">
                                                        <div class="row">  
                                                               

                                                        <label class="col-lg-5 col-form-label text-white mb-3 text-right">
                                                                <?php echo $this->lang->line('label_zipcode'); ?>:
                                                            </label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control m-input" name="customer_zipcode" id="zipcode" placeholder="<?php echo $this->lang->line('label_zipcode'); ?>" value="<?php if(!empty($customer_details['zipcode'])) echo $customer_details['zipcode']; else echo set_value('customer_zipcode'); ?>"> 
                                                            </div> 

                                                                
                                                        <label class="col-lg-5 col-form-label text-white mb-3 text-right">
                                                                <?php echo $this->lang->line('label_balance'); ?>:
                                                            </label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control m-input" name="customer_balance" id="customer_balance" placeholder="<?php echo $this->lang->line('label_balance'); ?>" value="<?php if(!empty($customer_details['balance'])) echo $customer_details['balance']; else echo set_value('customer_balance'); ?>"> 
                                                            </div>
                                                                

                                                                
                                                                <label class="col-lg-5 col-form-label text-white mb-3 text-right">
                                                                    <?php echo $this->lang->line('label_language'); ?>:
                                                                </label>
                                                                <div class="col-lg-7">
                                                                    <div class="m-radio-inline">
                                                                        <label class="m-radio m-radio--bold m-radio--state-success text-white">
                                                                            <input name="customer_language" value="English" type="radio" <?php if($customer_details['language'] == "English") echo "checked"; ?>>
                                                                            English
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="m-radio m-radio--bold m-radio--state-success text-white">
                                                                            <input name="customer_language" value="Spanish" type="radio" <?php if($customer_details['language'] == "Spanish") echo "checked"; ?>>
                                                                            Español
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </div> 

                                                                <div class="col-lg-2 text-right" style = "margin-left: 173px;">
                                                                <input type = "hidden" name = "customer_id" value = "<?php echo $result['customer_id']; ?>">
                                                                    <button type="button" class="btn btn-success text-right" value="update" id  = "update_customer_info">Submit</button>
                                                                </div>

                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="m-portlet m-portlet--tab" id="customer_shipto" style="display: none;">
                                    <div class="m-portlet__body">
                                        <!--begin: Search Form -->
                                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                            <div class="row align-items-center">
                                                <div class="col-xl-8 order-2 order-xl-1" style="padding: 0 15px;">
                                                    <div class="form-group m-form__group row align-items-center">
                                                        
                                                        <div class="col-md-4" style="padding: 0 15px;">
                                                            <div class="m-input-icon m-input-icon--left">
                                                                <input type="text" class="form-control m-input" placeholder=" <?php echo $this->lang->line('label_search'); ?>" id="m_form_search">
                                                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                                                    <span>
                                                                        <i class="la la-search"></i>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                                            <a href="<?php echo site_url('company/customer/add_shipto/').$result['customer_id']; ?>" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                                                <span>
                                                                    <i class="la la-plus"></i> 
                                                                    <span>
                                                                        <?php echo $this->lang->line('label_add_shipto'); ?>
                                                                    </span>
                                                                </span>
                                                            </a>
                                                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end: Search Form -->
                                        <!--begin: Datatable -->
                                        <div class="m_datatable" id="ajax_data"></div>
                                        <!--end: Datatable -->
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="row" id="customer_pickup"> 
                            <div class="col-xl-12 offset-xl-2">
                                <div class="m-portlet m-portlet--tab">
                                    <div class="m-form__section m-form__section--first">
                                        <div class="m-portlet__body">
                                            <!--begin::Form-->
                                            <?php 
                        $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed','id' => 'm_form_1','enctype'=>'multipart/form-data'); 
                        echo form_open('company/pickup/edit/'.$result['id'],$form_data); 
                    ?> 
                            <input type = "hidden" name = "shipto_id" id = "shipto_id" value = "">
                                                <div class="m-portlet__body" style="border: 1px solid #b4bfd2;  border-radius: 10px;">
                                                    <div class="m-portlet__head mb-3" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                                        <div class="m-portlet__head-caption">
                                                            <div class="m-portlet__head-title">
                                                                <h3 class="m-portlet__head-text">
                                                                    <?php echo $this->lang->line('label_pickup_address'); ?>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__head-tools">
                                                            <ul class="m-portlet__nav">
                                                                <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
                                                                    <a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
                                                                        <?php echo $this->lang->line('label_pickup_addresses'); ?>
                                                                    </a>
                                                                    <div class="m-dropdown__wrapper">
                                                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 36.5px;"></span>
                                                                        <div class="m-dropdown__inner">
                                                                            <div class="m-dropdown__body">
                                                                                <div class="col-xl-12 col-form-label">
                                                                                    <a href="javascript:;" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" data-toggle="modal" data-target="#new_customer_pickup">
                                                                                        <span>
                                                                                            <i class="la la-plus"></i> 
                                                                                            <span>
                                                                                                <?php echo $this->lang->line('label_add_pickup'); ?>
                                                                                            </span>
                                                                                        </span>
                                                                                    </a>
                                                                                </div>
                                                                                <!-- <div class="col-xl-12 col-form-label">
                                                                                    <a href="<?php echo base_url('company/customer/add'); ?>" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                                                                        <span>
                                                                                            <i class="la la-plus"></i> 
                                                                                            <span>
                                                                                                <?php echo $this->lang->line('label_add_customer'); ?>
                                                                                            </span>
                                                                                        </span>
                                                                                    </a>
                                                                                </div> -->

                                                                                <?php 
                                                                                    if(!empty($customer_pickup_list)){
                                                                                        foreach ($customer_pickup_list as $key => $value) {
                                                                                ?>
                                                                                            <div class="col-xl-12 col-form-label  mb-3">
                                                                                                <a href="<?php echo base_url()."company/pickup/select_customer_pickup/".$value['id']; ?>"><?php echo $value['fname']." ".$value['lname']; ?></a>, 
                                                                                                <?php 
                                                                                                    echo $value['address']; 
                                                                                                    if(!empty($value['address_line1'])) echo ", ".$value['address_line1'];
                                                                                                    if(!empty($value['address_line2'])) echo ", ".$value['address_line2']; 
                                                                                                ?>
                                                                                            </div>
                                                                                <?php
                                                                                        }
                                                                                    }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <div class = "row">
                                                    <div class="col-lg-3">
                                                       <div class = "row">
                                                            <label class="form_label col-lg-5 col-form-label col-form-label-right  text-right mb-3">
                                                                <?php echo $this->lang->line('label_pickup_id'); ?>:
                                                            </label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control m-input" name="pickup_id" id="pickup_id" placeholder="<?php echo $this->lang->line('label_pickup_id'); ?>" value="<?php if(!empty($result['id'])) echo $result['id']; else echo set_value('pickup_id'); ?>" maxlength="20" readonly > 
                                                                <?php echo form_error('pickup_id'); ?>
                                                            </div>

                                                            <label class="form_label text-right col-lg-5 col-form-label col-form-label-right mb-3">
                                                                    <?php echo $this->lang->line('label_telephone'); ?>:
                                                                </label>
                                                                <div class="col-lg-7">
                                                                    <input type="text" class="form-control m-input" name="telephone_number" id="telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php if(!empty($customer_pickup_details['telephone_number'])) echo $customer_pickup_details['telephone_number']; elseif(!empty($result['telephone_number'])) echo $result['telephone_number']; else echo set_value('telephone_number'); ?>" data-parsley-trigger="focusin focusout" data-parsley-required-if="#cellphone_number" data-parsley-validate-if-empty="true"> 
                                                                    <?php echo form_error('telephone_number'); ?>
                                                                </div>

                                                                <label class="form_label text-right col-lg-5 col-form-label col-form-label-right mb-3">
                                                                    <?php echo $this->lang->line('label_cellphone'); ?>:
                                                                </label>
                                                                <div class="col-lg-7">
                                                                    <input type="text" class="form-control m-input" name="cellphone_number" id="cellphone_number" placeholder="<?php echo $this->lang->line('label_cellphone_number'); ?>" value="<?php if(!empty($customer_pickup_details['cellphone_number'])) echo $customer_pickup_details['cellphone_number']; elseif(!empty($result['cellphone_number'])) echo $result['cellphone_number']; else echo set_value('cellphone_number'); ?>" data-parsley-trigger="focusin focusout"    data-parsley-required-if="#telephone_number" data-parsley-validate-if-empty="true"> 
                                                                    <?php echo form_error('cellphone_number'); ?>
                                                                </div> 


                                                           

                                                           

                                                        </div> 
                                                    </div>

                                                    <div class="col-lg-3">
                                                       <div class="row"> 
                                                           
                                                           <label class="form_label col-lg-5 col-form-label col-form-label-right  text-right mb-3">
                                                                *<?php echo $this->lang->line('label_first_name'); ?>:
                                                            </label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control m-input" name="fname" id="fname" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php if(!empty($customer_pickup_details['fname'])) echo $customer_pickup_details['fname']; elseif(!empty($result['fname'])) echo $result['fname']; else echo set_value('fname'); ?>" maxlength="64"  required data-parsley-trigger="focusin focusout">
                                                                <?php echo form_error('fname'); ?>
                                                            </div>

                                                                
                                                                <label class="form_label text-right col-lg-5 col-form-label col-form-label-right mb-3">
                                                                    *<?php echo $this->lang->line('label_last_name'); ?>:
                                                                </label>
                                                                <div class="col-lg-7">
                                                                    <input type="text" class="form-control m-input" name="lname" id="lname" placeholder="<?php echo $this->lang->line('label_last_name'); ?>" value="<?php if(!empty($customer_pickup_details['lname'])) echo $customer_pickup_details['lname']; elseif(!empty($result['lname'])) echo $result['lname']; else echo set_value('lname'); ?>" maxlength="64"  required data-parsley-trigger="focusin focusout">
                                                                    <?php echo form_error('lname'); ?>
                                                                </div>

                                                                <label class="form_label text-right col-lg-5 col-form-label col-form-label-right mb-3">
                                                                <?php echo $this->lang->line('label_address_1'); ?>:
                                                            </label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control m-input" name="address_line_1" id="address_line_1" placeholder="<?php echo $this->lang->line('label_address_1'); ?>" value="<?php if(!empty($customer_pickup_details['address_line1'])) echo $customer_pickup_details['address_line1']; elseif(!empty($result['address_line1'])) echo $result['address_line1']; else echo set_value('address_line_1'); ?>"  maxlength ="255"> 
                                                                <input type="hidden" name="latitude" id="latitude" value="<?php if(!empty($customer_pickup_details['latitude'])) echo $customer_pickup_details['latitude']; else echo set_value('latitude'); ?>">
                                                                    <input type="hidden" name="longitude" id="longitude" value="<?php if(!empty($customer_pickup_details['longitude'])) echo $customer_pickup_details['longitude']; else echo set_value('longitude'); ?>">
                                                                <?php echo form_error('address_line_1'); ?>

                                                            </div>

                                                        
                                                            
                                                                

                                                                


                                                                
                                                            </div> 
                                                        </div>


                                                    <div class="col-lg-3">
                                                        <div class="row">   
                                                        <label class="form_label text-right col-lg-5 col-form-label col-form-label-right mb-3">
                                                                <?php echo $this->lang->line('apartment'); ?>:
                                                            </label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control m-input" name="apartment" id="apartment" placeholder="<?php echo $this->lang->line('apartment'); ?>" value="<?php if(!empty($customer_pickup_details['apartment'])) echo $customer_pickup_details['apartment']; elseif(!empty($result['apartment'])) echo $result['apartment']; else echo set_value('apartment'); ?>"  maxlength ="255"> 
                                                                <?php echo form_error('apartment'); ?>

                                                            </div>
                                                            
                                                                 <label class="form_label text-right col-lg-5 col-form-label col-form-label-right mb-3">
                                                                    <?php echo $this->lang->line('label_address_2'); ?>:
                                                                </label>
                                                                <div class="col-lg-7">
                                                                    <input type="text" class="form-control m-input" name="address_line_2" id="address_line_2" placeholder="<?php echo $this->lang->line('label_address_2'); ?>" value="<?php if(!empty($customer_pickup_details['address_line2'])) echo $customer_pickup_details['address_line2']; elseif(!empty($result['address_line2'])) echo $result['address_line2']; else echo set_value('address_line_2'); ?>"  maxlength ="255">  
                                                                    <?php echo form_error('address_line_2'); ?>
                                                                </div>

                                                               
                                                                     <label class="form_label text-right col-lg-5 col-form-label col-form-label-right mb-3">
                                                                    *<?php echo $this->lang->line('label_city'); ?>:
                                                                </label>
                                                                <div class="col-lg-7">
                                                                    <input type="text" class="form-control m-input" name="city" id="pickup_city" placeholder="<?php echo $this->lang->line('label_city'); ?>" value="<?php if(!empty($customer_pickup_details['city'])) echo $customer_pickup_details['city']; elseif(!empty($result['city'])) echo $result['city']; else echo set_value('city'); ?>"  required data-parsley-trigger="focusin focusout"> 
                                                                   
                                                                    <?php echo form_error('city'); ?>
                                                                </div> 

                                                         
                                                            </div> 
                                                        </div> 

                                                        <div class="col-lg-3">
                                                        <div class="row">   
                                                            
                                                                 

                                                            <label class="form_label text-right col-lg-5 col-form-label col-form-label-right mb-3">
                                                                *<?php echo $this->lang->line('label_state'); ?>:
                                                            </label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control m-input" name="state" id="pickup_state" placeholder="<?php echo $this->lang->line('label_state'); ?>" value="<?php if(!empty($customer_pickup_details['state'])) echo $customer_pickup_details['state']; elseif(!empty($result['state'])) echo $result['state']; else echo set_value('state'); ?>" required data-parsley-trigger="focusin focusout"> 
                                                                <?php echo form_error('state'); ?>
                                                            </div>  
                                                               

                                                            <label class="form_label text-right col-lg-5 col-form-label col-form-label-right mb-3">
                                                                    *<?php echo $this->lang->line('label_zipcode'); ?>:
                                                                </label>
                                                                <div class="col-lg-7">
                                                                    <input type="text" class="form-control m-input" name="zipcode" id="pickup_zipcode" placeholder="<?php echo $this->lang->line('label_zipcode'); ?>" value="<?php if(!empty($customer_pickup_details['zipcode'])) echo $customer_pickup_details['zipcode']; elseif(!empty($result['zipcode'])) echo $result['zipcode']; else echo set_value('zipcode'); ?>"  required data-parsley-trigger="focusin focusout"> 
                                                                    <?php echo form_error('zipcode'); ?>
                                                                </div> 
                                                            </div> 
                                                        </div> 
                                                    
                                                   
                                                    </div> 

                                                    
                                                </div>
                                                <div class="m-portlet__body"  style="border: 1px solid #b4bfd2; margin-top: 5px; border-radius: 10px;">
                                                    <div class="m-portlet__head" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                                        <div class="m-portlet__head-caption">
                                                            <div class="m-portlet__head-title">
                                                                <h3 class="m-portlet__head-text">
                                                                    <?php echo $this->lang->line('label_pickup_details'); ?>
                                                                </h3>
                                                                <?php if(count($pickup_history) > 0) {?>
                                                                <a href="javascript:;" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" style = "margin-left: 46px;
                                                                         padding-bottom: 12px;
                                                                         padding-right: 33px;
                                                                         padding-left: 33px;" id = "open_history_modal">
                                                                <!-- <a href = ":;" class="btn btn-success"  style = "margin-left: 46px;
                                                                         padding-bottom: 12px;
                                                                         padding-right: 33px;
                                                                         padding-left: 33px;"
                                                                        data-toggle="modal" data-target="#pickup_history"  -->
                                                                         
                                                                History</a>    
                                                                <?php } ?>
                                                            </div>
                                                            
                                                        </div> 
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-lg-1 col-form-label col-form-label-right">
                                                            * <?php echo $this->lang->line('label_item_1'); ?>:
                                                        </label>
                                                        <div class="col-lg-2">
                                                            <input type="text" class="form-control m-input" name="item_1" id="item_1" placeholder="<?php echo $this->lang->line('label_item_1'); ?>" value="<?php echo set_value('item_1')?set_value('item_1'):$result['item_1']; ?>" maxlength="32"  required data-parsley-trigger="focusin focusout"> 
                                                            <?php echo form_error('item_1'); ?>
                                                        </div> 
                                                        <label class="col-lg-1 col-form-label col-form-label-right">
                                                            <?php echo $this->lang->line('label_item_2'); ?>:
                                                        </label>
                                                        <div class="col-lg-2">
                                                            <input type="text" class="form-control m-input" name="item_2" id="item_2" placeholder="<?php echo $this->lang->line('label_item_2'); ?>" value="<?php echo set_value('item_2')?set_value('item_2'):$result['item_2']; ?>" maxlength="32"  data-parsley-trigger="focusin focusout"> 
                                                            <?php echo form_error('item_2'); ?>
                                                        </div> 
                                                        <label class="col-lg-1 col-form-label col-form-label-right">
                                                            * <?php echo $this->lang->line('label_pickup_date'); ?>:
                                                        </label>
                                                        <div class="col-lg-2">
                                                            <input type="text" class="form-control m-input" name="pickup_date" id="pickup_date" placeholder="<?php echo $this->lang->line('label_pickup_date'); ?>" value="<?php echo set_value('pickup_date')?set_value('pickup_date'):date('m/d/Y',strtotime($result['pickup_date'])); ?>" maxlength="32"  required data-parsley-trigger="focusin focusout"> 
                                                            <?php echo form_error('pickup_date'); ?>
                                                        </div> 
                                                        <label class="col-lg-1 col-form-label col-form-label-right">
                                                            <?php echo $this->lang->line('label_pickup_time'); ?>:
                                                        </label>
                                                        <div class="col-lg-2">
                                                            <input type="text" class="form-control m-input" name="pickup_time" id="pickup_time" placeholder="<?php echo $this->lang->line('label_pickup_time'); ?>" value="<?php echo set_value('pickup_time')?set_value('pickup_time'):$result['pickup_time']; ?>" maxlength="32"  data-parsley-trigger="focusin focusout"> 
                                                            <?php echo form_error('pickup_time'); ?>
                                                        </div> 
                                                    </div>
                                                    
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-lg-1 col-form-label col-form-label-right">
                                                            <?php echo $this->lang->line('label_driver'); ?>:
                                                        </label>
                                                        <div class="col-lg-2">
                                                            <select class="form-control m-input" name="driver_id" id="driver_id" placeholder="<?php echo $this->lang->line('label_driver'); ?>"  data-parsley-trigger="focusin focusout" data-parsley-errors-container="#driver_error">
                                                                <option value=""><?php echo $this->lang->line('label_driver'); ?></option>

                                                                <?php 
                                                                if(!empty($driver_list)){
                                                                    foreach ($driver_list as $key => $value) {
                                                                        ?>
                                                                        <option value="<?php echo $value['id']; ?>" <?php echo $value['id']==$result['driver_id'] ? "selected":"";?>><?php echo $value['fname']." ".$value['lname']; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                            <div id="driver_error">
                                                                <?php echo form_error('driver_id'); ?>
                                                            </div>
                                                        </div>

                                                        <label class="col-lg-1 col-form-label col-form-label-right">
                                                            <?php echo $this->lang->line('label_total_box'); ?>:
                                                        </label>
                                                        <div class="col-lg-2">
                                                            <input type="text" class="form-control m-input" name="boxes" id="boxes" placeholder="<?php echo $this->lang->line('label_total_box'); ?>" value="<?php echo set_value('boxes')?set_value('boxes'):$result['boxes']; ?>" maxlength="10"  data-parsley-trigger="focusin focusout"> 
                                                            <?php echo form_error('boxes'); ?>
                                                        </div> 

                                                        <label class="col-lg-1 col-form-label col-form-label-right">
                                                            <?php echo $this->lang->line('label_total_barrel'); ?>:
                                                        </label>
                                                        <div class="col-lg-2">
                                                            <input type="text" class="form-control m-input" name="barrels" id="barrels" placeholder="<?php echo $this->lang->line('label_total_barrel'); ?>" value="<?php echo set_value('barrels')?set_value('barrels'):$result['barrels']; ?>" maxlength="10"  data-parsley-trigger="focusin focusout"> 
                                                            <?php echo form_error('barrels'); ?>
                                                        </div>
                                                       

                                                        <label class="col-lg-1 col-form-label col-form-label-right">
                                                            <?php echo $this->lang->line('label_comment'); ?>:
                                                        </label>
                                                        <div class="col-lg-2">
                                                            <textarea class="form-control m-input" rows="2" name="comment" id="comment" placeholder="<?php echo $this->lang->line('label_comment'); ?>"><?php if(!empty($result['comment'])) echo $result['comment']; else echo set_value('comment'); ?></textarea>
                                                            <?php echo form_error('comment'); ?>
                                                        </div>  
                                                    </div>


                                                    <div class="form-group m-form__group row" >
                                                        
                                                    <label class="col-lg-1 col-form-label col-form-label-right">
                                                            <?php echo $this->lang->line('label_user'); ?>:
                                                        </label>
                                                        <div class="col-lg-2" style = "margin-top:8px;">
                                                            
                                                            <?=@$user_info->user_name?>
                                                        </div>

                                                        <label class="col-lg-1 col-form-label col-form-label-right">
                                                            <?php echo $this->lang->line('label_created_date'); ?>:
                                                        </label>
                                                        <div class="col-lg-2" style = "margin-top:8px;">
                                                            <?=$result['insertdate']?>
                                                        </div>

                                                    <label class="col-lg-1 col-form-label col-form-label-right">
                                                            <?php echo $this->lang->line('label_zone'); ?>:
                                                        </label>
                                                        <div class="col-lg-2">
                                                            <select class="form-control m-input" name="zone" id="zone" placeholder="<?php echo $this->lang->line('label_zone'); ?>">
                                                                <option value=""><?php echo $this->lang->line('label_zone'); ?></option>
                                                                <?php 
                                                                if(!empty($zone_list)){
                                                                    foreach ($zone_list as $key => $value) {
                                                                        ?>
                                                                        <option value="<?php echo $value['id']; ?>" <?php echo $value['id']==$result['zone'] ? "selected":"";?>><?php echo $value['description']; ?></option>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                            <?php echo form_error('zone'); ?>
                                                        </div>

                                                        <label class="col-lg-1 col-form-label col-form-label-right">
                                                            * <?php echo $this->lang->line('label_status'); ?>:
                                                        </label>
                                                        <div class="col-lg-2">
                                                            <select class = "form-control" name = "status" required data-parsley-trigger="focusin focusout">
                                                               <option value = ""><?=$this->lang->line('label_select').' '.$this->lang->line('label_status')?></option>
                                                               <option value = "Done" <?php echo $result['status'] == 'Done'?"selected":""; ?>><?php echo $this->lang->line('label_done'); ?></option>
                                                               <option value = "Not Done" <?php echo $result['status'] == 'Not Done'?"selected":""; ?>><?php echo $this->lang->line('label_not_done'); ?></option>
                                                               <option value = "Cancel" <?php echo $result['status'] == 'Cancel'?"selected":""; ?>><?php echo $this->lang->line('label_cancel'); ?></option>
                                                               <option value = "Rescheduled" <?php echo $result['status'] == 'Rescheduled'?"selected":""; ?>><?php echo $this->lang->line('label_rescheduled'); ?></option>
                                                            </select>
                                                           
                                                            <?php echo form_error('status'); ?>
                                                        </div> 

                                                        

                                                       
                                                    </div>

                                                    <div class="pl-3 pr-3 mt-2">
                                                        <div class="" style="background-color: #dce2ec; border:1px solid #b4bfd2; padding: 15px 15px 5px 15px; border-radius: 4px;">
                                                        
                                                        <div class="row show-pickup-info">
                                                                <div class="col-md-12">
                                                                    <h5 style="font-weight: 500; font-family: Roboto;">
                                                                    <?php echo $this->lang->line('label_shipto_details') ?></h5>
                                                                    <hr/>
                                                                </div>
                                                            <div class="col-md-3">
                                                                <div class="row">
                                                                    <div class="col-md-5 text-right">
                                                                        <label><?php echo $this->lang->line('label_first_name');?>: </label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <p id = "shipto_fname"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="row">
                                                                    <div class="col-md-5 text-right">
                                                                        <label><?php echo $this->lang->line('label_last_name');?>: </label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                     <p id = "shipto_lname"></p>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-3 text-right">
                                                                        <label><?php echo $this->lang->line('label_address_1');?>: </label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                    <p id = "shipto_address"></p>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="row">
                                                                    <div class="col-md-5 text-right">
                                                                        <label><?php echo $this->lang->line('label_telephone'); ?>: </label>
                                                                    </div>
                                                                    <div class="col-md-7" id = "">
                                                                    <p id = "shipto_telephone"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="row">
                                                                    <div class="col-md-5 text-right">
                                                                        <label> <?php echo $this->lang->line('label_cellphone'); ?>: </label>
                                                                    </div>
                                                                    <div class="col-md-7" id = "">
                                                                     <p id = "shipto_cellphone"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-3 text-right">
                                                                        <label><?php echo $this->lang->line('label_province'); ?>: </label>
                                                                    </div>
                                                                    <div class="col-md-9" id = "">
                                                                        <p id = "shipto_province"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                                    
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-lg-5"></div>
                                                        <div class="col-lg-7">
                                                            <button type="submit" class="btn btn-success" value="update">
                                                                <?php echo $this->lang->line('label_submit'); ?>
                                                            </button>
                                                            <button type="reset" class="btn btn-secondary">
                                                                <?php echo $this->lang->line('label_reset'); ?>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php 
                                                echo form_close();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end::Form-->
                    </div>
                </div>
            </div>
            <!-- end:: Body -->
            
        </div>
        <!-- end:: Page -->
        
        <!--begin::Base Scripts -->
        <?php $this->load->view('company/inc/scripts'); ?>
        <!-- <script src="<?php echo base_url(); ?>/assets/demo/default/custom/crud/forms/widgets/input-mask.js" type="text/javascript"></script> -->
        <script src="<?php echo base_url(); ?>/assets/demo/default/custom/components/parsley/dist/parsley.min.js" type="text/javascript"></script> 

        <!--begin::Modal-->
        <div class="modal fade" id="new_customer_pickup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"         aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-custom">
                        <h5 class="modal-title text-white" id="exampleModalLabel">
                            <?php echo $this->lang->line('title_add_new_pickup'); ?>
                        </h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                &times;
                            </span>
                        </button>
                    </div>
                    <?php 
                        $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'model_m_form_1','enctype'=>'multipart/form-data'); 
                        echo form_open('company/pickup/add_customer_pickup/'.$this->session->userdata('new_pickup_customer_id'),$form_data); 
                    ?> 
                      
                      <div class="modal-body">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="row">
                                        
                                        <label class="col-lg-5 col-form-label col-form-label-right mb-3 form_label">
                                            <?php echo $this->lang->line('label_pickup_id'); ?>:
                                        </label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control m-input" name="model_pickup_id" id="pickup_id" placeholder="<?php echo $this->lang->line('label_pickup_id'); ?>" value="<?php echo set_value('model_pickup_id', $next_customer_pickup_id); ?>" maxlength="20" readonly > 
                                            <?php echo form_error('model_pickup_id'); ?>
                                        </div>
                                    
                                    
                                        <label class="col-lg-5 col-form-label col-form-label-right mb-3 form_label">
                                            <?php echo $this->lang->line('label_telephone'); ?>:
                                        </label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control m-input ph" name="model_telephone_number" id="model_telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php echo set_value('model_telephone_number'); ?>" data-parsley-trigger="focusin focusout" data-parsley-required-if="#model_cellphone_number" data-parsley-validate-if-empty="true"> 
                                            <?php echo form_error('model_telephone_number'); ?>
                                        </div>
                                    
                                    
                                        <label class="col-lg-5 col-form-label col-form-label-right mb-3 form_label">
                                            <?php echo $this->lang->line('label_cellphone'); ?>:
                                        </label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control m-input ph" name="model_cellphone_number" id="model_cellphone_number" placeholder="<?php echo $this->lang->line('label_cellphone_number'); ?>" value="<?php echo set_value('model_cellphone_number'); ?>" data-parsley-trigger="focusin focusout"  data-parsley-required-if="#model_cellphone_number" data-parsley-validate-if-empty="true"> 
                                            <?php echo form_error('model_cellphone_number'); ?>
                                        </div> 
                                    </div>
                                    
                                </div>
                             
                                </style>
                                <div class="col-xl-4">
                                    <div class="row">
                                        <label class="col-lg-5 col-form-label col-form-label-right mb-3 form_label">
                                            *<?php echo $this->lang->line('label_f_name'); ?>:
                                        </label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control m-input" name="model_fname" id="model_fname" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php echo set_value('model_fname'); ?>" maxlength="64"  required data-parsley-trigger="focusin focusout">
                                            <?php echo form_error('model_fname'); ?>
                                        </div>
                                    
                                    
                                        <label class="col-lg-5 col-form-label col-form-label-right mb-3 form_label">
                                            *<?php echo $this->lang->line('label_l_name'); ?>:
                                        </label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control m-input" name="model_lname" id="model_lname" placeholder="<?php echo $this->lang->line('label_last_name'); ?>" value="<?php echo set_value('model_lname'); ?>" maxlength="64"  required data-parsley-trigger="focusin focusout">
                                            <?php echo form_error('model_lname'); ?>
                                        </div>
                                    
                                        <label class="col-lg-5 col-form-label col-form-label-right mb-3 form_label">
                                           * <?php echo $this->lang->line('label_address_1'); ?>:
                                        </label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control m-input" name="model_address_line_1" id="model_address_line_1" placeholder="<?php echo $this->lang->line('label_address_1'); ?>"  maxlength ="255"> 
                                            <?php echo form_error('model_address_line_1'); ?>
                                        </div>

                                        <label class="col-lg-5 col-form-label col-form-label-right mb-3 form_label">
                                            <?php echo $this->lang->line('apartment'); ?>:
                                        </label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control m-input" name="apartment" id="apartment" placeholder="<?php echo $this->lang->line('apartment'); ?>" value="<?php echo set_value('apartment'); ?>"  maxlength ="255"> 
                                            <?php echo form_error('apartment'); ?>
                                        </div>
                                       
                                    
                                    
                                       
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="row">
                                   
                                    
                                    
                                        <label class="col-lg-5 col-form-label col-form-label-right mb-3 form_label">
                                            <?php echo $this->lang->line('label_address_2'); ?>:
                                        </label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control m-input" name="model_address_line_2" id="model_address_line_2" placeholder="<?php echo $this->lang->line('label_address_2'); ?>" value="<?php echo set_value('model_address_line_2'); ?>"  maxlength ="255">  
                                            <?php echo form_error('model_address_line_2'); ?>
                                        </div>
                                        
                                        <label class="col-lg-5 col-form-label  mb-3 form_label col-form-label-right">
                                            *<?php echo $this->lang->line('label_city'); ?>:
                                        </label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control m-input" name="model_city" id="model_city" placeholder="<?php echo $this->lang->line('label_city'); ?>" value="<?php  echo set_value('model_city'); ?>"  required data-parsley-trigger="focusin focusout"> 
                                            <?php echo form_error('model_city'); ?>
                                        </div> 

                                        <label class="col-lg-5 col-form-label col-form-label-right mb-3 form_label">
                                            *<?php echo $this->lang->line('label_state'); ?>:
                                        </label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control m-input" name="model_state" id="model_state" placeholder="<?php echo $this->lang->line('label_state'); ?>" value="<?php echo set_value('model_state'); ?>" required data-parsley-trigger="focusin focusout"> 
                                            <?php echo form_error('model_state'); ?>
                                        </div> 

                                        <label class="col-lg-5 col-form-label col-form-label-right mb-3 form_label">
                                            *<?php echo $this->lang->line('label_zipcode'); ?>:
                                        </label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control m-input" name="model_zipcode" id="model_zipcode" placeholder="<?php echo $this->lang->line('label_zipcode'); ?>" value="<?php echo set_value('model_zipcode'); ?>" required data-parsley-trigger="focusin focusout"> 
                                            <?php echo form_error('model_state'); ?>
                                        </div>  
                                    </div> 
                                    
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal" >
                                <?php echo $this->lang->line('label_back'); ?>
                        </button>
                            <button type="submit" class="btn btn-success">
                                <?php echo $this->lang->line('label_submit'); ?>
                            </button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!--end::Modal-->
       <?php $this->load->view('pickup_history'); ?>
        <!--begin::Page Snippets -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
        <script type="text/javascript" src="<?php echo MAP_API_URL; ?>"></script>
        <script type="text/javascript">
        $('form').parsley();
        $(document).ready(function(){
            
            
            /*jQuery(document).ready(function() {
                $('#new_customer_pickup').modal('show');
            }); */
            /*window.Parsley.addValidator("requiredIf", {
               validateString : function(value, requirement) {
                    if (jQuery(requirement).val()){
                        return !!value;
                    } 
                    return true;
                },
                priority: 33
            })*/

            $("#telephone_number, #cellphone_number").on('change', function() {
                if ($("#telephone_number").val().length > 0 ||
                    $("#cellphone_number").val().length > 0)
                {
                    // If any field is filled, set attr required
                    $("#telephone_number, #cellphone_number").attr("required", "required");
                } else {
                    // if all fields are empty, remove required attr
                    $("#telephone_number, #cellphone_number").removeAttr("required");
                }
                // destroy ParsleyForm instance
                $('#m_form_1').parsley().destroy();
                
                // bind parsley
                $('#m_form_1').parsley();
            });
            /*$("#model_telephone_number, #model_cellphone_number").on('change', function() {
                if ($("#model_telephone_number").val().length > 0 ||
                    $("#model_cellphone_number").val().length > 0)
                {
                    // If any field is filled, set attr required
                    $("#model_telephone_number, #model_cellphone_number").attr("required", "required");
                } else {
                    // if all fields are empty, remove required attr
                    $("#model_telephone_number, #model_cellphone_number").removeAttr("required");
                }
                // destroy ParsleyForm instance
                //$('#model_m_form_1').parsley().destroy();
                
                // bind parsley
                $('#model_m_form_1').parsley();
            });*/


            var Inputmask = {
                init: function() {
                    $("#fax_number").inputmask("mask", {
                        mask: "999-999-9999"
                    }), $("#cellphone_number").inputmask("mask", {
                        mask: "999-999-9999"
                    }), $("#telephone_number").inputmask("mask", {
                        mask: "999-999-9999"
                    }), $("#office_phone_number").inputmask("mask", {
                        mask: "999-999-9999"
                    }), $("#model_telephone_number").inputmask("mask", {
                        mask: "999-999-9999"
                    }), $("#model_cellphone_number").inputmask("mask", {
                        mask: "999-999-9999"
                    })
                }
            };
            jQuery(document).ready(function() {
                Inputmask.init()
            });    

            /* select 2 */
            var Select2 = {
                init: function() {
                    $("#branch_id").select2();
                    $("#driver_id").select2();
                    $("#zone").select2();
                    $("#model_branch_id").select2();
                }
            };
            jQuery(document).ready(function() {
                Select2.init()
            });

            $(document).ready(function() {
                $("#model_branch_id").select2({
                    dropdownParent: $("#new_customer_pickup")
                });
            });

            /* Time picker */
            var BootstrapTimepicker = {
                init: function() {
                    $("#pickup_time").timepicker()
                }
            };
            jQuery(document).ready(function() {
                BootstrapTimepicker.init()
            });

            /* date picker */
            var BootstrapDatepicker = function() {
                var t = function() {
                    $("#pickup_date").datepicker({
                        todayHighlight: !0,
                        orientation: "bottom left",
                        templates: {
                            leftArrow: '<i class="la la-angle-left"></i>',
                            rightArrow: '<i class="la la-angle-right"></i>'
                        },
                        autoclose: true,
                        /*format: "yyyy-mm-dd"*/
                        format: "mm/dd/yyyy"
                    })
                };
                return {
                    init: function() {
                        t()
                    }
                }
            }();
            jQuery(document).ready(function() {
                BootstrapDatepicker.init()
            });
            jQuery(document).ready(function() {
                $("#m_form_1").validate({
                    rules: { 
                        telephone_number: {
                            required: function(element) {
                                return $("#cellphone_number").is(':blank');
                            },
                            minlength: 8,
                            maxlength: 14
                        },
                        cellphone_number: {
                            required: function(element) {
                                return $("#telephone_number").is(':blank');
                            },
                            minlength: 8,
                            maxlength: 14
                        }, 
                    },
                    invalidHandler: function(e, r) {
                        var i = $("#m_form_1_msg");
                        i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
                    },
                    submitHandler: function(e) {
                        $("#m_form_1_msg").hide();
                        return true;
                    }
                });
                $("#model_m_form_1").validate({
                    rules: { 
                       model_telephone_number: {
                            required: function(element) {
                                return $("#model_cellphone_number").is(':blank');
                            },
                            minlength: 8,
                            maxlength: 14
                        },
                        model_cellphone_number: {
                            required: function(element) {
                                return $("#model_telephone_number").is(':blank');
                            },
                            minlength: 8,
                            maxlength: 14
                        }, 
                    },
                    invalidHandler: function(e, r) {
                        var i = $("#m_form_1_msg");
                        i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
                    },
                    submitHandler: function(e) {
                        $("#m_form_1_msg").hide();
                        return true;
                    }
                });
            });
            $.validator.addMethod("pwcheckallowedchars", function (value) {
                if(value)
                    return /^[a-zA-Z0-9!@#$^&*()_=\[\]{};':"\\|,.<>\/?+-]+$/.test(value) // has only allowed chars letter
                else
                    return true;
            }, "The password contains non-admitted characters");

        });
        </script>

        <!-- script file for File input -->
        

        <!-- google maps api -->
        
        <!-- initialization of file upload and date picker -->
        <script type="text/javascript">

            
                
            
            $(document).ready(function()
            {
                getMap('address');
                getMap('model_address');

              
            });
        
            /* Toggle of customer details */
            function hide_show_customer() {

                $("#customer_pickup").hide();
                $( "#icon_customer_pickup_toggle" ).removeClass("la-angle-up");
                $( "#icon_customer_pickup_toggle" ).addClass("la-angle-down");
                $("#customer_shipto").hide();
                $( "#icon_customer_shipto_toggle" ).removeClass("la-angle-up");
                $( "#icon_customer_shipto_toggle" ).addClass("la-angle-down");
                if ( $( "#customer_details" ).is( ":hidden" ) ) {
                    $( "#customer_details" ).slideDown();
                    $( "#icon_customer_details_toggle" ).removeClass("la-angle-down");
                    $( "#icon_customer_details_toggle" ).addClass("la-angle-up");
                } else {
                    $( "#customer_details" ).slideUp();
                    $( "#icon_customer_details_toggle" ).removeClass("la-angle-up");
                    $( "#icon_customer_details_toggle" ).addClass("la-angle-down");
                }
            }

            /* Toggle of customer details */
            function hide_show_shipto() {
                $("#customer_details").hide();
                $( "#icon_customer_details_toggle" ).removeClass("la-angle-up");
                $( "#icon_customer_details_toggle" ).addClass("la-angle-down");
                $("#customer_pickup").hide();
                $( "#icon_customer_pickup_toggle" ).removeClass("la-angle-up");
                $( "#icon_customer_pickup_toggle" ).addClass("la-angle-down");
                if ( $( "#customer_shipto" ).is( ":hidden" ) ) {
                    $( "#customer_shipto" ).slideDown();
                    $( "#icon_customer_shipto_toggle" ).removeClass("la-angle-down");
                    $( "#icon_customer_shipto_toggle" ).addClass("la-angle-up");
                } else {
                    $( "#customer_shipto" ).slideUp();
                    $( "#icon_customer_shipto_toggle" ).removeClass("la-angle-up");
                    $( "#icon_customer_shipto_toggle" ).addClass("la-angle-down");
                }
            }

            /* Toggle of customer details */
            function hide_show_pickup() {
                $("#customer_shipto").hide();
                $( "#icon_customer_shipto_toggle" ).removeClass("la-angle-up");
                $( "#icon_customer_shipto_toggle" ).addClass("la-angle-down");
                $("#customer_details").hide();
                $( "#icon_customer_details_toggle" ).removeClass("la-angle-up");
                $( "#icon_customer_details_toggle" ).addClass("la-angle-down");
                if ( $( "#customer_pickup" ).is( ":hidden" ) ) {
                    $( "#customer_pickup" ).slideDown();
                    $( "#icon_customer_pickup_toggle" ).removeClass("la-angle-down");
                    $( "#icon_customer_pickup_toggle" ).addClass("la-angle-up");
                } else {
                    $( "#customer_pickup" ).slideUp();
                    $( "#icon_customer_pickup_toggle" ).removeClass("la-angle-up");
                    $( "#icon_customer_pickup_toggle" ).addClass("la-angle-down");
                }
            }


           
            /* Ship to table */
            var m_datatables = null;
            var DatatableRemoteAjaxDemo = function() {
            var t = function() {
            var t = $(".m_datatable").mDatatable({
                        data: {
                            type: "remote",
                            source: {
                                read: {
                                    url: "<?php echo site_url('company/pickup/shipto_ajax_list/') ?>",
                                    method: 'GET',
                                    params: {
                                        customer_id: $("#customer_id").val()
                                    }
                                }, 
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
                            field: "fname",
                            title: "<?php echo $this->lang->line('label_first_name'); ?>",
                        },
                        {
                            field: "lname",
                            title: "<?php echo $this->lang->line('label_last_name'); ?>",
                        },
                        {
                            field: "address",
                            title: "<?php echo $this->lang->line('label_address'); ?>",
                        }, {
                            field: "telephone_number",
                            title: "<?php echo $this->lang->line('label_telephone'); ?>",
                        }, {
                            field: "cellphone_number",
                            title: "<?php echo $this->lang->line('label_cellphone'); ?>",
                        },
                        {
                            field: "province",
                            title: "<?php echo $this->lang->line('label_province'); ?>",
                        },
                        {
                            field: "Use",
                            title: "Use",
                            template:function(t){
                                return '\t\t\t\t\t\t\t\t\t\t\t<input  type = "radio" class = "use_shipto "name = "use_shipto" data-id = "'+t.id+'" style = "height:20px; width:20px;"/>';
                            }
                        },
                        {
                            field: "province",
                            title: "<?php echo $this->lang->line('label_province'); ?>",
                        },
                        {
                            field: "Actions",
                            title: "<?php echo $this->lang->line('label_actions'); ?>",
                            sortable: !1,
                            overflow: "visible",
                            template: function(t) {
                                /*\t\t\t\t\t\t<a href="<?php echo base_url()."company/pickup/view_shipto/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-eye"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t</a>\t\t\t\t\t\t</a>*/
                                return '\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url()."company/customer/edit_shipto/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" >\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>'+
                                '\t\t\t\t\t\t\t\t\t\t\t<a href="javascript:;" onclick="delete_shipto('+t.id+')" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" >\t\t\t\t\t\t\t<i class="la la-trash"></i>\t\t\t\t\t\t</a>'+
                                '\t\t\t\t\t\t\t\t\t\t\t<a href="javascript:;" title = "Use this shipto for current pickup" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" >\t\t\t\t\t\t\t<i class="la la-copy"></i>\t\t\t\t\t\t</a>';

                            }
                        }]
                    }),
                    e = t.getDataSourceQuery();
                    m_datatables = t;
                    $("#m_form_search").on("keyup", function(e) {
                        var a = t.getDataSourceQuery();
                        a.generalSearch = $(this).val().toLowerCase(), t.setDataSourceQuery(a), t.load()
                    }).val(e.generalSearch), $("#m_form_status").on("change", function() {
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

            
            function delete_shipto(id) 
            {
                swal({   
                    title: "<?php echo $this->lang->line('label_are_you_sure') ?>",
                    text: "<?php echo $this->lang->line('label_you_want_to_delete_shipto') ?>",
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "<?php echo $this->lang->line('label_confirm') ?>",
                }).then(function () {
                    $.ajax({
                        url:  "<?php echo base_url(); ?>company/pickup/delete_shipto/"+id,
                        type: "GET",
                        success: function(data)
                        {
                            //$('#user_table').bootstrapTable('refresh');
                            //$(".m_datatable").mDatatable().ajax.reload();
                            //DatatableRemoteAjaxDemo.init();
                            m_datatables.reload();
                        },
                            error: function(jqXHR, textStatus, errorThrown){                
                        },
                            complete: function(){
                        }
                    }); // END OF AJAX CALL
                    
                });
                }

                $(document).ready(function(){
                    setTimeout(function(){
                        $("#pickup_time").val('<?=$result["pickup_time"]?>');
                    },1500)
                })

        </script>
    