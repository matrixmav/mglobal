function getExistingFund(userId,walletId){ 
        $.ajax({
            type: "post",
            url: "/admin/wallet/getfundbyamount",
            data: {'userId':userId,'walletId':walletId},
            success: function (amount) { 
                $("#transaction_data").html("");
                if(amount != 0){
                    $("#transaction_data").html("<b>"+amount+"</b>");
                    $("#transaction_data_amt").val("");
                } else {
                    $("#transaction_data").html("<b>0.00</b>");
                }
            }
        });
    }
function getExistingFund(userId, walletId) {
    $.ajax({
        type: "post",
        url: "/admin/wallet/getfundbyamount",
        data: {'userId': userId, 'walletId': walletId},
        success: function (amount) {
            $("#transaction_data").html("");
            if (amount != 0) {
                $("#transaction_data").html("<b>" + amount + "</b>");
            } else {
                $("#transaction_data").html("<b>0.00</b>");
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
