<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            <?php echo $this->site_name; ?> | <?php echo $this->lang->line('title_edit_shipto'); ?>
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
                    <?php  $this->load->view('company/inc/left-menu',$data);  ?>
                <!-- END: Left Aside -->
                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    <?php echo $this->lang->line('title_edit_shipto'); ?>
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
                                        <a href="<?php echo base_url();?>company/pickup/listing" class="m-nav__link">
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
                                                <?php echo $this->lang->line('title_edit_shipto'); ?>
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
                            echo form_open('company/pickup/edit_shipto/'.$result['id'],$form_data); 
                        ?>  
                            <input type="hidden" name="id" value="<?php if(!empty($result['id'])) echo $result['id']; else set_value('id'); ?>">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__body">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        <?php echo $this->lang->line('label_shipto_details'); ?>
                                                    </h3>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        * <?php echo $this->lang->line('label_shipto_id'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="shipto_id" id="shipto_id" placeholder="<?php echo $this->lang->line('label_shipto_id'); ?>" value="<?php if(!empty($result['id'])) echo $result['id']; else echo set_value('shipto_id'); ?>" maxlength="20" disabled >
                                                        <?php echo form_error('shipto_id'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_company'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="company_name" id="company_name" placeholder="<?php echo $this->lang->line('label_company'); ?>" value="<?php if(!empty($result['company_name'])) echo $result['company_name']; else echo set_value('company_name'); ?>" maxlength="128" >
                                                        <?php echo form_error('company_name'); ?>
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
                                                        * <?php echo $this->lang->line('label_email'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="email" class="form-control m-input" name="email" id="email" placeholder="<?php echo $this->lang->line('label_email'); ?>" value="<?php if(!empty($result['email'])) echo $result['email']; else echo set_value('email'); ?>" maxlength="128">
                                                        <?php echo form_error('email'); ?>
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
                                                        <?php echo $this->lang->line('label_address_1'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="address_line_1" id="address_line_1" placeholder="<?php echo $this->lang->line('label_address_1'); ?>" value="<?php if(!empty($result['address_line1'])) echo $result['address_line1']; else echo set_value('address_line_1'); ?>" maxlength="256">
                                                        <?php echo form_error('address_line_1'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_address_2'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="address_line_2" id="address_line_2" placeholder="<?php echo $this->lang->line('label_address_2'); ?>" value="<?php if(!empty($result['address_line2'])) echo $result['address_line2']; else  echo set_value('address_line_2'); ?>" maxlength="256">
                                                        <?php echo form_error('address_line_2'); ?>
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_address'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="address_line_3" id="route" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php if(!empty($result['address_line3'])) echo $result['address_line3']; else  echo set_value('address_line_3'); ?>" maxlength="256">
                                                        <?php echo form_error('address_line_3'); ?>
                                                    </div>
                                                </div> -->
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right" id="label_borough">
                                                        * <?php echo $this->lang->line('label_borough'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="borough" id="sublocality_level_1" placeholder="<?php echo $this->lang->line('label_borough'); ?>" value="<?php if(!empty($result['borough'])) echo $result['borough']; else  echo set_value('borough'); ?>" maxlength="64">
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
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right" id="label_state">
                                                        * <?php echo $this->lang->line('label_state'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="state" id="administrative_area_level_1" placeholder="<?php echo $this->lang->line('label_state'); ?>" value="<?php if(!empty($result['state'])) echo $result['state']; else  echo set_value('state'); ?>" maxlength="64">
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
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right" id="label_zipcode">
                                                        * <?php echo $this->lang->line('label_zipcode'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="zipcode" id="postal_code" placeholder="<?php echo $this->lang->line('label_zipcode'); ?>" value="<?php if(!empty($result['zipcode'])) echo $result['zipcode']; else echo set_value('zipcode'); ?>" maxlength="32">
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
                                                        <?php echo $this->lang->line('label_telephone_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="telephone_number" id="telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?>" value="<?php if(!empty($result['telephone_number'])) echo $result['telephone_number']; else  echo set_value('telephone_number'); ?>" maxlength="16">
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
                                                        <?php echo $this->lang->line('label_fax_number'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="fax_number" id="fax_number" placeholder="<?php echo $this->lang->line('label_fax_number'); ?>" value="<?php if(!empty($result['fax_number'])) echo $result['fax_number']; else echo set_value('fax_number'); ?>" maxlength="16">
                                                        <?php echo form_error('fax_number'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
                                                        <?php echo $this->lang->line('label_shipto_cedula'); ?>:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="shipto_cedula" id="shipto_cedula" placeholder="<?php echo $this->lang->line('label_shipto_cedula'); ?>" value="<?php if(!empty($result['shipto_cedula'])) echo $result['shipto_cedula']; else echo set_value('shipto_cedula'); ?>" maxlength="20" required="">
                                                        <?php echo form_error('shipto_cedula'); ?>
                                                    </div>
                                                </div> 
                                                <div class="form-group m-form__group row">
                                                    <div class="col-lg-8 ml-lg-auto m-form__actions">
                                                        <button type="submit" class="btn btn-success" value="update">
                                                            <?php echo $this->lang->line('label_submit'); ?>
                                                        </button>
                                                        <a class="btn btn-secondary" href="<?php echo base_url('company/pickup/add/').$user_result['id']; ?>">
                                                            <?php echo $this->lang->line('label_back'); ?>
                                                        </a>
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
            </div>
            <!-- end:: Body -->
            <!-- begin::Footer -->
                <?php   $this->load->view('company/inc/footer');  ?>
            <!-- end::Footer -->
        </div>
        <!-- end:: Page -->
        
        <!--begin::Base Scripts -->
            <?php $this->load->view('company/inc/scripts'); ?>
        <!--end::Base Scripts -->
        <!--begin::Page Snippets -->
        <script type="text/javascript">

            jQuery(document).ready(function() {
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
            $("#m_form_1").validate({
                rules: {
                    company_name: {
                        maxlength: 128,
                    },
                    fname: {
                        required: !0
                    },
                    lname: {
                        required: !0
                    },
                    email: {
                        required: !0,
                        email: true,
                    },
                    address_line_1: {
                        maxlength: 255
                    }, 
                    address_line_2: {
                        maxlength: 255
                    },
                    address_line_3: {
                        maxlength: 255
                    },  
                    country: {
                        required: !0
                    }, 
                    address: {
                        required: !0,
                    },
                    borough: {
                        required: function(element) {
                            return $("#cellphone_number").is(':blank');
                        },
                    },
                    city: {
                        required: !0,
                    },
                    state: {
                        required: !0,
                    },
                    zipcode: {
                       required: function(element) {
                            return $("#cellphone_number").is(':blank');
                        },
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
                    fax_number: {
                        minlength: 8,
                        maxlength: 14
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

                    if($("#country").val() == "Dominican Republic"){
                        $("#postal_code").attr("readonly","readonly");
                        $("#sublocality_level_1").attr("placeholder", "<?php echo $this->lang->line('label_sector'); ?>");
                        $("#administrative_area_level_1").attr("placeholder", "<?php echo $this->lang->line('label_province'); ?>");
                        $("#label_borough").html("<?php echo $this->lang->line('label_sector'); ?>:");
                        $("#label_state").html("* <?php echo $this->lang->line('label_province'); ?>:");
                        $("#label_zipcode").html("<?php echo $this->lang->line('label_zipcode'); ?>:");
                    } else {
                        $("#postal_code").removeAttr("readonly");
                        $("#sublocality_level_1").attr("placeholder", "<?php echo $this->lang->line('label_borough'); ?>");
                        $("#administrative_area_level_1").attr("placeholder", "<?php echo $this->lang->line('label_state'); ?>");
                        $("#label_borough").html("* <?php echo $this->lang->line('label_borough'); ?>:");
                        $("#label_state").html("* <?php echo $this->lang->line('label_state'); ?>:");
                        $("#label_zipcode").html("* <?php echo $this->lang->line('label_zipcode'); ?>:");
                    }
                });
            });
        </script>
        <!--end::Page Snippets -->
    </body>
    <!-- end::Body -->
</html>
