function getExistingFund(userId,walletId){ 
   // alert(userId);return false;
        $.ajax({
            type: "post",
            url: "/admin/wallet/getfundbyamount",
            data: {'userId':userId,'walletId':walletId},
            success: function (amount) { 
                $("#transaction_data").html("");
                if(amount != 0){
                    $("#transaction_data").html("<b>"+amount+"</b>");
                    
                } else {
                    $("#transaction_data").html("<b>0.00</b>");
                }
            }
        });
    }
function getExistingFund(userId, walletId) {
    //alert(userId);return false;
    $.ajax({
        type: "post",
        url: "/admin/wallet/getfundbyamount",
        data: {'userId': userId, 'walletId': walletId},
        success: function (amount) {
            $("#transaction_data").html("");
            if (amount != 0) {
                $("#transaction_data").html("<b>" + amount + "</b>");
                $("#transaction_data_amt").val(amount);
            } else {
                $("#transaction_data").html("<b>0.00</b>");
                $("#transaction_data_amt").val("0.00");
            }
        }
    });
}

function getFullName(userName) {
    
    $.ajax({
        type: "post",
        url: "/user/getfullname",
        data: {'userName': userName},
        success: function (data) {
            var userData = jQuery.parseJSON(data);
            $("#search_user_error").html("");
            if (userData) {
                $("#search_username").val(userData.fullName);
                $("#search_user_id").val(userData.id);
            } else {
                $("#search_user_id").val(0);
                $("#search_user_error").html("User not existed!!!");
            }
        }
    });
}
function getFullNameAdmin(userName) {
   if(userName== 'admin' || userName == 'info' || userName == 'marketing' || userName=='Customercare')
   {
    $("#search_user_error").html("Sorry! you can not transfer fund to admin!!!");
    return false;
   }else{
       
    $.ajax({
        type: "post",
        url: "/user/getfullname",
        data: {'userName': userName},
        success: function (data) {
            var userData = jQuery.parseJSON(data);
            $("#search_user_error").html("");
            if (userData) {
                $("#search_username").val(userData.fullName);
                $("#search_user_id").val(userData.id);
            } else {
                $("#search_user_id").val(0);
                $("#search_user_error").html("User not existed!!!");
            }
        }
    });
}
}
 
function validationfrom()
{
    $('#transaction_error').html("");
    if($('#transactiontype').val()=='')
    {
       $('#transaction_error').html("Please choose wallet type"); 
       return false;
    }
    $('#search_user_error').html("");
   if($('#search_username').val()=='')
    {
       $('#search_user_error').html("Please choose user to transfer amount."); 
       return false;
    }
    $('#amount_error').html("");
     if($('#transaction_data_amt').val()== '0.00')
    {
       $('#amount_error').html("Transfer amount can not be 0.00"); 
       return false;
    }
    if($('#paid_amount').val()== '')
    {
       $('#email_error').html("Transfer amount can not be blank"); 
       return false;
    }
    var fund = $('#transaction_data_amt').val();
    var fundFinal = Number(fund.replace(/[^0-9\.]+/g,""))
    var fundVal = parseFloat($('#paid_amount').val());
    var totalPaid = fundVal + fundVal*1/100;
    $('#email_error').html("");   
    if(fundFinal < totalPaid)
    {
       $('#email_error').html("You don't have sufficient amount to transfer. Please reduce amount"); 
       return false;
    }
    
    $('#email_error').html("");   
    if(fundFinal < fundVal)
    {
       $('#email_error').html("Transfer amount can not be more than existing amount."); 
       return false;
    }
    
    
    
    else{
        
    $.ajax({
        type: "post",
        url: "/admin/wallet/getfundbyamount",
        data: {'userId': userId, 'walletId': walletId},
        success: function (amount) {
            $("#transaction_data").html("");
            if (amount != 0) {
                $("#transaction_data").html("<b>" + amount + "</b>");
                $("#transaction_data_amt").val(amount);
            } else {
                $("#transaction_data").html("<b>0.00</b>");
                $("#transaction_data_amt").val("0.00");
            }
        }
    });    
        
    }
}
 
