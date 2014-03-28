<?php
/* @var $this ArchivoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Archivos',
);

$this->menu=array(
	array('label'=>'Subir Archivo', 'url'=>array('create')),
	array('label'=>'Transcribir Informes', 'url'=>array('admin')),
);

$user = Yii::app()->db->createCommand()
     ->select('*')
     ->from('archivo')
     ->queryAll();
     #print_r($user);
?>
<h1>Archivos</h1>
<!-- REPRODUCTOR --
 <div id="divContenedor">
				<div id="divReproductor">
					<div id="divInfo">
						<div id="divLogo">
							<img src="img/logo2.png" align="left" alt="Logo">
						</div>
						<div id="divInfoCancion">
							<label id="lblCancion"><strong>Nombre: </strong><span>-</span></label>
							<label id="lblArtista"><strong>Usuario: </strong><span>-</span></label>
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
							
							<?php 
							/*$query = mysql_query("Select * from audio");
							$cont=0;
							while ($fila=mysql_fetch_array($query)){
								echo '<li rel="../mobile/files/'.$fila['audio'].'">';
								echo '<strong>'.$fila['audio'].'</strong>Transcripto: '.$fila['transcripto'];
								echo '<em>'.$fila['paciente'].'</em></li>';
							}
							foreach ($user as $fila){
								echo '<li rel="'.$fila['nombre'].'">';
								$nombre = explode('/', $fila['nombre']);
								echo '<strong>'.$nombre[1].'</strong>Transcripto: '.$fila['transcripto'];
								echo '<em>'.$fila['aux'].'</em></li>';
							}*/
							?>
						</ol>
					</div>
					<div id="divCreditos">
						<h1>Reproductor de m&uacute;sica con HTML5 y jQuery</h1>
						<p>Ejemplo por Cali Rojas - <a href="http://www.lewebmonster.com" target="_blank">www.lewebmonster.com</a></p>
						<p>M&uacute;sica por el cantautor costarricense <a href="http://moldo.bandcamp.com" target="_blank">Moldo</a></p>
					</div>
				</div>
			</div>
		<div id="aux" style="display: none;">Bot&oacute;n nro: </div>-->
		
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<!-- CSS  Y JS DEL REPRODUCTOR Y PEDALES --

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reproductor.css"/>
	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ext/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/reproductor.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/joystick.js"></script>
-->