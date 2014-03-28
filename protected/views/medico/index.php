<?php
/* @var $this MedicoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Medicos',
);

$this->menu=array(
	array('label'=>'Crear Medico', 'url'=>array('create')),
	array('label'=>'Administrar Medicos', 'url'=>array('admin')),
);
?>

<h1>M&eacute;dicos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
