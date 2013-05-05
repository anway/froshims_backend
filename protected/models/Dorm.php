<?php

/**
 * This is the model class for table "tb_dorm".
 *
 * The followings are the available columns in table 'tb_dorm':
 * @property integer $id
 * @property string $name
 * @property string $teamName
 *
 * The followings are the available model relations:
 * @property Schedule[] $schedules
 * @property Schedule[] $schedules1
 * @property Score[] $scores
 * @property Score[] $scores1
 * @property Score[] $scores2
 * @property Tournament[] $tournaments
 * @property Tournament[] $tournaments1
 * @property User[] $users
 */
class Dorm extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Dorm the static model class
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
		return 'tb_dorm';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, teamName', 'required'),
			array('name, teamName', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, teamName', 'safe', 'on'=>'search'),
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
			'schedules' => array(self::HAS_MANY, 'Schedule', 't2_id'),
			'schedules1' => array(self::HAS_MANY, 'Schedule', 't1_id'),
			'scores' => array(self::HAS_MANY, 'Score', 'winner'),
			'scores1' => array(self::HAS_MANY, 'Score', 'loser'),
			'scores2' => array(self::HAS_MANY, 'Score', 'forfeit'),
			'tournaments' => array(self::HAS_MANY, 'Tournament', 'winner1'),
			'tournaments1' => array(self::HAS_MANY, 'Tournament', 'winner2'),
			'users' => array(self::HAS_MANY, 'User', 'dorm_id'),
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
			'teamName' => 'Team Name',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('teamName',$this->teamName,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    /**
     * @return array of dorms, indexed by IDs
     */
    public function getDormOptions()
    {
        $dormArray = CHtml::listData($this, 'id', 'name');
        return $dormArray;
    }
}