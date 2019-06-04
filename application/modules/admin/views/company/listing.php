<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            <?php echo $this->site_name; ?> | Company List
        </title>
        <meta name="description" content="Latest updates and statistic charts">
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
                    <?php  $data['pagename'] = "company"; $data['subpagename'] = ""; $this->load->view('admin/inc/left-menu',$data);  ?>
                <!-- END: Left Aside -->
                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    Company List
                                </h3>
                                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                                    <li class="m-nav__item m-nav__item--home">
                                        <a href="<?php echo site_url();?>admin/dashboard" class="m-nav__link m-nav__link--icon">
                                            <i class="m-nav__link-icon la la-home"></i>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="<?php echo site_url();?>admin/company/listing" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Company List
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END: Subheader -->
                    <div class="m-content">
                        
                        <div class="m-portlet m-portlet--mobile">
                            
                            <div class="m-portlet__body">
                                <!--begin: Search Form -->
                                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                    <div class="row align-items-center">
                                        <div class="col-xl-8 order-2 order-xl-1">
                                            <div class="form-group m-form__group row align-items-center">
                                                
                                                <div class="col-md-4">
                                                    <div class="m-input-icon m-input-icon--left">
                                                        <input type="text" class="form-control m-input" placeholder="Search..." id="m_form_search">
                                                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                                            <span>
                                                                <i class="la la-search"></i>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                                    <a href="<?php echo site_url('admin/company/add');?>" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                                        <span>
                                                            <i class="fa fa-user-plus"></i> 
                                                            <span>
                                                                Add
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
            <!-- end:: Body -->
            <!-- begin::Footer -->
                <?php   $this->load->view('admin/inc/footer');  ?>
            <!-- end::Footer -->
        </div>
        <!-- end:: Page -->
        <!--begin::Base Scripts -->
            <?php $this->load->view('admin/inc/scripts'); ?>
        <!--end::Base Scripts -->
        <!--begin::Page Snippets -->
        <script type="text/javascript">
            var m_datatables = null;
            var DatatableRemoteAjaxDemo = function() {
            var t = function() {
            var t = $(".m_datatable").mDatatable({
                data: {
                    type: "remote",
                    source: {
                        read: {
                            url: "<?php echo site_url('admin/company/ajax_list')?>"
                        }
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
                    title: "Name",
                    width: 150,
                }, {
                    field: "address",
                    title: "Address",
                    width: 250,
                }, {
                    field: "email",
                    title: "Email",
                    width: 150,
                }, {
                    field: "telephone_number",
                    title: "Phone",
                }, {
                    field: "city",
                    title: "City",
                },{
                    field: "state",
                    title: "State",
                },{
                    field: "website",
                    title: "Website",
                },/*
                {
                    field: "Actions",
                    width: 110,
                    title: "Actions",
                    sortable: !1,
                    overflow: "visible",
                    template: function(t) {
                        return '\t\t\t\t\t\t<a href="<?php echo base_url()."admin/company/view/";?>'+t.encode_id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="View">\t\t\t\t\t\t\t<i class="la la-eye"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url()."admin/company/edit/";?>'+t.encode_id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>'
                    }
                }*/]
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

            function change_state(id,status) 
            {
                swal({   
                    title: "Are you sure?",   
                    text: "You want to change status!",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Confirm",
                }).then(function () {
                    $.ajax({
                        url:  "<?php echo site_url();?>admin/company/company_state/"+id+"/"+status,
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
        </script>
        <!--end::Page Snippets -->
    </body>
    <!-- end::Body -->
</html>
