
<div class="m-content">
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
                        <?php echo $this->lang->line('label_add_zone'); ?>
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
                                    * <?php echo $this->lang->line('label_country'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="country" id="country" placeholder="<?php echo $this->lang->line('label_country'); ?>" value="<?php echo set_value('country')?set_value('country'):$result['country']; ?>" maxlength="64">
                                    <?php echo form_error('country'); ?>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_zone'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="zone" id="zone" placeholder="<?php echo $this->lang->line('label_zone'); ?>" value="<?php echo set_value('zone')?set_value('zone'):$result['zone']; ?>" maxlength="64">
                                    <?php echo form_error('zone'); ?>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_description'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="description" id="description" placeholder="<?php echo $this->lang->line('label_description'); ?>" value="<?php echo set_value('description')?set_value('description'):$result['description']; ?>" >
                                    <?php echo form_error('description'); ?>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_validation'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <div class="m-radio-inline">
                                       <label class="m-radio">
                                       <input name="validation" value="Yes" type="radio" <?=$result['validation']=='Yes'?"checked":''?>>
                                       <?php echo $this->lang->line('label_yes'); ?>
                                       <span></span>
                                       </label>
                                       <label class="m-radio">
                                       <input name="validation" value="Yes" type="radio" <?=($result['validation']=='No'?"checked":(isset($result['validation']) ? '' : 'checked'))?>>
                                       <?php echo $this->lang->line('label_no'); ?>
                                       <span></span>
                                       </label>
                                    </div>
                                    <?php echo form_error('validation'); ?>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_branch'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="branch" id="branch" placeholder="<?php echo $this->lang->line('label_branch'); ?>" value="<?=$result['branch']?$result['branch']:set_value('branch')?>" maxlength="64">
                                    <?php echo form_error('branch'); ?>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_stops'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="stops" id="stops" placeholder="<?php echo $this->lang->line('label_stops'); ?>" value="<?=$result['stops']?$result['stops']:set_value('stops')?>" maxlength="64">
                                    <?php echo form_error('stops'); ?>
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
   <?php echo form_close(); ?>
</div>