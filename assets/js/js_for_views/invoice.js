 jQuery(document).ready(function() {
                /* parsley validation */
                //$('.add_invoices').parsley();

                $('#send_email_form').parsley();
            }); 
            
            $('.m-scrollable').data('max-height', screen.height*0.6);
            

            $("#customer_telephone_number, #customer_cellphone_number").on('change', function() {
                if ($("#customer_telephone_number").val().length > 0 ||
                    $("#customer_cellphone_number").val().length > 0)
                {
                    // If any field is filled, remove required attr
                    $("#customer_telephone_number, #customer_cellphone_number").removeAttr("required");
                } else {
                    // if all fields are empty, set attr required
                    $("#customer_telephone_number, #customer_cellphone_number").attr("required", "required");
                }
                // destroy ParsleyForm instance
                $('.add_invoices').parsley().destroy();
                
                // bind parsley
                $('.add_invoices').parsley();

                if(is_submited)
                    $('.add_invoices').parsley().validate();
            });

            // /* select 2 */
            // $(document).ready(function() {
            //     /*$("#customer_id").select2({
            //         dropdownParent: $("#new_invoice_model"),
            //         minimumInputLength: 1,
            //         tags: [],
            //         ajax: {
            //             url: "<?php echo base_url('company/invoices/get_customer_list_json'); ?>",
            //             dataType: 'json',
            //             type: "GET",
            //             quietMillis: 50,
            //             data: function (term) {
            //                 return {
            //                     term: term
            //                 };
            //             },
            //             processResults: function (data) {
            //                 return {
            //                     results: $.map(data, function (item) {
            //                         return {
            //                             text: item.fname + " " +item.lname + " ("+item.address+") (" + item.telephone_number + ")",
            //                             id: item.id
            //                         }
            //                     })
            //                 }; 
            //             }
            //         }
            //     });*/
            //     $("#shipto_id").select2({
            //         dropdownParent: $("#new_invoice_model"),
            //         onChange:function(){
            //             alert(23);
            //         }
            //     });
            //     $("#driver_id").select2({
            //         dropdownParent: $("#new_invoice_model")
            //     });

            //     item_popup(0);
            // });

            // $(document).ready(function(){
            //     $('#shipto_id').on("select2:select", function(e) { 
                    
            //         get_shipto_data();
            //     });
            // });
            

            /* input mask */
            var Inputmask = {
                init: function() {
                    $("#customer_telephone_number").inputmask("mask", {
                        mask: "999-999-9999"
                    }), $("#customer_cellphone_number").inputmask("mask", {
                        mask: "999-999-9999"
                    }), $("#shipto_telephone_number").inputmask("mask", {
                        mask: "999-999-9999"
                    }), $("#shipto_cellphone_number").inputmask("mask", {
                        mask: "999-999-9999"
                    })
                }
            };
        
            jQuery(document).ready(function() {
                Inputmask.init()
            });  

            /* date picker */
            var BootstrapDatepicker = function() {
                var t = function() {
                    $("#date").datepicker({
                        todayHighlight: !0,
                        orientation: "bottom left",
                        templates: {
                            leftArrow: '<i class="la la-angle-left"></i>',
                            rightArrow: '<i class="la la-angle-right"></i>'
                        },
                        autoclose: true,
                        /*format: "yyyy-mm-dd"*/
                        format: "dd/mm/yyyy"
                    })
                    $("#due_date").datepicker({
                        todayHighlight: !0,
                        orientation: "bottom left",
                        templates: {
                            leftArrow: '<i class="la la-angle-left"></i>',
                            rightArrow: '<i class="la la-angle-right"></i>'
                        },
                        autoclose: true,
                        /*format: "yyyy-mm-dd"*/
                        format: "dd/mm/yyyy"
                    })
                };
                return {
                    init: function() {
                        t()
                    }
                }
            }();
            jQuery(document).ready(function() {
                BootstrapDatepicker.init();
                $("#date").datepicker("setDate", new Date());
            });
            

            $(document).ready(function()
            {
                

                getMapPickup('customer_address_1','customer_state','customer_city','customer_zipcode');
                getMapPickup('shipto_address','shipto_sector','shipto_province','');
                
               
            });


           

            function getMapPickup(addressed,ad_states,ad_city,ad_zipcode){
    
                var places = new google.maps.places.Autocomplete(document.getElementById(addressed));
                google.maps.event.addListener(places, 'place_changed', function () {
                    
                    var place = places.getPlace();
                    var address = place.formatted_address;
                    var street_number = '';
                    
                    ad_states  = ad_states == '' ? 'noneoftheid':ad_states;
                    ad_city  = ad_city == '' ? 'noneoftheid':ad_city;
                    ad_zipcode  = ad_zipcode == '' ? 'noneoftheid':ad_zipcode;
                    
            
            
                    for (var i = 0; i < place.address_components.length; i++) {
                    
                        for (var j = 0; j < place.address_components[i].types.length; j++) {
                              //console.log((place.address_components[i]);
            
                            if(place.address_components[i].types[j] == "street_number"){
                                street_number = place.address_components[i].long_name;
                            }
                            if(place.address_components[i].types[j] == "route"){
                                
                                $("#"+addressed).val(street_number+' '+place.address_components[i].long_name);
                            }
                            if (place.address_components[i].types[j] == "postal_code") {
                                $("#"+ad_zipcode).val(place.address_components[i].long_name);
                                //$("#zipcode").attr('readonly','readonly').focus();
                            }
                            
                            if (place.address_components[i].types[j] == "administrative_area_level_1") {    
                                
                                $("#"+ad_states).val(place.address_components[i].short_name);
                                //$("#state").attr('readonly','readonly').focus();
                            }    
                            
                            if (place.address_components[i].types[j] == "country") {
                                $("#pickup_country").val(place.address_components[i].long_name);
                                //$("#country").attr('readonly','readonly').focus();
                            }
                            
                            if (place.address_components[i].types[j] == "locality") {
                                $("#"+ad_city).val(place.address_components[i].long_name);
                                //$("#city").attr('readonly','readonly').focus();
                            }
                            
                        }
                    
                    }
                       
                });
            
                //$("#"+myId).next('input').focus();
            }