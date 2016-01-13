<?php

use app\models\Author;
use app\models\BookSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model BookSearch */
/* @var $form ActiveForm */
?>

<div class="book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
		'fieldConfig' => [
			'template' => '{input}',
			'options' => [
				'tag' => 'span',
//				'class' => '',
			]
		],
    ]); ?>
	
		<?= $form->field($model, 'author_id')->dropdownList(
			ArrayHelper::map(Author::find()->all(), 'id', 'label'),
			['prompt'=>'Автор...','style' => 'width:300px;']
		); ?>
	
	<?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'date_create') ?>

    <?= $form->field($model, 'date_update') ?>

    <?= $form->field($model, 'preview') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'author_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
