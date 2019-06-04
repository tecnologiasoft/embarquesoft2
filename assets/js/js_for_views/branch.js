function add(){
   getMap('address_line_1');
   
}var Inputmask = {
    init: function() {
        $("#telephone_number1").inputmask("mask", {
            mask: "999-999-9999"
        }), $("#telephone_number2").inputmask("mask", {
            mask: "999-999-9999"
        })
    }
};
Inputmask.init();
$("#m_form_1").validate({
    rules: {
        name: {
            required: !0
        },
        address_line_1: {
            required: !0
        }, 
        address_line_2: {
            required: !0
        },
        city: {
            required: !0,
        },
        state: {
            required: !0,
        },
        zipcode: {
            required: !0,
        },
        telephone_number1: {
            required: !0,
            minlength: 8,
            maxlength: 14
        },
        telephone_number2: {
            required: !0,
            minlength: 8,
            maxlength: 14
        }, 
        print: {
            required: !0,
        }

    },
    invalidHandler: function(e, r) {
        var i = $("#m_form_1_msg");
        $("#name-error").css('color','red');
        i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)

        //$('.form-control-feedback').style('color','red');
    },
    submitHandler: function(e) {
        $("#m_form_1_msg").hide();
        return true;
    }
});
