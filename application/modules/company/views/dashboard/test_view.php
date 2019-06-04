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