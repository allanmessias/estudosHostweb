<?php

/**
 * This is the model class for table "User".
 *
 * The followings are the available columns in table 'User':
 */
class User extends CActiveRecord
{
	// tabela para uso na hostweb
	// /**
	//  * @return string the associated database table name
	//  */
	public function tableName()
	{
		return 'tbl_user_yii_doc';
	}

	// /**
	//  * 
	//  *
	//  * @return string the associated database table name
	//  */
	// public function tableName()
	// {
	// 	return 'tbl_user'; 
	// }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, password, email, paisid', 'safe', 'on'=>'insert'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
    {
        return array(
            'countries'=>array(self::BELONGS_TO, 'Countries', 'paisid'),
        );
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username' => 'Usuário',
			'password' => 'Senha',
			'email' => 'Email',
			'paisid' => 'País'

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
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('username', $this->username, true); 

		return new CActiveDataProvider('User', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}