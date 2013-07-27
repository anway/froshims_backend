<?php
/* @var $this DormController */
/* @var $model Dorm */

$this->breadcrumbs=array(
	'Dorms'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dorm', 'url'=>array('index')),
	array('label'=>'Create Dorm', 'url'=>array('create')),
	array('label'=>'View Dorm', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Dorm', 'url'=>array('admin')),
);
?>

<h1>Update Dorm <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>