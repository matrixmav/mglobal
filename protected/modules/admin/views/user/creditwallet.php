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
        <select name="walletId" id="wallet_type" class="form-control dvalid">
            <?php foreach ($walletList as $key=>$value) { ?>
            <option value="<?php echo $key;?>" ><?php echo $value;?></option>
            <?php } ?>
        </select>
        <span style="color:red"  id="first_name_error"></span>
    </div>
</div>
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
        if ($("#fund").val() == "") {
            $("#fund_error").html("Please Add Fund!");
            return false;
        }
        if (isNaN($('#fund').val())){
            $("#fund_error").html("Please Enter Amount!");
            return false;
        }
    }
</script>
<script type="text/javascript" src="/js/transaction.js"></script>