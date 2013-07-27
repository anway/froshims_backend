<?php
/* @var $this DormController */
/* @var $model Dorm */

$this->breadcrumbs=array(
	'Dorms'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Dorm', 'url'=>array('index')),
	array('label'=>'Create Dorm', 'url'=>array('create')),
	array('label'=>'Update Dorm', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Dorm', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dorm', 'url'=>array('admin')),
);
?>

<h1>View Dorm #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'teamName',
	),
)); ?>
