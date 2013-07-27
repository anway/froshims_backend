<?php

/**
 * This is the model class for table "tb_user".
 *
 * The followings are the available columns in table 'tb_user':
 * @property integer $id
 * @property string $fName
 * @property string $lName
 * @property string $email
 * @property integer $dorm_id
 * @property integer $phoneNum
 * @property integer $userType_id
 *
 * The followings are the available model relations:
 * @property Dorm $dorm
 * @property Usertype $userType
 * @property UserSportAssoc[] $userSportAssocs
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'tb_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fName, lName, email, dorm_id, phoneNum, userType_id', 'required'),
			array('dorm_id, phoneNum, userType_id', 'numerical', 'integerOnly'=>true),
			array('fName, lName, email', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fName, lName, email, dorm_id, phoneNum, userType_id', 'safe', 'on'=>'search'),
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
			'dorm' => array(self::BELONGS_TO, 'Dorm', 'dorm_id'),
			'userType' => array(self::BELONGS_TO, 'Usertype', 'userType_id'),
			'userSportAssocs' => array(self::HAS_MANY, 'UserSportAssoc', 'u_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fName' => 'First Name',
			'lName' => 'Last Name',
			'email' => 'Email',
			'dorm_id' => 'Dorm',
			'phoneNum' => 'Phone Number',
			'userType_id' => 'User Type',
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
        
        $criteria->with=array('dorm', 'userType');

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.fName',$this->fName,true);
		$criteria->compare('t.lName',$this->lName,true);
		$criteria->compare('t.email',$this->email,true);
		$criteria->compare('dorm.name',$this->dorm_id, true);
		$criteria->compare('t.phoneNum',$this->phoneNum);
		$criteria->compare('userType.name',$this->userType_id, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}