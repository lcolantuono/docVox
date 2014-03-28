<?php
/* @var $this MedicoController */
/* @var $model Medico */

$this->breadcrumbs=array(
	'Medicos'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'List Medico', 'url'=>array('index')),
	array('label'=>'Create Medico', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#medico-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar M&eacute;dicos</h1>

<?php echo CHtml::link('B&uacute;squeda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'medico-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idmedico',
		'nombre',
		'aux',
		'cod',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
