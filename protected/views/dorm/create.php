<?php
/* @var $this DormController */
/* @var $model Dorm */

$this->breadcrumbs=array(
	'Dorms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dorm', 'url'=>array('index')),
	array('label'=>'Manage Dorm', 'url'=>array('admin')),
);
?>

<h1>Create Dorm</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>