<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            <?php echo $this->site_name; ?> | <?php echo $this->lang->line('title_add_new_user_right'); ?>
        </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->load->view('company/inc/stylesheet'); ?>
        <style type="text/css">
            .m-form .m-form__section {
                font-size: 1.0rem !important;
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
                                    <?php echo $this->lang->line('title_add_new_user_right'); ?>
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
                                        <a href="<?php echo site_url();?>company/user_right/listing" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_user_right_list'); ?>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="javascript:;" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_add_new_user_right'); ?>
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
                            echo form_open('company/user_right/add/',$form_data); 
                        ?>  
                            <div class="row">
                                <div class="col-xl-6 offset-xl-2">
                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__body">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        <?php echo $this->lang->line('label_user_right_details'); ?>
                                                    </h3>
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
                                                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
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
                                                        * <?php echo $this->lang->line('label_user'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <select class="form-control m-input" name="user_id" id="user_id" placeholder="<?php echo $this->lang->line('label_user'); ?>">
                                                            <option value=""><?php echo $this->lang->line('label_user'); ?></option>
                                                            <?php 
                                                                if(!empty($user_list)){
                                                                    foreach ($user_list as $key => $value) {
                                                            ?>
                                                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['fname']." ".$result['lname']; ?></option>
                                                            <?php
                                                                    }
                                                                }
                                                            ?>
                                                        </select>

                                                        <?php echo form_error('user_id'); ?>
                                                    </div>
                                                </div> 

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_description'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <textarea class="form-control m-input" rows="3" name="description" id="description" placeholder="<?php echo $this->lang->line('label_description'); ?>"><?php if(!empty($result['description'])) echo $result['description']; else echo set_value('description'); ?></textarea>
                                                        <?php echo form_error('description'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_supervisor'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="supervisor" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="supervisor" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('supervisor'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_similar'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="similar" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="similar" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('similar'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_view_branch_invoice'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="view_branch_invoice" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="view_branch_invoice" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('view_branch_invoice'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_report_branch'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="report_branch" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="report_branch" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('report_branch'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_view_office'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="view_office" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="view_office" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('view_office'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_petty_cash'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="petty_cash" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="petty_cash" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('petty_cash'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_level_invoice'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="level_invoice" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="level_invoice" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('level_invoice'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_print_invoice'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="print_invoice" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="print_invoice" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('print_invoice'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_level_payment'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="level_payment" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="level_payment" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('level_payment'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_return_payment'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="return_payment" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="return_payment" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('return_payment'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_level_warehouse'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="level_warehouse" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="level_warehouse" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('level_warehouse'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_change_barcode'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="change_barcode" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="change_barcode" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('change_barcode'); ?>
                                                    </div>
                                                </div>  
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_delete_payment'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="delete_payment" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="delete_payment" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('delete_payment'); ?>
                                                    </div>
                                                </div> 

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 offset-xl-2">
                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__body">
                                            <div class="m-form__section m-form__section--first">

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_pickup'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="pickup" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="pickup" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('pickup'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_show_pickup'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="show_pickup" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="show_pickup" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('show_pickup'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_employee'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="employee" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="employee" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('employee'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_clients'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="clients" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="clients" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('clients'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_autocall'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="autocall" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="autocall" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('autocall'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_distribution'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="distribution" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="distribution" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('distribution'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_warehouse'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="warehouse" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="warehouse" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('warehouse'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_customer'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="customer" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="customer" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('customer'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_item'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="item" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="item" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('item'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_invoice'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="invoice" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="invoice" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('invoice'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_payment'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="payment" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="payment" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('payment'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_office'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="office" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="office" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('office'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_reports'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="reports" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="reports" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('reports'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_access_from_ip'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="access_from_ip" id="access_from_ip" placeholder="<?php echo $this->lang->line('label_access_from_ip'); ?>" value="<?php echo set_value('access_from_ip'); ?>" maxlength="64">
                                                        <?php echo form_error('access_from_ip'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_current_ip'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="current_ip" id="current_ip" placeholder="<?php echo $this->lang->line('label_current_ip'); ?>" value="<?php echo set_value('current_ip', $_SERVER['REMOTE_ADDR']); ?>" maxlength="64" readonly>
                                                        <?php echo form_error('current_ip'); ?>
                                                    </div>
                                                </div>  
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_access_time_from'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="access_time_from" id="access_time_from" placeholder="<?php echo $this->lang->line('label_access_time_from'); ?>" value="<?php echo set_value('access_time_from'); ?>" >
                                                        <?php echo form_error('access_time_from'); ?>
                                                    </div>
                                                </div>   
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_access_time_to'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="access_time_to" id="access_time_to" placeholder="<?php echo $this->lang->line('label_access_time_to'); ?>" value="<?php echo set_value('access_time_to'); ?>" >
                                                        <?php echo form_error('access_time_to'); ?>
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
        
        /* Time picker */
        var BootstrapTimepicker = {
            init: function() {
                $("#access_time_from, #access_time_to").timepicker()
            }
        };
        jQuery(document).ready(function() {
            BootstrapTimepicker.init()
        });

        /* select 2 */
        var Select2 = {
            init: function() {
                $("#branch_id").select2();
                $("#user_id").select2();
            }
        };
        jQuery(document).ready(function() {
            Select2.init()
        });

        jQuery(document).ready(function() {
            $("#m_form_1").validate({
                rules: {
                    user_id: {
                        required: !0,
                    },
                    branch_id: {
                        required: !0,
                    },
                    description: {
                        required: !0
                    },
                    supervisor: {
                        required: !0
                    }, 
                    similar: {
                        required: !0
                    }, 
                    view_branch_invoice: {
                        required: !0,
                    },
                    report_branch: {
                        required: !0,
                    },
                    view_office: {
                        required: !0
                    },
                    petty_cash: {
                        required: !0
                    }, 
                    level_invoice: {
                        required: !0
                    },  
                    print_invoice: {
                        required: !0
                    },  
                    level_payment: {
                        required: !0
                    },  
                    return_payment: {
                        required: !0
                    },  
                    level_warehouse: {
                        required: !0
                    },
                    change_barcode: {
                        required: !0
                    }, 
                    delete_payment: {
                        required: !0
                    },  
                    pickup: {
                        required: !0
                    }, 
                    show_pickup: {
                        required: !0
                    },  
                    employee: {
                        required: !0
                    },
                    clients: {
                        required: !0
                    }, 
                    autocall: {
                        required: !0
                    },  
                    distribution: {
                        required: !0
                    },  
                    warehouse: {
                        required: !0
                    },   
                    customer: {
                        required: !0
                    },   
                    item: {
                        required: !0
                    },  
                    invoice: {
                        required: !0
                    },  
                    payment: {
                        required: !0
                    },  
                    office: {
                        required: !0
                    },   
                    reports: {
                        required: !0
                    },
                    access_from_ip: {
                    },
                    current_ip: {
                        required: !0
                    }, 
                    access_time_from: {
                    }, 
                    access_time_to: {
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
        <!-- initialization of file upload and date picker -->
        <script type="text/javascript">
        $(document).ready(function()
        {

        });
        </script>
        <!--end::Page Snippets -->
    </body>
    <!-- end::Body -->
</html>
