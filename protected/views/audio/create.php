<?php
/* @var $this AudioController */
/* @var $model Audio */

$this->setPageTitle('docVox - Crear Audio');

$this->breadcrumbs=array(
	'Audios'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Audios', 'url'=>array('index')),
	array('label'=>'Administrar Audios', 'url'=>array('admin')),
);
?>

<h1>Cargar Audio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>