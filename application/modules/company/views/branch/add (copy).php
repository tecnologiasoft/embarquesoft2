<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            <?php echo $this->site_name; ?> | <?php echo $this->lang->line('title_add_new_branch'); ?>
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
                                    <?php echo $this->lang->line('title_add_new_branch'); ?>
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
                                        <a href="<?php echo site_url();?>company/branch/listing" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_branch_list'); ?>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="javascript:;" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_add_new_branch'); ?>
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
                            echo form_open('company/branch/add/',$form_data); 
                        ?>  
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__body">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        <?php echo $this->lang->line('label_branch_details'); ?>
                                                    </h3>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_name'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="name" id="name" placeholder="<?php echo $this->lang->line('label_name'); ?>" value="<?php echo set_value('name'); ?>" maxlength="128" >
                                                        <?php echo form_error('name'); ?>
                                                    </div>
                                                </div> 

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_email'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="email" class="form-control m-input" name="email" id="email" placeholder="<?php echo $this->lang->line('label_email'); ?>" value="<?php echo set_value('email'); ?>" maxlength="128">
                                                        <?php echo form_error('email'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_address'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="address" id="address" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php echo set_value('address'); ?>" >
                                                        <input type="hidden" name="latitude" id="latitude" value="<?php echo set_value('latitude'); ?>">
                                                        <input type="hidden" name="longitude" id="longitude" value="<?php echo set_value('longitude'); ?>">
                                                        <?php echo form_error('address'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_address'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="address_line_1" id="address_line_1" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php echo set_value('address_line_1'); ?>" maxlength="256">
                                                        <?php echo form_error('address_line_1'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_address'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="address_line_2" id="address_line_2" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php echo set_value('address_line_2'); ?>" maxlength="256">
                                                        <?php echo form_error('address_line_2'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_borough'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="borough" id="sublocality_level_1" placeholder="<?php echo $this->lang->line('label_borough'); ?>" value="<?php echo set_value('borough'); ?>" maxlength="64">
                                                        <?php echo form_error('borough'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_city'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="city" id="locality" placeholder="<?php echo $this->lang->line('label_city'); ?>" value="<?php echo set_value('city'); ?>" maxlength="64">
                                                        <?php echo form_error('city'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_state'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="state" id="administrative_area_level_1" placeholder="<?php echo $this->lang->line('label_state'); ?>" value="<?php echo set_value('state'); ?>" maxlength="64">
                                                        <?php echo form_error('state'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_zone'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="zone" id="country" placeholder="<?php echo $this->lang->line('label_zone'); ?>" value="<?php echo set_value('zone'); ?>" maxlength="64">
                                                        <?php echo form_error('zone'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_zipcode'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="zipcode" id="postal_code" placeholder="<?php echo $this->lang->line('label_zipcode'); ?>" value="<?php echo set_value('zipcode'); ?>" maxlength="32">
                                                        <?php echo form_error('zipcode'); ?>
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
                                                        * <?php echo $this->lang->line('label_telephone_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="telephone_number1" id="telephone_number1" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php echo set_value('telephone_number1'); ?>" maxlength="16">
                                                        <?php echo form_error('telephone_number1'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_telephone_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="telephone_number2" id="telephone_number2" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php echo set_value('telephone_number2'); ?>" maxlength="16">
                                                        <?php echo form_error('telephone_number2'); ?>
                                                    </div>
                                                </div>
 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_container'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="container" id="container" placeholder="<?php echo $this->lang->line('label_container'); ?>" value="<?php echo set_value('container'); ?>" >
                                                        <?php echo form_error('container'); ?>
                                                    </div>
                                                </div> 

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_type'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="type" value="Branch" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_branch'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="type" value="Agent" type="radio" >
                                                                <?php echo $this->lang->line('label_agent'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('type'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_report_group'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="report_group" id="report_group" placeholder="<?php echo $this->lang->line('label_report_group'); ?>" value="<?php echo set_value('report_group'); ?>" maxlength="20" >
                                                        <?php echo form_error('report_group'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_invoice_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="invoice_number" id="invoice_number" placeholder="<?php echo $this->lang->line('label_invoice_number'); ?>" value="<?php echo set_value('invoice_number'); ?>" maxlength="20" disabled>
                                                        <?php echo form_error('invoice_number'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_receipt_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="receipt_number" id="receipt_number" placeholder="<?php echo $this->lang->line('label_receipt_number'); ?>" value="<?php echo set_value('receipt_number'); ?>" maxlength="20" disabled>
                                                        <?php echo form_error('receipt_number'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_barcode_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="barcode_number" id="barcode_number" placeholder="<?php echo $this->lang->line('label_barcode_number'); ?>" value="<?php echo set_value('barcode_number'); ?>" maxlength="20" disabled>
                                                        <?php echo form_error('barcode_number'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_expense_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="expense_number" id="expense_number" placeholder="<?php echo $this->lang->line('label_expense_number'); ?>" value="<?php echo set_value('expense_number'); ?>" disabled>
                                                        <?php echo form_error('expense_number'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_print'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="print" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="print" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('print'); ?>
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
                $("#telephone_number1").inputmask("mask", {
                    mask: "999-999-9999"
                }), $("#telephone_number2").inputmask("mask", {
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
                    name: {
                        required: !0
                    },
                    email: {
                        required: !0,
                        email: true,
                    },
                    address_line_1: {
                        required: !0
                    }, 
                    address_line_2: {
                        required: !0
                    },  
                    zone: {
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
                    telephone_number1: {
                        required: !0,
                        minlength: 8,
                        maxlength: 14
                    },
                    telephone_number2: {
                        required: !0,
                        minlength: 8,
                        maxlength: 14
                    }, 
                    type: {
                        required: !0,
                    }, 
                    report_group: {
                        required: !0,
                        digits: !0,
                        maxlength: 20
                    },
                    invoice_numer: {
                        required: !0,
                        digits: !0,
                        maxlength: 20
                    }, 
                    receipt_number: {
                        required: !0,
                        digits: !0,
                        maxlength: 20
                    }, 
                    barcode_number: {
                        required: !0,
                        digits: !0,
                        maxlength: 20
                    }, 
                    expense_number: {
                        required: !0,
                        number: !0,
                        maxlength: 14
                    }, 
                    print: {
                        required: !0,
                    }

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
                $("#address_line_1").val(address_line_1.trim());

                /*$("#latitude").val(result.geometry.location.lat().toFixed(8));
                $("#longitude").val(result.geometry.location.lng().toFixed(8));*/
            });
        });
        </script>
        <!--end::Page Snippets -->
    </body>
    <!-- end::Body -->
</html>
