<?php

/**
 * This is the model class for table "user_has_template".
 *
 * The followings are the available columns in table 'user_has_template':
 * @property integer $id
 * @property integer $category_id
 * @property string $temp_header
 * @property string $temp_footer
 * @property string $temp_body
 * @property integer $publish
 * @property integer $user_id
 * @property integer $template_id
 * @property string $created_at
 * @property integer $order_id
 */
class UserHasTemplate extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_has_template';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, temp_header, temp_footer, temp_body, user_id, template_id, created_at, order_id', 'required'),
			array('category_id, publish, user_id, template_id, order_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, category_id,user_menu, temp_header, temp_footer, temp_body, publish, user_id, template_id, created_at, order_id', 'safe', 'on'=>'search'),
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
                    'header' => array(self::BELONGS_TO, 'BuildTempHeader', 'temp_header'),
                    'footer' => array(self::BELONGS_TO, 'BuildTempFooter', 'temp_footer'),
                    'body' => array(self::BELONGS_TO, 'BuildTempBody', 'temp_body'),
                    'order' => array(self::BELONGS_TO, 'Order', 'order_id'),
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
                        'user_menu' => 'User Menu',
                        'temp_header' => 'Temp Header',
                        'temp_footer' => 'Temp Footer',
                        'temp_body' => 'Temp Body',
                        'publish' => 'Publish',
                        'user_id' => 'User',
                        'logo' => 'Logo',
                        'site_title' => 'Site Title',
                        'contact_email' => 'Contact Email',
                        'copyright' => 'Copyright',
                        'custom_css' => 'Custom Css',
                        'custom_js' => 'Custom Js',
                        'logo_width' => 'Logo Width',
                        'logo_height' => 'Logo Height',
                        'template_id' => 'Template',
                        'created_at' => 'Created At',
                        'order_id' => 'Order',
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
		$criteria->compare('user_menu',$this->user_menu);
		$criteria->compare('temp_header',$this->temp_header,true);
		$criteria->compare('temp_footer',$this->temp_footer,true);
		$criteria->compare('temp_body',$this->temp_body,true);
		$criteria->compare('publish',$this->publish);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('template_id',$this->template_id);
		$criteria->compare('logo',$this->logo);
		$criteria->compare('site_title',$this->site_title);
		$criteria->compare('contact_email',$this->contact_email);
		$criteria->compare('copyright',$this->copyright);
		$criteria->compare('custom_css',$this->custom_css);
		$criteria->compare('custom_js',$this->custom_js);
		$criteria->compare('logo_height',$this->logo_height);
		$criteria->compare('logo_width',$this->logo_width);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('order_id',$this->order_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserHasTemplate the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function addAndEdit($hasbuilderObject, $buildertempObject,$orderId,$userId){
            $hasbuilderObject->category_id = $buildertempObject->category_id;
            $hasbuilderObject->user_id = $userId;
            $hasbuilderObject->template_id = $buildertempObject->template_id;
            $hasbuilderObject->temp_header = $buildertempObject->header->header_content;
            $hasbuilderObject->user_menu = $buildertempObject->header->menu;
            $hasbuilderObject->temp_body = $buildertempObject->body->body_content;
            $hasbuilderObject->temp_footer = $buildertempObject->footer->footer_content;
            $hasbuilderObject->order_id = $orderId;
            $hasbuilderObject->publish = 0;
            $hasbuilderObject->created_at = date('Y-m-d');
            $hasbuilderObject->save(false);
            return $hasbuilderObject;
        }
}
