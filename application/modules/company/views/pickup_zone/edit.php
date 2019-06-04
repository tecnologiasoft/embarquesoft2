<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            <?php echo $this->site_name; ?> | <?php echo $this->lang->line('title_edit_pickup_zone'); ?>
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
                                    <?php echo $this->lang->line('title_edit_pickup_zone'); ?>
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
                                        <a href="<?php echo base_url();?>company/pickup_zone/listing" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_pickup_zone_list'); ?>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="javascript:;" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_edit_pickup_zone'); ?>
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
                            echo form_open('company/pickup_zone/edit/'.$result['id'],$form_data); 
                        ?>  
                            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__body">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        <?php echo $this->lang->line('label_pickup_zone_details'); ?>
                                                    </h3>
                                                </div>
                                                

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_pickup_zone_id'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="claim_id" id="claim_id" placeholder="<?php echo $this->lang->line('label_claim_id'); ?>" value="<?php if(!empty($result['id'])) echo $result['id']; else echo set_value('claim_id'); ?>" disabled>
                                                        <?php echo form_error('claim_id'); ?>
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
                                                        * <?php echo $this->lang->line('label_stops'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="stops" id="stops" placeholder="<?php echo $this->lang->line('label_stops'); ?>" value="<?php if(!empty($result['stops'])) echo $result['stops']; else echo set_value('stops'); ?>" maxlength="64">
                                                        <?php echo form_error('stops'); ?>
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
                                                        * <?php echo $this->lang->line('label_zipcode'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="zipcode" value="Yes" type="radio" <?php if($result['zipcode'] == "Yes") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="zipcode" value="No" type="radio"  <?php if($result['zipcode'] == "No") echo "checked"; ?>>
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label> 
                                                        </div>
                                                        <?php echo form_error('zipcode'); ?>
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
