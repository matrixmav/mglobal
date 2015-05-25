<?php
/* @var $this BuildCategoryController */
/* @var $model BuildCategory */

$this->breadcrumbs=array(
	'Build Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List BuildCategory', 'url'=>array('index')),
	array('label'=>'Create BuildCategory', 'url'=>array('create')),
	array('label'=>'Update BuildCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BuildCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BuildCategory', 'url'=>array('admin')),
);
?>

<h1>View BuildCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'status',
		'created_at',
		'updated_at',
	),
)); ?>
