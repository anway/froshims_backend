<?php

/**
 * This is the model class for table "tb_sport".
 *
 * The followings are the available columns in table 'tb_sport':
 * @property integer $id
 * @property string $name
 * @property integer $gameType
 *
 * The followings are the available model relations:
 * @property Schedule[] $schedules
 * @property SportSeasonAssoc[] $sportSeasonAssocs
 * @property User[] $tbUsers
 */
class Sport extends OptionsBase //CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Sport the static model class
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
		return 'tb_sport';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, gameType', 'required'),
			array('gameType', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, gameType', 'safe', 'on'=>'search'),
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
			'schedules' => array(self::HAS_MANY, 'Schedule', 's_id'),
			'sportSeasonAssocs' => array(self::HAS_MANY, 'SportSeasonAssoc', 's_id'),
			//'tbUsers' => array(self::MANY_MANY, 'User', 'tb_userSportAssoc(s_id, u_id)'),
            'userSportAssocs'=> array(self::HAS_MANY, 'UserSportAssoc', 's_id')
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
			'gameType' => 'Game Type',
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
		$criteria->compare('gameType',$this->gameType);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    /**
     * @return array of sports, indexed by IDs
     */
    /*public function getSportOptions()
    {
        $sportArray = CHtml::listData($this, 'id', 'name');
        return $sportArray;
    }*/
}