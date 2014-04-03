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

<?php 
// FUNCIONES PARA RECUPERAR NOMBRE DE MEDICOS Y DE SERVICIOS
function nombreMed($id){
	$medico = Yii::app()->db->createCommand()
		     ->select('medico.nombre')
		     ->from('medico')
		     ->where('idmedico='.$id)
		     ->queryRow();
		$med = $medico['nombre'];
	return $med;
}

function nombreSer($id){
	$servicio = Yii::app()->db->createCommand()
		     ->select('servicios.nombre')
		     ->from('servicios')
		     ->where('idservicios='.$id)
		     ->queryRow();
		$ser = $servicio['nombre'];
	return $ser;
}
// ***************    FIN FUNCIONES    ****************** //

echo CHtml::link('B&uacute;squeda Avanzada','#',array('class'=>'search-button')); ?>
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
$itemFilter2 = array(/*''=>'Todos', */'Fundacion'=>'Fundacion', 'Imagenes'=>'Imagenes','Ados'=>'Ados', 'CMIC'=>'CMIC');

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'archivo-grid',
	'dataProvider'=>$model->search(),
	'afterAjaxUpdate' => 'reinstallDatePicker', // (#1)
	'filter'=>$model,
	'htmlOptions'=>array('style'=>'word-wrap:break-word; width:1050px;'),
	'columns'=>array(
		//'id',
		//'nombre',
		array(
			'name'=>'puerta',
			'htmlOptions'=>array('width'=>'5%')
		),
		array(
			'name'=>'orden',
			'htmlOptions'=>array('width'=>'5%')
		),
		array(
	        'name'  => 'nombre',
	        'value' => 'CHtml::link($data->nombre,Yii::app()->createUrl("archivo/update", array("id"=>$data->primaryKey)),array("target"=>"_blank", "onclick"=>"'.$popUp.'"))',
	        'type'  => 'raw',
			'htmlOptions'=>array('width'=>'300px')
    	),
    	array('name'=>'audio', 
                    'header'=>'Nombre',
                    'value'=>'substr($data->obj_ref->audio,0,20)'
         ),
        array('name'=>'descripcion', 
                   'header'=>'Descripcion',
                   'value'=>'substr($data->obj_ref->descripcion,0,15)'
        ),
         
         array('name'=>'ubicacion', 
                    'header'=>'Ubicacion',
                    'value'=>'$data->obj_ref->ubicacion',
                    'filter' => $itemFilter2,
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
			'htmlOptions'=>array('width'=>'140'),
			'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'fecha', 
                'language' => 'es',
				'options'=>array(        
			        'showButtonPanel'=>true,
			        'dateFormat'=>'yy-mm-dd',//Date format 'mm/dd/yy','yy-mm-dd','d M, y','d MM, y','DD, d MM, yy'
			    ),
                // 'i18nScriptFile' => 'jquery.ui.datepicker-ja.js', (#2)
                'htmlOptions' => array(
                    'id' => 'datepicker_for_fecha',
                    'size' => '10',
                ),
                'defaultOptions' => array(  // (#3)
                    'showOn' => 'focus', 
                    'dateFormat' => 'yy-mm-dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    'showButtonPanel' => true,
                )
            ), 
            true), // (#4)
		),
		//'tiempo',
		//'aux',
		/* array(
		    'class'=>'CButtonColumn',
		    'template'=>'{update}{view}{delete}',
		 	'visible'=>Yii::app()->user->checkAccess("admin")
		 ),*/
		
		array('name'=>'servicio', 
                    'header'=>'Servicio',
                    'value'=>'nombreSer($data->obj_ref->idservicios)',
                    'filter'=>false
         ),
         array('name'=>'medico', 
                    'header'=>'Medico',
                    'value'=>'nombreMed($data->obj_ref->idmedico)',
                    'filter'=>false
         ),
		 
	),
));


// (#5)
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
        //use the same parameters that you had set in your widget else the datepicker will be refreshed by default
    $('#datepicker_for_fecha').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['ja'],{'dateFormat':'yy-mm-dd'}));
}
");
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