<?php

class SiteController extends Controller
{
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
			'coco'=>array(
                'class'=>'CocoAction',
            ),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		if(Yii::app()->user->getId()===null){
            $this->redirect(array('site/login'));
		}else{
			// renders the view file 'protected/views/site/index.php'
			// using the default layout 'protected/views/layouts/main.php'
			$this->render('index');
		}
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
/*				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Gracias por contactarse..');*/
				
				Yii::import('application.extensions.phpmailer.JPhpMailer');
				$mail = new JPhpMailer;
				$mail->IsSMTP();
				//$mail->Host = 'smtp.gmail.com';
				$mail->Host = 'smtp.googlemail.com:465';
				$mail->SMTPSecure = "ssl";
				$mail->SMTPAuth = true;
				$mail->Username = 'intranet.funmed@gmail.com';
				$mail->Password = 'proxycinco';
				$mail->SetFrom($model->email, $model->nombre);
				$mail->Subject = $model->asunto;
				$mail->AltBody = 'Para ver este mensaje utilice un visor de mails con HTML!';
				$mail->MsgHTML('<h1>DocVox</h1><h2>'.$model->nombre.'</h2></br><b>Mensaje:</b> '.$model->mensaje);
				$mail->AddAddress('intranet.funmed@gmail.com', 'Lucas Colantuono');
				$mail->Send();

				Yii::app()->user->setFlash('contact','Gracias por contactarse con nosotros. En seguida le responderemos.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
				#$this->redirect(Yii::app()->request->baseUrl.'/index.php?r=archivo/admin'); // Luego de loguearse, redirigue a la pagina archivo/admin
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}