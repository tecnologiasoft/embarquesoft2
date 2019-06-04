<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            <?php echo $this->site_name; ?> | View User
        </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->load->view('admin/inc/stylesheet'); ?>
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
                    <?php  $data['pagename'] = "user"; $data['subpagename'] = ""; $this->load->view('admin/inc/left-menu',$data);  ?>
                <!-- END: Left Aside -->
                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    User Details
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
                                        <a href="<?php echo site_url();?>admin/user/listing" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                User List
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="javascript:;" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                User Details
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
                        <div class="row">
                            <div class="col-xl-1 col-lg-1"></div>
                            <div class="col-xl-3 col-lg-4">
                                <br>
                                <div class="m-portlet m-portlet--full-height  ">
                                    <div class="m-portlet__body">
                                        <div class="m-card-profile">
                                            
                                            <div class="m-card-profile">
                                                <div class="m-card-profile__pic">
                                                    <div class="m-card-profile__pic-wrapper">
                                                        <img src="<?php if(isset($result['profile_image']) && $result['profile_image']!='') echo $result['user_image']; else echo base_url().USER_IMAGE.'default-user.png' ?>" alt=""/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="m-card-profile__details">
                                                <span class="m-card-profile__name">
                                                    <?php echo $result['fname']." ".$result['lname'];?>
                                                </span>
                                                <a href="" class="m-card-profile__email m-link">
                                                    <?php echo $result['email'];?>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="m-portlet__body-separator"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6">
                            <br>
                                <div class="m-portlet m-portlet--full-height  ">
                                    <div class="m-portlet__body">
                                        <div class="m-widget1 m-widget1--paddingless">
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">
                                                            Phone
                                                        </h3>
                                                    </div>
                                                    <div class="col m--align-right">
                                                        <span class="m-widget1__number m--font">
                                                            <small><?php echo $result['country_code']." ".$result['phone']; ?></small>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">
                                                            Gender
                                                        </h3>
                                                    </div>
                                                    <div class="col m--align-right">
                                                        <span class="m-widget1__number m--font" >
                                                            <small><?php echo $result['gender']; ?></small>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">
                                                            Birthdate
                                                        </h3>
                                                    </div>
                                                    <div class="col m--align-right">
                                                        <span class="m-widget1__number m--font">
                                                            <small><?php echo $result['dob']; ?></small>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">
                                                            Status
                                                        </h3>
                                                    </div>
                                                    <div class="col m--align-right">
                                                        <span class="m-widget1__number m--font">
                                                            <span class="m-badge ' +
                                                            <?php if($result['status']=='Active') echo "m-badge--success";
                                                            else if($result['status']=='Inactive') echo "m-badge--danger"; ?>
                                                            + ' m-badge--wide"><?php echo $result['status'];?></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">
                                                            Login
                                                        </h3>
                                                    </div>
                                                    <div class="col m--align-right">
                                                        <span class="m-badge '+
                                                            <?php if($result['login']=="Online") echo "m-badge--success";
                                                            else if($result['login']=="Offline") echo "m-badge--danger";  ?>
                                                            + ' m-badge--dot"></span>&nbsp;<span class="m--font-bold ' + <?php if($result['login']=="Online") echo "m--font-success";
                                                            else if($result['login']=="Offline") echo "m--font-danger";  ?>  + '"><?php echo $result['login']; ?></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>    
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
        
        <!--begin::Base Scripts -->
        <?php $this->load->view('admin/inc/scripts'); ?>
        <!--end::Base Scripts -->
    </body>
    <!-- end::Body -->
</html>
