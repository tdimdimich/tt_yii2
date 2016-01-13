<?php

namespace app\models;

use m160113_071303_CreateBook;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $name
 * @property string $date_create
 * @property string $date_update
 * @property string $preview
 * @property string $date
 * @property integer $author_id
 * 
 * @see m160113_071303_CreateBook
 */
class Book extends ActiveRecord{

	/**
	 * @inheritdoc
	 */
	public static function tableName(){
		return 'books';
	}

	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
			[['date_create', 'date_update', 'date'], 'safe'],
			[['author_id'], 'integer'],
			[['name', 'preview'], 'string', 'max' => 255]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels(){
		return [
			'id' => 'ID',
			'name' => 'Нименование',
			'date_create' => 'Дата добавления',
			'preview' => 'Превью',
			'date' => 'Дата выхода книги',
			'author' => 'Автор',
		];
	}
	
	public function getAuthor(){
		return $this->hasOne(Author::className(), ['id' => 'author_id']);
	}

}
