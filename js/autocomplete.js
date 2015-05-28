var MIN_LENGTH = 3;
	jQuery(document).ready(function($){
	$("#username").keyup(function() {
		var username = $("#username").val();
		if (username.length >= MIN_LENGTH) {
			$.get( "/MoneyTransfer/autocomplete", { username: username } )
			.done(function( data ) {
				$('#results').html('');
				var results = jQuery.parseJSON(data);
				$(results).each(function(key, value) {
					$('#results').append('<div class="item">' + value + '</div>');
				})

			    $('.item').click(function() {
			    	var text = $(this).html();
			    	$('#username').val(text);
			    })

			});
		} else {
			$('#results').html('');
		}
	});
	
	$("#adusername").keyup(function() {
		var adusername = $("#adusername").val();
		if (adusername.length >= MIN_LENGTH) {
			$.get( "/MoneyTransfer/autoadmin", { adusername: adusername } )
			.done(function( data ) {
				$('#results').html('');
				var results = jQuery.parseJSON(data);
				$(results).each(function(key, value) {
					$('#results').append('<div class="item">' + value + '</div>');
				})

			    $('.item').click(function() {
			    	var text = $(this).html();
			    	$('#adusername').val(text);
			    })

			});
		} else {
			$('#results').html('');
		}
	});

    $("#username").blur(function(){
    		$("#results").fadeOut(500);
    	})
        .focus(function() {		
    	    $("#results").show();
    	});

	
	$("#transfer").click(function() {
		var username = $("#username").val();
			$.ajax( {
                  url:'/MoneyTransfer/userexists?u='+username,
                  success:function(data) {
					  if(data=='notexists'){
			document.getElementById("error_msg").style.display="block";
            document.getElementById("error_msg").innerHTML = "Username does not Exist.";
            document.getElementById("username").focus();
            return false;
					  }
                  }
               });
			var transactiontype = $("#transactiontype").val();
			var paid_amount = $("#paid_amount").val();
			var wallet_points = $("#wallet_points").val();
			var commission_points = $("#commission_points").val();	
			var rp_points = $("#rp_points").val();
			var paid_amount_percentage = (parseFloat(paid_amount)/100)+parseFloat(paid_amount);
			if(transactiontype == 2)
			{
				if(parseFloat(paid_amount_percentage) > parseFloat(rp_points))
				{				
			document.getElementById("error_msg").style.display="block";
            document.getElementById("error_msg").innerHTML = "Insufficient Funds.";
            document.getElementById("paid_amount").focus();
            return false;
					
				}
			}
			if(transactiontype == 1)
			{			
				if(parseFloat(paid_amount_percentage) > parseFloat(wallet_points))
				{				
			document.getElementById("error_msg").style.display="block";
            document.getElementById("error_msg").innerHTML = "Insufficient Funds.";
            document.getElementById("paid_amount").focus();
            return false;
						
				}	
			}
			if(transactiontype == 3)
			{			
				if(parseFloat(paid_amount_percentage) > parseFloat(commission_points))
				{				
			document.getElementById("error_msg").style.display="block";
            document.getElementById("error_msg").innerHTML = "Insufficient Funds.";
            document.getElementById("paid_amount").focus();
            return false;
						
				}	
			}
			
		if(document.getElementById("transactiontype").value=='')
        {
            document.getElementById("error_msg").style.display="block";
            document.getElementById("error_msg").innerHTML = "Please select Transaction Type.";
            document.getElementById("transactiontype").focus();
            return false;
        }
	if(document.getElementById("username").value=='')
        {
            document.getElementById("error_msg").style.display="block";
            document.getElementById("error_msg").innerHTML = "Please enter Username.";
            document.getElementById("username").focus();
            return false;
        }
	var paid_amount = document.getElementById('paid_amount');
        var filter = /^(?!0\d)\d*(\.\d+)?$/mg;

        if (!filter.test(paid_amount.value)) {
            $("#error_msg").html("Please enter valid Amount");
            $("#paid_amount").focus();  
            return false;
        }
		if(document.getElementById("paid_amount").value==0)
        {
            document.getElementById("error_msg").style.display="block";
            document.getElementById("error_msg").innerHTML = "Please enter valid Amount.";
            document.getElementById("paid_amount").focus();
            return false;
        }
	}); 
	$("#transactiontype").change(function() {
		var transactiontype = $("#transactiontype").val();
		if(transactiontype == 2)
			{
				var rp_points = $("#rp_points").val();
				$("#transaction_data_label").html("RP Points");
				  $('#transaction_data').html(rp_points);
			}
			if(transactiontype == 1)
			{			
				var wallet_points = $("#wallet_points").val();
				$("#transaction_data_label").html("Total Cash");
				  $('#transaction_data').html(wallet_points);
			}
			if(transactiontype == 3)
			{			
				var commission_points = $("#commission_points").val();
				$("#transaction_data_label").html("Commission Points");
				  $('#transaction_data').html(commission_points);	
			}
			if(transactiontype == '')
			{			
				var commission_points = 0;
				$("#transaction_data_label").html("Total");
				  $('#transaction_data').html(commission_points);	
			}
		
	});	
	$("#addfund").click(function() {
		var adusername = $("#adusername").val();
			$.ajax( {
                  url:'/MoneyTransfer/userexists?u='+adusername,
                  success:function(data) {
					  if(data=='notexists'){
			document.getElementById("error_msg").style.display="block";
            document.getElementById("error_msg").innerHTML = "Username does not Exist.";
            document.getElementById("adusername").focus();
            return false;
					  }
                  }
               });
			var transactiontype = $("#transactiontype").val();
			var adminusername = $("#adminusername").val();
			var paid_amount = $("#paid_amount").val();
			var wallet_points = $("#wallet_points").val();
			var commission_points = $("#commission_points").val();	
			var rp_points = $("#rp_points").val();
			if(transactiontype == 2)
			{
				if(parseFloat(paid_amount) > parseFloat(rp_points))
				{	
					if(adminusername != adusername)
					{			
					document.getElementById("error_msg").style.display="block";
					document.getElementById("error_msg").innerHTML = "Insufficient Funds.You can add funds only to Admin. Please choose Admin to transfer Funds";
					document.getElementById("adusername").focus();
					return false;
					}
					
				}
			}
			if(transactiontype == 1)
			{			
				if(parseFloat(paid_amount) > parseFloat(wallet_points))
				{				
					if(adminusername != adusername)
						{			
						document.getElementById("error_msg").style.display="block";
						document.getElementById("error_msg").innerHTML = "Insufficient Funds.You can add funds only to Admin. Please choose Admin to transfer Funds";
						document.getElementById("adusername").focus();
						return false;
						}
							
					}	
			}
			if(transactiontype == 3)
			{			
				if(parseFloat(paid_amount) > parseFloat(commission_points))
				{				
					if(adminusername != adusername)
					{			
					document.getElementById("error_msg").style.display="block";
					document.getElementById("error_msg").innerHTML = "Insufficient Funds.You can add funds only to Admin. Please choose Admin to transfer Funds";
					document.getElementById("adusername").focus();
					return false;
					}
						
				}	
			}
			
		if(document.getElementById("transactiontype").value=='')
        {
            document.getElementById("error_msg").style.display="block";
            document.getElementById("error_msg").innerHTML = "Please select Transaction Type.";
            document.getElementById("transactiontype").focus();
            return false;
        }
	if(document.getElementById("adusername").value=='')
        {
            document.getElementById("error_msg").style.display="block";
            document.getElementById("error_msg").innerHTML = "Please enter Username.";
            document.getElementById("adusername").focus();
            return false;
        }
	var paid_amount = document.getElementById('paid_amount');
        var filter = /^(?!0\d)\d*(\.\d+)?$/mg;

        if (!filter.test(paid_amount.value)) {
            $("#error_msg").html("Please enter valid Amount");
            $("#paid_amount").focus();  
            return false;
        }
		if(document.getElementById("paid_amount").value==0)
        {
            document.getElementById("error_msg").style.display="block";
            document.getElementById("error_msg").innerHTML = "Please enter valid Amount.";
            document.getElementById("paid_amount").focus();
            return false;
        }
	}); 

});