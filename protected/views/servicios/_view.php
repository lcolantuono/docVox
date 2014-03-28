<?php
/* @var $this ServiciosController */
/* @var $data Servicios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idservicios')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idservicios), array('view', 'id'=>$data->idservicios)); ?>
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