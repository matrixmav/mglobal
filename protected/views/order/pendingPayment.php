
       <div class="col-lg-12 col-sm-12 col-xs-12" style="width:97%!important" id="orderModal">    
            <div class="pageWrp checkout abtest" id="maincontent">
                <div class="sectionWrp summary open">
                   <p class="title"><span class="check">1.</span> <span class="txt">Your Order Summary</span></p>
                    <div id="cartDiv" class="contentBlock CartSection">
                        <table class="cartItemsWrp table table-condensed">
                            <thead>
                                <tr class="cartItemHeaderSum">
                                    <th>Package</th>
                                    <th>Description</th>
                                    <th>Duration</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr name="product_items[]" id="" class="productBlock CartItemRow domain">
                                    <td class="pNameSum">

                                        <?php echo ucfirst($orderObject->package->name);?>

                                        
                                    </td>
                                    <td class="pDescriptionSum">
                                         
                                    <?php echo $orderObject->package->Description;?> 
                                    </td>
                                    <td class="pDurationSum">


                                        <b>1 Year</b>


                                        
                                    </td>
                                    <td class="pPriceSum CartSubTotal tbl-pd">

                                        <span class="WebRupee">$</span> <span id=""><?php echo number_format($orderObject->package->amount,2);?></span>

                                    </td>
                                </tr>

                                <tr name="product_items[]" id="" class="productBlock CartItemRow domain">
                                    <td class="pNameSum">

                                        Domain

                                    </td>
                                    <td class="pDescription">
                                        <?php echo $orderObject->domain;?><br/>
                                        <span style="color:#dd0808;">Domain not available.Please choose another domain <a href="/package/domainsearch?package_id=<?php echo $orderObject->package_id; ?>&tId=<?php if(!empty($transactionObject)) { echo $transactionObject->transaction_id;} ?>">Click Here</a></span>  
                                    </td>
                                    <td class="pDurationSum">


                                        <b>1 Year</b>



                                    </td>
                                    <td class="pPriceSum CartSubTotal tbl-pd">

                                        <span class="WebRupee"></span> <span id=""><?php echo (!empty($orderObject->domain_price)) ? number_format($orderObject->domain_price,2) : "N/A";?></span>

                                    </td>
                                </tr>


                            </tbody></table>
                        
                        <div class="cartfooter clearfix">
                            <div class="col-sm-4 col-xs-12 ">
                                <form method="post" class="couponWrp form-inline" id="couponCodeContainer">
                                    <div class="form-group"> <input type="text" placeholder=" Enter Coupon Code" id="coupon_code" name="coupon_code" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="button" onclick="Couponapply();" value="Apply" class="btn btn-success">
                                    </div>
                                    <span id="coupon_success" style="display: none;" class="couponWarning"></span>
                                    <div id="coupon_error" style="display: none;" class="couponError"></div>



                                    <div style="display: none;" class="offerBlurb">
                                        <div class="blurbTop"></div>
                                        <div class="blurbBody"></div>
                                        <div class="blurbBottom"></div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4 col-xs-12">

                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <table cellspacing="0" cellpadding="0" border="0" class="cartTotalWrp tbl-2">
                                    <tbody>
                                        <tr class="ItemConvertedSubtotal">
                                            <td class="itemText">
                                                <p>Subtotal :</p>
                                            </td>
                                            <td class="itemAmount">
                                                <p id="CartTotal"><span class="WebRupee"> $</span> <span id="total"><?php echo number_format($orderObject->package->amount + $orderObject->domain_price, 2); ?></span></p>
                                            </td>
                                        </tr>

                                        <tr style="display:none;" id="coupon_discount" class="ItemConvertedSubtotal">
                                            <td class="itemText">
                                                <p>Coupon Discount: </p>
                                            </td>
                                            <td class="itemAmount">
                                                <p id="CartTotal"><span class="WebRupee"> $</span> <span id="total-discount"><?php echo number_format($orderObject->domain_price, 2); ?></span>&nbsp;&nbsp;<a onclick="removeCoupon();"><i class="fa fa-times" title="remove coupon used"></i></a></p>
                                            </td>
                                        </tr> 
                                        <tr class="ItemTotalAfterDiscount">

                                            <td class="itemText">
                                                <p>Total Amount: </p>
                                            </td>
                                            <td class="itemAmount">
                                                <p id="TotalAmount"><span class="WebRupee"> $</span> <span id="totalpayable"><?php echo number_format($orderObject->package->amount + $orderObject->domain_price, 2); ?></span></p>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="btnWrp col-sm-11">
                            <a onclick="proceedPayment();" class="btn btn-success btn-lg" id="summary-btn">Proceed to Payment</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
      
 
          <div class="col-lg-12 col-sm-12 col-xs-12" style="width:97%!important;display:none;" id="makepayment">    
            <div class="pageWrp checkout abtest" id="maincontent">
