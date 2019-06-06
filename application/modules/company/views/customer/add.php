<!-- END: Subheader -->

<div class="m-content">
   <!--begin::Form-->
   <?php
      $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right', 'id' => 'm_form_1', 'enctype' => 'multipart/form-data');
      echo form_open('company/customer/save/', $form_data);
      ?>
   <input type="hidden" name="id" value="<?php if (!empty($result['id'])) {
      echo $result['id'];
      } else {
      set_value('id');
      }
      ?>">
   <div class="row">
      <div class="col-xl-12">
         <div class="m-portlet m-portlet--full-height m-portlet--tabs">
            <div class="m-portlet__head">
               <div class="m-portlet__head-tools">
                  <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--4x m-tabs-line--left m-tabs-line--primary" role="tablist">
                     <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1 " role="tab" data-tab_id = "1">
                        <i class="flaticon-share m--hide"></i>
                        <?php echo $this->lang->line('menu_customer'); ?>
                        </a>
                     </li>
                     <li class="nav-item m-tabs__item ">
                        <a class="nav-link m-tabs__link <?php if ($tab_id == " 3") {
                           echo "active";
                           }
                           ?> " data-toggle="tab" href="#m_user_profile_tab_3" role="tab" data-tab_id = "3">
                        <?php echo $this->lang->line('label_invoice'); ?>
                        </a>
                     </li>
                     <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link <?php if ($tab_id == " 4") {
                           echo "active";
                           }
                           ?> " data-toggle="tab" href="#m_user_profile_tab_4" role="tab" data-tab_id = "4">
                        <?php echo $this->lang->line('label_payments'); ?>
                        </a>
                     </li>
                     <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link <?php if ($tab_id == " 7") {
                           echo "active";
                           }
                           ?> " data-toggle="tab" href="#m_user_profile_tab_7" role="tab" data-tab_id = "7">
                        <?php echo $this->lang->line('label_ship_to'); ?>
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
                                 <span id="astric">*</span> 
                                 <?php echo $this->lang->line('label_customer_id'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="customer_id" id="customer_id" placeholder="<?php echo $this->lang->line('label_customer_id'); ?>" value="<?php echo $next_id; ?>" maxlength="20" disabled>
                                    <?php echo form_error('customer_id'); ?>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_company'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="company_name" id="company_name" placeholder="<?php echo $this->lang->line('label_company'); ?>" value="<?php if(!empty($result['company_name'])) echo $result['company_name']; else echo set_value('company_name'); ?>" maxlength="128" >
                                    <?php echo form_error('company_name'); ?>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                                    <label class="form_label col-md-4 col-lg-3 text-right">

                                                       <span id="astric">*</span> 
                                                        <?php echo $this->lang->line('label_first_name'); ?>:
                                                    </label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="fname" id="firstname" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php if(!empty($result['fname'])) echo $result['fname']; else echo set_value('fname'); ?>" required>
                                                        <div class="form-control-feedback" id="fname_msg" style="display: none;">This field is required.</div>
                                                    </div>
                                                </div>

                              <div class="row mb-3">
                                    <label class="form_label col-md-4 col-lg-3 text-right">
                                    <span id="astric">*</span> 
                                    <?php echo $this->lang->line('label_last_name'); ?>:
                                    </label>
                                    <div class="col-md-8 col-lg-9">
                                       <input type="text" class="form-control m-input" name="lname" id="lastname" placeholder="<?php echo $this->lang->line('label_last_name'); ?>" value="<?php if(!empty($result['lname'])) echo $result['lname']; else echo set_value('lname'); ?>" maxlength="64">
                                       <div class="form-control-feedback" id="lname_msg" style="display: none;">This field is required.</div>
                                    </div>
                              </div>
                              <div class="row mb-3">
                                    <label class="form_label col-md-4 col-lg-3 text-right">
                                    <span id="astric">*</span> 
                                    <?php echo $this->lang->line('label_address'); ?>:
                                    </label>
                                    <div class="col-md-2 col-lg-4">
                                       <input type="text" class="form-control m-input" name="address_line1" id="address_line1" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php if(!empty($result['address_line1'])) echo $result['address_line1']; else echo set_value('address_line1'); ?>"  >
                                       <input type="hidden" name="latitude" id="latitude" value="<?php if(!empty($result['latitude'])) echo $result['latitude']; else echo set_value('latitude'); ?>">
                                       <input type="hidden" name="longitude" id="longitude" value="<?php if(!empty($result['longitude'])) echo $result['longitude']; else echo set_value('longitude'); ?>">
                                       <div class="form-control-feedback" id="address_line1_msg" style="display: none;">This field is required.</div>
                                    </div>

                                    <label class="form_label col-md-4 col-lg-2 p-1">
                                    
                                    <?php echo $this->lang->line('apartment'); ?>:
                                    </label>

                                    <div class="col-md-2 col-lg-3">
                                       <input type="text" class="form-control m-input" name="apartment" id="apartment" placeholder="<?php echo $this->lang->line('apartment'); ?>" value="<?php if(!empty($result['apartment'])) echo $result['apartment']; else echo set_value('apartment'); ?>"  >
                                    </div>
                                 
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_address'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="address_line2" id="address_line2" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php if(!empty($result['address_line2'])) echo $result['address_line2']; else echo set_value('address_line2'); ?>" maxlength="256" >
                                 </div>
                              </div>
                              

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> 
                                 <?php echo $this->lang->line('label_city'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="city" id="city" placeholder="<?php echo $this->lang->line('label_city'); ?>" value="<?php if(!empty($result['city'])) echo $result['city']; else echo set_value('city'); ?>" maxlength="64">
                                    <div class="form-control-feedback" id="city_msg" style="display: none;">This field is required.</div>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> 
                                 <?php echo $this->lang->line('label_state'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="state" id="state" placeholder="<?php echo $this->lang->line('label_state'); ?>" value="<?php if(!empty($result['city'])) echo set_value('state'); ?>" maxlength="64">
                                    <div class="form-control-feedback" id="state_msg" style="display: none;">This field is required.</div>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_zipcode'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="zipcode" id="zipcode" placeholder="<?php echo $this->lang->line('label_zipcode'); ?>" value="<?php echo $result['zipcode'] ? $result['zipcode'] : set_value('zipcode')?>" maxlength="32">
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <!-- <span id="astric">*</span> --> <?php echo $this->lang->line('label_branch'); ?>:
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
                                   
                                    <div class="form-control-feedback" id="branch_msg" style="display: none;">This field is required.</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                <!--  <span id="astric">*</span>   -->
                                 <?php echo $this->lang->line('label_telephone_number'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="telephone_number" id="telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php if(!empty($result['telephone_number'])) echo $result['telephone_number']; else  echo set_value('telephone_number'); ?>" maxlength="12">
                                    <?php //echo form_error('telephone_number'); ?>
                                     <!-- <div class="form-control-feedback" id="telphone_number_msg" style="display: none;">This field is required and should be 10 digit.</div> -->
                                 </div>
                              </div>
                              <div class = "row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span>  <?php echo $this->lang->line('label_cellphone_number'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="cellphone_number" id="cellphone_number" placeholder="<?php echo $this->lang->line('label_cellphone_number'); ?>" value="<?php if(!empty($result['cellphone_number'])) echo $result['cellphone_number']; else echo set_value('cellphone_number'); ?>">
                                    <?php //echo form_error('cellphone_number'); ?>
                                    <div class="form-control-feedback" id="cellphone_number_msg" style="display: none;">This field is required and should be 10 digit.</div>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 
                                 <?php echo $this->lang->line('label_email'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="email" class="form-control m-input" name="email" id="email" placeholder="<?php echo $this->lang->line('label_email'); ?>" value="<?php if(!empty($result['email'])) echo $result['email']; else echo set_value('email'); ?>">
                                    <?php //echo form_error('email'); ?>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_website'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="website" id="website" placeholder="<?php echo $this->lang->line('label_website'); ?>" value="<?php if(!empty($result['website'])) echo $result['website']; else echo set_value('website'); ?>" >
                                    <?php //echo form_error('website'); ?>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_lic_id'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="text" class="form-control m-input" name="lic_id" id="lic_id" placeholder="<?php echo $this->lang->line('label_lic_id'); ?>" value="<?php if(!empty($result['lic_id'])) echo $result['lic_id']; else echo set_value('lic_id'); ?>" maxlength="20" >
                                    <?php //echo form_error('lic_id'); ?>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_lic_picture'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type="file" class="form-control m-input" name="lic_picture" id="lic_picture" accept="image/*" data-show-preview="false" data-show-upload="false" data-show-caption="true" data-msg-placeholder="<?php echo $this->lang->line('label_lic_picture'); ?>">
                                    <?php if(!empty($result['lic_picture'])){ ?>
                                    <img src="<?php echo base_url().CUSTOMER_IMAGES.$result['lic_picture']; ?>" class="img-responsive img-thumb" style="height: 90px; width: 150px;">
                                    <?php } ?>
                                    <?php //echo form_error('lic_picture'); ?>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_agent_code'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <!-- <input type="text" class="form-control m-input" name="agent_code" id="agent_code" placeholder="<?php //echo $this->lang->line('label_agent_code'); ?>" value="<?php //if(!empty($result['agent_code'])) echo $result['agent_code']; else echo set_value('agent_code'); ?>" maxlength="16"> -->
                                    <input  class="form-control m-input" name="agent_code" placeholder="<?php echo $this->lang->line('label_agent_code'); ?>" id="agent_code" readonly type="text" maxlength="16" onfocus="if (this.hasAttribute('readonly')) { this.removeAttribute('readonly');this.blur();this.focus();}" />
                                    <?php //echo form_error('agent_code'); ?>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <?php echo $this->lang->line('label_password'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <input type  = "password" name = "password" style = "display:none;">
                                   <!--  <input type="password" name="password" id="password" class="form-control m-input" placeholder="<?php //echo $this->lang->line('label_password'); ?>" value="<?php //echo set_value('password'); ?>"  > -->
                                   <input  class="form-control m-input" name="password" placeholder="<?php echo $this->lang->line('label_password'); ?>" id="password" readonly type="password" onfocus="if (this.hasAttribute('readonly')) { this.removeAttribute('readonly');this.blur();this.focus();}" />
                                    <?php //echo form_error('password'); ?>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <label class="form_label col-md-4 col-lg-3 text-right">
                                 <span id="astric">*</span> 
                                 <?php echo $this->lang->line('label_language'); ?>:
                                 </label>
                                 <div class="col-md-8 col-lg-9">
                                    <div class="m-radio-inline">
                                       <label class="m-radio">
                                       <input name="language" value="English" type="radio" <?php echo "checked" ; ?> >
                                       English
                                       <span></span>
                                       </label>
                                       <label class="m-radio">
                                       <input name="language" value="Spanish" type="radio" >
                                       Español
                                       <span></span>
                                       </label>
                                    </div>
                                 </div>
                                 <?php //echo form_error('language'); ?>
                              </div>
                           </div>
                           
                        </div>
                        <div class="form-group m-form__group row">
                                            <div class="col-lg-9 ml-lg-auto m-form__actions">
                                                <button type="submit" class="btn btn-success" value="update">
                                                    <?php echo $this->lang->line('label_submit'); ?>
                                                </button>
                                                <a href="<?php echo base_url('company/customer'); ?>" class="btn btn-secondary">
                                                    <?php echo $this->lang->line('label_back'); ?>
                                                </a>
                                            </div>
                                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane <?php if ($tab_id == " 2") {
                  echo "active";
                  }
                  ?> " id="m_user_profile_tab_2">
                  <div class="m-portlet__body">
                     <div class="m-form__section m-form__section--first">
                     </div>
                  </div>
               </div>
               <div class="tab-pane <?php if ($tab_id == " 3") {
                  echo "active";
                  }
                  ?> " id="m_user_profile_tab_3">
               </div>
               <div class="tab-pane <?php if ($tab_id == " 4") {
                  echo "active";
                  }
                  ?> " id="m_user_profile_tab_4">
               </div>
               <div class="tab-pane <?php if ($tab_id == " 5") {
                  echo "active";
                  }
                  ?> " id="m_user_profile_tab_5">
               </div>
               <div class="tab-pane <?php if ($tab_id == " 6") {
                  echo "active";
                  }
                  ?> " id="m_user_profile_tab_6">
               </div>
               <div class="tab-pane <?php if ($tab_id == " 7") {
                  echo "active";
                  }
                  ?> " id="m_user_profile_tab_7">
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- <div class="row">
      <div class="col-md-12">
          <div class="m-portlet__foot m-portlet__foot--fit">
              <div class="m-form__actions m-form__actions">
                  <div class="row">
                      <div class="col-lg-7 ml-lg-auto m-form__actions">
                          <button type="submit" class="btn btn-success" value="update">
                              Submit
                          </button>
                          <button type="reset" class="btn btn-secondary">
                              Reset
                          </button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </div> -->
   </form>
   <!--end::Form-->
