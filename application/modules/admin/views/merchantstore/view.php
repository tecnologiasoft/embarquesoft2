<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            <?php echo $this->site_name; ?> | View Merchant Store
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
                    <?php  $data['pagename'] = "merchantstore"; $data['subpagename'] = ""; $this->load->view('admin/inc/left-menu',$data);  ?>
                <!-- END: Left Aside -->
                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    Merchant Store Details
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
                                        <a href="<?php echo site_url();?>admin/merchantstore/listing" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Merchant Store List
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="javascript:;" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Merchant Store Details
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
                                                        <img src="<?php if(isset($result['store_logo']) && $result['store_logo']!='') echo $result['store_logo'];?>" alt=""/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-card-profile__details">
                                                <span class="m-card-profile__name">
                                                    <?php echo $result['store_name'];?>
                                                </span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>            
                            <div class="col-xl-7 col-lg-6">
                                <br>
                                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-tools">
                                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                                <li class="nav-item m-tabs__item">
                                                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1 " role="tab">
                                                        <i class="flaticon-share m--hide"></i>
                                                        Store Details
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="m_user_profile_tab_1">
                                            <div class="m-portlet__body">
                                                <div class="m-widget1 m-widget1--paddingless">
                                                    <div class="m-widget1__item">
                                                        <div class="row m-row--no-padding align-items-center">
                                                            <div class="col">
                                                                <h3 class="m-widget1__title">
                                                                    Merchant Name
                                                                </h3>
                                                            </div>
                                                            <div class="col m--align-right">
                                                                <span class="m-widget1__number m--font">
                                                                    <small><?php echo $result['merchant_name']; ?></small>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-widget1__item">
                                                        <div class="row m-row--no-padding align-items-center">
                                                            <div class="col">
                                                                <h3 class="m-widget1__title">
                                                                    Category
                                                                </h3>
                                                            </div>
                                                            <div class="col m--align-right">
                                                                <span class="m-widget1__number m--font">
                                                                    <small><?php echo $result['category']; ?></small>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-widget1__item">
                                                        <div class="row m-row--no-padding align-items-center">
                                                            <div class="col">
                                                                <h3 class="m-widget1__title">
                                                                    Category Type
                                                                </h3>
                                                            </div>
                                                            <div class="col m--align-right">
                                                                <span class="m-widget1__number m--font">
                                                                    <small><?php echo implode(',', array_column($result['subcategory_list'], 'subcategory')); ?></small>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-widget1__item">
                                                        <div class="row m-row--no-padding align-items-center">
                                                            <div class="col">
                                                                <h3 class="m-widget1__title">
                                                                    Contact Name
                                                                </h3>
                                                            </div>
                                                            <div class="col m--align-right">
                                                                <span class="m-widget1__number m--font">
                                                                    <small><?php echo $result['contact_name']; ?></small>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-widget1__item">
                                                        <div class="row m-row--no-padding align-items-center">
                                                            <div class="col">
                                                                <h3 class="m-widget1__title">
                                                                    Contact Phone
                                                                </h3>
                                                            </div>
                                                            <div class="col m--align-right">
                                                                <span class="m-widget1__number m--font">
                                                                    <small><?php echo $result['contact_phone']; ?></small>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-widget1__item">
                                                        <div class="row m-row--no-padding align-items-center">
                                                            <div class="col">
                                                                <h3 class="m-widget1__title">
                                                                    Address
                                                                </h3>
                                                            </div>
                                                            <div class="col m--align-right">
                                                                <span class="m-widget1__number m--font">
                                                                    <small><?php echo $result['address']; ?></small>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-widget1__item">
                                                        <div class="row m-row--no-padding align-items-center">
                                                            <div class="col">
                                                                <h3 class="m-widget1__title">
                                                                    Website
                                                                </h3>
                                                            </div>
                                                            <div class="col m--align-right">
                                                                <span class="m-widget1__number m--font">
                                                                    <small><?php echo $result['website']; ?></small>
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
                                                                    <?php if($result['status']== 'Verified') echo "m-badge--success";
                                                                    else if($result['status']== 'Unverified') echo "m-badge--danger"; ?>
                                                                    + ' m-badge--wide"><?php echo $result['status']; ?></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="m-widget1__item">
                                                        <div class="row m-row--no-padding align-items-center">
                                                            <div class="col">
                                                                <h3 class="m-widget1__title">
                                                                    Logo
                                                                </h3>
                                                            </div>
                                                            <div class="col m--align-right">
                                                                <span class="m-widget1__number m--font">
                                                                    <img src="<?php if(isset($result['store_logo']) && $result['store_logo']!='') echo $result['store_logo']; ?>" width="100" height="100" alt=""/>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="m-widget1__item">
                                                        <div class="row m-row--no-padding align-items-center">
                                                            <div class="col">
                                                                <h3 class="m-widget1__title">
                                                                    Banner
                                                                </h3>
                                                            </div>
                                                            <div class="col m--align-right">
                                                                <span class="m-widget1__number m--font">
                                                                    <img src="<?php if(isset($result['store_banner']) && $result['store_banner']!='') echo $result['store_banner']; ?>" width="100" height="100" alt=""/>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="m-widget1__item">
                                                        <div class="row m-row--no-padding align-items-center">
                                                            <div class="col">
                                                                <h3 class="m-widget1__title">
                                                                    Date/Time
                                                                </h3>
                                                            </div>
                                                            <div class="col m--align-right">
                                                                <span class="m-widget1__number m--font">
                                                                    <small><?php echo $result['insertdate']; ?></small>
                                                                </span>
                                                            </div>
                                                        </div>
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
        
        <!-- begin::Quick Nav -->
        <?php   //$this->load->view('admin/inc/quick-nav');  ?>
        <!-- begin::Quick Nav -->
        <!--begin::Base Scripts -->
            <?php $this->load->view('admin/inc/scripts'); ?>
        <!--end::Base Scripts -->
        <script type="text/javascript">
            jQuery(document).ready(function() {
                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                  var target = $(e.target).attr("href") // activated tab
                  //alert(target);
                  if(target=="#m_user_profile_tab_3")
                  { 
                    m_datatables.reload();
                  }
                });
            });
        </script>
    </body>
    <!-- end::Body -->
</html>
