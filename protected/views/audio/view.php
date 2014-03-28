<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reproductor.css"/>
	
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ext/jquery-1.7.2.min.js"></script>
<?php
/* @var $this AudioController */
/* @var $model Audio */

$this->setPageTitle('docVox - Ver Audio');

$this->breadcrumbs=array(
	'Audios'=>array('index'),
	$model->idaudio,
);

$this->menu=array(
	array('label'=>'Listar Audios', 'url'=>array('index')),
	array('label'=>'Crear Audio', 'url'=>array('create')),
	array('label'=>'Actualizar Audio', 'url'=>array('update', 'id'=>$model->idaudio)),
	//array('label'=>'Borrar Audio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idaudio),'confirm'=>'Seguro deseas eliminar este audio y todos sus archivo?')),
	array('label'=>'Administrar Audios', 'url'=>array('admin')),
);
?>

<h1>Ver Audio #<?php echo $model->idaudio; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idaudio',
		'audio',
		'descripcion',
		'fecha',
		'idservicios',
		'idmedico',
		'aux',
	),
));
?>

<?php
$tieneArchivo = Yii::app()->db->createCommand()
							     ->select('*')
							     ->from('archivo')
							     ->where('idAudio='.$model->idaudio.'')
							     ->queryAll();
?>

<div id="botones" align="center" style="margin: 10px;">

<?php
	$this->beginWidget('bootstrap.widgets.TbModal', 
	array(
	'id'=>'myModal',
	'htmlOptions'=>array(
        'style'=>'width: 800px;',
    )
    )); ?>
 
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Reproductor de todos los audios <?php echo $model->idaudio;?></h4>
</div>
<?php if ($tieneArchivo){?>
<div class="modal-body" >
    	        <div id="divContenedor" style="width:650px;">
				<div id="divReproductor">
					<div id="divInfo">
						<div id="divLogo">
							<img src="<?php echo Yii::app()->request->baseUrl;?>/img/logoEst.jpg" align="left" alt="Logo" width="150px">
						</div>
						<div id="divInfoCancion">
							<label id="lblCancion"><strong>Nombre: </strong><span>-</span></label>
							<label id="lblArtista"><strong>Artista: </strong><span>-</span></label>
							<label id="lblDuracion"><strong>Duraci&oacute;n: </strong><span>-</span></label>
							<label id="lblEstado"><strong>Transcurrido: </strong><span>-</span></label>
						</div>
						<div style="clear: both"></div>
					</div>
					<div id="divControles">
						<input type="button" id="btnReproducir" title="Reproducir">
						<input type="button" id="btnPausar" title="Pausar/Continuar">
						<input type="button" id="Retroceso" title="Retroceso r&aacute;pido">
						<input type="button" id="Avance" title="Avance r&aacute;pido">
						<input type="button" id="btnAnterior" title="Anterior">
						<input type="button" id="btnSiguiente" title="Siguiente">
						<input type="button" id="btnSubirVolumen" title="Subir volumen">
						<input type="button" id="btnBajarVolumen" title="Bajar volumen">
						<input type="button" id="btnSilencio" title="Poner/Quitar silencio">
						<input type="button" id="btnRepetir" title="Repetir la lista al finalizar">			
					</div>
					<div id="divProgreso">
						<div id="divBarra"></div>
					</div>
					<div id="divLista">
						<ol id="olCanciones">
						
							<!--
							<li rel="audio/moldo/el-silencio.ogg">
								<strong>El silencio</strong>
								<em>Moldo</em>
							</li>
							<li rel="audio/moldo/cicatrices.ogg">
								<strong>Cicatrices</strong>
								<em>Moldo</em>
							</li>
							<li rel="audio/moldo/daramor.mp3">
								<strong>Daramor</strong>
								<em>Moldo</em>
							</li>
							<li rel="audio/moldo/al-filo-de-la-navaja.mp3">
								<strong>Al filo de la navaja</strong>
								<em>Moldo</em>
							</li>
							-->
							
							<?php 
							/*$query = mysql_query("Select * from audio");
							$cont=0;
							while ($fila=mysql_fetch_array($query)){
								echo '<li rel="../mobile/files/'.$fila['audio'].'">';
								echo '<strong>'.$fila['audio'].'</strong>Transcripto: '.$fila['transcripto'];
								echo '<em>'.$fila['paciente'].'</em></li>';
							}*/
							$inf = Yii::app()->db->createCommand()
							     ->select('*')
							     ->from('archivo')
							     ->where('idAudio='.$model->idaudio.'')
							     ->queryAll();
							#print_r($inf);
							foreach ($inf as $fila){
								echo '<li rel="'.$fila['nombre'].'">';
								echo '<strong>'.$fila['nombre'].'</strong>Transcripto: '.$fila['transcripto'];
								echo '<em>'.$fila['fecha'].'</em></li>';
							}
							?>
						</ol>
					</div>
					<!--<div id="divCreditos">
						<h1>Reproductor de m&uacute;sica con HTML5 y jQuery</h1>
						<p>Ejemplo por Cali Rojas - <a href="http://www.lewebmonster.com" target="_blank">www.lewebmonster.com</a></p>
						<p>M&uacute;sica por el cantautor costarricense <a href="http://moldo.bandcamp.com" target="_blank">Moldo</a></p>
					</div>-->
				</div>
			</div>
		<div id="aux" style="display: none;">Bot&oacute;n nro: </div>
</div>

	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/reproductor.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/joystick.js"></script>
	
<div class="modal-footer">
    <?php /* $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'label'=>'Save changes',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); */?>
    <?php /*$this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); */?>
</div>

<?php }else{echo "<h3>Este audio no contiene informes!</h3>";}?>

