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
		<style type="text/css">
			#ajax_data.m-datatable--default>.m-datatable__table>.m-datatable__foot .m-datatable__row>.m-datatable__cell,
			#ajax_data.m-datatable--default>.m-datatable__table>.m-datatable__head .m-datatable__row>.m-datatable__cell,
			#pickup_datatable.m-datatable--default>.m-datatable__table>.m-datatable__foot .m-datatable__row>.m-datatable__cell,
			#pickup_datatable.m-datatable--default>.m-datatable__table>.m-datatable__head .m-datatable__row>.m-datatable__cell {
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
                                    <?php echo $this->lang->line('title_view_customer'); ?>
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
                                        <a href="<?php echo site_url();?>company/customer/listing" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_customer_list'); ?>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="javascript:;" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo $this->lang->line('title_view_customer'); ?>
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
							<div class="col-xl-4 col-lg-4">
								<div class="m-portlet m-portlet--full-height  ">
									<div class="m-portlet__body ">
										<div class="m-form__section m-form__section--first">
											<div class="m-form m-form--fit m-form--label-align-right">
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
	                                                    <?php echo $this->lang->line('label_customer_id'); ?> :
	                                                </label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                            		<?php echo $result['id']; ?>
	                                            	</label>
	                                            </div>
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
	                                                    <?php echo $this->lang->line('label_company'); ?> :
	                                                </label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                            		<?php echo $result['company_name']; ?>
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
														<?php echo $this->lang->line('label_email'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
														<a href="mailto:<?php echo $result['email'];?>"><?php echo $result['email'];?></a>
													</label>
												</div>
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_user_name'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['user_name'];?>
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
														<?php echo $this->lang->line('label_website'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<a href="<?php echo $result['website'];?>" target="_blank"><?php echo $result['website'];?></a>
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
														<?php echo $this->lang->line('label_office_phone_number'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['office_phone_number'];?>
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
														<?php echo $this->lang->line('label_fax_number'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['fax_number'];?>
	                                                </label>
												</div> 
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_lic_id'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['lic_id'];?>
	                                                </label>
												</div> 
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_lic_picture'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php if(!empty($result['lic_picture'])){ ?>
                                                            <img src="<?php echo base_url().CUSTOMER_IMAGES.$result['lic_picture']; ?>" class="img-responsive img-thumb" style="height: 90px; width: 150px;">
                                                        <?php } ?>
	                                                </label>
												</div> 
												<div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label col-form-label-right">
														<?php echo $this->lang->line('label_balance'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<?php echo $result['balance'];?>
	                                                </label>
												</div> 
												<!-- <div class="form-group m-form__group row">
	                                                <label class="col-xl-3 col-lg-3 col-form-label">
														<?php echo $this->lang->line('label_has_pickup'); ?> :
													</label>
	                                                <label class="col-xl-9 col-lg-9 col-form-label text-left">
	                                                	<label class="<?php echo ($result['has_pickup'] =="Yes") ? 'm--font-success' : 'm--font-danger' ?>"><?php echo $result['has_pickup'];?></label>
	                                                </label>
												</div>  -->
											</div> 

										</div> 						
									</div>
								</div>
							</div>
							<div class="col-xl-8 col-lg-8">
								<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-tools">
											<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link <?php if($tab_id=="1") echo "active";?> " data-toggle="tab" href="#m_user_profile_tab_1 " role="tab" data-tab_id = "1">
														<i class="flaticon-share m--hide"></i>
														<?php echo $this->lang->line('label_pickup'); ?>
													</a>
												</li>
												<li class="nav-item m-tabs__item ">
													<a class="nav-link m-tabs__link <?php if($tab_id=="2") echo "active";?> " data-toggle="tab" href="#m_user_profile_tab_2" role="tab" data-tab_id = "2">
														<?php echo $this->lang->line('label_invoice'); ?>
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link <?php if($tab_id=="3") echo "active";?> " data-toggle="tab" href="#m_user_profile_tab_3" role="tab" data-tab_id = "3">
														<?php echo $this->lang->line('label_payments'); ?>
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link <?php if($tab_id=="4") echo "active";?> " data-toggle="tab" href="#m_user_profile_tab_4" role="tab" data-tab_id = "4">
														<?php echo $this->lang->line('label_maintenance'); ?>
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link <?php if($tab_id=="5") echo "active";?> " data-toggle="tab" href="#m_user_profile_tab_5" role="tab" data-tab_id = "5">
														<?php echo $this->lang->line('label_autocall'); ?>
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link <?php if($tab_id=="6") echo "active";?> " data-toggle="tab" href="#m_user_profile_tab_6" role="tab" data-tab_id = "6">
														<?php echo $this->lang->line('label_ship_to'); ?>
													</a>
												</li>

											</ul>
										</div>
									</div>
									<div class="tab-content">
										<div class="tab-pane <?php if($tab_id=="1") echo "active";?> " id="m_user_profile_tab_1">
											<div class="m-portlet__body">
				                                <!--begin: Search Form -->
				                                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
				                                    <div class="row align-items-center">
				                                        <div class="col-xl-8 order-2 order-xl-1">
				                                            <div class="form-group m-form__group row align-items-center">
				                                                
				                                                <div class="col-md-4">
				                                                    <div class="m-input-icon m-input-icon--left">
				                                                        <input type="text" class="form-control m-input" placeholder=" <?php echo $this->lang->line('label_search'); ?>" id="m_form_search">
				                                                        <span class="m-input-icon__icon m-input-icon__icon--left">
				                                                            <span>
				                                                                <i class="la la-search"></i>
				                                                            </span>
				                                                        </span>
				                                                    </div>
				                                                </div> 
				                                            </div>
				                                        </div>
				                                    </div>
				                                </div>
				                                <!--end: Search Form -->
				                                <!--begin: Datatable -->
				                                <div class="pickup_datatable" id="pickup_datatable"></div>
				                                <!--end: Datatable -->
				                            </div> 
										</div>

										<div class="tab-pane <?php if($tab_id=="2") echo "active";?> " id="m_user_profile_tab_2">
											 
										</div>
										<div class="tab-pane <?php if($tab_id=="3") echo "active";?> " id="m_user_profile_tab_3">
											
										</div>
										<div class="tab-pane <?php if($tab_id=="4") echo "active";?> " id="m_user_profile_tab_4">
											
										</div>
										<div class="tab-pane <?php if($tab_id=="5") echo "active";?> " id="m_user_profile_tab_5">
											
										</div>
										<div class="tab-pane <?php if($tab_id=="6") echo "active";?> " id="m_user_profile_tab_6"> 
				                            <div class="m-portlet__body">
				                                <!--begin: Search Form -->
				                                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
				                                    <div class="row align-items-center">
				                                        <div class="col-xl-8 order-2 order-xl-1">
				                                            <div class="form-group m-form__group row align-items-center">
				                                                
				                                                <div class="col-md-4">
				                                                    <div class="m-input-icon m-input-icon--left">
				                                                        <input type="text" class="form-control m-input" placeholder=" <?php echo $this->lang->line('label_search'); ?>" id="m_form_search">
				                                                        <span class="m-input-icon__icon m-input-icon__icon--left">
				                                                            <span>
				                                                                <i class="la la-search"></i>
				                                                            </span>
				                                                        </span>
				                                                    </div>
				                                                </div>
				                                                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
				                                                    <a href="<?php echo site_url('company/customer/add_shipto/').$result['id']; ?>" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
				                                                        <span>
				                                                            <i class="la la-plus"></i> 
				                                                            <span>
				                                                                <?php echo $this->lang->line('label_add_shipto'); ?>
				                                                            </span>
				                                                        </span>
				                                                    </a>
				                                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
				                                                </div>
				                                            </div>
				                                        </div>
				                                    </div>
				                                </div>
				                                <!--end: Search Form -->
				                                <!--begin: Datatable -->
				                                <div class="m_datatable" id="ajax_data"></div>
				                                <!--end: Datatable -->
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

        	/* Ship to table */
            var m_datatables = null;
            var DatatableRemoteAjaxDemo = function() {
            var t = function() {
            var t = $(".m_datatable").mDatatable({
		                data: {
		                    type: "remote",
		                    source: {
		                        read: {
		                            url: "<?php echo site_url('company/customer/shipto_ajax_list/') ?>",
	                             	method: 'GET',
			                        params: {
			                        	customer_id: "<?php echo $result['id']; ?>"
			                        }
		                        }, 
		                    },
		                    pageSize: 10,
		                    saveState: {
		                        cookie: false,
		                        webstorage: false
		                    },
		                    serverPaging: true,
		                    serverFiltering: true,
		                    serverSorting: true
		                },
		                layout: {
		                    theme: "default",
		                    class: "",
		                    scroll: false,
		                    footer: false
		                },
		                sortable: true,
		                pagination: true,
		                columns: [{
		                    field: "id",
		                    title: "#",
		                    //sortable: !1,
		                    width: 50,
		                    selector: false,
		                    textAlign: "center"
		                }, {
		                    field: "name",
		                    title: "<?php echo $this->lang->line('label_name'); ?>",
		                    width: 100,
		                }, {
		                    field: "address",
		                    title: "<?php echo $this->lang->line('label_address'); ?>",
		                    width: 150,
		                }, {
		                    field: "telephone_number",
		                    title: "<?php echo $this->lang->line('label_telephone'); ?>",
		                }, {
		                    field: "cellphone_number",
		                    title: "<?php echo $this->lang->line('label_cellphone'); ?>",
		                },{
		                    field: "Actions",
		                    width: 110,
		                    title: "<?php echo $this->lang->line('label_actions'); ?>",
		                    sortable: !1,
		                    overflow: "visible",
		                    template: function(t) {
		                    	/*\t\t\t\t\t\t</a>\t\t\t\t\t\t<a href="<?php echo base_url()."company/customer/view_shipto/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-eye"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t</a>\t\t\t\t\t\t</a>*/
		                        return '\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url()."company/customer/edit_shipto/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" >\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t\t\t\t\t\t<a href="javascript:;" onclick="delete_shipto('+t.id+')" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" >\t\t\t\t\t\t\t<i class="la la-trash"></i>\t\t\t\t\t\t</a>'
		                    }
		                }]
		            }),
                    e = t.getDataSourceQuery();
                    m_datatables = t;
                    $("#m_form_search").on("keyup", function(e) {
                        var a = t.getDataSourceQuery();
                        a.generalSearch = $(this).val().toLowerCase(), t.setDataSourceQuery(a), t.load()
                    }).val(e.generalSearch), $("#m_form_status").on("change", function() {
                        var e = t.getDataSourceQuery();
                        e.Status = $(this).val().toLowerCase(), t.setDataSourceQuery(e), t.load()
                    }).val(void 0 !== e.Status ? e.Status : ""), $("#m_form_type").on("change", function() {
                        var e = t.getDataSourceQuery();
                        e.Type = $(this).val().toLowerCase(), t.setDataSourceQuery(e), t.load()
                    }).val(void 0 !== e.Type ? e.Type : ""), $("#m_form_status, #m_form_type").selectpicker()

                };
                return {
                    init: function() {
                        t()
                    }
                }
            }();
            jQuery(document).ready(function() {
                DatatableRemoteAjaxDemo.init()
            });
 	
 			$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
				var tab_id = $(e.target).data("tab_id") // activated tab
				document.cookie = "tab_id="+tab_id; 
			})

            function delete_shipto(id) 
            {
                swal({   
                    title: "<?php echo $this->lang->line('label_are_you_sure') ?>",
                    text: "<?php echo $this->lang->line('label_you_want_to_delete_shipto') ?>",
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "<?php echo $this->lang->line('label_confirm') ?>",
                }).then(function () {
                    $.ajax({
                        url:  "<?php echo base_url(); ?>company/customer/delete_shipto/"+id,
                        type: "GET",
                        success: function(data)
                        {
                            //$('#user_table').bootstrapTable('refresh');
                            //$(".m_datatable").mDatatable().ajax.reload();
                            //DatatableRemoteAjaxDemo.init();
                            m_datatables.reload();
                        },
                            error: function(jqXHR, textStatus, errorThrown){                
                        },
                            complete: function(){
                        }
                    }); // END OF AJAX CALL
                    
                });
            }

            /* Pickup table */
            var pickup_datatables = null;
            var GetPickupDdatatables = function() {
            var t = function() {
            var t = $("#pickup_datatable").mDatatable({
		                data: {
		                    type: "remote",
		                    source: {
		                        read: {
		                            url: "<?php echo site_url('company/customer/pickup_ajax_list/') ?>",
	                             	method: 'GET',
			                        params: {
			                        	customer_id: "<?php echo $result['id']; ?>"
			                        }
		                        }, 
		                    },
		                    pageSize: 10,
		                    saveState: {
		                        cookie: false,
		                        webstorage: false
		                    },
		                    serverPaging: true,
		                    serverFiltering: true,
		                    serverSorting: true
		                },
		                layout: {
		                    theme: "default",
		                    class: "",
		                    scroll: false,
		                    footer: false
		                },
		                sortable: true,
		                pagination: true,
		                columns: [{
		                    field: "id",
		                    title: "#",
		                    //sortable: !1,
		                    width: 50,
		                    selector: false,
		                    textAlign: "center"
		                }, {
		                    field: "name",
		                    title: "<?php echo $this->lang->line('label_name'); ?>",
		                    width: 100,
		                }, {
		                    field: "address",
		                    title: "<?php echo $this->lang->line('label_address'); ?>",
		                    width: 150,
		                }, {
		                    field: "telephone_number",
		                    title: "<?php echo $this->lang->line('label_telephone'); ?>",
		                }, {
		                    field: "cellphone_number",
		                    title: "<?php echo $this->lang->line('label_cellphone'); ?>",
		                },/*{
		                    field: "Actions",
		                    width: 110,
		                    title: "<?php echo $this->lang->line('label_actions'); ?>",
		                    sortable: !1,
		                    overflow: "visible",
		                    template: function(t) {
		                        return '\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url()."company/customer/edit_shipto/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" >\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t<a href="<?php echo base_url()."company/customer/view_shipto/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-eye"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t</a>\t\t\t\t\t\t</a>\t\t\t\t\t\t\t\t\t\t\t<a href="javascript:;" onclick="delete_shipto('+t.id+')" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" >\t\t\t\t\t\t\t<i class="la la-trash"></i>\t\t\t\t\t\t</a>'
		                    }
		                }*/]
		            }),
                    e = t.getDataSourceQuery();
                    pickup_datatables = t;
                    $("#m_form_search").on("keyup", function(e) {
                        var a = t.getDataSourceQuery();
                        a.generalSearch = $(this).val().toLowerCase(), t.setDataSourceQuery(a), t.load()
                    }).val(e.generalSearch), $("#m_form_status").on("change", function() {
                        var e = t.getDataSourceQuery();
                        e.Status = $(this).val().toLowerCase(), t.setDataSourceQuery(e), t.load()
                    }).val(void 0 !== e.Status ? e.Status : ""), $("#m_form_type").on("change", function() {
                        var e = t.getDataSourceQuery();
                        e.Type = $(this).val().toLowerCase(), t.setDataSourceQuery(e), t.load()
                    }).val(void 0 !== e.Type ? e.Type : ""), $("#m_form_status, #m_form_type").selectpicker()

                };
                return {
                    init: function() {
                        t()
                    }
                }
            }();
            jQuery(document).ready(function() {
                GetPickupDdatatables.init()
            });
 	
        </script>
        <!--end::Page Snippets -->

	</body>
	<!-- end::Body -->
</html>
