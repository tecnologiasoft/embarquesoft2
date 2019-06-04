<!-- END: Subheader -->
<div class="m-content">
   <!--begin::Form-->
   <?php

      $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'm_form_1','enctype'=>'multipart/form-data'); 
      echo form_open('company/customer/update/',$form_data); 
      ?>
   <input type="hidden" name="id" value="<?php if(!empty($result['id'])) echo $result['id']; else set_value('id'); ?>">
   <div class="row">
      <div class="col-xl-12">
         <div class="m-portlet m-portlet--full-height m-portlet--tabs">
            <div class="m-portlet__head">
               <div class="m-portlet__head-tools">
                  <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--4x m-tabs-line--left m-tabs-line--primary" role="tablist">
                     <li class="nav-item m-tabs__item tab1" id="tab1">
                        <a class="nav-link m-tabs__link active tab1" data-toggle="tab" href="#m_user_profile_tab_1 " role="tab" data-tab_id = "1" id="tab1">
                        <i class="flaticon-share m--hide"></i>
                        <?php echo $this->lang->line('menu_customer'); ?>
                        </a>
                     </li>
                     <li class="nav-item m-tabs__item tab3" id="tab3">
                        <a class="nav-link m-tabs__link tab3" data-toggle="tab" href="#m_user_profile_tab_3" role="tab" data-tab_id = "3" id="tab3">
                        <?php echo $this->lang->line('label_invoice'); ?>
                        </a>
                     </li>
                     <li class="nav-item m-tabs__item tab4" id="tab4">
                        <a id="payment_list" class="nav-link m-tabs__link tab4" data-toggle="tab" href="#m_user_profile_tab_4" role="tab" data-tab_id = "4" id="tab4">
                        <?php echo $this->lang->line('label_payments'); ?>
                        </a>
                     </li>
                     <li class="nav-item m-tabs__item tab7" id="tab7">
                        <a class="nav-link m-tabs__link tab7" data-toggle="tab" href="#m_user_profile_tab_7" role="tab" data-tab_id = "7" id="tab7">
                        <?php echo $this->lang->line('label_ship_to'); ?>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="tab-content">
               <div class="tab-pane active" id="m_user_profile_tab_1">
                  <div class="m-portlet__body">
                     <div class="m-form__section m-form__section--first">
                        <div class = "row">
                           <div class="col-lg-6">
                              <div class="row mb-3">
                                 <?php 
                                 //print_r($result);
                                 //echo $result['agent_code'];?>
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 *
                                 <?php echo $this->lang->line('label_customer_id'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="customer_id" id="customer_id" placeholder="<?php echo $this->lang->line('label_customer_id'); ?>" value="<?php if(!empty($result['id'])) echo $result['id']; else echo set_value('customer_id'); ?>" maxlength="20" disabled>
                                    <?php echo form_error('customer_id'); ?>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_company'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="company_name" id="company_name" placeholder="<?php echo $this->lang->line('label_company'); ?>" value="<?php if(!empty($result['company_name'])) echo $result['company_name']; else echo set_value('company_name'); ?>" maxlength="128">
                                    <?php echo form_error('company_name'); ?>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 *
                                 <?php echo $this->lang->line('label_first_name'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="fname" id="fname" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php if(!empty($result['fname'])) echo $result['fname']; else echo set_value('fname'); ?>" maxlength="64">
                                    <?php echo form_error('fname'); ?>
                                    <div class="form-control-feedback" id="fname_msg" style="display: none;">This field is required.</div>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 *
                                 <?php echo $this->lang->line('label_last_name'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="lname" id="lname" placeholder="<?php echo $this->lang->line('label_last_name'); ?>" value="<?php if(!empty($result['lname'])) echo $result['lname']; else echo set_value('lname'); ?>" maxlength="64">
                                    <?php echo form_error('lname'); ?>
                                    <div class="form-control-feedback" id="lname_msg" style="display: none;">This field is required.</div>
                                 </div>
                              </div>
                              
                              <div class="row mb-3">
                                    <label class="form_label col-md-4 col-lg-3 text-right">
                                    *
                                    <?php echo $this->lang->line('label_address'); ?>:
                                    </label>
                                    <div class="col-md-2 col-lg-4">
                                       <input type="text" class="form-control m-input" name="address_line1" id="address_line1" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php if(!empty($result['address_line1'])) echo $result['address_line1']; else echo set_value('address_line1'); ?>"  >
                                       <input type="hidden" name="latitude" id="latitude" value="<?php if(!empty($result['latitude'])) echo $result['latitude']; else echo set_value('latitude'); ?>">
                                       <input type="hidden" name="longitude" id="longitude" value="<?php if(!empty($result['longitude'])) echo $result['longitude']; else echo set_value('longitude'); ?>">
                                       <?php echo form_error('address'); ?>
                                       <div class="form-control-feedback" id="address_line1_msg" style="display: none;">This field is required.</div>
                                    </div>

                                    <label class="form_label col-md-4 col-lg-2 p-1">
                                    
                                    <?php echo $this->lang->line('apartment'); ?>:
                                    </label>

                                    <div class="col-md-2 col-lg-3">
                                       <input type="text" class="form-control m-input" name="apartment" id="apartment" placeholder="<?php echo $this->lang->line('apartment'); ?>" value="<?php if(!empty($result['apartment'])) echo $result['apartment']; else echo set_value('apartment'); ?>"  >
                                       
                                       <?php echo form_error('apartment'); ?>
                                    </div>
                                 
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_address'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="address_line2" id="address_line2" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php if(!empty($result['address_line2'])) echo $result['address_line2']; else echo set_value('address_line2'); ?>" maxlength="256">
                                    <?php echo form_error('address_line2'); ?>
                                 </div>
                              </div>

                              

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 *<?php echo $this->lang->line('label_city'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="city" id="city" placeholder="<?php echo $this->lang->line('label_city'); ?>" value="<?php if(!empty($result['city'])) echo $result['city']; else echo set_value('city'); ?>" maxlength="64">
                                    <?php echo form_error('city'); ?>
                                    <div class="form-control-feedback" id="city_msg" style="display: none;">This field is required.</div>
                                 </div>
                              </div>


                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 *
                                 <?php echo $this->lang->line('label_state'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="state" id="state" placeholder="<?php echo $this->lang->line('label_state'); ?>" value="<?php if(!empty($result['state'])) echo $result['state']; else echo set_value('state'); ?>" maxlength="64">
                                    <?php echo form_error('state'); ?>
                                    <div class="form-control-feedback" id="state_msg" style="display: none;">This field is required.</div>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_zipcode'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="zipcode" id="zipcode" placeholder="<?php echo $this->lang->line('label_zipcode'); ?>" value="<?php $result['zipcode'] ? $result['zipcode'] : set_value('zipcode')?>" maxlength="32">
                                    <?php echo form_error('zipcode'); ?>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_branch'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <select class = "form-control m-input test" name="branch" id="branch" style="pointer-events: all !important";>
                                       <option value = ""><?php echo $this->lang->line('select').' '.$this->lang->line('label_branch'); ?></option>
                                       <?php if(count($branch_list) > 0){
                                          foreach($branch_list as $val) {   
                                          ?>
                                       <option value = "<?php echo $val->id; ?>" <?php echo $val->id == $result['branch_id'] ? "selected":"" ?>><?php echo $val->branch_name; ?></option>
                                       <?php } } else{?>
                                       <option value = ""><?php echo $this->lang->line('label_branch').' '.$this->lang->line('not_found'); ?></option>
                                       <?php } ?>
                                    </select>
                                    <?php echo form_error('branch'); ?>
                                     <div class="form-control-feedback" id="branch_msg" style="display: none;">This field is required.</div>
                                 </div>
                              </div>


                            </div>
                              <div class="col-lg-6">
                                 <div class="row mb-3">
                                    <label class="form_label col-md-4 col-lg-3 text-right">
                                     <?php echo $this->lang->line('label_telephone_number'); ?>:
                                    </label>
                                    <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="telephone_number" id="telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php if(!empty($result['telephone_number'])) echo $result['telephone_number']; else  echo set_value('telephone_number'); ?>" maxlength="12">
                                       <?php echo form_error('telephone_number'); ?>
                                       <div class="form-control-feedback" id="telphone_number_msg" style="display: none;">This field is required and should be 10 digit.</div>
                                    </div>
                                 </div>
                                 <div class="row mb-3">
                                    <label class="form_label col-md-4 col-lg-3 text-right">
                                    * <?php echo $this->lang->line('label_cellphone_number'); ?>:
                                    </label>
                                    <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="cellphone_number" id="cellphone_number" placeholder="<?php echo $this->lang->line('label_cellphone_number'); ?>" value="<?php if(!empty($result['cellphone_number'])) echo $result['cellphone_number']; else echo set_value('cellphone_number'); ?>" maxlength="16">
                                       <?php echo form_error('cellphone_number'); ?>
                                       <div class="form-control-feedback" id="cellphone_number_msg" style="display: none;">This field is required and should be 10 digit.</div>
                                    </div>
                                 </div>
                                 <div class="row mb-3">
                                    <label class="form_label col-md-4 col-lg-3 text-right">
                                    
                                    <?php echo $this->lang->line('label_email'); ?>:
                                    </label>
                                    <div class="col-md-8 col-lg-9">
                                       <input type="email" class="form-control m-input" name="email" id="email" placeholder="<?php echo $this->lang->line('label_email'); ?>" value="<?php if(!empty($result['email'])) echo $result['email']; else echo set_value('email'); ?>" maxlength="128">
                                       <?php echo form_error('email'); ?>
                                    </div>
                                 </div>
                                 <div class="row mb-3">
                                    <label class="form_label col-md-4 col-lg-3 text-right">
                                    <?php echo $this->lang->line('label_website'); ?>:
                                    </label>
                                    <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="website" id="website" placeholder="<?php echo $this->lang->line('label_website'); ?>" value="<?php if(!empty($result['website'])) echo $result['website']; else echo set_value('website'); ?>">
                                       <?php echo form_error('website'); ?>
                                    </div>
                                 </div>
                              
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_lic_id'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="lic_id" id="lic_id" placeholder="<?php echo $this->lang->line('label_lic_id'); ?>" value="<?php if(!empty($result['lic_id'])) echo $result['lic_id']; else echo set_value('lic_id'); ?>" maxlength="20">
                                    <?php echo form_error('lic_id'); ?>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_lic_picture'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="file" class="form-control m-input" name="lic_picture" id="lic_picture" accept="image/*" data-show-preview="true" data-show-upload="false" data-show-caption="true" data-msg-placeholder="<?php echo $this->lang->line('label_lic_picture'); ?>">
                                    <?php if(!empty($result['lic_picture'])){ ?>
                                    <img src="<?php echo base_url().CUSTOMER_IMAGES.$result['lic_picture']; ?>" class="img-responsive img-thumb" style="height: 90px; width: 150px;">
                                    <?php } ?>
                                    <?php echo form_error('lic_picture'); ?>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_agent_code'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">

                                    <!-- <input type="text" class="form-control m-input" name="agent_code" id="agent_code" placeholder="<?php //echo $this->lang->line('label_agent_code'); ?>" value="<?php //if(!empty($result['agent_code'])) echo $result['agent_code']; else //echo set_value('agent_code'); ?>" maxlength="16"> -->
                                    <input  class="form-control m-input" name="agent_code" placeholder="<?php echo $this->lang->line('label_agent_code'); ?>" id="agent_code" readonly type="text" maxlength="16" onfocus="if (this.hasAttribute('readonly')) { this.removeAttribute('readonly');this.blur();this.focus();}" value="<?php if(!empty($result['agent_code'])) echo $result['agent_code']; else //echo set_value('agent_code'); ?>"/>

                                    <?php echo form_error('agent_code'); ?>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_password'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="password" name="password" id="password" class="form-control m-input" placeholder="<?php echo $this->lang->line('label_password'); ?>" value="<?php //echo set_value('password'); ?>">
                                    <?php echo form_error('password'); ?>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 *
                                 <?php echo $this->lang->line('label_language'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <div class="m-radio-inline">
                                       <label class="m-radio">
                                       <input name="language" value="English" type="radio" <?php if(!empty($result['language']) && $result['language']=="English" ) echo "checked" ; ?> >
                                       English
                                       <span></span>
                                       </label>
                                       <label class="m-radio">
                                       <input name="language" value="Spanish" type="radio" <?php if(!empty($result['language']) && $result['language']=="Spanish" ) echo "checked" ; ?> >
                                       Español
                                       <span></span>
                                       </label>
                                    </div>
                                 </div>
                                 <?php echo form_error('language'); ?>
                              </div>
                           </div>
                        </div>
                        <div class="form-group m-form__group row">
                           <div class="col-lg-9 ml-lg-auto m-form__actions">
                              <button type="submit" class="btn btn-success" value="update">
                              <?php echo $this->lang->line('label_submit'); ?>
                              </button>
                              <a href="<?php echo base_url('company/customer'); ?>" class="btn btn-secondary">
                              <?php echo $this->lang->line('label_back'); ?>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane" id="m_user_profile_tab_2">
                  <div class="m-portlet__body">
                     <div class="m-form__section m-form__section--first">
                     </div>
                  </div>
               </div>
               <div class="tab-pane" id="m_user_profile_tab_3">
                  <?php 
                     /*$tot = count($invoice);
                     echo $tot;
                     echo "<pre>";
                     print_r($invoice); 
                     echo "</pre>";*/ 
                  ?>
                  <div class="mm_datatable" id="ajax_data"></div>

                  <!-- <div class="v m-datatable m-datatable--default m-datatable--loaded" id="ajax_data" style="">
                     <table class="m-datatable__table" id="m-datatable" style="display: block; height: auto; overflow-x: auto;">
                        <thead class="m-datatable__head">
                           <tr class="m-datatable__row" style="height: 40px;">
                           <th data-field="id" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--sort">
                           <span style="width: 50px;">#</span></th>
                           <th data-field="name" class="m-datatable__cell m-datatable__cell--sort">
                              <span style="width: 116px;">Customer</span>
                           </th>
                           <th data-field="invoice_number" class="m-datatable__cell m-datatable__cell--sort">
                              <span style="width: 116px;">Invoice Number</span>
                           </th>
                           <th data-field="invoice_date" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 116px;">Date</span></th>
                           <th data-field="sub_total" class="m-datatable__cell m-datatable__cell--sort">
                              <span style="width: 116px;">Amount</span>
                           </th>
                           <th data-field="balance" class="m-datatable__cell m-datatable__cell--sort">
                              <span style="width: 116px;">Balance</span>
                           </th>
                           <th data-field="payments" class="m-datatable__cell m-datatable__cell--sort">
                              <span style="width: 116px;">Pay</span>
                           </th>
                           <th data-field="Actions" class="m-datatable__cell m-datatable__cell--sort">
                              <span style="width: 155px;">Actions</span>
                           </th>
                           </tr>
                        </thead>
                        <tbody class="m-datatable__body" style="">

                           <tr data-row="0" class="m-datatable__row m-datatable__row--even" style="height: 49px;">
                              <td data-field="id" class="m-datatable__cell--center m-datatable__cell">
                                 <span style="width: 50px;">49</span>
                              </td>
                              <td data-field="name" class="m-datatable__cell">
                                 <span style="width: 116px;">codingtest codingtest</span>
                              </td>
                              <td data-field="invoice_number" class="m-datatable__cell">
                                 <span style="width: 116px;">111</span>
                              </td>
                              <td data-field="invoice_date" class="m-datatable__cell">
                                 <span style="width: 116px;">2019-02-04</span>
                              </td>
                              <td data-field="sub_total" class="m-datatable__cell"><span style="width: 116px;">
                                 <span id="p_49">1132.00</span></span>
                              </td>
                              <td data-field="balance" class="m-datatable__cell">
                                 <span style="width: 116px;">
                                    <input type="hidden" name="tbalance" value="972.00" id="tbalance49">
                                    <span id="sp_49">972.00</span>
                                 </span>
                              </td>
                              <td data-field="payments" class="m-datatable__cell">
                                 <span style="width: 116px;">
                                    <input type="text" class="form-control m-input partial_amount" id="49" data-id="49" name="total_payment[]" placeholder="00.00">
                                 </span>
                              </td>
                              <td data-field="Actions" class="m-datatable__cell">
                                 <span style="overflow: visible; width: 155px;">
                                    <a href="javascript:void(0);" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill btn_apply" id="btn_apply_49" data-btntype="apply" data-id="49">Apply</a>
                                    <a href="javascript:void(0);" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill btn_stop" data-btntype="stop" id="btn_stop_49" data-id="49" style="display:none;">Remove</a>
                                 </span>
                              </td>
                           </tr>
                        </tbody>
                     </table>   
                  </div> -->
               </div>
               <div class="tab-pane" id="m_user_profile_tab_4">
               </div>
               <div class="tab-pane" id="m_user_profile_tab_5">
               </div>
               <div class="tab-pane" id="m_user_profile_tab_6">
               </div>
               <div class="tab-pane" id="m_user_profile_tab_7">
                  <div class="m-portlet__body">
                     <!--begin: Search Form -->
                     <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                        <div class="row align-items-center">
                           <div class="col-xl-8 order-2 order-xl-1">
                              <div class="form-group m-form__group row align-items-center">
                                 <div class="col-md-4">
                                    <div class="m-input-icon m-input-icon--left">
                                       <input type="text" class="form-control m-input high-input   " placeholder=" <?php echo $this->lang->line('label_search'); ?>" id="m_form_search">
                                       <span class="m-input-icon__icon m-input-icon__icon--left">
                                       <span>
                                       <i class="la la-search"></i>
                                       </span>
                                       </span>
                                    </div>
                                 </div>
                                 <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                    <a href="<?php echo site_url('company/customer/add_shipto/').$result['id']; ?>" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
      </div>
   </div>
   <!-- <div class="row">
      <div class="col-md-12">
          <div class="m-portlet__foot m-portlet__foot--fit">
              <div class="m-form__actions m-form__actions">
                  <div class="row">
                      <div class="col-lg-7 ml-lg-auto m-form__actions">
                          <button type="submit" class="btn btn-success" value="update">
                              Submit
                          </button>
                          <button type="reset" class="btn btn-secondary">
                              Reset
                          </button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </div> -->
   </form>
   <div class="clear clear-fix"></div>
</div>
<div class="clear clear-fix"></div>
<div class="clear clear-fix"></div>
<!-- end:: Page -->
<!-- script file for File input -->
<!-- initialization of file upload and date picker -->
<script type="text/javascript">
   /* Ship to table */
   var m_datatables = null;
   var DatatableRemoteAjaxDemo = function() {
   var t = function() {
   var t = $(".m_datatable").mDatatable({
               data: {
                   type: "remote",
                   source: {
                       read: {
                           url: "<?php echo site_url('company/customer/shipto_ajax_list/') ?>",
                           method: 'GET',
                           params: {
                               customer_id: "<?php echo $result['id']; ?>"
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
                   textAlign: "center",
                   template: function(t) {
                       return '\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url()."company/customer/edit_shipto/";?>'+t.id+'" class="">\t\t\t\t\t\t\t'+t.id+'\t\t\t\t\t\t</a>'
                   }
               }, {
                   field: "name",
                   title: "<?php echo $this->lang->line('label_name'); ?>",
               }, {
                   field: "address",
                   title: "<?php echo $this->lang->line('label_address'); ?>",
               }, {
                   field: "telephone_number",
                   title: "<?php echo $this->lang->line('label_telephone'); ?>",
               }, {
                   field: "cellphone_number",
                   title: "<?php echo $this->lang->line('label_cellphone'); ?>",
               },{
                   field: "Actions",
                   title: "<?php echo $this->lang->line('label_actions'); ?>",
                   sortable: !1,
                   overflow: "visible",
                   template: function(t) {
                       /*\t\t\t\t\t\t<a href="<?php echo base_url()."company/customer/view_shipto/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-eye"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t</a>\t\t\t\t\t\t</a>*/
                       return '\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url()."company/customer/edit_shipto/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" >\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t\t\t\t\t\t<a href="javascript:;" onclick="delete_shipto('+t.id+')" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" >\t\t\t\t\t\t\t<i class="la la-trash"></i>\t\t\t\t\t\t</a>'
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
      DatatableRemoteAjaxDemo1.init()
   });
   
   /*$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
       var tab_id = $(e.target).data("tab_id") // activated tab
   $('')
       document.cookie = "tab-pane="+tab_id; 
       $('.tab-pane').not(this).removeClass('active');
       $('#m_user_profile_tab_'+tab_id).toggleClass('active');
   })*/

   $(document).on('click','#payment_list',function(){
         var id = "<?=$this->uri->segment(4);?>";
         $.ajax({
            //url:"<?=base_url('company/customer/payment_get_invoice_list');?>",
            url:"<?=base_url('company/customer/payment_data_list');?>",
            type:"POST",
            data:{id:id},
            success:function(res){
             data = JSON.parse(res);    
             console.log(data);  
             $('#m_user_profile_tab_4').html(data.data);     
            }
         });
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
               url:  "<?php echo base_url(); ?>company/customer/delete_shipto/"+id,
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
   
   /* Pickup table */
   var pickup_datatables = null;
   var GetPickupDdatatables = function() {
   var t = function() {
   var t = $("#pickup_datatable").mDatatable({
               data: {
                   type: "remote",
                   source: {
                       read: {
                           url: "<?php echo site_url('company/customer/pickup_ajax_list/') ?>",
                           method: 'GET',
                           params: {
                               customer_id: "<?php echo $result['id']; ?>"
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
                   field: "name",
                   title: "<?php echo $this->lang->line('label_name'); ?>",
               }, {
                   field: "address",
                   title: "<?php echo $this->lang->line('label_address'); ?>",
               }, {
                   field: "telephone_number",
                   title: "<?php echo $this->lang->line('label_telephone'); ?>",
               }, {
                   field: "cellphone_number",
                   title: "<?php echo $this->lang->line('label_cellphone'); ?>",
               }, {
                   field: "pickup_date",
                   title: "<?php echo $this->lang->line('label_pickup_date'); ?>",
               }, {
                   field: "status",
                   title: "<?php echo $this->lang->line('label_status'); ?>",
               }, {
                   field: "Actions",
                   title: "<?php echo $this->lang->line('label_actions'); ?>",
                   sortable: !1,
                   overflow: "visible",
                   template: function(t) {
                       return '\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url()."company/pickup/edit/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" target="_blank">\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>'
                   }
               }]
           }),
           e = t.getDataSourceQuery();
           pickup_datatables = t;
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
      $('a.m-tabs__link').click(function() { 
         alert(id);
      });
      $('#tab1').click(function(){
         $('#m_user_profile_tab_3').removeClass('active');
         //$('#m_user_profile_tab_4').removeClass('active');
         $('#m_user_profile_tab_7').removeClass('active');
         $('#payment_list').removeClass('active');
      });
      $('#tab3').click(function(){
          $('#m_user_profile_tab_7').removeClass('active');
          $('#m_user_profile_tab_4').removeClass('active');
          $('#m_user_profile_tab_3').removeClass('active');
      });
      $('#tab7').click(function(){
         $('#m_user_profile_tab_3').removeClass('active');
         $('#m_user_profile_tab_4').removeClass('active');
         $('#payment_list').removeClass('active');
      });
     
      $('#payment_list').click(function(){
         $('#m_user_profile_tab_3').removeClass('active');
         $('#m_user_profile_tab_4').removeClass('active');
         $('#m_user_profile_tab_7').removeClass('active');
      });
       /*$('tab4').click(function(){
         $('#m_user_profile_tab_3').removeClass('active');
         $('#m_user_profile_tab_7').removeClass('active');
         $('#payment_list').removeClass('active');
      });*/
      
      //$("#fname").css("color", "red");
      //$('#branch').attr('style', 'pointer-events: all !important');
      /*$( "#branch" ).addClass( "pointerchange yourClass" );
      $("#branch").removeAttr("style");*/
      var fname= $('#fname').val();
      var lname= $('#lname').val();
      var address_line1= $('#address_line1').val();
      var city= $('#city').val();
      var state= $('#state').val();
      //var branch= $('#branch').val();
      var celno  =jQuery('input#cellphone_number').val();
      var telno  =jQuery('input#telephone_number').val();
      var nolength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(celno);
      var tellength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(telno);
      $("#fname").change(function() {
           var fname = $('#fname').val();
           if(fname != ''){
               jQuery('#fname_msg').hide();
               return true;
            }
      });
      $("#lname").change(function() {
           var fname = $('#lname').val();
           if(fname != ''){
               jQuery('#lname_msg').hide();
               return true;
            }
      });
      $("#address_line1").change(function() {
           var fname = $('#address_line1').val();
           if(fname != ''){
               jQuery('#address_line1_msg').hide();
               return true;
            }
      });
      $("#city").change(function() {
           var fname = $('#city').val();
           if(fname != ''){
               jQuery('#city_msg').hide();
               return true;
            }
      });
      $("#state").change(function() {
           var fname = $('#state').val();
           if(fname != ''){
               jQuery('#state_msg').hide();
               return true;
            }
      });
      /*$("#branch").change(function() {
           var fname = $('#branch').val();
           if(fname != ''){
               jQuery('#branch_msg').hide();
               return true;
            }
      });*/
      $("#cellphone_number").change(function() {
         //alert("test");          //var fname = $('input#cellphone_number').val();
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
               jQuery('#telphone_number_msg').show();
               $(this).focus();
               return false;
            }else{
               //alert("true");
               jQuery('#telphone_number_msg').hide();
               return true;
            }
      });
      //alert("test");
      jQuery('button.btn.btn-success').click(function(){
         //alert("test");
         var fname= $('#fname').val();
         var lname= $('#lname').val();
         var address_line1= $('#address_line1').val();
         var city= $('#city').val();
         var state= $('#state').val();
         //var branch= $('#branch').val();
         var celno  =jQuery('input#cellphone_number').val();
         var telno  =jQuery('input#telephone_number').val();
         var nolength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(celno);
         //var tellength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(telno);

         if(fname == '' && lname == '' && address_line1 == '' && city == '' && state == '' && nolength== false ){
            jQuery('#fname_msg').show();
            jQuery('#lname_msg').show();
            jQuery('#address_line1_msg').show();
            jQuery('#city_msg').show();
            jQuery('#state_msg').show();
            //jQuery('#branch_msg').show();
            jQuery('#telphone_number_msg').show();
            jQuery('#cellphone_number_msg').show();
            return false;
         }else{   
            if(fname == ''){
               jQuery('#fname_msg').show();
               return false;
            }else if(lname == ''){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').show();
               return false;
            }else if(address_line1 == ''){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').hide();
               jQuery('#address_line1_msg').show();
               return false;
            }else if(city == ''){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').hide();
               jQuery('#address_line1_msg').hide();
               jQuery('#city_msg').show();
               return false;
            }else if(state == ''){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').hide();
               jQuery('#address_line1_msg').hide();
               jQuery('#city_msg').hide();
               jQuery('#state_msg').show();
               return false;
            }else if(branch == ''){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').hide();
               jQuery('#address_line1_msg').hide();
               jQuery('#city_msg').hide();
               jQuery('#state_msg').hide();
               //jQuery('#branch_msg').show();
               //return false;
            }/*else if(tellength == false){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').hide();
               jQuery('#address_line1_msg').hide();
               jQuery('#city_msg').hide();
               jQuery('#state_msg').hide();
               jQuery('#branch_msg').hide();
               jQuery('#telphone_number_msg').show();
               return false;
            }*/else if( nolength== false){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').hide();
               jQuery('#address_line1_msg').hide();
               jQuery('#city_msg').hide();
               jQuery('#state_msg').hide();
               jQuery('#branch_msg').hide();
               //jQuery('#telphone_number_msg').hide();
               jQuery('#cellphone_number_msg').show();
               return false;
            }
            else{
               return true;
            }
         }
      });
       $("input[type = 'password']").val('')
      
       GetPickupDdatatables.init()
   });
</script>
<script type="text/javascript">
   var mm_datatables = null;
   var DatatableRemoteAjaxDemo1 = function() {
      var tt = function() {
      var tt = $(".mm_datatable").mDatatable({
          data: {
              type: "remote",
              source: {
                  read: {
                     url: "<?php echo site_url('company/customer/invoice_list/') ?>",
                     method: 'GET',
                     params: {
                         customer_id: "<?php echo $result['id']; ?>"
                     }
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
              textAlign: "center",
              template: function(t) {
                  <?php if($this->rights->access('company/customer/add') != 'javascript:void(0);') { ?>
                  return '\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url()."company/customer/edit/";?>'+t.id+'" class="">\t\t\t\t\t\t\t'+t.id+'\t\t\t\t\t\t</a>'
                   <?php } ?>
              } 

          }, {
              field: "invoice_number",
              title: "Invoice No.", 
              
          }, {
              field: "sub_total",
              title: "Total Amount",
          }, {
              field: "payments",
              title: "<?php echo $this->lang->line('label_payment'); ?>",
              
          },{
              field: "final_balance",
              title: "<?php echo $this->lang->line('label_balance'); ?>",
              template:function(tv){
                  var bal = tv.final_balance=== null ? '00.00' : tv.final_balance;
                  return '<span>'+bal+'</span>'
              }
          }, {
              field: "invoice_date",
              title: "<?php echo $this->lang->line('label_invoice_date'); ?>",
          }]
      }),
      e = tt.getDataSourceQuery();
        mm_datatables = tt;
        $("#m_form_search").on("keyup", function(e) {
            var a = t.getDataSourceQuery();
            a.generalSearch = $(this).val().toLowerCase(), tt.setDataSourceQuery(a), tt.load()
        }).val(e.generalSearch), $("#m_form_status").on("change", function() {
            var e = tt.getDataSourceQuery();
            e.Status = $(this).val().toLowerCase(), tt.setDataSourceQuery(e), tt.load()
        }).val(void 0 !== e.Status ? e.Status : ""), $("#m_form_type").on("change", function() {
            var e = tt.getDataSourceQuery();
            e.Type = $(this).val().toLowerCase(), tt.setDataSourceQuery(e), tt.load()
        }).val(void 0 !== e.Type ? e.Type : ""), $("#m_form_status, #m_form_type").selectpicker()
      };
      return {
        init: function() {
            tt()
        }
      }
   }();
   jQuery(document).ready(function() {
      //DatatableRemoteAjaxDemo.init()
   });
</script> 
