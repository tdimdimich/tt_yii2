<?php

use app\models\Author;
use yii\db\Migration;
use yii\db\Schema;

/**
 * @see Author
 */
class m160113_071553_CreateAuthor extends Migration{

	public function up(){
		$this->createTable('authors', [
			'id' => $this->bigPrimaryKey(),
			'firstname' => $this->string(),
			'lastname' => $this->string(),
		]);
	}

	public function down(){
		$this->dropTable('authors');
	}

}
