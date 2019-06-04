<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            <?php echo $this->site_name; ?> | Edit Merchant
        </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->load->view('admin/inc/stylesheet'); ?>

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
                    <?php  $data['pagename'] = "merchant"; $data['subpagename'] = ""; $this->load->view('admin/inc/left-menu',$data);  ?>
                <!-- END: Left Aside -->
                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    Merchant Details
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
                                        <a href="<?php echo site_url();?>admin/merchant/listing" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Merchant List
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="javascript:;" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Merchant Details
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
                            echo form_open('admin/merchant/edit/',$form_data); 
                        ?>
                        <input type="hidden" name="merchant_id" value="<?php if(isset($result['id'])) echo base64_encode($result['id']); else echo set_value('id') ?>">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <!--begin::Portlet-->
                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__head">
                                            <div class="m-portlet__head-caption">
                                                <div class="m-portlet__head-title">
                                                    <span class="m-portlet__head-icon m--hide">
                                                        <i class="la la-gear"></i>
                                                    </span>
                                                    <h3 class="m-portlet__head-text">
                                                        Edit Merchant Personal Details
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-portlet__body">
                                            <div class="m-form__content">
                                                <div class="m-alert m-alert--icon alert alert-danger m--hide" role="alert" id="m_form_1_msg">
                                                    <div class="m-alert__icon">
                                                        <i class="la la-warning"></i>
                                                    </div>
                                                    <div class="m-alert__text">
                                                        Oh snap! Change a few things up and try submitting again.
                                                    </div>
                                                    <div class="m-alert__close">
                                                        <button type="button" class="close" data-close="alert" aria-label="Close"></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-card-profile">
                                                <div class="m-card-profile__pic">
                                                    <div class="m-card-profile__pic-wrapper">
                                                        <img src="<?php if(isset($result['profile_image']) && $result['profile_image']!='') echo $result['merchant_image']; else echo base_url().MERCHANT_IMAGE.'default-user.png' ?>" alt=""/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group">
                                                <label for="fname">
                                                    First Name *
                                                </label>
                                                <input type="text" class="form-control m-input" name="fname" id="fname" placeholder="Enter your first name" value="<?php if(isset($result['fname'])) echo $result['fname']; else echo set_value('fname'); ?>" >
                                                <?php echo form_error('fname'); ?>
                                            </div>
                                            <div class="form-group m-form__group">
                                                <label for="lname">
                                                    Last Name *
                                                </label>
                                                <input type="text" class="form-control m-input" name="lname" id="lname" placeholder="Enter your last name" value="<?php if(isset($result['lname'])) echo $result['lname']; else echo set_value('lname'); ?>" >
                                                <?php echo form_error('lname'); ?>
                                            </div>
                                            <div class="form-group m-form__group">
                                                <label for="email">
                                                    Email *
                                                </label>
                                                <input type="email" class="form-control m-input" name="email" id="email" placeholder="Enter your email" value="<?php if(isset($result['email'])) echo $result['email']; else echo set_value('email'); ?>" >
                                                <?php echo form_error('email'); ?>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group m-form__group">
                                                        <label for="password">
                                                            Password
                                                        </label>
                                                        <input type="password" class="form-control m-input" name="password" id="password" placeholder="Enter your password" autocomplete="new-password">
                                                        <?php echo form_error('password'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group m-form__group">
                                                        <label for="confirmpassword">
                                                            Confirm Password
                                                        </label>
                                                        <input type="password" class="form-control m-input" name="confirmpassword" id="confirmpassword" placeholder="Enter your confirm password">
                                                        <?php echo form_error('confirmpassword'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group m-form__group">
                                                        <label for="country_code">
                                                            Country Code *
                                                        </label>
                                                        <input type="text" class="form-control m-input" name="country_code" id="country_code" placeholder="+00" value="<?php if(isset($result['country_code'])) echo $result['country_code']; else echo set_value('country_code'); ?>"  >
                                                        <?php echo form_error('country_code'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group m-form__group">
                                                        <label for="phone">
                                                            Phone Number *
                                                        </label>
                                                        <input type="text" class="form-control m-input" name="phone" id="phone" placeholder="Enter your phone number" value="<?php if(isset($result['phone'])) echo $result['phone']; else echo set_value('phone'); ?>" />
                                                        <?php echo form_error('phone'); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group">
                                                <label for="profile_image">
                                                    Profile Image *
                                                </label>
                                                <input type="file" class="form-control m-input" name="profile_image" id="profile_image" accept="image/*" value="<?php echo set_value('profile_image'); ?>"  data-show-preview="false" data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {file} for upload...">
                                                <?php echo form_error('profile_image'); echo $error_msg; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Portlet-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="m-portlet__foot m-portlet__foot--fit">
                                        <div class="m-form__actions m-form__actions">
                                            <div class="row">
                                                <div class="col-lg-7 ml-lg-auto m-form__actions">
                                                    <button type="submit" class="btn btn-success" value="update">
                                                        Save Changes
                                                    </button>
                                                    <a onclick="history.go(-1)" class="btn btn-secondary">Back</a>
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
                    email: {
                        required: !0,
                        email: !0
                    },
                    fname: {
                        required: !0
                    },
                    lname: {
                        required: !0
                    },
                    password: {
                        required: !1,
                        minlength: 3,
                        pwcheckallowedchars: true
                    },
                    confirmpassword: {
                        required: !1,
                        minlength: 3,
                        pwcheckallowedchars: true,
                        equalTo: "#password"
                    },
                    country_code: {
                        required: !0,
                        minlength: 2,
                        maxlength: 5
                    },
                    phone: {
                        required: !0,
                        digits: !0,
                        minlength: 8,
                        maxlength: 14
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

        <!-- initialization of file upload and date picker -->
        <script type="text/javascript">
        $(document).ready(function()
        {
           // with plugin options
            $("#profile_image").fileinput({
                'showUpload':false, 
                'previewFileType': "image",
                'browseClass': "btn btn-success",
                'browseLabel': "Pick Image",
                'browseIcon': "<i class=\"la la-file-image-o \"></i> ",
                'removeClass': "btn btn-danger",
                'removeLabel': "Delete",
                'removeIcon': "<i class=\"la la-trash \"></i> ",
            });
        });
        </script>
        <!--end::Page Snippets -->
    </body>
    <!-- end::Body -->
</html>
