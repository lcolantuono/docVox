<?php
/* @var $this RolController */
/* @var $model Rol */

$this->setPageTitle('docVox - Crear Rol');

$this->breadcrumbs=array(
	'Roles'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Roles', 'url'=>array('index')),
	array('label'=>'Administrar Roles', 'url'=>array('admin')),
);
?>

<h1>Crear Rol</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>