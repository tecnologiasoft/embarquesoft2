
        <style type="text/css">
            .m-form .m-form__section {
                font-size: 1.0rem !important;
            }
            .select2-container--default .select2-selection--single .select2-selection__rendered, .form-control { 
                padding: .3rem;
            }
            .m-form .m-form__group label.col-form-label { 
                padding-top: .3rem;
            }
            .m-form .m-form__group { 
                padding: 2px;
            } 
            .m-portlet {
                margin-bottom: 1.0rem !important;
            }
            .m-portlet .m-portlet__body{
                padding: 0.5rem !important;
            }
        </style>

        <!-- link for material file upload -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

          <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    <?php echo $this->lang->line('title_add_new_customer'); ?>
                                </h3>
                                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                                    <li class="m-nav__item m-nav__item--home">
                                        <a href="<?php echo site_url();?>company/dashboard" class="m-nav__link m-nav__link--icon">
                                            <i class="m-nav__link-icon la la-home"></i>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?php echo site_url();?>company/customer/listing" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_customer_list'); ?>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="javascript:;" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_add_new_customer'); ?>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END: Subheader -->
                    <div class="m-content">
                        <!--begin::Form-->
                        <?php 
                            $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'm_form_1','enctype'=>'multipart/form-data'); 
                            echo form_open('company/customer/save/',$form_data); 
                        ?>  
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__body">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        <?php echo $this->lang->line('label_customer_details'); ?>
                                                    </h3>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_customer_id'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="customer_id" id="customer_id" placeholder="<?php echo $this->lang->line('label_customer_id'); ?>" value="<?php echo set_value('customer_id', $next_id); ?>" maxlength="20" readonly >
                                                        <?php echo form_error('customer_id'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_company'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="company_name" id="company_name" placeholder="<?php echo $this->lang->line('label_company'); ?>" value="<?php echo set_value('company_name'); ?>" maxlength="128" >
                                                        <?php echo form_error('company_name'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_first_name'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="fname" id="fname" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php echo set_value('fname'); ?>" maxlength="64">
                                                        <?php echo form_error('fname'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_last_name'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="lname" id="lname" placeholder="<?php echo $this->lang->line('label_last_name'); ?>" value="<?php echo set_value('lname'); ?>" maxlength="64">
                                                        <?php echo form_error('lname'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_user_name'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="user_name" id="user_name" placeholder="<?php echo $this->lang->line('label_user_name'); ?>" value="<?php if(!empty($result['user_name'])) echo $result['user_name']; else echo set_value('user_name'); ?>" maxlength="128" pattern="^[a-z0-9_]{1,32}$">
                                                        <?php echo form_error('user_name'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_email'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="email" class="form-control m-input" name="email" id="email" placeholder="<?php echo $this->lang->line('label_email'); ?>" value="<?php echo set_value('email'); ?>" maxlength="128">
                                                        <?php echo form_error('email'); ?>
                                                    </div>
                                                </div>  

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_password'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="password" name="password" id="password" class="form-control m-input"  placeholder="<?php echo $this->lang->line('label_password'); ?>" value="<?php echo set_value('password'); ?>">
                                                        <?php echo form_error('password'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_confirm_password'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="password" name="confirmpassword" id="confirmpassword" class="form-control m-input" placeholder="<?php echo $this->lang->line('label_confirm_password'); ?>" value="<?php echo set_value('confirmpassword'); ?>">
                                                        <?php echo form_error('confirmpassword'); ?>
                                                    </div>
                                                </div>
<!-- 
                                            </div>
                                            <div class="m-separator m-separator--dashed"></div>
                                            <div class="m-form__section"> -->
                                                <!-- <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        <?php echo $this->lang->line('label_customer_address'); ?>
                                                        <i data-toggle="m-tooltip" data-width="auto" class="m-form__heading-help-icon flaticon-info" title="Some help text goes here"></i>
                                                    </h3>
                                                </div> -->
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_address'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="address" id="address" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php echo set_value('address'); ?>" >
                                                        <input type="hidden" name="latitude" id="latitude" value="<?php echo set_value('latitude'); ?>">
                                                        <input type="hidden" name="longitude" id="longitude" value="<?php echo set_value('longitude'); ?>">
                                                        <?php echo form_error('address'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_address_1'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="address_line_1" id="address_line_1" placeholder="<?php echo $this->lang->line('label_address_1'); ?>" value="<?php echo set_value('address_line_1'); ?>" maxlength="256">
                                                        <?php echo form_error('address_line_1'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_address_2'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="address_line_2" id="address_line_2" placeholder="<?php echo $this->lang->line('label_address_2'); ?>" value="<?php echo set_value('address_line_2'); ?>" maxlength="256">
                                                        <?php echo form_error('address_line_2'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_borough'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="borough" id="sublocality_level_1" placeholder="<?php echo $this->lang->line('label_borough'); ?>" value="<?php echo set_value('borough'); ?>" maxlength="64">
                                                        <?php echo form_error('borough'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_city'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="city" id="locality" placeholder="<?php echo $this->lang->line('label_city'); ?>" value="<?php echo set_value('city'); ?>" maxlength="64">
                                                        <?php echo form_error('city'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_state'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="state" id="administrative_area_level_1" placeholder="<?php echo $this->lang->line('label_state'); ?>" value="<?php echo set_value('state'); ?>" maxlength="64">
                                                        <?php echo form_error('state'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_country'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="country" id="country" placeholder="<?php echo $this->lang->line('label_country'); ?>" value="<?php echo set_value('country'); ?>" maxlength="64">
                                                        <?php echo form_error('country'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_zipcode'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="zipcode" id="postal_code" placeholder="<?php echo $this->lang->line('label_zipcode'); ?>" value="<?php echo set_value('zipcode'); ?>" maxlength="32">
                                                        <?php echo form_error('zipcode'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_website'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="website" id="website" placeholder="<?php echo $this->lang->line('label_website'); ?>" value="<?php echo set_value('website'); ?>" >
                                                        <?php echo form_error('website'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__body">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        <?php echo $this->lang->line('label_other_details'); ?>
                                                    </h3>
                                                </div>
                                                <!-- <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_tele_country_code'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="tele_country_code" id="tele_country_code" placeholder="<?php echo $this->lang->line('label_tele_country_code'); ?>" value="<?php echo set_value('tele_country_code'); ?>" maxlength="8" >
                                                        <?php echo form_error('tele_country_code'); ?>
                                                    </div>
                                                </div> -->
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_telephone_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="telephone_number" id="telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php echo set_value('telephone_number'); ?>" maxlength="16">
                                                        <?php echo form_error('telephone_number'); ?>
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_office_country_code'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="office_country_code" id="office_country_code" placeholder="<?php echo $this->lang->line('label_office_country_code'); ?>" value="<?php echo set_value('office_country_code'); ?>" maxlength="8">
                                                        <?php echo form_error('office_country_code'); ?>
                                                    </div>
                                                </div> -->
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_office_phone_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="office_phone_number" id="office_phone_number" placeholder="<?php echo $this->lang->line('label_office_phone_number'); ?>" value="<?php echo set_value('office_phone_number'); ?>" maxlength="16">
                                                        <?php echo form_error('office_phone_number'); ?>
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_cell_country_code'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="cell_country_code" id="cell_country_code" placeholder="<?php echo $this->lang->line('label_cell_country_code'); ?>" value="<?php echo set_value('cell_country_code'); ?>" maxlength="8">
                                                        <?php echo form_error('cell_country_code'); ?>
                                                    </div>
                                                </div> -->
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_cellphone_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="cellphone_number" id="cellphone_number" placeholder="<?php echo $this->lang->line('label_cellphone_number'); ?>" value="<?php echo set_value('cellphone_number'); ?>" maxlength="16">
                                                        <?php echo form_error('cellphone_number'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_fax_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="fax_number" id="fax_number" placeholder="<?php echo $this->lang->line('label_fax_number'); ?>" value="<?php if(!empty($result['fax_number'])) echo $result['fax_number']; else echo set_value('fax_number'); ?>" maxlength="16">
                                                        <?php echo form_error('fax_number'); ?>
                                                    </div>
                                                </div>
                                            <!--
                                            </div>
                                            <div class="m-separator m-separator--dashed "></div>
                                            <div class="m-form__section">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        <?php echo $this->lang->line('label_other_details'); ?>
                                                        <i data-toggle="m-tooltip" data-width="auto" class="m-form__heading-help-icon flaticon-info" title="Some help text goes here"></i>
                                                    </h3>
                                                </div> -->
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_lic_id'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="lic_id" id="lic_id" placeholder="<?php echo $this->lang->line('label_lic_id'); ?>" value="<?php echo set_value('lic_id'); ?>" maxlength="20" >
                                                        <?php echo form_error('lic_id'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_lic_picture'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="file" class="form-control m-input" name="lic_picture" id="lic_picture" accept="image/*" value="<?php echo set_value('lic_picture'); ?>"  data-show-preview="false" data-show-upload="false" data-show-caption="true" data-msg-placeholder="<?php echo $this->lang->line('label_lic_picture'); ?>">
                                                        <?php echo form_error('lic_picture'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_language'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="language" value="English" type="radio" checked="">
                                                                English
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="language" value="Spanish" type="radio" >
                                                                Español
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('language'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_price_code'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="price_code" id="price_code" placeholder="<?php echo $this->lang->line('label_price_code'); ?>" value="<?php echo set_value('price_code'); ?>" maxlength="16" >
                                                        <?php echo form_error('price_code'); ?>
                                                    </div>
                                                </div>
 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_agent_code'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <input type="text" class="form-control m-input" name="agent_code" id="agent_code" placeholder="<?php echo $this->lang->line('label_agent_code'); ?>" value="<?php echo set_value('agent_code'); ?>" maxlength="16" >
                                                        <?php echo form_error('agent_code'); ?>
                                                    </div>
                                                </div>
                                                
                                                <!-- <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_has_pickup'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="has_pickup" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="has_pickup" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('has_pickup'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-5 col-lg-5 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_additional_pickup'); ?>:
                                                    </label>
                                                    <div class="col-xl-7 col-lg-7">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="additional_pickup" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="additional_pickup" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('additional_pickup'); ?>
                                                    </div>
                                                </div> -->
                                                <div class="form-group m-form__group row">
                                                    <div class="col-lg-9 ml-lg-auto m-form__actions">
                                                        <button type="submit" class="btn btn-success" value="update">
                                                            <?php echo $this->lang->line('label_submit'); ?>
                                                        </button>
                                                        <button type="reset" class="btn btn-secondary">
                                                            <?php echo $this->lang->line('label_reset'); ?>
                                                        </button>
                                                    </div>
                                                </div>
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
                </div>


        <script type="text/javascript">
        /*$("input").on("focusout", function(){
            $("#m_form_1").valid();
        });*/
 $(document).ready(function(){
        $("#website").on("focusout", function(){
            if($("#website").val().trim() == "http://")
            {
                $("#website").val("");
            }
        });

        $("#website").on("focusin", function(){
            if($("#website").val().trim() == "")
            {
                $("#website").val("http://");
            }
        });

        var Inputmask = {
            init: function() {
                $("#fax_number").inputmask("mask", {
                    mask: "999-999-9999"
                }), $("#cellphone_number").inputmask("mask", {
                    mask: "999-999-9999"
                }), $("#telephone_number").inputmask("mask", {
                    mask: "999-999-9999"
                }), $("#office_phone_number").inputmask("mask", {
                    mask: "999-999-9999"
                })
            }
        };
        jQuery(document).ready(function() {
            Inputmask.init()
        });    
        jQuery(document).ready(function() {
            $("#m_form_1").validate({
                rules: {
                    company_name: {
                        maxlength: 128
                    },
                    fname: {
                        required: !0
                    },
                    lname: {
                        required: !0
                    },
                    user_name: {
                        maxlength: 64
                    },
                    email: {
                        required: !0,
                        email: true,
                    },
                    password: {
                        minlength: 4
                    },
                    confirmpassword: {
                        minlength: 4,
                        equalTo: "#password"
                    },
                    address_line_1: {
                        maxlength: 255
                    }, 
                    address_line_2: {
                        maxlength: 255
                    },  
                    country: {
                        required: !0
                    }, 
                    website: {
                        url: !0,
                    },
                    address: {
                        required: !0,
                    },
                    city: {
                        required: !0,
                    },
                    borough: {
                        required: !0,
                    },
                    state: {
                        required: !0,
                    },
                    zipcode: {
                        required: !0,
                    },
                    telephone_number: {
                        required: function(element) {
                            return ($("#cellphone_number").is(':blank') && $("#office_phone_number").is(':blank'));
                        },
                        minlength: 8,
                        maxlength: 14
                    },
                    cellphone_number: {
                        required: function(element) {
                            return ($("#telephone_number").is(':blank') && $("#office_phone_number").is(':blank'));
                        },
                        minlength: 8,
                        maxlength: 14
                    },
                    office_phone_number: {
                        required: function(element) {
                            return ($("#telephone_number").is(':blank') && $("#cellphone_number").is(':blank'));
                        },
                        minlength: 8,
                        maxlength: 14
                    },
                    fax_number: {
                        minlength: 8,
                        maxlength: 14
                    },
                    lic_id: {
                        digits: !0,
                        maxlength: 20
                    },
                    agent_code: {
                        digits: !0,
                        maxlength: 20
                    },
                    language: {
                        required: !0,
                    },

                },
                invalidHandler: function(e, r) {
                    var i = $("#m_form_1_msg");
                    i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
                },
                submitHandler: function(e) {
                    $("#m_form_1_msg").hide();
                    return true;
                }
            })
        });
        $.validator.addMethod("pwcheckallowedchars", function (value) {
            if(value)
                return /^[a-zA-Z0-9!@#$^&*()_=\[\]{};':"\\|,.<>\/?+-]+$/.test(value) // has only allowed chars letter
            else
                return true;
        }, "The password contains non-admitted characters");
 });
        </script>

        <!-- script file for File input -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>

        <!-- google maps api -->
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=<?php echo PLACE_API_KEY;?>&libraries=places"></script>
        <!-- initialization of file upload and date picker -->
        <script type="text/javascript">

            
            $(document).ready(function()
            {
                var componentForm = {
                    /*street_number: 'short_name',
                    route: 'long_name',*/
                    sublocality_level_1: 'long_name', // borough
                    locality: 'long_name', // city
                    administrative_area_level_1: 'long_name', // State
                    country: 'long_name', // country
                    postal_code: 'short_name' // Zip code
                };

                $("#lic_picture").fileinput({
                    'showUpload':false, 
                    'previewFileType': "image",
                    'browseClass': "btn btn-success",
                    'browseLabel': "Pick Image",
                    'browseIcon': "<i class=\"la la-file-image-o \"></i> ",
                    'removeClass': "btn btn-danger",
                    'removeLabel': "Delete",
                    'removeIcon': "<i class=\"la la-trash \"></i> ",
                });

                /*geocomplete for country */
                $("#country").geocomplete().bind("geocode:result", function(event, result){
                    for (var i = 0; i < result.address_components.length; i++) {
                        var addressType = result.address_components[i].types[0];
                        if (addressType == "country") {
                            $("#country").val(result.address_components[i]['long_name']);
                        }
                    }
                });
                
                /*geocomplete*/
                $("#address").geocomplete().bind("geocode:result", function(event, result){
                    //console.log(result.address_components);
                    var address_line_1 = "";
                    document.getElementById("latitude").value = result.geometry.location.lat();
                    document.getElementById("longitude").value = result.geometry.location.lng();
                    for (var component in componentForm) {
                      document.getElementById(component).value = '';
                      document.getElementById(component).disabled = false;
                    }

                    for (var i = 0; i < result.address_components.length; i++) {
                        var addressType = result.address_components[i].types[0];
                        if (componentForm[addressType]) {
                            var val = result.address_components[i][componentForm[addressType]];
                            document.getElementById(addressType).value = val;
                        }

                        if(addressType == "street_number" || addressType == "route"){
                            address_line_1 = address_line_1 + result.address_components[i]["long_name"]+ ", ";
                        }
                    }
                    $("#address").val(address_line_1.trim());
                });
            });
        </script>
        <!--end::Page Snippets -->
    </body>
    <!-- end::Body -->
</html>
