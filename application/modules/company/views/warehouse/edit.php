<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            <?php echo $this->site_name; ?> | <?php echo $this->lang->line('title_edit_warehouse'); ?>
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
                                    <?php echo $this->lang->line('title_edit_warehouse'); ?>
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
                                        <a href="<?php echo site_url();?>company/warehouse/listing" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_warehouse_list'); ?>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="javascript:;" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_edit_warehouse'); ?>
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
                            echo form_open('company/warehouse/edit/'.$result['id'],$form_data); 
                        ?>  
                            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                            <div class="row">
                                <div class="col-xl-6 offset-xl-2">
                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__body">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        <?php echo $this->lang->line('label_warehouse_details'); ?>
                                                    </h3>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_warehouse_id'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="warehouse_id" id="warehouse_id" placeholder="<?php echo $this->lang->line('label_warehouse_id'); ?>" value="<?php if(!empty($result['id'])) echo $result['id']; else echo set_value('warehouse_id'); ?>" maxlength="20" disabled >
                                                        <?php echo form_error('warehouse_id'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_name'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="name" id="name" placeholder="<?php echo $this->lang->line('label_name'); ?>" value="<?php if(!empty($result['name'])) echo $result['name']; else echo set_value('name'); ?>" maxlength="128" >
                                                        <?php echo form_error('name'); ?>
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
                                                        * <?php echo $this->lang->line('label_address'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="address_line_1" id="address_line_1" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php if(!empty($result['address_line1'])) echo $result['address_line1']; else echo set_value('address_line_1'); ?>" maxlength="256">
                                                        <?php echo form_error('address_line_1'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_address'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="address_line_2" id="address_line_2" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php if(!empty($result['address_line2'])) echo $result['address_line2']; else echo set_value('address_line_2'); ?>" maxlength="256">
                                                        <?php echo form_error('address_line_2'); ?>
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
                                                        <input type="text" class="form-control m-input" name="zipcode" id="postal_code" placeholder="<?php echo $this->lang->line('label_zipcode'); ?>" value="<?php if(!empty($result['zipcode'])) echo $result['zipcode']; else echo set_value('zipcode'); ?>" maxlength="32">
                                                        <?php echo form_error('zipcode'); ?>
                                                    </div>
                                                </div>


                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_telephone_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="telephone_number" id="telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php if(!empty($result['telephone_number'])) echo $result['telephone_number']; else echo set_value('telephone_number'); ?>" maxlength="16">
                                                        <?php echo form_error('telephone_number'); ?>
                                                    </div>
                                                </div>   
 
                                                <div class="form-group m-form__group row">
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
                                                </div>
 
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_status'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="status" value="A" type="radio" <?php if($result['status'] == "A") echo "checked"; ?>>
                                                                A
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="status" value="N" type="radio" <?php if($result['status'] == "N") echo "checked"; ?>>
                                                                N
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('status'); ?>
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
                                <!-- 
                                <div class="col-xl-6 offset-xl-2">
                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__body">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        <?php echo $this->lang->line('label_other_details'); ?>
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
                $("#days").select2();
            }
        };
        jQuery(document).ready(function() {
            Select2.init()
        });

        jQuery(document).ready(function() {
            $("#m_form_1").validate({
                rules: { 
                    name: {
                        required: !0
                    }, 
                    address_line_1: {
                        required: !0
                    }, 
                    address_line_2: {
                        required: !0
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
                    telephone_number: {
                        required: !0,
                        minlength: 8,
                        maxlength: 14
                    }, 
                    void: {
                        required: !0,
                    },
                    status: {
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
                /*street_number: 'short_name',
                route: 'long_name',*/
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
            });
        });
        </script>
        <!--end::Page Snippets -->
    </body>
    <!-- end::Body -->
</html>
