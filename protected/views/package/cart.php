<div class="container">
    <div class="col-lg-12">    
        <div id="maincontent" class="pageWrp checkout abtest">
            <div class="sectionWrp summary open">
                <p class="title"><span class="check">1.</span> <span class="txt">Your Order Summary</span><a onclick="OpenDiv();" id="editIcon" style="display:none;" class="edit-icon">Edit</a></p>
                <div class="contentBlock CartSection" id="cartDiv">
                    <table class="cartItemsWrp" cellspacing="0" cellpadding="0">
                        <tbody><tr class="cartItemHeader">
                                <th>Package</th>
                                <th>Description</th>
                                <th>Duration</th>
                                <th>Price</th>
                            </tr>

                            <tr class="productBlock CartItemRow domain" id="" name="product_items[]">
                                <td class="pName">
                                    <div class="name itemblock topRow vCenter">
                                        <?php echo $packageObject->name; ?>


                                    </div>

                                </td>
                                <td class="pDescription">
                                    <p class="description itemblock topRow vCenter"><?php echo substr($packageObject->Description, 0, 100); ?></p>
                                </td>
                                <td class="pDuration">
                                    <div class="itemblock topRow">
                                        <p class="selectWrp">
                                            <b>1 Year</b>

                                        </p>
                                    </div>
                                </td>
                                <td class="pPrice CartSubTotal tbl-pd">
                                    <div class="pos_hlp itemblock topRow">
                                        <p class="price ItemSubTotal">
                                            <span class="WebRupee">$</span> <span id=""><?php echo Yii::app()->format->number($packageObject->amount) . ".00"; ?> </span>
                                        </p>
                                    </div>
                                </td>
                            </tr>

                            <tr class="productBlock CartItemRow domain" id="" name="product_items[]">
                                <td class="pName">
                                    <div class="name itemblock topRow vCenter">
                                        Domain
                                    </div>
                                </td>
                                <td class="pDescription">
                                    <p class="description itemblock topRow vCenter"><?php echo Yii::app()->session['domain']; ?></p>
                                </td>
                                <td class="pDuration">
                                    <div class="itemblock topRow">
                                        <p class="selectWrp">
                                            <b>1 Year</b>

                                        </p>
                                    </div>
                                </td>
                                <td class="pPrice CartSubTotal tbl-pd">
                                    <div class="pos_hlp itemblock topRow">
                                        <p class="price ItemSubTotal">
                                            <span class="WebRupee"></span> <span id=""><?php if (Yii::app()->session['amount'] != '') { ?> $<?php echo number_format(Yii::app()->session['amount'], 2); ?><?php } else { ?> N/A<?php } ?></span>
                                        </p>
                                    </div>
                                </td>
                            </tr>


                        </tbody></table>
                    </form>
                    <div class="cartfooter">
                        <form id="couponCodeContainer" class="couponWrp lfloat" method="post">
                            <input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder="Please Enter Coupon Code">
                            <input type="button" class="btn-flat-green ui-btn-grey" value="Apply" onclick="Couponapply();">

                            <span class="couponWarning" style="display: none;" id="coupon_success"></span>
                            <div class="couponError" style="display: none;" id="coupon_error"></div>



                            <div class="offerBlurb" style="display: none;">
                                <div class="blurbTop"></div>
                                <div class="blurbBody"></div>
                                <div class="blurbBottom"></div>
                            </div>
                        </form>
                        <div class="socialBtnWrp lfloat">
                            <div class="fbConnect">
                                <span id="fbButton" class="fbbtn"></span>

                            </div>
                        </div>
                        <table class="cartTotalWrp rfloat tbl-2" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr class="ItemConvertedSubtotal">
                                    <td class="itemText">
                                        <p>Subtotal:</p>
                                    </td>
                                    <td class="itemAmount">
                                        <p id="CartTotal"><span class="WebRupee">$</span> <span id="total"><?php echo number_format($packageObject->amount + Yii::app()->session['amount'], 2); ?></span></p>
                                    </td>
                                </tr>

                                <tr class="ItemConvertedSubtotal" id="coupon_discount" style="display:none;">
                                    <td class="itemText">
                                        <p>Coupon Discount:</p>
                                    </td>
                                    <td class="itemAmount">
                                        <p id="CartTotal"><span class="WebRupee">$</span> <span id="total-discount"><?php echo number_format($packageObject->amount + Yii::app()->session['amount'], 2); ?></span></p>
                                    </td>
                                </tr> 
                                <tr class="ItemTotalAfterDiscount">

                                    <td class="itemText">
                                        <p>Total Amount:</p>
                                    </td>
                                    <td class="itemAmount">
                                        <p id="TotalAmount"><span class="WebRupee">$</span> <span id="totalpayable"><?php echo number_format($packageObject->amount + Yii::app()->session['amount'], 2); ?></span></p>
                                    </td>
                                </tr>
                            </tbody></table>
                    </div>
                    <div class="btnWrp">
                        <a id="summary-btn" class="btn-flat-green xxl" onclick="proceedPayment();">Proceed to Payment</a>
                    </div>
                </div>
                <?php if ($walletObject) { ?>
                    <div class="sectionWrp paymentOptions">
                        <p class="title"><span class="check">2.</span> <span class="txt">Choose Amount</span> <span class="edit">edit</span></p>
                        <div id="walletOption" style="display:none;">
                            <form id="walletform" name="walletform">
                                <?php
                                foreach ($walletObject as $wallet) {
                                    if ($wallet->type == '1') {
                                        $walletname = 'Cash Wallet';
                                        $fund = $wallet->fund;
                                    }
                                    if ($wallet->type == '2') {
                                        $walletname = 'RP Wallet';
                                        $fund = $wallet->fund * 75 / 100;
                                    }
                                    if ($wallet->type == '3') {
                                        $walletname = 'Commision Wallet';
                                        $fund = $wallet->fund;
                                    }
                                    ?>
                                    <input type="checkbox" value="<?php echo $fund; ?>" name="wallet_type"><?php echo $walletname; ?>  
                                <?php } ?>
                                <br/><br/>
                                <input type="button" value="Make Payment" onclick="walletamountcalculation();" class="btn-flat-green ui-btn-grey">   
                            </form>
                        </div>
                    </div>
<?php } ?>

                <div class="sectionWrp paymentOptions">
                    <p class="title"><span class="check">2.</span> <span class="txt">Make Payment</span> <span class="edit">edit</span></p>
                    <div id="paymentOption" style="display:none;">
                        <input type="radio" value="paypal" name="payment_mode">Paypal 
                         <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="frmPayPal">
                            <input type="hidden" name="business" value="pnirbhaylal@maverickinfosoft.com">
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="item_name" value="<?php echo $packageObject->name; ?>">
                            <input type="hidden" name="item_number" value="1">
                            <input type="hidden" name="credits" value="">
                            <input type="hidden" name="userid" value="<?php Yii::app()->session['userid']; ?>">
                            <input type="hidden" id ="ppamount" name="amount" value="<?php echo $packageObject->amount + Yii::app()->session['amount']; ?>">
                            <input type="hidden" name="no_shipping" value="1">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="handling" value="0">
                            <input type="hidden" name="cancel_return" value="">
                            <input type="hidden" name="return" value="http://localhost/package/thankyou/">

                        </form> 
                        <input type="button" value="Make Payment" onclick="makepayment();" class="btn-flat-green ui-btn-grey">   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="totalAmount" value="<?php echo $packageObject->amount + Yii::app()->session['amount']; ?>">
