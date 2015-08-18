$(document).ready(function() {	
	
	$('#btn_delete').click(function(e){
		e.preventDefault();
		/*
		if(confirm("Are you sure you want to delete this record?")) 
		{
		    //delete here
			//alert("done");
			var targetUrl = $(this).attr("href");
			//window.location.href=targetUrl;
			alert(targetUrl);
			//alert("OK");
		}
		else
		{
			return false;
			//alert("hello");
		}*/
		
		$('#dialog-confirm').modal("show");		
	});
	
	$('#latitudeLink').click(function(e){
		e.preventDefault();
		getCoordinates();
	});
	
	$('#longitudeLink').click(function(e){
		e.preventDefault();
		getCoordinates();
	});
	
	function getCoordinates(){
		var latitude=0;
		var longitude=0;
		 var location="";
		 var city= $('#city').val();
		 var country=$('#country').val();
		 if(city!=null && city!="")
		 {
			 if(country!=null && country!=-1)
			 {
				 location=city +", "+country;
			 }
		 }
	      var geocoder =  new google.maps.Geocoder();
	      geocoder.geocode( { 'address': location}, function(results, status) {
	            if (status == google.maps.GeocoderStatus.OK) 
	            {
	            	latitude=results[0].geometry.location.lat();	            	
	            	$('#latitude').val(latitude);
	            	longitude=results[0].geometry.location.lng();
	            	$('#longitude').val(longitude);
	            	// alert("location : " + results[0].geometry.location.lat() + " " +results[0].geometry.location.lng()); 
	            } else {
	              alert("Error: " + status);
	             
	            }
	          });
	}
	
});
