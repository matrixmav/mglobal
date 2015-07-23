<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/transaction.js');

$this->breadcrumbs = array(
    'Fund Transfer',
);
?>
<link rel="stylesheet" type="text/css" href="/metronic/assets/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="/metronic/assets/plugins/select2/select2-metronic.css"/>
<div class="col-md-7 col-sm-8">
    <div class="error" id="error_msg" style="display: none;"></div>
    <?php if ($error) { ?><div class="error" id="error_msg"><?php echo $error; ?></div><?php } ?>
<div class="portlet box orange   ">
    <div class="portlet-title">
							<div class="caption">
								Transfer Funds
							</div>
    </div>
        <div class="portlet-body form">
    <form class="form-horizontal" role="form" method="post" action="" autocomplete="off" id="transferForm">
        <fieldset> 
             <div class="form-body">
                <div class="form-group">
                    <label for="transactiontype" class="col-lg-4 control-label">Choose Type of Transaction<span class="require">*</span></label>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-7">
                                <select id="transactiontype" name="walletId" class="form-control" onchange="getExistingFund(<?php echo $userId; ?>,this.value);">
                                    <option value="">Select Wallet</option>
                                    <option value="1">Cash</option>
                                    <option value="2">RP Wallet</option>	 
                                    <option value="3">Commission Points</option>									   
                                </select>
                                <span id="transaction_error" style="color:red"></span>
                            </div>
                            <div class="col-lg-5">
                                <input type="hidden" class="form-control" id="transaction_data_amt" name="transaction_data" value=""/>
                                <div id="transaction_data" name="transaction_data" class="form-control">0</div>
                                <span id="amount_error" style="color:red"></span>
                            </div>
                        </div>
                    </div>

                </div>
                <input type="hidden" class="form-control" value="" id="search_user_id" name="search_user_id" />
                <div class="form-group">
                    <label for="lastname" class="col-lg-4 control-label">Select To User <span class="require">*</span></label>
                     <div class="col-lg-7">
                        <input type="text" class="form-control" id="search_username" name="username" onchange="getFullNameAdmin(this.value,'<?php echo $frontName;?>','<?php echo $adminUserObject; ?>');" />
                        <span id="search_fullname">&nbsp;</span>
                        <span id="search_user_error" style="color:red"></span>
                    </div>     
                </div>
                <div class="form-group">
                    <label for="paid_amount" class="col-lg-4 control-label">Amount<span class="require"> * $</span></label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" id="paid_amount" name="paid_amount"  class="form-control">
                       <span id="email_error" style="color:red"></span>
                    </div>
                    
                </div>

             </div>
            </fieldset>
 
        <div class="form-actions right">                     
                <input type="submit"  name="transfer" id="transfer" class="btn orange" value="Transfer Funds" onClick="return validationfrom();"/>                     
                <div id="loading2" style="display:none;" class="loader">Don't click back button or refresh page...your transaction is in process</div>
          </div>
       
            
    </form>
</div>
</div>
</div>
<script type="text/javascript" src="/metronic/assets/plugins/select2/select2.min.js"></script>
<style>
        #s2id_search_username{ width: 100% !important;}
</style>
<script>
 $('#transferForm').submit(function() {
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
    if (isNaN($('#paid_amount').val()))
    {
        $('#email_error').html("Invalid amount"); 
       return false;
    }
    var fund = $('#transaction_data_amt').val();
    var fundFinal = Number(fund.replace(/[^0-9\.]+/g,""));
    var fundVal = parseFloat($('#paid_amount').val());
    var totalPaid = fundVal + fundVal*1/100;
    $('#email_error').html("");   
    if(fundFinal < totalPaid)
    {
       $('#email_error').html("You don't have sufficient credits to transfer. Please choose lesser amount"); 
       return false;
    }
    
    $('#email_error').html("");   
    if(fundFinal < fundVal)
    {
       $('#email_error').html("Transfer amount can not be more than existing amount."); 
       return false;
    }
     document.getElementById('transfer').style.display="none";
     document.getElementById('loading2').style.display="block";
  });
 
function getExistingFund(userId, walletId) { 
    $("#select_wallet_error").html("");
    $.ajax({
        type: "post",
        url: "/admin/wallet/getfundbyamount",
        data: {'userId': userId, 'walletId': walletId},
        success: function (amount) {
            $("#transaction_data").html("");
            $("#wallet_amount").show();
            if (amount != 0) {
                $("#transaction_data").html(amount);
                $("#transaction_data_amt").val(amount);
                $("#fundval").val(amount.replace(/[^\d\.\-\ ]/g, ''));
            } else {
                $("#fundval").val("0.00");
                $("#transaction_data").html("<b>0.00</b>");
            }
        }
    });
}
</script>
