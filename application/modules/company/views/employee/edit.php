   <!-- END: Subheader -->
   <div class="m-content">
      <!--begin::Form-->
      <?php 
         $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'm_form_1','enctype'=>'multipart/form-data'); 
         echo form_open('company/employee/edit/'.$result['id'],$form_data); 
         ?>
     <input type="hidden" name="id" value="<?php if(!empty($result['id'])) echo $result['id']; else set_value('id'); ?>">
      <div class="row">
         <div class="col-xl-12">
            <div class="m-portlet m-portlet--full-height m-portlet--tabs">
               <div class="m-portlet__head">
                  <div class="m-portlet__head-tools">
                     <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--4x m-tabs-line--left m-tabs-line--primary" role="tablist">
                        <li class="nav-item m-tabs__item">
                           <a class="nav-link m-tabs__link active " data-toggle="tab" href="#m_user_profile_tab_1 " role="tab" data-tab_id="1">
                           <i class="flaticon-share m--hide"></i>
                           <?php echo $this->lang->line('menu_employee'); ?>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="tab-content">
                  <div class="tab-pane active" id="m_user_profile_tab_1">
                     <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                           <div class="m-form__section m-form__section--first">
                              <div class="form-group m-form__group row">
                                 <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       <?php echo $this->lang->line('emp_code').'#'; ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="item_number" id="item_number" placeholder="<?php echo $this->lang->line('label_item_number'); ?>" value="<?php echo $result['id']?>" maxlength="128" disabled = "disabled">
                                          <input type="hidden" name="item_number_hdn" id="item_number_hdn" value="<?php echo $max_value; ?>">
                                          <?php echo form_error('item_number'); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       <?php echo $this->lang->line('label_email'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="email" id="email" placeholder="<?php echo $this->lang->line('label_email'); ?>" value="<?php echo $result['email']?$result['email']:set_value('email')?>" maxlength="128" tabindex = "11">
                                          <?php echo form_error('email'); ?>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group m-form__group row">
                                 <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       * <?php echo $this->lang->line('label_first_name'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="first_name" id="first_name" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php echo $result['first_name']?$result['first_name']:set_value('first_name')?>" tabindex = "1">
                                          <?php echo form_error('first_name'); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       * <?php echo $this->lang->line('label_country'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="country" id="country" placeholder="<?php echo $this->lang->line('label_country'); ?>" value="<?php echo set_value('country') ? set_value('country'):$result['country']; ?>" tabindex = "12">
                                          <?php echo form_error('country'); ?>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group m-form__group row">
                                 <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       * <?php echo $this->lang->line('label_last_name'); ?>
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="last_name" id="last_name" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php echo $result['last_name']?$result['last_name']:set_value('last_name')?>" tabindex = "2">
                                          <?php echo form_error('last_name'); ?>
                                       </div>
                                    </div>
                                 </div>
                                
                                 <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       * <?php echo $this->lang->line('label_branch'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <select class = "form-control m-input" name="branch" id="branch">
                                          
                                          <?php if(count($branch_list) > 0){
                                          ?>
                                          
                                          <?php      
                                             foreach($branch_list as $val) {   
                                             ?>
                                          <option value = "<?php echo $val->id; ?>" <?php echo $val->id == $result['branch_id'] ? "selected":""; ?>><?php echo $val->branch_name; ?></option>
                                          <?php } } else{ ?>
                                          <option value = ""><?php echo $this->lang->line('label_branch').' '.$this->lang->line('not_found'); ?></option>
                                          <?php } ?>
                                          
                                       </select>
                                    
                                       </div>
                                    </div>
                                 </div>

                              </div>
                              <div class="form-group m-form__group row">
                                 <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       <?php echo $this->lang->line('field_address_line_1'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="address1" id="address1" placeholder="<?php echo $this->lang->line('field_address_line_1'); ?>" value="<?php echo $result['address1']?$result['address1']:set_value('address1')?>" tabindex = "3">
                                          <?php echo form_error('address1'); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       * <?php echo $this->lang->line('field_driver'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <div class="m-radio-inline">
                                             <label class="m-radio">
                                             <input name="is_driver" value="1" type="radio" <?php echo $result['is_driver'] == '1' ? 'checked':'';?> tabindex = "14">
                                             <?php echo $this->lang->line('label_yes'); ?>
                                             <span></span>
                                             </label>
                                             <label class="m-radio">
                                             <input name="is_driver" value="0" type="radio" <?php echo $result['is_driver'] == '0' ? 'checked':'';?> tabindex = "15">
                                             <?php echo $this->lang->line('label_no'); ?>
                                             <span></span>
                                             <?php echo form_error('is_driver'); ?>
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group m-form__group row">
                                 <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       <?php echo $this->lang->line('field_address_line_2'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="address2" id="address2" placeholder="<?php echo $this->lang->line('field_address_line_2'); ?>" value="<?php echo $result['address2']?$result['address2']:set_value('address2')?>" tabindex = "4"> 
                                          <?php echo form_error('address2'); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       <?php echo $this->lang->line('field_warehouse'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <div class="m-radio-inline">
                                             <label class="m-radio">
                                             <input name="is_warehouse" value="1" type="radio" <?php echo $result['is_warehouse'] == '1' ? 'checked':''?> tabindex = "16">
                                             <?php echo $this->lang->line('label_yes'); ?>
                                             <span></span>
                                             </label>
                                             <label class="m-radio">
                                             <input name="is_warehouse" value="0" type="radio" <?php echo $result['is_warehouse'] == '0' ? 'checked':''?> tabindex = "17">
                                             <?php echo $this->lang->line('label_no'); ?>
                                             <span></span>
                                             <?php echo form_error('is_warehouse'); ?>
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group m-form__group row">
                              <div class="col-md-12 col-lg-6">
                                 <div class="row">
                                    <label class="form_label col-md-4 col-lg-3 text-right">
                                    <?php echo $this->lang->line('label_city'); ?>:
                                    </label>
                                    <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="city" id="city" placeholder="<?php echo $this->lang->line('label_city'); ?>" value="<?php echo $result['city']?$result['city']:set_value('city')?>" tabindex = "5">
                                       <?php echo form_error('city'); ?>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12 col-lg-6">
                                 <div class="row">
                                    <label class="form_label col-md-4 col-lg-3 text-right">
                                    <?php echo $this->lang->line('field_birthdate'); ?>:
                                    </label>
                                    <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="dob" id="dob" placeholder="<?php echo $this->lang->line('field_birthdate'); ?>" value="<?php echo $result['dob']?$result['dob']:set_value('dob')?>" tabindex = "18">
                                       <?php echo form_error('dob'); ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group m-form__group row">
                              <div class="col-md-12 col-lg-6">
                                 <div class="row">
                                    <label class="form_label col-md-4 col-lg-3 text-right">
                                    <?php echo $this->lang->line('label_state'); ?>:
                                    </label>
                                    <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="state" id="state" placeholder="<?php echo $this->lang->line('label_state'); ?>" value="<?php echo $result['state']?$result['state']:set_value('state')?>" tabindex = "6">
                                       <?php echo form_error('state'); ?>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12 col-lg-6">
                                 <div class="row">
                                    <label class="form_label col-md-4 col-lg-3 text-right">
                                    <?php echo $this->lang->line('field_social_security'); ?>:
                                    </label>
                                    <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="social_security" id="social_security" placeholder="<?php echo $this->lang->line('field_social_security'); ?>" value="<?php echo $result['social_security']?$result['social_security']:set_value('factor_of_volume')?>" tabindex = "19">
                                       <?php echo form_error('social_security'); ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group m-form__group row">
                              <div class="col-md-12 col-lg-6">
                                 <div class="row">
                                    <label class="form_label col-md-4 col-lg-3 text-right">
                                    <?php echo $this->lang->line('label_zipcode'); ?>:
                                    </label>
                                    <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="zipcode" id="zipcode" placeholder="<?php echo $this->lang->line('label_zipcode'); ?>" value="<?php echo $result['zipcode']?$result['zipcode']:set_value('zipcode')?>" tabindex = "7">
                                       <?php echo form_error('zipcode'); ?>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12 col-lg-6">
                                 <div class="row">
                                    <label class="form_label col-md-4 col-lg-3 text-right">
                                    <?php echo $this->lang->line('label_cellphone'); ?>:
                                    </label>
                                    <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="cel" id="cellphone_number" placeholder="<?php echo $this->lang->line('label_cellphone'); ?>" value="<?php echo $result['cel']?$result['cel']:set_value('cel')?>" tabindex = "20">
                                       <?php echo form_error('cel'); ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group m-form__group row">
                              <div class="col-md-12 col-lg-6">
                                 <div class="row">
                                    <label class="form_label col-md-4 col-lg-3 text-right">
                                    * <?php echo $this->lang->line('label_telephone'); ?>:
                                    </label>
                                    <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="telephone" id="telephone" placeholder="<?php echo $this->lang->line('label_cellphone'); ?>" value="<?php echo $result['tel']?$result['tel']:set_value('tel')?>" tabindex = "8">
                                       <?php echo form_error('tel'); ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group m-form__group row">
                              <div class="col-lg-9 ml-lg-auto m-form__actions">
                                 <button type="submit" class="btn btn-success" value="update">
                                 <?php echo $this->lang->line('label_submit'); ?>
                                 </button>
                                 <a href="<?php echo base_url('company/employee'); ?>" class="btn btn-secondary">
                                 <?php echo $this->lang->line('label_back'); ?>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </form>
   <!--end::Form-->
</div>
