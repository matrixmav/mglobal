<?php
/* @var $this MailController */
/* @var $model Mail */

$this->breadcrumbs=array(
	'Mails'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Mail', 'url'=>array('index')),
	array('label'=>'Create Mail', 'url'=>array('create')),
	array('label'=>'Update Mail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Mail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mail', 'url'=>array('admin')),
);
?>

<h1>View Mail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'to_user_id',
		'from_user_id',
		'message',
		'type',
		'status',
		'created_at',
		'updated_at',
	),
)); ?>
