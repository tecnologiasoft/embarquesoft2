<!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>
        <?php echo $this->site_name; ?> | Merchant Store List
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
            <?php  $data['pagename'] = "merchantstore"; $data['subpagename'] = ""; $this->load->view('admin/inc/left-menu',$data);  ?>
            <!-- END: Left Aside -->
            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                <!-- BEGIN: Subheader -->
                <div class="m-subheader ">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="m-subheader__title m-subheader__title--separator">
                                Merchant Store List
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
                                    <a href="<?php echo site_url();?>admin/merchantstore/listing" class="m-nav__link">
                                        <span class="m-nav__link-text">
                                            Merchant Store List
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
                                                <div class="m-form__group m-form__group--inline">
                                                    <div class="m-form__label">
                                                        <label>
                                                            Status:
                                                        </label>
                                                    </div>
                                                    <div class="m-form__control">
                                                        <select class="form-control m-bootstrap-select" id="m_form_status">
                                                            <option value="">
                                                                All
                                                            </option>
                                                            <option value="Verified">
                                                                Verified
                                                            </option>
                                                            <option value="Unverified">
                                                                Unverified
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="d-md-none m--margin-bottom-10"></div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="m-form__group m-form__group--inline">
                                                    <div class="m-form__label">
                                                        <label class="m-label m-label--single">
                                                            Category:
                                                        </label>
                                                    </div>
                                                    <div class="m-form__control">
                                                        <select class="form-control m-bootstrap-select" id="m_form_category">
                                                            <option value="">All Category</option>
                                                            <?php 
                                                            $category_list = $this->common->category_list();
                                                            if(!empty($category_list)) { 
                                                            foreach ($category_list as $row){  ?>
                                                                <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
                                                            <?php } } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="d-md-none m--margin-bottom-10"></div>
                                            </div>
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
                                        </div>
                                    </div>
                                    <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                        <a href="<?php echo site_url('admin/merchantstore/add');?>" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
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
                        url: "<?php echo site_url('admin/merchantstore/ajax_list')?>"
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
            sortable: false,
            pagination: true,
            columns: [{
                field: "id",
                title: "#",
            //sortable: !1,
            width: 50,
            selector: false,
            textAlign: "center"
        }, {
            field: "merchant_name",
            title: "Merchant",
            width: 100,
        }, {
            field: "category",
            title: "Category",
            width: 100,
        }, {
            field: "store_name",
            title: "Store",
        }, {
            field: "contact_name",
            title: "Contact Name",
        }, {
            field: "contact_phone",
            title: "Contact Phone",
        }, {
            field: "address",
            title: "Address",
        }, {
            field: "status",
            title: "Status",
            template: function(t) {
                var e = {
                    1: {
                        title: "Verified",
                        class: "m-badge--success"
                    },
                    0: {
                        title: "Unverified",
                        class: " m-badge--danger"
                    }
                };
                return '<a href="javascript:;" onclick="change_state('+ t.id +','+t.reverse_state+');" ><span class="m-badge ' + e[t.status].class + ' m-badge--wide">' + e[t.status].title + "</span></a>"
            }
        }, {
            field: "Actions",
            width: 110,
            title: "Actions",
            sortable: !1,
            overflow: "visible",
            template: function(t) {
                return '\t\t\t\t\t\t<a href="<?php echo base_url()."admin/merchantstore/view/";?>'+t.encode_id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="View">\t\t\t\t\t\t\t<i class="la la-eye"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url()."admin/merchantstore/edit/";?>'+t.encode_id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>'
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
}).val(void 0 !== e.Status ? e.Status : ""), $("#m_form_category").on("change", function() {
    var e = t.getDataSourceQuery();
    e.Category = $(this).val().toLowerCase(), t.setDataSourceQuery(e), t.load()
}).val(void 0 !== e.Category ? e.Category : ""), $("#m_form_status, #m_form_category").selectpicker()
};
return {
    init: function() {
        t();

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
            url:  "<?php echo site_url();?>admin/merchantstore/merchantstore_state/"+id+"/"+status,
            type: "GET",
            success: function(data)
            {
                //$('#user_table').bootstrapTable('refresh');
                //$(".m_datatable").mDatatable().reload();
                m_datatables.reload();
                //DatatableRemoteAjaxDemo.init();
                //window.location.href = "<?php echo base_url()."admin/merchantstore/listing"; ?>"
            },
            error: function(jqXHR, textStatus, errorThrown){                
            },
            complete: function(){
            }
        }); // END OF AJAX CALL

    });
}
</script>
</body>
<!-- end::Body -->
</html>
