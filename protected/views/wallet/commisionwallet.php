<?php
/* @var $this OrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Commission Wallet',
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
       
        <?php $this->widget('zii.widgets.grid.CGridView', array(
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
                    'header'=>'<span style="white-space: nowrap;">Transfer To &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'isset($data->touser->name)? ucwords($data->touser->name):""',
		),
            array(
                    'name'=>'id',
                    'header'=>'<span style="white-space: nowrap;">Transfer From &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'isset($data->fromuser->name)? ucwords($data->fromuser->name):""',
		),
               array(
                    'name'=>'transaction_id',
                    'header'=>'<span style="white-space: nowrap;">Credit Amount &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'isset($data->wallet->fund)? $data->wallet->fund:""',
		),
            array(
                    'name'=>'created_at',
                    'header'=>'<span style="white-space: nowrap;">Transfer Date &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'$data->created_at',
		),
            array(
                    'name'=>'status',
                    'header'=>'<span style="white-space: nowrap;">Transfer Status &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'($data->status == 1) ? "Transfered" : "Pending"',
		),
            array(
                    'name'=>'id',
                    'header'=>'<span style="white-space: nowrap;">Used Commision Funds &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'($data->fund != 0) ? $data->fund : "N/A"',
		),
            
             array(
                    'name'=>'comment',
                    'header'=>'<span style="white-space: nowrap;">Comment &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'$data->comment',
		),
		 
	),
)); ?>
                    

      </div>
    </div>
