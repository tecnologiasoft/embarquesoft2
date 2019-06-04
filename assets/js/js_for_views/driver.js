function add(flag = ''){
       
    getMap('address');
       
 /* Input mask */
 var Inputmask = {
    init: function() {
        $("#fax_number").inputmask("mask", {
            mask: "999-999-9999"
        }), $("#cellphone_number").inputmask("mask", {
            mask: "999-999-9999"
        }), $("#telephone_number").inputmask("mask", {
            mask: "999-999-9999"
        }), $("#office_phone_number").inputmask("mask", {
            mask: "999-999-9999"
        })
    }
};

    Inputmask.init()


/* Time picker */
var BootstrapTimepicker = {
    init: function() {
        $("#start_time, #end_time").timepicker()
    }
};

    BootstrapTimepicker.init();


/* select 2 */
var Select2 = {
    init: function() {
        $("#days").select2();
    }
};

    Select2.init()

    $("#m_form_1").validate({
        rules: {
            
            fname: {
                required: !0
            },
            lname: {
                required: !0
            },
            username: {
                required: !0
            },
            // email: {
            //     required: !0,
            //     email: true,
            // },
            // password: {
            //     required: !0,
            //     minlength: 4
            // },
            // confirmpassword: {
            //     required: !0,
            //     minlength: 4,
            //     equalTo: "#password"
            // },
            cellphone_number: {
                minlength: 8,
                maxlength: 14
            },
           
            driver: {
                required: !0
            },
            start_time: {
            },
            end_time: {
            },
        },
        invalidHandler: function(e, r) {
            var i = $("#m_form_1_msg");
            i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
        },
        submitHandler: function(e) {
            $("#m_form_1_msg").hide();
            return true;
        }
    });



    $(document).on('change','#module_selector',function(){
    var getModule = $(this).val();
    $("#containFormData").children("div[data-child = '"+getModule+"']").remove();
    var getHTML = $("div[data-module = '"+getModule+"']").html();
    $("#module_selector").val($("#module_selector option:first").val());
    $("#containFormData").append(getHTML);
    checksubmit();
    });

    $(document).on('change','.chk_module',function(){
        var id = $(this).attr('id');
        if($(this).is(":checked") === false){
            
            $("#checklist_"+id+" .m-checkbox-inline").find("input[type = 'checkbox']").prop('checked',false);
            $(this).parents("div[class = 'inner-checkbox-list']").remove();
            $(this).prop('checked',true);
        }
        if(flag !== true){
            checksubmit();
        }
        
        
        
    });

}

function checksubmit(){

    
if($("#containFormData div").length >=  1){

    $("#action_selector").show();

}else{

    $("#action_selector").hide();
}

}

function edit(){
    
    add(true);

    $(".moduler[data-old = 'yes']").each(function(){
     
     $("#containFormData").append($(this).html());
  
    });

   // checksubmit();
}