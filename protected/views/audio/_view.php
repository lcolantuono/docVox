<?php
/* @var $this AudioController */
/* @var $data Audio */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idaudio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idaudio), array('view', 'id'=>$data->idaudio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('audio')); ?>:</b>
	<?php echo CHtml::encode($data->audio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idservicios')); ?>:</b>
	<?php echo CHtml::encode($data->idservicios); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idmedico')); ?>:</b>
	<?php echo CHtml::encode($data->idmedico); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('aux')); ?>:</b>
	<?php echo CHtml::encode($data->aux); ?>
	<br />

</div>