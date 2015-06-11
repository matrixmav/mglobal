<?php
/* @var $this OrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Referral Income',
);


$this->menu = array(
    array('label' => 'Create Order', 'url' => array('create')),
    array('label' => 'Manage Order', 'url' => array('admin')),
);
?>

<style>
    .confirmBtn{left: 333px;
    position: absolute;
    top: 0;}
    
    .confirmOk{left: 610px;
    position: absolute;
    top: 8px;}
    .confirmMenu{position: relative;}
</style>
<div class="col-md-12">
    
        <div class="expiration margin-topDefault confirmMenu">
                    
    <form id="regervation_filter_frm" name="regervation_filter_frm" method="post" action="/order/refferalincome">
    <div class="input-group input-large date-picker input-daterange">
        <input type="text" name="from" placeholder="To Date" class="datepicker form-control">
        <span class="input-group-addon">
        to </span>
        <input type="text" name="to" data-provide="datepicker" placeholder="From Date" class="datepicker form-control">
    </div>
    <?php 
    /*$statusId =   1;
    if(isset($_REQUEST['res_filter'])){
      $statusId =   $_REQUEST['res_filter'];
    } ?>
    
    <select class="customeSelect howDidYou form-control input-medium select2me confirmBtn" id="ui-id-5" name="res_filter">
                <option value="1" <?php if($statusId == 1){ echo "selected"; } ?> >Active</option>
                <option value="0" <?php if($statusId == 3){ echo "selected"; } ?> >In Active</option>
            </select>
    </div>*/?>
        <input type="submit" class="btn btn-primary confirmOk" value="OK" name="submit" id="submit" style="left:340px!important;top:0px!important;"/>
    </form>

</div>
<div class="row">
    <div class="col-md-12">
        <br/>  
          <span class="btn  green margin-right-20">Total Refferal Bonus  - $<?php echo (!empty($totalAmount)) ? $totalAmount : "0";?> </span>
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
                    'name'=>'id',
                    'header'=>'<span style="white-space: nowrap;">Name &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'isset($data["full_name"])? ucwords($data["full_name"]):""',
		),
                
              
              array(
                    'name'=>'id',
                    'header'=>'<span style="white-space: nowrap;">Paid Amount &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'isset($data["paid_amount"])? number_format($data["paid_amount"],2):""',
		),
               
                array(
                    'name'=>'id',
                    'header'=>'<span style="white-space: nowrap;">Coupon Discount Amount &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'isset($data["coupon_discount"])? number_format($data["coupon_discount"],2):"N/A"',
		),
               
               array(
                    'name'=>'id',
                    'header'=>'<span style="white-space: nowrap;">Earn Amount&nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'isset($data["paid_amount"])? number_format($data["paid_amount"]*5/100,2):"N/A"',
		),
               array(
                    'name'=>'id',
                    'header'=>'<span style="white-space: nowrap;">Position &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'isset($data["position"])? $data["position"]:""',
		),
            
               array(
                    'name'=>'id',
                    'header'=>'<span style="white-space: nowrap;">Created At &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'isset($data["created_at"])? $data["created_at"]:""',
		),
            
            
             
		 
	),
)); ?>
                    
</div>
</div>
<script>
    $(function () {
                $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd'
                });
            });
    </script>
