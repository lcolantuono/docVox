<?php

/**
 * This is the model class for table "archivo".
 *
 * The followings are the available columns in table 'archivo':
 * @property integer $id
 * @property string $nombre
 * @property string $puerta
 * @property string $orden
 * @property integer $idAudio
 * @property string $transcripto
 * @property string $transcriptoPor
 * @property string $texto
 * @property string $fecha
 * @property string $tiempo
 * @property string $aux
 */
class Archivo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Archivo the static model class
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
		return 'archivo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, puerta, orden, idAudio, fecha', 'required'),
			array('idAudio', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>100),
			array('puerta, orden, tiempo', 'length', 'max'=>20),
			array('transcriptoPor', 'length', 'max'=>45),
			array('transcripto', 'length', 'max'=>5),
			array('aux', 'length', 'max'=>60),
			array('texto', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, puerta, orden, idAudio, transcripto, transcriptoPor, texto, fecha, aux', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array('obj_ref' => array(self::BELONGS_TO, 'Audio', 'idAudio')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'puerta' => 'Puerta',
			'orden' => 'Orden',
			'idAudio' => 'Id Audio',
			'transcripto' => 'Transcripto',
			'transcriptoPor' => 'Transcripto Por',
			'texto' => 'Texto',
			'fecha' => 'Fecha',
			'tiempo' => 'Tiempo',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('puerta',$this->puerta,true);
		$criteria->compare('orden',$this->orden,true);
		$criteria->compare('idAudio',$this->idAudio);
		$criteria->compare('transcripto',$this->transcripto,true);
		$criteria->compare('transcriptoPor',$this->transcriptoPor,true);
		$criteria->compare('texto',$this->texto,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('tiempo',$this->tiempo,true);
		$criteria->compare('aux',$this->aux,true);
		
		$sort=new CSort();
		$sort->defaultOrder='fecha DESC';
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>50000),
			'sort'=>$sort,
		));
	}
}