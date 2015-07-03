<link rel="stylesheet" href="/css/themes/font-awesome.min.css">

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-xs-12 col-lg-12">
             <div class="row">
		
                        
            <div class=" bs-wizard" style="border-bottom:0;">
                
                <div class="col-xs-4 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="/package/domainsearch?package_id=<?php echo Yii::app()->session['package_id']; ?>&tId=<?php echo $_GET['tId']; ?>" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Domain Search.</div>
                </div>
                
                <div class="col-xs-4 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="/package/productcart?tId=<?php echo $_GET['tId']; ?>" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Proceed Payment</div>
                </div>
                
                <div class="col-xs-4 bs-wizard-step active"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Make Payment</div>
                </div>
                
                
            </div>
        
        
        
        
        
	</div>
        </div>
    </div>
        <div class="row">
        <div class="col-lg-12">    
            <div id="maincontent" class="pageWrp checkout abtest">
                <div class="sectionWrp summary open">
                    <p class="title"><span class="check"></span> <span class="txt">Make Payment</span> <span id="tatalPackageAmount">$ <?php  if(!empty($_GET) && $_GET['pp'] !='') { echo $_GET['pp']; } ?></span></p>
                    <div id="paymentOption" class="clearfix">
                        <form id="walletform" name="walletform">  
                            <?php if ($walletObject) { ?>
                                <div id="walletOption" class="col-sm-4">

                                    <?php
                                    $i = 1;
                                    foreach ($walletObject as $wallet) {
                                        if ($wallet->type == '1') {
                                            $walletname = 'Cash Wallet';
                                            $fund = $wallet->fund;
                                        }
                                        if ($wallet->type == '2') {
                                            $walletname = 'RP Wallet';
                                            $fund = $wallet->fund ;//* 75 / 100;
                                        }
                                        if ($wallet->type == '3') {
                                            $walletname = 'Commision Wallet';
                                            $fund = $wallet->fund;
                                        }
                                        ?>
                                        <div class="col-sm-12 col-xs-12 tleft">
                                            <input id="box<?php echo $i; ?>" type="radio" value="<?php echo $fund; ?>" name="wallet_type" onclick="walletamountcalculation(<?php echo $wallet->id; ?>,<?php echo $fund; ?>,<?php echo $wallet->type;?>);" class="radiobutton">
                                            <label for="box<?php echo $i; ?>"><?php echo $walletname; ?>&nbsp;($<?php echo $wallet->fund; ?>)  </label>
                                        </div>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                    <br/><br/>

                                </div>
<?php } ?>

                            <div class="payChoose col-sm-4">
                                <div class="payOption clearfix">
                                    <div class="col-sm-12 col-xs-12 tleft">
                                        <input type="radio" id="myRadio" name="myRadio" value="paypal" class="paymentradio">
                                        <label for="myRadio">Paypal</label>

                                    </div>
                                </div>
                        </form>
                        <form action="<?php echo Yii::app()->params['paypalurl']; ?>" method="post" id="frmPayPal">
                            <input type="hidden" name="business" value="pnirbhaylal@maverickinfosoft.com">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="item_name" value="<?php echo $packageObject->name; ?>">
                            <input type="hidden" name="item_number" value="1">
                            <input type="hidden" name="credits" value="">
                            <input type="hidden" name="userid" value="<?php echo Yii::app()->session['userid']; ?>">
                            <input type="hidden" name="amount" value="<?php if(!empty($_GET['pp'])) { echo $_GET['pp']; }?>" id="ppamount">
                            <input type="hidden" name="no_shipping" value="1">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="handling" value="0">
                            <input type="hidden" name="cancel_return" value="">
                            <input type="hidden" id="return" name="return" value="<?php echo Yii::app()->params['returnurl']; ?>?transaction_id=<?php echo $_GET['tId']; ?>">
                        </form>
                    </div>
                    <div class="col-sm-4  col-xs-12 amountTab" display="table" id="totalAmounDiv" style="display:none;">
                        <table width="100%" class="table">
                            <tr class="danger">
                                <td> <div id="actualamountDiv">  Total Amount</div> </td>
                                <td><span id="actualamount"></span></td>
                            </tr>
                            <tr tr class="info">
                                <td><div id="walletamountDiv">  Wallet Amount</div> </td>
                                <td><span id="walletamount"></span></td>
                            </tr>
                            <tr class="warning">
                                <td><div id="walletamountDiv"> Payable Amount </div></td>
                                <td>$<span id="payamount"></span></td>
                            </tr>
                        </table>
                    </div>
                            <div class="col-sm-10 col-xs-12 makeBtn"> <input type="button" value="Make Payment" onclick="makepayment();" class="btn btn-success btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="clearInput();">Clear Input</a></div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<input type="hidden" id="totalAmount" value="<?php if(!empty($_GET['pp'])) { echo $_GET['pp']; }?>">
<input type="hidden" id="payAmount" value="<?php if(!empty($_GET['pp'])) { echo $_GET['pp']; }?>">
<input type="hidden" id="coupon_discount_price" value=""> 
<input type="hidden" id="wallet" value="<?php echo (!empty($walletObject)) ? "1" : "0"; ?>">
<input type="hidden" id="walletused" value="">
<input type="hidden" id="totalusedrp" value="">
<input type="hidden" id="package_id" value="<?php echo Yii::app()->session['package_id']; ?>">
<input type="hidden" id="package_amt" value="<?php if(!empty($_GET['pp'])) { echo $_GET['pp']; }?>">
<input type="hidden" id="transID" value="<?php echo $_GET['tId']; ?>">
<script type="text/javascript">
    function makepayment()
    {
        var valx = $('input[name=myRadio]:checked').val();
        var group = document.walletform.myRadio;
        var totalusedrp = $("#totalusedrp").val();
        var transID = $("#transID").val();
        var ppamount = $("#ppamount").val();
        if (ppamount == 0)
        {
            location.href = "/package/thankyou?transaction_id=" + transID;
        } else {

            if (group.checked == false)
            {
                alert('Please choose payment gateway.');
                return false;
            }

            if (valx == 'paypal')
            {
                document.getElementById("frmPayPal").submit();
            }
        }

    }
    function walletamountcalculation(ID, key,type)
    {
        
        var str = ID + '-' + key;
        $('#walletused').val(str);
        var input = document.getElementsByName("wallet_type");
        var wallet = $("#walletused").val();
       
        var package_amt = $('#package_amt').val();
        var total = key;
        if(type=='2')
        {
            var totalAmount = $('#totalAmount').val()*75/100; 
        }else{
             var totalAmount = $('#totalAmount').val();
        }
         
        if (totalAmount > total)
        {
             
            $('#payamount').html('');
            var payableAmount = totalAmount - total;
             
//                $('#totalAmount').val(payableAmount);
//                $('#package_amt').val(payableAmount);
            $("#ppamount").val(Math.round(payableAmount).toFixed(2));
            $('#walletamount').html('$ '+total);
            $('#payamount').html(payableAmount);
            $('#totalusedrp').val(total);
        } 
         if(total > totalAmount)
          {
            $('#payamount').html('');
            $('#totalusedrp').val('');
            var totalAmountRP = $('#totalAmount').val()*25/100; 
            var payableAmount = total - totalAmount;
            $('#walletamount').html('$ '+totalAmount);
            if(type=='2')
            {
            $('#payamount').html(totalAmountRP);
            $("#ppamount").val(totalAmountRP);
            }else{
             $('#payamount').html('0'); 
             $("#ppamount").val(0);
            }
            $('#totalusedrp').val(totalAmount);
          }
        if(total == totalAmount)
        {
             
            $('#payamount').html('');
            $('#totalusedrp').val('');
           var totalAmountRP = $('#totalAmount').val()*25/100; 
            var payableAmount = total - totalAmount;
            $('#walletamount').html('$ '+totalAmount);
            if(type=='2')
            {
            $('#payamount').html(totalAmountRP);
            $("#ppamount").val(totalAmountRP);
            }else{
             $('#payamount').html('0'); 
             $("#ppamount").val(0);
            }
            $('#totalusedrp').val(total);
            //$('#totalAmount').val(0);
         
        }
        var totalusedRP = $("#totalusedrp").val();
        
        var dataString = 'transactionId=<?php echo isset($_GET['tId']) ? $_GET['tId'] : ""; ?>&payableAmount=' + payableAmount + '&wallet=' + wallet + '&totalusedRP=' + totalusedRP;
         
        $.ajax({
            type: "GET",
            url: "/package/walletcalc",
            data: dataString,
            cache: false,
            success: function (html) {
                if (html == 1)
                {
                    $('#totalAmounDiv').fadeIn();
                    $('#actualamount').html('$ ' + package_amt);
                    //$('#walletamount').html('$' + total);
                    //$('#payamount').html('$' + payableAmount);
                    $('#cartDiv').fadeOut();
                    $('#editIcon').fadeIn();

                    //document.getElementById('walletOption').style.display = "none";
                    //document.getElementById('paymentOption').style.display = "block";
                }
            }
        });

    }

function clearInput()
{
   $("#totalAmount").val(<?php if(!empty($_GET['pp'])) { echo $_GET['pp']; }?>);
   $("#payAmount").val(<?php if(!empty($_GET['pp'])) { echo $_GET['pp']; }?>);
   $("#ppamount").val(<?php if(!empty($_GET['pp'])) { echo $_GET['pp']; }?>);
   $("#totalusedrp").val('');
   $("#walletused").val('');
   $('.radiobutton').prop('checked', false);
   $('.paymentradio').prop('checked', false);
   $('#totalAmounDiv').fadeOut();
}
</script>