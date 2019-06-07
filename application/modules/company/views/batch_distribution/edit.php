<style>
   .vertical-a-t .m-checkbox{ vertical-align: top; margin-left: 5px; }
   .inner-checkbox-list{ margin-top: 10px; }
</style>
                          <!-- <?php //echo "<pre>";
                          //print_r($result);
                          //echo "</pre>";
                          ?> -->
  <div class="m-content">
     <!--begin::Form-->
     <?php
        $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right','id' => 'm_form_1','enctype'=>'multipart/form-data');
        echo form_open($formAction,$form_data);
      ?>

     <div class="row">
        <div class="col-xl-12">
           <div class="m-portlet m-portlet--full-height m-portlet--tabs">
              <div class="m-portlet__head">
                 <div class="m-portlet__head-tools">
                    <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--4x m-tabs-line--left m-tabs-line--primary" role="tablist">
                       <li class="nav-item m-tabs__item">
                          <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab" data-tab_id="1">
                          <i class="flaticon-share m--hide"></i>
                          <?php echo $this->lang->line('title_batch_list'); ?>
                          </a>
                       </li>
                    </ul>
                 </div>
              </div>
              <div class="tab-content">
                 <div class="tab-pane active" id="m_user_profile_tab_1">
                    <div class="m-portlet__body">
                       <div class="m-form__section m-form__section--first">
                       <div class="row">
                        <!-- <pre>
                        <?php //var_dump($result) ?>
                        </pre> -->
                             <div class="col-lg-6">
                                <div class="row mb-3">
                                   <label class="form_label col-md-4 col-lg-3 text-right">
                                   <?php echo $this->lang->line('label_date'); ?>:
                                   </label>
                                   <div class="col-md-8 col-lg-9">
                                      <input type="text" class="form-control m-input" name="id" id="id" placeholder="<?php echo $this->lang->line('label_id'); ?>" value="<?php echo $result['MDist_BatchNum']?$result['MDist_BatchNum']:set_value('date')?>">
                                      <?php echo form_error('date'); ?>
                                   </div>
                                </div>
                                <div class="row mb-3">
                                   <label class="form_label col-md-4 col-lg-3 text-right">
                                   <span id="astric">*</span> <?php echo $this->lang->line('label_zone'); ?>:
                                   </label>
                                   <div class="col-md-8 col-lg-9">
                                      <select class="form-control m-input" name="zone" id="zone" placeholder="<?php echo $this->lang->line('label_zone'); ?>"  data-parsley-trigger="focusin focusout" data-parsley-errors-container="#driver_error">
                                          <option value=""><?php echo $this->lang->line('label_zone'); ?></option>

                                          <?php
                                          if(!empty($zone_list)){
                                              foreach ($zone_list as $key => $value) {
                                                  ?>
                                                  <option value="<?php echo $value['id']; ?>" <?php echo $value['id']==$result['MDist_Zone'] ? "selected":"";?>><?php echo $value['zone']; ?></option>
                                                  <?php
                                                   }
                                                }
                                          ?>
                                      </select>

                                      <div id="driver_error">
                                          <?php echo form_error('zone'); ?>
                                      </div>
                                   </div>
                                </div>

                                <div class="row mb-3">
                                   <label class="form_label col-md-4 col-lg-3 text-right">
                                   <span id="astric">*</span> <?php echo $this->lang->line('label_status'); ?>:
                                   </label>
                                   <div class="col-md-8 col-lg-9">
                                      <select class="form-control m-input" name="status" id="status" placeholder="<?php echo $this->lang->line('label_status'); ?>"  data-parsley-trigger="focusin focusout" data-parsley-errors-container="#driver_error">
                                          <option value=""><?php echo $this->lang->line('label_status'); ?></option>

                                          <?php
                                          if(!empty($status_list)){
                                              foreach ($status_list as $key => $value) {
                                                  ?>
                                                  <option value="<?php echo $value['Status_ID']; ?>" <?php echo $value['Status_ID']==$result['MDist_Driver'] ? "selected":"";?>><?php echo $value['Description']; ?></option>
                                                  <?php
                                                   }
                                                }
                                          ?>
                                      </select>
                                      <div id="driver_error">
                                          <?php echo form_error('zone'); ?>
                                      </div>
                                   </div>
                                </div>

                                <div class="row mb-3">
                                   <label class="form_label col-md-4 col-lg-3 text-right">
                                   <span id="astric">*</span> <?php echo $this->lang->line('label_driver'); ?>:
                                   </label>
                                   <div class="col-md-8 col-lg-9">
                                      <select class="form-control m-input" name="driver" id="driver" placeholder="<?php echo $this->lang->line('label_driver'); ?>"  data-parsley-trigger="focusin focusout" data-parsley-errors-container="#driver_error">
                                          <option value=""><?php echo $this->lang->line('label_driver'); ?></option>

                                          <?php
                                          if(!empty($driver_list)){
                                              foreach ($driver_list as $key => $value) {
                                                  ?>
                                                  <option value="<?php echo $value['id']; ?>" <?php echo $value['id']==$result['MDist_Driver'] ? "selected":"";?>><?php echo $value['name']; ?></option>
                                                  <?php
                                                   }
                                                }
                                          ?>
                                      </select>
                                      <div id="driver_error">
                                          <?php echo form_error('zone'); ?>
                                      </div>
                                   </div>
                                </div>
                                <div class="row mb-3">
                                   <label class="form_label col-md-4 col-lg-3 text-right">
                                   <?php echo $this->lang->line('label_date'); ?>:
                                   </label>
                                   <div class="col-md-8 col-lg-9">
                                      <input type="text" class="form-control m-input" name="date" id="date" placeholder="<?php echo $this->lang->line('label_date'); ?>" value="<?php echo $result['MDist_Date']?$result['MDist_Date']:set_value('date')?>">
                                      <?php echo form_error('date'); ?>
                                   </div>
                                </div>

                                <div class="row mb-3">
                                   <label class="form_label col-md-4 col-lg-3 text-right">
                                   <span id="astric">*</span> <?php echo $this->lang->line('label_type'); ?>:
                                   </label>
                                   <div class="col-md-8 col-lg-9">


                                      <select class="form-control m-input" name="type" id="type" placeholder="<?php echo $this->lang->line('label_type'); ?>"  data-parsley-trigger="focusin focusout" data-parsley-errors-container="#driver_error">

                                          <option value = ""><?php echo $this->lang->line('label_select').' '.$this->lang->line('label_type')?></option>

                                           <option value = "Invoice" <?php echo $result['MDist_BType'] == 'Invoice'?"selected":""; ?>><?php echo $this->lang->line('label_invoice'); ?></option>

                                           <option value = "Container" <?php echo $result['MDist_BType'] == 'Container'?"selected":""; ?>><?php echo $this->lang->line('label_container'); ?></option>

                                      </select>
                                      <div id="driver_error">
                                          <?php echo form_error('type'); ?>
                                      </div>
                                   </div>
                                </div>


                                <div class="row mb-3">
                                   <label class="form_label col-md-4 col-lg-3 text-right">
                                   <span id="astric">*</span> <?php echo $this->lang->line('label_exchange_rate'); ?>:
                                   </label>
                                   <div class="col-md-8 col-lg-9">
                                      

                                      <input type="text" class="form-control m-input exchange_rate" name="exchange_rate" id="exchange_rate" placeholder="<?php echo $this->lang->line('label_exchange_rate'); ?>" value="<?php echo $result['MDist_Exchange_Rate']?$result['MDist_Exchange_Rate']:set_value('MDist_Exchange_Rate')?>">
                                      <div id="driver_error">
                                          <?php echo form_error('type'); ?>
                                      </div>
                                   </div>
                                </div>
                                
                                <div class="row mb-3">

                                   <label class="form_label col-md-4 col-lg-3 text-right">
                                        <?php echo $this->lang->line('label_comment'); ?>:
                                    </label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea class="form-control m-input" rows="2" name="comment" id="comment" placeholder="<?php echo $this->lang->line('label_comment'); ?>"><?php if(!empty($result['MDist_Comment'])) echo $result['MDist_Comment']; else echo set_value('MDist_Comment'); ?></textarea>
                                        <?php echo form_error('comment'); ?>
                                    </div>
                                </div>

                            </div>

                          </div>
                          <div class="form-group m-form__group row">
                             <div class="col-lg-9 ml-lg-auto m-form__actions">
                                <button type="submit" class="btn btn-success" value="update">
                                <?php echo $this->lang->line('label_submit'); ?>
                                </button>
                                <a href="<?php echo base_url('company/driver'); ?>" class="btn btn-secondary">
                                <?php echo $this->lang->line('label_back'); ?>
                                </a>
                             </div>
                          </div>
                       <?php echo form_close(); ?>
                       </div>
                    </div>
                 </div>
                 <?php
                 $arr = $this->rights->rightsArray();
                 ?>

                 <div class="tab-pane <?php echo $this->session->userdata('tab') == 'true'?"active":""; ?>" id="m_user_profile_tab_2">
                 <?php if($this->session->userdata('tab') == 'true') {

                          $this->session->set_userdata('tab','false');



                    ?>
                    <div class="m-portlet__body">
                       <div class="m-form__section m-form__section--first">

                       <div class="form-group m-form__group row">
                             <div class="col-md-12">
                             <select class = "form-control" id = "module_selector">
                                <option value = ""><?php echo $this->lang->line('label_select_module'); ?></option>
                             <?php foreach($arr as $key => $value) {


                                ?>


                                  <option value = "<?php echo $key ?>"><?php echo $this->lang->line($key); ?></option>
                             <?php } ?>
                             </select>

                              <?php   foreach($arr as $key => $value) {

                                 $assingId = strtolower(str_replace(" ","_",$key));

                                $dataOld = "no";


                                 ?>
                              <div id = "parent_<?php echo $assingId; ?>" data-module = "<?php echo $key; ?>" class = "moduler" style = "display:none" data-old = "<?php echo $dataOld; ?>">
                                <div class="inner-checkbox-list"  id = "checklist_<?php echo $assingId; ?>" data-child = "<?php echo $key; ?>">
                                   <div class="row vertical-a-t">
                                      <label class="form_label col-md-4 col-lg-2 text-right">
                                      <?php echo $this->lang->line($key); ?>
                                         <label class="m-checkbox ">
                                            <input type="checkbox" checked id = "<?php echo $assingId; ?>" class = "chk_module">
                                            <span></span>
                                         </label>
                                      </label>
                                      <div class="col-md-10 col-lg-10">
                                         <div class="vertical-a-t">
                                            <div class="m-checkbox-inline">
                                            <?php if(is_array($value)) {
                                               foreach($value as $newVal ) {




                                                     $checked = '';



                                               ?>
                                               <label class="form_label">
                                                     <?php echo $this->lang->line($newVal['name']); ?>
                                                  <label class="m-checkbox ">
                                                     <input name="rights[<?php echo $key; ?>][][url]" value="<?php echo $newVal['url']; ?>" type="checkbox" <?php echo $checked;  ?>>
                                                     <span></span>
                                                  </label>
                                               </label>

                                            <?php }} else{ ?>

                                               <input name="rights[<?php echo $key; ?>]" value="<?php echo $value; ?>" type="hidden">
                                            <?php } ?>


                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                   <hr>
                                </div>
                              </div>


                              <?php } ?>
                              <div id = "getter">

                              <?php echo form_open("company/user/addrights","id = 'frm'"); ?>
                              <span id = "containFormData">
                              </span>
                              <input type = "hidden" name = "master_user" value = "<?php echo $master_user_id; ?>">

                              <div class="form-group m-form__group row"  id = "action_selector" style = "display:none;">
                                <div class="col-lg-9 ml-lg-auto m-form__actions">
                                   <button type="submit" class="btn btn-success" value="update">
                                   <?php echo $this->lang->line('label_submit'); ?>
                                   </button>
                                   <a href="<?php echo base_url('company/user'); ?>" class="btn btn-secondary">
                                   <?php echo $this->lang->line('label_back'); ?>
                                   </a>
                                </div>
                              </div>
                              <?php echo form_close(); ?>




                          </div>



                             </div>
                          </div>
                       </div>

                    </div>
                                            <?php  } ?>

                 </div>


              </div>



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
                                                  <div class="col-md-4">
                                                      <div class="m-input-icon m-input-icon--left">
                                                          <input type="text" class="form-control m-input" placeholder="<?php echo $this->lang->line('label_invoice_date'); ?>" id="m_form_date">
                                                           <span class="m-input-icon__icon m-input-icon__icon--left">
                                                              <span>
                                                                  <i class="la la-calendar"></i>
                                                              </span>
                                                          </span>
                                                      </div>
                                                  </div>


                                                  <div class="col-md-4">
                                                      <div class="m-input-icon m-input-icon--left">
                                                          <button type="submit" class="btn btn-warning btnTran" value="update">
                                                            <?php echo $this->lang->line('label_submit'); ?>
                                                          </button>
                                                      </div>
                                                  </div>
                 
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <!--end: Search Form -->

                                  <!--begin: Datatable -->
                                  <div class="m_datatable"></div>
                                  <!--end: Datatable -->

                              </div>


           </div>
        </div>
     </div>

     <form method="post" role="form" id="BaschTran">
        <input type="text" class="form-control m-input" name="mdist_batch" id="mdist_batch" placeholder="<?php echo $this->lang->line('label_id'); ?>" value="<?php echo $result['MDist_BatchNum']?$result['MDist_BatchNum']:set_value('date')?>">

        <input type="text" class="form-control m-input" name="mdist_tinvnum" id="mdist_tinvnum" id="m_form_date">
       
        <input type="text" class="form-control m-input" name="mdist_tcustid" id="mdist_tcustid" value="<?php echo $result['customer_id']?$result['customer_id']:set_value('customer_id')?>">

        <input type="text" class="form-control m-input" name="mdist_tcustid" id="mdist_tcustid" value="<?php echo $result['customer_id']?$result['customer_id']:set_value('customer_id')?>">

     </form>
     <!--end::Form-->

  </div>

