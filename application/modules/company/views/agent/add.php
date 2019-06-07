

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
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab" data-tab_id="1">
                        <i class="flaticon-share m--hide"></i>
                        <?php echo $this->lang->line('label_agent'); ?>
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
                                    <span id="astric">*</span> <?php echo $this->lang->line('label_agent').'#'; ?>:
                                    </label>
                                    <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="item_number" id="item_number" placeholder="<?php echo $this->lang->line('label_item_number'); ?>" value="<?php echo $result['id']?$result['id']:$max_value; ?>" maxlength="128" disabled = "disabled">
                                       <input type="hidden" name="item_number_hdn" id="item_number_hdn" value="<?php echo $result['id']?$result['id']:$max_value; ?>">
                                       <?php echo form_error('item_number'); ?>
                                    </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_agent_company'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="agent_company" id="agent_company" placeholder="<?php echo $this->lang->line('label_agent_company'); ?>" value="<?php echo set_value('agent_company')?set_value('agent_company'):$result['agent_company']; ?>" maxlength="255" required>
                                    <?php echo form_error('agent_company'); ?>
                                 <div id="agent_company_msg" class="form-control-feedback" style="display: none;">This field is required</div>
                                 </div>
                              </div>



                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_first_name'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="fname" id="fname" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php echo set_value('fname')?set_value('fname'):$result['fname']; ?>" maxlength="64" >
                                    <?php echo form_error('fname'); ?>
                                 <div id="fname_msg" class="form-control-feedback" style="display: none;">This field is required</div>

                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_last_name'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="lname" id="lname" placeholder="<?php echo $this->lang->line('label_last_name'); ?>" value="<?php echo set_value('lname')?set_value('lname'):$result['lname']; ?>" maxlength="64">
                                    <?php echo form_error('lname'); ?>
                                 <div id="lname_msg" class="form-control-feedback" style="display: none;">This field is required</div>

                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span><?php echo $this->lang->line('label_address'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="address_1" id="address_1" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php echo set_value('address_1')?set_value('address_1'):$result['address_1'] ?>" required>
                                    <input type="hidden" name="latitude" id="latitude" value="<?php echo set_value('latitude'); ?>">
                                    <input type="hidden" name="longitude" id="longitude" value="<?php echo set_value('longitude'); ?>">
                                    <?php echo form_error('address_1'); ?>
                                 <div id="address_1_msg" class="form-control-feedback" style="display: none;">This field is required</div>

                                 </div>
                              </div>


                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_address'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="address_2" id="address_2" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php echo set_value('address_line_2')?set_value('address_2'):$result['address_2']; ?>" maxlength="256">
                                    <?php echo form_error('address_2'); ?>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span><?php echo $this->lang->line('label_city'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="city" id="city" placeholder="<?php echo $this->lang->line('label_city'); ?>" value="<?php echo set_value('city')?set_value('city'):$result['city']; ?>" maxlength="64" required>
                                    <?php echo form_error('city'); ?>
                                 <div id="city_msg" class="form-control-feedback" style="display: none;">This field is required</div>

                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                <span id="astric">*</span> <?php echo $this->lang->line('label_state'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="state" id="state" placeholder="<?php echo $this->lang->line('label_state'); ?>" value="<?php echo set_value('state')?set_value('state'):$result['state']; ?>" maxlength="64" required>
                                    <?php echo form_error('state'); ?>
                                 <div id="state_msg" class="form-control-feedback" style="display: none;">This field is required</div>

                                 </div>
                              </div>


                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_zipcode'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="zipcode" id="zipcode" placeholder="<?php echo $this->lang->line('label_zipcode'); ?>" value="<?php echo set_value('zipcode')?set_value('zipcode'):$result['zipcode']; ?>" maxlength="64">
                                    <?php echo form_error('zipcode'); ?>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                <span id="astric">*</span> <?php echo $this->lang->line('label_cellphone_number'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="cellphone_number" id="cellphone_number" placeholder="<?php echo $this->lang->line('label_cellphone_number'); ?>" value="<?php echo set_value('cellphone_number')?set_value('cellphone_number'):$result['cellphone']; ?>" maxlength="16">
                                    <?php echo form_error('cellphone_number'); ?>
                                 <div id="cellphone_number_msg" class="form-control-feedback" style="display: none;">This field is required and should be 10 digit.</div>

                                 </div>
                              </div>

                              
                           </div>
                        <div class="col-lg-6">
                              

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span><?php echo $this->lang->line('label_telephone_number'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="telephone_number" id="telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php echo set_value('telephone_number')?set_value('telephone_number'):$result['telephone']; ?>" maxlength="16">
                                    <?php echo form_error('telephone_number'); ?>
                                 <div id="telephone_number_msg" class="form-control-feedback" style="display: none;">This field is required and should be 10 digit.</div>

                                 </div>
                              </div>
                        
                        
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_email'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="email" id="email" placeholder="<?php echo $this->lang->line('label_email'); ?>" value="<?php echo set_value('email')?set_value('email'):$result['email']; ?>">
                                    <?php echo form_error('email'); ?>
                                 </div>
                              </div>
                        
                        
                           
                             
                        
                        
                           
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                <!--  <span id="astric">*</span>  --><?php echo $this->lang->line('label_header'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                 <input type="text" class="form-control m-input" name="header" id="header" placeholder="<?php echo $this->lang->line('label_header'); ?>" value="<?php echo set_value('header')?set_value('header'):$result['header']; ?>" maxlength="255">
                                    <?php echo form_error('header'); ?>
                                 </div>
                              </div>


                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <!-- <span id="astric">*</span> --> <?php echo $this->lang->line('label_percentage'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                 <input type="text" class="form-control m-input" name="percentage" id="percentage" placeholder="<?php echo $this->lang->line('label_percentage'); ?>" value="<?php echo set_value('percentage')?set_value('percentage'):$result['percentage']; ?>" maxlength="255">
                                    <?php echo form_error('percentage'); ?>
                                 </div>
                              </div>


                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                               <!--  <span id="astric">*</span> -->
                                 <?php echo $this->lang->line('label_agent_module'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <div class="m-radio-inline">

                                       <label class="m-radio">
                                          <input name="agent_module" value="Yes" type="radio" checked = "checked">
                                          <?=lang('label_yes')?>
                                          <span></span>
                                       </label>

                                       <label class="m-radio">
                                          <input name="agent_module" value="No" type="radio" <?=@$result['agent_module']=='No'?"checked":""?>>
                                          <?=lang('label_no')?>
                                          <span></span>
                                       </label>

                                    </div>
                                 </div>
                                 <?php echo form_error('agent_module'); ?>
                              </div>

                             



                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                    <?php echo $this->lang->line('label_comment'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                 <textarea class="form-control m-input" name="comment" id="comment" placeholder="<?=$this->lang->line('label_comment')?>"><?php echo set_value('comment')?set_value('comment'):$result['comment']; ?></textarea>   
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
                              <a href="<?php echo base_url('company/agent'); ?>" class="btn btn-secondary">
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
                                          <?php 
                                       
                                      
                                       } ?>

               </div>


            </div>
         </div>
      </div>
   </div>
   
   <!--end::Form-->
</div>


<script type="text/javascript">
   $(document).ready(function(){
      var agent_company = $('#agent_company').val();
      var fname= $('#fname').val();
      var lname= $('#lname').val();
      var address_line1= $('#address_line1').val();
      var city= $('#city').val();
      var state= $('#state').val();
      var celno  =jQuery('input#cellphone_number').val();
      var telno  =jQuery('input#telephone_number').val();
      var nolength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(celno);
      var tellength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(telno);
       $("#agent_company").change(function() {
           var agent = $('#agent_company').val();
           if(agent != ''){
               jQuery('#agent_company_msg').hide();
               return true;
            }
      });
      $("#fname").change(function() {
           var fname = $('#fname').val();
           if(fname != ''){
               jQuery('#fname_msg').hide();
               return true;
            }
      });
      $("#lname").change(function() {
           var lname = $('#lname').val();
           if(lname != ''){
               jQuery('#lname_msg').hide();
               return true;
            }
      });
      $("#address_1").change(function() {
         alert();
           var address_1 = $('#address_1').val();
           if(address_1 != ''){
               jQuery('#address_1_msg').hide();
               return true;
            }
            
      });
      $("#city").change(function() {
           var city = $('#city').val();
           if(city != ''){
               jQuery('#city_msg').hide();
               return true;
            }
      });
      $("#state").change(function() {
           var state = $('#state').val();
           if(state != ''){
               jQuery('#state_msg').hide();
               return true;
            }
      });
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
               jQuery('#telephone_number_msg').show();
               $(this).focus();
               return false;
            }else{
               //alert("true");
               jQuery('#telephone_number_msg').hide();
               return true;
            }
      });
      jQuery('button.btn.btn-success').click(function(){
          var agent_com = $('#agent_company').val();
         var fname= $('#fname').val();
         var lname= $('#lname').val();
         var address_line1= $('#address_1').val();
         var city= $('#city').val();
         var state= $('#state').val();
         var celno  =jQuery('input#cellphone_number').val();
         var telno  =jQuery('input#telephone_number').val();
         var nolength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(celno);
         var tellength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(telno);

         if(agent_com == '' && fname == '' && lname == '' && address_line1 == '' && city == '' && state == '' &&  nolength == false && tellength == false){
            jQuery('#agent_company_msg').show();
            jQuery('#fname_msg').show();
            jQuery('#lname_msg').show();
            jQuery('#address_1_msg').show();
            jQuery('#city_msg').show();
            jQuery('#state_msg').show();
            // jQuery('#branch_msg').show();
            jQuery('#telephone_number_msg').show();
            jQuery('#cellphone_number_msg').show();
            return false;
         }else{  
         if(agent_company == ''){
              jQuery('#agent_company_msg').show();
         } 
            else if(fname == ''){
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
               jQuery('#address_1_msg').hide();
               jQuery('#city_msg').show();
               return false;
            }else if(state == ''){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').hide();
               jQuery('#address_1_msg').hide();
               jQuery('#city_msg').hide();
               jQuery('#state_msg').show();
               return false;
             }
             else if(tellength == false){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').hide();
               jQuery('#address_1_msg').hide();
               jQuery('#city_msg').hide();
               jQuery('#state_msg').hide();
               jQuery('#branch_msg').hide();
               jQuery('#telephone_number_msg').show();
               return false;
            }else if( nolength== false){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').hide();
               jQuery('#address_1_msg').hide();
               jQuery('#city_msg').hide();
               jQuery('#state_msg').hide();
               jQuery('#branch_msg').hide();
               jQuery('#telephone_number').hide();
               jQuery('#cellphone_number_msg').show();
               return false;
            }
            else{
               return true;
            }
         }
      });
   });
</script> 


