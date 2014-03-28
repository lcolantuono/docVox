<?php
/* @var $this RolController */
/* @var $model Rol */

$this->setPageTitle('docVox - Ver Rol');

$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->idrol,
);

$this->menu=array(
	array('label'=>'Listar Roles', 'url'=>array('index')),
	array('label'=>'Crear Rol', 'url'=>array('create')),
	array('label'=>'Actualizar Rol', 'url'=>array('update', 'id'=>$model->idrol)),
	array('label'=>'Borrar Rol', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idrol),'confirm'=>'Seguro que desea eliminar este rol?')),
	array('label'=>'Aministrar Roles', 'url'=>array('admin')),
);
?>

<h1>Ver Rol #<?php echo $model->idrol; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idrol',
		'rol',
	),
)); ?>
