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
                        <?php echo $this->lang->line('label_driver'); ?>
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
                                     <?php echo $this->lang->line('label_driverid').'#'; ?>:
                                    </label>
                                    <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="item_number" id="item_number" placeholder="<?php echo $this->lang->line('label_item_number'); ?>" value="<?php echo $result['id']?$result['id']:$max_value; ?>" maxlength="128" disabled = "disabled">
                                       <input type="hidden" name="item_number_hdn" id="item_number_hdn" value="<?php echo $result['id']?$result['id']:$max_value; ?>">
                                       <?php echo form_error('item_number'); ?>

                                    </div>
                              </div>


                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_first_name'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="fname" id="fname" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php echo set_value('fname')?set_value('fname'):$result['fname']; ?>" maxlength="64" >
                               
                                    <div class="has-danger"><div id="fname_msg" class="form-control-feedback" style="display: none;">This field is required.</div></div>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_last_name'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="lname" id="lname" placeholder="<?php echo $this->lang->line('label_last_name'); ?>" value="<?php echo set_value('lname')?set_value('lname'):$result['lname']; ?>" maxlength="64">
                                
                                    <div class="has-danger"><div id="lname_msg" class="form-control-feedback" style="display: none;">This field is required.</div></div>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_address_line_1'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="address" id="address" placeholder="<?php echo $this->lang->line('label_address_line_1'); ?>" value="<?php echo set_value('address')?set_value('address'):$result['address'] ?>">
                                    <input type="hidden" name="latitude" id="latitude" value="<?php echo set_value('latitude'); ?>">
                                    <input type="hidden" name="longitude" id="longitude" value="<?php echo set_value('longitude'); ?>">
                                    <?php echo form_error('address'); ?>
                                      <div class="has-danger"><div id="address_msg" class="form-control-feedback" style="display: none;">This field is required.</div></div>
                                 </div>
                              </div>


                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_address_line_2'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="address_line_2" id="address_line_2" placeholder="<?php echo $this->lang->line('label_address_line_2'); ?>" value="<?php echo set_value('address_line2')?set_value('address_line2'):$result['address_line2']; ?>" maxlength="256">
                                    <?php echo form_error('address_line2'); ?>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_city'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="city" id="city" placeholder="<?php echo $this->lang->line('label_city'); ?>" value="<?php echo set_value('city')?set_value('city'):$result['city']; ?>" maxlength="64" >
                                    <?php echo form_error('city'); ?>
                                    <div class="has-danger"><div id="city_msg" class="form-control-feedback" style="display: none;">This field is required.</div></div>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_state'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="state" id="state" placeholder="<?php echo $this->lang->line('label_state'); ?>" value="<?php echo set_value('state')?set_value('state'):$result['state']; ?>" maxlength="64">
                                    <?php echo form_error('state'); ?>
                                     <div class="has-danger"><div id="state_msg" class="form-control-feedback" style="display: none;">This field is required.</div></div>
                                 </div>
                              </div>


                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_zipcode'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="zipcode" id="zipcode" placeholder="<?php echo $this->lang->line('label_zipcode'); ?>" value="<?php echo set_value('zipcode')?set_value('zipcode'):$result['zipcode']; ?>" maxlength="64">
                                    <?php echo form_error('zipcode'); ?>
                                    <div class="has-danger"><div id="zipcode_msg" class="form-control-feedback" style="display: none;">This field is required.</div></div>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_cellphone_number'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="cellphone_number" id="cellphone_number" placeholder="<?php echo $this->lang->line('label_cellphone_number'); ?>" value="<?php echo set_value('cellphone_number')?set_value('cellphone_number'):$result['cellphone_number']; ?>" maxlength="16">
                                    <?php echo form_error('cellphone_number'); ?>
                                    <div class="form-control-feedback" id="cellphone_number_msg" style="display: none;">This field is required and should be 10 digit.</div>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                <span id="astric">*</span> <?php echo $this->lang->line('label_telephone_number'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="telephone_number" id="telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php echo set_value('telephone_number')?set_value('telephone_number'):$result['telephone_number']; ?>" maxlength="16">
                                    <?php echo form_error('telephone_number'); ?>
                                    
                                    <div class="form-control-feedback" id="telphone_number_msg" style="display: none;">This field is required and should be 10 digit.</div>
                                 </div>
                              </div>
                           </div>
                        <div class="col-lg-6">
                              
                        
                        
                        
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                <span id="astric">*</span> <?php echo $this->lang->line('label_country'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                 
                                 <select class="form-control m-input" name="country" id="country" style="color: blue; font-weight: bold;">
                                       <option value="" selected="selected">Select Country</option>
                                    	<option value="100" <?php if($result['country'] == '100'){ echo "selected";}?>>United States</option>
                                    	<option value="101" <?php if($result['country'] == '101'){ echo "selected";}?>>Dominical Republic</option>
                                    </select>
                                     <div class="has-danger"><div id="country_msg" class="form-control-feedback" style="display: none;">This field is required.</div></div>
                                 </div>
                              </div>
                        
                        
                        
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_branch'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <select class = "form-control m-input" name="branch" id="branch">
                                       <option value = ""><?php echo $this->lang->line('select').' '.$this->lang->line('label_branch'); ?></option>
                        
                                       <?php if(count($branch_list) > 0){
                                          foreach($branch_list as $val) {   
                                          ?>
                                       <option value="<?php echo $val->id; ?>" <?php if($current_user_branchId == $val->id){ echo "Selected";}?>><?php echo $val->branch_name; ?></option>
                                       <?php } } else{ ?>
                                       <option value = ""><?php echo $this->lang->line('label_branch').' '.$this->lang->line('not_found'); ?></option>
                                       <?php } ?>
                                    </select>
                                     <div class="has-danger"><div id="branch_id_msg" class="form-control-feedback" style="display: none;">This field is required.</div></div>
                                 </div>
                              </div>
                        
                        
                        
                              
                        
                        
                           
                             
                        
                        
                           
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_username'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="username" id="username" placeholder="<?php echo $this->lang->line('label_username'); ?>" value="<?php echo set_value('username')?set_value('username'):$result['user_name']; ?>" maxlength="64" >
                   
                                    <div class="has-danger"><div id="username_msg" class="form-control-feedback" style="display: none;">This field is required.</div></div>
                                 </div>
                              </div>
                        
                        
                           
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_password'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="password" class="form-control m-input" name="password" id="password" placeholder="<?php echo $this->lang->line('label_password'); ?>" value="<?php echo set_value('password')?set_value('password'):"" ?>" maxlength="64" >
                                    <?php echo form_error('password'); ?>
                                    <div class="has-danger"><div id="password_msg" class="form-control-feedback" style="display: none;">This field is required.</div></div>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_confirm_password'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                 <input type="password" name="confirmpassword" id="confirmpassword" class="form-control m-input" placeholder="<?php echo $this->lang->line('label_confirm_password'); ?>" value="<?php echo set_value('password')?set_value('password'):""; ?>">
                                                        <?php echo form_error('confirmpassword'); ?>
                                 </div>
                              </div>



                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                    <span id="astric">*</span> <?php echo $this->lang->line('label_email'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="email" id="email" placeholder="<?php echo $this->lang->line('label_email'); ?>" value="<?php echo set_value('email')?set_value('email'):$result['email']; ?>" maxlength="64" >
                                    <?php echo form_error('email'); ?>
                                     <div class="has-danger"><div id="email_msg" class="form-control-feedback" style="display: none;">This field is required.</div></div>
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
	$(document).ready(function(){
 var agent_company = $('#agent_company').val();
     var fname= $('#fname').val();
      var lname= $('#lname').val();
      var address_line1= $('#address').val();
      var city= $('#city').val();
      var state= $('#state').val();
      var zipcode = $('#zipcode').val();
      var country = $('#country').val();
      var branch_id = $('#branch_id').val();
      var username = $('#username').val();
      var password = $('#password').val();
      var email = $('#email').val();
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
           var lname = $('#lname').val();
           if(lname != ''){
               jQuery('#lname_msg').hide();
               return true;
            }
      });
      $("#address").change(function() {

           var address_1 = $('#address').val();
           if(address_1 != ''){
               jQuery('#address_msg').hide();
               return true;
            }
            $("#address").keydown(function(){
               var city = $('#city').val();
          alert(city);
         });
          
            
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

 $("#zipcode").change(function() {
           var zipcode = $('#zipcode').val();
           if(zipcode != ''){
               jQuery('#zipcode_msg').hide();
               return true;
            }
      });
       $("#country").change(function() {
           var country = $('#country').val();
           if(country != ''){
               jQuery('#country_msg').hide();
               return true;
            }
            else{
               jQuery('#country_msg').show();
               return false;
            }
      });
       $("#branch_id").change(function() {
           var branch_id = $('#branch_id').val();
           if(branch_id != ''){
               jQuery('#branch_id_msg').hide();
               return true;
            }
            else{
               jQuery('#branch_id_msg').show();
               return false;
            }
      });
      $("#username").change(function() {
           var username = $('#username').val();
           if(username != ''){
               jQuery('#username_msg').hide();
               return true;
            }
      });
      $("#password").change(function() {
           var username = $('#password').val();
           if(password != ''){
               jQuery('#password_msg').hide();
               return true;
            }
      });
       $("#email").change(function() {
           var email = $('#email').val();
           if(email != ''){
               jQuery('#email_msg').hide();
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
               jQuery('#telphone_number_msg').show();
               $(this).focus();
               return false;
            }else{
               //alert("true");
               jQuery('#telphone_number_msg').hide();
               return true;
            }
      });




jQuery('button.btn.btn-success').click(function(){
      var fname= $('#fname').val();
      var lname= $('#lname').val();
      var address_line1= $('#address').val();
      var city= $('#city').val();
      var state= $('#state').val();
      var zipcode = $('#zipcode').val();
      var country = $('#country').val();
      var branch_id = $('#branch_id').val();
      var username = $('#username').val();
      var password = $('#password').val();
      var email = $('#email').val();
      var celno  =jQuery('input#cellphone_number').val();
      var telno  =jQuery('input#telephone_number').val();
      var nolength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(celno);
      var tellength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(telno);

if( fname == '' && lname == '' && address_line1 == '' && city == '' && state == '' && zipcode =='' && country == 0 && branch_id == 0 && username =='' && password =='' && email == '' &&  nolength == false && tellength == false){
   jQuery('#fname_msg').show();
    jQuery('#lname_msg').show();
    jQuery('#address_msg').show();
    jQuery('#city_msg').show();
    jQuery('#state_msg').show();
    jQuery('#zipcode_msg').show();
   jQuery('#cellphone_number_msg').show();
   jQuery('#telphone_number_msg').show();
   jQuery('#country_msg').show();
    jQuery('#branch_id_msg').show();
    jQuery('#username_msg').show();
     jQuery('#password_msg').show();
     jQuery('#email_msg').show();
            return false;
         }
         else{
 if(jQuery('#fname').val() == ''){
 jQuery('#fname_msg').show();
   return false;
}
else if(jQuery('#lname').val() ==''){
 jQuery('#fname_msg').hide();
 jQuery('#lname_msg').show();
   return false;

}
else if(jQuery('#address').val() ==''){
    jQuery('#fname_msg').hide();
     jQuery('#lname_msg').hide();
   jQuery('#address_msg').show();
   return false;

}
else if(jQuery('#city').val() ==''){
    jQuery('#fname_msg').hide();
    jQuery('#lname_msg').hide();
    jQuery('#address_msg').hide();
    jQuery('#city_msg').show();
   return false;
}

else if(jQuery('#state').val() ==''){
    jQuery('#fname_msg').hide();
    jQuery('#lname_msg').hide();
    jQuery('#address_msg').hide();
    jQuery('#city_msg').hide();
    jQuery('#state_msg').show();
    return false;

}
else if(jQuery('#zipcode').val() ==''){
    jQuery('#fname_msg').hide();
    jQuery('#lname_msg').hide();
    jQuery('#address_msg').hide();
    jQuery('#city_msg').hide();
    jQuery('#state_msg').hide();
    jQuery('#zipcode_msg').show();
    return false;

}

 else if(nolength == false){
   jQuery('#fname_msg').hide();
    jQuery('#lname_msg').hide();
    jQuery('#address_msg').hide();
    jQuery('#city_msg').hide();
    jQuery('#state_msg').hide();
    jQuery('#zipcode_msg').hide();
    jQuery('#cellphone_number_msg').show();
	return false;
}else if(tellength == false){
    jQuery('#fname_msg').hide();
    jQuery('#lname_msg').hide();
    jQuery('#address_msg').hide();
    jQuery('#city_msg').hide();
    jQuery('#state_msg').hide();
    jQuery('#zipcode_msg').hide();
	jQuery('#cellphone_number_msg').hide();
	jQuery('#telphone_number_msg').show();
return false;
}
else if(jQuery('#country').val() == ''){
   console.log(jQuery('#country').val());
    jQuery('#fname_msg').hide();
    jQuery('#lname_msg').hide();
    jQuery('#address_msg').hide();
    jQuery('#city_msg').hide();
    jQuery('#state_msg').hide();
    jQuery('#zipcode_msg').hide();
   jQuery('#cellphone_number_msg').hide();
   jQuery('#telphone_number_msg').hide();
   jQuery('#country_msg').show();
    return false;
}else if(jQuery('#branch_id').val() == ''){
    console.log(jQuery('#branch_id').val());
    jQuery('#fname_msg').hide();
    jQuery('#lname_msg').hide();
    jQuery('#address_msg').hide();
    jQuery('#city_msg').hide();
    jQuery('#state_msg').hide();
    jQuery('#zipcode_msg').hide();
   jQuery('#cellphone_number_msg').hide();
   jQuery('#telphone_number_msg').hide();
   jQuery('#country_msg').hide();
    jQuery('#branch_id_msg').show();
return false;
}
//   else if(jQuery('#username').val() == ''){
//     jQuery('#fname_msg').hide();
//     jQuery('#lname_msg').hide();
//     jQuery('#address_msg').hide();
//     jQuery('#city_msg').hide();
//     jQuery('#state_msg').hide();
//     jQuery('#zipcode_msg').hide();
//    jQuery('#cellphone_number_msg').hide();
//    jQuery('#telphone_number_msg').hide();
//    jQuery('#country_msg').hide();
//     jQuery('#branch_id_msg').hide();
//     jQuery('#username_msg').hide();

// return false;
// }
else if(jQuery('#password').val() == ''){
     jQuery('#fname_msg').hide();
    jQuery('#lname_msg').hide();
    jQuery('#address_msg').hide();
    jQuery('#city_msg').hide();
    jQuery('#state_msg').hide();
    jQuery('#zipcode_msg').hide();
   jQuery('#cellphone_number_msg').hide();
   jQuery('#telphone_number_msg').hide();
   jQuery('#country_msg').hide();
    jQuery('#branch_id_msg').hide();
    jQuery('#username_msg').hide();
     jQuery('#password_msg').show();

return false;
}else if(jQuery('#email').val() == ''){
     jQuery('#fname_msg').hide();
    jQuery('#lname_msg').hide();
    jQuery('#address_msg').hide();
    jQuery('#city_msg').hide();
    jQuery('#state_msg').hide();
    jQuery('#zipcode_msg').hide();
   jQuery('#cellphone_number_msg').hide();
   jQuery('#telphone_number_msg').hide();
   jQuery('#country_msg').hide();
    jQuery('#branch_id_msg').hide();
    jQuery('#username_msg').hide();
     jQuery('#password_msg').hide();
     jQuery('#email_msg').show();


return false;
}
else{

return true;
}
}

});

	});
</script> 


