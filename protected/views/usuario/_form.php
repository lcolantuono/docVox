<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Usuario'); ?>
		<?php echo $form->textField($model,'Usuario',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Clave'); ?>
		<?php echo $form->textField($model,'Clave',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'Clave'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idRol'); ?>
		<?php echo $form->dropDownList($model,'idRol', CHtml::listData(Rol::model()->findAll(),'idrol','rol'), array('empty'=>'Seleccionar..')); ?>
		<?php echo $form->error($model,'idRol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NombreApellido'); ?>
		<?php echo $form->textField($model,'NombreApellido',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'NombreApellido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->