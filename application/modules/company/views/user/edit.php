<style>
                             .vertical-a-t .m-checkbox{ vertical-align: top; margin-left: 5px; }
                             .inner-checkbox-list{ margin-top: 10px; }
                          </style>

<div class="m-content">
   <!--begin::Form-->
   <?php 
      $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'm_form_1','enctype'=>'multipart/form-data'); 
      echo form_open('company/user/edit/'.$result['master_user_id'],$form_data); 
      ?>
   <input type="hidden" name="id" value="<?php if(!empty($result['master_user_id'])) echo $result['master_user_id']; else set_value('master_user_id'); ?>">
   <div class="row">
      <div class="col-xl-12">
         <div class="m-portlet m-portlet--full-height m-portlet--tabs">
            <div class="m-portlet__head">
               <div class="m-portlet__head-tools">
                  <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--4x m-tabs-line--left m-tabs-line--primary" role="tablist">
                     <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab" data-tab_id="1">
                        <i class="flaticon-share m--hide"></i>
                        <?php echo $this->lang->line('label_user'); ?>
                        </a>
                     </li>
                     <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab" data-tab_id="2">
                        <i class="flaticon-share m--hide"></i>
                        <?php echo $this->lang->line('label_right_settings'); ?>
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
                                       <input type="text" class="form-control m-input" name="item_number" id="item_number" placeholder="<?php echo $this->lang->line('label_item_number'); ?>" value="<?=$result['master_user_id']?>" maxlength="128" disabled = "disabled">
                                       <input type="hidden" name="item_number_hdn" id="item_number_hdn" value="<?php echo $result['master_user_id']; ?>">
                                       <?php echo form_error('item_number'); ?>
                                    </div>
                              </div>


                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_first_name'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="fname" id="fname" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php echo set_value('fname')?set_value('fname'):$result['fname']; ?>" maxlength="64" >
                                    <?php echo form_error('fname'); ?>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_last_name'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="lname" id="lname" placeholder="<?php echo $this->lang->line('label_last_name'); ?>" value="<?php echo set_value('lname')?set_value('lname'):$result['lname']; ?>" maxlength="64">
                                    <?php echo form_error('lname'); ?>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_address_line_1'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="address" id="address" placeholder="<?php echo $this->lang->line('label_address_line_1'); ?>" value="<?php echo set_value('address')?set_value('address'):$result['address'] ?>">
                                    <input type="hidden" name="latitude" id="latitude" value="<?php echo set_value('latitude'); ?>">
                                    <input type="hidden" name="longitude" id="longitude" value="<?php echo set_value('longitude'); ?>">
                                    <?php echo form_error('address'); ?>
                                 </div>
                              </div>


                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_address_line_2'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="address_line_2" id="address_line_2" placeholder="<?php echo $this->lang->line('label_address_line_2'); ?>" value="<?php echo set_value('address_line_2')?set_value('address_line2'):$result['address_line2']; ?>" maxlength="256">
                                    <?php echo form_error('address_line_2'); ?>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_city'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="city" id="city" placeholder="<?php echo $this->lang->line('label_city'); ?>" value="<?php echo set_value('city')?set_value('city'):$result['city']; ?>" maxlength="64" >
                                    <?php echo form_error('city'); ?>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_state'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="state" id="state" placeholder="<?php echo $this->lang->line('label_state'); ?>" value="<?php echo set_value('state')?set_value('state'):$result['state']; ?>" maxlength="64">
                                    <?php echo form_error('state'); ?>
                                 </div>
                              </div>


                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_zipcode'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="zipcode" id="zipcode" placeholder="<?php echo $this->lang->line('label_zipcode'); ?>" value="<?php echo set_value('zipcode')?set_value('zipcode'):$result['zipcode']; ?>" maxlength="64">
                                    <?php echo form_error('zipcode'); ?>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_cellphone_number'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="cellphone_number" id="cellphone_number" placeholder="<?php echo $this->lang->line('label_cellphone_number'); ?>" value="<?php echo set_value('cellphone_number')?set_value('cellphone_number'):$result['cellphone_number']; ?>" maxlength="16">
                                    <?php echo form_error('cellphone_number'); ?>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_telephone_number'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="telephone_number" id="telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php echo set_value('telephone_number')?set_value('telephone_number'):$result['telephone_number']; ?>" maxlength="16">
                                    <?php echo form_error('telephone_number'); ?>
                                 </div>
                              </div>
                           </div>
                        <div class="col-lg-6">
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_email'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">  
                                    <input type="email" class="form-control m-input" name="email" id="email" placeholder="<?php echo $this->lang->line('label_email'); ?>" value="<?php echo set_value('email')?set_value('email'):$result['email']; ?>" maxlength="128">
                                    <?php echo form_error('email'); ?>
                                 </div>
                              </div>
                        
                        
                        
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_country'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <?php country_dropwon($result['country']); ?>
                                 </div>
                              </div>
                        
                        
                        
                              <div class="row mb-3">
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
                                       <option value = "<?php echo $val->id; ?>" <?php echo $val->id == $result['branch_id']?"selected":"";?>><?php echo $val->branch_name; ?></option>
                                       <?php } } else{?>
                                       <option value = ""><?php echo $this->lang->line('label_branch').' '.$this->lang->line('not_found'); ?></option>
                                       <?} ?>
                                    </select>
                                 </div>
                              </div>
                        
                        
                        
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_driver'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <div class="m-radio-inline">
                                       <label class="m-radio">
                                       <input name="driver" value="Yes" type="radio" 
                                       <?php echo $result['driver'] == "Yes" ? "checked":"" ?>>
                                       <?php echo $this->lang->line('label_yes'); ?>
                                       <span></span>
                                       </label>
                                       <label class="m-radio">
                                       <input name="driver" value="No" type="radio"
                                       <?php echo ($result['driver'] == "No" ? "checked":(isset($result['driver']) ? "":"checked")); ?>>
                                       <?php echo $this->lang->line('label_no'); ?>
                                       <span></span>
                                       </label>
                                    </div>
                                    <?php echo form_error('driver'); ?>
                                 </div>
                              </div>
                        
                        
                           
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_warehouse'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <div class="m-radio-inline">
                                       <label class="m-radio">
                                       <input name="warehouse" value="Yes" type="radio"
                                       <?php echo $result['warehouse'] == "Yes" ? "checked":"" ?>>
                                       <?php echo $this->lang->line('label_yes'); ?>
                                       <span></span>
                                       </label>
                                       <label class="m-radio">
                                       <input name="warehouse" value="No" type="radio"
                                       <?php echo ($result['warehouse'] == "No" ? "checked":(isset($result['warehouse']) ? "":"checked")); ?>>
                                       <?php echo $this->lang->line('label_no'); ?>
                                       <span></span>
                                       </label>
                                    </div>
                                    <?php echo form_error('warehouse'); ?>
                                 </div>
                              </div>
                        
                        
                           
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_username'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="username" id="username" placeholder="<?php echo $this->lang->line('label_username'); ?>" value="<?php echo set_value('username')?set_value('username'):$result['user_name']; ?>" maxlength="64" >
                                    <?php echo form_error('username'); ?>
                                 </div>
                              </div>
                        
                        
                           
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_password'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="password" class="form-control m-input" name="password" id="password" placeholder="<?php echo $this->lang->line('label_password'); ?>" value="<?php echo set_value('password'); ?>" maxlength="64" >
                                    <?php echo form_error('password'); ?>
                                 </div>
                              </div>
                        
                        
                          
                           
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_start_time'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="start_time" id="start_time" placeholder="<?php echo $this->lang->line('label_start_time'); ?>" value="<?php echo set_value('start_time')?set_value('start_time'):$result['start_time']; ?>" maxlength="16" >
                                    <?php echo form_error('start_time'); ?>
                                 </div>
                              </div>
                        
                        
                           
                           
                           
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_end_time'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="end_time" id="end_time" placeholder="<?php echo $this->lang->line('label_end_time'); ?>" value="<?php echo set_value('end_time'); ?>" maxlength="16">
                                    <?php echo form_error('end_time'); ?>
                                 </div>
                              </div>
                        
                        
                              
                        
                        
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 * <?php echo $this->lang->line('label_ip'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="ip" id="ip" placeholder="<?php echo $this->lang->line('label_ip'); ?>" value="<?php echo set_value('ip')?set_value('ip'):$result['ip']; ?>" maxlength="16">
                                    <?php echo form_error('ip'); ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group m-form__group row">
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
   <?php 
   $arr = $this->rights->rightsArray();
   ?>            
               
               <div class="tab-pane" id="m_user_profile_tab_2">
                  <?php if($this->session->userdata('user_id') != "" || @$result['master_user_id'] != '') {
                   // dd();
                  // dd($this->rights->rightsArray());
                  // die;
                  if($result_rights['modules']){
                     $old = json_decode($result_rights['modules'],true);
                  }else{
                     $old = [];
                  }
                   unset($old['master_user']);
                   $mainArr = $old['rights']; 
                   
                   
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
                               if(array_key_exists($key,$mainArr)){
                                 $dataOld = "yes";
                                 
                                 
                             }else{

                              $dataOld = "no";

                             }
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
                                                
                                                
                                                
                                                 if(in_array($newVal['url'],array_column($mainArr[$key],'url'))){
                                                   $checked = 'checked';
                                                   
                                                }else{
                                                   $checked = '';
                                                }
                                                
                                                
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
                                          <?} ?>
                                            
                                            
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
                            <input type = "hidden" name = "master_user" value = "<?php echo $result['master_user_id']; ?>">

                            <div class="form-group m-form__group row"  id = "action_selector">
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
                                          <?php } ?>
               </div>


            </div>
         </div>
      </div>
   </div>
   
   <!--end::Form-->
</div>
<script>
   $(document).ready(function(){
      
      $("input[type = 'password']").val('');

   });
</script>

