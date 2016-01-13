<?php

use app\models\Book;
use yii\db\Migration;
use yii\db\Schema;

/**
 * @see Book
 */
class m160113_071303_CreateBook extends Migration{

	public function up(){
		$this->createTable('books', [
			'id' => $this->bigPrimaryKey(),
			'name' => $this->string(),
			'date_create' => $this->dateTime(),
			'date_update' => $this->dateTime(),
			'preview' => $this->string(),
			'date' => $this->date(),
			'author_id' => $this->bigInteger(),
		]);
	}

	public function down(){
		$this->dropTable('books');
	}

}
