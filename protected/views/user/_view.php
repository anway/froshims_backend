<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fName')); ?>:</b>
	<?php echo CHtml::encode($data->fName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lName')); ?>:</b>
	<?php echo CHtml::encode($data->lName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dorm_id')); ?>:</b>
	<?php echo CHtml::encode($data->dorm_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phoneNum')); ?>:</b>
	<?php echo CHtml::encode($data->phoneNum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userType_id')); ?>:</b>
	<?php echo CHtml::encode($data->userType_id); ?>
	<br />


</div>