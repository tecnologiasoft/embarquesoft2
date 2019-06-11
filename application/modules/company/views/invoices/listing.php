<style type="text/css">

/* label and input */
.select2-container--default .select2-selection--single .select2-selection__rendered, .form-control { 
    padding: .3rem;
}
.m-form .m-form__group label.col-form-label { 
    padding-top: .3rem;
}
.select2, .twitter-typeahead {
    width: 100% !important;
}
.col-xl-3 {
    padding-left: 5px;
    padding-right: 5px;
}
.m-form__group > .col-xl-6  {
    padding: 5px;
}
/*.m-form__group > .col-xl-4, .m-form__group > .col-xl-6 , .m-form__group > .col-xl-5, .m-form__group > .col-xl-1, .m-form__group > .col-xl-2, .m-form__group > .col-xl-8   {                
    padding-left: 1px;
    padding-right: 1px;
} */   
/*.m-form__group > .col-xl-8 {
    padding-left: 1px;
    padding-right: 8px;
}*/
.text-white{
    color: #fff;
    font-weight: bold !important;
}

/* model */
.modal-header, .modal .modal-content .modal-footer, .modal .modal-content .modal-body {
    padding: 10px !important;
}
.modal-header, .modal .modal-content .modal-footer{
    background-color: #265791; 
}
.modal .modal-content .modal-header .modal-title, .modal .modal-content .modal-header .close{
    color: #fff;
}
.modal-dialog{
    margin: 0px auto;
}
.m-form .m-form__group {
    padding: 0; margin: 0;
}
.pac-container {
    z-index: 10000 !important;
}   
.m-form.m-form--fit .m-form__group{
    padding-left: 0px;
    padding-right: 0px;
}
.mCSB_container{ overflow: visible } 

/*  */
#customer_details, #shipto_details{
    padding: 5px;
    border: 1px solid #265791;
}

#invoice_details, #invoice_items, #invoice_status, #invoice_multiple_items ,#edit_invoice_multiple_items{
    margin-top: 5px;
    padding: 5px;
    border: 1px solid #265791;   
}
.form-control, .form-control[readonly], .select2-container--default .select2-selection--single {
    border: 1px solid #265791;   
}

.form-control::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: #575962;
    opacity: 1; /* Firefox */
}

.form-control:-ms-input-placeholder { /* Internet Explorer 10-11 */
    color: #575962;
}

.form-control::-ms-input-placeholder { /* Microsoft Edge */
    color: #575962;
}
input#customer_id, #div_shipto_id > .select2-container--default .select2-selection--single{
    border: 1px solid #f05050 !important;
}
.m-typeahead .tt-menu .tt-dataset .tt-suggestion, .tt-menu .tt-dataset .tt-suggestion {
        color: #000;                
}
.tt-menu{
    border-radius: 10px;
    border: 1px solid #000000;
}
@media (min-width: 1024px){
    .m-form__group > .col-xl-4, .m-form__group > .col-xl-6 , .m-form__group > .col-xl-5, .m-form__group > .col-xl-1, .m-form__group > .col-xl-2, .m-form__group > .col-xl-8   {    
        padding-left: 1px;
        padding-right: 1px;
    }
}

.modal-form-block{
    background-color: #dce2ec;
    border-color: #b5c4de !important;
    border-radius: 4px;
    margin-top: 10px;
    margin-bottom: 5px;
}


.modal-form-table-view{
    background-color: #dce2ec;
    border-radius: 4px 4px 0px 0px;
    margin-top: 15px !important;
}
.modal-form-table-row label{
    margin-bottom: 0px;
}
.modal-form-table-row button{
    height: 27px;
}

.modal-form-block .col-xl-6.col-lg-6:first-child{   
    padding-right: 5px;
    padding-right: 5px;
}
.modal-form-block .col-xl-6.col-lg-6:last-child{
    padding-left: 5px;
}

.modal-form-block input, .modal-form-block select{
    border-color: #99a7bf;
    padding-left: 10px;
    padding-right: 10px;
}

.modal-form-block .select2-container--default .select2-selection--single {
    border: 1px solid #99a7bf;
}


#edit_invoice_model .modal-header{
	display: block;
}

#edit_invoice_model .modal-header .modal-title{
	display: inline-block;
}

#edit_invoice_model .modal-header  .close{
	margin: 20px 20px 0px 0px;
}

</style>

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
                                    <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                        <!-- <a href="<?php echo site_url('company/invoices/add');?>" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"> -->
                                        <a href="javascript:;" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" data-toggle="modal" data-target="#new_invoice_model" id = "add_new_invoice">
                                            <span>
                                                <i class="la la-plus"></i> 
                                                <span>
                                                    <?php echo $this->lang->line('label_add_invoices'); ?>
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
    



<!-- Parsley -->


