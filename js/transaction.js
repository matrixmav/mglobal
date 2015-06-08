function getExistingFund(userId,walletId){ 
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