<!--  <div class="col-sm-4">
             <form method="post" role="form" id="BaschTran">

                 <input type="text" name="mdist_tdate" class="form-control m-input" id="mdist_tdate" >
                <input type="text" class="form-control m-input" name="id" id="id" placeholder="<?php //echo $this->lang->line('label_id'); ?>" value="<?php //echo $result['MDist_BatchNum']?$result['MDist_BatchNum']:set_value('date')?>">
                <input type="text" name="mdist_tinvnum" class="form-control m-input" id="mdist_tinvnum" >
                <input type="text" name="mdist_tcustid" class="form-control m-input" id="mdist_tcustid" >
                <input type="text" name="mdist_tbalance" class="form-control m-input" id="mdist_tbalance" >
                <input type="text" name="mdist_tbox" class="form-control m-input" id="mdist_tbox" >
                <input type="text" name="mdist_tpaid" class="form-control m-input" id="mdist_tpaid" >
                <input type="text" name="mdist_delivered" class="form-control m-input" id="mdist_delivered" >
                <input type="text" name="mdist_shipto" class="form-control m-input" id="mdist_shipto" >
                <input type="text" name="mdist_exchange_balance" class="form-control m-input" id="mdist_exchange_balance" >

                <input type="hidden" id="tran" name="tran" value="" class="form-control">

           </form>
