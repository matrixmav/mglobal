<?php

/**
 * This is the model class for table "package".
 *
 * The followings are the available columns in table 'package':
 * @property integer $id
 * @property integer $name
 * @property string $start_date
 * @property string $end_date
 * @property integer $coupon_code
 * @property integer $amount
 * @property integer $status
 * @property string $created_at
 * @property string $update_at
 */
class Package extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'package';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, start_date, end_date,coupon_discount, amount,Description,no_of_pages,no_of_images,no_of_forms, status, created_at, update_at', 'required'),
			array('name, coupon_code, amount, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, start_date, end_date,coupon_discount, amount, Description,no_of_pages,no_of_images,no_of_forms,status, created_at, update_at', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'coupon_discount' => 'Coupon price',
			'amount' => 'Amount',
                        'Description' =>'Description',
                        'no_of_pages'=>'No of pages',
                        'no_of_images'=>'No of images',
                        'no_of_forms'=>'No of forms',
			'status' => 'Status',
			'created_at' => 'Created At',
			'update_at' => 'Update At',
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
		$criteria->compare('name',$this->name);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		 
                $criteria->compare('coupon_discount',$this->coupon_discount);
                $criteria->compare('amount',$this->amount);
                $criteria->compare('Description',$this->Description);
                $criteria->compare('no_of_pages',$this->no_of_pages);
                $criteria->compare('no_of_images',$this->no_of_images);
                $criteria->compare('no_of_forms',$this->no_of_forms);
		$criteria->compare('status',$this->status);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('update_at',$this->update_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
public function createInvoice($invoiceArr){
 $body = '<table>
            <tbody>
                <tr>
                    <td height="20"  style=""></td>
                </tr>
                <tr>
                    <td height="10" bgcolor="#f15c2b" style=""></td>
                </tr>
                <tr>
                    <td valign="" bgcolor="#fafafa" height="80" style="line-height:0px; border-bottom:1px solid #dfdfdf">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td width="5%" valign="middle" style="line-height:0px"></td>
                                    <td width="40%" valign="middle" style="line-height:0px"><a target="_blank" href=""> <img width="" border="0" src="logo.png"> </a></td>
                                    <td width="55%" valign="middle" style="line-height:0px; color:#f15c2b; font-family:Nunito;">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td width="80%" valign="middle" align="right" height="20" style=" color:#f15c2b;"><img width="" border="0" src="livechat.png"> </td>
                                                </tr>
                                                <tr>
                                                    <td width="100%" valign="middle" align="right" height="20" style=" color:#828282;font-size:14px; line-height:19px; font-family:Nunito"><strong> Customer Support:</strong> 1800 909 302  </td>
                                                </tr>
                                            </tbody>
                                        </table></td>
                                </tr>
                            </tbody>
                        </table></td>
                </tr>
               <tr>
                    <td valign="" bgcolor="#efed6a" height="55" align="left" style="line-height:0px; font-size:16px">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> </td>
                                    <td width="90%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> Invoice</td>
                                    <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <!-- text description -->
                <tr>
                    <td valign="" bgcolor="#fafafa" height="" align="left" style="line-height:0px; font-size:16px">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> </td>
                                    <td width="90%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td height="20" bgcolor="" style=""></td>
                                                </tr>


                                                <tr>
                                                    <td valign="" bgcolor="" height="55" align="left" style="line-height:0px; font-size:16px">
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>

                                                                    <td width="100%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                <tr>

                                                                                    <td width="50%" valign="top" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>T0 : Mr Sandeep Kumar</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>#109, JC Road,
                                                                                                        <br>
                                                                                                        Bangalore,<br> India</td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>

                                                                                    <td width="50%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td width="50%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">
                                                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td width="2%" bgcolor="#e4f4e3" height="30"></td>
                                                                                                                    <td width="48%" bgcolor="#e4f4e3" valign="middle" height="30" align="right" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Customer ID :</td>
                                                                                                                    <td width="50%" bgcolor="#e4f4e3" valign="middle" height="30" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">APRL2456</td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td height="2" bgcolor="" style=""></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td width="1%" bgcolor="#e0eec4" height="30"></td>
                                                                                                                    <td width="49%" bgcolor="#e0eec4" valign="middle" height="30" align="right" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Invoice No : </td>
                                                                                                                    <td width="50%" bgcolor="#e0eec4" valign="middle" height="30" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">#74857487</td>
                                                                                                                </tr>
                                                                                                                 <tr>
                                                                                                                    <td height="5" bgcolor="" style=""></td>
                                                                                                                </tr>

                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Date : 10/ 05 /2015
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> Email : kumar@gmail.com
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>

                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                                                        <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> </td>

                                    </tr>
                            </tbody>
                        </table>
  
                                                <tr>
                                                    <td height="20" bgcolor="" style=""></td>
                                                </tr>
                                                <tr>
                                                    <td valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" height="30"  bgcolor="#f0f0f0" style="line-height:0px; border-top:1px dashed #dfdfdf; border-bottom:1px dashed #dfdfdf;"> 
                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                <tr> 
                                                                                    <td width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"></td>
                                                                                    <td valign="middle" width="10%" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Sl no.</td>
                                                                                    <td valign="middle" width="19%" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Package</td>
                                                                                    <td valign="middle" width="30%" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Description</td>
                                                                                    <td valign="middle" width="15%" align="middle" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Duration</td>
                                                                                    <td valign="middle" width="22%" align="middle" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Price</td>
                                                                                    <td  width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="10" bgcolor="" style=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" height="" style="line-height:0px;"> 
                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                <tr>     
                                                                                    <td width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:14px; font-family:Nunito"></td>
                                                                                    <td valign="middle" align="left" width="10%" style="line-height:22px; color: #828282; font-size:14px; font-family:Nunito">1</td>
                                                                                    <td valign="middle" align="left" width="19%" style="line-height:22px; color: #828282; font-size:14px; font-family:Nunito">Advance Pro</td>
                                                                                    <td valign="middle" align="left" width="30%" style="line-height:22px; color: #828282; font-size:14px; font-family:Nunito">Domain, 550 Bandwith,
6 Static Pages, 1
<br>Contact
form, 2 Gallery</td>
                                                                                    <td valign="middle" align="middle" width="15%" style="line-height:22px; color: #828282; font-size:14px; font-family:Nunito">1 year</td>
                                                                                    <td valign="middle" align="center" width="22%" style="line-height:22px; color:#f15c2b;; font-size:14px; font-family:Nunito"> $355</td>
                                                                                    <td width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:14px; font-family:Nunito"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="10" bgcolor="" style=""></td>
                                                </tr>
                                                <tr>
                                                    <td valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" height="50" style="line-height:0px; border-top:1px dashed #dfdfdf; border-bottom:1px dashed #dfdfdf;"> 
                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                <tr>     
                                                                                    <td width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"></td>
                                                                                   <td valign="middle" align="left" width="10%" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">1</td>
                                                                                    <td valign="middle" align="left" width="19%" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Domain</td>
                                                                                    <td valign="middle"  width="30%"  align="left" style="line-height:22px; color: #477dc0; font-size:16px; font-family:Nunito">kumar.com</td>
                                                                                     <td valign="middle" align="middle" width="15%" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">1 year</td>
                                                                                    <td valign="middle"  width="22%"  align="center" style="line-height:22px; color: #6dbb5b; font-size:16px; font-family:Nunito"> Free</td>
                                                                                    <td width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                     <td width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"></td>
                                                                    <td align="center" height="50" style="line-height:0px; border-top:1px dashed #dfdfdf; border-bottom:1px dashed #dfdfdf;"> 
                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                <tr>     
                                                                                  
                                                                                    <td valign="middle"  width="85%" height="30" align="right" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Sub Total : </td>
                                                                                    <td valign="middle"  width="15%" height="30" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> $355</td>
                                                                                </tr>
                                                                                <tr>     
                                                                                  
                                                                                    <td valign="middle"  width="85%" height="30" align="right" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Total Amount : </td>
                                                                                    <td valign="middle"  width="15%" height="30" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> Free</td>
                                                                                </tr>
                                                                                <tr>     
                                                                                  
                                                                                    <td valign="middle"  width="85%" height="30" align="right" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Used RP/cash : </td>
                                                                                    <td valign="middle"  width="15%" height="30" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> Free</td>
                                                                                </tr>
                                                                                <tr>     
                                                                                  
                                                                                    <td valign="middle"  width="85%" height="30" align="right" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Total Amount Paid : </td>
                                                                                    <td valign="middle"  width="15%" height="30" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> Free</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                     <td width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"></td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td height="20" bgcolor="" style=""></td>
                                                </tr>
                                               <tr>
                                                    <td valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                     <td width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"></td>
                                                                    <td align="center" height="50" style="line-height:0px; "> 
                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                <tr>     
                                                                                  
                                                                                    <td valign="middle"  width="100%" height="30" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">  Regards,</td>
                                                                                    
                                                                                </tr>
                                                                                <tr>     
                                                                                  
                                                                                    <td valign="middle"  width="85%" height="30" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Team Mglobally</td>
                                                                                   
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                     <td width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"></td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                               
                                                
                                               
                                                
                                                <tr>
                                                    <td height="20" bgcolor="" style=""></td>
                                                </tr>
                                                </td>
                                                </tr>
                                            



                <!-- address -->
                <tr>
                    <td valign="" bgcolor="#f5f5f5" height="70" align="center" style="line-height:0px; border-top:1px solid #dfdfdf;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> </td>
                                    <td width="45%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>

                                                <tr>
                                                    <td width="100%" height="35" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:14px; font-family:Nunito"><strong>Off:</strong> SOLUS, 3rd Floor,</td>


                                                </tr>
                                                <tr>
                                                    <td width="100%" height="35" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:14px; font-family:Nunito"><strong>Call Us:</strong> +91 80 4664 7799</td>


                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td width="50%" valign="middle" align="left" style="line-height:20px; color: #828282; font-size:14px; font-family:Nunito">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td width="100%" height="35" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:14px; font-family:Nunito"><strong>Mail us:</strong> info@mglobal.com</td>


                                                </tr>
                                                <tr>
                                                    <td width="100%" height="35" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"><strong>Visit Us On:</strong> www.<p style="color:#f15c2b; display:inline">mglobally </p>.com</td>


                                                </tr>

                                            </tbody>
                                        </table>  
                                    </td>
                                </tr>
                            </tbody>
                        </table></td>
                </tr>
                <!-- call -->
                <tr>
                    <td valign="" bgcolor="#fcfcfc" height="70" style="line-height:0px;  border-top:1px solid #dfdfdf;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td width="5%"></td>
                                    <td width="8%"><a href=""> <img width="" border="0" src="skype.png"></a></td>
                                    <td width="37%" valign="middle" align="left" style="line-height:0px;color: #19bcf1;font-size:16px; font-family:Nunito"><a style="line-height:0px;color: #19bcf1; text-decoration:none;" href="">91 80 4664 7799</a> </td>
                                    <td width="50%" valign="middle" style="line-height:0px;color: #828282;font-size:16px; font-family:Nunito">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td width="15%" valign="middle" align="left"><a href=""><img width="" border="0" src="facebook-icon.png"></a></td>
                                                    <td width="15%" valign="middle" align="left"><a href=""><img width="" border="0" src="googleplus.png"></a></td>
                                                    <td width="15%" valign="middle" align="left"><a href=""><img width="" border="0" src="pinterest-icon.png"></a></td>
                                                    <td width="15%" valign="middle" align="left"><a href=""><img width="" border="0" src="twitter-icon.png"></a></td>
                                                    <td width="40%" valign="middle" align="left"></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table></td>
                </tr>
                <!-- content 
                <tr>
                  <td valign="" bgcolor="#f5f5f5" height="40" align="center" style="line-height:0px; border-top:1px solid #dfdfdf;"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                      <tbody>
                        <tr>
                          <td width="100%" valign="middle" align="center" style="line-height:0px; color: #828282; font-size:14px; font-family:Nunito"><strong>Off:</strong> SOLUS, 3rd Floor, #2, 1st Cross, J. C. Road, Bangalore - 560027, Karnataka, India </td>
                        </tr>
                      </tbody>
                    </table></td>
                </tr>
                <tr>
                  <td valign="" bgcolor="#f5f5f5" height="40" style="line-height:0px;"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                      <tbody>
                        <tr>
                          <td width="50%" valign="middle" align="center" style="line-height:0px;color: #828282;font-size:16px; font-family:Nunito"><strong>Mail us:</strong> info@mglobal.com </td>
                          <td width="50%" valign="middle" style="line-height:0px;color: #828282;font-size:16px; font-family:Nunito"><strong>Call Us:</strong> +91 80 4664 7799</td>
                        </tr>
                      </tbody>
                    </table></td>
                </tr>-->
                <tr>
                    <td valign="" bgcolor="#fafafa" height="30" style="line-height:0px; border-top:1px solid #dfdfdf;font-size: 14px;color: #cccccc"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td width="100%" valign="middle" align="center" style="line-height:0px; font-size:14px; font-family:Nunito"> Please do not reply to this email. Emails sent to this address will not be answered. </td>
                                </tr>
                            </tbody>
                        </table></td>
                </tr>
            </tbody>
        </table>';

return  $body;                                                                           
}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Package the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
