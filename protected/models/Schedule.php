<?php

/**
 * This is the model class for table "tb_schedule".
 *
 * The followings are the available columns in table 'tb_schedule':
 * @property integer $id
 * @property integer $s_id
 * @property string $date
 * @property string $time
 * @property integer $l_id
 * @property integer $t1_id
 * @property integer $t2_id
 * @property integer $scoreReported
 * @property integer $emailSent
 * @property integer $reminderSent
 * @property integer $type
 *
 * The followings are the available model relations:
 * @property Dorm $t2
 * @property Sport $s
 * @property Location $l
 * @property Dorm $t1
 * @property Score $score
 * @property Tournament[] $tournaments
 */
class Schedule extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Schedule the static model class
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
		return 'tb_schedule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('s_id, date, time, l_id, t1_id, t2_id, scoreReported, emailSent, reminderSent, type', 'required'),
			array('s_id, l_id, t1_id, t2_id, scoreReported, emailSent, reminderSent, type', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, s_id, date, time, l_id, t1_id, t2_id, scoreReported, emailSent, reminderSent, type', 'safe', 'on'=>'search'),
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
			't2' => array(self::BELONGS_TO, 'Dorm', 't2_id'),
			's' => array(self::BELONGS_TO, 'Sport', 's_id'),
			'l' => array(self::BELONGS_TO, 'Location', 'l_id'),
			't1' => array(self::BELONGS_TO, 'Dorm', 't1_id'),
			'score' => array(self::HAS_ONE, 'Score', 'g_id'),
			'tournaments' => array(self::HAS_MANY, 'Tournament', 'nextGame'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			's_id' => 'Sport',
			'date' => 'Date',
			'time' => 'Time',
			'l_id' => 'Location',
			't1_id' => 'Team 1',
			't2_id' => 'Team 2',
			'scoreReported' => 'Score Reported',
			'emailSent' => 'Email Sent',
			'reminderSent' => 'Reminder Sent',
			'type' => 'Type',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('s_id',$this->s_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('l_id',$this->l_id);
		$criteria->compare('t1_id',$this->t1_id);
		$criteria->compare('t2_id',$this->t2_id);
		$criteria->compare('scoreReported',$this->scoreReported);
		$criteria->compare('emailSent',$this->emailSent);
		$criteria->compare('reminderSent',$this->reminderSent);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}