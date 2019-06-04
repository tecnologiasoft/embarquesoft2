
                    <!-- END: Subheader -->
                    <div class="m-content">
                        
                        <div class="m-portlet m-portlet--mobile">
                            
                            <div class="m-portlet__body">
                                <!--begin: Search Form -->
                                <div class="m-form m-form--label-align-right m--margin-bottom-30">
                                    <div class="row align-items-center">
                                        <div class="col-xl-8 order-2 order-xl-1">
                                            <div class="form-group m-form__group row align-items-center">
                                                
                                                <div class="col-md-4">
                                                    <div class="m-input-icon m-input-icon--left">
                                                        <input type="text" class="form-control m-input high-input" placeholder="<?php echo $this->lang->line('label_search'); ?>" id="m_form_search">
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
                                <div class="m_datatable" id="ajax_data"></div>
                                <!--end: Datatable -->
                            </div>
                        </div>
                    </div>
               
                           
  <style>
 
  </style>
                <div class="modal fade mm" id="another_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-lg modal-dialog-centered " role="document" id = "pay_invoice_model">
        
                  </div>
</div> 

        <script type="text/javascript">

        $(document).on('click','.invoice_pay',function(){
            var url  = SITE_URL+'company/payments/get_invoice_list';
            var ids = $(this).data('id');
            var data = {id:ids};
            if($("#bal_"+ids).text() == '00.00'){
                let msg = '<?php echo $this->lang->line("balance_must_be_grater_than_00_00"); ?>';
                getMessage('error',msg);
                return false;
            }
            
            ajaxCall(url,data,function(response){

                if(response.status==SUCCESS_CODE){

                    $("#pay_invoice_model").html('');
                    //alert(response.data);
                $("#pay_invoice_model").html(response.data);
                $("#another_popup").modal('show');

                }else{
                    alert(response.message);
                }

            });
        });
            var m_datatables = null;
            var DatatableRemoteAjaxDemo = function() {
            var t = function() {
            var t = $(".m_datatable").mDatatable({
                data: {
                    type: "remote",
                    source: {
                        read: {
                            url: "<?php echo site_url('company/customer/ajax_list')?>"
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
                    textAlign: "center",
                    template: function(t) {
                        <?php if($this->rights->access('company/customer/add') != 'javascript:void(0);') { ?>
                        return '\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url()."company/customer/edit/";?>'+t.id+'" class="">\t\t\t\t\t\t\t'+t.id+'\t\t\t\t\t\t</a>'
                         <?php } ?>

                         
                    } 

                }, {
                    field: "name",
                    title: "<?php echo $this->lang->line('label_name'); ?>",
                }, {
                    field: "address_line1",
                    title: "<?php echo $this->lang->line('label_address_1'); ?>", 
                    
                }, {
                    field: "telephone_number",
                    title: "<?php echo $this->lang->line('label_telephone'); ?>",
                }, {
                    field: "cellphone_number",
                    title: "<?php echo $this->lang->line('label_cellphone'); ?>",
                },{
                    field: "balance",
                    title: "<?php echo $this->lang->line('label_balance'); ?>",
                    template:function(tv){
                        
                        var bal = tv.balance=== null ? '00.00' : tv.balance;

                        return '<span id = "bal_'+tv.id+'">'+bal+'</span>'
                    }
                },
                {
                    field: "Actions",
                    width: 110,
                    title: "<?php echo $this->lang->line('label_payment'); ?>",
                    sortable: !1,
                    overflow: "visible",
                    template: function(t) {
                        /* \t\t\t\t\t\t<a href="<?php echo base_url()."company/customer/view/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-eye"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t</a> */
                        <?php if($this->rights->access('company/customer/add') != 'javascript:void(0);') { ?>
                        return '\t\t\t\t\t\t\t\t\t\t\t<a href = "javascript:void(0);" data-id="'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill invoice_pay">\t\t\t\t\t\t\t<i class="la la-dollar"></i>\t\t\t\t\t\t</a>'
                        <?php } ?>
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

            function delete_customer(id) 
            {
                swal({   
                    title: "<?php echo $this->lang->line('label_are_you_sure') ?>",
                    text: "<?php echo $this->lang->line('label_you_want_to_delete_customer') ?>",
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "<?php echo $this->lang->line('label_confirm') ?>",
                }).then(function () {
                    $.ajax({
                        url:  "<?php echo base_url(); ?>company/customer/delete/"+id,
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
