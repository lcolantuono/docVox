<script> 
	function cerrarse(){
		if (confirm("Seguro desea cerrar el audio?")){window.close();}
	}
</script> 
<script type="text/javascript">
	function confirmForm(){
		var estado = document.getElementById('Archivo_transcripto').value;
		return confirm('Desea continuar con estado trancripto: '+estado+'?');
	}
</script>
<?php
/* @var $this ArchivoController */
/* @var $model Archivo */

$this->setPageTitle('docVox - Transcribir Informe');

$idAudio = $model->id;

$this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'X Cerrar',
	'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'size'=>'null', // null, 'large', 'small' or 'mini'
	'htmlOptions'=>array(
		'onclick'=>'javascript:cerrarse();',
		'style'=>'position: absolute; right: 40px; top: 20px;',
	)
));

$this->breadcrumbs=array(
	'Archivos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Transcribir',
);

/*$this->menu=array(
	array('label'=>'List Archivo', 'url'=>array('index')),
	array('label'=>'Create Archivo', 'url'=>array('create')),
	array('label'=>'View Archivo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Archivo', 'url'=>array('admin')),
);*/
?>

<h3 align="center">Transcribir Informe <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>