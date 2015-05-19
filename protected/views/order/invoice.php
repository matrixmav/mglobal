<div class="container">
<div class="col-lg-12">    
<div id="maincontent" class="pageWrp checkout abtest">
<div class="sectionWrp summary open">
    <p class="title"><span class="txt">Invoice</span></p>
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
<?php echo $orderObject->package->name;?>
   
 
</div>
     
</td>
<td class="pDescription">
<p class="description itemblock topRow vCenter"><?php echo substr($orderObject->package->Description,0,100);?></p>
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
<span class="WebRupee">$</span> <span id=""><?php echo number_format($orderObject->package->amount,2);?> </span>
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
<p class="description itemblock topRow vCenter"><?php echo $orderObject->domain;?></p>
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
<span class="WebRupee"></span> <span id=""><?php if(Yii::app()->session['amount']!=''){ ?> $<?php echo number_format(Yii::app()->session['amount'],2);?><?php }else{?> N/A<?php }?></span>
</p>
</div>
 </td>
</tr>


</tbody></table>
</form>
<div class="cartfooter">
<form id="couponCodeContainer" class="couponWrp lfloat" method="post">
<input type="text" name="coupon_code" id="coupon_code" placeholder="Please Enter Coupon Code">
<input type="button" class="btn-flat-green ui-btn-grey" value="Apply" onclick="Couponapply();">

<span class="couponWarning" style="display: none;" id="coupon_success"></span>
<div class="couponError" style="display: none;" id="coupon_error"></div>
 

<div style="font-size: 12px; padding-top: 8px">*Discounts not applicable on .BIZ &amp; .ASIA domains</div>
<div class="offerBlurb" style="display: none;">
<div class="blurbTop"></div>
<div class="blurbBody"></div>
<div class="blurbBottom"></div>
</div>
</form>
<div class="socialBtnWrp lfloat">
<div class="fbConnect">
<span id="fbButton" class="fbbtn"></span>
<span id="followBigRock"></span> <span class="txt">Share on Facebook to get 10% off*</span>
</div>
</div>
<table class="cartTotalWrp rfloat tbl-2" cellpadding="0" cellspacing="0" border="0">
<tbody>
<tr class="ItemConvertedSubtotal">
<td class="itemText">
<p>Subtotal:</p>
</td>
<td class="itemAmount">
<p id="CartTotal"><span class="WebRupee">$</span> <span id="total"><?php echo number_format($packageObject->amount + Yii::app()->session['amount'],2);?></span></p>
</td>
</tr>
 
<tr class="ItemConvertedSubtotal" id="coupon_discount" style="display:none;">
<td class="itemText">
<p>Coupon Discount:</p>
</td>
<td class="itemAmount">
<p id="CartTotal"><span class="WebRupee">$</span> <span id="total-discount"><?php echo number_format($packageObject->amount + Yii::app()->session['amount'],2);?></span></p>
</td>
</tr> 
<tr class="ItemTotalAfterDiscount">
   
<td class="itemText">
<p>Total Amount:</p>
</td>
<td class="itemAmount">
<p id="TotalAmount"><span class="WebRupee">$</span> <span id="totalpayable"><?php echo number_format($packageObject->amount + Yii::app()->session['amount'],2);?></span></p>
</td>
</tr>
</tbody></table>
</div>
 
</div>
 
</div>
</div>
</div>
</div>
 
 
   
     