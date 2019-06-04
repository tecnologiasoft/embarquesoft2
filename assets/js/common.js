
function message(type,messages,time=4000){
	

        let template = '<div class="alert alert-'+type+' alert-dismissible text-center showhide" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                           '<span aria-hidden="true" class="close_padding">&times;</span>'+
                            '</button>' +messages + '</div>';

           return template;
	

}

function ajaxCall(url, data, callback) {

    $.ajax({
    	 	url: url,
    	    type: "POST",
    	    data: data,
    	    async:true,
    	    success: function (result) {
        	//return result;
    	    
    	    callback(JSON.parse(result));
            
    	    }
    });
}
  function getMessage(type,message,redirect = ""){
      
    swal({   
        title: "",   
        html: message,   
        type: type, 
                //timer: 4000, 
                confirmButtonColor: '#B92D2E',
        },function(redirect) {
                  if(redirect == ""){
                      return false;
                  }else{
                      alert(redirect);
                    window.location = redirect;
                  }
                
            }
            
            );
  }

 function switchLang(lang){
       
       $.ajax({
           url: SITE_URL+'company/languageSwitcher/switchLang/'+lang,
           type: "POST",
           data: {$csrf_token:$csrf_token_hash},
           catch : false,
           success: function (data) {
               location.reload();
           }
       });
   
       return false;
   }


   function getMap(myId = "addres"){
    
    var places = new google.maps.places.Autocomplete(document.getElementById(myId));
    google.maps.event.addListener(places, 'place_changed', function () {
        
        var place = places.getPlace();
        var address = place.formatted_address;
        var street_number = '';
        $("#zipcode,#state,#country,#city").val('');

        for (var i = 0; i < place.address_components.length; i++) {
        
            for (var j = 0; j < place.address_components[i].types.length; j++) {
                  
                if(place.address_components[i].types[j] == "street_number"){
                    street_number = place.address_components[i].long_name;
                }
                if(place.address_components[i].types[j] == "route"){
                    
                    $("#"+myId).val(street_number+' '+place.address_components[i].long_name);
                }
                if (place.address_components[i].types[j] == "postal_code") {
                    $("#zipcode").val(place.address_components[i].long_name);
                    //$("#zipcode").attr('readonly','readonly').focus();
                }
                
                if (place.address_components[i].types[j] == "administrative_area_level_1") {    
                    $("#state").val(place.address_components[i].short_name);
                    //$("#state").attr('readonly','readonly').focus();
                }    
                
                if (place.address_components[i].types[j] == "country") {
                    $("#country").val(place.address_components[i].long_name);
                    //$("#country").attr('readonly','readonly').focus();
                }
                
                if (place.address_components[i].types[j] == "locality") {
                    $("#city").val(place.address_components[i].long_name);
                    //$("#city").attr('readonly','readonly').focus();
                }
                
            }
        
        }
           
    });

    $("#"+myId).next('input').focus();
}








var timezone = jstz.determine();
       var url = SITE_URL+'company/dashboard/set_timezone';
       $.ajax({
           type: "GET",
           url: url,
           data: {
               "timezone":timezone.name(),
           },
           success:function(results)
           {   
           }
               
});


$(document).ready(function(){

  $("#telephone").attr('placeholder','___-___-____');
  $("#telephone_number").attr('placeholder','___-___-____');
  $("#cellphone_number").attr('placeholder','___-___-____');
  
});

$(document).on('keypress keyup','.num',function(e){

    if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode == 46)){
        return true;
    }else{
        return false;
    }

});