</div>
<div class="clear clear-fix"></div>
</div>
<div class="clear clear-fix"></div>
<div class="clear clear-fix"></div>
<script type="text/javascript">
   $(document).ready(function()
           {
   
   $('#branch').css('pointer-events','none');
   $('#branch').css('background-color','gainsboro');
    $('#branch').css('appearance','none');
              $("input[type = 'password']").val('')
              $("#agent_code").val('');
           /* Ship to table */
           var m_datatables = null;
           var DatatableRemoteAjaxDemo = function() {
           var t = function() {
           var t = $(".m_datatable").mDatatable({
                       data: {
                           type: "remote",
                           source: {
                               read: {
                                   url: "<?php echo site_url('company/customer/shipto_ajax_list/') ?>",
                                   method: 'GET',
                                   params: {
                                       customer_id: "<?php echo $result['id']; ?>"
                                   }
                               },
                           },
                           pageSize: 10,
                           saveState: {
                               cookie: false,
                               webstorage: false
                           },
                           serverPaging: true,
                           serverFiltering: true,
                           serverSorting: true
                       },
                       layout: {
                           theme: "default",
                           class: "",
                           scroll: false,
                           footer: false
                       },
                       sortable: true,
                       pagination: true,
                       columns: [{
                           field: "id",
                           title: "#",
                           //sortable: !1,
                           width: 50,
                           selector: false,
                           textAlign: "center"
                       }, {
                           field: "name",
                           title: "<?php echo $this->lang->line('label_name'); ?>",
                       }, {
                           field: "address",
                           title: "<?php echo $this->lang->line('label_address'); ?>",
                       }, {
                           field: "telephone_number",
                           title: "<?php echo $this->lang->line('label_telephone'); ?>",
                       }, {
                           field: "cellphone_number",
                           title: "<?php echo $this->lang->line('label_cellphone'); ?>",
                       },{
                           field: "Actions",
                           title: "<?php echo $this->lang->line('label_actions'); ?>",
                           sortable: !1,
                           overflow: "visible",
                           template: function(t) {
                               /*\t\t\t\t\t\t<a href="<?php echo base_url() . "company/customer/view_shipto/"; ?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-eye"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t</a>\t\t\t\t\t\t</a>*/
                               return '\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url() . "company/customer/edit_shipto/"; ?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" >\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t\t\t\t\t\t<a href="javascript:;" onclick="delete_shipto('+t.id+')" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" >\t\t\t\t\t\t\t<i class="la la-trash"></i>\t\t\t\t\t\t</a>'
                           }
                       }]
                   }),
                   e = t.getDataSourceQuery();
                   m_datatables = t;
                   $("#m_form_search").on("keyup", function(e) {
                       var a = t.getDataSourceQuery();
                       a.generalSearch = $(this).val().toLowerCase(), t.setDataSourceQuery(a), t.load()
                   }).val(e.generalSearch), $("#m_form_status").on("change", function() {
                       var e = t.getDataSourceQuery();
                       e.Status = $(this).val().toLowerCase(), t.setDataSourceQuery(e), t.load()
                   }).val(void 0 !== e.Status ? e.Status : ""), $("#m_form_type").on("change", function() {
                       var e = t.getDataSourceQuery();
                       e.Type = $(this).val().toLowerCase(), t.setDataSourceQuery(e), t.load()
                   }).val(void 0 !== e.Type ? e.Type : ""), $("#m_form_status, #m_form_type").selectpicker()
   
               };
               return {
                   init: function() {
                       t()
                   }
               }
           }();
           jQuery(document).ready(function() {
               DatatableRemoteAjaxDemo.init()
           });
   
           $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
               var tab_id = $(e.target).data("tab_id") // activated tab
               document.cookie = "tab_id="+tab_id;
               $('.tab-pane').not(this).removeClass('active');
               $('#m_user_profile_tab_'+tab_id).toggleClass('active');
           })
   
           function delete_shipto(id)
           {
               swal({
                   title: "<?php echo $this->lang->line('label_are_you_sure') ?>",
                   text: "<?php echo $this->lang->line('label_you_want_to_delete_shipto') ?>",
                   type: "warning",
                   showCancelButton: true,
                   confirmButtonColor: "#DD6B55",
                   confirmButtonText: "<?php echo $this->lang->line('label_confirm') ?>",
               }).then(function () {
                   $.ajax({
                       url:  "<?php echo base_url(); ?>company/customer/delete_shipto/"+id,
                       type: "GET",
                       success: function(data)
                       {
                           //$('#user_table').bootstrapTable('refresh');
                           //$(".m_datatable").mDatatable().ajax.reload();
                           //DatatableRemoteAjaxDemo.init();
                           m_datatables.reload();
                       },
                           error: function(jqXHR, textStatus, errorThrown){
                       },
                           complete: function(){
                       }
                   }); // END OF AJAX CALL
   
               });
           }
   
           /* Pickup table */
           var pickup_datatables = null;
           var GetPickupDdatatables = function() {
           var t = function() {
           var t = $("#pickup_datatable").mDatatable({
                       data: {
                           type: "remote",
                           source: {
                               read: {
                                   url: "<?php echo site_url('company/customer/pickup_ajax_list/') ?>",
                                   method: 'GET',
                                   params: {
                                       customer_id: "<?php echo $result['id']; ?>"
                                   }
                               },
                           },
                           pageSize: 10,
                           saveState: {
                               cookie: false,
                               webstorage: false
                           },
                           serverPaging: true,
                           serverFiltering: true,
                           serverSorting: true
                       },
                       layout: {
                           theme: "default",
                           class: "",
                           scroll: false,
                           footer: false
                       },
                       sortable: true,
                       pagination: true,
                       columns: [{
                           field: "id",
                           title: "#",
                           //sortable: !1,
                           width: 50,
                           selector: false,
                           textAlign: "center"
                       }, {
                           field: "name",
                           title: "<?php echo $this->lang->line('label_name'); ?>",
                       }, {
                           field: "address",
                           title: "<?php echo $this->lang->line('label_address'); ?>",
                       }, {
                           field: "telephone_number",
                           title: "<?php echo $this->lang->line('label_telephone'); ?>",
                       }, {
                           field: "cellphone_number",
                           title: "<?php echo $this->lang->line('label_cellphone'); ?>",
                       }, {
                           field: "pickup_date",
                           title: "<?php echo $this->lang->line('label_pickup_date'); ?>",
                       }, {
                           field: "status",
                           title: "<?php echo $this->lang->line('label_status'); ?>",
                       }, {
                           field: "Actions",
                           title: "<?php echo $this->lang->line('label_actions'); ?>",
                           sortable: !1,
                           overflow: "visible",
                           template: function(t) {
                               return '\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url() . "company/pickup/edit/"; ?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" target="_blank">\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>'
                           }
                       }]
                   }),
                   e = t.getDataSourceQuery();
                   pickup_datatables = t;
                   $("#m_form_search").on("keyup", function(e) {
                       var a = t.getDataSourceQuery();
                       a.generalSearch = $(this).val().toLowerCase(), t.setDataSourceQuery(a), t.load()
                   }).val(e.generalSearch), $("#m_form_status").on("change", function() {
                       var e = t.getDataSourceQuery();
                       e.Status = $(this).val().toLowerCase(), t.setDataSourceQuery(e), t.load()
                   }).val(void 0 !== e.Status ? e.Status : ""), $("#m_form_type").on("change", function() {
                       var e = t.getDataSourceQuery();
                       e.Type = $(this).val().toLowerCase(), t.setDataSourceQuery(e), t.load()
                   }).val(void 0 !== e.Type ? e.Type : ""), $("#m_form_status, #m_form_type").selectpicker()
   
               };
               return {
                   init: function() {
                       t()
                   }
               }
           }();
           jQuery(document).ready(function() {
               GetPickupDdatatables.init()
           });
       });
   
       
