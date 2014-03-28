<?php

/**
 * This is the model class for table "medico".
 *
 * The followings are the available columns in table 'medico':
 * @property integer $idmedico
 * @property string $nombre
 * @property string $aux
 * @property string $cod
 */
class Medico extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Medico the static model class
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
		return 'medico';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'required'),
			array('nombre, aux, cod', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idmedico, nombre, aux, cod', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idmedico' => 'Idmedico',
			'nombre' => 'Nombre',
			'aux' => 'Aux',
			'cod' => 'Cod',
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

		$criteria->compare('idmedico',$this->idmedico);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('aux',$this->aux,true);
		$criteria->compare('cod',$this->cod,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}