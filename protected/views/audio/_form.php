<?php
/* @var $this AudioController */
/* @var $model Audio */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'audio-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'audio'); ?>
		<?php echo $form->textField($model,'audio',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'audio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<?php $fecha = date('Y-m-d H:m:s'); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha', array('value'=>$fecha, 'readonly'=>'true')); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Servicio'); ?>
		<?php echo $form->dropDownList($model,'idservicios', CHtml::listData(Servicios::model()->findAll(),'idservicios','nombre'), array('empty'=>'Seleccionar..'));?>
		<?php echo $form->error($model,'idservicios'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'M&eacute;dico'); ?>
		<?php echo $form->dropDownList($model,'idmedico', CHtml::listData(Medico::model()->findAll(),'idmedico','nombre'), array('empty'=>'Seleccionar..'));?>
		<?php echo $form->error($model,'idmedico'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'aux'); ?>
		<?php echo $form->textField($model,'aux',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'aux'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Subir' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->