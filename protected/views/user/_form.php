<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fName'); ?>
		<?php echo $form->textField($model,'fName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'fName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lName'); ?>
		<?php echo $form->textField($model,'lName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'lName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dorm_id'); ?>
		<?php echo $form->dropDownList($model,'dorm_id', $dorm->getOptions()); ?>
		<?php echo $form->error($model,'dorm_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phoneNum'); ?>
		<?php echo $form->textField($model,'phoneNum'); ?>
		<?php echo $form->error($model,'phoneNum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userType_id'); ?>
		<?php
            $options = $userType->getOptions();
            echo $form->radioButtonList($model, 'userType_id', $options,
                                        array('labelOptions'=>array('style'=>'display:inline')));
            ?>
		<?php echo $form->error($model,'userType_id'); ?>
	</div>


    <div class="row">
        <?php echo "Sports: Fill out if applicable (eg captain, player)</br>"; ?>
        <?php
            $options = $sport->getOptions();
            echo CHtml::checkBoxList('Sports', '', $options,
                                     array('labelOptions'=>array('style'=>
                                        'display:inline')));
            ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->