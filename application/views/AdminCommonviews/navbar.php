<style>
.menu-fixed{
   position: fixed;
   width: 255px;
   z-index: 1000;
}

body.m-brand--minimize .menu-fixed{
   position: fixed;
   width: 70px;
}
</style>
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
<i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item  m-aside-left  m-aside-left--skin-dark ">
   <!-- BEGIN: Aside Menu -->
   <div 
      id="m_ver_menu" 
      class="m-aside-menu menu-fixed m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
      data-menu-vertical="true"
      data-menu-scrollable="false" data-menu-dropdown-timeout="500"  
      >
      <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
         
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
            <a  href="<?php echo site_url().'company/invoices';?>" class="m-menu__link ">
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

         <li class="m-menu__item m-menu__item--submenu <?php echo (!empty($submenu)) ? 'm-menu__item--open m-menu__item--expanded' : ''; ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a  href="javascript:void(0);" class="m-menu__link m-menu__toggle">
            <i class="m-menu__link-icon la la-map-signs"></i>
            <span class="m-menu__link-text">
            <?php echo  $this->lang->line('menu_pickups'); ?>
            </span>
            <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu ">
               <span class="m-menu__arrow"></span>
               <ul class="m-menu__subnav">
                  <li class="m-menu__item <?php echo $this->common->get_menu('pickup'); ?>" aria-haspopup="true" >
                     <a  href="<?php  echo base_url('company/pickup'); ?>" class="m-menu__link ">
                     <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                     <span></span>
                     </i>
                     <span class="m-menu__link-text">
                     <?php echo $this->lang->line('menu_pickups'); ?>
                     </span>
                     </a>
                  </li>
                  <li class="m-menu__item <?php echo $this->common->get_menu('branch'); ?>" aria-haspopup="true" >
                     <a  href="<?php echo base_url('company/pickup/pickup_managment'); ?>" class="m-menu__link ">
                     <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                     <span></span>
                     </i>
                     <span class="m-menu__link-text">
                     <?php echo $this->lang->line('title_pickup_managment'); ?>
                     </span>
                     </a>
                  </li>
                 
               </ul>
            </div>
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
         <li class="m-menu__item  <?php echo $this->common->get_menu('inventory'); ?>" aria-haspopup="true">
            <a  href="<?php echo site_url().'company/inventory';?>" class="m-menu__link ">
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
         <!-- <li class="m-menu__item  <?php echo $this->common->get_menu('payments'); ?>" aria-haspopup="true" >
            <a  href="<?php echo site_url().'company/payments';?>" class="m-menu__link ">
               <i class="m-menu__link-icon la la-dollar"></i>
               <span class="m-menu__link-title">
                  <span class="m-menu__link-wrap">
                     <span class="m-menu__link-text">
                     <?php echo $this->lang->line('menu_payments'); ?>
                     </span> -->
                     <!-- <span class="m-menu__link-badge">
                        <span class="m-badge m-badge--danger">
                            <?php echo $this->common->record_count('tbl_customer'); ?>
                        </span>
                        </span> -->
                  <!-- </span>
               </span>
            </a>
         </li> -->
         <li class="m-menu__item  <?php echo $this->common->get_menu('employee'); ?>" aria-haspopup="true" >
            <a  href="<?php echo site_url().'company/employee';?>" class="m-menu__link ">
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
                    <!-- <li class="m-menu__item " aria-haspopup="true" >
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
                    </li>  -->
                </ul>
            </div>
        </li>

        <li class="m-menu__item m-menu__item--submenu <?php echo (!empty($submenu)) ? 'm-menu__item--open m-menu__item--expanded' : ''; ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon la la-truck"></i>
                <span class="m-menu__link-text">
                    <?php echo $this->lang->line('menu_distribucion'); ?>
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item <?php echo $this->common->get_menu('driver'); ?>" aria-haspopup="true" >
                        <a  href="<?php echo base_url('company/batch_distribution'); ?>" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                <span></span>
                            </i>
                            <span class="m-menu__link-text">
                                <?php echo $this->lang->line('menu_batch_distribution'); ?>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

         <li class="m-menu__item  <?php echo $this->common->get_menu('autocall'); ?>" aria-haspopup="true" >
            <a  href="#<?php //echo site_url().'company/autocall';?>" class="m-menu__link ">
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
            <a  href="javascript:void(0);" class="m-menu__link m-menu__toggle">
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
                     <a  href="<?php  echo base_url('company/user'); ?>" class="m-menu__link ">
                     <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                     <span></span>
                     </i>
                     <span class="m-menu__link-text">
                     <?php echo $this->lang->line('menu_user_maintenance'); ?>
                     </span>
                     </a>
                  </li>


                  <li class="m-menu__item <?php echo $this->common->get_menu('payment'); ?>" aria-haspopup="true" >
                     <a  href="<?php  echo base_url('company/agent/'); ?>" class="m-menu__link ">
                     <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                     <span></span>
                     </i>
                     <span class="m-menu__link-text">
                        <?php echo $this->lang->line('label_agent_maintenance'); ?>
                     </span>
                     </a>
                  </li>


                  <li class="m-menu__item <?php echo $this->common->get_menu('payment'); ?>" aria-haspopup="true" >
                     <a  href="<?php  echo base_url('company/payments/manage_type'); ?>" class="m-menu__link ">
                     <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                     <span></span>
                     </i>
                     <span class="m-menu__link-text">
                     <?php echo $this->lang->line('label_payment_type'); ?>
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
                  <!-- <li class="m-menu__item <?php echo $this->common->get_menu('user_right'); ?>" aria-haspopup="true" >
                     <a  href="#<?php //echo base_url('company/user_right'); ?>" class="m-menu__link ">
                     <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                     <span></span>
                     </i>
                     <span class="m-menu__link-text">
                     <?php echo $this->lang->line('menu_user_right_settings'); ?>
                     </span>
                     </a>
                  </li> -->
                  <li class="m-menu__item <?php echo $this->common->get_menu('warehouse'); ?>" aria-haspopup="true" >
                     <a  href="#<?php echo base_url('company/warehouse'); ?>" class="m-menu__link ">
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
                  <!-- <li class="m-menu__item " aria-haspopup="true" >
                     <a  href="javascript:;" class="m-menu__link ">
                     <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                     <span></span>
                     </i>
                     <span class="m-menu__link-text">
                     <?php echo $this->lang->line('menu_replace_barcode'); ?>
                     </span>
                     </a>
                  </li> -->
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
                     <a  href="#<?php //echo base_url('company/zone_validation'); ?>" class="m-menu__link ">
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
         <li class="m-menu__item  <?php echo $this->common->get_menu('logout'); ?>" aria-haspopup="true" >
            <a  href="<?php echo site_url();?>logout" class="m-menu__link ">
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
<!-- end::Head -->
<!-- end::Body -->
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
   <div class="d-flex align-items-center">
      <div class="mr-auto">
         <h3 class="m-subheader__title m-subheader__title--separator">
            <?php echo $title; ?>
         </h3>
         <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
            <!-- <li class="m-nav__item m-nav__item--home">
               <a href="javascript:void();" class="m-nav__link m-nav__link--icon">
               <i class="m-nav__link-icon la la-home"></i>
               </a>
            </li>
            <li class="m-nav__separator">
               -
            </li> -->
            <!-- <?php if($second_title) {?>
            <li class="m-nav__item">
               <a href="javascript:void();" class="m-nav__link">
               <span class="m-nav__link-text">
               <?php echo $second_title; ?>
               </span>
               </a>
            </li>
            <li class="m-nav__separator">
               -
            <?php } ?>
            </li>
            <li class="m-nav__item">
               <a href="javascript:;" class="m-nav__link">
               <span class="m-nav__link-text">
               <?php echo $title; ?>
               </span>
               </a>
            </li> -->

            <?php if($third_title) {?>
            <li class="m-nav__item">
               <a href="javascript:void();" class="m-nav__link">
               <span class="m-nav__link-text">
               <?php echo $third_title; ?>
               </span>
               </a>
            </li>
            <li class="m-nav__separator">
               -
            <?php } ?>

         </ul>
      </div>
   </div>
</div>