<div>
  <div class="row">
        <div class="col-lg-12">    
            <div id="maincontent" class="pageWrp checkout abtest">
                <div class="sectionWrp summary open">
                    <p class="title"><span class="check"></span> <span class="txt">Make Payment</span> <span id="tatalPackageAmount">$<?php echo $orderObject->package->amount;?></span></p>
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
                                            <input id="box<?php echo $i; ?>" type="radio" value="<?php echo $fund; ?>" name="wallet_type" onclick="walletamountcalculation(<?php echo $wallet->id; ?>,<?php echo $fund; ?>,<?php echo $wallet->type;?>);" class="radiobutton" style="margin-left:0px!important;">
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
                                        <input type="radio" id="myRadio" name="myRadio" value="paypal" class="paymentradio" style="margin-left:0px!important;">
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
                            <input type="hidden" name="amount" value="" id="ppamount">
                            <input type="hidden" name="no_shipping" value="1">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="handling" value="0">
                            <input type="hidden" name="cancel_return" value="">
                            <input type="hidden" id="cancel_return" name="cancel_return" value="<?php echo Yii::app()->params['returnurl']; ?>?transaction_id=<?php if(!empty($transactionObject)) { echo $transactionObject->transaction_id;} ?>&status=cancel">
                            <input type="hidden" id="return" name="return" value="<?php echo Yii::app()->params['returnurl']; ?>?transaction_id=<?php if(!empty($transactionObject)) { echo $transactionObject->transaction_id;} ?>&status=success">
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
                              <div class="col-sm-12 col-xs-12 makeBtn">
                        <div class="col-sm-8 col-xs-8 makeBtn" id="blankDiv"> </div>
                       <div class="col-sm-4 col-xs-4 makeBtn" style="display:none;" id="masterpinDiv"> 
                        <div class="form-group"><input type="password" name="master_pin" id="master_pin" placeholder="Enter master pin" class="form-control"></div>
                        <div id="master_pin_error"> </div></div>
                        <div class="col-sm-4 col-xs-4 makeBtn" id="submitDiv" style="padding-bottom:10px;"> 
                        <input type="button" value="Make Payment" onclick="makepayment();" class="btn btn-success btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="clearInput();">Clear Input</a></div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>   
  
</div>
    </div>
    
 
