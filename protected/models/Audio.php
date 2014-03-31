<?php

/**
 * This is the model class for table "audio".
 *
 * The followings are the available columns in table 'audio':
 * @property integer $idaudio
 * @property string $audio
 * @property string $descripcion
 * @property string $fecha
 * @property integer $idservicios
 * @property string $ubicacion
 * @property integer $idmedico
 * @property string $aux
 */
class Audio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Audio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'audio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('audio, idservicios, ubicacion, idmedico', 'required'),
			array('idservicios, idmedico', 'numerical', 'integerOnly'=>true),
			array('audio', 'length', 'max'=>100),
			array('descripcion, aux', 'length', 'max'=>200),
			array('ubicacion', 'length', 'max'=>30),
			array('fecha', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idaudio, audio, descripcion, fecha, idservicios, ubicacion, idmedico, aux', 'safe', 'on'=>'search'),
			array('medico', 'safe', 'on'=>'search'),
			array('servicio', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array('obj_med' => array(self::BELONGS_TO, 'Medico', 'idmedico'),'obj_ser' => array(self::BELONGS_TO, 'Servicios', 'idservicios')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idaudio' => 'Idaudio',
			'audio' => 'Audio',
			'descripcion' => 'Descripcion',
			'fecha' => 'Fecha',
			'idservicios' => 'Idservicios',
			'ubicacion' => 'Ubicacion',
			'idmedico' => 'Idmedico',
			'aux' => 'Aux',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idaudio',$this->idaudio);
		$criteria->compare('audio',$this->audio,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('idservicios',$this->idservicios);
		$criteria->compare('ubicacion',$this->ubicacion,true);
		$criteria->compare('idmedico',$this->idmedico);
		$criteria->compare('aux',$this->aux,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function onFileUploaded($fullFileName,$userdata) {
    	// userdata es el mismo valor que pusiste en config/main
        // fullFileName es la ruta del archivo listo para leer.
		
		$userid = Yii::app()->user->id;
		
/*		$conexion = mysql_connect ("192.168.0.217","admin2","root");
		$base = mysql_select_db("docvox");
		$sql = "INSERT INTO  `docvox`.`audio` (
			`idaudio` ,
			`audio` ,
			`descripcion` ,
			`paciente` ,
			`transcripto` ,
			`fecha` ,
			`idservicios` ,
			`idmedico`
		)
		VALUES (
			NULL ,  '$fullFileName',  '$userid', NULL ,  'NO', 
			CURRENT_TIMESTAMP ,  '8',  '7'
		);";
		mysql_query($sql);
		mysql_close($conexion);*/
		
		$au = new Archivo();
		$au->aux = $userid;
		$au->idAudio = $userdata;
		$au->nombre = $fullFileName;
		$au->insert();
		
		return true;
	}
}