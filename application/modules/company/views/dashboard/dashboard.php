<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            <?php echo $this->site_name; ?> | <?php echo $this->lang->line('menu_dashboard'); ?>
        </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->load->view('company/inc/stylesheet'); ?>
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
                                <h3 class="m-subheader__title ">
                                    <?php echo $this->lang->line('menu_dashboard'); ?>
                                </h3>
                            </div>
                            <!-- <div>
                                <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
                                    <span class="m-subheader__daterange-label">
                                        <span class="m-subheader__daterange-title"></span>
                                        <span class="m-subheader__daterange-date m--font-brand"></span>
                                    </span>
                                    <a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                        <i class="la la-angle-down"></i>
                                    </a>
                                </span>
                            </div> -->
                        </div>
                    </div>

                    <!-- END: Subheader -->
                    <div class="m-content">
                        <!--Begin::Main Portlet-->
                        <div class="m-portlet ">
                            <div class="m-portlet__body  m-portlet__body--no-padding">
                                <div class="row m-row--no-padding m-row--col-separator-xl">
                                    <!--begin::Total customer-->
                                    <div class="col-md-12 col-lg-6 col-xl-3">
                                        <div class="m-widget24">                     
                                            <div class="m-widget24__item">
                                                <h4 class="m-widget24__title">
                                                    <?php echo $this->lang->line('menu_customer'); ?>
                                                </h4><br>
                                                <span class="m-widget24__stats m--font-brand ">
                                                    <?php echo $this->common->record_count('tbl_customer'); ?>
                                                </span>
                                            </div>                    
                                        </div>
                                    </div>
                                    <!--end::Total customer-->
                                    <!--begin::Total Inventory-->
                                    <div class="col-md-12 col-lg-6 col-xl-3">
                                        <div class="m-widget24">                     
                                            <div class="m-widget24__item">
                                                <h4 class="m-widget24__title">
                                                    <?php echo $this->lang->line('menu_inventory'); ?>
                                                </h4><br>
                                                <span class="m-widget24__stats m--font-brand ">
                                                    <?php echo $this->common->record_count('tbl_inventory'); ?>
                                                </span>
                                            </div>                    
                                        </div>
                                    </div>
                                    <!--end::Total Inventory-->
                                    <!--begin::Total Inventory-->
                                    <div class="col-md-12 col-lg-6 col-xl-3">
                                        <div class="m-widget24">                     
                                            <div class="m-widget24__item">
                                                <h4 class="m-widget24__title">
                                                    <?php echo $this->lang->line('menu_user_maintenance'); ?>
                                                </h4><br>
                                                <span class="m-widget24__stats m--font-brand ">
                                                    <?php echo $this->common->record_count('tbl_user'); ?>
                                                </span>
                                            </div>                    
                                        </div>
                                    </div>
                                    <!--end::Total Inventory-->
                                </div>
                            </div>
                        </div>
                        <!--End::Main Portlet-->
                    </div>
                </div>
            </div>
            <!-- end:: Body -->
            <!-- begin::Footer -->
                <?php   $this->load->view('company/inc/footer');  ?>
            <!-- end::Footer -->
        </div>
        <!-- end:: Page -->
        <!-- begin::Quick Sidebar -->
            <?php   //$this->load->view('company/inc/right-bar');  ?>
        <!-- end::Quick Sidebar -->
        
        <!-- begin::Quick Nav -->
            <?php   //$this->load->view('company/inc/quick-nav');  ?>
        <!-- begin::Quick Nav -->
        <!--begin::Base Scripts -->
            <?php $this->load->view('company/inc/scripts'); ?>
        <!--end::Base Scripts -->
        <!--begin::Page Snippets -->
        <script src="<?php echo base_url();?>assets/app/js/dashboard.js" type="text/javascript"></script>
        <!--end::Page Snippets -->
    </body>
    <!-- end::Body -->
</html>
