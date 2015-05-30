<?php
/* @var $this BuildCategoryController */
/* @var $model BuildCategory */

$this->breadcrumbs=array(
	'Build Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BuildCategory', 'url'=>array('index')),
	array('label'=>'Create BuildCategory', 'url'=>array('create')),
	array('label'=>'View BuildCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BuildCategory', 'url'=>array('admin')),
);
?>

<h1>Update BuildCategory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>