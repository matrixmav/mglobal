<?php
 $this->breadcrumbs = array(
    'Add Cash',
);
?>
<link rel="stylesheet" type="text/css" href="/metronic/assets/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="/metronic/assets/plugins/select2/select2-metronic.css"/>
<div class="col-md-7 col-sm-7">
    <div class="error" id="error_msg" style="display: none;"></div>
    <?php if ($error) { ?><div class="error" id="error_msg"><?php echo $error; ?></div><?php } ?>

    <form class="form-horizontal" role="form" method="post" action="" autocomplete="off">
        <fieldset> 
            <legend>Add Cash</legend>
                <div class="form-group">
                    <label for="paid_amount" class="col-lg-4 control-label">Amount<span class="require"> * $</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="paid_amount" name="paid_amount"  class="form-control">
                       <span id="email_error" style="color:red"></span>
                    </div>
                    
                </div>
             <form id="walletform">
              <div class="form-group">
                    <label for="paid_amount" class="col-lg-4 control-label">Make Payment Using</label>
                    <div class="col-lg-8">
                          <div class="payChoose col-sm-4">
                                <div class="payOption clearfix">
                                    <div class="col-sm-12 col-xs-12 tleft">
                                        <input type="radio" id="myRadio" name="myRadio" value="paypal" onclick="setValue();">
                                        <label for="myRadio">Paypal</label>

                                    </div>
                                </div>
                              </form>
                        <form action="<?php echo Yii::app()->params['paypalurl']; ?>" method="post" id="frmPayPal">
                            <input type="hidden" name="business" value="pnirbhaylal@maverickinfosoft.com">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="item_name" value="cashwallet">
                            <input type="hidden" name="item_number" value="1">
                            <input type="hidden" name="credits" value="">
                            <input type="hidden" name="userid" value="<?php echo Yii::app()->session['userid']; ?>">
                            <input type="hidden" name="amount" value="" id="ppamount">
                            <input type="hidden" name="no_shipping" value="1">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="handling" value="0">
                            <input type="hidden" name="cancel_return" value="">
                            <input type="hidden" id="return" name="return" value="">
                        </form>
                    </div>
                       <span id="email_error" style="color:red"></span>
                    </div>
                    
                </div>

            </fieldset>
            <div class="row">
                <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">  
                    <input type="submit"  name="transfer" id="transfer" class="btn red" value="Add" onClick="return validationfrom();"/>                     
 
                </div>
            </div>
    </form>
</div>
<script type="text/javascript" src="/metronic/assets/plugins/select2/select2.min.js"></script>
<style>
        #s2id_search_username{ width: 100% !important;}
</style>
<script>
    function validationfrom()
{
     
    if($('#paid_amount').val()== '')
    {
       $('#email_error').html("Amount can not be blank"); 
       return false;
    }
     
    if($('#paid_amount').val() < 0 || $('#paid_amount').val() == '0')
    {
       $('#email_error').html("Invalid amount."); 
       return false;
    }
    var group = document.walletform.myRadio;
    if($('#paid_amount').val()!= '')
    {
    if (group.checked == false)
    {
    alert('Please choose payment gateway.');
                return false;
    }
    }
 }
 function setValue()
 {
     var price  = $('#paid_amount').val();
     $('#ppamount').val(price);
 }
</script>