<!--begin::Modal-->
<div class="modal fade" id="new_invoice_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                <?php echo $this->lang->line('title_add_new_invoices'); ?>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    &times;
                </span>
            </button>
        </div>
        <?php 
            $form_data = array('class' => 'm-form m-form--fit m-form--label-align-right add_invoices','id' => 'm_form_1','enctype'=>'multipart/form-data'); 
            echo form_open('company/invoices/add/',$form_data); 
        ?> 
            <div class="modal-body">
                <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group m-form__group row" style="margin-bottom: 5px;">

                                
                                <div class="col-form-label-right d-block w-100 mb-1" style = "display:none;">
                                    <?php echo $this->lang->line('label_customer'); ?>:
                                    <span style = "display:none;" id = "save_cancel_add_customer">
                                        <a href = "javascript:void(0);" class = "btn btn-info float-right btn-sm" id = "cancel_customer" >
                                        <?php echo $this->lang->line('label_cancel'); ?>
                                        </a>

                                        <a href = "javascript:void(0);" class = "btn btn-info float-right btn-sm" id = "add_new_customer" style = "margin-right: 11px;">
                                        <?php echo $this->lang->line('label_save'); ?>
                                        </a>
                                    </span>
                                    
                                </div>
                                
                                

                             
                                <!-- <div class="m-typeahead"> -->
                                    
                                    <input type="text" class="form-control m-input" name="customer_id" id="customer_id" placeholder="<?php echo $this->lang->line('label_customer'); ?>" value="<?php echo set_value('label_customer'); ?>">
                                    <input type="hidden" name="text_customer_id" id="text_customer_id" value="<?php echo set_value('text_customer_id'); ?>" maxlength="20">
                                <!-- </div> -->
                                <?php echo form_error('customer_id'); ?>
                            </div> 
                            <div id="customer_details" class="modal-form-block">
                                <div class="form-group m-form__group row"> 
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="text" class="form-control m-input " name="customer_fname" id="customer_fname" placeholder="<?php echo $this->lang->line('label_first_name'); ?> *" value="<?php echo set_value('customer_fname'); ?>" maxlength="64" required="">
                                        <?php echo form_error('customer_fname'); ?>

                                        <input type="text" class="form-control m-input mt-2" name="customer_lname" id="customer_lname" placeholder="<?php echo $this->lang->line('label_last_name'); ?> *" value="<?php echo set_value('customer_lname'); ?>" maxlength="64"  required="">
                                        <?php echo form_error('customer_lname'); ?>

                                        <input type="text" class="form-control m-input mt-2" name="customer_address_1" id="customer_address_1" placeholder="<?php echo $this->lang->line('label_address'); ?> *" value="<?php echo set_value('customer_address'); ?>"  required="">

                                        <input type="hidden" name="customer_latitude" id="customer_latitude" value="<?php echo set_value('customer_latitude'); ?>">

                                        <input type="hidden" name="customer_longitude" id="customer_longitude" value="<?php echo set_value('customer_longitude'); ?>">
                                        <?php echo form_error('customer_address'); ?>

                                        <input type="text" class="form-control m-input mt-2" name="customer_address_2" id="customer_address_2" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php echo set_value('customer_address'); ?>" maxlength="64">
                                        <?php echo form_error('customer_address'); ?>

                                        
                                        <input type="text" class="form-control m-input m-input mt-2" name="customer_city" id="customer_city" placeholder="<?php echo $this->lang->line('label_city'); ?> *" value="<?php echo set_value('customer_city'); ?>" maxlength="64"  required="">
                                        <?php echo form_error('customer_city'); ?>

                                        
                                    
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        
                                        <input type="text" class="form-control m-input  " name="customer_state" id="customer_state" placeholder="<?php echo $this->lang->line('label_state'); ?> *" value="<?php echo set_value('customer_state'); ?>" maxlength="64"  required="">
                                        <?php echo form_error('customer_state'); ?>

                                        <input type="text" class="form-control m-input  mt-2" name="customer_zipcode" id="customer_zipcode" placeholder="<?php echo $this->lang->line('label_zipcode'); ?>" value="<?php echo set_value('customer_zipcode'); ?>" maxlength="32"  required="">
                                        <?php echo form_error('customer_zipcode'); ?>

                                        <input type="text" class="form-control m-input mt-2" name="customer_telephone_number" id="customer_telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?> *" value="<?php echo set_value('customer_telephone_number'); ?>" maxlength="14">
                                        <?php echo form_error('customer_telephone_number'); ?>
                                         
                                        <input type="text" class="form-control m-input  mt-2" name="customer_cellphone_number" id="customer_cellphone_number" placeholder="<?php echo $this->lang->line('label_cellphone_number'); ?> *" value="<?php echo set_value('customer_cellphone_number'); ?>" maxlength="14" 
                                        >
                                        <?php echo form_error('customer_cellphone_number'); ?>

                                        <input type="text" class="form-control m-input  mt-2" name="customer_lic" id="customer_lic" placeholder="<?php echo $this->lang->line('label_lic_id'); ?>" value="<?php echo set_value('customer_lic'); ?>" maxlength="14">
                                        <?php echo form_error('customer_lic'); ?>
                                    
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <script>
                        $(document).on('click','#add_new_invoice',function(){
                            clear_form();
                        });

                        

                        $(document).on('click','#typeahead_add_new_shipto',function(){
                            
                            $("#shipto_details input[type = 'text']").prop('disabled',false).val('');
                            $("#shipto_fname").focus();
                            $("#shipto_id").val('');
                            $("#save_cancel_add_shipto").show();

                        });

                        $(document).ready(function(){
                            clear_form();
                            
                        });


                        function clear_form(){
                            
                            $('input[type = "text"]').not("#user,#date,#due_date,.alldiv input[type = 'text'],#final_payment").val('');
                            $("#customer_details input[type = 'text']").prop('disabled',true);
                            $("#shipto_details input[type = 'text']").prop('disabled',true);
                            $('input[type = "text"]').attr('data-parsley-error-message',"");
                            $("#driver_id").attr('data-parsley-error-message',"");
                            $("#edit_driver_id").attr('data-parsley-error-message',"");
                            $("select").prop("selectedIndex", 0);
                            $("#save_cancel_add_customer").hide();
                            $("#save_cancel_add_shipto").hide();
                            item_popup('0');

                            }


                        $(document).on('click','#add_new_customer',function(){
                            var data = {
                                customer_fname:$("#customer_fname").val(),
                                customer_lname:$("#customer_fname").val(),
                                customer_address_line_1:$("#customer_address_1").val(),
                                customer_address_line_2:$("#customer_address_2").val(),
                                customer_latitude:$("#customer_latitude").val(),
                                customer_longitude:$("#customer_longitude").val(),
                                customer_city:$("#customer_city").val(),
                                customer_state:$("#customer_state").val(),
                                customer_zipcode:$("#customer_zipcode").val(),
                                customer_telephone_number:$("#customer_telephone_number").val(),
                                customer_cellphone_number:$("#customer_cellphone_number").val(),
                                customer_lic:$("#customer_lic").val()
                            };
                            var url  = "<?php echo site_url('company/customer/create_invoice_customer')?>";
                            ajaxCall(url,data,function(response){
                                if(response.status == SUCCESS_CODE){
                                $("#text_customer_id").val(response.data.id);
                                $("#save_cancel_add_customer").hide();
                                getShiptoList('null');
                                $("#shipto_id").prop('disabled',false);
                                $("#shipto_id").typeahead('close');

                                }
                                getMessage(response.status,response.message);
                                return false;
                            });

                            return false;
                        });
                        $(document).on('keypress','#customer_telephone_number',function(){

                        });
                        $(document).on('keypress paste change','#customer_telephone_number',function(){
                           var $this = $(this);
                            var data = {customer_telephone_number:$this.val()};
                         
                         var url  = "<?php echo site_url('company/customer/customer_check_phone')?>";
                         ajaxCall(url,data,function(response){
                             
                                getMessage(response.status,response.message);
                                $this.val('');
                                return false;
                            });

                            return false;

                        })


                        $(document).on('click','#add_new_shipto',function(){
                            
                            
                            var data = {
                                customer_id:$("#text_customer_id").val(),
                                shipto_fname:$("#shipto_fname").val(),
                                shipto_lname:$("#shipto_lname").val(),
                                shipto_address:$("#shipto_address").val(),
                                shipto_address_1:$("#shipto_address_1").val(),
                                shipto_address_2:$("#shipto_address_2").val(),
                                shipto_latitude:$("#shipto_latitude").val(),
                                shipto_longitude:$("#shipto_longitude").val(),
                                shipto_province:$("#shipto_province").val(),
                                shipto_sector:$("#shipto_sector").val(),
                                shipto_telephone_number:$("#shipto_telephone_number").val(),
                                shipto_cellphone_number:$("#shipto_cellphone_number").val(),
                                shipto_lic:$("#shipto_lic").val(),
                                
                            };
                            console.log(data);

                            var url  = "<?php echo site_url('company/customer/create_invoice_shipto')?>";
                            ajaxCall(url,data,function(response){

                                if(response.status == SUCCESS_CODE){
                                $("#text_shipto_id").val(response.data.id);
                                //$('#shipto_id').val($('#shipto_id option[value="'+response.data.id+'"]').val()).trigger('change');
                                $("#save_cancel_add_shipto").hide();

                                }
                                getMessage(response.status,response.message);
                                return false;
                            });

                            return false;
                        });

                        $(document).on('click','#cancel_shipto,#cancel_customer',function(){
                            if($(this).attr('id') == 'cancel_customer'){

                                $("#customer_details input[type = 'text']").val('').prop('disabled',true);
                                $("#save_cancel_add_customer").hide();

                                $("#customer_id").focus();

                            }else{

                            $("#shipto_id").focus();
                            $("#save_cancel_add_shipto").hide();

                            }

                            $("#shipto_details input[type = 'text']").val('').prop('disabled',true);
                            
                        });

                        $(document).on('click','#typeahead_add_new_customer',function(){
                            
                            $("#customer_id").typeahead('close');
                            $("#save_cancel_add_customer").show();
                            $("#customer_details input[type = 'text']").prop('disabled',false).val('');
                            $("#customer_fname").focus();
                            $("#customer_id").val('');
                            $("#shipto_id").off();
                            $('input[type = "text"]').not("#user,#date,#due_date,.alldiv input[type = 'text'],#final_payment").val('');
                            
                            
                        });

                        </script>
                        <div class="col-xl-6">
                            <div class="form-group m-form__group row" id="div_shipto_id" style="margin-bottom: 5px;">
                                <div class="col-form-label-right d-block w-100 mb-1">
                                    <?php echo $this->lang->line('label_ship_to'); ?>:
                                    <span style = "display:none;" id = "save_cancel_add_shipto">
                                        <a href = "javascript:void(0);" class = "btn btn-info float-right btn-sm" id = "cancel_shipto">
                                        <?php echo $this->lang->line('label_cancel'); ?>
                                        </a>

                                        <a href = "javascript:void(0);" class = "btn btn-info float-right btn-sm"  id = "add_new_shipto" style = "margin-right: 11px;">
                                        <?php echo $this->lang->line('label_save'); ?>
                                        </a>
                                    </span>
                                </div>
                                
                               


                                <input type = "text" class ="form-control m-input" name="shipto_id" id="shipto_id" placeholder="<?php echo $this->lang->line('label_ship_to'); ?>" disabled>

                                <input type = "hidden" id =  "text_shipto_id" name = "shipto_id">
                                    
                                
                                
                                
                                <?php echo form_error('shipto_id'); ?>
                            </div> 
                            <div id="shipto_details" class="modal-form-block">
                                <div class="form-group m-form__group row">                                                 
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="text" class="form-control m-input" name="shipto_fname" id="shipto_fname" placeholder="<?php echo $this->lang->line('label_first_name'); ?> *" value="<?php echo set_value('shipto_fname'); ?>" maxlength="64"  required="">
                                        <?php echo form_error('shipto_fname'); ?>
                                    
                                    
                                        <input type="text" class="form-control m-input mt-2" name="shipto_lname" id="shipto_lname" placeholder="<?php echo $this->lang->line('label_last_name'); ?> *" value="<?php echo set_value('shipto_lname'); ?>" maxlength="64"  required="">
                                        <?php echo form_error('shipto_lname'); ?>
                                    
                                
                                
                                        <input type="text" class="form-control m-input mt-2" name="shipto_address" id="shipto_address" placeholder="<?php echo $this->lang->line('label_address'); ?> *" value="<?php echo set_value('shipto_address'); ?>"  required="">
                                        <input type="hidden" name="shipto_latitude" id="shipto_latitude" value="<?php echo set_value('shipto_latitude'); ?>">
                                        <input type="hidden" name="shipto_longitude" id="shipto_longitude" value="<?php echo set_value('shipto_longitude'); ?>">
                                        <?php echo form_error('shipto_address'); ?>
                                    
                                        <input type="text" class="form-control m-input mt-2" name="shipto_address_1" id="shipto_address_1" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php echo set_value('shipto_address_1'); ?>" > 
                                        <?php echo form_error('shipto_address_1'); ?>


                                        <input type="text" class="form-control m-input mt-2" name="shipto_address_2" id="shipto_address_2" placeholder="<?php echo $this->lang->line('label_address'); ?>" value="<?php echo set_value('shipto_address_1'); ?>" > 
                                        <?php echo form_error('shipto_address_1'); ?>
                                
                                
                                    
                                       

                                    </div>
                                    
                                                                                
                                    <div class="col-xl-6 col-lg-6">

                                    
                                        
                                    
                                        <input type="text" class="form-control m-input" name="shipto_sector" id="shipto_sector" placeholder="<?php echo $this->lang->line('label_sector'); ?> *" value="<?php echo set_value('label_sector'); ?>" maxlength="64"  required="">
                                        
                                        <input type="text" class="form-control m-input mt-2" name="shipto_province" id="shipto_province" placeholder="<?php echo $this->lang->line('label_province'); ?> *" value="<?php echo set_value('shipto_province'); ?>" maxlength="64"  required="">
                                        <?php echo form_error('shipto_province'); ?>
                                    
                                        <input type="text" class="form-control m-input mt-2" name="shipto_telephone_number" id="shipto_telephone_number" placeholder="<?php echo $this->lang->line('label_telephone_number'); ?> *" value="<?php echo set_value('shipto_telephone_number'); ?>" maxlength="18">
                                        <?php echo form_error('shipto_telephone_number'); ?>
                                   
                                   
                                        <input type="text" class="form-control m-input mt-2" name="shipto_cellphone_number" id="shipto_cellphone_number" placeholder="<?php echo $this->lang->line('label_cellphone_number'); ?> *" value="<?php echo set_value('shipto_cellphone_number'); ?>" maxlength="16"
                                        >
                                        <?php echo form_error('shipto_cellphone_number'); ?>


                                        <input type="text" class="form-control m-input mt-2" name="shipto_lic" id="shipto_lic" placeholder="<?php echo $this->lang->line('label_lic_id'); ?>" value="<?php echo set_value('shipto_telephone_number'); ?>" maxlength="18">
                                        <?php echo form_error('shipto_lic'); ?>                                                    
                                    </div>
                                </div>  

                            </div>
                        </div>
                    </div>
                    <div id="invoice_details" class="modal-form-block">
                        <div class="row">
                            <div class="col-xl-3">
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                        * <?php echo $this->lang->line('label_date'); ?>:
                                    </label>
                                    <div class="col-xl-8 col-lg-8">
                                        <input type="text" class="form-control m-input" name="date" id="date" placeholder="<?php echo $this->lang->line('label_date'); ?>" value="<?php echo set_value('date'); ?>" required="">
                                        <?php echo form_error('date'); ?>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                        <?php echo $this->lang->line('label_due_date'); ?>:
                                    </label>
                                    <div class="col-xl-8 col-lg-8">
                                        <input type="text" class="form-control m-input" name="due_date" id="due_date" placeholder="<?php echo $this->lang->line('label_due_date'); ?>" value="<?php echo set_value('due_date'); ?>" >
                                        <?php echo form_error('due_date'); ?>
                                    </div>
                                </div>
                                <script>
                               $(document).ready(function(){
                   
                             $("#customer_id").on("keyup", function(e) {
                                console.log($("#customer_id").val());
                                if($("#customer_id").val() == ""){
                                   clear_form();  
                                }
                            });   
                   
                   $("#date").datepicker({
                    
                    autoclose: true

                   }).on('changeDate', function(ev){
           // set the "toDate" start to not be later than "fromDate" ends:
           
            var newDate = new Date(ev.date);
            
            newDate.setDate(newDate.getDate()+30);
           
           
            let d = newDate.getDate() < 10 ? '0'+newDate.getDate() : newDate.getDate();
            let m = newDate.getMonth()+1;
            m = m < 10 ? '0'+m : m;
            let y = newDate.getFullYear();
            //alert(m+'/'+d+'/'+y);
             $("#due_date").val(m+'/'+d+'/'+y);

           $('#due_date').datepicker('setStartDate',newDate);
              })

              
                                
                                
              $("#due_date").datepicker({
                                    autoclose: true,
                                }).datepicker("setDate", "+30d");

                   
               });
                                </script>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                        * <?php echo $this->lang->line('label_user'); ?>:
                                    </label>
                                    <div class="col-xl-8 col-lg-8">
                                        <input type="text" class="form-control m-input" name="user" id="user" placeholder="<?php echo $this->lang->line('label_user'); ?>" value="<?php echo $username;?>" required="" disabled>
                                        <?php echo form_error('user'); ?>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                        <?php echo $this->lang->line('label_misc'); ?>:
                                    </label>
                                    <div class="col-xl-8 col-lg-8">
                                        <input type="text" class="form-control m-input" name="misc" id="misc" placeholder="<?php echo $this->lang->line('label_misc'); ?>" value="<?php echo set_value('misc'); ?>" >
                                        <?php echo form_error('misc'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                    * <?php echo $this->lang->line('label_invoice_hash'); ?>:
                                    </label>
                                    <div class="col-xl-8 col-lg-8">
                                        <input type="text" class="form-control m-input" name="invoice_hash" id="invoice_hash" placeholder="<?php echo $this->lang->line('label_invoice_hash'); ?>" value="<?php echo set_value('invoice_hash'); ?>"  required="">
                                        <?php echo form_error('invoice_hash'); ?>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                        <?php echo $this->lang->line('label_agent_invoice'); ?>:
                                    </label>
                                    <div class="col-xl-8 col-lg-8">
                                        <input type="text" class="form-control m-input" name="agent_invoice" id="agent_invoice" placeholder="<?php echo $this->lang->line('label_agent_invoice'); ?>" value="<?php echo set_value('agent_invoice'); ?>">
                                        <?php echo form_error('agent_invoice'); ?>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                        *<?php echo $this->lang->line('label_container'); ?>:
                                    </label>
                                    <div class="col-xl-8 col-lg-8">
                                        <input type="text" class="form-control m-input" name="container" id="container" placeholder="<?php echo $this->lang->line('label_container'); ?>" value="<?php echo set_value('container'); ?>"  required="">
                                        <?php echo form_error('container'); ?>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                        <?php echo $this->lang->line('label_agent'); ?>:
                                    </label>
                                    <div class="col-xl-8 col-lg-8">
                                        <select class="form-control m-input" name="agent" id="agent" style="height: 28px;>
                                           <option value = ""><?php echo $this->lang->line('label_agent_invoice'); ?></option>
                                           <?php foreach($agent_list as $value) {?>
                                           <option value = "<?=$value['id']?>"><?=$value['fname'].' '.$value['lname']?></option>
                                           <?php } ?>
                                        </select>
                                        <?php echo form_error('agent'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                        * <?php echo $this->lang->line('label_driver'); ?>:
                                    </label>
                                    <div class="col-xl-8 col-lg-8">
                                        <select class="form-control" name="driver_id" id="driver_id" placeholder="<?php echo $this->lang->line('label_driver'); ?>"  required data-parsley-trigger="focusin focusout" data-parsley-errors-container="#driver_error" style = "height:28px;">
                                            <option value=""><?php echo $this->lang->line('label_driver'); ?></option>
                                            <?php 
                                                if(!empty($driver_list)){
                                                    foreach ($driver_list as $key => $value) {
                                            ?>
                                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['fname']." ".$value['lname']; ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <div id="driver_error"></div>
                                        <?php echo form_error('driver_id'); ?>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                        * <?php echo $this->lang->line('label_pay_term'); ?>:
                                    </label>
                                    <div class="col-xl-8 col-lg-8">
                                        
                                        <select class="form-control m-input" name="pay_term" id="pay_term" style = "height: 28px;">
                                            <option value = "USA">USA</option>
                                            <option value = "RD">RD</option>

                                        </select>
                                        <?php echo form_error('pay_term'); ?>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                        * <?php echo $this->lang->line('label_status'); ?>:
                                    </label>
                                    <div class="col-xl-8 col-lg-8">
                                        <input type="text" class="form-control m-input" name="status" id="status" placeholder="<?php echo $this->lang->line('label_invoice_status'); ?>" value="<?php echo set_value('status'); ?>"  required="">
                                        <?php echo form_error('status'); ?>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                        * <?php echo $this->lang->line('label_total_box'); ?>:
                                    </label>
                                    <div class="col-xl-8 col-lg-8">
                                        <input type="text" class="form-control m-input" name="tot_box" id="tot_box" placeholder="<?php echo $this->lang->line('label_total_box'); ?>" value="<?php echo set_value('tot_box', 0); ?>" maxlength="12" readonly  required="" >
                                        <?php echo form_error('tot_box'); ?>
                                    </div>                                                
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <!-- <div class="form-group m-form__group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                        * <?php echo $this->lang->line('label_branch'); ?>:
                                    </label>
                                    <div class="col-xl-7 col-lg-7">
                                        <input type="text" class="form-control m-input" name="branch_id" id="branch_id" placeholder="<?php echo $this->lang->line('label_branch_id'); ?>" value="<?php echo set_value('branch_id'); ?>"  required="">
                                        <?php echo form_error('branch_id'); ?>
                                    </div>
                                </div> -->
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                        <?php echo $this->lang->line('label_total'); ?>:
                                    </label>
                                    <h5><label class="col-xl-8 col-lg-8 col-form-label text-left" id="total">
                                        $0.00
                                    </label></h5>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                        <?php echo $this->lang->line('label_payments'); ?>:
                                    </label>
                                    <h5><label class="col-xl-8 col-lg-8 col-form-label text-left" id="payments">
                                        $0.00
                                    </label></h5>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label col-form-label-right">
                                        <?php echo $this->lang->line('label_balance'); ?>:
                                    </label>
                                    <h5><label class="col-xl-8 col-lg-8 col-form-label text-left" id="balance">
                                        $0.00
                                    </label></h5>
                                </div>                                            
                            </div>
                        </div>
                    </div>

                    <!-- <div id="invoice_status">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label-right">
                                        <?php echo $this->lang->line('label_invoice_status'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div id="invoice_items" class="modal-form-table-view">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-4 col-lg-4 text-left col-form-label-right">
                                        <?php echo $this->lang->line('label_item'); ?>
                                    </label>
                                    <label class="col-xl-1 col-lg-1 text-left col-form-label-right">
                                        <?php echo $this->lang->line('label_qty'); ?>
                                    </label>
                                    <label class="col-xl-1 col-lg-1 text-left col-form-label-right">
                                        <?php echo $this->lang->line('label_price'); ?>
                                    </label>
                                    <label class="col-xl-1 col-lg-1 text-left col-form-label-right">
                                        <?php echo $this->lang->line('label_discount'); ?>
                                    </label>
                                    <label class="col-xl-1 col-lg-1 text-left col-form-label-right">
                                        <?php echo $this->lang->line('label_insurance'); ?>
                                    </label>
                                    <label class="col-xl-1 col-lg-1 text-left col-form-label-right">
                                        <?php echo $this->lang->line('label_tax'); ?>
                                    </label>
                                    <label class="col-xl-2 col-lg-2 text-left col-form-label-right">
                                        <?php echo $this->lang->line('label_total'); ?>
                                    </label>
                                    <label class="col-xl-1 col-lg-1 text-left col-form-label-right">
                                        <?php echo $this->lang->line('label_actions'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="invoice_multiple_items" class="mt-0 modal-form-table-row append_div" style="border-top: 0px;">
                        <div class="form-group m-form__group row alldiv">
                                        <label class="col-xl-4 col-lg-4 text-left ">
                                            <div class="m-typeahead">
                                                <input type="text" class="form-control m-input" name="item[]" id="item_0" placeholder="<?php echo $this->lang->line('label_item'); ?>" maxlength="128" required="" data-index="0" data-index="0">
                                            </div>
                                        </label>
                                        <label class="col-xl-1 col-lg-1 text-left ">
                                            <input type="text" class="form-control m-input num" name="qty[]" id="qty0" placeholder="<?php echo $this->lang->line('label_qty'); ?>" maxlength="8" required="" data-parsley-type="number" min="1" value="1" data-index="0" value  ="0000">
                                        </label>
                                        <label class="col-xl-1 col-lg-1 text-left ">
                                            <input type="text" class="form-control m-input num" name="price[]" id="price0" placeholder="<?php echo $this->lang->line('label_price'); ?>"   maxlength="14" required="" data-parsley-type="number" min="1" value="0.00" data-index="0">
                                        </label>
                                        <label class="col-xl-1 col-lg-1 text-left ">
                                            <input type="text" class="form-control m-input num" name="discount[]" id="discount0" placeholder="<?php echo $this->lang->line('label_discount'); ?>"  maxlength="14" required="" data-parsley-type="number" min="0" value="0.00" data-index="0">
                                        </label>
                                        <label class="col-xl-1 col-lg-1 text-left ">
                                            <input type="text" class="form-control m-input num" name="insurance[]" id="insurance0" placeholder="<?php echo $this->lang->line('label_insurance'); ?>"  maxlength="14" required="" data-parsley-type="number" min="0" value="0.00" data-index="0">
                                        </label>
                                        <label class="col-xl-1 col-lg-1 text-left ">
                                            <input type="text" class="form-control m-input num" name="tax[]" id="tax0" placeholder="<?php echo $this->lang->line('label_tax'); ?>"  maxlength="14" required="" data-parsley-type="number" min="0" value="0.00" data-index="0">
                                        </label>
                                        <label class="col-xl-2 col-lg-2 text-left ">
                                            <input type="text" class="form-control m-input num" name="total[]" id="total0" placeholder="<?php echo $this->lang->line('label_total'); ?>"  maxlength="14" required="" readonly  data-parsley-type="number" min="0" value="0.00" data-index="0">
                                        </label>
                                        <div class="col-xl-1 col-lg-1">
                                                <button type="button" class="btn btn-sm btn-success addMore"><i class="fa fa-plus"></i> </button>
                                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-xl-2 col-lg-2">
                        <div class="form-group m-form__group">
                            <label for="sub_total" class="text-white">
                                <?php echo $this->lang->line('label_sub_total'); ?>
                            </label>
                            <input type="text" class="form-control m-input" name="sub_total" id="sub_total" placeholder="<?php echo $this->lang->line('label_sub_total'); ?>" value="<?php echo set_value('sub_total', '0.00'); ?>"  required="" data-parsley-type="number" min="0" readonly>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2">
                        <div class="form-group m-form__group">
                            <label for="sub_total" class="text-white">
                                <?php echo $this->lang->line('label_tax'); ?>
                            </label>
                            <input type="text" class="form-control m-input" name="final_tax" id="final_tax" placeholder="<?php echo $this->lang->line('label_tax'); ?>" value="<?php echo set_value('final_tax', '0.00'); ?>"  required="" data-parsley-type="number" min="0" readonly>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2">
                        <div class="form-group m-form__group">
                            <label for="sub_total" class="text-white">
                                <?php echo $this->lang->line('label_discount'); ?>
                            </label>
                            <input type="text" class="form-control m-input" name="final_discount" id="final_discount" placeholder="<?php echo $this->lang->line('label_discount'); ?>" value="<?php echo set_value('final_discount', '0.00'); ?>"  required="" data-parsley-type="number" min="0" readonly>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2">
                        <div class="form-group m-form__group">
                            <label for="sub_total" class="text-white">
                                <?php echo $this->lang->line('label_insurance'); ?>
                            </label>
                            <input type="text" class="form-control m-input" name="final_insurance" id="final_insurance" placeholder="<?php echo $this->lang->line('label_insurance'); ?>" value="<?php echo set_value('final_insurance', '0.00'); ?>"  required="" data-parsley-type="number" min="0" readonly>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2">
                        <div class="form-group m-form__group">
                            <label for="sub_total" class="text-white">
                                <?php echo $this->lang->line('label_payment'); ?>
                            </label>
                            <input type="text" class="form-control m-input" name="final_payment" id="final_payment" placeholder="<?php echo $this->lang->line('label_payment'); ?>" value="<?php echo set_value('final_payment', '0.00'); ?>"  required="" data-parsley-type="number" min="0" readonly>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2">
                        <div class="form-group m-form__group">
                            <label for="sub_total" class="text-white">
                                <?php echo $this->lang->line('label_balance'); ?>
                            </label>
                            <input type="text" class="form-control m-input" name="final_balance" id="final_balance" placeholder="<?php echo $this->lang->line('label_balance'); ?>" value="<?php echo set_value('final_balance', '0.00'); ?>"  required="" data-parsley-type="number" min="0" readonly>
                        </div>
                    </div>
                </div>
                
                <button type="button" class="btn btn-success" onclick="check_submit();">
                    <?php echo $this->lang->line('label_submit'); ?>
                </button>
            </div>

        <?php echo form_close(); ?>
    </div>
</div>
</div>
<!--end::Modal-->


<!--begin::Modal-->
<div class="modal fade" id="edit_invoice_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

</div>
<!--end::Modal-->

<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" style = "padding: 181px;">
<div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header modal_header">
            <h5 class="modal-title" id="exampleModalLabel">Send Invoice Pdf</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
         </div>
         <form action="<?php echo base_url(); ?>company/invoices/send_invoice_email" id="send_email_form" method="post">
             <div class="modal-body">                        
                <div class="form-group">
                    <label for="email" class="col-form-label"><?php echo $this->lang->line("label_email"); ?>:</label>
                    <input type="text" class="form-control" id="customer_email_send" name="email" data-parsley-type="email" required="" data-parsley-type-message="must be a valid email address" data-parsley-required-message="Please enter email address" value="<?php echo set_value('email'); ?>">
                    <input type="hidden" name="invoice_id" id="invoice_id">
                </div>                            
             </div>
             <div class="modal-footer modal_header">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" id =  "sndMail">Send</button>
             </div>
         </form>
    </div>
</div>
</div>
<div class="modal fade mm" id="another_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document" id = "pay_invoice_model">

    </div>
</div>
<script type="text/javascript">
$(document).on('click','#sndMail',function(){
var url = '<?php echo base_url(); ?>company/invoices/send_invoice_email';
var data = {email:$("#customer_email_send").val()};
ajaxCall(url,data,function(response){
    getMessage(response.status,response.message);
    $("#emailModal").modal('hide');
return false;
})

return false;
})

var is_submited = 0;

/* function for check allow submit form */
function check_submit(argument) {
    is_submited = 1;
    $('.add_invoices').parsley().validate();
    if($('.add_invoices').parsley().isValid()){
        /*console.log($('.add_invoices').serialize());*/
        $.ajax({
            url:  "<?php echo base_url(); ?>company/invoices/add/",
            type: "POST",
            dataType:"JSON",
            async:true,
            data: $('.add_invoices').serialize(),
            success: function(data)
            {
             
                if(data.code == "1"){
                    swal({
                    title: 'Wow!',
                    html: data.message,
                    type: 'success',
                    confirmButtonColor: '#B92D2E',
                    }).then(function(){
                        console.log(data.data_item.id);
                        console.log('Insight');
                        $("#new_invoice_model").modal('hide');
                        edit_invoice(data.data_item.id);

                    });
                    
                
                } else {
                    show_error(data.message);
                }
            },
                error: function(jqXHR, textStatus, errorThrown){                
            },
                complete: function(){
            }
        }); // END OF AJAX CALL
    }
    
}




var m_datatables = null;
var DatatableRemoteAjaxDemo = function() {
var t = function() {
var t = $(".m_datatable").mDatatable({
    data: {
        type: "remote",
        source: {
            read: {
                url: "<?php echo site_url('company/invoices/ajax_list')?>"
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
    },
     {
        field: "name",
        title: "<?php echo $this->lang->line('label_customer'); ?>",
    }, {
        field: "address_line1",
        title: "<?php echo $this->lang->line('label_address'); ?>",
    }, {
        field: "consignee",
        title: "<?php echo $this->lang->line('label_consignee'); ?>",
    }, {
        field: "state",
        title: "<?php echo $this->lang->line('label_state'); ?>",
    }, {
        field: "invoice_number",
        title: "<?php echo $this->lang->line('label_invoice_number'); ?>",
    }, {
        field: "balance",
        title: "<?php echo $this->lang->line('label_balance'); ?>",
    }, 
   /*
    {
        field: "payments",
        width: 110,
        title: "<?php //echo $this->lang->line('label_payment'); ?>",
        sortable: !1,
        overflow: "visible",
        template: function(t) {
            return ''
            
        }
    },
*/
    {
        field: "Actions",
        width: 155,
        title: "<?php echo $this->lang->line('label_actions'); ?>",
        sortable: !1,
        overflow: "visible",
        template: function(t) {
            
            /*\t\t\t\t\t\t<a href="<?php echo base_url()."company/invoices/view/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-eye"></i>\t\t\t\t\t\t</a>*/
            /*\t\t\t\t\t\t\t\t\t\t\t<a href="<?php echo base_url()."company/invoices/edit/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill">\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>*/
            return '\t\t\t\t\t\t\t\t\t\t\t<a href = "javascript:void(0);" data-id="'+t.id+'" data-customer="'+t.customer_id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill invoice_pay">\t\t\t\t\t\t\t<i class="la la-dollar"></i>\t\t\t\t\t\t</a>\t\t\t<a href="<?php echo base_url()."company/invoices/view_pdf/";?>'+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" target="_blank">\t\t\t\t\t\t\t<i class="la la-file-pdf-o"></i>\t\t\t</a>\t\t\t\t\t<a href="javascript:;" onclick="delete_invoice('+t.id+')" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" >\t\t\t<i class="la la-trash"></i>\t\t\t</a>\t\t\t\t\t<a href="javascript:void(0);" onclick="edit_invoice('+t.id+');" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" >\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>\t\t\t\t\t<a href="javascript:void(0);" data-id = "'+t.id+'" data-email = "'+t.email+'" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill send_email" >\t\t\t<i class="la la-envelope"></i>\t\t\t\t\t\t</a>'
            /*data-toggle="modal" data-target="#edit_invoice_model" */
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


function delete_invoice(id) 
{
    swal({   
        title: "<?php echo $this->lang->line('label_are_you_sure') ?>",
        text: "<?php echo $this->lang->line('label_you_want_to_delete_invoice') ?>",
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "<?php echo $this->lang->line('label_confirm') ?>",
    }).then(function () {
        $.ajax({
            url:  "<?php echo base_url(); ?>company/invoices/delete/"+id,
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
function getShiptoList(id){

    $('#shipto_id').off();

    var e = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace("name"),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            cache: false,
            url: '<?php echo base_url('company/invoices/get_customer_shipto') ?>/'+id,
            filter: function (data) {
                return data;
            }
        }
    });




    $("#shipto_id").typeahead(null,{
        name: "best-pictures",
        display: "name",
        valueKey: "id",
        source: e,
        limit: Infinity,
        templates: {

            suggestion: Handlebars.compile("<div style = 'font-weight: bold;'>{{fname}} {{lname}} {{address_line1}} {{address_line2}}</div>"),
            footer:'<div><a href="javascript:void(0);" class="btn btn-info btn-sm" id="typeahead_add_new_shipto">Add New Shipto</a><div>',
            notFound:'<div><a href="javascript:void(0);" class="btn btn-info btn-sm" id="typeahead_add_new_shipto">Add New Shipto</a><div>',
        }
    }).on('typeahead:selected', function (e, suggestion, name) {
        $("#shipto_details input[type = 'text']").prop('disabled',false);
        
        get_shipto_data(suggestion.id)

        console.log(name);
        //console.log($(this).closest("div").find("input[id^=item_]").val());
    }); 
    
}

jQuery(document).ready(function() {
    var e = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace("name"),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            'cache': false,
            url: '<?php echo base_url('company/invoices/get_customer_list_json') ?>/%QUERY',
            wildcard: '%QUERY',
            filter: function (data) {
                return data;
            }
        }
    });
    $("#customer_id").typeahead(null,{
        name: "best-pictures",
        display: "name",
        valueKey: "id",
        source: e,
        limit: Infinity,
        templates: {
            suggestion: Handlebars.compile("<div style = 'font-weight: bold;'>{{name}},&nbsp;&nbsp;&nbsp;{{address_line1}},&nbsp;&nbsp;&nbsp;{{city}},&nbsp;&nbsp;&nbsp;{{telephone_number}})</div>"),
            footer:'<div><a href="javascript:void(0);" class="btn btn-info btn-sm" id="typeahead_add_new_customer">Add New Customer</a><div>',
            notFound:'<div><a href="javascript:void(0);" class="btn btn-info btn-sm" id="typeahead_add_new_customer">Add New Customer</a><div>',
        }
    }).on('typeahead:selected', function (e, suggestion, name) {
        
        
        
        clear_form();
        $("#customer_details input[type = 'text']").prop('disabled',false);
        
        get_customer_data(suggestion.id);

        console.log(name);
        //console.log($(this).closest("div").find("input[id^=item_]").val());
    }); 
});

//$("#typeahead_add_new_customer").this.$on('event', callback)


//$('#customer_id').on('select2:select', function (e) {
function get_customer_data(id){

    $("#save_cancel_add_customer , #save_cancel_add_shipto").hide();

    $.ajax({
        url:  "<?php echo base_url(); ?>company/invoices/get_customer_data/"+id,
        type: "GET",
        success: function(data)
        {
            data = JSON.parse(data);
            if(data.result){
                

                
                $("#text_customer_id").val(data.result.id);
                $("#customer_fname").val(data.result.fname);
                $("#customer_lname").val(data.result.lname);
                $("#customer_email").val(data.result.email);
                $("#customer_address_1").val(data.result.address_line1);
                
                $("#customer_latitude").val(data.result.latitude);
                $("#customer_longitude").val(data.result.longitude);
                $("#customer_city").val(data.result.city);
                $("#customer_state").val(data.result.state);
                $("#customer_country").val(data.result.country);
                $("#customer_zipcode").val(data.result.zipcode);
               // $("#customer_borough").val(data.result.borough);
                $("#customer_telephone_number").val(data.result.telephone_number);
                $("#customer_cellphone_number").val(data.result.cellphone_number);
                $("#customer_lic").val(data.result.lic_id);
                $("#customer_address_2").val(data.result.address_line2);
                
                $("#shipto_id").prop('disabled',false);
                

                getShiptoList(data.result.id);
            } else {

                $("#customer_details input[type = 'text']").val('');
                
                
            }
        },
        error: function(jqXHR, textStatus, errorThrown){ 
            $("#customer_details input[type = 'text']").val('');
            
        },
        complete: function(){
            if ($("#customer_telephone_number").val().length > 0 ||
                $("#customer_cellphone_number").val().length > 0)
            {
                // If any field is filled, remove required attr
                $("#customer_telephone_number, #customer_cellphone_number").removeAttr("required");
            } else {
                // if all fields are empty, set attr required
                $("#customer_telephone_number, #customer_cellphone_number").attr("required", "required");
            }
        }
    }); // END OF AJAX CALL

    // $.ajax({
    //     url:  "<?php echo base_url(); ?>company/invoices/get_customer_shipto/"+id,
    //     type: "GET",
    //     success: function(data)
    //     {
    //         $("#shipto_id").empty().append(new Option("<?php echo $this->lang->line('label_ship_to'); ?>", ""));
    //         data = JSON.parse(data); 
    //         if(data.result){
    //             var first = "";
    //             $.each(data.result, function() {
    //                 $("#shipto_id").append(new Option(this.fname + " " +this.lname , this.id));
    //                 if(first == ""){
    //                    first = this.id;
    //                 }
    //             });
    //         }
            
    //         $('#shipto_id').val($('#shipto_id option[value="'+first+'"]').val()).trigger('change');

            
    //         get_shipto_data();
    //     },
    //     error: function(jqXHR, textStatus, errorThrown){ 

    //     },
    //     complete: function(){
    //     }
    // }); // END OF AJAX CALL
}

/* get ship to details */

// $(document).on('change','#shipto_id',function(){
//     alert(34);
//     get_shipto_data();
// });

function get_shipto_data(id){

    $("#shipto_details input[type = 'text']").prop('disabled',false);
    
    $.ajax({
        url:  "<?php echo base_url(); ?>company/invoices/get_shipto_data/"+id,
        type: "GET",
        success: function(data)
        {
            data = JSON.parse(data);
            console.log(data);
            if(data.result){

                $("#text_shipto_id").val(data.result.id);
                $("#shipto_fname").val(data.result.fname);
                $("#shipto_lname").val(data.result.lname);
                $("#shipto_address").val(data.result.address);
                $("#shipto_address_1").val(data.result.address_line1);
                $("#shipto_address_2").val(data.result.address_line2);
                $("#shipto_latitude").val(data.result.latitude);
                $("#shipto_longitude").val(data.result.longitude);
                $("#shipto_city").val(data.result.city);
                $("#shipto_state").val(data.result.state);
                $("#shipto_country").val(data.result.country);
                $("#shipto_zipcode").val(data.result.zipcode);
                $("#shipto_telephone_number").val(data.result.telephone_number);
                $("#shipto_cellphone_number").val(data.result.cellphone_number);
                $("#shipto_province").val(data.result.province);
                $("#shipto_sector").val(data.result.sector);
                $("#shipto_lic").val(data.result.lic_id);

                

            } else {
                $("#text_shipto_id").val("<?php echo $next_shipto_id; ?>");
               $("#shipto_details input[type = 'text']").prop('disabled',false).val('');
            }
        },
        error: function(jqXHR, textStatus, errorThrown){ 
            $("#text_shipto_id").val("<?php echo $next_shipto_id; ?>");
            $("#shipto_details input[type = 'text']").prop('disabled',false).val('');
       
        },
        complete: function(){   
            if(is_submited){
                $('.add_invoices').parsley().validate()
            }
        }
    }); // END OF AJAX CALL
}
var x = 1; //initialize counter for text box 
// Updated on 11-jun         
$(document).on('click','.addMore',function(){
    console.log("test");
    var string = add_more_button();
    $('.childRemove').remove();
    $("#invoice_multiple_items").append(string[0]);
    item_popup(string[1]);
    x++;
    $(this).removeClass('addMore btn-success').addClass('removeMore btn-danger').html('<i class="fa fa-minus"></i>');

    

});


$(document).on('click','.removeMore',function(){

    
    $(this).closest('.alldiv').remove();
    if($('.alldiv').length == 1){
        $('.removeMore').addClass('addMore btn-success').removeClass('removeMore btn-danger').html('<i class="fa fa-plus"></i>'); 
        calculation($(this).data("index"));
        return true;
        
    }
    /*var count = 0;
    $('input[id^=qty]').each(function(index, item){
        var val = $(item).val();
        if(val > 0){
            count += parseInt(val);
        }
    });
    //alert(count);
    $('#tot_box').val(count);*/

    $('.manage:last').html('<button type="button" class="btn btn-sm btn-success addMore" ><i class="fa fa-plus"></i>' 
                                        +'</button>'
                                        + '<button type="button" class="btn btn-sm btn-danger removeMore childRemove"><i class="fa fa-minus"></i>' 
                                        +'</button>');

    
calculation($(this).data("index"));
    //alert("test");
    //console.log($(this).data("index"));
    //$("#tot_box").val($('.removeMore').length);
    
});

  
var y=0;
function add_more_button()
{   
    y=x-1; 
  var mSrting =   '<div class="form-group m-form__group row alldiv">'
                                    + '<label class="col-xl-4 col-lg-4 text-left ">'
                                        + '<div class="m-typeahead">'
                                            + '<input type="text" class="form-control m-input" name="item[]" id="item_'+x+'" placeholder="<?php echo $this->lang->line('label_item'); ?>" maxlength="128" required="" data-index="'+x+'" data-index="0">'
                                        + '</div>'
                                    + '</label>'
                                    + '<label class="col-xl-1 col-lg-1 text-left ">'
                                       + '<input type="text" class="form-control m-input num" name="qty[]" id="qty'+x+'" placeholder="<?php echo $this->lang->line('label_qty'); ?>" maxlength="8" required="" data-parsley-type="number" min="1" value="1" data-index="'+x+'">'
                                    + '</label>'
                                    + '<label class="col-xl-1 col-lg-1 text-left ">'
                                        + '<input type="text" class="form-control m-input num" name="price[]" id="price'+x+'" placeholder="<?php echo $this->lang->line('label_price'); ?>"   maxlength="14" required="" data-parsley-type="number" min="1" value="0.00" data-index="'+x+'">'
                                    + '</label>'
                                    + '<label class="col-xl-1 col-lg-1 text-left ">'
                                        + '<input type="text" class="form-control m-input num" name="discount[]" id="discount'+x+'" placeholder="<?php echo $this->lang->line('label_discount'); ?>"  maxlength="14" required="" data-parsley-type="number" min="0" value="0.00" data-index="'+x+'">'
                                    + '</label>'
                                    + '<label class="col-xl-1 col-lg-1 text-left ">'
                                        + '<input type="text" class="form-control m-input num" name="insurance[]" id="insurance'+x+'" placeholder="<?php echo $this->lang->line('label_insurance'); ?>"  maxlength="14" required="" data-parsley-type="number" min="0" value="0.00" data-index="'+x+'">'
                                    + '</label>'
                                    + '<label class="col-xl-1 col-lg-1 text-left ">'
                                        + '<input type="text" class="form-control m-input num" name="tax[]" id="tax'+x+'" placeholder="<?php echo $this->lang->line('label_tax'); ?>"  maxlength="14" required="" data-parsley-type="number" min="0" value="0.00" data-index="'+x+'">'
                                    + '</label>'
                                    + '<label class="col-xl-2 col-lg-2 text-left ">'
                                        + '<input type="text" class="form-control m-input num" name="total[]" id="total'+x+'" placeholder="<?php echo $this->lang->line('label_total'); ?>"  maxlength="14" required="" readonly  data-parsley-type="number" min="0" value="0.00" data-index="'+x+'">'
                                    + '</label>'
                                    + '<div class="col-xl-1 col-lg-1 manage">'
                                        + '<button type="button" class="btn btn-sm btn-success addMore" ><i class="fa fa-plus"></i>' 
                                        +'</button>'
                                        + '<button type="button" class="btn btn-sm btn-danger removeMore childRemove"><i class="fa fa-minus"></i>' 
                                        +'</button>'
                                    + '</div>'
                                + '</div>'

                               
                                

                                return [mSrting,x];

                                
    /*}*/
    

    
    //item_popup(id)
    
}




/* reinit item dropdown */
function item_popup(id){
    
    $("#item_"+id).off();
    var e = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace("description"),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            'cache': false,
            url: '<?php echo base_url('company/invoices/get_item_list_json') ?>/%QUERY',
            wildcard: '%QUERY',
            filter: function (data) {
                return data;
            }
        }
    });

    $("#item_"+id).typeahead(null, {
        name: "best-pictures",
        display: "description",
        /*valueKey: "price"*/
        source: e,
        limit: Infinity,
        templates: {
            suggestion: Handlebars.compile("<div>{{description}} ({{item_number}})</div>")
        }
    }).on('typeahead:selected', function (e, suggestion, name) {
        $('#price'+$(this).data("index")).val(suggestion.price);
        calculation($(this).data("index"));
        //console.log($(this).closest("div").find("input[id^=item_]").val());
    }); 


    $('input[id=qty'+id+'], input[id=price'+id+'], input[id=insurance'+id+'], input[id=discount'+id+'], input[id=tax'+id+']').on("change", function(e){
        calculation($(this).data("index"));
    });

     
}

/* function for calculation */
function calculation(id) {

    var total = 0;
    total = parseFloat($('#qty'+id).val()) * parseFloat($('#price'+id).val());
    total = total - parseFloat($('#discount'+id).val());
    total = total + parseFloat($('#insurance'+id).val());
    total = total + parseFloat($('#tax'+id).val());
    if(isNaN(total.toFixed(2)) == false){
    $('#total'+id).val(total.toFixed(2));
    
    }

    var sum =0;
    var total_qty = 0;
    $('input[id^=total]').each(function(index, item){
        var val = $(item).val();
        if(val){
            sum+=parseFloat(val);
        }
    });
    if(isNaN(sum.toFixed(2)) == false){
    $('#total').html("$"+sum.toFixed(2));
   // $('#sub_total').val(sum.toFixed(2));
    }

    $('input[id^=qty]').each(function(index, item){
        var val = $(item).val();
        if(val){
            total_qty+=parseInt(val);
        }
    });
    if(isNaN(total_qty) == false){
    $('#tot_box').val(total_qty);
    }
    bottom_calculation();
}

$("#sub_total, #final_tax, #final_discount, #final_insurance, #final_payment, #final_balance").on("change", function(){
    bottom_calculation()
});

/* function for calculation */
function bottom_calculation() {
    var sub_total =0;
    $('input[id^=total]').each(function(index, item){
        var val = $(item).val();
        if(val){
            sub_total+=parseFloat(val);
        }
    });
    if(isNaN(sub_total.toFixed(2)) == false){
    $('#total').html("$"+sub_total.toFixed(2));
    $('#balance').html("$"+sub_total.toFixed(2));
    //$('#sub_total').val(sub_total.toFixed(2));
    }

    var final_tax =0;
    $('input[id^=tax]').each(function(index, item){
        var val = $(item).val();
        if(val){
            final_tax+=parseFloat(val);
        }
    });
    if(isNaN(final_tax.toFixed(2)) == false){
    $('#final_tax').val(final_tax.toFixed(2));
    }

    /*sub_total*/
    var sub_total =0;
    $('input[id^=total]').each(function(index, item){
        var val = $(item).val();
        if(val){
            sub_total+=parseFloat(val);
        }
    });
    if(isNaN(final_tax.toFixed(2)) == false){
    $('#sub_total').val(sub_total.toFixed(2));
    }

    var final_discount =0;
    $('input[id^=discount]').each(function(index, item){
        var val = $(item).val();
        if(val){
            final_discount+=parseFloat(val);
        }
    });
    if(isNaN(final_discount.toFixed(2)) == false){

    $('#final_discount').val(final_discount.toFixed(2));
    }
    var final_insurance =0;
    $('input[id^=insurance]').each(function(index, item){
        var val = $(item).val();
        if(val){
            final_insurance+=parseFloat(val);
        }
    });
    if(isNaN(final_insurance.toFixed(2)) == false){
    $('#final_insurance').val(final_insurance.toFixed(2));
    }

    var final_balance = ((sub_total + final_tax + final_insurance) - final_discount);
    if($("#final_payment").val()){
        final_balance = sub_total - $("#final_payment").val();
    }

    if(isNaN(final_balance.toFixed(2)) == false){
    $('#final_balance').val(final_balance.toFixed(2));
    }
}


/* show any error */
function show_error(message){
    swal({
      title: '',
      html: ''+message,
      type: 'error',
          //timer: 4000, 
          confirmButtonColor: '#B92D2E',
      })
}

$(document).on('click','.send_email',function(){

    
    $("#invoice_id").val($(this).data('id'));
    //$("#invoice_id").val($(this).data('id'));
    $("#customer_email_send").val($(this).data('email'));
    $("#emailModal").modal("show");
})


function edit_invoice(id)
{
     $.ajax({
            url:  "<?php echo base_url(); ?>company/invoices/get_invoice_details_ajax/"+id,
            type: "GET",
            success: function(data)
            {
                //console.log(data);
                $("#edit_invoice_model").html(data);
                $("#edit_invoice_model").modal('show');

            },
                error: function(jqXHR, textStatus, errorThrown){                
            },
                complete: function(){
            }
        }); // END OF AJAX CALL   
}
/*function edit_payment(id)
{
     console.log(id);
     $.ajax({
            url:  "<?php echo base_url(); ?>company/invoices/payment_get_invoice_list/"+id,
            type: "GET",
            success: function(data)
            {
                console.log(data);
                //$("#edit_invoice_model").html(data);
                //$("#edit_invoice_model").modal('show');

            },
                error: function(jqXHR, textStatus, errorThrown){                
            },
                complete: function(){
            }
        }); // END OF AJAX CALL
}*/

        $(document).on('click','.invoice_pay',function(){
            var url  = SITE_URL+'company/invoices/payment_get_invoice_list';
            var ids = $(this).data('customer');
            var data = {id:ids};
            ajaxCall(url,data,function(response){

                if(response.status==SUCCESS_CODE){
                //alert(response.data);
                $("#pay_invoice_model").html('');
                $("#pay_invoice_model").html(response.data);
                $("#another_popup").modal('show');

                }else{
                    alert(response.message);
                }

            });
        });

</script>

