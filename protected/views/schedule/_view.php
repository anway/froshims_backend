<?php
/* @var $this ScheduleController */
/* @var $data Schedule */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('s_id')); ?>:</b>
	<?php echo CHtml::encode($data->s_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_id')); ?>:</b>
	<?php echo CHtml::encode($data->l_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('t1_id')); ?>:</b>
	<?php echo CHtml::encode($data->t1_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('t2_id')); ?>:</b>
	<?php echo CHtml::encode($data->t2_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('scoreReported')); ?>:</b>
	<?php echo CHtml::encode($data->scoreReported); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emailSent')); ?>:</b>
	<?php echo CHtml::encode($data->emailSent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reminderSent')); ?>:</b>
	<?php echo CHtml::encode($data->reminderSent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	*/ ?>

</div>