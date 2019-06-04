   <div class="m-content">
      <!--begin::Form-->
      <?php 
         $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'm_form_1','enctype'=>'multipart/form-data'); 
         echo form_open($formAction,$form_data); 
         ?>
      <div class="row">
         <div class="col-xl-12">
            <div class="m-portlet m-portlet--full-height m-portlet--tabs">
               <div class="m-portlet__head">
                  <div class="m-portlet__head-tools">
                     <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--4x m-tabs-line--left m-tabs-line--primary" role="tablist">
                        <li class="nav-item m-tabs__item">
                           <a class="nav-link m-tabs__link active " data-toggle="tab" href="#m_user_profile_tab_1 " role="tab" data-tab_id="1">
                           <i class="flaticon-share m--hide"></i>
                           <?php echo $this->lang->line('label_branch'); ?>
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
                                       <?php echo $this->lang->line('label_branch_id').'#'; ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="branch_id" id="branch_id" placeholder="<?php echo $this->lang->line('label_branch_id'); ?>" value="<?=$result['id']?>" disabled = "disabled">
                                    <input type="hidden" name="branch_id_hdn" id="branch_id_hdn" value="<?php echo $max_value; ?>">
                                    <?php echo form_error('item_number'); ?>
                                       </div>
                                    </div>
                                 </div>


                                 <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       * <?php echo $this->lang->line('label_branch').' '.$this->lang->line('label_name'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="name" id="name" placeholder="<?php echo $this->lang->line('label_name'); ?>" value="<?=$result['name']?$result['name']:set_value('name')?>" maxlength="128" >
                                    <?php echo form_error('name'); ?>
                                    
                                       </div>
                                    </div>
                                 </div>
                            
                                  


                                 

                              </div>
                              <div class="form-group m-form__group row">

                                 
                                 <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       * <?php echo $this->lang->line('label_address_1'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="address_line_1" id="address_line_1" placeholder="<?php echo $this->lang->line('label_address_1'); ?>" value="<?=$result['address_line1']?$result['address_line1']:set_value('address_line1')?>" maxlength="256">
                                    <?php echo form_error('address_line_1'); ?>
                                    
                                       </div>
                                    </div>
                                 </div>


                                 <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       * <?php echo $this->lang->line('label_address_2'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="address_line_2" id="address_line_2" placeholder="<?php echo $this->lang->line('label_address_2'); ?>" value="<?=$result['address_line2']?$result['address_line2']:set_value('address_line2')?>" maxlength="256">
                                    <?php echo form_error('address_line_2'); ?>
                                    
                                       </div>
                                    </div>
                                 </div>

                            

                              </div>
                              <div class="form-group m-form__group row">

                                 <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       * <?php echo $this->lang->line('label_city'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="city" id="locality" placeholder="<?php echo $this->lang->line('label_city'); ?>" value="<?=$result['city']?$result['city']:set_value('city')?>" maxlength="64">
                                    <?php echo form_error('city'); ?>
                                    
                                       </div>
                                    </div>
                                 </div>


                                 <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       * <?php echo $this->lang->line('label_state'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="state" id="administrative_area_level_1" placeholder="<?php echo $this->lang->line('label_state'); ?>" value="<?=$result['state']?$result['state']:set_value('state')?>" maxlength="64">
                                    <?php echo form_error('state'); ?>
                                    
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
                                       <input type="text" class="form-control m-input" name="zipcode" id="postal_code" placeholder="<?php echo $this->lang->line('label_zipcode'); ?>" value="<?=$result['zipcode']?$result['zipcode']:set_value('zipcode')?>" maxlength="32">
                                    <?php echo form_error('zipcode'); ?>
                                    
                                       </div>
                                    </div>
                                 </div>



                                    <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       * <?php echo $this->lang->line('label_telephone_number'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="telephone_number1" id="telephone_number1" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?=$result['telephone_number1']?$result['telephone_number1']:set_value('telephone_number1')?>" maxlength="16">
                                    <?php echo form_error('telephone_number1'); ?>
                                    
                                       </div>
                                    </div>
                                 </div>


                                 
                                 
                              </div>
                              <div class="form-group m-form__group row">
                                  
                                     <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       * <?php echo $this->lang->line('label_telephone_number'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="telephone_number2" id="telephone_number2" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?=$result['telephone_number2']?$result['telephone_number2']:set_value('telephone_number2')?>" maxlength="16">
                                    <?php echo form_error('telephone_number2'); ?>
                                    
                                       </div>
                                    </div>
                                 </div>

                                     <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       * <?php echo $this->lang->line('label_country'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="country" id="country" placeholder="<?php echo $this->lang->line('label_country'); ?>" value="<?=$result['country']?$result['country']:set_value('country')?>">
                                    <?php echo form_error('country'); ?>
                                    
                                       </div>
                                    </div>
                                 </div>

                                 
                                 
                              </div>
                           </div>
                           <div class="form-group m-form__group row">
                             
                           <div class="col-md-12 col-lg-6">
                                    <div class="row">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       * <?php echo $this->lang->line('label_print'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                       <div class="m-radio-inline">
                                    <label class="m-radio">
                                    <input name="print" value="Yes" type="radio" <?=$result['print']=='Yes'?"checked":''?>>
                                    <?php echo $this->lang->line('label_yes'); ?>
                                    <span></span>
                                    </label>
                                    <label class="m-radio">
                                    <input name="print" value="No" type="radio"<?=$result['print']=='No'?"checked":''?>>
                                    <?php echo $this->lang->line('label_no'); ?>
                                    <span></span>
                                    </label>
                                 </div>
                                 <?php echo form_error('print'); ?>
                              </div>
                                    
                                       </div>
                                    </div>
                                 </div>

                              
                           </div>
                           <div class="form-group m-form__group row">
                              <div class="col-lg-9 ml-lg-auto m-form__actions">
                                 <button type="submit" class="btn btn-success" value="update">
                                 <?php echo $this->lang->line('label_submit'); ?>
                                 </button>
                                 <a href="<?php echo base_url('company/branch'); ?>" class="btn btn-secondary">
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
