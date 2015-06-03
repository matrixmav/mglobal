<?php

/**
 * This is the model class for table "user_pages".
 *
 * The followings are the available columns in table 'user_pages':
 * @property integer $id
 * @property integer $user_id
 * @property integer $order_id
 * @property string $page_name
 * @property string $page_content
 * @property string $created_at
 */
class UserPages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_pages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, order_id, page_name, page_content, created_at', 'required'),
			array('user_id, order_id', 'numerical', 'integerOnly'=>true),
			array('page_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, order_id, page_name, page_content, created_at', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'order_id' => 'Order',
			'page_name' => 'Page Name',
			'page_content' => 'Page Content',
			'created_at' => 'Created At',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('page_name',$this->page_name,true);
		$criteria->compare('page_content',$this->page_content,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserPages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function createNewPages($userId, $orderId, $nbPage,$pageContent){
            for($i=1; $i<$nbPage; $i++){
                    $userpagesObject1 = new UserPages;
                    $userpagesObject1->order_id = $orderId;
                    $userpagesObject1->user_id = $userId;
                    $userpagesObject1->page_name = 'Page'.$i;
                    if($i == 1){
                        $userpagesObject1->page_name = 'Home';
                    }
                    $userpagesObject1->page_content = $pageContent;
                    $userpagesObject1->created_at = date("Y-m-d");
                    $userpagesObject1->save(false);   
                }
        }
}
