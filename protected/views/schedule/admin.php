<?php
/* @var $this ScheduleController */
/* @var $model Schedule */

$this->breadcrumbs=array(
	'Schedules'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Schedule', 'url'=>array('index')),
	array('label'=>'Create Schedule', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#schedule-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Schedules</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php /*echo CHtml::link('Advanced Search','#',array('class'=>'search-button'));*/ ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'schedule-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		/*'id',*/
		array('name'=>'s_id', 'header'=>'Sport', 'value'=>'$data->s->name'),
		'date',
		'time',
		array('name'=>'l_id', 'header'=>'Location', 'value'=>'$data->l->name'),
		array('name'=>'t1_id', 'header'=>'Team 1', 'value'=>'$data->t1->name'),
		array('name'=>'t2_id', 'header'=>'Team 2', 'value'=>'$data->t2->name'),
        /*
		'scoreReported',
		'emailSent',
		'reminderSent',
		'type',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
