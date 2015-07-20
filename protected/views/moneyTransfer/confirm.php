<?php
$this->breadcrumbs = array(
    'Confirm',
);
$transactionId = base64_decode($_GET['tu']);
$moneyTransferObject = MoneyTransfer::model()->findByPk($transactionId);
?>
 
<div class="col-md-7 col-sm-7">
    <?php if ($error) { ?><div class="error" id="error_msg"><?php echo $error; ?></div><?php } ?>
    <div class="portlet box orange ">
    <div class="portlet-title">
							<div class="caption">
								Transfer Confirmation
							</div>
    </div>
     <div class="portlet-body form">
    <form class="form-horizontal" role="form" method="post" action="" id="confirmForm">
        <div class="form-body">
        <fieldset> 
           
            <div class="form-group">
                <label for="lastname" class="col-lg-4 control-label">To User Name: <span class="require">*</span></label>
                <div class="col-lg-8" >
                    <div>
                        <?php
                        if(!empty($moneyTransferObject->touser()->name)) {
                            echo "<b>".$moneyTransferObject->touser()->name."</b>";
                        } else {
                            echo "In Valid User";
                        }
                        ?>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label for="lastname" class="col-lg-4 control-label">Transfer Amount <span class="require">*</span></label>
                <div class="col-lg-8" >
                    <div class="form-control">
                        <?php
                        echo base64_decode($_GET['a']);
                        ?>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label for="master_code" class="col-lg-4 control-label">Master Pin<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" class="form-control" id="masterkey" name="master_code" >
                    <input type="hidden" value="<?php echo $transactionId; ?>" name="tu">
                    <div id="masterkey_error" class="form_error"></div>
                </div>
                
            </div>
            <div class="form-group">
                <label for="master_code" class="col-lg-4 control-label">Comment<span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea class="form-control" id="comment" name="comment"></textarea>
                    <div id="comment_error" class="form_error"></div>
                </div>                
            </div>                                  

        </fieldset>
        </div>
         <div class="form-actions right pad10">                     
                 <button type="submit"  name="confirm" class="btn orange" id="confirm">Confirm</button>
                <div id="loading2" style="display:none;" class="loader">Don't click back button or refresh page...your transaction is in process</div>
                  <!--<button type="button" class="btn">Cancel</button>-->
            </div>
        
    </form>
</div>
    </div>
</div>

<script>
 
 $('#confirmForm').submit(function() {
      $("#masterkey_error").html("");
    if ($("#masterkey").val() == "") {
        $("#masterkey_error").html("Enter Master Key");
        $("#masterkey").focus();
        return false;
    } 
  
    $("#comment_error").html("");
    if ($("#comment").val() == "") {
        $("#comment_error").html("Enter Comment");
        $("#comment").focus();            
        return false;
    }
    document.getElementById('confirm').style.display="none";
    document.getElementById('loading2').style.display="block";
    
});
</script>
