<!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   
    <div class="modal-dialog" role="document" style="width:auto; max-width: 900px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> Your Cart</h4>
      </div>
      <div class="modal-body clearfix">
       <div class="col-lg-12 col-sm-12 col-xs-12">    
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
                                        <?php echo number_format($orderObject->domain);?>
                                    </td>
                                    <td class="pDurationSum">


                                        <b>1 Year</b>



                                    </td>
                                    <td class="pPriceSum CartSubTotal tbl-pd">

                                        <span class="WebRupee"></span> <span id=""><?php echo (!empty($orderObject->domain_price)) ? number_format($orderObject->domain_price) : "N/A";?></span>

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
                                                <p>Subtotal:</p>
                                            </td>
                                            <td class="itemAmount">
                                                <p id="CartTotal"><span class="WebRupee">$</span> <span id="total">350.00</span></p>
                                            </td>
                                        </tr>

                                        <tr style="display:none;" id="coupon_discount" class="ItemConvertedSubtotal">
                                            <td class="itemText">
                                                <p>Coupon Discount:</p>
                                            </td>
                                            <td class="itemAmount">
                                                <p id="CartTotal"><span class="WebRupee">$</span> <span id="total-discount">350.00</span></p>
                                            </td>
                                        </tr> 
                                        <tr class="ItemTotalAfterDiscount">

                                            <td class="itemText">
                                                <p>Total Amount:</p>
                                            </td>
                                            <td class="itemAmount">
                                                <p id="TotalAmount"><span class="WebRupee">$</span> <span id="totalpayable">350.00</span></p>
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
      </div>
    <!--  <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
