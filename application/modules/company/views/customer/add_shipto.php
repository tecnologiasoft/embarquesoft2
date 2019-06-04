<div class="m-content">
   <!--begin::Form-->
   <?php 
      $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'm_form_1','enctype'=>'multipart/form-data'); 
      echo form_open('company/customer/add_shipto/'.$user_result['id'],$form_data); 
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
                  <input type="hidden" name="customer_id" value="<?php echo $user_result['id']; ?>">
                  <div class="form-group m-form__group row">
                     <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                           <span id="astric">*</span><?php echo $this->lang->line('label_shipto_id'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="shipto_id" id="shipto_id" placeholder="<?php echo $this->lang->line('label_shipto_id'); ?>" value="<?php echo set_value('shipto_id', $next_id); ?>" maxlength="20" readonly >
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
                              <input type="text" class="form-control m-input" name="telephone" id="telephone" placeholder="<?php echo $this->lang->line('label_telephone'); ?>" value="<?php echo set_value('telephone'); ?>" maxlength="128" tabindex = "12">
                              <?php //echo form_error('telephone'); ?>
                              <div id="telephone_msg" style="display: none;" class="form-control-feedback">This field is required & should be 10 digit.</div>
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
                              <input type="text" class="form-control m-input" name="company_name" id="company_name" placeholder="<?php echo $this->lang->line('label_company'); ?>" value="<?php echo set_value('company_name'); ?>" maxlength="128" tabindex = "1">
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
                              <input type="text" class="form-control m-input" name="cellphone_number" id="cellphone_number" placeholder="<?php echo $this->lang->line('cellular'); ?>" value="<?php echo set_value('cellphone_number'); ?>" maxlength="16" tabindex = "12">
                              <?php //echo form_error('cellphone_number'); ?>
                              <div id="cellphone_number_msg" style="display: none;" class="form-control-feedback">This field is required & should be 10 digit.</div>
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
                              <input type="text" class="form-control m-input" name="fname" id="fname" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php echo set_value('fname'); ?>" maxlength="64" tabindex = "2">
                              <?php //echo form_error('fname'); ?>
                              <div id="fname_msg" class="form-control-feedback" style="display: none;">This field is required</div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                             <span id="astric">*</span><?php echo $this->lang->line('label_email'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="email" class="form-control m-input" name="email" id="email" placeholder="<?php echo $this->lang->line('label_email'); ?>" value="<?php echo set_value('email'); ?>" maxlength="128" tabindex = "13">
                              <?php //echo form_error('email'); ?>
                              <div id="email_msg" class="form-control-feedback" style="display: none;">This field is required</div>
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
                              <input type="text" class="form-control m-input" name="lname" id="lname" placeholder="<?php echo $this->lang->line('label_last_name'); ?>" value="<?php echo set_value('lname'); ?>" maxlength="128" tabindex = "3">
                              <?php //echo form_error('email'); ?>
                              <div id="lname_msg" class="form-control-feedback" style="display: none;">This field is required</div>
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
                          <span id="astric">*</span><?php echo $this->lang->line('label_address'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="address" id="address" placeholder="<?php echo $this->lang->line('label_address_1'); ?>" value="<?php echo set_value('address'); ?>" tabindex = "4">
                              <input type="hidden" name="latitude" id="latitude" value="<?php echo set_value('latitude'); ?>">
                              <input type="hidden" name="longitude" id="longitude" value="<?php echo set_value('longitude'); ?>">
                              <?php //echo form_error('address'); ?>
                              <div id="address_msg" class="form-control-feedback" style="display: none;">This field is required</div>
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
                              <img src="<?php echo base_url().CUSTOMER_IMAGES.$result['lic_picture']; ?>" class="img-responsive img-thumb" style="height: 90px; width: 150px;">
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
                              <input type="text" class="form-control m-input" name="address_line_1" id="address_line_1" placeholder="<?php echo $this->lang->line('label_address_2'); ?>" value="<?php echo set_value('address_line_1'); ?>" maxlength="256" tabindex = "5">
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
                                 <input name="language" value="English" type="radio" tabindex="16" checked>
                                 English
                                 <span></span>
                                 </label>
                                 <label class="m-radio">
                                 <input name="language" value="Spanish" type="radio" tabindex="17">
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
                              <input type="text" class="form-control m-input" name="address_line_2" id="address_line_2" placeholder="<?php echo $this->lang->line('label_address_3'); ?>" value="<?php echo set_value('address_line_2'); ?>" maxlength="256" tabindex = "6">
                              <?php echo form_error('address_line_3'); ?>
                           </div>
                        </div>
                     </div>
                    
                     <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                          <span id="astric">*</span> <?php echo $this->lang->line('label_country'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              
                              <?php country_dropwon(); ?>
                              <div id="country_msg" class="form-control-feedback" style="display: none;">This field is required</div>
                           </div>
                           
                        </div>
                     </div>
                  </div>
                  

                  <div class="form-group m-form__group row">

                   <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                           <span id="astric">*</span><?php echo $this->lang->line('label_sector'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="sector" id="state" placeholder="<?php echo $this->lang->line('label_sector'); ?>" value="<?php echo set_value('sector'); ?>" tabindex = "9" >
                              <?php //echo form_error('sector'); ?>
                              <div id="state_msg" class="form-control-feedback" style="display: none;">This field is required</div>
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
                              <input type="text" class="form-control m-input" name="province" id="city" placeholder="<?php echo $this->lang->line('label_province'); ?>" value="<?php echo set_value('province'); ?>" maxlength="64" tabindex = "7">
                              <?php //echo form_error('province'); ?>
                              <div id="city_msg" class="form-control-feedback" style="display: none;">This field is required</div>
                           </div>
                        </div>
                     </div>
                  </div>


                  

                  <div class="form-group m-form__group row">
                     <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                             <span id="astric">*</span><?php echo $this->lang->line('label_municipal'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="municipal" id="municipal" placeholder="<?php echo $this->lang->line('label_municipal'); ?>" value="<?php echo set_value('municipal'); ?>" maxlength="16" tabindex = "8">
                              <?php //echo form_error('municipal'); ?>
                              <div id="municipal_msg" class="form-control-feedback" style="display: none;">This field is required</div>
                           </div>
                        </div>
                     </div>
                              </div>

                  <div class="form-group m-form__group row">
                     <div class="col-md-12 col-lg-6">
                        <div class="row">
                           <label class="form_label col-md-4 col-lg-3 text-right">
                             <span id="astric">*</span><?php echo $this->lang->line('label_region'); ?>:
                           </label>
                           <div class="col-md-8 col-lg-9">
                              <input type="text" class="form-control m-input" name="region" id="region" placeholder="<?php echo $this->lang->line('label_region'); ?>" value="<?php echo set_value('region'); ?>" maxlength="64" tabindex = "10">
                              <?php //echo form_error('region'); ?>
                              <div id="region_msg" class="form-control-feedback" style="display: none;">This field is required</div>
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
<script type="text/javascript">
   $(document).ready(function(){
      //alert("test");
      var fname= $('#fname').val();
         var lname= $('#lname').val();
         var address= $('#address').val();
         var state= $('#state').val();
         var city= $('#city').val();
         var municipal= $('#municipal').val();
         var region= $('#region').val();
         
         var email= $('#email').val();
         var country= $('#country').val();
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
      $("#address").change(function() {
           var fname = $('#address').val();
           if(fname != ''){
               jQuery('#address_msg').hide();
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
      $("#municipal").change(function() {
           var fname = $('#municipal').val();
           if(fname != ''){
               jQuery('#municipal_msg').hide();
               return true;
            }
      });
      $("#region").change(function() {
           var fname = $('#region').val();
           if(fname != ''){
               jQuery('#region_msg').hide();
               return true;
            }
      });
      $("#email").change(function() {
           var fname = $('#email').val();
           if(fname != ''){
               jQuery('#email_msg').hide();
               return true;
            }
      });
      $("#country").change(function() {
           var fname = $('#country').val();
           if(fname != ''){
               jQuery('#country_msg').hide();
               return true;
            }
      });
      
      
      
      $("#cellphone_number").change(function() {
         //alert("test cell");          //var fname = $('input#cellphone_number').val();
           
         var cellphone_number  =jQuery('input#cellphone_number').val();
         var celllength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(cellphone_number);
        
      
           if(celllength == false){
               jQuery('#cellphone_number_msg').show();
               $(this).focus();
               return false;
            }else{
               jQuery('#cellphone_number_msg').hide();
               return true;
            }
      });
      $("#telephone").change(function() {
         //alert("test tell");
           //var fname = $('input#telephone_number').val();
           var telephone  =jQuery('input#telephone').val();
         var tellength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(telephone);
         //alert(tellength);
           if(tellength == false){
            //alert("false");
               jQuery('#telephone_msg').show();
               jQuery('#telephone_msg').show();
               $(this).focus();
               return false;
            }else{
               //alert("true");
               jQuery('#telephone_msg').hide();
               return true;
            }
      });
      jQuery('button.btn.btn-success').click(function(){
         //alert("test2");
         var fname= $('#fname').val();
         var lname= $('#lname').val();
         var address= $('#address').val();
         var state= $('#state').val();
         var city= $('#city').val();
         var municipal= $('#municipal').val();
         var region= $('#region').val();
         var telephone  =jQuery('input#telephone').val();
         var cellphone_number  =jQuery('input#cellphone_number').val();
         var celllength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(cellphone_number);
         var tellength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(telephone);
         var email= $('#email').val();
         var country= $('#country').val();

         if(fname == '' && lname == '' && address == '' && city == '' && state == '' && municipal=='' && region == '' &&  celllength== false && tellength == false && email == '' && country == ''){
            jQuery('#fname_msg').show();
            jQuery('#lname_msg').show();
            jQuery('#address_msg').show();
            jQuery('#state_msg').show();
            jQuery('#city_msg').show();
            jQuery('#municipal_msg').show();
            jQuery('#region_msg').show();
            jQuery('#telephone_msg').show();
            jQuery('#cellphone_number_msg').show();
            jQuery('#email_msg').show();
            jQuery('#country_msg').show();
            return false;
         }else{   
            if(fname == ''){
               jQuery('#fname_msg').show();
               return false;
            }else if(lname == ''){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').show();
               return false;
            }else if(address == ''){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').hide();
               jQuery('#address_msg').show();
               return false;
            }else if(city == ''){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').hide();
               jQuery('#address_msg').hide();
               jQuery('#city_msg').show();
               return false;
            }else if(state == ''){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').hide();
               jQuery('#address_msg').hide();
               jQuery('#city_msg').hide();
               jQuery('#state_msg').show();
               return false;
            }else if(municipal == ''){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').hide();
               jQuery('#address_msg').hide();
               jQuery('#city_msg').hide();
               jQuery('#state_msg').hide();
               jQuery('#municipal_msg').show();
               return false;
            }else if(region == ''){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').hide();
               jQuery('#address_msg').hide();
               jQuery('#city_msg').hide();
               jQuery('#state_msg').hide();
               jQuery('#municipal_msg').hide();
               jQuery('#region_msg').show();
               return false;
            }
            else if(tellength == false){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').hide();
               jQuery('#address_msg').hide();
               jQuery('#city_msg').hide();
               jQuery('#state_msg').hide();
               jQuery('#municipal_msg').hide();
                jQuery('#region_msg').hide();
               jQuery('#telephone_msg').show();
               return false;
            }else if(celllength == false){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').hide();
               jQuery('#address_msg').hide();
               jQuery('#city_msg').hide();
               jQuery('#state_msg').hide();
               jQuery('#municipal_msg').hide();
               jQuery('#region_msg').hide();
               jQuery('#telephone_msg').hide();
               jQuery('#cellphone_number_msg').show();
               return false;
            }else if( email == ''){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').hide();
               jQuery('#address_msg').hide();
               jQuery('#city_msg').hide();
               jQuery('#state_msg').hide();
               jQuery('#municipal_msg').hide();
               jQuery('#region_msg').hide();
               jQuery('#telephone_msg').hide();
               jQuery('#cellphone_number_msg').hide();
               jQuery('#email_msg').show();
               return false;
            }else if( country == ''){
               jQuery('#fname_msg').hide();
               jQuery('#lname_msg').hide();
               jQuery('#address_msg').hide();
               jQuery('#city_msg').hide();
               jQuery('#state_msg').hide();
               jQuery('#municipal_msg').hide();
               jQuery('#region_msg').hide();
               jQuery('#telephone_msg').hide();
               jQuery('#cellphone_number_msg').hide();
               jQuery('#country_msg').show();
               return false;
            }
            else{
               return true;
            }
         }
      });
   });
</script> 