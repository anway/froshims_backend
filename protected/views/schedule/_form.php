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
		<?php echo $form->dropDownList($model,'s_id', $model->s->getSportOptions()); ?>
		<?php echo $form->error($model,'s_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
		<?php echo $form->error($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_id'); ?>
		<?php echo $form->dropDownList($model,'l_id', $model->l->getLocationOptions()); ?>
		<?php echo $form->error($model,'l_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'t1_id'); ?>
		<?php echo $form->dropDownList($model,'t1_id', $model->t1->getDormOptions()); ?>
		<?php echo $form->error($model,'t1_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'t2_id'); ?>
		<?php echo $form->dropDownList($model,'t2_id', $model->t2->getDormOptions()); ?>
		<?php echo $form->error($model,'t2_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'scoreReported'); ?>
		<?php echo $form->textField($model,'scoreReported'); ?>
		<?php echo $form->error($model,'scoreReported'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emailSent'); ?>
		<?php echo $form->textField($model,'emailSent'); ?>
		<?php echo $form->error($model,'emailSent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reminderSent'); ?>
		<?php echo $form->textField($model,'reminderSent'); ?>
		<?php echo $form->error($model,'reminderSent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->