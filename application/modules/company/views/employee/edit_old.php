<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            <?php echo $this->site_name; ?> | <?php echo $this->lang->line('title_edit_inventory'); ?>
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
                                    <?php echo $this->lang->line('title_edit_inventory'); ?>
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
                                        <a href="<?php echo site_url();?>company/inventory/listing" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_inventory_list'); ?>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="javascript:;" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_edit_inventory'); ?>
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
                            echo form_open('company/inventory/edit/'.$result['id'],$form_data); 
                        ?>  
                            <input type="hidden" name="id" value="<?php if(!empty($result['id'])) echo $result['id']; else echo set_value('id'); ?>">
                            <div class="row">
                                <div class="col-xl-6 offset-xl-2">
                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__body">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        <?php echo $this->lang->line('label_inventory_details'); ?>
                                                    </h3>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_inventory_id'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="inventory_id" id="inventory_id" placeholder="<?php echo $this->lang->line('label_inventory_id'); ?>" value="<?php if(!empty($result['id'])) echo $result['id']; else echo set_value('inventory_id'); ?>" disabled >
                                                        <?php echo form_error('inventory_id'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_item_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="item_number" id="item_number" placeholder="<?php echo $this->lang->line('label_item_number'); ?>" value="<?php if(!empty($result['item_number'])) echo $result['item_number']; else echo set_value('item_number'); ?>" maxlength="128" >
                                                        <?php echo form_error('item_number'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_description'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="description" id="description" placeholder="<?php echo $this->lang->line('label_description'); ?>" value="<?php if(!empty($result['description'])) echo $result['description']; else echo set_value('description'); ?>" >
                                                        <?php echo form_error('description'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_price'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="price" id="price" placeholder="<?php echo $this->lang->line('label_price'); ?>" value="<?php if(!empty($result['price'])) echo $result['price']; else echo set_value('price'); ?>">
                                                        <?php echo form_error('price'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_cost'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="cost" id="cost" placeholder="<?php echo $this->lang->line('label_cost'); ?>" value="<?php if(!empty($result['cost'])) echo $result['cost']; else echo set_value('cost'); ?>">
                                                        <?php echo form_error('cost'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_type'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="type" value="Service" type="radio" <?php if($result['type'] == "Service") echo "checked"; ?> >
                                                                <?php echo $this->lang->line('label_service'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="type" value="Inventory" type="radio" <?php if($result['type'] == "Inventory") echo "checked"; ?> >
                                                                <?php echo $this->lang->line('label_inventory'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('type'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_qty'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="qty" id="qty" placeholder="<?php echo $this->lang->line('label_qty'); ?>" value="<?php if(!empty($result['qty'])) echo $result['qty']; else echo set_value('qty'); ?>">
                                                        <?php echo form_error('qty'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_recorder_point'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="recorder_point" id="recorder_point" placeholder="<?php echo $this->lang->line('label_recorder_point'); ?>" value="<?php if(!empty($result['recorder_point'])) echo $result['recorder_point']; else echo set_value('recorder_point'); ?>">
                                                        <?php echo form_error('recorder_point'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_driver_inventory'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="driver_inventory" value="Yes" type="radio" <?php if($result['driver_inventory'] == "Yes") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="driver_inventory" value="No" type="radio" <?php if($result['driver_inventory'] == "No") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('driver_inventory'); ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_air'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="air" value="Yes" type="radio" <?php if($result['air'] == "Yes") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="air" value="No" type="radio" <?php if($result['air'] == "No") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('air'); ?>
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
                                                        * <?php echo $this->lang->line('label_zone'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="zone" id="zone" placeholder="<?php echo $this->lang->line('label_zone'); ?>" value="<?php if(!empty($result['zone'])) echo $result['zone']; else echo set_value('zone'); ?>" maxlength="64">
                                                        <?php echo form_error('zone'); ?>
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
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        <?php echo $this->lang->line('label_other_details'); ?>
                                                    </h3>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_weight'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="weight" id="weight" placeholder="<?php echo $this->lang->line('label_weight'); ?>" value="<?php if(!empty($result['weight'])) echo $result['weight']; else echo set_value('weight'); ?>">
                                                        <?php echo form_error('weight'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_width'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="width" id="width" placeholder="<?php echo $this->lang->line('label_width'); ?>" value="<?php if(!empty($result['width'])) echo $result['width']; else echo set_value('width'); ?>">
                                                        <?php echo form_error('width'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_height'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="height" id="height" placeholder="<?php echo $this->lang->line('label_height'); ?>" value="<?php if(!empty($result['height'])) echo $result['height']; else echo set_value('height'); ?>">
                                                        <?php echo form_error('height'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_depth'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="depth" id="depth" placeholder="<?php echo $this->lang->line('label_depth'); ?>" value="<?php if(!empty($result['depth'])) echo $result['depth']; else echo set_value('depth'); ?>">
                                                        <?php echo form_error('depth'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_weight_price'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="weight_price" id="weight_price" placeholder="<?php echo $this->lang->line('label_weight_price'); ?>" value="<?php if(!empty($result['weight_price'])) echo $result['weight_price']; else echo set_value('weight_price'); ?>">
                                                        <?php echo form_error('weight_price'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_volume_price'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="volume_price" id="volume_price" placeholder="<?php echo $this->lang->line('label_volume_price'); ?>" value="<?php if(!empty($result['volume_price'])) echo $result['volume_price']; else echo set_value('volume_price'); ?>">
                                                        <?php echo form_error('volume_price'); ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_has_insurane'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="has_insurane" value="Yes" type="radio" <?php if($result['has_insurane'] == "Yes") echo "checked"; ?> >
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="has_insurane" value="No" type="radio" <?php if($result['has_insurane'] == "No") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('has_insurane'); ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_insurance_price'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="insurance_price" id="insurance_price" placeholder="<?php echo $this->lang->line('label_insurance_price'); ?>" value="<?php if(!empty($result['insurance_price'])) echo $result['insurance_price']; else echo set_value('insurance_price'); ?>" maxlength="64">
                                                        <?php echo form_error('insurance_price'); ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_insurance_percentage'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="insurance_percentage" id="insurance_percentage" placeholder="<?php echo $this->lang->line('label_insurance_percentage'); ?>" value="<?php if(!empty($result['insurance_percentage'])) echo $result['insurance_percentage']; else echo set_value('insurance_percentage'); ?>" maxlength="64">
                                                        <?php echo form_error('insurance_percentage'); ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_calculate_price'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="calculate_price" id="calculate_price" placeholder="<?php echo $this->lang->line('label_calculate_price'); ?>" value="<?php if(!empty($result['calculate_price'])) echo $result['calculate_price']; else echo set_value('calculate_price'); ?>" maxlength="64">
                                                        <?php echo form_error('calculate_price'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_scanner_type'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="scanner_type" id="scanner_type" placeholder="<?php echo $this->lang->line('label_scanner_type'); ?>" value="<?php if(!empty($result['scanner_type'])) echo $result['scanner_type']; else echo set_value('scanner_type'); ?>" maxlength="64">
                                                        <?php echo form_error('scanner_type'); ?>
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
                    item_number: {
                        required: !0,
                        digits: !0,
                        maxlength: 20
                    },
                    description: {
                        required: !0
                    },
                    price: {
                        required: !0,
                        number: !0
                    },
                    cost: {
                        required: !0,
                        number: !0
                    },
                    type: {
                        required: !0
                    },
                    qty: {
                        required: !0,
                        digits: !0,
                        maxlength: 20
                    }, 
                    recorder_point: {
                        required: !0,
                        number: !0
                    },
                    driver_inventory: {
                        required: !0
                    },
                    air: {
                        required: !0
                    },
                    country: {
                        required: !0,
                        maxlength: 64
                    },
                    zone: {
                        required: !0,
                        maxlength: 64
                    },
                    weight: {
                        required: !0,
                        number: !0
                    },
                    weight: {
                        required: !0,
                        number: !0
                    },
                    width: {
                        required: !0,
                        number: !0
                    },
                    height: {
                        required: !0,
                        number: !0
                    },
                    depth: {
                        required: !0,
                        number: !0
                    },
                    weight_price: {
                        required: !0,
                        number: !0
                    },
                    volume_price: {
                        required: !0,
                        number: !0
                    },
                    has_insurane: {
                        required: !0
                    },
                    insurance_price: {
                        required: !0,
                        number: !0
                    },
                    insurance_percentage: {
                        required: !0,
                        number: !0,
                        max: 100
                    },
                    calculate_price: {
                        required: !0,
                        number: !0,
                    },
                    scanner_type: {
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
        </script>

        <!-- google maps api -->
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=<?php echo PLACE_API_KEY;?>&libraries=places"></script>

        <!-- initialization of file upload and date picker -->
        <script type="text/javascript">
        $(document).ready(function()
        {
            var componentForm = {
                country: 'long_name', // country
              };

            /*geocomplete*/
            $("#country").geocomplete().bind("geocode:result", function(event, result){

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
                }
            });
        });
        </script>
        <!--end::Page Snippets -->
    </body>
    <!-- end::Body -->
</html>
