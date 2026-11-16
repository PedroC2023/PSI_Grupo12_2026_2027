<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/** @var backend\models\LoginForm $model */
$this->title = 'Iniciar sessão';
?>
<section class="backend-login-card">
    <div class="backend-login-heading">
        <span class="backend-login-icon"><i class="fas fa-lock" aria-hidden="true"></i></span>
        <h1>Iniciar sessão</h1>
        <p>Introduza as suas credenciais para continuar.</p>
    </div>

    <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'backend-login-form']]) ?>

    <?= $form->field($model, 'username')
        ->textInput(['autofocus' => true, 'autocomplete' => 'username', 'placeholder' => 'Nome de utilizador'])
        ->label('Nome de utilizador') ?>

    <?= $form->field($model, 'password')
        ->passwordInput(['autocomplete' => 'current-password', 'placeholder' => 'Palavra-passe'])
        ->label('Palavra-passe') ?>

    <?= $form->field($model, 'rememberMe')->checkbox(['label' => 'Manter sessão iniciada']) ?>

    <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary btn-block backend-login-button']) ?>

    <?php ActiveForm::end() ?>
</section>
