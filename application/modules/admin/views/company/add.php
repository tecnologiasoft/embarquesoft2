<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            <?php echo $this->site_name; ?> | Add New Company 
        </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->load->view('admin/inc/stylesheet'); ?>
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
            <?php   $this->load->view('admin/inc/header');  ?>
            <!-- END: Header -->

            <!-- begin::Body -->
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
                <!-- BEGIN: Left Aside -->
                    <?php  $data['pagename'] = "company"; $data['subpagename'] = ""; $this->load->view('admin/inc/left-menu',$data);  ?>
                <!-- END: Left Aside -->
                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    Add New Company
                                </h3>
                                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                                    <li class="m-nav__item m-nav__item--home">
                                        <a href="<?php echo site_url();?>admin/dashboard" class="m-nav__link m-nav__link--icon">
                                            <i class="m-nav__link-icon la la-home"></i>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?php echo site_url();?>admin/company/listing" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Company List
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="javascript:;" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Add New Company
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
                            echo form_open('admin/company/save/',$form_data); 
                        ?>  
                            <div class="row">
                                <div class="col-xl-6 offset-xl-2">
                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__body">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        Company Details
                                                    </h3>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * Name:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="name" id="name" placeholder="Enter company name" value="<?php echo set_value('name'); ?>" >
                                                        <?php echo form_error('name'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * Email:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="email" class="form-control m-input" name="email" id="email" placeholder="Enter email" value="<?php echo set_value('email'); ?>" >
                                                        <?php echo form_error('email'); ?>
                                                        <span class="m-form__help">
                                                            We'll never share your email with anyone else
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * Password:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="password" name="password" class="form-control m-input" name="password" id="password" placeholder="Enter password" value="<?php echo set_value('password'); ?>">
                                                        <?php echo form_error('password'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * Website:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="website" id="website" placeholder="Enter website" value="<?php echo set_value('website'); ?>" >
                                                        <?php echo form_error('website'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * Logo:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="file" class="form-control m-input" name="logo" id="logo" accept="image/*" value="<?php echo set_value('logo'); ?>"  data-show-preview="false" data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {file} for upload...">
                                                        <?php echo form_error('logo'); echo $error_msg1; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                            <div class="m-form__section">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        Company Address
                                                        <i data-toggle="m-tooltip" data-width="auto" class="m-form__heading-help-icon flaticon-info" title="Some help text goes here"></i>
                                                    </h3>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * Address:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="address" id="address" placeholder="Enter address" value="<?php echo set_value('address'); ?>" >
                                                        <?php echo form_error('address'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * City:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="city" id="locality" placeholder="Enter city" value="<?php echo set_value('city'); ?>" >
                                                        <?php echo form_error('city'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * State:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="state" id="administrative_area_level_1" placeholder="Enter state" value="<?php echo set_value('state'); ?>" >
                                                        <?php echo form_error('state'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * Zipcode:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="zipcode" id="postal_code" placeholder="Enter zipcode" value="<?php echo set_value('zipcode'); ?>" >
                                                        <?php echo form_error('zipcode'); ?>
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
                                                        Contact Information
                                                    </h3>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * Telephone Country Code:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="tele_country_code" id="tele_country_code" placeholder="Enter country code" value="<?php echo set_value('tele_country_code'); ?>" >
                                                        <?php echo form_error('tele_country_code'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * Telephone Number:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="telephone_number" id="telephone_number" placeholder="Enter company telephone number" value="<?php echo set_value('telephone_number'); ?>" >
                                                        <?php echo form_error('telephone_number'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * Fax Number:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="fax_number" id="fax_number" placeholder="Enter fax number" value="<?php echo set_value('fax_number'); ?>" >
                                                        <?php echo form_error('fax_number'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                            <div class="m-form__section">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        Other Details
                                                        <i data-toggle="m-tooltip" data-width="auto" class="m-form__heading-help-icon flaticon-info" title="Some help text goes here"></i>
                                                    </h3>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * Exchange Rate:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="exchange_rate" id="exchange_rate" placeholder="Enter exchange rate" value="<?php echo set_value('exchange_rate'); ?>" >
                                                        <?php echo form_error('exchange_rate'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * Company Call:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input name="company_call" value="Yes" type="radio" checked="">
                                                                Yes
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input name="company_call" value="No" type="radio" >
                                                                No
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <?php echo form_error('company_call'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * Call Out:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="call_out" id="call_out" placeholder="Enter call out" value="<?php echo set_value('call_out'); ?>" >
                                                        <?php echo form_error('call_out'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * Company Void:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="company_void" id="company_void" placeholder="Enter company void" value="<?php echo set_value('company_void'); ?>" >
                                                        <?php echo form_error('company_void'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * Invoice Number:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="invoice_number" id="invoice_number" placeholder="Enter invoice number" value="<?php echo set_value('invoice_number'); ?>" >
                                                        <?php echo form_error('invoice_number'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * Receipt Number:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="receipt_number" id="receipt_number" placeholder="Enter receipt number" value="<?php echo set_value('receipt_number'); ?>" >
                                                        <?php echo form_error('receipt_number'); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * Barcode Number:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="barcode_number" id="barcode_number" placeholder="Enter barcode number" value="<?php echo set_value('barcode_number'); ?>" >
                                                        <?php echo form_error('barcode_number'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        * Zone Validation:
                                                    </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" class="form-control m-input" name="zone_validation" id="zone_validation" placeholder="Enter zone validation" value="<?php echo set_value('zone_validation'); ?>" >
                                                        <?php echo form_error('zone_validation'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
                            </div>

                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
            <!-- end:: Body -->
            <!-- begin::Footer -->
                <?php   $this->load->view('admin/inc/footer');  ?>
            <!-- end::Footer -->
        </div>
        <!-- end:: Page -->
        <!-- begin::Quick Sidebar -->
            <?php   $this->load->view('admin/inc/right-bar');  ?>
        <!-- end::Quick Sidebar -->
        
        <!-- begin::Quick Nav -->
        <?php   //$this->load->view('admin/inc/quick-nav');  ?>
        <!-- begin::Quick Nav -->
        <!--begin::Base Scripts -->
            <?php $this->load->view('admin/inc/scripts'); ?>
        <!--end::Base Scripts -->
        <!--begin::Page Snippets -->
        <script type="text/javascript">

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
                    password: {
                        required: !0,
                    },
                    website: {
                        required: !0,
                        url: !0,
                    },
                    logo: {
                        required: !0,
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
                    tele_country_code: {
                        required: !0,
                    },
                    telephone_number: {
                        required: !0,
                        digits: !0,
                        minlength: 8,
                        maxlength: 14
                    },
                    fax_number: {
                        required: !0,
                    },
                    exchange_rate: {
                        required: !0,
                    },
                    company_call: {
                        required: !0,
                    },
                    call_out: {
                        required: !0,
                    },
                    company_void: {
                        required: !0,
                    },
                    invoice_number: {
                        required: !0,
                        digits: !0,
                    },
                    receipt_number: {
                        required: !0,
                        digits: !0,
                    },
                    barcode_number: {
                        required: !0,
                    },
                    zone_validation: {
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

        <!-- script file for File input -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>

        <!-- google maps api -->
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=<?php echo PLACE_API_KEY;?>&libraries=places"></script>
        <!-- initialization of file upload and date picker -->
        <script type="text/javascript">
        $(document).ready(function()
        {
            var componentForm = {
                locality: 'long_name', // city
                administrative_area_level_1: 'long_name', // State
                postal_code: 'short_name' // Zip code
              };

            $("#logo").fileinput({
                'showUpload':false, 
                'previewFileType': "image",
                'browseClass': "btn btn-success",
                'browseLabel': "Pick Image",
                'browseIcon': "<i class=\"la la-file-image-o \"></i> ",
                'removeClass': "btn btn-danger",
                'removeLabel': "Delete",
                'removeIcon': "<i class=\"la la-trash \"></i> ",
            });

 
            /*geocomplete*/
            $("#address").geocomplete().bind("geocode:result", function(event, result){
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

                /*$("#latitude").val(result.geometry.location.lat().toFixed(8));
                $("#longitude").val(result.geometry.location.lng().toFixed(8));*/
            });
        });
        </script>
        <!--end::Page Snippets -->
    </body>
    <!-- end::Body -->
</html>
