<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			<?php echo $this->site_name; ?>  | <?php echo $this->lang->line('title_view_customer'); ?>
		</title>
		<meta name="description" content="User profile example page">
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
								<h3 class="m-subheader__title m-subheader__title--separator">
                                    <?php echo $this->lang->line('title_view_inventory'); ?>
                                </h3>
                                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                                    <li class="m-nav__item m-nav__item--home">
                                        <a href="<?php echo site_url();?>company/dashboard" class="m-nav__link m-nav__link--icon">
                                            <i class="m-nav__link-icon la la-home"></i>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?php echo site_url();?>company/inventory/listing" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_inventory_list'); ?>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="javascript:;" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_view_inventory'); ?>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
						<div class="row">
							<div class="col-xl-6 col-lg-6">
								<div class="m-portlet m-portlet--full-height  ">
									<div class="m-portlet__body ">
										<div class="m-form__section m-form__section--first">
											<div class="m-form m-form--fit m-form--label-align-right">
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
	                                                    <?php echo $this->lang->line('label_inventory_id'); ?> :
	                                                </label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                            		<?php echo $result['id']; ?>
	                                            	</label>
	                                            </div>	
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
	                                                    <?php echo $this->lang->line('label_item_number'); ?> :
	                                                </label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                            		<?php echo $result['item_number']; ?>
	                                            	</label>
	                                            </div>	
	                                            <div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
	                                                	<?php echo $this->lang->line('label_description'); ?> :
	                                            	</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['description'];?></span>
													</label>
												</div>
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_price'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
														<?php echo $result['price'];?>
													</label>
												</div>  
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_cost'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
														<?php echo $result['cost'];?>
													</label>
												</div> 
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_type'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
														<?php echo $result['type'];?>
													</label>
												</div> 
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_qty'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
														<?php echo $result['qty'];?>
													</label>
												</div> 
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_recorder_point'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
														<?php echo $result['recorder_point'];?>
													</label>
												</div> 
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_driver_inventory'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
														<?php echo $result['driver_inventory'];?>
													</label>
												</div> 
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_air'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
														<?php echo $result['air'];?>
													</label>
												</div> 
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_country'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
														<?php echo $result['country'];?>
													</label>
												</div> 
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_zone'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
														<?php echo $result['zone'];?>
													</label>
												</div> 
											</div> 
										</div> 						
									</div>
								</div>
							</div> 

							<div class="col-xl-6 col-lg-6">
								<div class="m-portlet m-portlet--full-height  ">
									<div class="m-portlet__body ">
										<div class="m-form__section m-form__section--first">
											<div class="m-form m-form--fit m-form--label-align-right">
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
	                                                    <?php echo $this->lang->line('label_weight'); ?> :
	                                                </label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                            		<?php echo $result['weight']; ?>
	                                            	</label>
	                                            </div>
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
	                                                    <?php echo $this->lang->line('label_width'); ?> :
	                                                </label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                            		<?php echo $result['width']; ?>
	                                            	</label>
	                                            </div>
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
	                                                    <?php echo $this->lang->line('label_height'); ?> :
	                                                </label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                            		<?php echo $result['height']; ?>
	                                            	</label>
	                                            </div>
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
	                                                    <?php echo $this->lang->line('label_depth'); ?> :
	                                                </label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                            		<?php echo $result['depth']; ?>
	                                            	</label>
	                                            </div>
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
	                                                    <?php echo $this->lang->line('label_volume_price'); ?> :
	                                                </label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                            		<?php echo $result['volume_price']; ?>
	                                            	</label>
	                                            </div>	
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
	                                                    <?php echo $this->lang->line('label_weight_price'); ?> :
	                                                </label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                            		<?php echo $result['weight_price']; ?>
	                                            	</label>
	                                            </div>
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
	                                                    <?php echo $this->lang->line('label_has_insurane'); ?> :
	                                                </label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                            		<?php echo $result['has_insurane']; ?>
	                                            	</label>
	                                            </div>	
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
	                                                    <?php echo $this->lang->line('label_insurance_price'); ?> :
	                                                </label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                            		<?php echo $result['insurance_price']; ?>
	                                            	</label>
	                                            </div>	
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
	                                                    <?php echo $this->lang->line('label_insurance_percentage'); ?> :
	                                                </label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                            		<?php echo $result['insurance_percentage']; ?>
	                                            	</label>
	                                            </div>	
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
	                                                    <?php echo $this->lang->line('label_calculate_price'); ?> :
	                                                </label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                            		<?php echo $result['calculate_price']; ?>
	                                            	</label>
	                                            </div>
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
	                                                    <?php echo $this->lang->line('label_scanner_type'); ?> :
	                                                </label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                            		<?php echo $result['scanner_type']; ?>
	                                            	</label>
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
			<!-- end:: Body -->
			<!-- begin::Footer -->
                <?php   $this->load->view('company/inc/footer');  ?>
            <!-- end::Footer -->
		</div>
		<!-- end:: Page -->
		
		<!-- begin::Quick Sidebar -->
			<?php   //$this->load->view('company/inc/right-bar');  ?>
		<!-- end::Quick Sidebar -->
		
		<!-- begin::Scroll Top -->
		<!-- <div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div> -->
		<!-- end::Scroll Top -->
		
		<!-- begin::Quick Nav -->
			<?php   //$this->load->view('company/inc/quick-nav');  ?>
		<!-- begin::Quick Nav -->
		
		<!--begin::Base Scripts -->
		<?php $this->load->view('company/inc/scripts'); ?>	
		<!--end::Base Scripts -->
		
		
		<!--begin::Page Snippets -->
        <script type="text/javascript">
            
        </script>
        <!--end::Page Snippets -->

	</body>
	<!-- end::Body -->
</html>
