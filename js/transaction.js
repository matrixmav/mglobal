//function getExistingFund(userId,walletId){ 
//   // alert(userId);return false;
//        $.ajax({
//            type: "post",
//            url: "/admin/wallet/getfundbyamount",
//            data: {'userId':userId,'walletId':walletId},
//            success: function (amount) { 
//                $("#transaction_data").html("");
//                if(amount != 0){
//                    $("#transaction_data").html("<b>"+amount+"</b>");
//                    
//                } else {
//                    $("#transaction_data").html("<b>0.00</b>");
//                }
//            }
//        });
//    }
function getExistingFund(userId, walletId) {
 
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
                $("#search_username").val(userData.name);
                $("#search_fullname").html(userData.fullName);
                $("#search_user_id").val(userData.id);
            } else {
                $("#search_user_id").val(0);
                $("#search_user_error").html("User not existed!!!");
            }
        }
    });
}
//function getFullNameAdmin(userName,loggedInUserName) {
//   if(userName== 'admin' || userName == 'info' || userName == 'marketing' || userName=='Customercare' || userName== loggedInUserName)
//   {
//    $("#search_user_error").html("Sorry! you can not transfer fund to this account!!!");
//    return false;
//   }else{
//       
//    $.ajax({
//        type: "post",
//        url: "/user/getfullname",
//        data: {'userName': userName},
//        success: function (data) {
//            var userData = jQuery.parseJSON(data);
//            $("#search_user_error").html("");
//            if (userData) {
//                $("#search_username").val(userData.name);
//                $("#search_fullname").html(userData.fullName);
//                $("#search_user_id").val(userData.id);
//            } else {
//                $("#search_user_id").val(0);
//                $("#search_user_error").html("User not existed!!!");
//            }
//        }
//    });
//}
//}
 
function getFullNameAdmin(userName, loggedInUserName, adminUserObject) {
    var boxex = adminUserObject.split(",");
    if (userName == loggedInUserName)
    {
        $("#search_user_error").html("Sorry! you can not transfer fund to this account!!!");
        return false;
    }
    for (var x = 0; x < boxex.length; x++) {
        if (userName == boxex[x])
        {
            $("#search_user_error").html("Sorry! you can not transfer fund to this account!!!");
            return false;
        }
    }
    $.ajax({
        type: "post",
        url: "/user/getfullname",
        data: {'userName': userName},
        success: function (data) {
            var userData = jQuery.parseJSON(data);
            $("#search_user_error").html("");
            if (userData) {
                $("#search_username").val(userData.name);
                $("#search_fullname").html(userData.fullName);
                $("#search_user_id").val(userData.id);
            } else {
                $("#search_user_id").val(0);
                $("#search_user_error").html("User not existed!!!");
            }
        }
    });
}
 
