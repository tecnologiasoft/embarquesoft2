<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			<?php echo $this->site_name; ?>  | <?php echo $this->lang->line('title_view_pickup'); ?>
		</title>
		<meta name="description" content="User profile example page">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<?php $this->load->view('company/inc/stylesheet'); ?> 
		<style type="text/css">
			#ajax_data.m-datatable--default>.m-datatable__table>.m-datatable__foot .m-datatable__row>.m-datatable__cell,
			#ajax_data.m-datatable--default>.m-datatable__table>.m-datatable__head .m-datatable__row>.m-datatable__cell {
				background: #A5392C
			}
		</style>
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
                                    <?php echo $this->lang->line('title_view_pickup'); ?>
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
                                        <a href="<?php echo site_url();?>company/pickup/listing" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_pickup_list'); ?>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="javascript:;" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_view_pickup'); ?>
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
	                                                    <?php echo $this->lang->line('label_pickup_id'); ?> :
	                                                </label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                            		<?php echo $result['id']; ?>
	                                            	</label>
	                                            </div>
	                                            <div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
	                                                    <?php echo $this->lang->line('label_customer'); ?> :
	                                                </label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                            		<?php echo $result['customer_id']." (".$result['customer_data']['fname']." ".$result['customer_data']['lname'].")"; ?>
	                                            	</label>
	                                            </div>
	                                            <div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
	                                                	<?php echo $this->lang->line('label_name'); ?> :
	                                            	</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['fname']." ".$result['lname'];?></span>
													</label>
												</div>
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_address'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['address'];?>
	                                                </label>
												</div>
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_borough'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['borough'];?>
	                                                </label>
												</div>
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_city'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['city'];?>
	                                                </label>
												</div>
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_state'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['state'];?>
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
														<?php echo $this->lang->line('label_zipcode'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['zipcode'];?>
	                                                </label>
												</div>  
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_telephone_number'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['telephone_number'];?>
	                                                </label>
												</div>  
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_cellphone_number'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['cellphone_number'];?>
	                                                </label>
												</div>
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_item_1'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['item_1']; ?>
	                                                </label>
												</div>
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_item_2'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['item_2']; ?>
	                                                </label>
												</div>  
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_pickup_date'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['pickup_date']; ?>
	                                                </label>
												</div>  
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_pickup_time'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $this->common->from_date_convert(date("H:i:s", strtotime($result['pickup_time'])), 'UTC', $this->session->userdata('web_timezone'), 'h:i A'); ?>
	                                                </label>
												</div>  

												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_branch'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['branch_id']." (".$result['branch_data']['name'].")"; ?>
	                                                </label>
												</div>
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_zone'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['zone']." (".$result['zone_data']['description'].")"; ?>
	                                                </label>
												</div>    
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_status'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['status']; ?>
	                                                </label>
												</div>    
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_comment'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['comment']; ?>
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
