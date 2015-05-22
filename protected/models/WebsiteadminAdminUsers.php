<?php

/**
 * This is the model class for table "websiteadmin_admin_users".
 *
 * The followings are the available columns in table 'websiteadmin_admin_users':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $type
 * @property string $first_name
 * @property string $last_name
 * @property string $telephone
 * @property string $email
 * @property string $bo_lang
 * @property string $language
 * @property string $country
 * @property string $birthday_month
 * @property string $birthday_day
 * @property string $birthday_year
 * @property string $subdomain
 * @property string $card_type
 * @property string $card_number
 * @property string $card_exp_month
 * @property string $card_exp_year
 * @property string $card_name
 * @property string $card_security_code
 * @property string $address_address1
 * @property string $address_address2
 * @property string $address_city
 * @property string $address_state
 * @property string $address_zip
 * @property string $address_country
 * @property integer $plan
 * @property integer $last_update
 * @property integer $blog_created
 * @property string $blog_category
 * @property string $fax
 * @property string $blog_lang
 * @property integer $blog_active
 * @property string $activation_code
 * @property integer $animated_characters
 * @property string $message
 * @property string $payment
 * @property integer $blog_expires
 * @property integer $new_plan
 * @property string $profile_about
 * @property integer $profile_age
 * @property string $profile_interests
 * @property string $profile_profession
 * @property string $profile_languages
 * @property integer $profile_sign
 * @property integer $profile_height
 * @property integer $profile_weight
 * @property integer $profile_eyes
 * @property integer $profile_hair
 * @property integer $profile_status
 * @property integer $profile_gender
 * @property integer $profile_searchable
 * @property integer $profile_blog
 * @property integer $private_messages
 * @property integer $friendship_proposals
 * @property string $ignore_users
 * @property string $visits
 * @property integer $last_action
 * @property string $facebook_id
 * @property string $company
 */
