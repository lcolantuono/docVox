<?php
/* @var $this AudioController */
/* @var $model Audio */

$this->setPageTitle('docVox - Actualizar Audio');

$this->breadcrumbs=array(
	'Audios'=>array('index'),
	$model->idaudio=>array('view','id'=>$model->idaudio),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Audios', 'url'=>array('index')),
	array('label'=>'Crear Audio', 'url'=>array('create')),
	array('label'=>'Ver Audio', 'url'=>array('view', 'id'=>$model->idaudio)),
	array('label'=>'Administrar Audios', 'url'=>array('admin')),
);
?>

<h1>Actualizar Audio <?php echo $model->idaudio; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>