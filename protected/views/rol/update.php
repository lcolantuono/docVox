<?php
/* @var $this RolController */
/* @var $model Rol */

$this->setPageTitle('docVox - Actulizar Rol');

$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->idrol=>array('view','id'=>$model->idrol),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Roles', 'url'=>array('index')),
	array('label'=>'Crear Rol', 'url'=>array('create')),
	array('label'=>'Ver Rol', 'url'=>array('view', 'id'=>$model->idrol)),
	array('label'=>'Administrar Roles', 'url'=>array('admin')),
);
?>

<h1>Actualizar Rol <?php echo $model->idrol; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>