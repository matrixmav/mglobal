<?php
/* @var $this OrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Referral Income',
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
         <!-- BEGIN SIDEBAR -->
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-10 col-sm-9">
            
          <span class="btn  green margin-right-20">Total Refferal Bonus  - $<?php echo $totalAmount;?> </span>
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
