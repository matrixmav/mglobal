<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<div class="container">
    <div class="row">
    <div class="col-lg-12">    
        <div id="maincontent" class="pageWrp checkout abtest">
            <div class="sectionWrp summary open">
                <p class="title"><span class="check">1.</span> <span class="txt">Your Order Summary</span><a onclick="OpenDiv();" id="editIcon" style="display:none;" class="edit-icon">Edit</a></p>
                <div class="contentBlock CartSection" id="cartDiv">
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
                            <tr class="productBlock CartItemRow domain" id="" name="product_items[]">
                                <td class="pNameSum">
                                   
                                        <?php echo $packageObject->name; ?>


                                    </div>
                                </td>
                                <td class="pDescriptionSum">
                                   <?php echo substr($packageObject->Description, 0, 100); ?>
                                </td>
                                <td class="pDurationSum">
                                    
                                        
                                            <b>1 Year</b>

                                       
                                    </div>
                                </td>
                                <td class="pPriceSum CartSubTotal tbl-pd">
                                    
                                            <span class="WebRupee">$</span> <span id=""><?php echo Yii::app()->format->number($packageObject->amount) . ".00"; ?> </span>
                                        
                                </td>
                            </tr>

                            <tr class="productBlock CartItemRow domain" id="" name="product_items[]">
                                <td class="pNameSum">
                                    
                                        Domain
                                   
                                </td>
                                <td class="pDescription">
                                   <?php echo Yii::app()->session['domain']; ?>
                                </td>
                                <td class="pDurationSum">
                                    
                                      
                                            <b>1 Year</b>

                                        
                                    
                                </td>
                                <td class="pPriceSum CartSubTotal tbl-pd">
                                   
                                            <span class="WebRupee"></span> <span id=""><?php if (Yii::app()->session['amount'] != '') { ?> $<?php echo number_format(Yii::app()->session['amount'], 2); ?><?php } else { ?> N/A<?php } ?></span>
                                      
                                </td>
                            </tr>


                        </tbody></table>
                    </form>
                    <div class="cartfooter">
                        <div class="col-sm-4 col-xs-12">
                        <form id="couponCodeContainer" class="couponWrp form-inline" method="post">
                           <div class="form-group"> <input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder=" Enter Coupon Code">
                           </div>
                            <div class="form-group">
                            <input type="button" class="btn btn-success" value="Apply" onclick="Couponapply();">
                            </div>
                            <span class="couponWarning" style="display: none;" id="coupon_success"></span>
                            <div class="couponError" style="display: none;" id="coupon_error"></div>



                            <div class="offerBlurb" style="display: none;">
                                <div class="blurbTop"></div>
                                <div class="blurbBody"></div>
                                <div class="blurbBottom"></div>
                            </div>
                        </form>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                        
                        </div>
                        <div class="col-sm-4 col-xs-12">
                        <table class="cartTotalWrp tbl-2" cellpadding="0" cellspacing="0" border="0">
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
                    </div>
                    <div class="btnWrp">
                        <a id="summary-btn" class="btn btn-success btn-lg" onclick="proceedPayment();">Proceed to Payment</a>
                    </div>
                </div>

                <div class="sectionWrp paymentOptions">
                    <p class="title"><span class="check">2.</span> <span class="txt">Choose Amount</span> <span class="edit">edit</span></p>
                    <div id="walletOption" style="display:none;">
                        <form id="walletform" name="walletform">
                            <div class="col-sm-4 col-xs-12 tleft">
                           <input id="box1" type="checkbox" />
                            <label for="box1">Cash Wallet</label>
                            </div>
                             <div class="col-sm-4 col-xs-12 tleft">
                           <input id="box2" type="checkbox" />
                            <label for="box2">RP Wallet</label>
                             </div>
                             <div class="col-sm-4 col-xs-12 tleft">
                          <input id="box3" type="checkbox" />
                         <label for="box3">Commision Wallet</label>
                            <br/><br/> </div>
                            <input type="button" value="Make Payment" onclick="walletamountcalculation();" class="btn btn-success btn-lg">   
                             </div>
                            </form>
                        
                         
                            </div>

                            <div class="sectionWrp paymentOptions">
                                <p class="title"><span class="check">2.</span> <span class="txt">Make Payment</span> <span class="edit">edit</span></p>
                                <div id="paymentOption" style="display:none;">
                                    <input type="radio" value="paypal" name="payment_mode">Paypal 
                                    <input type="radio" value="rp" name="payment_mode">Use RP
                                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="frmPayPal">
                                        <input type="hidden" name="business" value="pnirbhaylal@maverickinfosoft.com">
                                        <input type="hidden" name="cmd" value="_xclick">
                                        <input type="hidden" name="item_name" value="<?php echo $packageObject->name; ?>">
                                        <input type="hidden" name="item_number" value="1">
                                        <input type="hidden" name="credits" value="">
                                        <input type="hidden" name="userid" value="<?php Yii::app()->session['userid']; ?>">
                                        <input type="hidden" name="amount" value="<?php echo $packageObject->amount + Yii::app()->session['amount']; ?>">
                                        <input type="hidden" name="no_shipping" value="1">
                                        <input type="hidden" name="currency_code" value="USD">
                                        <input type="hidden" name="handling" value="0">
                                        <input type="hidden" name="cancel_return" value="">
                                        <input type="hidden" name="return" value="/transaction/">

                                    </form> 
                                    <input type="button" value="Make Payment" onclick="makepayment();" class="btn-flat-green ui-btn-grey">   
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <input type="hidden" id="totalAmount" value="<?php echo $packageObject->amount + Yii::app()->session['amount']; ?>">
        <input type="hidden" id="coupon_discount_price" value=""> 
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
                            document.getElementById('walletOption').style.display = "block";

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
                if (valx == 'rp')
                {
                    location.href = "/transaction/thankyou/";
                }
            }
            function walletamountcalculation()
            {
                var form = document.walletform;
                var totalAmount = $('#totalAmount').val();
                var dataString = $(form).serialize()+'&totalAmount='+totalAmount;


                $.ajax({
                    type: 'POST',
                    url: '/package/walletcalculation/',
                    data: dataString,
                    success: function (data) { alert(data);return false;
                        $('#myResponse').html(data);


                    }
                });
                return false;
            }
        </script>    
