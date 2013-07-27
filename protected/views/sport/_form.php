<?php
/* @var $this SportController */
/* @var $model Sport */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sport-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gameType'); ?>
        <?php
            $options = array(0 => 'Team: Regular Season', 1 => 'Team: Tournament', 3 => 'Individual');
            echo $form->radioButtonList($model,'gameType', $options,
                                array('labelOptions'=>array('style'=>'display:inline'))
                                ); ?>
		<?php echo $form->error($model,'gameType'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->