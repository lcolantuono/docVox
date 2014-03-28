<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property string $Usuario
 * @property integer $id
 * @property string $Clave
 * @property integer $idRol
 * @property string $NombreApellido
 * @property string $Email
 *
 * The followings are the available model relations:
 * @property Rol $idRol0
 */
class Usuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuario the static model class
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
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Usuario, Clave, idRol, NombreApellido, Email', 'required'),
			array('idRol', 'numerical', 'integerOnly'=>true),
			array('Usuario, NombreApellido, Email', 'length', 'max'=>255),
			array('Clave', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Usuario, id, Clave, idRol, NombreApellido, Email', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idRol0' => array(self::BELONGS_TO, 'Rol', 'idRol'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Usuario' => 'Usuario',
			'id' => 'ID',
			'Clave' => 'Clave',
			'idRol' => 'Id Rol',
			'NombreApellido' => 'Nombre Apellido',
			'Email' => 'Email',
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

		$criteria->compare('Usuario',$this->Usuario,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('Clave',$this->Clave,true);
		$criteria->compare('idRol',$this->idRol);
		$criteria->compare('NombreApellido',$this->NombreApellido,true);
		$criteria->compare('Email',$this->Email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}