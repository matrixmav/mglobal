<?php
/* @var $this OrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Summary' => array('summary/checkinvestment'),
    'Check Investment',
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
                    'name'=>'full_name',
                    'header'=>'<span style="white-space: nowrap;">Name &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'isset($data->full_name)? ucwords($data->full_name):""',
		),
            array(
                    'name'=>'id',
                    'header'=>'<span style="white-space: nowrap;">Purchased Package &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'isset($data->package->name)? ucwords($data->package->name):""',
		),
                array(
                    'name'=>'transaction_id',
                    'header'=>'<span style="white-space: nowrap;">Paid Amount &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'isset($data->package->amount)? number_format($data->package->amount,2):""',
		),
            array(
                    'name'=>'created_at',
                    'header'=>'<span style="white-space: nowrap;">Order Date &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'$data->orderSummary->created_at',
		),
            array(
                    'name'=>'status',
                    'header'=>'<span style="white-space: nowrap;">Transfer Status &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'($data->orderSummary->status == 1) ? "Completed" : "Pending"',
		),
            
             
		 
	),
)); ?>
                    

      </div>
    </div>
