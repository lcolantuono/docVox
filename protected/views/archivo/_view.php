<?php
/* @var $this ArchivoController */
/* @var $data Archivo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('puerta')); ?>:</b>
	<?php echo CHtml::encode($data->puerta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orden')); ?>:</b>
	<?php echo CHtml::encode($data->orden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idAudio')); ?>:</b>
	<?php echo CHtml::encode($data->idAudio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transcripto')); ?>:</b>
	<?php echo CHtml::encode($data->transcripto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transcriptoPor')); ?>:</b>
	<?php echo CHtml::encode($data->transcriptoPor); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('texto')); ?>:</b>
	<?php echo CHtml::encode($data->texto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('tiempo')); ?>:</b>
	<?php echo CHtml::encode($data->tiempo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aux')); ?>:</b>
	<?php echo CHtml::encode($data->aux); ?>
	<br />

	*/ ?>

</div>