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
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_branch_id').'#'; ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input t	ype="text" class="form-control m-input" name="branch_id" id="branch_id" placeholder="<?php echo $this->lang->line('label_branch_id'); ?>" value="<?=$max_value?>" disabled = "disabled">
                                    <input type="hidden" name="branch_id_hdn" id="branch_id_hdn" value="<?php echo $max_value; ?>">
                                    <?php echo form_error('item_number'); ?>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_branch').' '.$this->lang->line('label_name'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="name" id="name" placeholder="<?php echo $this->lang->line('label_name'); ?>" value="<?=$result['name']?$result['name']:set_value('name')?>" maxlength="128" >
                                    <?php echo form_error('name'); ?>
                                    <div id="name_msg" class="form-control-feedback" style="display: none;">This field is required</div>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span><?php echo $this->lang->line('label_address_1'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="address_line_1" id="address_line_1" placeholder="<?php echo $this->lang->line('label_address_1'); ?>" value="<?=$result['address_line1']?$result['address_line1']:set_value('address_line1')?>" maxlength="256">
                                    <?php echo form_error('address_line_1'); ?>
                                    <div id="address_line_1_msg" class="form-control-feedback" style="display: none;">This field is required</div>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> <?php echo $this->lang->line('label_address_2'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="address_line_2" id="address_line_2" placeholder="<?php echo $this->lang->line('label_address_2'); ?>" value="<?=$result['address_line2']?$result['address_line2']:set_value('address_line2')?>" maxlength="256">
                                    <?php echo form_error('address_line_2'); ?>
                                    <div id="address_line_2_msg" class="form-control-feedback" style="display: none;">This field is required</div>
                                 </div>
                              </div>

										 <div class="row mb-3">
										 <label class="form_label col-md-4 col-lg-3 text-right">
                                   <span id="astric">*</span> <?php echo $this->lang->line('label_city'); ?>:
                                    </label>
                                 <div class="col-md-8 col-lg-9">
														<input type="text" class="form-control m-input" name="city" id="city" placeholder="<?php echo $this->lang->line('label_city'); ?>" value="<?=$result['city']?$result['city']:set_value('city')?>" maxlength="64">
                                       <?php echo form_error('city'); ?>
                                       <div id="city_msg" class="form-control-feedback" style="display: none;">This field is required</div>
                                 </div>
                              </div>

										 <div class="row mb-3">
										 <label class="form_label col-md-4 col-lg-3 text-right">
                                   <span id="astric">*</span><?php echo $this->lang->line('label_state'); ?>:
                                    </label>
                                 <div class="col-md-8 col-lg-9">
											<input type="text" class="form-control m-input" name="state" id="state" placeholder="<?php echo $this->lang->line('label_state'); ?>" value="<?=$result['state']?$result['state']:set_value('state')?>" maxlength="64">
                                       <?php echo form_error('state'); ?>
                                       <div id="state_msg" class="form-control-feedback" style="display: none;">This field is required</div>
                                 </div>
                              </div>


                           </div>
                           <div class="col-lg-6">
                              <div class="row mb-3">
										<label class="form_label col-md-4 col-lg-3 text-right">
									<span id="astric">*</span> <?php echo $this->lang->line('label_zipcode'); ?>:
                                    </label>
                                 <div class="col-md-8 col-lg-9">
											<input type="text" class="form-control m-input" name="zipcode" id="zipcode" placeholder="<?php echo $this->lang->line('label_zipcode'); ?>" value="<?=$result['zipcode']?$result['zipcode']:set_value('zipcode')?>" maxlength="32">
                                       <?php echo form_error('zipcode'); ?>
                                       <div id="zipcode_msg" class="form-control-feedback" style="display: none;">This field is required</div>
                                 </div>
                              </div>
                              <div class="row mb-3">
										<label class="form_label col-md-4 col-lg-3 text-right">
                                  <span id="astric">*</span> <?php echo $this->lang->line('label_telephone_number'); ?>:
                                    </label>
                                 <div class="col-md-8 col-lg-9">
											<input type="text" class="form-control m-input" name="telephone_number1" id="telephone_number1" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?=$result['telephone_number1']?$result['telephone_number1']:set_value('telephone_number1')?>" maxlength="16">
                                       <?php echo form_error('telephone_number1'); ?>
                                       <div id="telephone_number1_msg" class="form-control-feedback" style="display: none;">This field is required & should be 10 digits</div>
                                 </div>
                              </div>
                              <div class="row mb-3">
										<label class="form_label col-md-4 col-lg-3 text-right">
                                   <span id="astric">*</span><?php echo $this->lang->line('label_cellphone_number'); ?>:
                                    </label>
                                 <div class="col-md-8 col-lg-9">
											<input type="text" class="form-control m-input" name="telephone_number2" id="telephone_number2" placeholder="<?php echo $this->lang->line('label_cellphone_number'); ?>" value="<?=$result['telephone_number2']?$result['telephone_number2']:set_value('telephone_number2')?>" maxlength="16">
                                       <?php echo form_error('telephone_number2'); ?>
                                       <div id="telephone_number2_msg" class="form-control-feedback" style="display: none;">This field is required  & should be 10 digits</div>
                                 </div>
                              </div>
                              <div class="row mb-3">
										<label class="form_label col-md-4 col-lg-3 text-right">
                                   <span id="astric">*</span> <?php echo $this->lang->line('label_country'); ?>:
                                    </label>
                                 <div class="col-md-8 col-lg-9">
											<input type="text" class="form-control m-input" name="country" id="country" placeholder="<?php echo $this->lang->line('label_country'); ?>" value="<?=$result['country']?$result['country']:set_value('country')?>">
                                       <?php echo form_error('country'); ?>
                                       <div id="country_msg" class="form-control-feedback" style="display: none;">This field is required</div>
                                 </div>
                              </div>


										<div class="row mb-3">
										<label class="form_label col-md-4 col-lg-3 text-right">
												<span id="astric">*</span><?php echo $this->lang->line('label_print'); ?>:
                                    </label>
                                    
												<div class="col-md-8 col-lg-9">
                                    <div class="m-radio-inline">
                                       <label class="m-radio">
                                       <input name="print" value="Yes" type="radio" <?=$result['print']=='Yes'?"checked":''?>>
                                       <?php echo $this->lang->line('label_yes'); ?>
                                       <span></span>
                                       </label>
                                       <label class="m-radio">
                                       <input name="print" value="Yes" type="radio" <?=($result['print']=='No'?"checked":(isset($result['print']) ? '' : 'checked'))?>>
                                       
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
   <?php echo form_close(); ?>
</div>
<script type="text/javascript">
   $(document).ready(function(){
      var name= $('#name').val();
      var address_line_1= $('#address_line_1').val();
      var address_line_2= $('#address_line_2').val();
      var city= $('#city').val();
      var state= $('#state').val();
      var country= $('#country').val();
      var zipcode= $('#zipcode').val();
      var telno  =jQuery('input#telephone_number1').val();
      var celno  =jQuery('input#telephone_number2').val();
      var telnolength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(telno);
      var celnolength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(celno);
      
      $("#name").change(function() {
           var fname = $('#name').val();
           if(fname != ''){
               jQuery('#name_msg').hide();
               return true;
            }
      });
      $("#address_line_1").change(function() {
           var fname = $('#address_line_1').val();
           if(fname != ''){
               jQuery('#address_line_1_msg').hide();
               return true;
            }
      });
      $("#address_line_2").change(function() {
           var fname = $('#address_line_2').val();
           if(fname != ''){
               jQuery('#address_line_2_msg').hide();
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
      $("#country").change(function() {
           var fname = $('#country').val();
           if(fname != ''){
               jQuery('#country_msg').hide();
               return true;
            }
      });
      
      $("#zipcode").change(function() {
           var fname = $('#zipcode').val();
           if(fname != ''){
               jQuery('#zipcode_msg').hide();
               return true;
            }
      });
      $("#telephone_number1").change(function() {
         var telno  =jQuery('input#telephone_number1').val();
         var telnolength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(telno);
         alert("tell");          //var fname = $('input#cellphone_number').val();
         console.log(telno);
         console.log(telnolength);
           if(telnolength == false){
               jQuery('#telephone_number1_msg').show();
               $(this).focus();
               return false;
            }else{
               jQuery('#telephone_number1_msg').hide();
               return true;
            }
      });
      $("#telephone_number2").change(function() {
         var celno  =jQuery('input#telephone_number2').val();
         var celnolength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(celno);
         alert("cell");          //var fname = $('input#cellphone_number').val();
         console.log(celno);
         console.log(celnolength);
           if(celnolength == false ){
            //alert("false");
               jQuery('#telephone_number2_msg').show();
               $(this).focus();
               return false;
            }else{
               //alert("true");
               jQuery('#telephone_number2_msg').hide();
               return true;
            }
      });
      jQuery('button.btn.btn-success').click(function(){
         var name= $('#name').val();
         var address_line_1= $('#address_line_1').val();
         var address_line_2= $('#address_line_2').val();
         var city= $('#city').val();
         var state= $('#state').val();
         var country= $('#country').val();
         var zipcode= $('#zipcode').val();
         var telno  =jQuery('input#telephone_number1').val();
         var celno  =jQuery('input#telephone_number2').val();
         var telnolength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(telno);
         var celnolength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(celno);

         if(name == '' && address_line_1 == '' && address_line_2 == '' && city == '' && state == '' && country == '' && zipcode == '' && telnolength== false && celnolength == false){
             jQuery('#name_msg').show();
            jQuery('#address_line_1_msg').show();
            jQuery('#address_line_2_msg').show();
            jQuery('#city_msg').show();
            jQuery('#state_msg').show();
            jQuery('#country_msg').show();
            jQuery('#zipcode_msg').show();
            jQuery('#telephone_number1_msg').show();
            jQuery('#telephone_number2_msg').show();
            return false;
         }else{   
            if(name == ''){
               jQuery('#name_msg').show();
               return false;
            }else if(address_line_1 == ''){
               jQuery('#name_msg').hide();
               jQuery('#address_line_1_msg').show();
               return false;
            }else if(address_line_2 == ''){
               jQuery('#name_msg').hide();
               jQuery('#address_line_1_msg').hide();
               jQuery('#address_line_2_msg').show();
               return false;
            }else if(city == ''){
               jQuery('#name_msg').hide();
               jQuery('#address_line_1_msg').hide();
               jQuery('#address_line_2_msg').hide();
               jQuery('#city_msg').show();
               return false;
            }else if(state == ''){
               jQuery('#name_msg').hide();
               jQuery('#address_line_1_msg').hide();
               jQuery('#address_line_2_msg').hide();
               jQuery('#city_msg').hide();
               jQuery('#state_msg').show();
               return false;
            }else if(country == ''){
               jQuery('#name_msg').hide();
               jQuery('#address_line_1_msg').hide();
               jQuery('#address_line_2_msg').hide();
               jQuery('#city_msg').hide();
               jQuery('#state_msg').hide();
               jQuery('#country_msg').show();
               return false;
            }else if(zipcode == ''){
               jQuery('#name_msg').hide();
               jQuery('#address_line_1_msg').hide();
               jQuery('#address_line_2_msg').hide();
               jQuery('#city_msg').hide();
               jQuery('#state_msg').hide();
               jQuery('#country_msg').hide();
               jQuery('#zipcode_msg').show();
               return false;
            }else if(telnolength == false){
               jQuery('#name_msg').hide();
               jQuery('#address_line_1_msg').hide();
               jQuery('#address_line_2_msg').hide();
               jQuery('#city_msg').hide();
               jQuery('#state_msg').hide();
               jQuery('#country_msg').hide();
               jQuery('#zipcode_msg').hide();
               jQuery('#telephone_number1_msg').show();
               return false;
            }else if(celnolength == false){
               jQuery('#name_msg').hide();
               jQuery('#address_line_1_msg').hide();
               jQuery('#address_line_2_msg').hide();
               jQuery('#city_msg').hide();
               jQuery('#state_msg').hide();
               jQuery('#country_msg').hide();
               jQuery('#zipcode_msg').hide();
               jQuery('#telephone_number1_msg').hide();
               jQuery('#telephone_number2_msg').show();
               return false;
            }
            else{
               return true;
            }
         }
      });
   });
</script>  