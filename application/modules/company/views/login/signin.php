<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            <?php echo $this->site_name; ?> Embarquesoft - Company Signin
        </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->load->view('company/inc/stylesheet'); ?>
    </head>
    <!-- end::Head -->
    <!-- end::Body -->
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--singin" id="m_login">
                <div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
                    <div class="m-stack m-stack--hor m-stack--desktop">
                        <div class="m-stack__item m-stack__item--fluid">
                            <div class="m-login__wrapper">
                                <div class="m-login__logo">
                                    <a href="#">
                                        <img src="<?php echo base_url();?>assets/app/media/img//logos/logo-2.png">
                                    </a>
                                </div>
                                <div class="m-login__signin">
                                    <div class="m-login__head">
                                        <h3 class="m-login__title">
                                            Sign In To Company
                                        </h3>
                                    </div>
                                    <form class="m-login__form m-form" action="" method="POST">
                                        <div class="form-group m-form__group">
                                            <input class="form-control m-input" type="text" placeholder="Email" name="email" autocomplete="off">
                                        </div>
                                        <div class="form-group m-form__group">
                                            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
                                        </div>
                                         <div class="row m-login__form-sub">
                                          <!--  <div class="col m--align-left">
                                                <label class="m-checkbox m-checkbox--focus">
                                                    <input type="checkbox" name="remember">
                                                    Remember me
                                                    <span></span>
                                                </label>
                                            </div> -->
                                            <!-- <div class="col m--align-right">
                                                <a href="javascript:;" id="m_login_forget_password" class="m-link">
                                                    Forget Password ?
                                                </a>
                                            </div> -->
                                        </div> 
                                        <div class="m-login__form-action">
                                            <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                                                Sign In
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1  m-login__content" style="background-image: url(<?php echo base_url();?>assets/app/media/img//bg/bg-4.jpg)">
                    <div class="m-grid__item m-grid__item--middle">
                        <h3 class="m-login__welcome">
                            Embarquesoft Company 
                        </h3>
                        <!-- <p class="m-login__msg">
                            Lorem ipsum dolor sit amet, coectetuer adipiscing
                            <br>
                            elit sed diam nonummy et nibh euismod
                        </p> -->

                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Page --> 
        <!--begin::Base Scripts -->
        <?php $this->load->view('company/inc/scripts'); ?>
        <!--end::Base Scripts -->
        <!--begin::Page Snippets -->
        <script type="text/javascript">
            var e = $("#m_login");
            var i = function(e, i, a) {
                var t = $('<div class="m-alert m-alert--outline alert alert-' + i + ' alert-dismissible" role="alert">\t\t\t<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\t\t\t<span></span>\t\t</div>');
                e.find(".alert").remove(), t.prependTo(e), t.animateClass("fadeIn animated"), t.find("span").html(a)
            };
            $("#m_login_signin_submit").click(function(e) {
                e.preventDefault();
                var a = $(this),
                    t = $(this).closest("form");
                t.validate({
                    rules: {
                        email: {
                            required: !0,
                            email: !0
                        },
                        password: {
                            required: !0
                        }
                    }
                }), t.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), 
                    t.ajaxSubmit({
                    url: "<?php echo site_url();?>company/login/signin",
                    crossDomain:true,
                    success: function(e, r, n, l) {
                        var Obj = JSON.parse(e);
                        if(Obj.is_data == "1")
                        {
                            
                            var url = '<?php echo site_url();?>company/dashboard';
                            window.location.href = url;
                        }else{
                            setTimeout(function() {
                                a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), i(t, "danger", "Incorrect email or password. Please try again.")
                            }, 2e3)
                            
                        }
                    }
                }))
            });
            $("#m_login_signup_submit").click(function(e) {
                e.preventDefault();
                var a = $(this),
                    t = $(this).closest("form");
                t.validate({
                    rules: {
                        firstname: {
                            required: !0
                        },
                        lastname: {
                            required: !0
                        },
                        email: {
                            required: !0,
                            email: !0
                        },
                        password: {
                            required: !0
                        },
                        rpassword: {
                            required: !0
                        },
                        agree: {
                            required: !0
                        }
                    }
                }), t.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), 
                    t.ajaxSubmit({
                    url: "<?php echo site_url();?>company/login/signin",
                    success: function(e, r, n, l) {
                        var Obj = JSON.parse(e);
                        if(Obj.is_data == "1")
                        {
                            var url = '<?php echo site_url();?>company/dashboard';
                            window.location.href = url;
                        }else{
                            setTimeout(function() {
                                a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), i(t, "danger", "Incorrect email or password. Please try again.")
                            }, 2e3)
                            
                        }
                    }
                }))
            });
        </script>
        <script src="<?php echo base_url();?>assets/snippets/pages/user/login.js" type="text/javascript"></script>
        <!-- <script src="<?php echo base_url();?>assets/snippets/pages/user/login.js" type="text/javascript"></script> -->
        <!--end::Page Snippets -->
    </body>
    <!-- end::Body -->
</html>