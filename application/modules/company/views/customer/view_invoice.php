<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			<?php echo "embarquesoft"; ?>  | <?php echo "View Invoice Details"; ?>
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
                                    <?php echo "Invoice Details"; ?>
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
                                                <?php echo "Invoice Details"; ?>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="javascript:;" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                <?php echo "View invoice Details"; ?>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
						<?php 
							//echo "<pre>";
							//print_r($result['data']);
							//echo "</pre>";
							//die();?>
						<div class="row">
							
							<div class="col-xl-12 col-lg-12">
								<div class="tab-pane" id="m_user_profile_tab_3" aria-expanded="true">
                                    <div class="mm_datatable m-datatable m-datatable--default m-datatable--loaded" id="ajax_data1" style="">
                                    	<table class="m-datatable__table" id="m-datatable" style="overflow-x: auto;height: 100%;width: 100%;">
                                    		<thead class="m-datatable__head" style="background-color: blue;color:white;">
                                    			<tr class="m-datatable__row" style="height: 39px;">
                                    				<th data-field="id" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--sort"><span style="width: 30px;">#</span></th>
                                    				<th data-field="invoice_number" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 150px;">Invoice Id</span></th>
                                    				<th data-field="sub_total" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 150px;">Total Amount</span></th>
                                    				<th data-field="payments" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 150px;">Paid Amount</span></th>
                                    				<th data-field="final_balance" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 150px;">Balance</span></th>
                                    				<th data-field="invoice_date" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 150px;">Payment Date</span></th>
                                    				<th data-field="invoice_date" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 150px;">Transaction Id</span></th>
                                    				<th data-field="invoice_date" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 150px;">Receipt No.</span></th>
                                    				
                                    			</tr>
                                    		</thead>
                                    		<tbody class="m-datatable__body" style="">
                                    			<?php $a = 1; 
                                    			foreach ($result['data'] as $key => $value) {
                               			
                                    				?>
                                    				<tr data-row="0" class="m-datatable__row m-datatable__row--even" style="height: 42px;">
                                    				<td data-field="invoice_number" class="m-datatable__cell">
                                    					<span style="width: 60px;"><?php echo $a;?></span>
                                    				</td>
                                    				<td data-field="invoice_number" class="m-datatable__cell">
                                    					<span style="width: 180px;"><?php echo $value->invoice_id;?></span>
                                    				</td>
                                    				<td data-field="sub_total" class="m-datatable__cell">
                                    					<span style="width: 180px;"><?php echo $value->amount;?></span>
                                    				</td>
                                    				<td data-field="payments" class="m-datatable__cell">
                                    					<span style="width: 180px;"><?php echo $value->payed;?></span>
                                    				</td>
                                    				<td data-field="final_balance" class="m-datatable__cell">
                                    					<span style="width: 180px;">
                                    						<span><?php echo $value->balance;?></span>
                                    					</span>
                                    				</td>
                                    				<td data-field="invoice_date" class="m-datatable__cell">
                                    					<span style="width: 180px;"><?php echo $value->payment_date;?></span>
                                    				</td>
                                    				<td data-field="invoice_date" class="m-datatable__cell">
                                    					<span style="width: 180px;"><?php echo $value->transaction_id;?></span>
                                    				</td>
                                    				<td data-field="invoice_date" class="m-datatable__cell">
                                    					<span style="width: 180px;"><?php echo $value->receipt_number;?></span>
                                    				</td>
                                    				
                                    			</tr>
                                    			<?php 
                                    			$a++;
                                    		}?>
                                    			
                                    		</tbody>
                                    	</table>
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
		                            //url: "<?php echo site_url('company/customer/invoice_detail_ajax_list/') ?>",
		                            url: "<?php echo site_url('company/customer/ajax_list/') ?>",
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
 	
 			

           
           
 	
        </script>
        <!--end::Page Snippets -->

	</body>
	<!-- end::Body -->
</html>
