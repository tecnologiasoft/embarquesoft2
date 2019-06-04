function add(){


    var Inputmask = {
        init: function() {
            $("#fax_number").inputmask("mask", {
                mask: "999-999-9999"
            }), $("#cellphone_number").inputmask("mask", {
                mask: "999-999-9999"
            }), $("#telephone").inputmask("mask", {
                mask: "999-999-9999"
            }), $("#office_phone_number").inputmask("mask", {
                mask: "999-999-9999"
            })
        }
    };
    
    Inputmask.init();

	getMap('address1');
	   $("#dob").datepicker({
          changeYear:true,
          format:'yyyy-m-d'
       });
       $("#m_form_1").validate({
           rules: {
               first_name: {
                   required: !0,
                   maxlength: 20
               },
               last_name: {
                   required: !0,
                   maxlength: 20
               },
               telephone: {
                minlength: 12,
                maxlength: 12,
                required:!0
               },
               country: {
                   required: !0,
               },
               branch: {
                   required: !0,
               }
              
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