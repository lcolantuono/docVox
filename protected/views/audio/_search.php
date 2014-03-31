<?php
/* @var $this AudioController */
/* @var $model Audio */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idaudio'); ?>
		<?php echo $form->textField($model,'idaudio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'audio'); ?>
		<?php echo $form->textField($model,'audio',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idservicios'); ?>
		<?php echo $form->textField($model,'idservicios'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'ubicacion'); ?>
		<?php echo $form->textField($model,'ubicacion',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idmedico'); ?>
		<?php echo $form->textField($model,'idmedico'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'aux'); ?>
		<?php echo $form->textField($model,'aux',array('size'=>60,'maxlength'=>200)); ?>
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->