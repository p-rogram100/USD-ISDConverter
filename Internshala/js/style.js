
// login signup show and hide with add css property
function toggleSignup(){
    document.getElementById("login-toggle").style.backgroundColor="#fff";
     document.getElementById("login-toggle").style.color="#222";
     document.getElementById("signup-toggle").style.backgroundColor="#2296f5";
     document.getElementById("signup-toggle").style.color="#fff";
     document.getElementById("login-form").style.display="none";
     document.getElementById("signup-form").style.display="block";
     document.getElementById("error").style.display="none";
 }
 
 function toggleLogin(){
     document.getElementById("login-toggle").style.backgroundColor="#2296f5";
     document.getElementById("login-toggle").style.color="#fff";
     document.getElementById("signup-toggle").style.backgroundColor="#fff";
     document.getElementById("signup-toggle").style.color="#222";
     document.getElementById("signup-form").style.display="none";
     document.getElementById("login-form").style.display="block";
     document.getElementById("error").style.display="none";
 }
 






//  conerter code
$('document').ready(function() { 
	/* handling Currency Conversion Form validation */
	$("#currency-form").validate({
		rules: {
			amount: {
				required: true,
			},
		},
		messages: {
			amount:{
			  required: " amount field is required"
			 },			
		},
		submitHandler: handleCurrencyConvert	
	});	   
	/* Handling Currency Convert functionality */
	function handleCurrencyConvert() {		
		var data = $("#currency-form").serialize();				
		$.ajax({				
			type : 'POST',
			url  : 'convert_currency.php',
			dataType:'json',
			data : data,
			beforeSend: function(){	
				$("#convert").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; converting ...');
			},
			success : function(response){				
				if(response.error == 1){	
					$("#converted_rate").html('<span class="form-group has-error">Error: Please select different currency</span>'); 
					$("#converted_amount").html("");
					$("#convert").html('Convert');
					$("#converted_rate").show();	 
				} else if(response.exhangeRate){									
					$("#converted_rate").html("<strong>Exchange Rate ("+response.toCurrency+"</strong>) : "+response.exhangeRate);
					$("#converted_rate").show();
					$("#converted_amount").html("<strong>Converted Amount ("+response.toCurrency+"</strong>) : "+response.convertedAmount);
					$("#converted_amount").show();
					$("#convert").html('Convert');
				} else {	
					$("#converted_rate").html("No Result");	
					$("#converted_rate").show();	
					$("#converted_amount").html("");
				}
			}
		});
		return false;
	}   
});