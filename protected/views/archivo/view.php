<?php
/* @var $this ArchivoController */
/* @var $model Archivo */

$this->setPageTitle('docVox - Ver Informe');

$this->breadcrumbs=array(
	'Archivos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Informes', 'url'=>array('index')),
	array('label'=>'Subir Archivo', 'url'=>array('create')),
	array('label'=>'Transcibir Informe', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Archivo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Desea eliminar este archivo?')),
	array('label'=>'Transcribir Informes', 'url'=>array('admin')),
);
?>

<h1>Archivo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'puerta',
		'orden',
		'idAudio',
		'transcripto',
		'transcriptoPor',
		'texto',
		'fecha',
		'tiempo',
		'aux',
	),
)); ?>
