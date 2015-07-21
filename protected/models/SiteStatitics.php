<?php

/**
 * This is the model class for table "site_statitics".
 *
 * The followings are the available columns in table 'site_statitics':
 * @property integer $id
 * @property integer $total_registration
 * @property integer $package_bought
 * @property integer $commission_given
 * @property integer $total_project
 * @property integer $add_date
 */
class SiteStatitics extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'site_statitics';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('total_registration, package_bought, commission_given, total_project, add_date', 'required'),
			array('total_registration, package_bought, commission_given, total_project, add_date', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, total_registration, package_bought, commission_given, total_project, add_date', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'total_registration' => 'Total Registration',
			'package_bought' => 'Package Bought',
			'commission_given' => 'Commission Given',
			'total_project' => 'Total Project',
			'add_date' => 'Add Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('total_registration',$this->total_registration);
		$criteria->compare('package_bought',$this->package_bought);
		$criteria->compare('commission_given',$this->commission_given);
		$criteria->compare('total_project',$this->total_project);
		$criteria->compare('add_date',$this->add_date);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SiteStatitics the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
