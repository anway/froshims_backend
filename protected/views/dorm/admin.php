<?php
/* @var $this DormController */
/* @var $model Dorm */

$this->breadcrumbs=array(
	'Dorms'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Dorm', 'url'=>array('index')),
	array('label'=>'Create Dorm', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dorm-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Dorms</h1>


<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dorm-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'name',
		'teamName',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
