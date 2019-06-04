
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
                                                <div class="col-xl-3 order-1 order-xl-2 m--align-right">
                                                    <a href="<?php echo base_url('company/customer/add'); ?>" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                                        <span>
                                                            <i class="la la-user-plus"></i> 
                                                            <span>
                                                                <?php echo $this->lang->line('label_add_customer'); ?>
                                                            </span>
                                                        </span>
                                                    </a>

                                                    
                                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                    
                                                </div>
                                                
                                                <div class="col-xl-1 order-1 order-xl-2 m--align-right">
                                                    <a href="<?php echo base_url('company/pickup/'); ?>" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                                        <span>
                                                            <i class="la la-arrow-left"></i> 
                                                            <span>
                                                                <?php echo $this->lang->line('label_back'); ?>
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
                
        <script type="text/javascript">
            var m_datatables = null;
            var DatatableRemoteAjaxDemo = function() {
            var t = function() {
            var t = $(".m_datatable").mDatatable({
                data: {
                    type: "remote",
                    source: {
                        read: {
                            url: "<?php echo site_url('company/pickup/customer_ajax_list')?>"
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
                    title: "<?php echo $this->lang->line('label_name'); ?>",
                    template: function(t) {
                        return '\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url()."company/pickup/select_customer/";?>'+t.id+'">'+t.name+'</a>'
                    }
                }, {
                    field: "address_line1",
                    title: "<?php echo $this->lang->line('label_address_1'); ?>",
                }, {
                    field: "telephone_number",
                    title: "<?php echo $this->lang->line('label_telephone'); ?>",
                }, {
                    field: "cellphone_number",
                    title: "<?php echo $this->lang->line('label_cellphone'); ?>",
                },
                {
                    field: "balance",
                    title: "<?php echo $this->lang->line('label_balance'); ?>",
                    template:function(tv){
                        
                        var bal = tv.balance=== null ? '00.00' : tv.balance;

                        return '<span>'+bal+'</span>'
                    }
                },
                {
                    field: "Actions",
                    width: 110,
                    title: "<?php echo $this->lang->line('label_actions'); ?>",
                    sortable: !1,
                    overflow: "visible",
                    template: function(t) {
                        return '\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url()."company/pickup/select_customer/";?>'+t.id+'" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-arrow-right"></i>\t\t\t\t\t\t</a>'
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

        </script>
     