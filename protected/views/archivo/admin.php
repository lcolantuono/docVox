<meta http-equiv="refresh" content="180"> <!-- REFRESCA LA PANTALLA CADA 180 SEGUNDOS -->
<?php
/* @var $this ArchivoController */
/* @var $model Archivo */

$this->setPageTitle('docVox - Transcribir Informes');

$this->breadcrumbs=array(
	'Archivos'=>array('index'),
	'Informes',
);

/*$this->menu=array(
	array('label'=>'List Archivo', 'url'=>array('index')),
	array('label'=>'Create Archivo', 'url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#archivo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>Informes</h1>

<p>
<!--
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
-->
</p>

<?php echo CHtml::link('B&uacute;squeda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php 
$this->renderPartial('_search',array(
	'model'=>$model,
));
?>
</div><!-- search-form -->

<?php
$popUp = "window.open(this.href, 'Informe popUp',
			'left=20,top=20,width=700,height=800px,toolbar=0,resizable=0'); return false;";

$itemFilter = array(/*''=>'Todos', */'SI'=>'SI', 'NO'=>'NO');

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'archivo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'htmlOptions'=>array('style'=>'word-wrap:break-word; width:1050px;'),
	'columns'=>array(
		//'id',
		//'nombre',
		array(
			'name'=>'puerta',
			'htmlOptions'=>array('width'=>'100px')
		),
		array(
			'name'=>'orden',
			'htmlOptions'=>array('width'=>'100px')
		),
		array(
	        'name'  => 'nombre',
	        'value' => 'CHtml::link($data->nombre,Yii::app()->createUrl("archivo/update", array("id"=>$data->primaryKey)),array("target"=>"_blank", "onclick"=>"'.$popUp.'"))',
	        'type'  => 'raw',
			'htmlOptions'=>array('width'=>'300px')
    	),
         array('name'=>'id', 
                    'header'=>'descripcion',
                    'value'=>'substr($data->obj_ref->descripcion,0,15)'
         ),
		//'idAudio',
		 array(
            'name' => 'transcripto',
            'value' => '$data->transcripto',
            'filter' => $itemFilter,
        ),
        //'transcriptoPor',
		//'texto',
		array(
			'name'=>'fecha',
			'htmlOptions'=>array('width'=>'140')
		),
		//'tiempo',
		'aux',
		 array(
		    'class'=>'CButtonColumn',
		    'template'=>'{update}{view}{delete}',
		 	'visible'=>Yii::app()->user->checkAccess("admin")
		 ),
		 
	),
));
?>

<?php
//TABLE SORTER: (para utilizarla comentar el widget de arriba CGridView y el render del search.
/*$this->widget('application.extensions.tablesorter.Sorter', array(
    'data'=>$records,
    'columns'=>array(
        'id',
        'nombre',
        'idAudio',
        'aux',
    ),
    'filters'=>array(
        '',
        '',
    	'',
        //'filter-false',  won't filter this
        'filter-select', // filter as select box
    ),
    ));*/
?>