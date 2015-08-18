$(document).ready(function() {
	
	var title=$(document).attr('title');
	if(title.indexOf("AddDestination") > -1)
	{
		//populate country and province dropdowns on this page
		//populateCountries("country", "state");
		populateCountries("");
		populateStates("");
	}
	if(title.indexOf("EditDestinationDetails") > -1)
	{	
		var selCountry=document.getElementById("selCountry").value;
		var selState=document.getElementById("selState").value;
		populateCountries(selCountry);
		populateStates(selState);
	}
	if(title.indexOf("AddTrip") > -1)
	{
		var currenturl=$(location).attr('href');
		var lastIndex = currenturl.lastIndexOf("/");
		var url = currenturl.substring(0, lastIndex);
		//alert(str."/populate_provinces"); http://localhost/KunkelBusTours/admin/trip/populate_provinces
		
		$('#origin_country').change(function(e){
			var origin_country=$('#origin_country :selected').val();			
			$.ajax({
                url: url+"/populate_provinces",
                async: false,
                type: "POST",
                data: {'origin_country' : origin_country},
                success: function(data) 
                {
                	// Parse the returned json data
                	var opts = $.parseJSON(data);
                    if(opts.length>0)
                    {		                    
	                    var options="";
	                    //remove the previous list
	                    $('#origin_province').html("");
	                    // Use jQuery's each to iterate over the opts value
	                    $.each(opts, function(i, d) {
	                        // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
	                    	 options+='<option value="' + d.province + '">' + d.province + '</option>';	                        
	                    });
	                    $('#origin_province').html(options);
                    }
                    else
                    {
                    	$('#origin_province').html("");
                    	$('#origin_province').html('<option value="' + '-1' + '">' + 'Select Province' + '</option>');
                    }
                },
                error: function()
                {
                	$('#origin_province').html("");
                	$('#origin_province').html('<option value="' + '-1' + '">' + 'Select Province' + '</option>');
                }
            })
		});
		
		$('#origin_province').change(function(e){
			var origin_province=$('#origin_province :selected').val();			
			$.ajax({
                url: url+"/populate_cities",
                async: false,
                type: "POST",
                data: {'origin_province' : origin_province},
                success: function(data) 
                {
                	// Parse the returned json data
                    var opts = $.parseJSON(data);
                    if(opts.length>0)
                    {
                    	var options="";
	                    //remove the previous list
	                    $('#origin_city').html("");
	                    // Use jQuery's each to iterate over the opts value
	                    $.each(opts, function(i, d) {
	                        // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
	                        options+='<option value="' + d.city + '">' + d.city + '</option>';
	                    });
	                    $('#origin_city').html(options);
                	}
                    else
                    {
                    	$('#origin_city').html("");
                    	$('#origin_city').html('<option value="' + '-1' + '">' + 'Select City' + '</option>');
                    }
                },
                error: function()
                {
                	$('#origin_city').html("");
                	$('#origin_city').html('<option value="' + '-1' + '">' + 'Select City' + '</option>');
                }
            })
		});
		
		$('#destination_country').change(function(e){
			var destination_country=$('#destination_country :selected').val();			
			$.ajax({
                url: url+"/populate_provinces",
                async: false,
                type: "POST",
                data: {'destination_country' : destination_country},
                success: function(data) 
                {                	
                	// Parse the returned json data
                    var opts = $.parseJSON(data);
                    if(opts.length>0)
                    {
                    	var options=""
                    	$('#destination_province').html("");
	                    // Use jQuery's each to iterate over the opts value
	                    $.each(opts, function(i, d) {
	                        // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
	                       options+='<option value="' + d.province + '">' + d.province + '</option>';	                    	
	                    });
	                    $('#destination_province').html(options);
                	}
		            else
		            {
		            	$('#destination_province').html("");
		            	$('#destination_province').html('<option value="' + '-1' + '">' + 'Select Province' + '</option>');
		            }
                },
                error: function()
                {
                	$('#destination_province').html("");
                	$('#destination_province').html('<option value="' + '-1' + '">' + 'Select Province' + '</option>');
                }
            })
		});
		
		$('#destination_province').change(function(e){
			var destination_province=$('#destination_province :selected').val();			
			$.ajax({
                url: url+"/populate_cities",
                async: false,
                type: "POST",
                data: {'destination_province' : destination_province},
                success: function(data) 
                {
                	// Parse the returned json data
                    var opts = $.parseJSON(data);
                    if(opts.length>0)
                    {
                    	var options="";
                    	$('#destination_city').html("");
	                    // Use jQuery's each to iterate over the opts value
	                    $.each(opts, function(i, d) {
	                        // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
	                        options+='<option value="' + d.city + '">' + d.city + '</option>';	                    	
	                    });
	                    $('#destination_city').html(options);
	                }
	                else
	                {
	                	$('#destination_city').html("");
	                	$('#destination_city').html('<option value="' + '-1' + '">' + 'Select City' + '</option>');
	                }
                },
                error: function()
                {
                	$('#destination_city').html("");
                	$('#destination_city').html('<option value="' + '-1' + '">' + 'Select City' + '</option>');
                }
            })
		});
		
	}
	
	
});


// Countries
var country_arr = new Array("Canada","USA");

// States
var s_a = new Array();
s_a[0] = "";
s_a[1] = "Alberta|British Columbia|Manitoba|New Brunswick|Newfoundland|Northwest Territories|Nova Scotia|Nunavut|Ontario|Prince Edward Island|Quebec|Saskatchewan|Yukon Territory";
s_a[2] = "Alabama|Alaska|Arizona|Arkansas|California|Colorado|Connecticut|Delaware|District of Columbia|Florida|Georgia|Hawaii|Idaho|Illinois|Indiana|Iowa|Kansas|Kentucky|Louisiana|Maine|Maryland|Massachusetts|Michigan|Minnesota|Mississippi|Missouri|Montana|Nebraska|Nevada|New Hampshire|New Jersey|New Mexico|New York|North Carolina|North Dakota|Ohio|Oklahoma|Oregon|Pennsylvania|Rhode Island|South Carolina|South Dakota|Tennessee|Texas|Utah|Vermont|Virginia|Washington|West Virginia|Wisconsin|Wyoming";


function populateCountries(selCountry) {
    // given the id of the <select> tag as function argument, it inserts <option> tags
    var countryElement = document.getElementById("country");
    countryElement.length = 0;
    countryElement.options[0] = new Option('Select Country', '-1');    
    for (var i = 0; i < country_arr.length; i++) {
        countryElement.options[countryElement.length] = new Option(country_arr[i], country_arr[i]);
    }
    
    if(selCountry!=null && selCountry!="")
    {
    	countryElement.value = selCountry;    	
    }
    else
    {
    	 countryElement.selectedIndex = 0;
    } 

    // Assigned all countries. Now assign event listener for the states.
    countryElement.onchange = function () {
            populateStates("");
        };
    
}

function populateStates(selState) {

    var selectedCountryIndex = document.getElementById("country").selectedIndex;

    var stateElement = document.getElementById("state");

    stateElement.length = 0; 
    stateElement.options[0] = new Option('Select State', '-1');    

    var state_arr = s_a[selectedCountryIndex].split("|");

    for (var i = 0; i < state_arr.length; i++) {
        stateElement.options[stateElement.length] = new Option(state_arr[i], state_arr[i]);
    }
    if(selState!=null && selState!="")
    {
    	 stateElement.value=selState;
    }
    else
    {
    	 stateElement.selectedIndex = 0;
    }
   
}

