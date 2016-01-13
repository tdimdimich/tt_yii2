<?php

use app\models\BookSearch;
use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $searchModel BookSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
			[
				'attribute' => 'preview',
				'format' => ['image', ['height'=>'100']],
			],
            'author',
			'date:date',
			'date_create:relativeTime',
            [
				'class' => ActionColumn::className(),
				'header' => 'Кнопки действий',
				'headerOptions' => ['width' => 180],
				'template' => '<div class="btn-group">{update}{view}{delete}</div>',
				'buttons' => [
					'update' => function($url, $model, $key){
						return Html::a('Ред', $url, ['class' => 'btn btn-primary btn-sm']);
					},
					'view' => function($url, $model, $key){
						return Html::a('Просм', $url, [
							'class' => 'btn btn-success btn-sm',
							'data-target' => '#book_view_modal',
							'data-toggle' => 'modal',
//							'data-pk' => $model->id,
						]);
					},
					'delete' => function($url, $model, $key){
						return Html::a('Удл', $url, ['class' => 'btn btn-danger btn-sm']);
					},
				],
			],
        ],
    ]); ?>
	
	<?php Modal::begin([
		'id' => 'book_view_modal',
		'header' => '<h3 class="modal-title"></h3>',
	]);?>

	'Say hello...'

	<?php Modal::end(); ?>
	
	<?php $this->registerJs(
<<<JS
		$('#book_view_modal').on('show.bs.modal', function(event){
			var modal = $(this);
			var url = $(event.relatedTarget).attr('href');
			$.post(url, function(data){
				modal.find('.modal-body').html(data);
				var title = modal.find('.modal-body').find('h1');
				modal.find('.modal-title').html(title.html());
				title.remove();
			});
			modal.find('.modal-title').empty();
			modal.find('.modal-body').empty();
		});
JS
	); ?>
	
</div>
