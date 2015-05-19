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
<span class="WebRupee"></span> <span id=""><?php if($orderObject->domain_price!=''){ ?> $<?php echo number_format($orderObject->domain_price,2);?><?php }else{?> N/A<?php }?></span>
</p>
</div>
 </td>
</tr>


</tbody></table>
</form>
<div class="cartfooter">
<table class="cartTotalWrp rfloat tbl-2" cellpadding="0" cellspacing="0" border="0">
<tbody>
<tr class="ItemConvertedSubtotal">
<td class="itemText">
<p>Subtotal:</p>
</td>
<td class="itemAmount">
<p id="CartTotal"><span class="WebRupee">$</span> <span id="total"><?php echo number_format($orderObject->package->amount + $orderObject->domain_price,2);?></span></p>
</td>
</tr>
 
<tr class="ItemConvertedSubtotal" id="coupon_discount" style= display:<?php (!empty($orderObject->transaction->coupon_discount)) ? "none" :"block";?>">
<td class="itemText">
<p>Coupon Discount:</p>
</td>
<td class="itemAmount">
<p id="CartTotal"><span class="WebRupee">$</span> <span id="total-discount"><?php echo number_format($orderObject->transaction->coupon_discount,2);?></span></p>
</td>
</tr> 
<tr class="ItemTotalAfterDiscount">
   
<td class="itemText">
<p>Total Amount:</p>
</td>
<td class="itemAmount">
<p id="TotalAmount"><span class="WebRupee">$</span> <span id="totalpayable"><?php echo number_format($orderObject->package->amount + $orderObject->domain_price - $orderObject->transaction->coupon_discount,2);?></span></p>
</td>
</tr>
</tbody></table>
</div>
 
</div>
 
</div>
</div>
</div>
</div>
 
 
   
     