<?php
/* @var $this ServiciosController */
/* @var $model Servicios */

$this->setPageTitle('docVox - Ver Servicio');

$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	$model->idservicios,
);

$this->menu=array(
	array('label'=>'Listar Servicios', 'url'=>array('index')),
	array('label'=>'Crear Servicio', 'url'=>array('create')),
	array('label'=>'Actualizar Servicio', 'url'=>array('update', 'id'=>$model->idservicios)),
	array('label'=>'Borrar Servicio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idservicios),'confirm'=>'Seguro que desea eliminar este servicio?')),
	array('label'=>'Administrar Servicios', 'url'=>array('admin')),
);
?>

<h1>Ver Servicio #<?php echo $model->idservicios; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idservicios',
		'nombre',
		'aux',
		'cod',
	),
)); ?>