<?php $this->endWidget(); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Ver Informe/s',
    'type'=>'primary',
    'htmlOptions'=>array(
        'data-toggle'=>'modal',
        'data-target'=>'#myModal',
    ),
)); 
?>


<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Refrescar',
    'type'=>'info',
    'htmlOptions'=>array(
        'data-toggle'=>'modal',
        'data-target'=>'#myModal',
		'value'=>'Refrescar',
		'id'=>'miboton'
    ),
)); 
?>

<?php $url = Yii::app()->request->baseUrl.'/AudioRecorder';?>
<?php if (Yii::app()->user->checkAccess('medico')){?>

<?php
	$this->widget('bootstrap.widgets.TbButton', 
	array(
	'label'=>'Grabar Informes',
	'htmlOptions'=>array(
        'href'=>"$url",
		'onclick'=>"return popitup('$url')",
    )
    )); 
    
}
?>

<?php
    $this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>'cocowidget1',
            'onCompleted'=>'function(id,filename,jsoninfo){}',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            'allowedExtensions'=>array('wav','mp3'), // server-side mime-type validated
            'sizeLimit'=>10000000, // limit in server-side and in client-side
            'uploadDir' => 'audios/', // coco will @mkdir it
            // this arguments are used to send a notification
            // on a specific class when a new file is uploaded,
            'receptorClassName'=>'application.models.Audio',
            'methodName'=>'onFileUploaded',
            'userdata'=>$model->primaryKey,
            // controls how many files must be uploaded
            'maxUploads'=>16, // defaults to -1 (unlimited)
            'maxUploadsReachMessage'=>'No m&aacute; archivos permitidos', // if empty, no message is shown
            // controls how many files the can select (not upload, for uploads see also: maxUploads)
            'multipleFileSelection'=>true, // true or false, defaults: true
            'buttonText'=>'Subir Archivos',
			'dropFilesText'=>'Soltar los archivos ac&aacute;!',
			'htmlOptions'=>array('style'=>'width: 200px; position: relative; border: 0;'),
			'defaultControllerName'=>'site',
			'defaultActionName'=>'coco',
        ));
?>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#miboton').click(function() {
            // Recargo la p�gina
            location.reload();
        });
    });
</script>