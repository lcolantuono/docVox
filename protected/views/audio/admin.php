<?php
/* @var $this AudioController */
/* @var $model Audio */

$this->breadcrumbs=array(
	'Audios'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Audios', 'url'=>array('index')),
	array('label'=>'Crear Audio', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#audio-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Audios</h1>

<?php echo CHtml::link('B&uacute;squeda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'audio-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idaudio',
		'audio',
		'descripcion',
		'fecha',
		'idservicios',
		/*
		'idmedico',
		*/
		'ubicacion',
		'aux',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
