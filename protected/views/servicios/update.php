<?php
/* @var $this ServiciosController */
/* @var $model Servicios */

$this->setPageTitle('docVox - Actualizar Servicio');

$this->breadcrumbs=array(
	'Servicioses'=>array('index'),
	$model->idservicios=>array('view','id'=>$model->idservicios),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Servicios', 'url'=>array('index')),
	array('label'=>'Crear Servicio', 'url'=>array('create')),
	array('label'=>'Ver Servicio', 'url'=>array('view', 'id'=>$model->idservicios)),
	array('label'=>'Administrar Servicios', 'url'=>array('admin')),
);
?>

<h1>Actualizar Servicio <?php echo $model->idservicios; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>