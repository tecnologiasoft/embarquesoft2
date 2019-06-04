


<div class="m-content">
   <!--begin::Form-->
   <?php 
      $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'm_form_1','enctype'=>'multipart/form-data'); 
      echo form_open('company/customer/edit_shipto/'.$result['id'],$form_data); 
      ?> 

   <div class="row">
      <div class="col-xl-12">
         <div class="m-portlet m-portlet--tab">
            <div class="m-portlet__body">
               <div class="m-form__section m-form__section--first">
                  <div class="m-form__heading">
                     <h3 class="m-form__heading-title">
                        <?php echo $this->lang->line('label_shipto_details'); ?>
                     </h3>
                  </div>
                  <input type="hidden" name="customer_id" value="<?php echo $result['customer_id']; ?>">
                  <div class="form-group m-form__group row">
                     <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                            <span id="astric">*</span><?php echo $this->lang->line('label_shipto_id'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="shipto_id" id="shipto_id" placeholder="<?php echo $this->lang->line('label_shipto_id'); ?>" value="<?=$result['id']?>" maxlength="20" readonly >
                              <?php echo form_error('shipto_id'); ?>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                           <span id="astric">*</span><?php echo $this->lang->line('label_telephone'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="telephone" id="telephone" placeholder="<?php echo $this->lang->line('label_telephone'); ?>" value="<?=set_value('telephone')?set_value('telephone'):$result['telephone_number']; ?>" maxlength="128" tabindex = "11">
                              <?php echo form_error('telephone'); ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group m-form__group row">
                     <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                           <?php echo $this->lang->line('label_company'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="company_name" id="company_name" placeholder="<?php echo $this->lang->line('label_company'); ?>" value="<?=set_value('company_name')?set_value('company_name'):$result['company_name']; ?>" maxlength="128" tabindex = "1">
                              <?php echo form_error('company_name'); ?>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                            <span id="astric">*</span><?php echo $this->lang->line('cellular'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="cellphone_number" id="cellphone_number" placeholder="<?php echo $this->lang->line('cellular'); ?>" value="<?=set_value('cellphone_number')?set_value('cellphone_number'):$result['cellphone_number']; ?>" maxlength="16" tabindex = "12">
                              <?php echo form_error('cellphone_number'); ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group m-form__group row">
                     <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                            <span id="astric">*</span><?php echo $this->lang->line('label_first_name'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="fname" id="fname" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?=set_value('fname')?set_value('fname'):$result['fname']; ?>" maxlength="64" tabindex = "2">
                              <?php echo form_error('fname'); ?>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                            <span id="astric">*</span> <?php echo $this->lang->line('label_email'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="email" class="form-control m-input" name="email" id="email" placeholder="<?php echo $this->lang->line('label_email'); ?>" value="<?=set_value('email')?set_value('email'):$result['email']; ?>" maxlength="128" tabindex = "13">
                              <?php echo form_error('email'); ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  <div class="form-group m-form__group row">
                  <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                            <span id="astric">*</span><?php echo $this->lang->line('label_last_name'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="lname" id="lname" placeholder="<?php echo $this->lang->line('label_last_name'); ?>" value="<?=set_value('lname')?set_value('lname'):$result['lname']; ?>" maxlength="128" tabindex = "3">
                              <?php echo form_error('email'); ?>
                           </div>
                        </div>
                     </div>
                     
                     <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                           <?php echo $this->lang->line('label_lic_id'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="lic_id" id="lic_id" placeholder="<?php echo $this->lang->line('label_lic_id'); ?>" value="<?php if(!empty($result['lic_id'])) echo $result['lic_id']; else echo set_value('lic_id'); ?>" maxlength="20" tabindex="14">
                              <?php echo form_error('lic_id'); ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group m-form__group row">
                  <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                            <span id="astric">*</span> <?php echo $this->lang->line('label_address'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="address" id="address" placeholder="<?php echo $this->lang->line('label_address_1'); ?>" value="<?=set_value('address')?set_value('address'):$result['address']; ?>" tabindex = "4">
                              <input type="hidden" name="latitude" id="latitude" value="<?php echo set_value('latitude'); ?>">
                              <input type="hidden" name="longitude" id="longitude" value="<?php echo set_value('longitude'); ?>">
                              <?php echo form_error('address'); ?>
                           </div>
                        </div>
                     </div>
                   
                     <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                           <?php echo $this->lang->line('label_lic_picture'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="file" class="form-control m-input" name="lic_picture" id="lic_picture" accept="image/*" data-show-preview="false" data-show-upload="false" data-show-caption="true" data-msg-placeholder="<?php echo $this->lang->line('label_lic_picture'); ?>" tabindex="15">
                              <?php if(!empty($result['lic_picture'])){ ?>
                              <img src="<?php echo base_url().SHIPT_TO_IMAGES.$result['lic_picture']; ?>" class="img-responsive img-thumb" style="height: 90px; width: 150px;">
                              <?php } ?>
                              <?php echo form_error('lic_picture'); ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group m-form__group row">
                  <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                           <?php echo $this->lang->line('label_address_2'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="address_line_1" id="address_line_1" placeholder="<?php echo $this->lang->line('label_address_2'); ?>" value="<?=set_value('address_line_1')?set_value('address_line_1'):$result['address_line1']; ?>" maxlength="256" tabindex = "5">
                              <?php echo form_error('address_line_2'); ?>
                           </div>
                        </div>
                     </div>
                     
                     <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                            <span id="astric">*</span>
                           <?php echo $this->lang->line('label_language'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <div class="m-radio-inline">
                                 <label class="m-radio">
                                 <input name="language" value="English" type="radio" <?php if(!empty($result['language']) && $result['language']=="english" ) echo "checked" ; ?> tabindex="16">
                                 English
                                 <span></span>
                                 </label>
                                 <label class="m-radio">
                                 <input name="language" value="Spanish" type="radio" <?php if(!empty($result['language']) && $result['language']=="spanish" ) echo "checked" ; ?> tabindex="17">
                                 Español
                                 <span></span>
                                 </label>
                              </div>
                           </div>
                        </div>
                        <?php echo form_error('language'); ?>
                     </div>
                  </div>
                  <div class="form-group m-form__group row">

                     <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                           <?php echo $this->lang->line('label_address_3'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="address_line_2" id="address_line_2" placeholder="<?php echo $this->lang->line('label_address_3'); ?>" value="<?=set_value('address_line_2')?set_value('address_line_2'):$result['address_line2']; ?>" maxlength="256" tabindex = "6">
                              <?php echo form_error('address_line_3'); ?>
                           </div>
                        </div>
                     </div>
                    
                     <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                            <span id="astric">*</span><?php echo $this->lang->line('label_country'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                           <?php country_dropwon($result['country']); ?>
                              
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  <div class="form-group m-form__group row">
                     <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                          <span id="astric">*</span> <?php echo $this->lang->line('label_sector'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="sector" id="state" placeholder="<?php echo $this->lang->line('label_sector'); ?>" value="<?=set_value('sector')?set_value('sector'):$result['sector']; ?>" tabindex = "9" >
                              <?php echo form_error('sector'); ?>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="form-group m-form__group row">                  
                   <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                           <span id="astric">*</span> <?php echo $this->lang->line('label_province'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="province" id="city" placeholder="<?php echo $this->lang->line('label_province'); ?>" value="<?=set_value('province')?set_value('province'):$result['province']; ?>" maxlength="64" tabindex = "7">
                              <?php echo form_error('province'); ?>
                           </div>
                        </div>
                     </div>
                  </div>


                 

                  <div class="form-group m-form__group row">
                  <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                            <span id="astric">*</span> <?php echo $this->lang->line('label_municipal'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="municipal" id="municipal" placeholder="<?php echo $this->lang->line('label_municipal'); ?>" value="<?=set_value('municipal')?set_value('municipal'):$result['municipal']; ?>" maxlength="16" tabindex = "8">
                              <?php echo form_error('municipal'); ?>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="form-group m-form__group row">
                     <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                           <span id="astric">*</span> <?php echo $this->lang->line('label_region'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="region" id="region" placeholder="<?php echo $this->lang->line('label_region'); ?>" value="<?=set_value('region')?set_value('region'):$result['region']; ?>" maxlength="64" tabindex = "10">
                              <?php echo form_error('region'); ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group m-form__group row">
                     <div class="col-lg-8 ml-lg-auto m-form__actions">
                        <button type="submit" class="btn btn-success" value="update">
                        <?php echo $this->lang->line('label_submit'); ?>
                        </button>
                        <a class="btn btn-secondary" href="<?php echo base_url('company/customer/edit/').$user_result['customer_id']; ?>">
                        <?php echo $this->lang->line('label_back'); ?>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php echo form_close(); ?>
</div>