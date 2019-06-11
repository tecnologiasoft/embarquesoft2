<style>
                             .vertical-a-t .m-checkbox{ vertical-align: top; margin-left: 5px; }
                             .inner-checkbox-list{ margin-top: 10px; }
                          </style>
<!-- <?php //echo "<pre>";
//print_r($result);
//echo "</pre>";
?> -->
<div class="m-content">
   <!--begin::Form-->
   <?php 
      $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'm_form_1','enctype'=>'multipart/form-data'); 
      echo form_open('company/batch_distribution/add/', $form_data);
      ?> 
   
   <div class="row">
      <div class="col-xl-12">
         <div class="m-portlet m-portlet--full-height m-portlet--tabs">
            <div class="m-portlet__head">
               <div class="m-portlet__head-tools">
                  <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--4x m-tabs-line--left m-tabs-line--primary" role="tablist">
                     <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab" data-tab_id="1">
                        <i class="flaticon-share m--hide"></i>
                        <?php echo $this->lang->line('title_batch_list'); ?>
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
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_zone'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <select class="form-control m-input" name="zone" id="zone" placeholder="<?php echo $this->lang->line('label_zone'); ?>"  data-parsley-trigger="focusin focusout" data-parsley-errors-container="#driver_error">
                                        <option value=""><?php echo $this->lang->line('label_zone'); ?></option>

                                        <?php 
                                        if(!empty($zone_list)){
                                            foreach ($zone_list as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value['id']; ?>" <?php echo $value['id']==$result['zone'] ? "selected":"";?>><?php echo $value['zone']; ?></option>
                                                <?php
                                                 }
                                              }
                                        ?>
                                    </select>
                                    <div id="driver_error">
                                        <?php echo form_error('zone'); ?>
                                    </div>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_status'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <select class="form-control m-input" name="status" id="status" placeholder="<?php echo $this->lang->line('label_status'); ?>"  data-parsley-trigger="focusin focusout" data-parsley-errors-container="#driver_error">
                                        <option value=""><?php echo $this->lang->line('label_status'); ?></option>

                                        <?php 
                                        if(!empty($status_list)){
                                            foreach ($status_list as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value['Status_ID']; ?>" <?php echo $value['Status_ID']==$result['Description'] ? "selected":"";?>><?php echo $value['Description']; ?></option>
                                                <?php
                                                 }
                                              }
                                        ?>
                                    </select>
                                    <div id="driver_error">
                                        <?php echo form_error('zone'); ?>
                                    </div>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_driver'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <select class="form-control m-input" name="driver" id="driver" placeholder="<?php echo $this->lang->line('label_driver'); ?>"  data-parsley-trigger="focusin focusout" data-parsley-errors-container="#driver_error">
                                        <option value=""><?php echo $this->lang->line('label_driver'); ?></option>

                                        <?php 
                                        if(!empty($driver_list)){
                                            foreach ($driver_list as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value['id']; ?>" <?php echo $value['id']==$result['name'] ? "selected":"";?>><?php echo $value['name']; ?></option>
                                                <?php
                                                 }
                                              }
                                        ?>
                                    </select>
                                    <div id="driver_error">
                                        <?php echo form_error('zone'); ?>
                                    </div>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_date'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="date" id="date" placeholder="<?php echo $this->lang->line('label_date'); ?>" value="<?=$result['date']?$result['date']:set_value('date')?>">
                                    <?php echo form_error('date'); ?>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_type'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <select class="form-control m-input" name="type" id="type" placeholder="<?php echo $this->lang->line('label_type'); ?>"  data-parsley-trigger="focusin focusout" data-parsley-errors-container="#driver_error">
                                        <option value=""><?php echo $this->lang->line('label_type'); ?></option>
                                        <option value="<?php echo $this->lang->line('label_invoice'); ?>"><?php echo $this->lang->line('label_invoice'); ?></option>
                                        <option value="<?php echo $this->lang->line('label_container'); ?>"><?php echo $this->lang->line('label_container'); ?></option>

                                     
                                    </select>
                                    <div id="driver_error">
                                        <?php echo form_error('type'); ?>
                                    </div>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_exchange_rate'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="exchange_rate" id="exchange_rate" placeholder="<?php echo $this->lang->line('label_exchange_rate'); ?>"><?php if(!empty($result['exchange_rate'])) echo $result['exchange_rate']; else echo set_value('exchange_rate'); ?>
                                    <div id="driver_error">
                                        <?php echo form_error('type'); ?>
                                    </div>
                                 </div>
                              </div>
                              
                              <div class="row mb-3">

                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                      <?php echo $this->lang->line('label_comment'); ?>:
                                  </label>
                                  <div class="col-md-8 col-lg-9">
                                      <textarea class="form-control m-input" rows="2" name="comment" id="comment" placeholder="<?php echo $this->lang->line('label_comment'); ?>"><?php if(!empty($result['comment'])) echo $result['comment']; else echo set_value('comment'); ?></textarea>
                                      <?php echo form_error('comment'); ?>
                                  </div>
                              </div>

                          </div>
        
                        </div>
                        <div class="form-group m-form__group row">
                           <div class="col-lg-9 ml-lg-auto m-form__actions">
                              <button type="submit" class="btn btn-success" value="update">
                              <?php echo $this->lang->line('label_submit'); ?>
                              </button>
                              <a href="<?php echo base_url('company/driver'); ?>" class="btn btn-secondary">
                              <?php echo $this->lang->line('label_back'); ?>
                              </a>
                           </div>
                        </div>
                     <?php echo form_close(); ?>
                     </div>
                  </div>
               </div>
                 <?php 
                 $arr = $this->rights->rightsArray();
                 ?>            
               
               <div class="tab-pane <?php echo $this->session->userdata('tab') == 'true'?"active":""; ?>" id="m_user_profile_tab_2">
               <?php if($this->session->userdata('tab') == 'true') { 
                  
                        $this->session->set_userdata('tab','false');
                   
                   
                   
                  ?>   
                  <div class="m-portlet__body">
                     <div class="m-form__section m-form__section--first">
                                          
                     <div class="form-group m-form__group row">
                           <div class="col-md-12">
                           <select class = "form-control" id = "module_selector">
                              <option value = ""><?php echo $this->lang->line('label_select_module'); ?></option>
                           <?php foreach($arr as $key => $value) {  
                                
                              
                              ?>

                             
                                <option value = "<?php echo $key ?>"><?php echo $this->lang->line($key); ?></option>
                           <?php } ?>
                           </select>
                              
                            <?php   foreach($arr as $key => $value) { 
                                 
                               $assingId = strtolower(str_replace(" ","_",$key));
                               
                              $dataOld = "no";

                             
                               ?>
                            <div id = "parent_<?php echo $assingId; ?>" data-module = "<?php echo $key; ?>" class = "moduler" style = "display:none" data-old = "<?php echo $dataOld; ?>">
                              <div class="inner-checkbox-list"  id = "checklist_<?php echo $assingId; ?>" data-child = "<?php echo $key; ?>">
                                 <div class="row vertical-a-t">
                                    <label class="form_label col-md-4 col-lg-2 text-right">
                                    <?php echo $this->lang->line($key); ?> 
                                       <label class="m-checkbox ">
                                          <input type="checkbox" checked id = "<?php echo $assingId; ?>" class = "chk_module"> 
                                          <span></span>
                                       </label>
                                    </label>
                                    <div class="col-md-10 col-lg-10">
                                       <div class="vertical-a-t">
                                          <div class="m-checkbox-inline">
                                          <?php if(is_array($value)) { 
                                             foreach($value as $newVal ) {
                                                
                                                
                                                
                                               
                                                   $checked = '';
                                                
                                                
                                                
                                             ?>
                                             <label class="form_label">
                                                   <?php echo $this->lang->line($newVal['name']); ?>
                                                <label class="m-checkbox ">
                                                   <input name="rights[<?php echo $key; ?>][][url]" value="<?php echo $newVal['url']; ?>" type="checkbox" <?php echo $checked;  ?>>
                                                   <span></span>
                                                </label>
                                             </label>

                                          <?php }} else{ ?>
                                          
                                             <input name="rights[<?php echo $key; ?>]" value="<?php echo $value; ?>" type="hidden">
                                          <?php } ?>
                                            
                                            
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <hr>
                              </div>
                            </div>
                           
                              
                            <?php } ?>
                            <div id = "getter">  

                            <?php echo form_open("company/user/addrights","id = 'frm'"); ?>
                            <span id = "containFormData">
                            </span>
                            <input type = "hidden" name = "master_user" value = "<?php echo $master_user_id; ?>">

                            <div class="form-group m-form__group row"  id = "action_selector" style = "display:none;">
                              <div class="col-lg-9 ml-lg-auto m-form__actions">
                                 <button type="submit" class="btn btn-success" value="update">
                                 <?php echo $this->lang->line('label_submit'); ?>
                                 </button>
                                 <a href="<?php echo base_url('company/user'); ?>" class="btn btn-secondary">
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
                                          <?php  } ?>

               </div>


            </div>


         </div>
      </div>
   </div>
   
   <!--end::Form-->
</div>

 <script type="text/javascript">





            /* select 2 */
            var Select2 = {
                init: function() {
                    $("#zone").select2();
                    $("#status").select2();
                    $("#driver").select2();
                    $("#type").select2();
                 /*   $("#driver_id").select2();
                    $("#zone").select2();
                    $("#model_branch_id").select2();*/
                }
            };
            jQuery(document).ready(function() {
                Select2.init()
            });


	$(document).ready(function(){

            $('#date').datepicker({
                time: false,
                clearButton: true
            });



	});
</script> 


