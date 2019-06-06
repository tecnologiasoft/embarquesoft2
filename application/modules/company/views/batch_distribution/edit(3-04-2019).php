<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            <?php echo $this->site_name; ?> | <?php echo $this->lang->line('title_edit_driver'); ?>
        </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->load->view('company/inc/stylesheet'); ?>
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
    </head>
    <!-- end::Head -->
    <!-- end::Body -->
    <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">

            <!-- BEGIN: Header -->
            <?php   $this->load->view('company/inc/header');  ?>
            <!-- END: Header -->

            <!-- begin::Body -->
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
                <!-- BEGIN: Left Aside -->
                    <?php $this->load->view('company/inc/left-menu',$data);  ?>
                <!-- END: Left Aside -->
                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    <?php echo $this->lang->line('title_edit_driver'); ?>
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
                                        <a href="<?php echo site_url();?>company/driver/listing" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_driver_list'); ?>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="javascript:;" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_edit_driver'); ?>
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
                            echo form_open('company/driver/edit/'.$result['id'],$form_data); 
                        ?>  
                            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__body">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        <?php echo $this->lang->line('label_driver_details'); ?>
                                                    </h3>
                                                </div>
                                                <!-- <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_driverid'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="co_driverid" id="co_driverid" placeholder="<?php echo $this->lang->line('label_driverid'); ?>" value="<?php if(!empty($result['co_driverid'])) echo $result['co_driverid']; else echo set_value('co_driverid'); ?>" maxlength="20" >
                                                        <?php echo form_error('co_driverid'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_company'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="company_name" id="company_name" placeholder="<?php echo $this->lang->line('label_company'); ?>" value="<?php if(!empty($result['company_name'])) echo $result['company_name']; else echo set_value('company_name'); ?>" maxlength="128" >
                                                        <?php echo form_error('company_name'); ?>
                                                    </div>
                                                </div> -->
                                                <!-- <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_driver_id'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="driver_id" id="driver_id" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php if(!empty($result['id'])) echo $result['id']; else echo set_value('driver_id'); ?>" maxlength="20" disabled>
                                                        <?php echo form_error('driver_id'); ?>
                                                    </div>
                                                </div> -->

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_driver_code'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="driver_code" id="driver_code" placeholder="<?php echo $this->lang->line('label_driver_code'); ?>" value="<?php if(!empty($result['driver_code'])) echo $result['driver_code']; else echo set_value('driver_code'); ?>" maxlength="64" readonly >
                                                        <?php echo form_error('driver_code'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_first_name'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="fname" id="fname" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php if(!empty($result['fname'])) echo $result['fname']; else echo set_value('fname'); ?>" maxlength="64">
                                                        <?php echo form_error('fname'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_last_name'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="lname" id="lname" placeholder="<?php echo $this->lang->line('label_last_name'); ?>" value="<?php if(!empty($result['lname'])) echo $result['lname']; else echo set_value('lname'); ?>" maxlength="64">
                                                        <?php echo form_error('lname'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_address'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="address" id="address" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php if(!empty($result['address'])) echo $result['address']; else echo set_value('address'); ?>" >
                                                        <input type="hidden" name="latitude" id="latitude" value="<?php if(!empty($result['latitude'])) echo $result['latitude']; else echo set_value('latitude'); ?>">
                                                        <input type="hidden" name="longitude" id="longitude" value="<?php if(!empty($result['longitude'])) echo $result['longitude']; else echo set_value('longitude'); ?>">
                                                        <?php echo form_error('address'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_address'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="address_line_1" id="address_line_1" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php if(!empty($result['address_line1'])) echo $result['address_line1']; else echo set_value('address_line_1'); ?>" maxlength="256">
                                                        <?php echo form_error('address_line_1'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_address'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="address_line_2" id="address_line_2" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php if(!empty($result['address_line2'])) echo $result['address_line2']; else echo set_value('address_line_2'); ?>" maxlength="256">
                                                        <?php echo form_error('address_line_2'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_borough'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="borough" id="sublocality_level_1" placeholder="<?php echo $this->lang->line('label_borough'); ?>" value="<?php if(!empty($result['borough'])) echo $result['borough']; else echo set_value('borough'); ?>" maxlength="64">
                                                        <?php echo form_error('borough'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_city'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="city" id="locality" placeholder="<?php echo $this->lang->line('label_city'); ?>" value="<?php if(!empty($result['city'])) echo $result['city']; else echo set_value('city'); ?>" maxlength="64">
                                                        <?php echo form_error('city'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_state'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="state" id="administrative_area_level_1" placeholder="<?php echo $this->lang->line('label_state'); ?>" value="<?php if(!empty($result['state'])) echo $result['state']; else echo set_value('state'); ?>" maxlength="64">
                                                        <?php echo form_error('state'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_zipcode'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="zipcode" id="postal_code" placeholder="<?php echo $this->lang->line('label_zipcode'); ?>" value="<?php if(!empty($result['zipcode'])) echo $result['zipcode']; else echo set_value('zipcode'); ?>" maxlength="32">
                                                        <?php echo form_error('zipcode'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_country'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="country" id="country" placeholder="<?php echo $this->lang->line('label_country'); ?>" value="<?php if(!empty($result['country'])) echo $result['country']; else echo set_value('country'); ?>" maxlength="64">
                                                        <?php echo form_error('country'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_telephone_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="telephone_number" id="telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php if(!empty($result['telephone_number'])) echo $result['telephone_number']; else echo set_value('telephone_number'); ?>" maxlength="16">
                                                        <?php echo form_error('telephone_number'); ?>
                                                    </div>
                                                </div>  
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_cellphone_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="cellphone_number" id="cellphone_number" placeholder="<?php echo $this->lang->line('label_cellphone_number'); ?>" value="<?php if(!empty($result['cellphone_number'])) echo $result['cellphone_number']; else echo set_value('cellphone_number'); ?>" maxlength="16">
                                                        <?php echo form_error('cellphone_number'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_country_ship_to'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="country_ship_to" id="country_ship_to" placeholder="<?php echo $this->lang->line('label_country_ship_to'); ?>" value="<?php if(!empty($result['country_ship_to'])) echo $result['country_ship_to']; else echo set_value('country_ship_to'); ?>" maxlength="64">
                                                        <?php echo form_error('country_ship_to'); ?>
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
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_container'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="container" id="container" placeholder="<?php echo $this->lang->line('label_container'); ?>" value="<?php if(!empty($result['container'])) echo $result['container']; else echo set_value('container'); ?>" >
                                                        <?php echo form_error('container'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_user_name'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="user_name" id="user_name" placeholder="<?php echo $this->lang->line('label_user_name'); ?>" value="<?php if(!empty($result['user_name'])) echo $result['user_name']; else echo set_value('user_name'); ?>" maxlength="128" pattern="^[a-z0-9_]{1,32}$">
                                                        <?php echo form_error('user_name'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_password'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="password" name="password" id="password" class="form-control m-input"  placeholder="<?php echo $this->lang->line('label_password'); ?>" value="<?php echo set_value('password'); ?>">
                                                        <?php echo form_error('password'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_confirm_password'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="password" name="confirmpassword" id="confirmpassword" class="form-control m-input" placeholder="<?php echo $this->lang->line('label_confirm_password'); ?>" value="<?php echo set_value('confirmpassword'); ?>">
                                                        <?php echo form_error('confirmpassword'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_email'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="email" class="form-control m-input" name="email" id="email" placeholder="<?php echo $this->lang->line('label_email'); ?>" value="<?php if(!empty($result['email'])) echo $result['email']; else echo set_value('email'); ?>" maxlength="128">
                                                        <?php echo form_error('email'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_branch'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <select class="form-control m-input" name="branch_id" id="branch_id" placeholder="<?php echo $this->lang->line('label_branch'); ?>">
                                                            <option value=""><?php echo $this->lang->line('label_branch'); ?></option>
                                                            <?php 
                                                                if(!empty($branch_list)){
                                                                    foreach ($branch_list as $key => $value) {
                                                            ?>
                                                                        <option value="<?php echo $value['id']; ?>" <?php if($result['branch_id'] == $value['id']) echo "selected"; ?>><?php echo $value['name']; ?></option>
                                                            <?php
                                                                    }
                                                                }
                                                            ?>
                                                        </select>

                                                        <?php echo form_error('branch_id'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_sec_add_cust'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="sec_add_cust" value="Yes" type="radio" <?php if($result['sec_add_cust'] == "Yes") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="sec_add_cust" value="No" type="radio" <?php if($result['sec_add_cust'] == "No") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('sec_add_cust'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_sec_add_pickup'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="sec_add_pickup" value="Yes" type="radio" <?php if($result['sec_add_pickup'] == "Yes") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="sec_add_pickup" value="No" type="radio" <?php if($result['sec_add_pickup'] == "No") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('sec_add_pickup'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_sec_only_pickup'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="sec_only_pickup" value="Yes" type="radio" <?php if($result['sec_only_pickup'] == "Yes") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="sec_only_pickup" value="No" type="radio" <?php if($result['sec_only_pickup'] == "No") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('sec_only_pickup'); ?>
                                                    </div>
                                                </div>
 
                                                <!-- <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_void'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="void" value="Yes" type="radio" <?php if($result['void'] == "Yes") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="void" value="No" type="radio" <?php if($result['void'] == "No") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('void'); ?>
                                                    </div>
                                                </div> -->
 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_driver_group'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="driver_group" value="Agent" type="radio" <?php if($result['driver_group'] == "Agent") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_agent'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="driver_group" value="Branch" type="radio" <?php if($result['driver_group'] == "Branch") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_branch'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('driver_group'); ?>
                                                    </div>
                                                </div>
 
                                                <!-- <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_cnum'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="cnum" value="Yes" type="radio" <?php if($result['cnum'] == "Yes") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="cnum" value="No" type="radio" <?php if($result['cnum'] == "No") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('cnum'); ?>
                                                    </div>
                                                </div> -->
 
                                                <!-- <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_driver'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="driver" value="Yes" type="radio" <?php if($result['driver'] == "Yes") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="driver" value="No" type="radio" <?php if($result['driver'] == "No") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="driver" value="Both" type="radio" <?php if($result['driver'] == "Both") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_both'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('driver'); ?>
                                                    </div>
                                                </div> -->

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_start_time'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="start_time" id="start_time" placeholder="<?php echo $this->lang->line('label_start_time'); ?>" value="<?php if(!empty($result['start_time'])) echo $this->common->from_date_convert($result['start_time'], 'UTC', $this->session->userdata('web_timezone'), 'h:i A'); else echo set_value('start_time'); ?>" maxlength="64">
                                                        <?php echo form_error('start_time'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_end_time'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="end_time" id="end_time" placeholder="<?php echo $this->lang->line('label_end_time'); ?>" value="<?php if(!empty($result['end_time'])) echo $this->common->from_date_convert($result['end_time'], 'UTC', $this->session->userdata('web_timezone'), 'h:i A'); else echo set_value('end_time'); ?>" maxlength="64">
                                                        <?php echo form_error('end_time'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_days'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <select name="days[]" id="days" multiple="" class="form-control m-input" placeholder="<?php echo $this->lang->line('label_days'); ?>">
                                                            <?php 
                                                                $timestamp = strtotime('next Sunday');
                                                                $days = array();
                                                                for ($i = 0; $i < 7; $i++) {
                                                            ?>
                                                                <option value="<?php echo strftime('%a', $timestamp); ?>" <?php if(in_array(strftime('%a', $timestamp), explode(",", $result['days']))) echo "selected"; ?>><?php echo strftime('%a', $timestamp); ?></option>
                                                            <?php
                                                                    $timestamp = strtotime('+1 day', $timestamp);
                                                                }
                                                            ?>
                                                        </select>
                                                        <?php echo form_error('days'); ?>
                                                    </div>
                                                </div>
                                                

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_barcode'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="barcode" id="barcode" placeholder="<?php echo $this->lang->line('label_barcode'); ?>" value="<?php if(!empty($result['barcode'])) echo $result['barcode']; else echo set_value('barcode'); ?>" readonly>
                                                        <?php echo form_error('barcode'); ?>
                                                    </div>
                                                </div>
 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_invoice_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="invoice_number" id="invoice_number" placeholder="<?php echo $this->lang->line('label_invoice_number'); ?>" value="<?php if(!empty($result['invoice_number'])) echo $result['invoice_number']; else echo set_value('invoice_number'); ?>" readonly>
                                                        <?php echo form_error('invoice_number'); ?>
                                                    </div>
                                                </div>
 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_receipt_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="receipt_number" id="receipt_number" placeholder="<?php echo $this->lang->line('label_receipt_number'); ?>" value="<?php if(!empty($result['receipt_number'])) echo $result['receipt_number']; else echo set_value('receipt_number'); ?>" readonly>
                                                        <?php echo form_error('receipt_number'); ?>
                                                    </div>
                                                </div>
 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_expense_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="expense_number" id="expense_number" placeholder="<?php echo $this->lang->line('label_expense_number'); ?>" value="<?php if(!empty($result['expense_number'])) echo $result['expense_number']; else echo set_value('expense_number'); ?>" readonly>
                                                        <?php echo form_error('expense_number'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_customer_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="customer_number" id="customer_number" placeholder="<?php echo $this->lang->line('label_customer_number'); ?>" value="<?php if(!empty($result['customer_number'])) echo $result['customer_number']; else echo set_value('customer_number'); ?>" readonly >
                                                        <?php echo form_error('customer_number'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_appcode'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="appcode" id="appcode" placeholder="<?php echo $this->lang->line('label_appcode'); ?>" value="<?php if(!empty($result['appcode'])) echo $result['appcode']; else echo set_value('appcode', random_string('numeric', 5)); ?>" >
                                                        <?php echo form_error('appcode'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <div class="col-lg-8 ml-lg-auto m-form__actions">
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

                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
            <!-- end:: Body -->
            <!-- begin::Footer -->
                <?php   $this->load->view('company/inc/footer');  ?>
            <!-- end::Footer -->
        </div>
        <!-- end:: Page -->
        
        <!--begin::Base Scripts -->
            <?php $this->load->view('company/inc/scripts'); ?>
            <!-- <script src="<?php echo base_url(); ?>/assets/demo/default/custom/crud/forms/widgets/input-mask.js" type="text/javascript"></script> -->

        <!--end::Base Scripts -->
        <!--begin::Page Snippets -->
        <script type="text/javascript">
        /* Input mask */
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

        /* Time picker */
        var BootstrapTimepicker = {
            init: function() {
                $("#start_time, #end_time").timepicker()
            }
        };
        jQuery(document).ready(function() {
            BootstrapTimepicker.init()
        });

        /* select 2 */
        var Select2 = {
            init: function() {
                $("#days").select2();
                $("#branch_id").select2();
            }
        };
        jQuery(document).ready(function() {
            Select2.init()
        });

        jQuery(document).ready(function() {
            $("#m_form_1").validate({
                rules: {
                    co_driverid: {
                        required: !0,
                        digits: !0,
                        maxlength: 20
                    },
                    company_name: {
                        required: !0
                    },
                    fname: {
                        required: !0
                    },
                    lname: {
                        required: !0
                    },
                    user_name: {
                        required: !0
                    },
                    email: {
                        required: !0,
                        email: true,
                    },
                    branch_id: {
                        required: !0
                    },
                    sec_add_cust: {
                        required: !0,
                    },
                    sec_add_pickup: {
                        required: !0,
                    },
                    sec_only_pickup: {
                        required: !0,
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
                    address: {
                        required: !0,
                    },
                    city: {
                        required: !0,
                    },
                    state: {
                        required: !0,
                    },
                    zipcode: {
                        required: !0,
                    },
                    borough: {
                        required: !0,
                    },
                    telephone_number: {
                        required: function(element) {
                            return $("#cellphone_number").is(':blank');
                        },
                        minlength: 8,
                        maxlength: 14
                    },
                    cellphone_number: {
                        required: function(element) {
                            return $("#telephone_number").is(':blank');
                        },
                        minlength: 8,
                        maxlength: 14
                    },
                    language: {
                        required: !0,
                    },
                    container: {
                    },
                    country_ship_to: {
                        required: !0,
                    },
                    void: {
                        required: !0,
                    },
                    driver_group: {
                        required: !0,
                    },
                    cnum: {
                        required: !0,
                    },
                    driver: {
                        required: !0
                    },
                    start_time: {
                        required: !0
                    },
                    end_time: {
                        required: !0
                    },
                    "days[]": {
                        required: !0
                    },
                    barcode: {
                        required: !0,
                        digits: !0,
                        maxlength: 20
                    },
                    invoice_number: {
                        required: !0,
                        digits: !0,
                        maxlength: 20
                    },
                    receipt_number: {
                        required: !0,
                        digits: !0,
                        maxlength: 20
                    },
                    expense_number: {
                        required: !0,
                        digits: !0,
                        maxlength: 20
                    },
                    customer_number: {
                        required: !0,
                        digits: !0,
                        maxlength: 20
                    },
                    appcode: {
                        required: !0,
                        digits: !0
                    },
                    driver_code: {
                        required: !0,
                        maxlength: 64
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
        </script>

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

                /*geocomplete country shipto */
                $("#country_ship_to").geocomplete().bind("geocode:result", function(event, result){
                    for (var i = 0; i < result.address_components.length; i++) {
                        var addressType = result.address_components[i].types[0];
                        if (addressType == "country") {
                            $("#country_ship_to").val(result.address_components[i]['long_name']);
                        }
                    }
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
