<?php
/* @var $this ScheduleController */
/* @var $model Schedule */

$this->breadcrumbs=array(
	'Schedules'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Schedule', 'url'=>array('index')),
	array('label'=>'Create Schedule', 'url'=>array('create')),
	array('label'=>'Update Schedule', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Schedule', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Schedule', 'url'=>array('admin')),
);
?>

<h1>View Schedule #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		/*'id',*/
        array('label'=>'Sport', 'value'=>$model->s->name),
		'date',
		'time',
		array('label'=>'Location', 'value'=>$model->l->name),
		array('label'=>'Team1', 'value'=>$model->t1->name),
		array('label'=>'Team2', 'value'=>$model->t2->name),
        /*
		'scoreReported',
		'emailSent',
		'reminderSent',
		'type',
        */
	),
)); ?>