</div>  -->

 <script type="text/javascript">

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
                            url: "<?php echo site_url('company/batch_distribution/ajax_list_invoice')?>",
                            method: 'GET',
                            params: {
                                invoice_date: today
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
                        return '\t\t\t\t\t\t\t\t\t\t\t<span style="width: 138px;">'+t.id+'</span>'
                    }
                }, {
                    field: "invoice_number",
                    title: "<?php echo $this->lang->line('label_invoice'); ?>",
                    template: function(t) {                       
                     
                        return '\t\t\t\t\t\t\t\t\t\t\t<span style="width: 138px;">'+t.invoice_number+'</span><input class="montoBalance" name="mdist_tbalance" value="'+t.invoice_number+'" id="mdist_tbalance" type="text">'
                    }
                }, {
                    field: "name",
                    title: "<?php echo $this->lang->line('label_customer'); ?>",
                }, {
                    field: "nameShipto",
                    title: "<?php echo $this->lang->line('label_consignee'); ?>",
                }, {
                    field: "total_packages",
                    title: "<?php echo $this->lang->line('label_boxes'); ?>",
                }, {
                    field: "balance",
                    title: "<?php echo $this->lang->line('label_balance'); ?>",

                },{
                    field: "invoice_date",
                    title: "<?php echo $this->lang->line('label_date'); ?>",
                }, {
                    field: "MDist_Driver",
                    title: "<?php echo $this->lang->line('label_exchange_balance'); ?>",
                    template: function() {                  
                       // return '\t\t\t\t\t\t\t\t\t\t\t<input class="montoBalance" name="'+t.balance+'" value="'+t.balance+'" type="text">'
                        return '\t\t\t\t\t\t\t\t\t\t\t<span class="exbalance" style="width: 138px;"></span>'
                    }
                },{

                    field: "chk_status",
                    title: "<label class=' m-checkbox m-checkbox--bold text-white'><input type = 'checkbox' name = 'chk' class = 'chk_status'><?php echo $this->lang->line('label_done'); ?><span></span></label>",

                },{

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
                    }).val(e.generalSearch),

                    /*$("#m_form_status").on("change", function() {
                        var e = t.getDataSourceQuery();
                        e.Status = $(this).val().toLowerCase(), t.setDataSourceQuery(e), t.load()
                    }).val(void 0 !== e.Status ? e.Status : ""), */

                    $("#m_form_date").on("change", function() {
                        var e = t.getDataSourceQuery();
                        e.invoice_date = $(this).val().toLowerCase(), t.setDataSourceQuery(e), t.load()
                    }).val(void 0 !== e.invoice_date ? e.invoice_date : today)

                    /*$("#m_form_type").on("change", function() {
                        var e = t.getDataSourceQuery();
                        e.Type = $(this).val().toLowerCase(), t.setDataSourceQuery(e), t.load()
                    }).val(void 0 !== e.Type ? e.Type : ""), */

                   // $("#m_form_status, #m_form_type").selectpicker()
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


            /* select 2 */
            var Select2 = {
                init: function() {
                    $("#zone").select2();
                    $("#status").select2();
                    $("#driver").select2();
                    $("#type").select2();
                 /*   $("#driver_id").select2();
                    $("#zone").select2();
                    $("#model_branch_id").select2();*/
                }
            };
            jQuery(document).ready(function() {
                Select2.init()
            });


   $(document).ready(function(){

            $('#date').datepicker({
                time: false,
                clearButton: true
            });

     $("#m_form_search").on("blur", function(e) {
       // $("#m_form_search").blur(function(event) {
        //montoBalance
          var montoBalance = $(".montoBalance").val();
          var exchange_rate = $(".exchange_rate").val();
          var exchangeBalance = parseFloat($('.montoBalance').val()) + parseFloat($('.exchange_rate').val());
     // var exchangeBalance = parseFloat(montoBalance) * parseFloat(exchange_rate);
     // alert(exchangeBalance);
     // var valorExchange = exchangeBalance;
      $(".exbalance").html(exchangeBalance);
  
      });

   });

    /*$(document).ready(function () {
            
                $("#mdist_tbalance").val();
                var value = $(this).val();
                $("#mdist_tbalance").val(value);
            
    });*/
    /*$(document).ready(function () {
           $("#m_form_search").blur(function () {
            $('#mdist_tbalance').clone().val();
                var value = $("#mdist_tbalance").val();
                alert(value);
                $("#mdist_tbalance").val(value);
           
       });
    });*/


      $(document).on('click', '.btnTran', function(e){
      
      //  alert("hola");
      //console.log('serialized data', $("#AddDiplo").serialize());
                $.ajax({
                url: "<?php echo site_url('company/batch_distribution/addTran')?>",
                data: $("#BaschTran").serialize(),
                type: 'POST',
                dataType: 'json'

              }).done(function(data) {

              //console.log('data diplo', data)
              if(data.st == 0)
                {
                  swal({   
                    title: "<?php echo $this->lang->line('label_are_you_sure') ?>",
                    text: "<?php echo $this->lang->line('label_you_want_to_delete_driver') ?>",
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    //confirmButtonText: "<?php //echo $this->lang->line('label_confirm') ?>",
                }).then(function () {
                 $('.validation-error').html(data.msg);
                    
                });
                }

              if(data.st == 1)
              {
                $('.validation-error').html(data.msg).css('color', 'green');
                $('.validation-error').html(data.msgsuccess).css('color', 'green');      
                //alert(data.msg);
                    setTimeout(function(){
                  $("#cerrar_miModal").trigger("click");
                      location.reload();
                   },1500);
               
              }

              if(data.st == 2)
              {
                $('.validation-error').html(data.msg);
                $('.validation-error').html(data.msgsuccess).css('color', 'green');      
               //console.log(data.msg);
                    setTimeout(function(){
                  $("#cerrar_miModal").trigger("click");
                      location.reload();
                   },1500);
              }

              });
            event.preventDefault();
        });

</script>


