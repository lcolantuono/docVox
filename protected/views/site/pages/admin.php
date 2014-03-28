<?php
/* @var $this SiteController */
if(Yii::app()->user->getId()===null){
            $this->redirect(array('site/login'));
}else{
	if (Yii::app()->user->checkAccess("admin")){
$this->pageTitle=Yii::app()->name . ' - Administracion';
$this->breadcrumbs=array(
	'Administracion',
);
?>

<!--<h1>Administraci&oacute;n</h1>

<code><?php echo __FILE__; ?></code>.</p>-->

<h1>Administraci&oacute;n del sitio</h1>

<div style="float: left; height: 200px; margin-right: 150px;">

<h3>Audios</h3>
<ul>
<li><a href="<?php echo Yii::app()->baseUrl?>/index.php?r=audio/admin">Administrador de Audio</a></li>
<li><a href="<?php echo Yii::app()->baseUrl?>/index.php?r=audio/create">Nuevo Audio</a></li>
</ul>

<h3>Archivos</h3>
<ul>
<li><a href="<?php echo Yii::app()->baseUrl?>/index.php?r=archivo/admin">Administrador de Archivos</a></li>
<li><a href="<?php echo Yii::app()->baseUrl?>/index.php?r=archivo/create">Nuevo Archivo</a></li>
</ul>

</div>

<div style="float: left; height: 200px; margin-right: 150px;">

<h3>M&eacute;dicos</h3>
<ul>
<li><a href="<?php echo Yii::app()->baseUrl?>/index.php?r=medico/admin">Administrador de M&eacute;dicos</a></li>
<li><a href="<?php echo Yii::app()->baseUrl?>/index.php?r=medico/create">Nuevo M&eacute;dico</a></li>
</ul>

<h3>Servicios</h3>
<ul>
<li><a href="<?php echo Yii::app()->baseUrl?>/index.php?r=servicios/admin">Administrador de Servicios</a></li>
<li><a href="<?php echo Yii::app()->baseUrl?>/index.php?r=servicios/create">Nuevo Servico</a></li>
</ul>

</div>

<div style="float: left; height: 200px; margin-right: 150px;">

<h3>Usuarios</h3>
<ul>
<li><a href="<?php echo Yii::app()->baseUrl?>/index.php?r=usuario/admin">Administrador de Usuarios</a></li>
<li><a href="<?php echo Yii::app()->baseUrl?>/index.php?r=usuario/create">Nuevo Usuario</a></li>
</ul>

<h3>Roles de Usuarios</h3>
<ul>
<li><a href="<?php echo Yii::app()->baseUrl?>/index.php?r=rol/admin">Administrador de Roles</a></li>
<li><a href="<?php echo Yii::app()->baseUrl?>/index.php?r=rol/create">Nuevo Rol</a></li>
</ul>

</div>

<?php
//EAjax File Uploaded (sube un sólo archivo).
              /*          $this->widget('application.extensions.EAjaxUpload.EAjaxUpload', array(
                            'id' => 'fileUploader',
                            'config' => array(
                                'action' => Yii::app()->createUrl('/Audio/upload'),
                                'allowedExtensions' => array("mp3","wav"), //array("jpg","jpeg","gif","exe","mov" and etc...
                                'sizeLimit' => 1 * 1024 * 1024 * 100, // maximum file size in bytes
                                'minSizeLimit' => 1024, // minimum file size in bytes
                                'onComplete' => "js:function(id, fileName, responseJSON){ $('#archivo').val(fileName); $('#botones').css('display','inline'); }",
                            )
                        ));
              */
	}else{
		throw new CHttpException(403,'No se encuentra autorizado para ingresar.');
	}
}
?>