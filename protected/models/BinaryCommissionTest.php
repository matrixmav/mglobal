<?php

/**
 * This is the model class for table "binary_commission_test".
 *
 * The followings are the available columns in table 'binary_commission_test':
 * @property integer $id
 * @property integer $user_id
 * @property string $parent
 * @property string $chield
 * @property string $position
 * @property integer $order_id
 * @property double $purchase_amount
 * @property double $comm_amount
 * @property string $date
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class BinaryCommissionTest extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'binary_commission_test';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, parent, chield, position, order_id, purchase_amount, comm_amount, date, status, created_at, updated_at', 'required'),
			array('user_id, order_id, status', 'numerical', 'integerOnly'=>true),
			array('purchase_amount, comm_amount', 'numerical'),
			array('parent', 'length', 'max'=>100),
			array('chield', 'length', 'max'=>50),
			array('position', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, parent, chield, position, order_id, purchase_amount, comm_amount, date, status, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'parent' => 'Parent',
			'chield' => 'Chield',
			'position' => 'Position',
			'order_id' => 'Order',
			'purchase_amount' => 'Purchase Amount',
			'comm_amount' => 'Comm Amount',
			'date' => 'Date',
			'status' => 'Status',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('parent',$this->parent,true);
		$criteria->compare('chield',$this->chield,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('purchase_amount',$this->purchase_amount);
		$criteria->compare('comm_amount',$this->comm_amount);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('status',$this->status);
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
	 * @return BinaryCommissionTest the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
