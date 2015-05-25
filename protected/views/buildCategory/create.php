<?php
/* @var $this BuildCategoryController */
/* @var $model BuildCategory */

$this->breadcrumbs=array(
	'Build Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BuildCategory', 'url'=>array('index')),
	array('label'=>'Manage BuildCategory', 'url'=>array('admin')),
);
?>

<h1>Create BuildCategory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>