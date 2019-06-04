 <style>
 thead th .m-checkbox, thead th .m-radio{
	margin-bottom: 0px !important;
}
 </style>
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
                                                        <input type="text" class="form-control m-input" placeholder="<?php echo $this->lang->line('label_search'); ?>" id="m_form_search">
                                                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                                            <span>
                                                                <i class="la la-search"></i>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-2 order-1 order-xl-2 m--align-right">
                                                    <a href="<?php echo site_url('company/pickup/customer_listing');?>" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                                        <span>
                                                            <i class="la la-plus"></i> 
                                                            <span>
                                                                <?php echo $this->lang->line('label_add_pickup'); ?>
                                                            </span>
                                                        </span>
                                                    </a>
                                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="m-input-icon m-input-icon--left">
                                                        <input type="text" class="form-control m-input" placeholder="<?php echo $this->lang->line('label_pickup_date'); ?>" id="m_form_date">
                                                         <span class="m-input-icon__icon m-input-icon__icon--left">
                                                            <span>
                                                                <i class="la la-calendar"></i>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end: Search Form -->
                                <?php 
                                    $form_data = array('class' => '','id' => 'list_pickup','enctype'=>'multipart/form-data'); 
                                    echo form_open('company/pickup/update_list/',$form_data); 
                                ?> 
                                <!--begin: Datatable -->
                                <div class="m_datatable" id="ajax_data"></div>
                                <!--end: Datatable -->
                                <div class="row align-items-center">
                                        
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
               
        <script type="text/javascript">

$(document).on('change','.chk_status',function(){
                var p = new Array;
                if($(this).attr('name') == 'chk'){
                    $(".chk_status").each(function(e){
                        if($(this).data('id') != undefined){
                        p.push($(this).data('id'));
                        }
                    })
                    var data = {id:p,status:$('.chk_status').is(':checked') ? 'Done' : 'Not Done',type:'status'};
                }else{
                    var data = {id:[$(this).data('id')],status:$(this).is(':checked') ? 'Done' : 'Not Done',type:'status'};
                }

                var url = SITE_URL+'company/pickup/update_status';
                

                ajaxCall(url, data, function(response){
                    //m_datatables.reload();
                    console.log(response);
                    return false;
                });

                
            });

            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!

            var yyyy = today.getFullYear();
            if(dd<10){

                dd='0'+dd;
            } 
            if(mm<10){
                mm='0'+mm;
            } 
            var today = mm+'/'+dd+'/'+yyyy;

            var m_datatables = null;
            var DatatableRemoteAjaxDemo = function() {
            var t = function() {
            var t = $(".m_datatable").mDatatable({
                data: {
                    type: "remote",
                    source: {
                        read: {
                            url: "<?php echo site_url('company/pickup/ajax_list')?>",
                            method: 'GET',
                            params: {
                                pickup_date: today
                            }
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
                    selector: false,
                    textAlign: "center",
                    width: 50,
                    template: function(t) {
                        /*\t\t\t\t\t\t<a href="<?php echo base_url()."company/pickup/view/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-eye"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t</a>*/
                        return '\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url()."company/pickup/edit/";?>'+t.id+'">'+t.id+'</a>'
                    }
                }, {
                    field: "name",
                    title: "<?php echo $this->lang->line('label_name'); ?>", 
                }, {
                    field: "address",
                    title: "<?php echo $this->lang->line('label_address'); ?>", 
                }, {
                    field: "city",
                    title: "<?php echo $this->lang->line('label_city'); ?>",
                }, {
                    field: "telephone_number",
                    title: "<?php echo $this->lang->line('label_telephone'); ?>",
                },
               
                
                 {
                    field: "cellphone_number",
                    title: "<?php echo $this->lang->line('label_cellphone'); ?>",
                },{
                    field: "pickup_date",
                    title: "<?php echo $this->lang->line('label_pickup_date'); ?>",
                },{
                    field: "status",
                    title: "<?php echo $this->lang->line('label_status'); ?>",
                }, {
                    field: "balance",
                    title: "<?php echo $this->lang->line('label_balance'); ?>",
                }, {

                    field: "chk_status",
                    title: "<label class=' m-checkbox m-checkbox--bold text-white'><input type = 'checkbox' name = 'chk' class = 'chk_status'><?php echo $this->lang->line('label_done'); ?><span></span></label>",
                    
                },
                {
                    field: "Actions",
                    width: 110,
                    title: "<?php echo $this->lang->line('label_actions'); ?>",
                    sortable: !1,
                    overflow: "visible",
                    template: function(t) {
                        /*\t\t\t\t\t\t<a href="<?php echo base_url()."company/pickup/view/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-eye"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t</a>*/
                        return '\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url()."company/pickup/edit/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t\t\t\t\t\t<a href="javascript:;" onclick="delete_pickup('+t.id+')" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" >\t\t\t\t\t\t\t<i class="la la-trash"></i>\t\t\t\t\t\t</a>'
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
                    }).val(void 0 !== e.Status ? e.Status : ""), $("#m_form_date").on("change", function() {
                        var e = t.getDataSourceQuery();
                        e.pickup_date = $(this).val().toLowerCase(), t.setDataSourceQuery(e), t.load()
                    }).val(void 0 !== e.pickup_date ? e.pickup_date : today), $("#m_form_type").on("change", function() {
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


            /* date picker */
            var BootstrapDatepicker = function() {
                var t = function() {
                    $("#m_form_date").datepicker({
                        todayHighlight: !0,
                        orientation: "bottom left",
                        templates: {
                            leftArrow: '<i class="la la-angle-left"></i>',
                            rightArrow: '<i class="la la-angle-right"></i>'
                        },
                        autoclose: true,
                        /*format: "yyyy-mm-dd"*/
                        format: "mm/dd/yyyy",
                        setDate: new Date()
                    })
                };
                return {
                    init: function() {
                        t()
                    }
                }
            }();
            jQuery(document).ready(function() {
                BootstrapDatepicker.init()
            });

            function delete_pickup(id) 
            {
                swal({   
                    title: "<?php echo $this->lang->line('label_are_you_sure') ?>",
                    text: "<?php echo $this->lang->line('label_you_want_to_delete_pickup') ?>",
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "<?php echo $this->lang->line('label_confirm') ?>",
                }).then(function () {
                    $.ajax({
                        url:  "<?php echo base_url(); ?>company/pickup/delete/"+id,
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

