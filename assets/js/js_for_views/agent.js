function add(flag = ''){
       
    getMap('address_1');
       
 /* Input mask */
 var Inputmask = {
    init: function() {
         $("#cellphone_number").inputmask("mask", {
            mask: "999-999-9999"
        }), $("#telephone_number").inputmask("mask", {
            mask: "999-999-9999"
        })
    }
};

    Inputmask.init()





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



    

}

