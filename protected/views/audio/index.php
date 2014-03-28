<?php
/* @var $this AudioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Audios',
);

$this->menu=array(
	array('label'=>'Crear Audio', 'url'=>array('create')),
	array('label'=>'Administrar Audios', 'url'=>array('admin')),
);
?>

<h1>Audios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
