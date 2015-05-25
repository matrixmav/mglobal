<?php
/* @var $this BuildCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Build Categories',
);

$this->menu=array(
	array('label'=>'Create BuildCategory', 'url'=>array('create')),
	array('label'=>'Manage BuildCategory', 'url'=>array('admin')),
);
?>

<h1>Build Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
