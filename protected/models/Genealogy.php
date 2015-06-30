<?php

/**
 * This is the model class for table "genealogy".
 *
 * The followings are the available columns in table 'genealogy':
 * @property integer $id
 * @property string $parent
 * @property integer $user_id
 * @property integer $sponsor_user_id
 * @property string $position
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Genealogy extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'genealogy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent, user_id, sponsor_user_id, position,order_amount,total_purchase_amount,commission_amount,left_purchase,right_purchase,right_carry,left_carry, status, created_at, updated_at', 'required'),
			array('user_id, sponsor_user_id, status', 'numerical', 'integerOnly'=>true),
			array('parent', 'length', 'max'=>50),
			array('position', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, parent, user_id, sponsor_user_id, position, status, created_at, updated_at', 'safe', 'on'=>'search'),
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
                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent' => 'Parent',
			'user_id' => 'User',
			'sponsor_user_id' => 'Sponsor User',
			'position' => 'Position',
                        'order_amount' => 'Order Amount',
                        'total_purchase_amount' => 'Total Purchase Amount',
                        'commission_amount' => 'Commission Amount',
                        'left_purchase' => 'Left Purchase',
                        'right_purchase' => 'Right Purchase',
                        'right_carry' => 'Right Carry',
                        'left_carry'=>'Left Carry',
			'status' => 'Status',
                        'order_status' => 'Order Status',
                        'order_amount' => 'Order Amount',
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
		$criteria->compare('parent',$this->parent,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('sponsor_user_id',$this->sponsor_user_id);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('status',$this->status);
                $criteria->compare('order_amount',$this->order_amount);
                $criteria->compare('total_purchase_amount',$this->total_purchase_amount);
                $criteria->compare('commission_amount',$this->commission_amount);
                $criteria->compare('left_purchase',$this->left_purchase);
                $criteria->compare('right_purchase',$this->right_purchase);
                $criteria->compare('right_carry',$this->right_carry);
                $criteria->compare('left_carry',$this->left_carry);
                //$criteria->compare('right_carry',$this->right_carry);
                $criteria->compare('order_status',$this->order_status);
                $criteria->compare('order_amount',$this->order_amount);
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
	 * @return Genealogy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getGenealogyByValue($field, $value){
             return Genealogy::model()->findByAttributes(array($field => $value ));
        }
        
        public function getParentBinary($rightTotalAmount, $userObject, $position){
            //check parent having right node or not
            $myRightChieldObject = BaseClass::getGenoalogyTreeChild($userObject->parent, $position);

            //parent having right node
            if($myRightChieldObject){
                //check chield having order
                $rightChieldOrderObject = Order::getOrderByValue('user_id',$myRightChieldObject[0]->user_id);  

                //Order present
                if($rightChieldOrderObject){
                    //find the order amount
                    $rightOrderPurchaseValue = $rightChieldOrderObject->package->amount;
                    //upsh the order amount in to an array
                    array_push($rightTotalAmount, $rightOrderPurchaseValue);
                }
            }
            return $rightTotalAmount;
        }
        
       /* public function create($genealogyObject , $packageObject){
            $modelGenealogy = new Genealogy;
            $modelGenealogy->parent = $genealogyObject->parent ;
            $modelGenealogy->user_id = Yii::app()->session['userid'];
            $modelGenealogy->position = $genealogyObject->position;
            $modelGenealogy->order_amount = $packageObject ;
            $modelGenealogy->date = date('Y-m-d');
            $modelGenealogy->status = 1;
            $modelGenealogy->created_at = date('Y-m-d');
            if ($modelBinary->save(false)) {

            }  
            return ;
        }*/
}
