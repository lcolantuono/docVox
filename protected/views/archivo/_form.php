<?php
/* @var $this ArchivoController */
/* @var $model Archivo */
/* @var $form CActiveForm */
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#li').click(function(){
		cronometro();
	});
});
</script>

<script type="text/javascript">
<!--
function changeTime(change){
	
}
//-->
</script>

<script language="JavaScript">
	var hora = "0"
	var minuto = "00"
	var segundo = "0"
	function cronometro(){
		if ((minuto < 10) && (minuto != "00")){
			bajamin = "0" + minuto
		}
		else{
			bajamin = minuto
		}
		bajasec = (segundo < 10) ? segundo = "0" + segundo : segundo
		document.cronometro.tiempo.value = hora + ":" + bajamin + ":" + bajasec
		if (segundo < 59){
			segundo++
		}else{
			segundo = "0"
			minuto++
			if (minuto > 59){
				minuto = "00"
				hora++
			}
		}
		window.setTimeout("cronometro()",1000) 
	}
	//window.onload=cronometro //Inicia el contrador de tiempo cuando ingresa a la pagina
</script>

<!-- 1er Input del cronometro
<div style="text-align: center;">
	<form name="cronometro2">
		<input readonly="readonly" style="border:0" type=text value="" name="tiempo" size=8>
	</form>
</div>-->

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'archivo-form',
	'htmlOptions'=>array("name"=>"cronometro",'onsubmit'=>"return confirmForm();"),
	'enableAjaxValidation'=>false,
)); ?>

	<!--<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>-->
	
	<?php echo $form->errorSummary($model); ?>

	<?php
	if (!$model->isNewRecord){ //Si no es un nuevo registro, osea que viene de create.php, hacer/mostrar lo siguiente:
		//Recupero el nombre del servicio.
		$servicio = Yii::app()->db->createCommand()
		     ->select('servicios.nombre')
		     ->from('servicios, audio, archivo')
		     ->where('audio.idaudio=archivo.idAudio AND audio.idaudio='.$model->idAudio)
		     ->queryRow();
		$serv = $servicio['nombre'];
		
		//Recupero el nombre del medico.
		$medico = Yii::app()->db->createCommand()
		     ->select('medico.nombre')
		     ->from('medico, audio, archivo')
		     ->where('audio.idaudio=archivo.idAudio AND audio.idaudio='.$model->idAudio)
		     ->queryRow();
		$med = $medico['nombre'];
     ?>
<h1></h1>

<!--REPRODUCTOR-->

			<div id="divContenedor">
				<div id="divReproductor">
					<div id="divInfo">
						<div id="divLogo">
							<img src="<?php echo Yii::app()->request->baseUrl;?>/img/logoEst.jpg" align="left" alt="Logo" width="150px">
						</div>
						<div id="divInfoCancion">
							<label id="lblCancion"><strong>Nombre: </strong><span>-</span></label>
							<label id="lblArtista"><strong>Informaci&oacute;n: </strong><span>-</span></label>
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
						<div id="divBarra"><input id="range" type="range" style="width: 586px; height:100px;" min="0" max="100" value="0"></div>
					</div>
					<div id="divLista">
						<ol id="olCanciones">
							
							<?php 
							/*$query = mysql_query("Select * from audio");
							$cont=0;
							while ($fila=mysql_fetch_array($query)){
								echo '<li rel="../mobile/files/'.$fila['audio'].'">';
								echo '<strong>'.$fila['audio'].'</strong>Transcripto: '.$fila['transcripto'];
								echo '<em>'.$fila['paciente'].'</em></li>';
							}*/
							/*foreach ($user as $fila){
								echo '<li rel="'.$fila['nombre'].'">';
								$nombre = explode('/', $fila['nombre']);
								echo '<strong>'.$nombre[1].'</strong>Transcripto: '.$fila['transcripto'];
								echo '<em>'.$fila['aux'].'</em></li>';
								if ($fila['transcripto']=="SI"){$valor1="SI";$valor2="NO";}else{$valor1="NO";$valor2="SI";}
								$id = $fila['id'];
								echo '<form><select id="sel" name="valor"><option value="'.$valor1.'">'.$valor1.'</option>
					 					<option value="'.$valor2.'">'.$valor2.'</option><input style="display:none;" type="text" name="id" value="'.$fila['id'].'"/>';
					 			echo '<input type="button" id="submit" title="vambiar"></form><div id="recargar">fdsafdsafdsa</div></li>';
							}*/
							?>
							<li id="li" rel="<?php echo Yii::app()->request->baseUrl.'/'.$model->nombre;?>">
								<strong><?php echo $model->nombre; ?></strong>
								<em><?php echo "M&eacute;dico: $med - Servicio: $serv - "?><?php echo "Paciente: ".$model->puerta."-".$model->orden;?></em>
							</li>
						</ol>
					</div>
					<!--<div id="divCreditos">
						<h1>Reproductor de m&uacute;sica con HTML5 y jQuery</h1>
						<p>Ejemplo por Cali Rojas - <a href="http://www.lewebmonster.com" target="_blank">www.lewebmonster.com</a></p>
					</div>-->
				</div>
			</div>
		<div id="aux" style="display: none;">Bot&oacute;n nro: </div>

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reproductor.css"/>
	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ext/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/reproductor.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/joystick.js"></script>
	<?php } //Fin del if (!$model->isNewRecord) ?>
	
	<!--<input readonly="readonly" style="border:0" type=text value="" name="tiempo" size=8>-->
	
	<div class="row" style="display: none;">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'puerta'); ?>
		<?php echo $form->textField($model,'puerta',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'puerta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orden'); ?>
		<?php echo $form->textField($model,'orden',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'orden'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idAudio'); ?>
		<?php echo $form->textField($model,'idAudio', array('readonly'=>'true')); ?>
		<?php echo $form->error($model,'idAudio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transcripto'); ?>
		<?php echo $form->dropDownList($model,'transcripto', array('NO'=>'NO','SI'=>'SI')); ?>
		<?php echo $form->error($model,'transcripto'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'transcriptoPor'); ?>
		<?php echo $form->textField($model,'transcriptoPor',array('size'=>45,'maxlength'=>45,'value'=>Yii::app()->user->name)); ?>
		<?php echo $form->error($model,'transcriptoPor'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'texto (Ctrl +C: Copiar Texto)'); ?>
		<?php echo $form->textArea($model,'texto',array('rows'=>10, 'cols'=>100,'style'=>'width: 585px; height: 275px;', 'onclick'=>"select_all(this)")); ?>
		<?php echo $form->error($model,'texto'); ?>
	</div>

	<?php $fecha = date("Y-m-d h:i:s");?>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha', array('value'=>$fecha, 'readonly'=>'true')); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>
	
	<div class="row" style='display: none;'>
		<?php echo $form->labelEx($model,'tiempo'); ?>
		<?php echo $form->textField($model,'tiempo',array('size'=>20,'maxlength'=>20, 'name'=>'tiempo', 'readonly'=>'true')); ?>
		<?php echo $form->error($model,'tiempo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aux'); ?>
		<?php echo $form->textField($model,'aux',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'aux'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Subir' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>
<script type="text/javascript">
    function select_all(obj) {
        var text_val=eval(obj);
        text_val.focus();
        text_val.select();
        if (!document.all) return; // IE only
        r = text_val.createTextRange();
        r.execCommand('copy');
    }
</script>

<script type="text/javascript">
$("#link").click(function(){
  var holdtext = $("#Archivo_texto").innerText;
  Copied = holdtext.createTextRange();
  Copied.execCommand("Copy");
});
</script>

</div><!-- form -->