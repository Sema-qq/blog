<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leave-comment mr0">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="site-login">
                <h1><?= Html::encode($this->title) ?></h1>

                <p>Заполните поля для авторизации на сайте:</p>

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        'labelOptions' => ['class' => 'col-lg-1 control-label'],
                    ],
                ]); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

<!--                --><?//= $form->field($model, 'email')->textInput() ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox(['label'=>'Запомнить меня',
                    'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                ])->label('Запомнить меня') ?>

                <div #login>
                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>


            </div>
        </div>
        <div class="col-md-2">
            <!-- Put this script tag to the <head> of your page -->
            <script type="text/javascript" src="//vk.com/js/api/openapi.js?143"></script>

            <script type="text/javascript">
                VK.init({apiId: 5966834});
            </script>

            <!-- Put this div tag to the place, where Auth block will be -->
            <div id="vk_auth"></div>
            <script type="text/javascript">
                VK.Widgets.Auth("vk_auth", {authUrl: '/auth/login-vk'});
            </script>
        </div>
    </div>
</div>