<?php

namespace app\models;

use m160113_071553_CreateAuthor;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "authors".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * 
 * @see m160113_071553_CreateAuthor
 */
class Author extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
        ];
    }
	
	
	public function __toString(){
		return $this->firstname.' '.$this->lastname;
	}
	
}
