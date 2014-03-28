<?php
/* @var $this MedicoController */
/* @var $model Medico */

$this->setPageTitle('docVox - Crear Medico');

$this->breadcrumbs=array(
	'Medicos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Medicos', 'url'=>array('index')),
	array('label'=>'Administrar Medicos', 'url'=>array('admin')),
);
?>

<h1>Crear M&eacute;dico</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>