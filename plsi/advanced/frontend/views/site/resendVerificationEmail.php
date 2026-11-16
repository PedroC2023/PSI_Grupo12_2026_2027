<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ResendVerificationEmailForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Reenviar e-mail de verificação';
$this->params['breadcrumbs'][] = $this->title;
$this->params['meta_description'] = 'Peça um novo e-mail para confirmar a sua conta Watertrack.';
$this->params['meta_keywords'] = 'Watertrack, confirmar conta, e-mail de verificação';
$htmlIcon = <<<HTML
{label}<div class="input-group"><span class="input-group-text" aria-hidden="true">%s</span>{input}</div>{error}{hint}
HTML;
$labelOptions = ['class' => 'form-label fw-semibold small'];
?>
<div class="site-resend-verification-email d-flex align-items-center justify-content-center py-5">
    <div class="card border-0 overflow-hidden login-split-card">
        <div class="row g-0">

            <!-- Brand panel -->
            <div class="col-md-5 d-none d-md-flex login-brand-panel text-white">
                <div class="d-flex flex-column justify-content-between p-4 p-lg-5 w-100">
                    <h2 class="h3 text-white"><i class="fas fa-hand-holding-water text-primary me-2"></i>Watertrack</h2>
                    <div>
                        <h2 class="fw-bold mb-3 login-brand-title">
                            Confirme o<br>seu e-mail
                        </h2>
                        <p class="opacity-75 mb-0 login-brand-text">
                            Enviaremos uma nova mensagem para confirmar a sua conta.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Form panel -->
            <div class="col-md-7">
                <div class="p-4 p-lg-5">
                    <div class="text-center mb-4">
                        <div class="d-md-none mb-3"><span class="h4 text-primary"><i class="fas fa-hand-holding-water me-2"></i>Watertrack</span></div>
                        <h1 class="h3 fw-bold mb-1"><?= Html::encode($this->title) ?></h1>
                        <p class="text-body-secondary small">Indique o seu e-mail para receber uma nova ligação de verificação.</p>
                    </div>

                    <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>

                    <div class="mb-4">
                        <?= $form->field($model, 'email', [
                            'options' => ['class' => 'mb-0'],
                            'template' => sprintf($htmlIcon, '&#9993;'),
                            'inputOptions' => [
                                'autofocus' => true,
                                'class' => 'form-control',
                                'placeholder' => 'email@exemplo.pt',
                            ],
                        ])->textInput()->label('O seu e-mail', $labelOptions) ?>
                    </div>

                    <div class="d-grid">
                        <?= Html::submitButton(
                            'Enviar',
                            [
                                'class' => 'btn login-btn btn-lg rounded-3 text-white',
                            ],
                        ) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                    <div class="text-body-secondary text-center mt-3 small">
                        Já confirmou o e-mail? <?= Html::a('Iniciar sessão', ['site/login']) ?>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
