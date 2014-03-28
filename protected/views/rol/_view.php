<?php
/* @var $this RolController */
/* @var $data Rol */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idrol')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idrol), array('view', 'id'=>$data->idrol)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rol')); ?>:</b>
	<?php echo CHtml::encode($data->rol); ?>
	<br />


</div>