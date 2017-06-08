<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Shop */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->radioList([
            'Седан'=>'Седан',
            'Хэтчбэк'=>'Хэтчбэк',
            'Универсал'=>'Универсал',
            'Купе'=>'Купе'
    ]) ?>

    <?= $form->field($model, 'dops')->checkboxList([
            'Ксенон '=>'Ксенон',
            'Коврики '=>'Коврики',
            'Фаркоп '=>'Фаркоп',
            'Тонировка '=>'Тонировка',
            'Сигнализация '=>'Сигнализация',
            'Ветровики '=>'Ветровики',
            'Брызговики '=>'Брызговики'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