<input type="hidden" id="coupon_discount_price" value=""> 
<input type="hidden" id="wallet" value="<?php echo (!empty($walletObject)) ? "1" : "0"; ?>">
<input type="hidden" id="walletused" value="">
<input type="hidden" id="totalusedrp" value="">
<input type="hidden" id="package_id" value="<?php echo $orderObject->package_id; ?>">
<input type="hidden" id="package_amt" value="<?php echo $packageObject->amount; ?>">
<input type="hidden" id="transID" value="<?php if(!empty($transactionObject)) { echo $transactionObject->transaction_id;} ?>">
<input type="hidden" id="profilepayamount" value="">
<script type="text/javascript">
       function makepayment()
    {
        var pin = $("#master_pin").val();
        var valx = $('input[name=myRadio]:checked').val();
        var group = document.walletform.myRadio;
        var totalusedrp = $("#totalusedrp").val();
        var transID = $("#transID").val();
        var ppamount = $("#ppamount").val();
        if ($("#masterpinDiv").css('display') == 'block')
        {    
            $("#master_pin_error").html('');
            if ($("#master_pin").val() == '') {
                $("#master_pin_error").html("Please enter master pin.");
                $("#master_pin").focus();
                return false;
            } else {
                var dataString = 'masterpin=' + pin;
                $.ajax({
                    type: "GET",
                    url: "/package/checkmasterpin",
                    data: dataString,
                    cache: false,
                    success: function (html) {
                        if (html == 1)
                        {
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
                        } else {
                            $("#master_pin_error").html("Incorrect master pin.");
                        }
                    }
                });
            }
        } else {

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
    }
    function walletamountcalculation(ID, key,type)
    {
        
        var str = ID + '-' + key;
        $('#walletused').val(str);
        var input = document.getElementsByName("wallet_type");
        var wallet = $("#walletused").val();
       var payAmount = $("#payAmount");
       $('#profilepayamount').val($('#totalAmount').val());
        var package_amt = $('#profilepayamount').val();
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
            $('#walletamount').html('$ ' + total);
            $('#payamount').html(Math.round(payableAmount).toFixed(2));
            $('#totalusedrp').val(total);
        }
        if (total > totalAmount)
        {
            $('#payamount').html('');
            $('#totalusedrp').val('');
            var totalAmountRP = $('#totalAmount').val() * 25 / 100;
            var payableAmount = total - totalAmount;
            $('#walletamount').html('$ ' + totalAmount);
            if (type == '2')
            {
                $('#payamount').html(Math.round(totalAmountRP).toFixed(2));
                $("#ppamount").val(Math.round(totalAmountRP).toFixed(2));
            } else {
                $('#payamount').html('0');
                $("#ppamount").val(0);
            }
            $('#totalusedrp').val(totalAmount);
        }
        if (total == totalAmount)
        {

            $('#payamount').html('');
            $('#totalusedrp').val('');
            var totalAmountRP = $('#totalAmount').val() * 25 / 100;
            var payableAmount = total - totalAmount;
            $('#walletamount').html('$ ' + totalAmount);
            if (type == '2')
            {
                $('#payamount').html(totalAmountRP);
                $("#ppamount").val(totalAmountRP);
            } else {
                $('#payamount').html('0');
                $("#ppamount").val(0);
            }
            $('#totalusedrp').val(total);
            //$('#totalAmount').val(0);

        }
        var totalusedRP = $("#totalusedrp").val();
        var transID = $("#transID").val();
        var dataString = 'transactionId='+transID+'&payableAmount=' + payableAmount + '&wallet=' + wallet + '&totalusedRP=' + totalusedRP;
         
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
                    document.getElementById('masterpinDiv').style.display = "block";
                    $('#blankDiv').removeClass('col-sm-6 col-xs-6 makeBtn');
                    $('#blankDiv').addClass('col-sm-4 col-xs-4 makeBtn');
                    $('#submitDiv').removeClass('col-sm-6 col-xs-6 makeBtn');
                    $('#submitDiv').addClass('col-sm-4 col-xs-4 makeBtn');
                    //document.getElementById('walletOption').style.display = "none";
                    //document.getElementById('paymentOption').style.display = "block";
                }
            }
        });

    }


