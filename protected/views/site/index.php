<?php
/* @var $this SiteController */
/* @var $this2 ArchivoController */
/* @var $model Archivo */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name;

?>
<!--<h1>Bienvenido a <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>-->

<?php $user = Yii::app()->db->createCommand()
     ->select('*')
     ->from('archivo')
     ->queryAll();
     #print_r($user);
     
$nameUser = Yii::app()->user->getNombre();

Yii::app()->user->setFlash('success', '<strong>Bienvenido a DocVox!</strong>');
$this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
    ));
    
 $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading'=>'Hola '.$nameUser,
)); ?>
    <p>Selecciones una opci&oacute;n.</p>
    </br>
	<div style="float: left;">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
	    'label'=>'Transcribir Informes',
	    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	    'size'=>'large', // null, 'large', 'small' or 'mini'
		'url'=>'index.php?r=archivo/admin',
	)); ?>
	</div>
	
	<div style="float: left; margin-left: 20px;">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
	    'label'=>'Subir Audios',
	    'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	    'size'=>'large', // null, 'large', 'small' or 'mini'
		'url'=>'index.php?r=audio/create',
	)); ?>
	</div>
	
<?php
	if (Yii::app()->user->checkAccess('admin')){
	echo '<div style="float: left; margin-left: 20px;">';
	$this->widget('bootstrap.widgets.TbButton', array(
	    'label'=>'Administracion',
	    'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	    'size'=>'large', // null, 'large', 'small' or 'mini'
		'url'=>'index.php?r=site/page&view=admin',
	));
	echo '</div>';
	}
?>
	
<?php $this->endWidget(); ?>
	
<?php
$sinTranscribir = Yii::app()->db->createCommand()
							     ->select('*')
							     ->from('archivo')
							     ->where('transcripto="NO"')
							     ->queryAll();
$cantSinTra = count($sinTranscribir);
	#Yii::app()->user->setFlash('warning', '<div align="center">Cantidad de informes sin trancribir:<strong> '.$cantSinTra.'</strong></div>');
	Yii::app()->user->setFlash('info', '<div style="position: absolute;">Cantidad de informes sin trancribir:<strong> '.$cantSinTra.'</strong></div>
											<div align="right"><div id="fecha" style="display: inline">'.date("j-n-Y").' &#124; </div>
															   <div id="hora" style="display: inline"></div></div>');
?>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
			'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'),// success, info, warning, error or danger
			'info'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'),
        ),
    )); 
?>

<!--<script type="text/javascript">
	var refescamiento=setInterval(function() { 
		$('#reloj').load('index.php?r=site/page&view=reloj'); 
	},200);
</script>-->

<script type="text/javascript">
window.onload=hora;
fecha = new Date('<?php echo date("d M Y G:i:s"); ?>');
function hora(){
	var hora=fecha.getHours();
	var minutos=fecha.getMinutes();	
	var segundos=fecha.getSeconds();
	if(hora<10){ hora='0'+hora;}
	if(minutos<10){minutos='0'+minutos; }
	if(segundos<10){ segundos='0'+segundos; }
	fech=hora+":"+minutos+":"+segundos;
	document.getElementById('hora').innerHTML=fech;
	fecha.setSeconds(fecha.getSeconds()+1);
	setTimeout("hora()",1000);
}
</script>