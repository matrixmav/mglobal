<?php
$this->breadcrumbs = array(
    'Wallet' => array('/admin/user/wallet'),
    'Recharge'
);
?>
<?php 
$mailObject = array();
if(!empty($error)){
    echo "<p class='error'>".$error."</p>";
}
?>

<form class="form-horizontal" role="form" id="form_admin_reservation" enctype="multipart/form-data" action="/admin/user/creditwallet" method="post" onsubmit="return validateForm()">
<input type="hidden" name="userId" id="search_user_id" value="<?php echo (!empty($userObject))? $userObject->id : ""; ?>"/>
<?php if(empty($_GET)) {  ?>
<div class="col-md-12 form-group">
    <label class="col-md-2">User Name: </label>
    <div class="col-md-6">
         <input type="text" class="form-control dvalid" name="name"  onchange="getFullName(this.value);" id="search_username" />
        <span style="color:red"  id="search_user_error"></span>
    </div>
</div>
<?php }else{?>
<div class="col-md-12 form-group">
    <label class="col-md-2">User Name: </label>
    <div class="col-md-6">
        <p><?php echo (!empty($userObject))? $userObject->full_name : ""; ?></p>
        <span style="color:red"  id="first_name_error"></span>
    </div>
</div>
<?php }?>
<?php $walletList = BaseClass::getWalletList(); ?>
<div class="col-md-12 form-group">
    <label class="col-md-2">Wallet Type: </label>
    <div class="col-md-6">
        <select name="walletId" id="wallet_type" class="form-control dvalid" onchange="getExistingFund(<?php echo Yii::app()->session['userid'];?>,this.value);">
            <option value="">Select Wallet</option>
            <?php foreach ($walletList as $key=>$value) { ?>
            <option value="<?php echo $key;?>" ><?php echo $value;?></option>
            <?php } ?>
        </select>
        <span style="color:red"  id="wallet_error"></span>
    </div>
</div>
<input type="hidden" id="transaction_data_amt" value="">
<!--BaseClass::getWalletList()-->
<div class="col-md-12 form-group">
    <label class="col-md-2">Add Fund *</label>
    <div class="col-md-6">
        <input type="text" class="form-control dvalid" name="paid_amount" id="fund" size="60" maxlength="75" value="<?php echo (!empty($walletObject)) ? $walletObject->touser->email : ""; ?>" />
        <span style="color:red"  id="fund_error"></span>
    </div>
</div>
<div class="col-md-12 form-group">
    <label class="col-md-2"></label>
    <div class="col-md-6">
        <input type="submit" class="btn green" name="submit" id="submit" size="60" maxlength="75" class="textBox" value="Submit" />
    </div>
</div> 
</form>
<script language = "Javascript">
    function validateForm(){
        $("#wallet_error").html("");
        if ($("#wallet_type").val() == "") {
            $("#wallet_error").html("Please Select Wallet First.");
            return false;
        }
        if ($("#fund").val() == "") {
            $("#fund_error").html("Please Add Fund!");
            return false;
        }
        if ($("#fund").val() != "") {
        var regexp = /^(0|[1-9]+[0-9]*)$/;
        var regexp1 = /^[0-9]\d*\.\d{2}$/;
        var newVal = $('#fund').val();
       
        if (!regexp1.test(newVal)) {
          $("#fund_error").html("Invalid Fund!");
          return false;
        }
    }
    var fund = $('#transaction_data_amt').val();
    var fundFinal = Number(fund.replace(/[^0-9\.]+/g,""));
    var fundVal = parseFloat($('#fund').val());
    if(fundFinal < fundVal)
    { 
         $("#fund_error").html("You don't have sufficient credits to transfer. Please choose lesser amount"); 
          return false;
        }
    }
    
</script>
<script type="text/javascript" src="/js/transaction.js"></script>