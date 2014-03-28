<?php
/* @var $this ServiciosController */
/* @var $model Servicios */

$this->setPageTitle('docVox - Crear Servicio');

$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Servicios', 'url'=>array('index')),
	array('label'=>'Administrar Servicios', 'url'=>array('admin')),
);
?>

<h1>Crear Servicios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>