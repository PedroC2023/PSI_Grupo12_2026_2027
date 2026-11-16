<?php

use yii\helpers\Html;

$identity = Yii::$app->user->identity;
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= Yii::$app->homeUrl ?>" class="brand-link">
        <span class="brand-mark" aria-hidden="true"><i class="fas fa-layer-group"></i></span>
        <span class="brand-text">Gestão <strong>Back-office</strong></span>
    </a>

    <div class="sidebar">
        <?php if ($identity !== null): ?>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="user-avatar" aria-hidden="true">
                <?= Html::encode(mb_strtoupper(mb_substr($identity->username, 0, 1))) ?>
            </div>
            <div class="info">
                <span class="d-block"><?= Html::encode($identity->username) ?></span>
                <small>Sessão ativa</small>
            </div>
        </div>
        <?php endif; ?>

        <nav class="mt-2" aria-label="Navegação principal">
            <?= \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Painel',
                        'icon' => 'tachometer-alt',
                        'url' => ['/site/index'],
                        'visible' => !Yii::$app->user->isGuest,
                    ],
                    [
                        'label' => 'Iniciar sessão',
                        'icon' => 'sign-in-alt',
                        'url' => ['/site/login'],
                        'visible' => Yii::$app->user->isGuest,
                    ],
                    ['label' => 'ADMINISTRAÇÃO', 'header' => true],
                    [
                        'label' => 'Utilizadores',
                        'icon' => 'users',
                        'url' => ['/user/index'],
                        'visible' => Yii::$app->user->can('gerirRoles'),
                    ],
                ],
            ]) ?>
        </nav>
    </div>
</aside>
