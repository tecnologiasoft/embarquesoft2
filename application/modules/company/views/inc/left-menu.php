<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item  m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div 
    id="m_ver_menu" 
    class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
    data-menu-vertical="true"
    data-menu-scrollable="false" data-menu-dropdown-timeout="500"  
    >
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
        <li class="m-menu__item  <?php echo $this->common->get_menu('dashboard'); ?>" aria-haspopup="true" >
            <a  href="<?php echo site_url();?>company/dashboard" class="m-menu__link ">
                <i class="m-menu__link-icon flaticon-line-graph"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">
                            <?php echo $this->lang->line('menu_dashboard'); ?>
                        </span> 
                    </span>
                </span>
            </a>
        </li>
        <li class="m-menu__item  <?php echo $this->common->get_menu('customer'); ?>" aria-haspopup="true" >
            <a  href="<?php echo site_url();?>company/customer" class="m-menu__link ">
                <i class="m-menu__link-icon la la-user"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">
                            <?php echo $this->lang->line('menu_customer'); ?>
                        </span>
                        <!-- <span class="m-menu__link-badge">
                            <span class="m-badge m-badge--danger">
                                <?php echo $this->common->record_count('tbl_customer'); ?>
                            </span>
                        </span> -->
                    </span>
                </span>
            </a>
        </li>
        <li class="m-menu__item  <?php echo $this->common->get_menu('invoices'); ?>" aria-haspopup="true" >
            <a  href="<?php echo site_url();?>company/invoices" class="m-menu__link ">
                <i class="m-menu__link-icon la la-list"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">
                            <?php echo $this->lang->line('menu_invoices'); ?>
                        </span>
                        <!-- <span class="m-menu__link-badge">
                            <span class="m-badge m-badge--danger">
                                <?php echo $this->common->record_count('tbl_customer'); ?>
                            </span>
                        </span> -->
                    </span>
                </span>
            </a>
        </li>
        <li class="m-menu__item  <?php echo $this->common->get_menu('pickup'); ?>" aria-haspopup="true" >
            <a  href="<?php echo site_url();?>company/pickup" class="m-menu__link ">
                <i class="m-menu__link-icon la la-map-signs"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">
                            <?php echo $this->lang->line('menu_pickups'); ?>
                        </span>
                        <!-- <span class="m-menu__link-badge">
                            <span class="m-badge m-badge--danger">
                                <?php echo $this->common->record_count('tbl_customer'); ?>
                            </span>
                        </span> -->
                    </span>
                </span>
            </a>
        </li>
        <!-- <li class="m-menu__item  <?php echo $this->common->get_menu('warehouse'); ?>" aria-haspopup="true" >
            <a  href="<?php echo site_url();?>company/customer" class="m-menu__link ">
                <i class="m-menu__link-icon la la-building-o"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">
                            <?php echo $this->lang->line('menu_warehouse'); ?>
                        </span>
                        <span class="m-menu__link-badge">
                            <span class="m-badge m-badge--danger">
                                <?php echo $this->common->record_count('tbl_customer'); ?>
                            </span>
                        </span> 
                    </span>
                </span>
            </a>
        </li> -->
        <li class="m-menu__item  <?php echo $this->common->get_menu('inventory'); ?>" aria-haspopup="true" >
            <a  href="<?php echo site_url();?>company/inventory" class="m-menu__link ">
                <i class="m-menu__link-icon la la-book"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">
                            <?php echo $this->lang->line('menu_inventory'); ?>
                        </span>
                        <!-- <span class="m-menu__link-badge">
                            <span class="m-badge m-badge--danger">
                                <?php echo $this->common->record_count('tbl_inventory'); ?>
                            </span>
                        </span> -->
                    </span>
                </span>
            </a>
        </li>
        <li class="m-menu__item  <?php echo $this->common->get_menu('payments'); ?>" aria-haspopup="true" >
            <a  href="<?php echo site_url();?>company/payments" class="m-menu__link ">
                <i class="m-menu__link-icon la la-dollar"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">
                            <?php echo $this->lang->line('menu_payments'); ?>
                        </span>
                        <!-- <span class="m-menu__link-badge">
                            <span class="m-badge m-badge--danger">
                                <?php echo $this->common->record_count('tbl_customer'); ?>
                            </span>
                        </span> -->
                    </span>
                </span>
            </a>
        </li>
        <li class="m-menu__item  <?php echo $this->common->get_menu('employee'); ?>" aria-haspopup="true" >
            <a  href="<?php echo site_url();?>company/employee" class="m-menu__link ">
                <i class="m-menu__link-icon la la-users"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">
                            <?php echo $this->lang->line('menu_employee'); ?>
                        </span>
                        <!-- <span class="m-menu__link-badge">
                            <span class="m-badge m-badge--danger">
                                <?php echo $this->common->record_count('tbl_customer'); ?>
                            </span>
                        </span> -->
                    </span>
                </span>
            </a>
        </li>
        <li class="m-menu__item  <?php echo $this->common->get_menu('autocall'); ?>" aria-haspopup="true" >
            <a  href="<?php echo site_url();?>company/autocall" class="m-menu__link ">
                <i class="m-menu__link-icon la la-phone"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">
                            <?php echo $this->lang->line('menu_autocall'); ?>
                        </span>
                        <!-- <span class="m-menu__link-badge">
                            <span class="m-badge m-badge--danger">
                                <?php echo $this->common->record_count('tbl_customer'); ?>
                            </span>
                        </span> -->
                    </span>
                </span>
            </a>
        </li>
        <?php 
            $submenu = "";
            if(empty($submenu)) $submenu = $this->common->get_menu('driver');
            if(empty($submenu)) $submenu = $this->common->get_menu('claims');
        ?>
        <li class="m-menu__item m-menu__item--submenu <?php echo (!empty($submenu)) ? 'm-menu__item--open m-menu__item--expanded' : ''; ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon la la-truck"></i>
                <span class="m-menu__link-text">
                    <?php echo $this->lang->line('menu_drivers'); ?>
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            
            <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item <?php echo $this->common->get_menu('driver'); ?>" aria-haspopup="true" >
                        <a  href="<?php echo base_url('company/driver'); ?>" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">
                                <?php echo $this->lang->line('menu_driver_maintenance'); ?>
                            </span>
                        </a>
                    </li>
                    <li class="m-menu__item " aria-haspopup="true" >
                        <a  href="javascript:;" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">
                                <?php echo $this->lang->line('menu_driver_inventory'); ?>
                            </span>
                        </a>
                    </li>
                    <li class="m-menu__item " aria-haspopup="true" >
                        <a  href="javascript:;" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">
                                <?php echo $this->lang->line('menu_driver_tracking'); ?>
                            </span>
                        </a>
                    </li> 
                    <li class="m-menu__item <?php echo $this->common->get_menu('claims'); ?>" aria-haspopup="true" >
                        <a  href="<?php echo base_url('company/claims'); ?>" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">
                                <?php echo $this->lang->line('menu_claims_maintenance'); ?>
                            </span>
                        </a>
                    </li> 
                </ul>
            </div>
        </li>

        <?php 
            $submenu = "";
            if(empty($submenu)) $submenu = $this->common->get_menu('user');
            if(empty($submenu)) $submenu = $this->common->get_menu('warehouse');
            if(empty($submenu)) $submenu = $this->common->get_menu('package_status');
            if(empty($submenu)) $submenu = $this->common->get_menu('branch');
            if(empty($submenu)) $submenu = $this->common->get_menu('pickup_zone');
            if(empty($submenu)) $submenu = $this->common->get_menu('zone_validation');
            if(empty($submenu)) $submenu = $this->common->get_menu('user_right');
        ?>
        <!--  -->

        <li class="m-menu__item m-menu__item--submenu <?php echo (!empty($submenu)) ? 'm-menu__item--open m-menu__item--expanded' : ''; ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon la la-cogs"></i>
                <span class="m-menu__link-text">
                    <?php echo $this->lang->line('menu_configuration'); ?>
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>

            <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item <?php echo $this->common->get_menu('user'); ?>" aria-haspopup="true" >
                        <a  href="<?php echo base_url('company/user'); ?>" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">
                                <?php echo $this->lang->line('menu_user_maintenance'); ?>
                            </span>
                        </a>
                    </li>
                    <li class="m-menu__item <?php echo $this->common->get_menu('branch'); ?>" aria-haspopup="true" >
                        <a  href="<?php echo base_url('company/branch'); ?>" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">
                                <?php echo $this->lang->line('menu_branch_maintenance'); ?>
                            </span>
                        </a>
                    </li>
                    <li class="m-menu__item <?php echo $this->common->get_menu('user_right'); ?>" aria-haspopup="true" >
                        <a  href="<?php echo base_url('company/user_right'); ?>" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">
                                <?php echo $this->lang->line('menu_user_right_settings'); ?>
                            </span>
                        </a>
                    </li>
                    <li class="m-menu__item <?php echo $this->common->get_menu('warehouse'); ?>" aria-haspopup="true" >
                        <a  href="<?php echo base_url('company/warehouse'); ?>" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">
                                <?php echo $this->lang->line('menu_warehouse'); ?>
                            </span>
                        </a>
                    </li>
                    <li class="m-menu__item <?php echo $this->common->get_menu('package_status'); ?>" aria-haspopup="true" >
                        <a  href="<?php echo base_url('company/package_status'); ?>" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">
                                <?php echo $this->lang->line('menu_package_status'); ?>
                            </span>
                        </a>
                    </li>
                    <li class="m-menu__item " aria-haspopup="true" >
                        <a  href="javascript:;" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">
                                <?php echo $this->lang->line('menu_replace_barcode'); ?>
                            </span>
                        </a>
                    </li>
                    <li class="m-menu__item <?php echo $this->common->get_menu('pickup_zone'); ?>" aria-haspopup="true" >
                        <a  href="<?php echo base_url('company/pickup_zone'); ?>" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">
                                <?php echo $this->lang->line('menu_delivery_zones'); ?>
                            </span>
                        </a>
                    </li>
                    <li class="m-menu__item <?php echo $this->common->get_menu('zone_validation'); ?>" aria-haspopup="true" >
                        <a  href="<?php echo base_url('company/zone_validation'); ?>" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">
                                <?php echo $this->lang->line('menu_zone_validation'); ?>
                            </span>
                        </a>
                    </li>

                </ul>
            </div>
        </li>

        <li class="m-menu__item  <?php echo $this->common->get_menu('back_office'); ?>" aria-haspopup="true" >
            <a  href="<?php echo site_url();?>company/back_office" class="m-menu__link ">
                <i class="m-menu__link-icon la la-briefcase"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">
                            <?php echo $this->lang->line('menu_back_office'); ?>
                        </span>
                        <!-- <span class="m-menu__link-badge">
                            <span class="m-badge m-badge--danger">
                                <?php echo $this->common->record_count('tbl_customer'); ?>
                            </span>
                        </span> -->
                    </span>
                </span>
            </a>
        </li>

        <li class="m-menu__item  <?php echo $this->common->get_menu('reports'); ?>" aria-haspopup="true" >
            <a  href="<?php echo site_url();?>company/reports" class="m-menu__link ">
                <i class="m-menu__link-icon la la-bar-chart-o"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">
                            <?php echo $this->lang->line('menu_reports'); ?>
                        </span>
                        <!-- <span class="m-menu__link-badge">
                            <span class="m-badge m-badge--danger">
                                <?php echo $this->common->record_count('tbl_customer'); ?>
                            </span>
                        </span> -->
                    </span>
                </span>
            </a>
        </li>

        <li class="m-menu__item  <?php echo $this->common->get_menu('logout'); ?>" aria-haspopup="true" >
            <a  href="<?php echo site_url();?>company/login/logout" class="m-menu__link ">
                <i class="m-menu__link-icon flaticon-logout"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">
                            <?php echo $this->lang->line('menu_logout'); ?>
                        </span>
                    </span>
                </span>
            </a>
        </li>

    </ul>
</div>
<!-- END: Aside Menu -->
</div>