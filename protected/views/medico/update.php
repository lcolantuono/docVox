<?php
/* @var $this MedicoController */
/* @var $model Medico */

$this->setPageTitle('docVox - Actualizar Medico');

$this->breadcrumbs=array(
	'Medicos'=>array('index'),
	$model->idmedico=>array('view','id'=>$model->idmedico),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Medicos', 'url'=>array('index')),
	array('label'=>'Crear Medico', 'url'=>array('create')),
	array('label'=>'Ver Medico', 'url'=>array('view', 'id'=>$model->idmedico)),
	array('label'=>'Administrar Medicos', 'url'=>array('admin')),
);
?>

<h1>Actualizar M&eacute;dico <?php echo $model->idmedico; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>