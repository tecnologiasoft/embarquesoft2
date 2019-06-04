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
		<?php $this->load->view('vendor/inc/stylesheet'); ?> 

	</head>
	<!-- end::Head -->
	<!-- end::Body -->
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">

			<!-- BEGIN: Header -->
			<?php   $this->load->view('vendor/inc/header');  ?>
			<!-- END: Header -->

			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside --> 
                    <?php $this->load->view('vendor/inc/left-menu',$data);  ?> 
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
													<img src="<?php if(isset($result['profile_image']) && $result['profile_image']!='') echo $result['vendor_image']; else echo base_url().USER_IMAGE.'default-user.png' ?>" alt=""/>
												</div>
											</div>
											<div class="m-card-profile__details">
												<span class="m-card-profile__name">
													<?php echo $this->session->userdata('vendor_name');?>
												</span>
												<a href="" class="m-card-profile__email m-link">
													<?php echo $this->session->userdata('vendor_email');?>
												</a>
											</div>
										</div>
										<!-- <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
											<li class="m-nav__separator m-nav__separator--fit"></li>
											<li class="m-nav__section m--hide">
												<span class="m-nav__section-text">
													Section
												</span>
											</li>
											<li class="m-nav__item">
											<?php //print_r($result); ?>
												<a href="<?php echo base_url()."vendor/profile/view/"; ?>" class="m-nav__link">
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
															</span> --
														</span>
													</span>
												</a>
											</li>
										</ul> -->
										<div class="m-portlet__body-separator"></div>

										<div class="m-card-profile">
                                            <div class="m-card-profile__pic">
                                                <div class="m-card-profile__pic-wrapper">
                                                    <img src="<?php if(isset($result_vendor['logo']) && $result_vendor['logo']!='') echo $result_vendor['store_image']; else echo base_url().STORE_IMAGE.'default-store.png' ?>" alt=""/>
                                                </div>
                                            </div>
                                            <div class="m-card-profile__details">
												<span class="m-card-profile__name">
													<?php echo $result_vendor['name']; ?>
												</span>
												<a href="" class="m-card-profile__email m-link">
													<?php echo $result_vendor['website']; ?>
												</a>
											</div>
                                        </div>

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
												<li class="nav-item m-tabs__item ">
													<a class="nav-link m-tabs__link <?php if($tab_id=="2"&& $this->uri->segment(4)!="3") echo "active";?> " data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
														Vendor Details
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link <?php if($tab_id=="3" || $this->uri->segment(4)=="3") echo "active";?> " data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
														Change Password
													</a>
												</li>

												<!-- <li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link <?php if($tab_id=="4" || $this->uri->segment(4)=="4") echo "active";?> " data-toggle="tab" href="#m_user_profile_tab_4" role="tab">
														Vendor Images
													</a>
												</li> -->

											</ul>
										</div>
									</div>
									<div class="tab-content">
										<div class="tab-pane <?php if($tab_id=="1" && $this->uri->segment(4)!="3") echo "active";?> " id="m_user_profile_tab_1">
											<!-- <form class="m-form m-form--fit m-form--label-align-right" name="personal_details" id="personal_details" action="" method="POST"> -->
											<?php 
					                            $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'personal_details','name' => 'personal_details','enctype'=>'multipart/form-data'); 
					                            echo form_open('vendor/profile/update_personal_details',$form_data); 
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
															First Name *
														</label>
														<div class="col-7">
															<input type="text" class="form-control m-input" name="first_name" id="first_name" placeholder="Enter your first name" value="<?php if(isset($result['first_name'])) echo $result['first_name'];  else echo set_value('first_name'); ?>" >
                                                    		<?php echo form_error('first_name'); ?>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Last Name *
														</label>
														<div class="col-7">
															<input type="text" class="form-control m-input" name="last_name" id="last_name" placeholder="Enter your last name" value="<?php if(isset($result['last_name'])) echo $result['last_name']; else echo set_value('last_name'); ?>" >
                                                    		<?php echo form_error('last_name'); ?>
														</div>
													</div> 
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Phone *
														</label>
														<div class="col-7">
															<div class="row">
		                                                        <div class="col-lg-3 col-md-3 col-sm-4">
		                                                            <input type="text" class="form-control m-input" name="country_code" id="country_code" placeholder="+00" value="<?php if(isset($result['country_code'])) echo $result['country_code']; else echo set_value('country_code'); ?>"  >
		                                                            <?php echo form_error('country_code'); ?>
		                                                        </div>
		                                                        <div class="col-lg-9 col-md-9 col-sm-8">
		                                                            <input type="text" class="form-control m-input" name="phone_number" id="phone_number" placeholder="Enter your phone number" value="<?php if(isset($result['phone_number'])) echo $result['phone_number']; else echo set_value('phone_number'); ?>" >
		                                                            <?php echo form_error('phone_number'); ?>
		                                                        </div>
															</div>
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
																		Pic Image
																	</button>
																</span>
															</div>
															<?php echo form_error('profile_image'); echo $error_msg; ?>
														
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

										<div class="tab-pane <?php if($tab_id=="2" && $this->uri->segment(4)!="3") echo "active";?> " id="m_user_profile_tab_2">
											
											<!-- <form class="m-form m-form--fit m-form--label-align-right" name="vendor_details" id="vendor_details" action="" method="POST"> -->
											<?php 
					                            $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'vendor_details','name' => 'vendor_details','enctype'=>'multipart/form-data'); 
					                            echo form_open('vendor/profile/update_vendor_details',$form_data); 
					                        ?>
											<?php //print_r($result_vendor); ?>
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
															<input type="text" required="" class="form-control m-input" name="name" id="name" placeholder="Enter your name" value="<?php if(isset($result_vendor['name'])) echo $result_vendor['name']; else echo set_value('name'); ?>" >
                                                    		<?php echo form_error('name'); ?>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Category *
														</label>
														<div class="col-7">
															<select class="form-control m-input" name="category_id" id="category_id">
	                                                        	<?php 
		                                                        if(!empty($category_list))
		                                                            { foreach ($category_list as $row){  ?>
		                                                            <option value="<?php echo $row['id']; ?>" <?php echo set_select('category_id',$row['id']); if(isset($result_vendor['category_id']) && $result_vendor['category_id']==$row['id']) echo "selected"; ?> > <?php echo $row['name']; ?> </option>
	                                                        	<?php } } ?>
		                                                    </select>
		                                                    <?php echo form_error('category_id'); ?>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Location *
														</label>
														<div class="col-7">
															<input type="text" class="form-control m-input" name="location" id="autocomplete" onFocus="geolocate()" placeholder="Enter your location" value="<?php if(isset($result_vendor['location'])) echo $result_vendor['location']; else echo set_value('location'); ?>" >
		                                                    <input type="hidden" name="latitude" id="latitude" value="<?php if(isset($result_vendor['latitude'])) echo $result_vendor['latitude']; else echo set_value('latitude'); ?>"  >
		                                                    <input type="hidden" name="longitude" id="longitude"  value="<?php if(isset($result_vendor['longitude'])) echo $result_vendor['longitude']; else echo set_value('longitude'); ?>" >
		                                                    <?php echo form_error('location'); ?>
														</div> 
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Area *
														</label>
														<div class="col-7">
															<input type="area" class="form-control m-input" name="area" id="route" placeholder="Enter your area" value="<?php if(isset($result_vendor['area'])) echo $result_vendor['area']; else echo set_value('area'); ?>" >
                                                    		<?php echo form_error('area'); ?>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															About *
														</label>
														<div class="col-7">
															<textarea class="form-control m-input" name="about" id="about" placeholder="Enter a about"><?php if(isset($result_vendor['about'])) echo $result_vendor['about']; else echo set_value('about'); ?></textarea>
                                                    		<?php echo form_error('about'); ?>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Phone Number *
														</label>
														<div class="col-7">
															<input type="text" class="form-control m-input" name="phone" id="phone" placeholder="Enter your phone number" value="<?php if(isset($result_vendor['phone'])) echo $result_vendor['phone']; else echo set_value('phone'); ?>" >
                                                        	<?php echo form_error('phone'); ?>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Website *
														</label>
														<div class="col-7">
															<input type="text" class="form-control m-input" name="website" id="website" placeholder="Enter your website" value="<?php if(isset($result_vendor['website'])) echo $result_vendor['website']; else echo set_value('website'); ?>" >
                                                        
                                                    		<?php echo form_error('website'); ?>
														</div>
													</div>

													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Store Image
														</label>
														<div class="col-7">
															<div class="input-group">
															    <input type="file" id="store_image" name="store_image" value="<?php echo set_value('store_image'); ?>" style="display:none">
																<input type="text" id="fake-file-input-name1" disabled="disabled" placeholder="Select your profile image" class="form-control m-input" value="<?php echo set_value('store_image'); ?>">
																<span class="input-group-btn">
																	<button id="fake-file-button-browse1" type="button" class="btn btn-success">
																		<span class="la la-image"></span>
																		Pic Image
																	</button>
																</span>
															</div>
                                                    		<?php echo form_error('store_image'); echo $error_msg; ?>
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
											<!-- <form class="m-form m-form--fit m-form--label-align-right" name="change_password" id="change_password" action="" method="POST"> -->
											<?php 
					                            $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'change_password','name' => 'change_password'); 
					                            echo form_open('vendor/profile/change_password',$form_data); 
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
                <?php   $this->load->view('vendor/inc/footer');  ?>
            <!-- end::Footer -->
		</div>
		<!-- end:: Page -->
		
		<!-- begin::Quick Sidebar -->
			<?php   //$this->load->view('vendor/inc/right-bar');  ?>
		<!-- end::Quick Sidebar -->
		
		<!-- begin::Scroll Top -->
		<!-- <div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div> -->
		<!-- end::Scroll Top -->
		
		<!-- begin::Quick Nav -->
			<?php   //$this->load->view('vendor/inc/quick-nav');  ?>
		<!-- begin::Quick Nav -->
		
		<!--begin::Base Scripts -->
		<?php $this->load->view('vendor/inc/scripts'); ?>	
		<!--end::Base Scripts -->
		
		<!--begin::page scripts -->
		<script type="text/javascript">
			document.getElementById('fake-file-button-browse').addEventListener('click', function() {
				document.getElementById('profile_image').click();
			});

			document.getElementById('profile_image').addEventListener('change', function() {
				document.getElementById('fake-file-input-name').value = this.value;
			});

			document.getElementById('fake-file-button-browse1').addEventListener('click', function() {
				document.getElementById('store_image').click();
			});

			document.getElementById('store_image').addEventListener('change', function() {
				document.getElementById('fake-file-input-name1').value = this.value;
			});
		</script>
		<script type="text/javascript">

        jQuery(document).ready(function() {
            $("#personal_details").validate({
                rules: {
                    first_name: {
                        required: !0 
                        /*{
					        depends:function(){
					            $(this).val($.trim($(this).val()));
					            return true;
					        }
					    } */
                    },
                    last_name: {
                        required: !0,
                    },
                    country_code: {
                        required: !0,
                        minlength: 2,
                        maxlength: 5
                    },
                    phone_number: {
                        required: !0,
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

            $("#vendor_details").validate({
                rules: {
                    category_id: {
                        required: !0,
                    },
                    name: {
                        required: !0,
                    },
                    location: {
                        required: !0,
                    }, 
                    about: {
                        required: !0,
                    },
                    phone: {
                        required: !0,
                    },
                    website: {
                        required: !0,
                    },
                    area: {
                        required: !0,
                    },
                    latitude: {
                		required: !0,
                    },
                    longitude: {
                		required: !0,
                    }

                },
                invalidHandler: function(e, r) {
                    var i = $("#vendor_details").find("#m_form_1_msg");
                    i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
                },
                submitHandler: function(e) {
                    $("#vendor_details").find("#m_form_1_msg").hide();
                    return true;
                }
            });


            $("#change_password").validate({
                rules: {
                    old_password: {
                        required: !0,
                    },
                    new_password: {
                        required: !0,
                    },
                    confirm_password: {
                        required: !0,
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
        </script>
		
        <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo PLACE_API_KEY; ?>&libraries=places&callback=initAutocomplete" async defer></script>  
        
        <script type="text/javascript">

            var placeSearch, autocomplete;
            var componentForm = {
                route: 'long_name',
            };

            function initAutocomplete() {
                  // Create the autocomplete object, restricting the search to geographical
                  // location types.
                  autocomplete = new google.maps.places.Autocomplete(
                    /** @type {!HTMLInputElement} */(document.getElementById('autocomplete'))   
                    //{types: ['geocode']}
                    );

                  autocomplete.addListener('place_changed', fillInAddress);
              }

                function fillInAddress() {
                  // Get the place details from the autocomplete object.
                  var place = autocomplete.getPlace();
                  
                    for (var component in componentForm) {
                    
                        document.getElementById(component).value = '';
                        document.getElementById(component).disabled = false;
                    }

                  // Get each component of the address from the place details
                  // and fill the corresponding field on the form.
                  

                  for (var i = 0; i < place.address_components.length; i++) {
                        var addressType = place.address_components[i].types[0];
                        if (componentForm[addressType]) {

                            var val = place.address_components[i][componentForm[addressType]];
                          //alert(val);
                          document.getElementById(addressType).value = val;
                        }
                    }

                    document.getElementById('latitude').value = place.geometry.location.lat();
                    document.getElementById('longitude').value = place.geometry.location.lng();

                }



                // Bias the autocomplete object to the user's geographical location,
                // as supplied by the browser's 'navigator.geolocation' object.
                function geolocate() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            var geolocation = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude
                            };        

                            var circle = new google.maps.Circle({
                                center: geolocation,
                                radius: position.coords.accuracy
                            });
                            autocomplete.setBounds(circle.getBounds());
                        });
                    }
                }
            </script>
		<!--end::page scripts -->

	</body>
	<!-- end::Body -->
</html>