class WebsiteadminAdminUsers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'websiteadmin_admin_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('message, profile_about, ignore_users, facebook_id, company', 'required'),
			array('plan, last_update, blog_created, blog_active, animated_characters, blog_expires, new_plan, profile_age, profile_sign, profile_height, profile_weight, profile_eyes, profile_hair, profile_status, profile_gender, profile_searchable, profile_blog, private_messages, friendship_proposals, last_action', 'numerical', 'integerOnly'=>true),
			array('username, password, card_name, address_address1, address_address2, address_country, profile_interests, profile_profession, profile_languages, company', 'length', 'max'=>255),
			array('type', 'length', 'max'=>30),
			array('first_name, last_name, email, country, subdomain, card_type, card_number, address_city, address_state', 'length', 'max'=>100),
			array('telephone, address_zip, fax, activation_code, payment', 'length', 'max'=>50),
			array('bo_lang, language, blog_lang', 'length', 'max'=>2),
			array('birthday_month, birthday_day, birthday_year, card_exp_month, card_exp_year, card_security_code, blog_category', 'length', 'max'=>10),
			array('visits, facebook_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, type, first_name, last_name, telephone, email, bo_lang, language, country, birthday_month, birthday_day, birthday_year, subdomain, card_type, card_number, card_exp_month, card_exp_year, card_name, card_security_code, address_address1, address_address2, address_city, address_state, address_zip, address_country, plan, last_update, blog_created, blog_category, fax, blog_lang, blog_active, activation_code, animated_characters, message, payment, blog_expires, new_plan, profile_about, profile_age, profile_interests, profile_profession, profile_languages, profile_sign, profile_height, profile_weight, profile_eyes, profile_hair, profile_status, profile_gender, profile_searchable, profile_blog, private_messages, friendship_proposals, ignore_users, visits, last_action, facebook_id, company', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'type' => 'Type',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'telephone' => 'Telephone',
			'email' => 'Email',
			'bo_lang' => 'Bo Lang',
			'language' => 'Language',
			'country' => 'Country',
			'birthday_month' => 'Birthday Month',
			'birthday_day' => 'Birthday Day',
			'birthday_year' => 'Birthday Year',
			'subdomain' => 'Subdomain',
			'card_type' => 'Card Type',
			'card_number' => 'Card Number',
			'card_exp_month' => 'Card Exp Month',
			'card_exp_year' => 'Card Exp Year',
			'card_name' => 'Card Name',
			'card_security_code' => 'Card Security Code',
			'address_address1' => 'Address Address1',
			'address_address2' => 'Address Address2',
			'address_city' => 'Address City',
			'address_state' => 'Address State',
			'address_zip' => 'Address Zip',
			'address_country' => 'Address Country',
			'plan' => 'Plan',
			'last_update' => 'Last Update',
			'blog_created' => 'Blog Created',
			'blog_category' => 'Blog Category',
			'fax' => 'Fax',
			'blog_lang' => 'Blog Lang',
			'blog_active' => 'Blog Active',
			'activation_code' => 'Activation Code',
			'animated_characters' => 'Animated Characters',
			'message' => 'Message',
			'payment' => 'Payment',
			'blog_expires' => 'Blog Expires',
			'new_plan' => 'New Plan',
			'profile_about' => 'Profile About',
			'profile_age' => 'Profile Age',
			'profile_interests' => 'Profile Interests',
			'profile_profession' => 'Profile Profession',
			'profile_languages' => 'Profile Languages',
			'profile_sign' => 'Profile Sign',
			'profile_height' => 'Profile Height',
			'profile_weight' => 'Profile Weight',
			'profile_eyes' => 'Profile Eyes',
			'profile_hair' => 'Profile Hair',
			'profile_status' => 'Profile Status',
			'profile_gender' => 'Profile Gender',
			'profile_searchable' => 'Profile Searchable',
			'profile_blog' => 'Profile Blog',
			'private_messages' => 'Private Messages',
			'friendship_proposals' => 'Friendship Proposals',
			'ignore_users' => 'Ignore Users',
			'visits' => 'Visits',
			'last_action' => 'Last Action',
			'facebook_id' => 'Facebook',
			'company' => 'Company',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('bo_lang',$this->bo_lang,true);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('birthday_month',$this->birthday_month,true);
		$criteria->compare('birthday_day',$this->birthday_day,true);
		$criteria->compare('birthday_year',$this->birthday_year,true);
		$criteria->compare('subdomain',$this->subdomain,true);
		$criteria->compare('card_type',$this->card_type,true);
		$criteria->compare('card_number',$this->card_number,true);
		$criteria->compare('card_exp_month',$this->card_exp_month,true);
		$criteria->compare('card_exp_year',$this->card_exp_year,true);
		$criteria->compare('card_name',$this->card_name,true);
		$criteria->compare('card_security_code',$this->card_security_code,true);
		$criteria->compare('address_address1',$this->address_address1,true);
		$criteria->compare('address_address2',$this->address_address2,true);
		$criteria->compare('address_city',$this->address_city,true);
		$criteria->compare('address_state',$this->address_state,true);
		$criteria->compare('address_zip',$this->address_zip,true);
		$criteria->compare('address_country',$this->address_country,true);
		$criteria->compare('plan',$this->plan);
		$criteria->compare('last_update',$this->last_update);
		$criteria->compare('blog_created',$this->blog_created);
		$criteria->compare('blog_category',$this->blog_category,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('blog_lang',$this->blog_lang,true);
		$criteria->compare('blog_active',$this->blog_active);
		$criteria->compare('activation_code',$this->activation_code,true);
		$criteria->compare('animated_characters',$this->animated_characters);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('payment',$this->payment,true);
		$criteria->compare('blog_expires',$this->blog_expires);
		$criteria->compare('new_plan',$this->new_plan);
		$criteria->compare('profile_about',$this->profile_about,true);
		$criteria->compare('profile_age',$this->profile_age);
		$criteria->compare('profile_interests',$this->profile_interests,true);
		$criteria->compare('profile_profession',$this->profile_profession,true);
		$criteria->compare('profile_languages',$this->profile_languages,true);
		$criteria->compare('profile_sign',$this->profile_sign);
		$criteria->compare('profile_height',$this->profile_height);
		$criteria->compare('profile_weight',$this->profile_weight);
		$criteria->compare('profile_eyes',$this->profile_eyes);
		$criteria->compare('profile_hair',$this->profile_hair);
		$criteria->compare('profile_status',$this->profile_status);
		$criteria->compare('profile_gender',$this->profile_gender);
		$criteria->compare('profile_searchable',$this->profile_searchable);
		$criteria->compare('profile_blog',$this->profile_blog);
		$criteria->compare('private_messages',$this->private_messages);
		$criteria->compare('friendship_proposals',$this->friendship_proposals);
		$criteria->compare('ignore_users',$this->ignore_users,true);
		$criteria->compare('visits',$this->visits,true);
		$criteria->compare('last_action',$this->last_action);
		$criteria->compare('facebook_id',$this->facebook_id,true);
		$criteria->compare('company',$this->company,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WebsiteadminAdminUsers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
