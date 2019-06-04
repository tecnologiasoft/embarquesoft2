function add(){
   $("#getBranch").hide(); 
 getMap('address_line1');
 //new google.maps.places.Autocomplete(document.getElementById('address_line_1'));


	 $("#website").on("focusout", function() {
        if ($("#website").val().trim() == "http://") {
            $("#website").val("");
        }
    });

    $("#website").on("focusin", function() {
        if ($("#website").val().trim() == "") {
            $("#website").val("http://");
        }
    });


    $("#lic_picture").fileinput({
        'showUpload':false, 
        'previewFileType': "image",
        'browseClass': "btn btn-success",
        'browseLabel': "Pick Image",
        'browseIcon': "<i class=\"la la-file-image-o \"></i> ",
        'removeClass': "btn btn-danger",
        'removeLabel': "Delete",
        'removeIcon': "<i class=\"la la-trash \"></i> ",
    });
    
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

        Inputmask.init();


         $("#m_form_1").validate({
                rules: {
                    telephone_number: {
                        required: function(element) {
                            return ($("#cellphone_number").is(':blank')) && ($("#telephone_number").is(':blank'))?true:false;
                        },
                        minlength: 10,
                        maxlength: 14
                    },
                    cellphone_number: {
                        required: function(element) {
                            return (!$("#cellphone_number").is(':blank')) || (!$("#telephone_number").is(':blank'))?false:true;
                        },
                        minlength: 8,
                        maxlength: 14
                    },

                    fname: {
                        required: !0
                    },

                    // email: {
                    //     required: !0,
                    //     email: true,
                    // },

                    lname: {
                        required: !0
                    },
                   
                    // password: {
                    //     minlength: 4
                    // },
                    address_line1: {
                        required: !0,
                    },
                    city: {
                        required: !0,
                    },
                    state: {
                        required: !0,
                    },
                    language: {
                        required: !0,
                    },
                    branch:{
                        required: !0,    
                    },
                   
                   
                 },
                invalidHandler: function(e, r) {
                    //alert(1);
                    var i = $("#m_form_1_msg");
                    i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
                    
                },
                submitHandler: function(e) {
                    // alert(0);
                    // $("#m_form_1_msg").hide();
                    return true;
                }
            })
 
              //   alert($("#zipcode").val());
           $(document).on('keypress','#address',function(key){
               if(key.keyCode == 13){
                   return false;
               }
           })
            $(document).on('focusout','#address',function(){
                
              let url = SITE_URL+$controllerName;
              //console.log($("#zipcode").val());
              $('#branch option').prop('selected', false);
              $("#branch").removeAttr("style");
              setTimeout(function(){
                if($("#zipcode").val()){
                    let url = SITE_URL+'company/branch/getBranch';
                    let data = {zipcode:$("#zipcode").val()};
                    ajaxCall(url, data, function(success,error){


                      if(success.status == 1){

                          $('#branch option[value="'+success.data.id+'"]').prop('selected', true)
                          $("#branch").attr("style", "pointer-events: none;");

                      }
                    });
                }
              },2000)
              

              //ajaxCall()

            });
}
function edit(){
    $("#branch").attr("style", "pointer-events: none;");
    add();

}
function add_shipto(){
 getMap('address');

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
    $("#lic_picture").fileinput({
        'showUpload':false, 
        'previewFileType': "image",
        'browseClass': "btn btn-success",
        'browseLabel': "Pick Image",
        'browseIcon': "<i class=\"la la-file-image-o \"></i> ",
        'removeClass': "btn btn-danger",
        'removeLabel': "Delete",
        'removeIcon': "<i class=\"la la-trash \"></i> ",
    });
  
     
    
    
        $("#m_form_1").validate({
            rules: {
                company_name: {
                    maxlength: 128,
                },
                fname: {
                    required: !0
                },
                lname: {
                    required: !0
                },
                // email: {
                //     required: !0,
                //     email: true,
                // },
                address_line_1: {
                    maxlength: 255
                }, 
                address_line_2: {
                    maxlength: 255
                },
                country: {
                    required: !0
                }, 
                address: {
                    required: !0,
                },
                province: {
                    required: !0,
                },
                // region: {
                //     required: !0,
                // },
                // municipal: {
                //     required: !0,
                // },
                sector: {
                    required: !0,
                },
                telephone: {
                    required:function(){
                        
                        return ($("#cellphone_number").is(':blank')) && ($("#telephone").is(':blank'))?true:false;
                         
                    },
                    minlength: 12,
                    maxlength: 12
                },
                cellphone_number: {
                    required: function(){

                        return (!$("#cellphone_number").is(':blank')) || (!$("#telephone").is(':blank'))?false:true;
                    },
                    minlength: 8,
                    maxlength: 14
                },
                // fax_number: {
                //     minlength: 8,
                //     maxlength: 14
                // },
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
    

}