</script>  
    
    
</div>
<input type="hidden" id="totalAmount" value="<?php echo $orderObject->package->amount + $orderObject->domain_price; ?>">
<input type="hidden" id="payAmount" value="<?php echo $orderObject->package->amount + $orderObject->domain_price; ?>">
<input type="hidden" id="coupon_discount_price" value=""> 
<input type="hidden" id="wallet" value="<?php echo (!empty($walletObject)) ? "1" : "0"; ?>">
<input type="hidden" id="packageused" value="">
<input type="hidden" id="totalusedrp" value="">
<input type="hidden" id="domain_price" value="<?php echo $orderObject->domain_price;?>">
<input type="hidden" id="packageId" value="<?php echo $orderObject->package_id; ?>">
<input type="hidden" id="transID" value="<?php if(!empty($transactionObject)) { echo $transactionObject->transaction_id;} ?>" name="tId">
<input type="hidden" id="domain" value="<?php echo $orderObject->domain;?>"> 
<script type="text/javascript">

    function Couponapply() {
        var coupon_code = $('#coupon_code').val();
        var domain_price = $('#domain_price').val();
        var packageId = $('#packageId').val();
        if (coupon_code == '')
        {
            document.getElementById("coupon_error").style.display = "block";
            document.getElementById("coupon_error").innerHTML = "Please enter coupon code.";
            document.getElementById("coupon_error").focus();
        } else {
            var dataString = 'coupon_code=' + coupon_code + '&domain_price='+domain_price+'&package_id='+packageId;
            var url = $('#URL').val();
            $.ajax({
                type: "GET",
                url: "/package/profilecouponapply",
                data: dataString,
                cache: false,
                success: function (html) {
                    if (html == 0)
                    {
                        document.getElementById("coupon_error").style.display = "block";
                        document.getElementById("coupon_error").innerHTML = "Incorrect coupon code";
                        $("#coupon_error").fadeOut(5000);
                    } else {
                        htmlTag = html.split("_");
                        $('#coupon_code').val('');
                        document.getElementById("coupon_success").style.display = "block";
                        document.getElementById("coupon_success").innerHTML = "Coupon code applied";
                        document.getElementById("totalpayable").innerHTML = htmlTag[0];
                        document.getElementById("coupon_discount").style.display = "";
                        document.getElementById("total-discount").innerHTML = htmlTag[1];
                        document.getElementById("totalAmount").value = htmlTag[0];
                        document.getElementById("coupon_discount_price").value = htmlTag[1];
                        $("#coupon_success").fadeOut(5000);
                    }
                }

            });//@ sourceURL=pen.js

        }
    }
    function proceedPayment()
    {
        var coupon_discount = $('#coupon_discount_price').val();
        var domain_price = $('#domain_price').val();
        var domain = $('#domain').val();
        var packageId = $('#packageId').val();
        var walletVal = $('#wallet').val();
        var totalAmount = $('#totalAmount').val();
        $('#ppamount').val(totalAmount);
        var transID = $("#transID").val();
        
        var dataString = 'datasave=yes&totalAmount=' + totalAmount + '&couponDiscount=' + coupon_discount+'&transactionId='+transID+'&domain_price='+domain_price+'&package_id='+packageId+'&domain='+domain;
         
        $.ajax({
            type: "POST",
            url: "/package/orderadd",
            data: dataString,
            cache: false,
            success: function (html) {
                var htmlArr = html.split('-');

                if (htmlArr[0] == 1)
                {
                    $("#transID").val(htmlArr[1]);
                    $("#orderModal").hide();
                    $("#makepayment").show();
                     
                    
                }
            }
        });
    }

     function clearInput()
{  $("#uniform-myRadio span").removeClass("checked");
   $("#uniform-box1 span").removeClass("checked");
   $("#uniform-box2 span").removeClass("checked");
   $("#uniform-box3 span").removeClass("checked");
   $('.radiobutton').prop('checked', false);
   $('.paymentradio').prop('checked', false);
   $('#totalAmounDiv').fadeOut();
   $("#totalAmount").val(<?php if(!empty($orderObject)) { echo $orderObject->package->amount + $orderObject->domain_price;}?>);
   $("#payAmount").val(<?php if(!empty($orderObject)) { echo $orderObject->package->amount + $orderObject->domain_price;}?>);
   $("#ppamount").val(<?php if(!empty($orderObject)) { echo $orderObject->package->amount + $orderObject->domain_price;}?>);
   $("#totalusedrp").val('');
   $("#walletused").val('');
   document.getElementById('masterpinDiv').style.display = "none";
   $("#master_pin").val('');
}
function goBack()
{
    $("#orderModal").show();
    $("#makepayment").hide();
}

function removeCoupon()
    { 
        var totalAmount = $('#payAmount').val();
        var dataString = 'couponRemove=yes'
       $.ajax({
            type: "POST",
            url: "/package/removeCoupon",
            data: dataString,
            cache: false,
            success: function (html) {
                 if (html==1)
                {
                    $("#coupon_discount").fadeOut();
                    $('#totalAmount').val(totalAmount);
                    $('#totalpayable').html(Math.round(totalAmount).toFixed(2));
                    $('#coupon_discount_price').val('');
                }
            }
        });   
    }
    
    
</script>  
<style>
.fancybox-inner{width:1000px !important}
.fancybox-skin{width:1000px !important}
#master_pin_error{color:#dd0808;}
</style>
