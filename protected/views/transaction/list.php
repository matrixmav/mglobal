<?php
/* @var $this OrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
'Transactions List',
);

$this->menu=array(
	array('label'=>'Create Money Transfer', 'url'=>array('create')),
	array('label'=>'Manage Money Transfer', 'url'=>array('admin')),
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
                    'header'=>'<span style="white-space: nowrap;">Receiver &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'$data->user->full_name',
		),
            array(
                    'name'=>'id',
                    'header'=>'<span style="white-space: nowrap;">Actual Amount &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'$data->actual_amount',
		),
                array(
                    'name'=>'id',
                    'header'=>'<span style="white-space: nowrap;">Paid Amount &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'$data->paid_amount',
		),
         
             array(
                    'name'=>'id',
                    'header'=>'<span style="white-space: nowrap;">Status &nbsp; &nbsp; &nbsp;</span>',
                    'value'=>'$data->status',
		),
		 
	),
)); ?>
                    

      </div>
    </div>
