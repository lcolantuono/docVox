<?php
/* @var $this MedicoController */
/* @var $data Medico */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idmedico')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idmedico), array('view', 'id'=>$data->idmedico)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aux')); ?>:</b>
	<?php echo CHtml::encode($data->aux); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod')); ?>:</b>
	<?php echo CHtml::encode($data->cod); ?>
	<br />


</div>