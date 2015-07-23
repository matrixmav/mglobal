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
      <!--<div class="container">-->

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
             <?php if(!empty($_GET['m'])){ ?><div class="success" id="error_msg">Thank You. Your site has been publish.</div><?php } ?>
         <!-- BEGIN SIDEBAR -->
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
       
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
			'value'=>array($this,'GetStatus'),
		),
              array(
			'name'=>'action',
                        'header'=>'<span style="white-space: nowrap;">Action &nbsp; &nbsp; &nbsp;</span>',
			'value'=>array($this,'GetButtonTitle'),
		),
		 
		  array(
			'name'=>'invoice',
                        'header' => '<span style="white-space: nowrap;">Invoice &nbsp; &nbsp; &nbsp;</span>',
                        'value'=>array($this,'GetInvoiceButtonTitle'),
		),
            
               
            
                
            
            
	),
)); ?>
                   

      </div>
    </div>
       </div>
 
        <!-- Add jQuery library -->
	 

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="/js/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="/js/fancybox/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="/js/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
           <script type="text/javascript" src="/js/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	 <script type="text/javascript">
              function showPendingPayment(valz)
                {
                 $.fancybox({
                    width: 1190, 
                    autoSize: true,
                    href: "/order/pendingpayment?id="+valz,
                    type: 'ajax'
                });
            }
        </script>