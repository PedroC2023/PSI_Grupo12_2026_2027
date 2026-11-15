<?php

use yii\helpers\Html;
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light backend-navbar">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button" aria-label="Abrir ou fechar menu">
                <i class="fas fa-bars" aria-hidden="true"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <span class="nav-link navbar-section-label">Área de administração</span>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto align-items-center">
        <?php if (!Yii::$app->user->isGuest): ?>
            <li class="nav-item d-none d-sm-inline-block">
                <span class="nav-link navbar-account">
                    <i class="far fa-user-circle mr-2" aria-hidden="true"></i>
                    <?= Html::encode(Yii::$app->user->identity->username) ?>
                </span>
            </li>
        <?php endif; ?>
        <li class="nav-item">
            <?php if (!Yii::$app->user->isGuest): ?>
                <?= Html::a('<i class="fas fa-sign-out-alt mr-2" aria-hidden="true"></i>Sair', ['/site/logout'], [
                    'class' => 'nav-link navbar-logout',
                    'data-method' => 'post',
                    'aria-label' => 'Terminar sessão',
                    'encode' => false,
                ]) ?>
            <?php else: ?>
                <?= Html::a('Entrar', ['/site/login'], ['class' => 'nav-link navbar-logout']) ?>
            <?php endif; ?>
        </li>
    </ul>
</nav>
