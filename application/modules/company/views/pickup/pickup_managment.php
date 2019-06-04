 <style>
 input[type = "checkbox"]{
 width: 26px;
    height: 22px;
 }
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
                                        <div class="col-xl-12 order-2 order-xl-1">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4">
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-4 col-form-label"><?php echo $this->lang->line('label_search'); ?></label>
                                                        <div class="col-8">
                                                            <input class="form-control m-input" type="text" value="" id="m_form_search" placeholder="<?php echo $this->lang->line('label_search'); ?>">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-4 col-form-label"><?php echo $this->lang->line('label_reports'); ?></label>
                                                        <div class="col-8">
                                                            <select class="form-control m-input" id = "report_type" name = "report_type">
                                                               <option value = ""><?php echo $this->lang->line('label_select_report'); ?></option>
                                                               <option value = "1"><?php echo $this->lang->line('label_detail_report'); ?></option>
                                                               <option value = "2"><?php echo $this->lang->line('label_basic_report'); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                               
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-4 col-form-label"><?php echo $this->lang->line('label_date').' A'; ?></label>
                                                        <div class="col-8">
                                                            <input class="form-control m-input" type="text" value="" id="from_date" placeholder="<?php echo $this->lang->line('label_date').' A'; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <script>
                                                    $(document).on('change','#report_type',function(){
                                                        
                                                            var reportType = $(this).val();
                                                            

                                                            
                                                            var p = '_';
                                                            $(".chk_print").each(function(e){
                                                              if($(this).data('id') != undefined && $(this).prop('checked') == true){
                                                              p = $(this).data('id')+'_'+p;
                                                                }
                                                            })

                                                            
                                                            
                                                            if((reportType != "") && (p.length > 2)){
                                                                var url = SITE_URL+'company/pickup/pdf/'+reportType+'/'+btoa(p);
                                                                window.location.href = url;
                                                            }
                                                            
                                                            
                                                            
                                                    });
                                                    </script>
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-4 col-form-label"><?php echo $this->lang->line('label_date').' B'; ?></label>
                                                        <div class="col-8">
                                                            <input class="form-control m-input" type="text" value="" id="to_date" placeholder="<?php echo $this->lang->line('label_date').' B'; ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-4 col-form-label"><?php echo $this->lang->line('label_driver'); ?></label>
                                                        <div class="col-8">
                                                        <select class="form-control m-input" id="driver_list">
                                                               <option value = ""><?php echo $this->lang->line('label_select').' '.$this->lang->line('label_driver'); ?></option>
                                                               <?php foreach($driver_list as $value){ ?>
                                                                <option value = "<?php echo $value['id']; ?>"><?php echo $value['fname'].' '.$value['lname'];  ?></option>
                                                               <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-4 col-form-label"><?php echo $this->lang->line('label_zone'); ?></label>
                                                        <div class="col-8">
                                                            <select class="form-control m-input" id="zone">
                                                               <option value = ""><?php echo $this->lang->line('label_select').' '.$this->lang->line('label_zone'); ?></option>
                                                               <?php foreach($zone_list as $value){ ?>
                                                                <option value = "<?php echo $value['id']; ?>"><?php echo $value['zone'];  ?></option>
                                                               <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-4 col-form-label"><?php echo $this->lang->line('lable_order'); ?></label>
                                                        <div class="col-8">
                                                            <select class="form-control m-input" id = "ordering" name = "ordering">
                                                               <option value = "zipcode"><?php echo $this->lang->line('label_zipcode'); ?></option>
                                                               <option value = "city"><?php echo $this->lang->line('label_city'); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-4 col-form-label"><?php echo $this->lang->line('lable_view'); ?></label>
                                                        <div class="col-8">
                                                            <select class="form-control m-input" id="pickup_status">

                                                                <option value = ""><?php echo $this->lang->line('label_select').'  '.$this->lang->line('label_status'); ?></option>
                                                                <option value = "Done"><?php echo $this->lang->line('label_done'); ?></option>
                                                                <option value = "Not Done"><?php echo $this->lang->line('label_not_done'); ?></option>
                                                                <option value = ""><?php echo $this->lang->line('label_all'); ?></option>
                                                                <option value = "Assigned"><?php echo $this->lang->line('label_assigned'); ?></option>
                                                                <option value = "Not Assigned"><?php echo $this->lang->line('label_not').' '.$this->lang->line('label_assigned'); ?></option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                <div class="form-group m-form__group row">
                                                        
                                                        <div class="col-12">
                                                            <a href="javascript:void(0);" class="btn btn-info m-btn m-btn--custom m-btn--air m-btn--pill"  id = "assign_new_pickup_btn">  
                                                                <?php echo $this->lang->line('label_assign'); ?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        
                                                        <div class="col-12">
                                                            <a href="javascript:void(0);"  class="btn btn-info m-btn m-btn--custom m-btn--air m-btn--pill" id = "pickup_move_btn"> 
                                                                <?php echo $this->lang->line('label_move'); ?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                <!-- <div class="col-md-4">
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
                                                </div> -->
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



        <div class="modal fade" id="new_customer_pickup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-custom">
                        <h5 class="modal-title text-white" id="exampleModalLabel">
                            <?php echo $this->lang->line('label_move_pickup'); ?>
                        </h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                &times;
                            </span>
                        </button>
                    </div>
                    
                      
                      <div class="modal-body">
                      
                            <div class="row">
                                
                                    
                               
                                <div class="col-xl-12 align-items-center">
                                    <div class="row">
                                        <label class="col-lg-4 col-form-label col-form-label-right mb-3 form_label text-right">
                                            *<?php echo $this->lang->line('label_pickup_date'); ?>:
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control m-input" name="move_date" id="move_date" placeholder="<?php echo $this->lang->line('label_pickup_date'); ?>" >
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal" >
                                <?php echo $this->lang->line('label_back'); ?>
                        </button>
                            <button type="submit" class="btn btn-success" id = "move_pickup_date">
                                <?php echo $this->lang->line('label_submit'); ?>
                            </button>
                        </div>
                    
                </div>
            </div>
        </div>




        <div class="modal fade" id="new_assign_pickup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-custom">
                        <h5 class="modal-title text-white" id="exampleModalLabel">
                            <?php echo $this->lang->line('label_assign_drivers'); ?>
                        </h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                &times;
                            </span>
                        </button>
                    </div>
                    
                      
                      <div class="modal-body">
                      
                            <div class="row">
                                
                                    
                               
                                <div class="col-xl-12 align-items-center">
                                    <div class="row">
                                        <label class="col-lg-4 col-form-label col-form-label-right mb-3 form_label text-right">
                                            *<?php echo $this->lang->line('label_driver'); ?>:
                                        </label>
                                        <div class="col-lg-8">
                                            
                                             <select class = "form-control m-input" id = "cmb_driver_id" name = "cmb_driver_id">
                                             <option value = ""><?php echo $this->lang->line('label_select').' '.$this->lang->line('label_driver'); ?></option>
                                             <?php foreach($driver_list as $value) {?>
                                               <option value = "<?php echo $value['id']?>"><?php echo $value['fname'].' '.$value['lname']; ?></option>
                                             <?php } ?>
                                             </select>
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal" >
                                <?php echo $this->lang->line('label_back'); ?>
                        </button>
                            <button type="submit" class="btn btn-success" id = "move_driver">
                                <?php echo $this->lang->line('label_submit'); ?>
                            </button>
                        </div>
                    
                </div>
            </div>
        </div>
               
        <script type="text/javascript">
        $(document).on('click','#pickup_move_btn',function(){
            if($('#pickup_status').val() == 'Not Done'){
                $("#new_customer_pickup").modal('show');_
            }else{
                return false;
            }
        });

        $(document).on('click','#assign_new_pickup_btn',function(){
            if($('#pickup_status').val() == 'Not Assigned'){
                $("#new_assign_pickup").modal('show');_
            }else{
                return false;
            }
        });

        $(document).on('click','#move_driver',function(){

                var p = new Array;
                
                    $(".chk_driver").each(function(e){
                        if($(this).data('id') != undefined && $(this).prop('checked') == false){
                            p.push($(this).data('id'));
                        }
                    })
                        if(p.length < 1){
                            return false;
                        }
                
                    var data = {id:p,driver_id:$("#cmb_driver_id").val(),type:'driver'};
                

                var url = SITE_URL+'company/pickup/update_status';
                

                ajaxCall(url, data, function(response){

                    getMessage(response.status,response.message);
                    $("#new_assign_pickup").modal('hide');
                    m_datatables.reload();
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

  //          $("#from_date, #to_date").val(today);

            var m_datatables = null;
            var DatatableRemoteAjaxDemo = function() {
            var t = function() {
            var t = $(".m_datatable").mDatatable({
                data: {
                    type: "remote",
                    source: {
                        read: {
                            url: "<?php echo site_url('company/pickup/pickup_managment_ajax_list')?>",
                            method: 'GET',
                            query: {
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
                    serverSorting: false
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
                    selector: false,
                    textAlign: "center",
                    width: 50,
                    template: function(t) {
                       
                        /*\t\t\t\t\t\t<a href="<?php echo base_url()."company/pickup/view/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-eye"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t</a>*/
                        return '\t\t\t\t\t\t\t\t\t\t\t<a data-update-count =  '+t.update_count+' href="<?php echo base_url()."company/pickup/edit/";?>'+t.id+'">'+t.id+'</a>'
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
                },
                {
                    field: "chk_status",
                    title: "<label class=' m-checkbox m-checkbox--bold text-white'><input type = 'checkbox' name = 'chk' class = 'chk_status'><?php echo $this->lang->line('label_done'); ?><span></span></label>",
                },
                {
                    field: "chk_print",
                    title: "<label class=' m-checkbox m-checkbox--bold text-white'><input type = 'checkbox' name = 'chk' class = 'chk_print' checked><?php echo $this->lang->line('label_print'); ?><span></span></label>",
                },
                {
                    field: "chk_driver",
                    title: "<label class=' m-checkbox m-checkbox--bold text-white'><input type = 'checkbox' name = 'chk' class = 'chk_driver'><?php echo $this->lang->line('field_driver'); ?><span></span></label>",
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
                    }).val(e.generalSearch), 
                    
                    $("#m_form_status").on("change", function() {
                        var e = t.getDataSourceQuery();
                        e.Status = $(this).val().toLowerCase(), t.setDataSourceQuery(e), t.load()
                    }).val(void 0 !== e.Status ? e.Status : ""), 
                    
                    $("#to_date").on("change", function() {
                        var e = t.getDataSourceQuery();
                        var dates = $("#from_date").val()+'___'+$(this).val().toLowerCase();
                        e.pickup_date = dates, t.setDataSourceQuery(e), t.load()
                    }).val(e.pickup_date),

                    $("#from_date").on("change", function() {
                        if($("#to_date").val() == "") return false;
                        var e = t.getDataSourceQuery();
                        var dates = $(this).val().toLowerCase()+'___'+$("#to_date").val();
                        e.pickup_date = dates, t.setDataSourceQuery(e), t.load()
                    }).val(e.pickup_date),

                    $("#pickup_status").on("change", function() {
                        
                        var e = t.getDataSourceQuery();
                        var pickup_status = $(this).val();
                        e.pickup_status = pickup_status, t.setDataSourceQuery(e), t.load()
                    }).val(e.pickup_status),


                    $("#driver_list").on("change", function() {
                        
                        var e = t.getDataSourceQuery();
                        var pickup_status = $(this).val();
                        e.driver_id = pickup_status, t.setDataSourceQuery(e), t.load()
                    }).val(e.driver_id),

                    
                    $("#zone").on("change", function() {
                        
                        var e = t.getDataSourceQuery();
                        var zone = $(this).val();
                        e.zone_id = zone, t.setDataSourceQuery(e), t.load()
                    }).val(e.zone_id),
                
                    
                    
                    $("#m_form_type").on("change", function() {
                        var e = t.getDataSourceQuery();
                        e.Type = $(this).val().toLowerCase(), t.setDataSourceQuery(e), t.load()
                    }).val(void 0 !== e.Type ? e.Type : ""),
                    
                    $("#m_form_status, #m_form_type").selectpicker()
                };
                return {
                    init: function() {
                        t()
                    }
                }
            }();
            jQuery(document).ready(function() {
                DatatableRemoteAjaxDemo.init()

                setTimeout(function(){
                    change_color_tr();

                }, 2000);
                

  


            });

            function change_color_tr(){
                $(".m-datatable__row").each(function(e){
                        console.log($(this).children('td:first').children('span').children('a').attr('data-update-count'));

                        if($(this).children('td:first').children('span').children('a').attr('data-update-count') >= '2'){
                            $(this).removeClass('m-datatable__row--even');
                            $(this).removeClass('m-datatable__row--odd');
                            $(this).css('background-color','#ff8787');
                        }

                        if($(this).children('td:first').children('span').children('a').attr('data-update-count') == '1'){
                            $(this).removeClass('m-datatable__row--even');
                            $(this).removeClass('m-datatable__row--odd');
                            $(this).css('background-color','#ffff91');
                        }
                });
            }

            $(document).on('change','input[name = "chk"]',function(){
                var className = $(this).attr('class');
                if($(this).is(':checked')){
                    $('.'+className).prop('checked',true);
                }else{
                    $('.'+className).prop('checked',false);
                }
            });
            /* date picker */
           
                $(document).ready(function(){
                   

                    // set default dates
                    var start = new Date();
                    // set end date to max one year period:
                    var end = new Date(new Date().setYear(start.getFullYear()+1));

                    $('#from_date').datepicker({
                        
                        autoclose: true,
                        endDate   : end,
                        format: "mm/dd/yyyy"
                        
                    // update "toDate" defaults whenever "fromDate" changes
                    }).on('changeDate', function(){
                        // set the "toDate" start to not be later than "fromDate" ends:
                        $('#to_date').datepicker('setStartDate', new Date($(this).val()));
                    });

                    $('#to_date').datepicker({
                        autoclose: true,
                        endDate   : end,
                        format: "mm/dd/yyyy"
                        
                    // update "fromDate" defaults whenever "toDate" changes
                    }).on('changeDate', function(){
                        // set the "fromDate" end to not be later than "toDate" starts:
                        $('#from_date').datepicker('setEndDate', new Date($(this).val()));
                    });

                });

                
               
            
            
            jQuery(document).ready(function() {
                
                
                $("#move_date").datepicker({
                        todayHighlight: !0,
                        orientation: "bottom left",
                        templates: {
                            leftArrow: '<i class="la la-angle-left"></i>',
                            rightArrow: '<i class="la la-angle-right"></i>'
                        },
                        autoclose: true,
                        /*format: "yyyy-mm-dd"*/
                        format: "mm/dd/yyyy"
                    })
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


            $(document).on('click','#move_pickup_date',function(){
                var p = new Array;
          
                $(".chk_status").each(function(e){
                    if($(this).data('id') != undefined && $(this).prop('checked') == false){
                    p.push($(this).data('id'));
                    }
                })
                var move_date = $("#move_date").val();
                if(move_date == "" && p.length < 1){
                    return false;
                }
                var url = SITE_URL+'company/pickup/update_status';
                var data = {id:p,move_date:move_date,type:'date'};

                ajaxCall(url, data, function(response){
                    getMessage(response.status,response.message);
                    $("#new_customer_pickup").modal('hide');
                    m_datatables.reload();
                    setTimeout(function(){
                    change_color_tr();

                }, 2000);
                    
                    return false;
                });

                
            });

            
            // $(document).on('click','input[name = "chk_status[]"]',function(){
            //     var url = SITE_URL+'company/pickup/update_pickup_status';
            //     var data = {id:[$(this).data('id')],status:$(this).is(':checked') ? 'Done' : 'Not Done'};

            //     ajaxCall(url, data, function(response){

            //         console.log(response);
            //         return false;
            //     });
            // })
        </script>
        <!--end::Page Snippets -->

