<link rel="stylesheet" href="/css/themes/font-awesome.min.css">

        <?php if(Yii::app()->session['package_id']!=''){?>
   <div class="container">
    <div class="row">
        <div class="col-sm-12 col-xs-12 col-lg-12">
            <a href="/package/domainsearch?package_id=<?php echo Yii::app()->session['package_id'];?>&tId=<?php if(!empty($_GET)) { echo $_GET['tId']; }?> ">Domain Search</a> &nbsp;&nbsp;&nbsp; <a href="javascript:void(0);">Proceed Payment</a> &nbsp;&nbsp;&nbsp; <a href="javascript:void(0);">Make Payment</a>
                                <div class="row">
		
                        
            <div class=" bs-wizard" style="border-bottom:0;">
                
                <div class="col-xs-4 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Domain Search.</div>
                </div>
                
                <div class="col-xs-4 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
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
                    <p class="title"><span class="check">1.</span> <span class="txt" style="width: auto">Your Order Summary</span></p>
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
                        <div class="cartfooter clearfix">
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
                        <div class="btnWrp col-sm-11">
                            <a id="summary-btn" class="btn btn-success btn-lg" onclick="proceedPayment();">Proceed to Payment</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
         
    </div>  
</div>

<input type="hidden" id="totalAmount" value="<?php echo $packageObject->amount + Yii::app()->session['amount']; ?>">
<input type="hidden" id="payAmount" value="<?php echo $packageObject->amount + Yii::app()->session['amount']; ?>">
<input type="hidden" id="coupon_discount_price" value=""> 
<input type="hidden" id="wallet" value="<?php echo (!empty($walletObject)) ? "1" : "0"; ?>">
<input type="hidden" id="packageused" value="">
<input type="hidden" id="totalusedrp" value="">
<input type="hidden" id="packageId" value="<?php echo Yii::app()->session['package_id']; ?>">
<input type="hidden" id="transID" value="<?php if(!empty($_GET)) { echo $_GET['tId'];} ?>" name="tId">
<?php }else{?>
     <div class="container">
    <div class="row"> 
   <?php echo "<p class='error'>Sorry! your cart is empty</p>"; ?>
       </div>  
</div>     
<?php }?>
<script type="text/javascript">

    function Couponapply() {
        var coupon_code = $('#coupon_code').val();
        if (coupon_code == '')
        {
            document.getElementById("coupon_error").style.display = "block";
            document.getElementById("coupon_error").innerHTML = "Please enter coupon code.";
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
        var transID = $("#transID").val();
        
        var dataString = 'datasave=yes&totalAmount=' + totalAmount + '&couponDiscount=' + coupon_discount+'&transactionId='+transID;
        
        $.ajax({
            type: "POST",
            url: "orderadd",
            data: dataString,
            cache: false,
            success: function (html) {
                var htmlArr = html.split('-');

                if (htmlArr[0] == 1)
                {
                    $("#transID").val(htmlArr[1]);
                    location.href = "/package/payment?tId="+htmlArr[1]+'&pp='+totalAmount;
                    
                }
            }
        });
    }

    function OpenDiv(iconID)
    {
        if (iconID == 'editIcon')
        {
            $('#cartDiv').fadeIn();
            $('#paymentOption').fadeOut();
            $('#walletOption').fadeOut();
        }
        if (iconID == 'editIcon1')
        {
            $('#cartDiv').fadeOut();
            $('#paymentOption').fadeOut();
            $('#walletOption').fadeIn();
        }

    }
    
</script>    