<input type="hidden" id="coupon_discount_price" value=""> 
<input type="hidden" id="wallet" value="<?php echo (!empty($walletObject)) ? "1" : "0"; ?>">
<script type="text/javascript">

    function Couponapply() {
        var coupon_code = $('#coupon_code').val();
        if (coupon_code == '')
        {
            document.getElementById("coupon_error").style.display = "block";
            document.getElementById("coupon_error").innerHTML = "Please enter a domain name.";
            document.getElementById("coupon_error").focus();
        } else {
            var dataString = 'coupon_code=' + coupon_code;
            var url = $('#URL').val();
            $.ajax({
                type: "GET",
                url: "couponapply",
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
        var walletVal = $('#wallet').val();
        var totalAmount = $('#totalAmount').val();
        var dataString = 'datasave=yes&totalAmount=' + totalAmount + '&coupon_discount=' + coupon_discount;
        $.ajax({
            type: "GET",
            url: "orderadd",
            data: dataString,
            cache: false,
            success: function (html) {
                if (html == 1)
                {
                    $('#cartDiv').fadeOut();
                    $('#editIcon').fadeIn();
                    if (walletVal == 1)
                    {
                        document.getElementById('walletOption').style.display = "block";
                    } else {
                        document.getElementById('paymentOption').style.display = "block";
                    }

                }
            }
        });
    }

    function OpenDiv()
    {
        $('#cartDiv').fadeIn();
        $('#paymentOption').fadeOut();
    }
    function makepayment()
    {
        var valx = $('input[name=payment_mode]:checked').val();
        if (valx == 'paypal')
        {
            document.getElementById("frmPayPal").submit();
        }
        
    }
    function walletamountcalculation()
    {
        var input = document.getElementsByName("wallet_type");
        var totalAmount = $('#totalAmount').val();
        var total = 0;
        for (var i = 0; i < input.length; i++) {
            if (input[i].checked) {
                total += parseFloat(input[i].value);
            }
        }
        var payableAmount = totalAmount - total;
        
        $('#totalAmount').val(payableAmount);
        $('#ppamount').val(payableAmount); 
        document.getElementById('walletOption').style.display = "none";
        document.getElementById('paymentOption').style.display = "block";
     }
</script>    
