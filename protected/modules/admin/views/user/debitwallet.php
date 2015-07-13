<?php
$this->breadcrumbs = array(
    'Wallet' => array('/admin/user/wallet'),
    'Recharge'
);
?>
<?php
$mailObject = array();
if (!empty($error)) {
    echo "<p>" . $error . "</p>";
}
?>

<form class="form-horizontal" role="form" id="form_admin_reservation" enctype="multipart/form-data" action="/admin/user/debitwallet" method="post">
    <input type="hidden" name="userId" id="userId" value="<?php echo (!empty($userObject)) ? $userObject->id : ""; ?>"/>
    <div class="col-md-12 form-group">
        <label class="col-md-2">User Name: </label>
        <div class="col-md-6">
            <p><?php echo (!empty($userObject)) ? $userObject->name : ""; ?></p>
            <span style="color:red"  id="first_name_error"></span>
        </div>
    </div>
    <?php $walletList = BaseClass::getWalletList(); ?>
    <div class="col-md-12 form-group">
        <label class="col-md-2">Wallet Type: </label>
        <div class="col-md-6">
            <select name="walletId" id="wallet_type" class="form-control dvalid"  onchange="getExistingFund('<?php echo $userObject->id; ?>', this.value);">
                <option selected="selected" value="0"> Select </option>
                <?php foreach ($walletList as $key => $value) { ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php } ?>
            </select>
            <span style="color:red"  id="select_wallet_error"></span>
        </div>
    </div>
    <div class="col-md-12 form-group" id="wallet_amount" style="display: none;">
        <label class="col-md-2">Existing Fund</label>
        <div class="col-md-6">
            <span style="color:red"  id="existing_fund"></span>
        </div>
    </div>
    <div class="col-md-12 form-group">
        <label class="col-md-2">Deduct Fund *</label>
        <div class="col-md-6">
            <input type="text" class="form-control dvalid" name="paid_amount" id="fund" size="60" maxlength="75" value="<?php echo (!empty($walletObject)) ? $walletObject->touser->email : ""; ?>" />
            <span style="color:red"  id="fund_error"></span>
        </div>
    </div>

    <div class="col-md-12 form-group">
        <label class="col-md-2">Comment</label>
        <div class="col-md-6">
            <textarea class="form-control dvalid" name="comment" id="fund" rows="10" cols="50"></textarea>

        </div>
    </div>

    <div class="col-md-12 form-group">
        <label class="col-md-2"></label>
        <div class="col-md-6">
            <input type="submit" class="btn green" name="submit" id="submit" size="60" maxlength="75" class="textBox" value="Submit" />
            <div id="loading2" style="display:none;" class="loader">Don't click back button or refresh page...your transaction is in process</div>
        </div>
    </div> 
    <input type="hidden" id="fundval" value="">
</form>
<script language = "Javascript">
   $('#form_admin_reservation').submit(function() {


        if ($("#wallet_type").val() == 0) {
            $("#select_wallet_error").html("Please select proper option!");
            return false;
        }
        if ($("#fund").val() == "") {
            $("#fund_error").html("Please Add Fund!");
            return false;
        }
        
        if (isNaN($('#fund').val()))
        {
           $('#fund_error').html("Invalid amount"); 
           return false;
        }
         
        if ($("#fund").val() != "") {
        var regexp = /^(0|[1-9]+[0-9]*)$/;
        var newVal = $('#fund').val();
       
        if ($("#fund").val() < 0) {
            $("#fund_error").html("Invalid Fund");
            return false;
        }
       }
        var fund = parseFloat($('#fund').val());
        var fundVal = parseFloat($('#fundval').val());

        if (fundVal < fund) {
            $("#fund_error").html("Deducting fund should not be more the existing fund!");
            return false;
        }
     
    document.getElementById('submit').style.display="none";
    document.getElementById('loading2').style.display="block";
    
    });
    function getExistingFund(userId, walletId) {
        $("#select_wallet_error").html("");
        $.ajax({
            type: "post",
            url: "/admin/wallet/getfundbyamount",
            data: {'userId': userId, 'walletId': walletId},
            success: function (amount) {
                $("#existing_fund").html("");
                $("#wallet_amount").show();
                if (amount != 0) {
                    $("#existing_fund").html(amount);
                    $("#fundval").val(amount.replace(/[^\d\.\-\ ]/g, ''));
                } else {
                    $("#fundval").val("0.00");
                    $("#existing_fund").html("<b>0.00</b>");
                }
            }
        });
    }
</script>