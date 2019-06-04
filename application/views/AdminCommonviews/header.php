<!DOCTYPE html>
<html lang="en" >
   <!-- begin::Head -->
   <head>
      <meta charset="utf-8" />
      <title>
         <?php echo SITE_TITLE; ?> | <?=@$title?>
      </title>
      <link rel="shortcut icon" href="<?=IMAGES.'favicon.png'?>">
      <meta name="description" content="Latest updates and statistic charts">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
      <script src="<?php echo JS_FILE ?>jquery.min.js"></script>
      <script>

      const SITE_URL = '<?php echo SITE_URL; ?>';
      const IMAGES = '<?php echo IMAGES; ?>';
      const $controllerName = '<?php echo $this->router->fetch_class(); ?>';
      const $user_id = '<?php echo $this->guid; ?>';
      const $csrf_token = '<?php echo $this->security->get_csrf_token_name(); ?>';
      const $csrf_token_hash = '<?php echo $this->security->get_csrf_hash(); ?>';
      const SUCCESS_CODE = '<?php echo SUCCESS_CODE ?>';
      const ERROR_CODE = '<?php echo ERROR_CODE ?>';

         WebFont.load({
           google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
           active: function() {
             sessionStorage.fonts = true;
           }
         });

      </script>
      <!--end::Web font -->
      <!--begin::Base Styles -->
      <link href="<?php echo base_url();?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
      <!-- Sweet Alerts  -->
      <link href="<?php echo base_url();?>assets/vendors/custom/sweetalert/dist/sweetalert2.css" rel="stylesheet" type="text/css">
      <!--end::Base Styles -->
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/<?php echo $this->fav_icon;?>">
       <?php
            if (isset ( $css )) {
            	foreach ( $css as $allCss ) {
            		if (filter_var ( $allCss, FILTER_VALIDATE_URL ) === FALSE) { ?>
                     <link rel="stylesheet" type="text/css" href="<?php echo CSS_FILE.$allCss.'.css'; ?>"/>
            <?php } else { ?>
            <link rel="stylesheet" type="text/css" href="<?php echo $allCss; ?>"/>
         <?php
            }
         }
      }
      ?>

   </head>
   <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default m-brand--minimize m-aside-left--minimize">
      <div class="m-grid m-grid--hor m-grid--root m-page">
      <header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
         <div class="m-container m-container--fluid m-container--full-height">
            <div class="m-stack m-stack--ver m-stack--desktop">
               <!-- BEGIN: Brand -->
               <div class="m-stack__item m-brand  m-brand--skin-dark ">
                  <div class="m-stack m-stack--ver m-stack--general">
                     <div class="m-stack__item m-stack__item--middle m-brand__logo">
                        <a href="javascript:void(0);" class="m-brand__logo-wrapper">
                        <img alt="" src="<?php echo base_url();?>assets/demo/default/media/img/logo/esp.png"/>
                        </a>
                     </div>
                     <div class="m-stack__item m-stack__item--middle m-brand__tools">
                        <!-- BEGIN: Left Aside Minimize Toggle -->
                        <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block 
                           ">
                        <span></span>
                        </a>
                        <!-- END -->
                        <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                        <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                        <span></span>
                        </a>
                        <!-- END -->
                        <!-- BEGIN: Responsive Header Menu Toggler -->
                        <!-- <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                           <span></span>
                           </a> -->
                        <!-- END -->
                        <!-- BEGIN: Topbar Toggler -->
                        <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                        <i class="flaticon-more"></i>
                        </a>
                        <!-- BEGIN: Topbar Toggler -->
                     </div>
                  </div>
               </div>
               <!-- END: Brand -->
               <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                  <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark" style="width: 76%;">
                     <div class="m--align-center"><br>
                        <img alt="" src="<?php echo base_url();?>assets/demo/default/media/img/logo/top_banner_anime.png"/>
                     </div>
                  </div>
                  <!-- BEGIN: Topbar -->
                  <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                     <div class="m-stack__item m-topbar__nav-wrapper">
                        <ul class="m-topbar__nav m-nav m-nav--inline">
                           <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
                              <a href="#" class="m-nav__link m-dropdown__toggle">
                              <span class="m-topbar__userpic"> 
                              <img src="<?php if($this->session->userdata('company_name')!='') echo base_url().COMPANY_IMAGE.$this->session->userdata('company_profile_image'); else echo base_url().USER_IMAGE.'default-user.png' ?>" alt="<?php echo $this->username; ?>" class="m--img-rounded m--marginless m--img-centered"  />
                              </span>
                              <span class="m-topbar__username m--hide">
                              <?php echo $this->username; ?>
                              </span>
                              </a>
                              <div class="m-dropdown__wrapper">
                                 <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                 <div class="m-dropdown__inner">
                                    <div class="m-dropdown__header m--align-center" style="background: url(<?php echo base_url();?>assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
                                       <div class="m-card-user m-card-user--skin-dark">
                                          <div class="m-card-user__pic">
                                             <img src="<?php if($this->session->userdata('company_name')!='') echo base_url().COMPANY_IMAGE.$this->session->userdata('company_profile_image'); else echo base_url().USER_IMAGE.'default-user.png' ?>" alt="<?php echo $this->username; ?>" class="m--img-rounded m--marginless"  />
                                          </div>
                                          <div class="m-card-user__details">
                                             <span class="m-card-user__name m--font-weight-500">
                                             <?php echo $this->username;?>
                                             </span>
                                             <!-- <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                                <?php echo $this->email;?>
                                                </a> -->
                                          </div>
                                       </div>
                                    </div>
                                    <div class="m-dropdown__body">
                                       <div class="m-dropdown__content">
                                          <ul class="m-nav m-nav--skin-light">
                                             <!-- <li class="m-nav__item">
                                                <a href="<?php echo base_url()."company/profile/view/"; ?>" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                    <span class="m-nav__link-title">
                                                        <span class="m-nav__link-wrap">
                                                            <span class="m-nav__link-text">
                                                                <?php echo $this->lang->line('menu_my_profile'); ?>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </a>
                                                </li>  -->
                                             <li class="m-nav__separator m-nav__separator--fit"></li>
                                             <li class="m-nav__item">
                                                <a href="<?php echo site_url();?>logout" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                <?php echo $this->lang->line('menu_logout'); ?>
                                                </a>&nbsp;&nbsp;&nbsp;
                                                <!-- <a href="<?php echo site_url();?>company/lock" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                   Lock
                                                   </a> -->
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <!-- Language  -->
                           <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
                              <a href="#" class="m-nav__link m-dropdown__toggle">
                              <span class="m-topbar__userpic"> 
                              <?php echo ucfirst($this->session->userdata('site_lang')); ?>
                              </span>
                              </a>
                              <div class="m-dropdown__wrapper">
                                 <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                 <div class="m-dropdown__inner">
                                    <div class="m-dropdown__header m--align-center" style="background: url(<?php echo base_url();?>assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
                                       <div class="m-card-user m-card-user--skin-dark">
                                          <div class="m-card-user__details">
                                             <span class="m-card-user__name m--font-weight-500">
                                             <?php echo $this->lang->line('label_select_language');?>
                                             </span>
                                             <!-- <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                                <?php echo $this->session->userdata('company_email');?>
                                                </a> -->
                                          </div>
                                       </div>
                                    </div>
                                    <div class="m-dropdown__body">
                                       <div class="m-dropdown__content">
                                          <ul class="m-nav m-nav--skin-light">
                                             <li class="m-nav__item">
                                                <a href="javascript:;" onclick="switchLang('english');" class="m-nav__link">
                                                <span class="m-nav__link-title">
                                                <span class="m-nav__link-wrap">
                                                <span class="m-nav__link-text">
                                                English
                                                </span>
                                                </span>
                                                </span>
                                                </a>
                                             </li>
                                             <li class="m-nav__item">
                                                <a href="javascript:;" onclick="switchLang('spanish');" class="m-nav__link">
                                                <span class="m-nav__link-title">
                                                <span class="m-nav__link-wrap">
                                                <span class="m-nav__link-text">
                                                Español
                                                </span>
                                                </span>
                                                </span>
                                                </a>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click"></li>
                        </ul>
                     </div>
                  </div>
                  <!-- END: Topbar -->
               </div>
            </div>
         </div>
      </header>