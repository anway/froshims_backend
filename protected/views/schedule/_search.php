<?php
/* @var $this ScheduleController */
/* @var $model Schedule */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'s_id'); ?>
		<?php echo $form->textField($model,'s_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_id'); ?>
		<?php echo $form->textField($model,'l_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'t1_id'); ?>
		<?php echo $form->textField($model,'t1_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'t2_id'); ?>
		<?php echo $form->textField($model,'t2_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'scoreReported'); ?>
		<?php echo $form->textField($model,'scoreReported'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'emailSent'); ?>
		<?php echo $form->textField($model,'emailSent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reminderSent'); ?>
		<?php echo $form->textField($model,'reminderSent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->