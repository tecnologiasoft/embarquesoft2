<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            <?php echo $this->site_name; ?> | <?php echo $this->lang->line('title_add_new_package_status'); ?>
        </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->load->view('company/inc/stylesheet'); ?>
        <style type="text/css">
            /* .m-form .m-form__section {
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
            } */
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
                                    <?php echo $this->lang->line('title_add_new_package_status'); ?>
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
                                        <a href="<?php echo site_url();?>company/package_status/listing" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_package_status_list'); ?>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="javascript:;" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_add_new_package_status'); ?>
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
                            echo form_open('company/package_status/add/',$form_data); 
                        ?>  
                            <div class="row">
                                <div class="col-xl-6 offset-xl-2">
                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__body">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        <?php echo $this->lang->line('label_package_status_details'); ?>
                                                    </h3>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_description'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="description" id="description" placeholder="<?php echo $this->lang->line('label_description'); ?>" value="<?php echo set_value('description'); ?>" >
                                                        <?php echo form_error('description'); ?>
                                                    </div>
                                                </div> 

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_warehouse_id'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <!-- <input type="text" class="form-control m-input" name="warehouse_id" id="warehouse_id" placeholder="<?php echo $this->lang->line('label_warehouse_id'); ?>" value="<?php echo set_value('warehouse_id'); ?>" > -->
                                                        <select class="form-control m-input" name="warehouse_id" id="warehouse_id" placeholder="<?php echo $this->lang->line('label_warehouse_id'); ?>">
                                                            <option value=""><?php echo $this->lang->line('label_warehouse_id'); ?></option>
                                                            <?php 
                                                                if(!empty($warehouse_list)){
                                                                    foreach ($warehouse_list as $key => $value) {
                                                            ?>
                                                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                            <?php
                                                                    }
                                                                }
                                                            ?>
                                                        </select>

                                                        <?php echo form_error('warehouse_id'); ?>
                                                    </div>
                                                </div> 

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_transaction_type'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <select class="form-control m-input" name="tran_type" id="tran_type" placeholder="<?php echo $this->lang->line('label_transaction_type'); ?>">
                                                            <option value=""><?php echo $this->lang->line('label_transaction_type'); ?></option>
                                                            <option value="Warehouse"><?php echo $this->lang->line('label_warehouse'); ?></option>
                                                            <option value="Transit"><?php echo $this->lang->line('label_transit'); ?></option>
                                                            <option value="Container"><?php echo $this->lang->line('label_container'); ?></option>
                                                            <option value="Delivery"><?php echo $this->lang->line('label_delivery'); ?></option>
                                                        </select>

                                                        <?php echo form_error('tran_type'); ?>
                                                    </div>
                                                </div> 

                                                <!-- <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php //echo $this->lang->line('label_active'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="active" value="Yes" type="radio" checked="">
                                                                <?php //echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="active" value="No" type="radio" >
                                                                <?php //echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php //echo form_error('active'); ?>
                                                    </div>
                                                </div> -->

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_clear_warehouse'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="clear_warehouse" value="Yes" type="radio" checked="">
                                                                <?php echo $this->lang->line('label_yes'); ?>
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="clear_warehouse" value="No" type="radio" >
                                                                <?php echo $this->lang->line('label_no'); ?>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('clear_warehouse'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_scanner_country'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="scanner_country" id="scanner_country" placeholder="<?php echo $this->lang->line('label_scanner_country'); ?>" value="<?php echo set_value('scanner_country'); ?>" >
                                                        <?php echo form_error('scanner_country'); ?>
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

                               <!--  <div class="col-xl-6 offset-xl-2">
                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__body">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        <?php //echo $this->lang->line('label_other_details'); ?>
                                                    </h3>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 -->
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
                $("#warehouse_id").select2();
                $("#tran_type").select2();
            }
        };
        jQuery(document).ready(function() {
            Select2.init()
        });

        jQuery(document).ready(function() {
            $("#m_form_1").validate({
                rules: { 
                    description: {
                        required: !0
                    }, 
                    warehouse_id: {
                        required: !0,
                        maxlength: 20
                    }, 
                    active: {
                        required: !0
                        
                    }, 
                    clear_warehouse: {
                        required: !0
                    },
                    tran_type: {
                        required: !0
                    },
                    scanner_country: {
                        required: !0,
                        digits: !0
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
                street_number: 'short_name',
                route: 'long_name',
                locality: 'long_name', // city
                administrative_area_level_1: 'long_name', // State
                country: 'long_name', // country
                postal_code: 'short_name' // Zip code
              };

            /*geocomplete*/
            $("#address").geocomplete().bind("geocode:result", function(event, result){
                //console.log(result.address_components);
                
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
                }
            });
        });
        </script>
        <!--end::Page Snippets -->
    </body>
    <!-- end::Body -->
</html>
