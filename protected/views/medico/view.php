<?php
/* @var $this MedicoController */
/* @var $model Medico */

$this->setPageTitle('docVox - Ver Medico');

$this->breadcrumbs=array(
	'Medicos'=>array('index'),
	$model->idmedico,
);

$this->menu=array(
	array('label'=>'Listar Medicos', 'url'=>array('index')),
	array('label'=>'Crear Medico', 'url'=>array('create')),
	array('label'=>'Actualizar Medico', 'url'=>array('update', 'id'=>$model->idmedico)),
	array('label'=>'Borrar Medico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idmedico),'confirm'=>'Seguro que desea eliminar este medico?')),
	array('label'=>'Administrar Medicos', 'url'=>array('admin')),
);
?>

<h1>Ver M&eacute;dico #<?php echo $model->idmedico; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idmedico',
		'nombre',
		'aux',
		'cod',
	),
)); ?>