</script>
<script type="text/javascript">
	$(document).ready(function(){
		var fname= $('#firstname').val();
		var lname= $('#lastname').val();
		var address_line1= $('#address_line1').val();
		var city= $('#city').val();
		var state= $('#state').val();
		var branch= $('#branch').val();
		var celno  =jQuery('input#cellphone_number').val();
		var telno  =jQuery('input#telephone_number').val();
		var nolength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(celno);
		var tellength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(telno);
		$("#firstname").change(function() {
			  var fname = $('#firstname').val();
			  if(fname != ''){
					jQuery('#fname_msg').hide();
					return true;
				}
		});
		$("#lastname").change(function() {
			  var fname = $('#lastname').val();
			  if(fname != ''){
					jQuery('#lname_msg').hide();
					return true;
				}
		});
		$("#address_line1").change(function() {
			  var fname = $('#address_line1').val();
			  if(fname != ''){
					jQuery('#address_line1_msg').hide();
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
		/*$("#branch").change(function() {
			  var fname = $('#branch').val();
			  if(fname != ''){
					jQuery('#branch_msg').hide();
					return true;
				}
		});*/
		$("#cellphone_number").change(function() {
			//alert("test");			  //var fname = $('input#cellphone_number').val();
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
		/*$("#telephone_number").change(function() {
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
		});*/
		jQuery('button.btn.btn-success').click(function(){
			var fname= $('#firstname').val();
			var lname= $('#lastname').val();
			var address_line1= $('#address_line1').val();
			var city= $('#city').val();
			var state= $('#state').val();
			//var branch= $('#branch').val();
			var celno  =jQuery('input#cellphone_number').val();
			//var telno  =jQuery('input#telephone_number').val();
			var nolength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(celno);
			//var tellength = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(telno);

			/*if(fname == '' && lname == '' && address_line1 == '' && city == '' && state == '' && branch=='' && nolength== false && tellength == false){*/
         if(fname == '' && lname == '' && address_line1 == '' && city == '' && state == '' && nolength== false){
				jQuery('#fname_msg').show();
				jQuery('#lname_msg').show();
				jQuery('#address_line1_msg').show();
				jQuery('#city_msg').show();
				jQuery('#state_msg').show();
				//jQuery('#branch_msg').show();
				//jQuery('#telphone_number_msg').show();
				jQuery('#cellphone_number_msg').show();
				return false;
			}else{	
				if(fname == ''){
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
					jQuery('#address_line1_msg').hide();
					jQuery('#city_msg').show();
					return false;
				}else if(state == ''){
					jQuery('#fname_msg').hide();
					jQuery('#lname_msg').hide();
					jQuery('#address_line1_msg').hide();
					jQuery('#city_msg').hide();
					jQuery('#state_msg').show();
					return false;
				}/*else if(branch == ''){
					jQuery('#fname_msg').hide();
					jQuery('#lname_msg').hide();
					jQuery('#address_line1_msg').hide();
					jQuery('#city_msg').hide();
					jQuery('#state_msg').hide();
					jQuery('#branch_msg').show();
					return false;
				}*//*else if(tellength == false){
					jQuery('#fname_msg').hide();
					jQuery('#lname_msg').hide();
					jQuery('#address_line1_msg').hide();
					jQuery('#city_msg').hide();
					jQuery('#state_msg').hide();
					jQuery('#branch_msg').hide();
					jQuery('#telphone_number_msg').show();
					return false;
				}*/else if( nolength== false){
					jQuery('#fname_msg').hide();
					jQuery('#lname_msg').hide();
					jQuery('#address_line1_msg').hide();
					jQuery('#city_msg').hide();
					jQuery('#state_msg').hide();
					//jQuery('#branch_msg').hide();
					//jQuery('#telphone_number_msg').hide();
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