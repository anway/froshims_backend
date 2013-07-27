<?php
/* @var $this ScheduleController */
/* @var $model Schedule */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'schedule-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'s_id'); ?>
<?php echo $form->dropDownList($model,'s_id', $sport->getOptions()); ?>
		<?php echo $form->error($model,'s_id'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'t1_id'); ?>
    <?php echo $form->dropDownList($model,'t1_id', $dorm->getOptions()); ?>
        <?php echo $form->error($model,'t1_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'t2_id'); ?>
<?php echo $form->dropDownList($model,'t2_id', $dorm->getOptions()); ?>
        <?php echo $form->error($model,'t2_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'date'); ?>
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget(
                          'CJuiDateTimePicker',
                          array(
                                'model' => $model,
                                'attribute' => 'date',
                                'language' => '',
                                'mode' => 'date',
                                'options' => array(
                                        'dateFormat' => 'yy/mm/dd'
                                    )
                                )
                          );
        ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model,'time'); ?>
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget(
                  'CJuiDateTimePicker',
                  array(
                        'model' => $model,
                        'attribute' => 'time',
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
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_id'); ?>
        <?php echo $form->dropDownList($model,'l_id', $location->getOptions()); ?>
		<?php echo $form->error($model,'l_id'); ?>
	</div>

    <?php echo $form->hiddenField($model, 'scoreReported', array('value'=> 0)); ?>
    <?php echo $form->hiddenField($model, 'emailSent', array('value'=> 0)); ?>
    <?php echo $form->hiddenField($model, 'reminderSent', array('value'=> 0)); ?>

    <div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php
            $options = array(0 => 'Normal', 1 => 'Tournament');
            echo $form->radioButtonList($model,'type', $options,
                                        array('labelOptions'=>array('style'=>'display:inline'))
                                        ); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->