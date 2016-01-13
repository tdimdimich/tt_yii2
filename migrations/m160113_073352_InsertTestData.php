<?php

use yii\db\Expression;
use yii\db\Migration;
use yii\db\Schema;

class m160113_073352_InsertTestData extends Migration{

	public function up(){
		// authors
		$this->batchInsert('authors', ['firstname', 'lastname'], [
			['Альфред', 'Ахо'],
			['Эрик', 'Эванс'],
			['Ларри', 'Ульман'],
			['Роберт', 'Сиакорд'],
			['Уэсли', 'Чан'],
			['Томас', 'Кормен'],
		]);
		// books
		$cdate = gmdate("Y-m-d H:i:s");
		$this->batchInsert('books', ['name', 'date_create', 'date_update', 'preview', 'date', 'author_id'], [
			[
				'Компиляторы. Принципы, технологии и инструментарий', $cdate, $cdate,
				'http://static2.ozone.ru/multimedia/books_covers/c300/1000749586.jpg',
				'1986-01-01', $this->createAuthorIdQuery('Альфред', 'Ахо'),
			],
			[
				'Предметно-ориентированное проектирование (DDD). Структуризация сложных программных систем',
				$cdate, $cdate,
				'http://static2.ozone.ru/multimedia/books_covers/1011125208.jpg',
				'2004-01-01', $this->createAuthorIdQuery('Эрик', 'Эванс'),
			],
			[
				'PHP и MySQL. Cоздание интернет-магазинов', $cdate, $cdate,
				'http://static1.ozone.ru/multimedia/books_covers/1012673314.jpg',
				'2015-01-01', $this->createAuthorIdQuery('Ларри', 'Ульман'),
			],
			[
				'Безопасное программирование на C и C++', $cdate, $cdate,
				'http://static2.ozone.ru/multimedia/books_covers/1011374427.jpg',
				'2014-01-01', $this->createAuthorIdQuery('Роберт', 'Сиакорд'),
			],
			[
				'Python. Создание приложений', $cdate, $cdate,
				'http://static1.ozone.ru/multimedia/books_covers/1011541373.jpg',
				'2015-01-01', $this->createAuthorIdQuery('Уэсли', 'Чан'),
			],
			[
				'Алгоритмы. Построение и анализ', $cdate, $cdate,
				'http://static2.ozone.ru/multimedia/books_covers/1013233467.jpg',
				'2015-01-01', $this->createAuthorIdQuery('Томас', 'Кормен'),
			],
		]);
	}

	private function createAuthorIdQuery($firstname, $lastname){
		return new Expression("(select id from authors where firstname = '$firstname' and lastname = '$lastname' limit 1)");
	}

}
