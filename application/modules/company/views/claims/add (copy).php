<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            <?php echo $this->site_name; ?> | <?php echo $this->lang->line('title_add_new_claims'); ?>
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
                                    <?php echo $this->lang->line('title_add_new_claims'); ?>
                                </h3>
                                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                                    <li class="m-nav__item m-nav__item--home">
                                        <a href="<?php echo base_url();?>company/dashboard" class="m-nav__link m-nav__link--icon">
                                            <i class="m-nav__link-icon la la-home"></i>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?php echo base_url();?>company/claims/listing" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_claims_list'); ?>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="javascript:;" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_add_new_claims'); ?>
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
                            echo form_open('company/claims/add/',$form_data); 
                        ?>  
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__body">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        <?php echo $this->lang->line('label_claims_details'); ?>
                                                    </h3>
                                                </div>
                                                

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_claim_date'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="claim_date" id="claim_date" placeholder="<?php echo $this->lang->line('label_claim_date'); ?>" value="<?php echo set_value('claim_date'); ?>" maxlength="64">
                                                        <?php echo form_error('claim_date'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_first_name'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="fname" id="fname" placeholder="<?php echo $this->lang->line('label_first_name'); ?>" value="<?php echo set_value('fname'); ?>" maxlength="64">
                                                        <?php echo form_error('fname'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_last_name'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="lname" id="lname" placeholder="<?php echo $this->lang->line('label_last_name'); ?>" value="<?php echo set_value('lname'); ?>" maxlength="64">
                                                        <?php echo form_error('lname'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_country'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="country" id="country" placeholder="<?php echo $this->lang->line('label_country'); ?>" value="<?php echo set_value('country'); ?>" maxlength="64">
                                                        <?php echo form_error('country'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_telephone_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="telephone_number" id="telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php echo set_value('telephone_number'); ?>" maxlength="16">
                                                        <?php echo form_error('telephone_number'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_cellphone_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="cellphone_number" id="cellphone_number" placeholder="<?php echo $this->lang->line('label_cellphone_number'); ?>" value="<?php echo set_value('cellphone_number'); ?>" maxlength="16">
                                                        <?php echo form_error('cellphone_number'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_invoice_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="invoice_number" id="invoice_number" placeholder="<?php echo $this->lang->line('label_invoice_number'); ?>" value="<?php echo set_value('invoice_number'); ?>" maxlength="16">
                                                        <?php echo form_error('invoice_number'); ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_status'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="status" value="Open" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_open'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="status" value="Processing" type="radio" >
                                                                <?php echo $this->lang->line('label_processing'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="status" value="Closed" type="radio" >
                                                                <?php echo $this->lang->line('label_closed'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('status'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_comment'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <textarea class="form-control m-input" rows="3" name="comment" id="comment" placeholder="<?php echo $this->lang->line('label_comment'); ?>"><?php if(!empty($result['comment'])) echo $result['comment']; else echo set_value('comment'); ?></textarea>
                                                        <?php echo form_error('comment'); ?>
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
                $("#cellphone_number").inputmask("mask", {
                    mask: "999-999-9999"
                }), $("#telephone_number").inputmask("mask", {
                    mask: "999-999-9999"
                })
            }
        };
        jQuery(document).ready(function() {
            Inputmask.init()
        });    

        var BootstrapDatepicker = function() {
            var t = function() {
                $("#claim_date").datepicker({
                    todayHighlight: !0,
                    orientation: "bottom left",
                    templates: {
                        leftArrow: '<i class="la la-angle-left"></i>',
                        rightArrow: '<i class="la la-angle-right"></i>'
                    },
                    autoclose: true,
                    format: "yyyy-mm-dd"
                })
            };
            return {
                init: function() {
                    t()
                }
            }
        }();
        jQuery(document).ready(function() {
            BootstrapDatepicker.init()
        });

        jQuery(document).ready(function() {
            $("#m_form_1").validate({
                rules: {
                    fname: {
                        required: !0
                    },
                    lname: {
                        required: !0
                    },
                    country: {
                        required: !0
                    }, 
                    telephone_number: {
                        required: !0,
                        minlength: 8,
                        maxlength: 14
                    },
                    cellphone_number: {
                        required: !0,
                        minlength: 8,
                        maxlength: 14
                    },
                    status: {
                        required: !0
                    }, 
                    invoice_number: {
                        required: !0,
                        digits: !0,
                        maxlength: 20
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
                //console.log(result.address_components);
                
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