<?php
/* @var $this UserController */
/* @var $model User */
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
		<?php echo $form->label($model,'fName'); ?>
		<?php echo $form->textField($model,'fName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lName'); ?>
		<?php echo $form->textField($model,'lName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dorm_id'); ?>
		<?php echo $form->textField($model,'dorm_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phoneNum'); ?>
		<?php echo $form->textField($model,'phoneNum'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'userType_id'); ?>
		<?php echo $form->textField($model,'userType_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->