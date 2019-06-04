

   <div class="m-content">
      <!--begin::Form-->
      <?php 
         $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'm_form_1','enctype'=>'multipart/form-data'); 
         echo form_open('company/inventory/edit/'.$result['id'],$form_data); 

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
                           <?php echo $this->lang->line('label_inventory'); ?>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="tab-content">
                  <div class="tab-pane active" id="m_user_profile_tab_1">
                     <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                           <div class="row">
                              <div class="col-lg-6">
                                 
                                    <div class="row mb-3">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       * <?php echo $this->lang->line('label_item').'#'; ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="item_number" id="item_number" placeholder="<?php echo $this->lang->line('label_item_number'); ?>" value="<?php echo $result['id']; ?>" maxlength="128" disabled = "disabled">
                                          <input type="hidden" name="item_number_hdn" id="item_number_hdn" value="<?php echo $result['id']; ?>">
                                          <?php echo form_error('item_number'); ?>
                                       </div>
                                    </div>
                                 
                                    <div class="row mb-3">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       * <?php echo $this->lang->line('label_description'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="description" id="description" placeholder="<?php echo $this->lang->line('label_description'); ?>" value="<?php echo set_value('description')?set_value('description'):$result['description']; ?>">
                                          <?php echo form_error('description'); ?>
                                       </div>
                                    </div>

                                    <!-- <div class="row mb-3">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                        <?php //echo $this->lang->line('label_zone'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="zone" id="zone" placeholder="<?php echo $this->lang->line('label_zone'); ?>" value="<?php echo set_value('zone')?set_value('zone'):$result['zone']; ?>" maxlength="64">
                                          <?php //echo form_error('zone'); ?>
                                       </div>
                                    </div> -->

                                    <div class="row mb-3">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       <?php echo $this->lang->line('field_weight_price_from'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="weight_price_from" id="field_weight_price_from" placeholder="<?php echo $this->lang->line('field_weight_price_from'); ?>" value="<?php echo set_value('weight_price_from') ? set_value('weight_price_from') : $result['weight_price_from']?>">

                                          <?php echo form_error('weight_price_from'); ?>
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       <?php echo $this->lang->line('field_weight_price_to'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="weight_price_to" id="weight_price_to" placeholder="<?php echo $this->lang->line('field_weight_price_to'); ?>" value="<?php echo set_value('weight_price_to') ? set_value('weight_price_to'):$result['weight_price_to']?>" >
                                          <?php echo form_error('weight_price_to'); ?>
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                        <?php echo $this->lang->line('label_volume_price'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="volume_price" id="volume_price" placeholder="<?php echo $this->lang->line('label_volume_price'); ?>" value="<?php echo set_value('volume_price') ? set_value('volume_price') : $result['volume_price']; ?>" >
                                          <?php echo form_error('volume_price'); ?>
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       <?php echo $this->lang->line('field_factor_of_volume'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="factor_of_volume" id="factor_of_volume" placeholder="<?php echo $this->lang->line('field_factor_of_volume'); ?>" value="<?php echo set_value('factor_of_volume')?set_value('factor_of_volume'):$result['factor_of_volume']?>" >
                                          <?php echo form_error('factor_of_volume'); ?>
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                        <?php echo $this->lang->line('label_has_insurane'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <div class="m-radio-inline">
                                             <label class="m-radio">
                                             <input name="has_insurane" value="Yes" type="radio" <?php echo $result['has_insurane'] == 'Yes'?"checked":''?>>
                                             <?php echo $this->lang->line('label_yes'); ?>
                                             <span></span>
                                             </label>
                                             <label class="m-radio">
                                             <input name="has_insurane" value="No" type="radio" <?php echo $result['has_insurane'] == 'No' ?"checked":''; ?>>
                                             <?php echo $this->lang->line('label_no'); ?>
                                             <span></span>
                                             </label>
                                          </div>
                                          <?php echo form_error('has_insurane'); ?>
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                        <?php echo $this->lang->line('label_calculate_price'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="calculate_price" id="calculate_price" placeholder="<?php echo $this->lang->line('label_calculate_price'); ?>" value="<?php echo set_value('calculate_price') ? set_value('calculate_price') : $result['calculate_price']; ?>" maxlength="64" tabindex = "9">
                                          <?php echo form_error('calculate_price'); ?>
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                        <?php echo $this->lang->line('label_insurance_percentage'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="insurance_percentage" id="insurance_percentage" placeholder="<?php echo $this->lang->line('label_insurance_percentage'); ?>" value="<?php echo set_value('insurance_percentage') ? set_value('insurance_percentage'): $result['insurance_percentage']; ?>" maxlength="64" tabindex = "10" >
                                          <?php echo form_error('insurance_percentage'); ?>
                                       </div>
                                    </div>

                                 </div>  

                                 <div class="col-lg-6">
                                    
                                   <div class="row mb-3">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                        <?php echo $this->lang->line('label_air'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <div class="m-radio-inline">
                                             <label class="m-radio">
                                             <input name="air" value="Yes" type="radio" 
                                             <?php echo $result['air'] == 'Yes' ? 'checked' : '' ?>>
                                             <?php echo $this->lang->line('label_yes'); ?>
                                             <span></span>
                                             </label>
                                             <label class="m-radio">
                                             <input name="air" value="No" type="radio"
                                             <?php echo ($result['air'] == 'No' ? 'checked' : (empty($result['air']) ? "checked" : "")); ?>>
                                             <?php echo $this->lang->line('label_no'); ?>
                                             <span></span>
                                             </label>
                                          </div>
                                          <?php echo form_error('air'); ?>
                                       </div>
                                    </div>


                                    <div class="row mb-3">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       * <?php echo $this->lang->line('label_type'); ?>
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <div class="m-radio-inline">
                                             <label class="m-radio">
                                             <input name="type" value="Service" type="radio" 
                                             <?php echo $result['type'] == 'Service' ? 'checked' : '' ?>>
                                             <?php echo $this->lang->line('label_service'); ?>
                                             <span></span>
                                             </label>
                                             <label class="m-radio">
                                             <input name="type" value="Inventory" type="radio" 
                                             <?php echo ($result['type'] == 'Inventory' ? 'checked' : (empty($result['type']) ? "checked" : "")); ?>>
                                             <?php echo $this->lang->line('label_inventory'); ?>
                                             <span></span>
                                             </label>
                                          </div>
                                          <?php echo form_error('type'); ?>
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                       * <?php echo $this->lang->line('label_price'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="price" id="price" placeholder="<?php echo $this->lang->line('label_price'); ?>" value="<?php echo set_value('price') ? set_value('price') : $result['price']; ?>">
                                          <?php echo form_error('price'); ?>
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                        <?php echo $this->lang->line('label_cost'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="cost" id="cost" placeholder="<?php echo $this->lang->line('label_cost'); ?>" value="<?php echo set_value('cost')?set_value('cost'):$result['cost']; ?>" >
                                          <?php echo form_error('cost'); ?>
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                        <?php echo $this->lang->line('label_recorder_point'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="recorder_point" id="recorder_point" placeholder="<?php echo $this->lang->line('label_recorder_point'); ?>" value="<?php echo set_value('recorder_point')?set_value('recorder_point'):$result['recorder_point']; ?>" >
                                          <?php echo form_error('recorder_point'); ?>
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                        <?php echo $this->lang->line('label_qt_oh'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="qty" id="qty" placeholder="<?php echo $this->lang->line('label_qt_oh'); ?>" value="<?php echo set_value('qty') ? set_value('qty') : $result['qty']; ?>" tabindex = "19">
                                          <?php echo form_error('qty'); ?>
                                       </div>
                                    </div>
                                   
                                    <div class="row mb-3">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                        <?php echo $this->lang->line('label_driver_inventory'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <div class="m-radio-inline">
                                             <label class="m-radio">
                                             <input name="driver_inventory" value="Yes" type="radio" checked="" tabindex = "20"
                                             <?php echo $result['driver_inventory'] == 'Yes' ? 'checked' : '' ?>>
                                             <?php echo $this->lang->line('label_yes'); ?>
                                             <span></span>
                                             </label>
                                             <label class="m-radio">
                                             <input name="driver_inventory" value="No" type="radio" tabindex = "21" 
                                             <?php echo $result['driver_inventory'] == 'No' ? 'checked' : ""; ?>>
                                             <?php echo $this->lang->line('label_no'); ?>
                                             <span></span>
                                             </label>
                                          </div>
                                          <?php echo form_error('driver_inventory'); ?>
                                       </div>
                                    </div>

                                    <div class="row mb-3">
                                       <label class="form_label col-md-4 col-lg-3 text-right">
                                        <?php echo $this->lang->line('label_insurance_price'); ?>:
                                       </label>
                                       <div class="col-md-8 col-lg-9">
                                          <input type="text" class="form-control m-input" name="insurance_price" id="insurance_price" placeholder="<?php echo $this->lang->line('label_insurance_price'); ?>" value="<?php echo set_value('insurance_price')?set_value('insurance_price'):$result['insurance_price']; ?>" maxlength="64" tabindex = "23">
                                          <?php echo form_error('insurance_price'); ?>
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
                                    <a href="<?php echo base_url('company/inventory'); ?>" class="btn btn-secondary">
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
      </form>
      <!--end::Form-->
   </div>

