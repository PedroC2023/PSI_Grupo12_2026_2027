<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Área de cliente';
$this->params['breadcrumbs'][] = $this->title;
$this->params['meta_description'] = 'Aceda à sua área de cliente Watertrack.';
$this->params['meta_keywords'] = 'Watertrack, área de cliente, iniciar sessão';
$htmlIcon = <<<HTML
{label}<div class="input-group"><span class="input-group-text" aria-hidden="true">%s</span>{input}</div>{error}{hint}
HTML;
$labelOptions = ['class' => 'form-label fw-semibold small'];
?>
<div class="site-login d-flex align-items-center justify-content-center py-5">
    <div class="card border-0 overflow-hidden login-split-card">
        <div class="row g-0">

            <!-- Brand panel -->
            <div class="col-md-5 d-none d-md-flex login-brand-panel text-white">
                <div class="d-flex flex-column justify-content-between p-4 p-lg-5 w-100">
                    <h2 class="h3 text-white"><i class="fas fa-hand-holding-water text-primary me-2"></i>Watertrack</h2>
                    <div>
                        <h2 class="fw-bold mb-3 login-brand-title">
                            Bem-vindo<br>de volta
                        </h2>
                        <p class="opacity-75 mb-0 login-brand-text">
                            Consulte a sua área de cliente e acompanhe os seus serviços.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Form panel -->
            <div class="col-md-7">
                <div class="p-4 p-lg-5">
                    <div class="text-center mb-4">
                        <div class="d-md-none mb-3">
                            <span class="h4 text-primary"><i class="fas fa-hand-holding-water me-2"></i>Watertrack</span>
                        </div>
                        <h1 class="h3 fw-bold mb-1"><?= Html::encode($this->title) ?></h1>
                        <p class="text-body-secondary small">Introduza os seus dados para continuar.</p>
                    </div>

                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <div class="mb-3">
                        <?= $form->field($model, 'username', [
                            'options' => ['class' => 'mb-0'],
                            'template' => sprintf($htmlIcon, '&#128100;'),
                            'inputOptions' => [
                                'class' => 'form-control',
                                'placeholder' => 'Utilizador',
                                'autofocus' => true,
                            ],
                        ])->textInput()->label('Nome de utilizador', $labelOptions) ?>
                    </div>

                    <div class="mb-3">
                        <?= $form->field($model, 'password', [
                            'options' => ['class' => 'mb-0'],
                            'template' => sprintf($htmlIcon, '&#128274;'),
                            'inputOptions' => [
                                'class' => 'form-control',
                                'placeholder' => 'Palavra-passe',
                            ],
                        ])->passwordInput()->label('Palavra-passe', $labelOptions) ?>
                    </div>

                    <div class="mb-4">
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    </div>

                    <div class="d-grid">
                        <?= Html::submitButton(
                            'Iniciar sessão',
                            [
                                'class' => 'btn login-btn btn-lg rounded-3 text-white',
                                'name' => 'login-button',
                            ],
                        ) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                    <div class="text-body-secondary text-center mt-3 small">
                        <?= Html::a('Esqueceu-se da palavra-passe?', ['site/request-password-reset']) ?>
                        <span class="mx-1">&middot;</span>
                        <?= Html::a('Reenviar e-mail de verificação', ['site/resend-verification-email']) ?>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
