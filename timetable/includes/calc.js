$('#calc').live('pageshow', function(event) {

    $('#calc_price').on("tap click", function () {
		
		var no_educs = document.getElementById("no_educs").value;
		var data_source = document.getElementById("data_source").value;
		var product_type = document.getElementById("product_type").value;
		var tt_price;
		var tt_price2;
		
		if(product_type==0){
				alert("Please select product type and try again!!!");
				}else{
		if(no_educs==""){
		if(product_type==1){
		alert("Please supply number of educators");
		}	if(product_type==2){
		alert("Please supply number of educators");
		}	if(product_type==3){
		alert("Please supply number of learners");
		}	if(product_type==4){
		alert("Please supply number of learners");
		}
		}else{
			if(isNaN(no_educs)){
			if(product_type==1){
			alert("Number of educators must be numeric");
			}
			if(product_type==2){
			alert("Number of educators must be numeric");
			}
			if(product_type==3){
			alert("Number of learners must be numeric");
			}
			if(product_type==4){
			alert("Number of learners must be numeric");
			}
			}else{
				if(data_source==0){
				alert("Please select data source and try again!!!");
				}else{
				if(product_type==1){
					if(no_educs>99){
						
									tt_price = Number(no_educs) * 42;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
					}else{
						if(no_educs>79){
									tt_price = Number(no_educs) * 45;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
						}else{
							if(no_educs>59){
									tt_price = Number(no_educs) * 47;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
							}else{
								if(no_educs>39){
									tt_price = Number(no_educs) * 55;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
								}else{
									tt_price = Number(no_educs) * 63;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
								}
							}
						
						}
					}
				}
				if(product_type==2){
					if(no_educs>99){
						
									tt_price = Number(no_educs) * 75;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
					}else{
						if(no_educs>79){
									tt_price = Number(no_educs) * 85;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
						}else{
							if(no_educs>59){
									tt_price = Number(no_educs) * 95;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
							}else{
								if(no_educs>39){
									tt_price = Number(no_educs) * 110;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
								}else{
									tt_price = Number(no_educs) * 125;
									tt_price2 = tt_price * 0.60;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
								}
							}
						
						}
					}
				}
				if(product_type==3){
						
									tt_price = Number(no_educs) * 15;
									tt_price2 = tt_price * 0.25;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
				}

				if(product_type==4){
						
									tt_price = Number(no_educs) * 19.5;
									tt_price2 = tt_price * 0.25;
									alert("Price is \nR "+ (tt_price).toFixed(2) + " 1st set\nR "+ (tt_price2).toFixed(2) +" each subsequent set" );
				}
				
				
				
				
				
				
			}
			}
			}
		}
	});
	
	
	
			$('#product_type').change(function() {

			check_options();
		
          
            });

	
			$('#sent_order').on("tap click", function() {

			sent_order();
		          
           });

});


function check_options(){
	var product_type = document.getElementById("product_type").value;
	if (product_type==1){
	$('#the_number').text("Number of Educators");	
	}
	if (product_type==2){
	$('#the_number').text("Number of Educators");	
	}
	if (product_type==3){
	$('#the_number').text("Number of Learners");	
	}
	if (product_type==4){
	$('#the_number').text("Number of Learners");
	}
}


function sent_order(){

var request = document.getElementById("request").value;
var ord_school_name = document.getElementById("ord_school_name").value;
var ord_emis =document.getElementById("ord_emis").value;
var ord_requester_name = document.getElementById("ord_requester_name").value;
var ord_requester_no = document.getElementById("ord_requester_no").value;

		var no_educs = document.getElementById("no_educs").value;
		var data_source = document.getElementById("data_source").value;
		var product_type = document.getElementById("product_type").value;

		
if(ord_school_name==""){
alert("Please type school name and try again!");
}else{
if(ord_emis==""){
alert("Please type EMIS no and try again!")
}else{
if(ord_requester_name==""){
alert("Please type your name no and try again!")
}else{
if(ord_requester_no==""){
alert("Please type contact no and try again!")
}else{

//#####################################################################################################

	function sent_order1(){
	
	var reloader = 1;
	localStorage.setItem("reloader", reloader);
	
	alert("Request submitted successfully!!!");
	window.location.href = '#page';	
			
		}
		
		$.post(serviceURL + 'log_order.php',{
		
		nu_request: request,	
		nu_ord_school_name: ord_school_name,	
		nu_ord_emis: ord_emis,	
		nu_ord_requester_name: ord_requester_name,	
		nu_ord_requester_no: ord_requester_no,
		nu_no_educs: no_educs,	
		nu_data_source: data_source,	
		nu_product_type: product_type,	

		success: sent_order1,
		});

//#####################################################################################################
}}}}}



