<?php

/**
 * This is the model class for table "build_temp".
 *
 * The followings are the available columns in table 'build_temp':
 * @property integer $id
 * @property integer $category_id
 * @property integer $temp_header_id
 * @property integer $temp_body_id
 * @property integer $temp_footer_id
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class BuildTemp extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'build_temp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, temp_header_id, temp_body_id, temp_footer_id, created_at, updated_at', 'required','folderpath','screenshot','template_id'),
			array('category_id, temp_header_id, temp_body_id, temp_footer_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, category_id, temp_header_id, temp_body_id, temp_footer_id, status, created_at, updated_at', 'safe', 'on'=>'search'),
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
                     
                    'category' => array(self::BELONGS_TO, 'BuildCategory', 'category_id'),
                    'header' => array(self::BELONGS_TO, 'BuildTempHeader', 'temp_header_id'),
                    'footer' => array(self::BELONGS_TO, 'BuildTempFooter', 'temp_footer_id'),
                    'body' => array(self::BELONGS_TO, 'BuildTempBody', 'temp_body_id'),
		     
                    
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'category_id' => 'Category',
			'temp_header_id' => 'Temp Header',
			'temp_body_id' => 'Temp Body',
			'temp_footer_id' => 'Temp Footer',
			'status' => 'Status',
                        'folderpath'=>'Folder path',
                        'screenshot'=> 'Screenshot',
                        'template_id'=>'template_id', 
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
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
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('temp_header_id',$this->temp_header_id);
		$criteria->compare('temp_body_id',$this->temp_body_id);
		$criteria->compare('temp_footer_id',$this->temp_footer_id);
		$criteria->compare('status',$this->status);
                $criteria->compare('folderpath',$this->folderpath);
                $criteria->compare('screenshot',$this->screenshot);
                $criteria->compare('template_id',$this->template_id);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BuildTemp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
