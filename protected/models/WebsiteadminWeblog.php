<?php

/**
 * This is the model class for table "websiteadmin_weblog".
 *
 * The followings are the available columns in table 'websiteadmin_weblog':
 * @property integer $id
 * @property string $user
 * @property string $description
 * @property string $author
 * @property string $logo
 * @property integer $author_image
 * @property integer $format
 * @property string $background_color
 * @property string $header_background_color
 * @property string $links_color
 * @property string $font_family
 * @property string $font_size
 * @property string $main_area_background_color
 * @property string $font_color
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $header_font_color
 * @property string $header_font_size
 * @property string $shadows_color
 * @property string $author_image_width
 * @property string $author_image_height
 * @property string $logo_text
 * @property string $zone1
 * @property string $zone2
 * @property string $zone3
 * @property string $zone4
 */
class WebsiteadminWeblog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'websiteadmin_weblog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description, author, logo, meta_description, meta_keywords, logo_text, zone1, zone2, zone3, zone4', 'required'),
			array('author_image, format', 'numerical', 'integerOnly'=>true),
			array('user, font_family', 'length', 'max'=>100),
			array('background_color, header_background_color, links_color, font_size, font_color, header_font_size, shadows_color', 'length', 'max'=>10),
			array('main_area_background_color, author_image_width, author_image_height', 'length', 'max'=>20),
			array('meta_title', 'length', 'max'=>255),
			array('header_font_color', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user, description, author, logo, author_image, format, background_color, header_background_color, links_color, font_family, font_size, main_area_background_color, font_color, meta_title, meta_description, meta_keywords, header_font_color, header_font_size, shadows_color, author_image_width, author_image_height, logo_text, zone1, zone2, zone3, zone4', 'safe', 'on'=>'search'),
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
			'user' => 'User',
			'description' => 'Description',
			'author' => 'Author',
			'logo' => 'Logo',
			'author_image' => 'Author Image',
			'format' => 'Format',
			'background_color' => 'Background Color',
			'header_background_color' => 'Header Background Color',
			'links_color' => 'Links Color',
			'font_family' => 'Font Family',
			'font_size' => 'Font Size',
			'main_area_background_color' => 'Main Area Background Color',
			'font_color' => 'Font Color',
			'meta_title' => 'Meta Title',
			'meta_description' => 'Meta Description',
			'meta_keywords' => 'Meta Keywords',
			'header_font_color' => 'Header Font Color',
			'header_font_size' => 'Header Font Size',
			'shadows_color' => 'Shadows Color',
			'author_image_width' => 'Author Image Width',
			'author_image_height' => 'Author Image Height',
			'logo_text' => 'Logo Text',
			'zone1' => 'Zone1',
			'zone2' => 'Zone2',
			'zone3' => 'Zone3',
			'zone4' => 'Zone4',
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
		$criteria->compare('user',$this->user,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('author_image',$this->author_image);
		$criteria->compare('format',$this->format);
		$criteria->compare('background_color',$this->background_color,true);
		$criteria->compare('header_background_color',$this->header_background_color,true);
		$criteria->compare('links_color',$this->links_color,true);
		$criteria->compare('font_family',$this->font_family,true);
		$criteria->compare('font_size',$this->font_size,true);
		$criteria->compare('main_area_background_color',$this->main_area_background_color,true);
		$criteria->compare('font_color',$this->font_color,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('header_font_color',$this->header_font_color,true);
		$criteria->compare('header_font_size',$this->header_font_size,true);
		$criteria->compare('shadows_color',$this->shadows_color,true);
		$criteria->compare('author_image_width',$this->author_image_width,true);
		$criteria->compare('author_image_height',$this->author_image_height,true);
		$criteria->compare('logo_text',$this->logo_text,true);
		$criteria->compare('zone1',$this->zone1,true);
		$criteria->compare('zone2',$this->zone2,true);
		$criteria->compare('zone3',$this->zone3,true);
		$criteria->compare('zone4',$this->zone4,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WebsiteadminWeblog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
