 function edit(){
     add(false);
 }
function add(shotime = true){
    $("#pickup_time").timepicker();

    if(shotime === true){
        $("#pickup_time").val('00:00');
    }
    

    getMapPickup('address_line_1','pickup_state','pickup_city','pickup_zipcode');
    getMapPickup('customer_address_line_1','state','city','zipcode');
    getMapPickup('model_address_line_1','model_state','model_city','model_zipcode');

    //getMapPickupModel('model_address_line_1');
    
$(document).on('click','#update_customer_info',function(){
                                        var data = $('#frm_customer_info').serialize();
                                        var url = SITE_URL+'company/customer/customer_update_in_pickup/'
                                        ajaxCall(url, data, function(response){
                                            getMessage(response.status,response.message);
                                        });

                                        return false;

                                });

}
 

function getMapPickup(addressed,ad_states,ad_city,ad_zipcode){
    
    var places = new google.maps.places.Autocomplete(document.getElementById(addressed));
    google.maps.event.addListener(places, 'place_changed', function () {
        
        var place = places.getPlace();
        var address = place.formatted_address;
        var street_number = '';

$("#"+ad_states).val('');
$("#"+ad_city).val('');
$("#"+ad_zipcode).val('');


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




$(document).ready(function(){
   $('.ph').attr('placeholder','___-___-____');
});

$(document).on('click',"input[name = 'use_shipto']",function(){
    var $row = $(this).closest("tr");        // Finds the closest row <tr> 
    
    $("#shipto_fname").text($row.find("td:nth-child(2)").text()); // Finds the 2nd <td> element
    
    $("#shipto_lname").text($row.find("td:nth-child(3)").text()); // Finds the 2nd <td> element
    
    $("#shipto_address").text($row.find("td:nth-child(4)").text()); // Finds the 2nd <td> element
    
        
    $("#shipto_telephone").text($row.find("td:nth-child(5)").text()); // Finds the 2nd <td> element
    
    
        

    $("#shipto_cellphone").text($row.find("td:nth-child(6)").text()); // Finds the 2nd <td> element
    
    
    $("#shipto_province").text($row.find("td:nth-child(7)").text()); // Finds the 2nd <td> element
    

})

$(document).on('click','.use_shipto',function(){
                
    $("#shipto_id").val($(this).attr('data-id'));

});

$(document).on('mouseover','#open_history_modal',function(){
                
    //("#pickup_history").modal('show');
    $('#pickup_history').modal('show'); 
//    alert(34);

});


 /* Time picker */
 
        
    


