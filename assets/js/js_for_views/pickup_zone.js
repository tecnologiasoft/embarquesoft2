function add(){

	      
jQuery(document).ready(function() {
            $("#m_form_1").validate({
                rules: {
                    description: {
                        required: !0
                    },
                    country: {
                        required: !0
                    },
                    zipcode: {
                        required: !0
                    },
                    zone: {
                        required: !0
                    },

                    stops: {
                        required: !0,
                        digits: !0,
                        maxlength: 20
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
            })
        });
}