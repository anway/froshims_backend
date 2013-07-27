<?php
/* @var $this ScheduleController */
/* @var $model Schedule */

$this->breadcrumbs=array(
	'Schedules'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Schedule', 'url'=>array('index')),
	array('label'=>'Manage Schedule', 'url'=>array('admin')),
);
?>

<h1>Create Schedule</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
                                                    'id'=>'schedule-form',
                                                    'enableAjaxValidation'=>false,
                                                    )); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<table>
<tr><th>Sport</th><th>Team 1</th><th>Team 2</th><th>Date</th><th>Time</th><th>Location</th><th>Tournament</th></tr>

<?php foreach($models as $i=>$model): ?>
<tr>
<?php echo $form->errorSummary($model); ?>
</tr>
<tr>
<td>
    <?php echo $form->dropDownList($model,'['.$i.']s_id', $sport->getOptions(), array('empty'=>'Select sport')); ?>
    <?php echo $form->error($model,'['.$i.']s_id'); ?>
</td>
<td>
    <?php echo $form->dropDownList($model,'['.$i.']t1_id', $dorm->getOptions(), array('empty'=>'Select team')); ?>
    <?php echo $form->error($model,'['.$i.']t1_id'); ?>
</td>
<td>
    <?php echo $form->dropDownList($model,'['.$i.']t2_id', $dorm->getOptions(), array('empty'=>'Select team')); ?>
    <?php echo $form->error($model,'['.$i.']t2_id'); ?>
</td>
<td>
<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker'); 
    $this->widget(
                  'CJuiDateTimePicker',
                  array(
                        'model' => $model,
                        'attribute' => '['.$i.']date',
                        'language' => '',
                        'mode' => 'date',
                        'options' => array(
                                           'dateFormat' => 'yy/mm/dd'
                                           )
                        )
                  );
    ?>
</td>
<td>
<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker'); 
    $this->widget(
                  'CJuiDateTimePicker',
                  array(
                        'model' => $model,
                        'attribute' => '['.$i.']time',
                        'language' => '',
                        'mode' => 'time',
                        'options' => array(
                                           'stepMinute' => 5,
                                           'timeFormat' => 'hh:mm:ss',
                                           'pickerTimeFormat' => 'h:mm tt'
                                           )
                        )
                  );
    ?>
</td>
<td>
    <?php echo $form->dropDownList($model,'['.$i.']l_id', $location->getOptions(), array('empty'=>'Select location')); ?>
    <?php echo $form->error($model,'['.$i.']l_id'); ?>
</td>
<?php echo $form->hiddenField($model, '['.$i.']scoreReported', array('value'=> 0)); ?>
<?php echo $form->hiddenField($model, '['.$i.']emailSent', array('value'=> 0));  ?>
<?php echo $form->hiddenField($model, '['.$i.']reminderSent', array('value'=> 0)); ?>
<td>
<?php
    $options = array(0 => 'Normal', 1 => 'Tourney');
    echo $form->radioButtonList($model,'['.$i.']type', $options,
                                array('labelOptions'=>array('style'=>'display:inline'))
                                ); ?>
    <?php echo $form->error($model,'['.$i.']type'); ?>
</td>
</tr>
<?php endforeach; ?>
</table>

<div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php /*echo $this->renderPartial('_form', array('model'=>$model, 'location'=>$location, 'dorm'=>$dorm, 'sport'=>$sport));*/ ?>