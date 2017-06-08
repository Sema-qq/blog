<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::listBox('category', $selectedCategory, $categories, ['class'=>'form-control'],['miltiple'=>false]) ?>

    <div class="form-group">
        <?= Html::submitButton('Выбрать',['class'=>'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
