<?php
/* @var $this OrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Orders List',
);

$this->menu=array(
	array('label'=>'Create Order', 'url'=>array('create')),
	array('label'=>'Manage Order', 'url'=>array('admin')),
);
 
?>
    <?php //echo "<pre>"; print_r($orderObject);?>
       <div class="main">
      <div class="container">

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
             <?php if(!empty($_GET['m'])){ ?><div class="success" id="error_msg">Thank You. Your site has been publish.</div><?php } ?>
         <!-- BEGIN SIDEBAR -->
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-10 col-sm-9">
       
        <?php 
          
        $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'city-grid',
	'dataProvider'=>$dataProvider,
	'enableSorting'=>'true',
	'ajaxUpdate'=>true,
	'summaryText'=>'Showing {start} to {end} of {count} entries',
	'template'=>'{items} {summary} {pager}',
	'itemsCssClass'=>'table table-striped table-bordered table-hover table-full-width',
	'pager'=>array(
		'header'=>false,
		'firstPageLabel' => "<<",
		'prevPageLabel' => "<",
		'nextPageLabel' => ">",
		'lastPageLabel' => ">>",
	),	
	'columns'=>array(
		//'idJob',
            
                array(
                    'name'=>'id',
                    'header'=>'<span style="white-space: nowrap;">Sl. No &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'$row+1',
		),
		array(
                    'name'=>'package_id',
                    'header'=>'<span style="white-space: nowrap;">Package &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'isset($data->package->name)?$data->package->name:""',
		),
                array(
                    'name'=>'domain',
                    'header'=>'<span style="white-space: nowrap;">Domain &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'$data->domain',
		),
               array(
                    'name'=>'domain_price',
                    'header'=>'<span style="white-space: nowrap;">Pre Dom Price &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'($data->domain_price) ? number_format($data->domain_price,2) : "N/A"',
		),
               array(
                    'name'=>'id',
                    'header'=>'<span style="white-space: nowrap;">Discount &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'($data->transaction->coupon_discount) ? number_format($data->transaction->coupon_discount,2) : "N/A"',
		),
                array(
                    'name'=>'start_date',
                    'header'=>'<span style="white-space: nowrap;">Start Date &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'$data->start_date',
		),
                array(
                    'name'=>'end_date',
                    'header'=>'<span style="white-space: nowrap;">End Date &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'$data->end_date',
		),
		array(
			'name'=>'status',
                        'header'=>'<span style="white-space: nowrap;">Payment Status &nbsp; &nbsp; &nbsp;</span>',
			'value'=>'($data->status == 1) ? Yii::t(\'translation\', \'Completed\') : Yii::t(\'translation\', \'Pending\')',
		),
              array(
			'name'=>'action',
                        'header'=>'<span style="white-space: nowrap;">Action &nbsp; &nbsp; &nbsp;</span>',
			'value'=>array($this,'GetButtonTitle'),
		),
		 
		  array(
			'name'=>'action',
                        'header'=>'<span style="white-space: nowrap;"> &nbsp; &nbsp; &nbsp;</span>',
			'value'=>array($this,'GetInvoiceButtonTitle'),
		),
            
                
            
            
	),
)); ?>
                    

      </div>
    </div>
        <a  href="" class="" data-toggle="modal" data-target="#orderModal">
  complete order
</a>

<!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:auto; max-width: 900px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
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

                                        Advance

                                        
                                    </td>
                                    <td class="pDescriptionSum">
                                        Domain
550 Bandwidth
6 Static pages
1 contact form
2 gallery                                    </td>
                                    <td class="pDurationSum">


                                        <b>1 Year</b>


                                        
                                    </td>
                                    <td class="pPriceSum CartSubTotal tbl-pd">

                                        <span class="WebRupee">$</span> <span id="">350.00 </span>

                                    </td>
                                </tr>

                                <tr name="product_items[]" id="" class="productBlock CartItemRow domain">
                                    <td class="pNameSum">

                                        Domain

                                    </td>
                                    <td class="pDescription">
                                        nidhi.com                                    </td>
                                    <td class="pDurationSum">


                                        <b>1 Year</b>



                                    </td>
                                    <td class="pPriceSum CartSubTotal tbl-pd">

                                        <span class="WebRupee"></span> <span id=""> N/A</span>

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
