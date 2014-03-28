<?php
/* @var $this ArchivoController */
/* @var $model Archivo */

$this->setPageTitle('docVox - Crear Informes');

$this->breadcrumbs=array(
	'Archivos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Informes', 'url'=>array('index')),
	array('label'=>'Transcribir Informes', 'url'=>array('admin')),
);
?>

<h1>Subir Archivo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>