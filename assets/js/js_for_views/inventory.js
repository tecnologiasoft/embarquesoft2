function add(){

	 $("#m_form_1").validate({
           rules: {
               item_number: {
                   required: !0,
                   digits: !0,
                   maxlength: 20
               },
               description: {
                   required: !0
               },
               price: {
                   required: !0,
                   number: !0
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