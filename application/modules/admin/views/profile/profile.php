<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			<?php echo $this->site_name; ?>  | My Profile
		</title>
		<meta name="description" content="User profile example page">
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
                    <?php  $data['pagename'] = "profile"; $data['subpagename'] = ""; $this->load->view('admin/inc/left-menu',$data);  ?> 
				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title ">
									My Profile
								</h3>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
						<div class="row">
							<div class="col-xl-3 col-lg-4">
								<div class="m-portlet m-portlet--full-height  ">
									<div class="m-portlet__body">
										<div class="m-card-profile">
											<div class="m-card-profile__title m--hide">
												Your Profile
											</div>
											<div class="m-card-profile__pic">
												<div class="m-card-profile__pic-wrapper">
													<img src="<?php if(isset($result['profile_image']) && $result['profile_image']!='') echo $result['admin_profile_image']; else echo base_url().ADMIN_IMAGE.'default-user.png' ?>" alt=""/>
												</div>
											</div>
											<div class="m-card-profile__details">
												<span class="m-card-profile__name">
													<?php echo $this->session->userdata('admin_name');?>
												</span>
												<a href="" class="m-card-profile__email m-link">
													<?php echo $this->session->userdata('admin_email');?>
												</a>
											</div>
										</div>
										 <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
											<li class="m-nav__separator m-nav__separator--fit"></li>
											<li class="m-nav__section m--hide">
												<span class="m-nav__section-text">
													Section
												</span>
											</li>
											<li class="m-nav__item">
											<?php //print_r($result); ?>
												<a href="<?php echo base_url()."admin/profile/"; ?>" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-profile-1"></i>
													<span class="m-nav__link-title">
														<span class="m-nav__link-wrap">
															<span class="m-nav__link-text">
																My Profile
															</span>
															<!-- <span class="m-nav__link-badge">
																<span class="m-badge m-badge--success">
																	2
																</span>
															</span> -->
														</span>
													</span>
												</a>
											</li>
										</ul> 
										<div class="m-portlet__body-separator"></div>
  
									</div>
								</div>
							</div>
							<div class="col-xl-9 col-lg-8">
								<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-tools">
											<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link <?php if($tab_id=="1" && $this->uri->segment(4)!="3") echo "active";?> " data-toggle="tab" href="#m_user_profile_tab_1 " role="tab">
														<i class="flaticon-share m--hide"></i>
														Personal Details
													</a>
												</li>
												<!-- <li class="nav-item m-tabs__item ">
													<a class="nav-link m-tabs__link <?php if($tab_id=="2"&& $this->uri->segment(4)!="3") echo "active";?> " data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
														Vendor Details
													</a>
												</li> -->
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link <?php if($tab_id=="3" || $this->uri->segment(4)=="3") echo "active";?> " data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
														Change Password
													</a>
												</li>

											</ul>
										</div>
									</div>
									<div class="tab-content">
										<div class="tab-pane <?php if($tab_id=="1" && $this->uri->segment(4)!="3") echo "active";?> " id="m_user_profile_tab_1">
											<?php 
					                            $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'personal_details','name' => 'personal_details','enctype'=>'multipart/form-data'); 
					                            echo form_open('admin/profile/update_personal_details',$form_data); 
					                        ?>
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
													
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Name *
														</label>
														<div class="col-7">
															<input type="text" class="form-control m-input" name="name" id="name" placeholder="Enter your name" value="<?php if(isset($result['name'])) echo $result['name'];  else echo set_value('name'); ?>" >
                                                    		<?php echo form_error('fname'); ?>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Email *
														</label>
														<div class="col-7">
															<input type="email" class="form-control m-input" name="email" id="email" placeholder="Enter your email" value="<?php if(isset($result['email'])) echo $result['email']; else echo set_value('email'); ?>" >
                                                    		<?php echo form_error('email'); ?>
														</div>
													</div> 
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Country Code *
														</label>
														<div class="col-7">
															<input type="text" class="form-control m-input" name="country_code" id="country_code" placeholder="+00" value="<?php if(isset($result['country_code'])) echo $result['country_code']; else echo set_value('country_code'); ?>"  >
		                                                    <?php echo form_error('country_code'); ?>
														</div>
													</div>

													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Phone Number *
														</label>
														<div class="col-7">
															<input type="text" class="form-control m-input" name="phone" id="phone" placeholder="Enter your phone number" value="<?php if(isset($result['phone'])) echo $result['phone']; else echo set_value('phone'); ?>" />
		                                                    <?php echo form_error('phone'); ?>
														</div>
													</div>

													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Profile Image
														</label>
														<div class="col-7">
															<div class="input-group">
															    <input type="file" id="profile_image" name="profile_image" value="<?php echo set_value('profile_image'); ?>" style="display:none">
																<input type="text" id="fake-file-input-name" disabled="disabled" placeholder="Select your profile image" class="form-control m-input" value="<?php echo set_value('profile_image'); ?>">
																<span class="input-group-btn">
																	<button id="fake-file-button-browse" type="button" class="btn btn-success">
																		<span class="la la-image"></span>
																		Profile Image
																	</button>
																</span>
															</div>
															<?php echo form_error('profile_image'); ?>
														
														</div>
													</div>
												</div>
												<div class="m-portlet__foot m-portlet__foot--fit">
													<div class="m-form__actions">
														<div class="row">
															<div class="col-2"></div>
															<div class="col-7">
																<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
																	Save changes
																</button>
																&nbsp;&nbsp;
																<button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
																	Cancel
																</button>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>

										<div class="tab-pane <?php if($tab_id=="3" || $this->uri->segment(4)=="3") echo "active";?> " id="m_user_profile_tab_3">
											<?php 
					                            $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'change_password','name' => 'change_password'); 
					                            echo form_open('admin/profile/change_password',$form_data); 
					                        ?>
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
	                                                <div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Old Password *
														</label>
														<div class="col-7">
															<input type="password" class="form-control m-input" name="old_password" id="old_password" placeholder="Enter your old password" value="<?php echo set_value('old_password'); ?>" >
                                                    		<?php echo form_error('old_password'); ?>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															New Password *
														</label>
														<div class="col-7">
															<input type="password" class="form-control m-input" name="new_password" id="new_password" placeholder="Enter your new password" value="<?php echo set_value('new_password'); ?>" >
                                                    		<?php echo form_error('new_password'); ?>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Password Confirmation *
														</label>
														<div class="col-7">
															<input type="password" class="form-control m-input" name="confirm_password" id="confirm_password" placeholder="Enter your confirm password" value="<?php echo set_value('confirm_password'); ?>" >
                                                    		<?php echo form_error('confirm_password'); ?>
														</div> 
													</div>
												</div>
												<div class="m-portlet__foot m-portlet__foot--fit">
													<div class="m-form__actions">
														<div class="row">
															<div class="col-2"></div>
															<div class="col-7">
																<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
																	Save changes
																</button>
																&nbsp;&nbsp;
																<button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
																	Cancel
																</button>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
										

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end:: Body -->
			<!-- begin::Footer -->
                <?php   $this->load->view('admin/inc/footer');  ?>
            <!-- end::Footer -->
		</div>
		<!-- end:: Page -->
		
		<!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->
		
		<!--begin::Base Scripts -->
		<?php $this->load->view('admin/inc/scripts'); ?>	
		<!--end::Base Scripts -->
		
		<!--begin::page scripts -->
		<script type="text/javascript">
			document.getElementById('fake-file-button-browse').addEventListener('click', function() {
				document.getElementById('profile_image').click();
			});

			document.getElementById('profile_image').addEventListener('change', function() {
				document.getElementById('fake-file-input-name').value = this.value;
			});
			
		</script>
		<script type="text/javascript">

        jQuery(document).ready(function() {
            $("#personal_details").validate({
                rules: {
                    name: {
                        required: !0 
                        /*{
					        depends:function(){
					            $(this).val($.trim($(this).val()));
					            return true;
					        }
					    } */
                    },
                    email: {
                        required: !0,
                        email: !0
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
                    },
                },
                invalidHandler: function(e, r) {
                    var i = $("#personal_details").find("#m_form_1_msg");
                    i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
                },
                submitHandler: function(e) {
                    $("#personal_details").find("#m_form_1_msg").hide();
                    return true;
                }
            });
 
            $("#change_password").validate({
                rules: {
                    old_password: {
                        required: !0,
                        pwcheckallowedchars: true,
                    },
                    new_password: {
                        required: !0,
                        minlength: 5,
                        pwcheckallowedchars: true,
                    },
                    confirm_password: {
                        required: !0,
                        pwcheckallowedchars: true,
                        equalTo: "#new_password"
                    },
                },
                invalidHandler: function(e, r) {
                    var i = $("#change_password").find("#m_form_1_msg");
                    i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
                },
                submitHandler: function(e) {
                    $("#change_password").find("#m_form_1_msg").hide();
                    return true;
                }
            });
        });
        $.validator.addMethod("pwcheckallowedchars", function (value) {
            if(value)
                return /^[a-zA-Z0-9!@#$^&*()_=\[\]{};':"\\|,.<>\/?+-]+$/.test(value) // has only allowed chars letter
            else
                return true;
        }, "The password contains non-admitted characters");
        </script>
	</body>
	<!-- end::Body -->
</html>
