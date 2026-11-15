<?php

use yii\helpers\Html;

$this->title = 'Visão geral';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="backend-dashboard">
    <section class="dashboard-welcome">
        <div>
            <span class="dashboard-eyebrow">PAINEL DE GESTÃO</span>
            <h2>Bem-vindo, <?= Html::encode(Yii::$app->user->identity->username) ?></h2>
            <p>Utilize o menu lateral para navegar pelas ferramentas disponíveis.</p>
        </div>
        <div class="dashboard-welcome-icon" aria-hidden="true">
            <i class="fas fa-layer-group"></i>
        </div>
    </section>

    <section class="dashboard-section">
        <div class="dashboard-section-heading">
            <div>
                <h3>Acesso rápido</h3>
                <p>Escolha uma área para continuar.</p>
            </div>
        </div>

        <?php if (Yii::$app->user->can('gerirRoles')): ?>
            <article class="dashboard-action-card">
                <div class="dashboard-action-icon"><i class="fas fa-users" aria-hidden="true"></i></div>
                <div class="dashboard-action-copy">
                    <h4>Gestão de utilizadores</h4>
                    <p>Consulte contas, atualize permissões ou crie um novo utilizador.</p>
                </div>
                <div class="dashboard-action-links">
                    <?= Html::a('Ver utilizadores <i class="fas fa-arrow-right ml-2" aria-hidden="true"></i>', ['/user/index'], [
                        'class' => 'btn dashboard-primary-button',
                        'encode' => false,
                    ]) ?>
                    <?= Html::a('Novo utilizador', ['/user/create'], ['class' => 'btn dashboard-secondary-button']) ?>
                </div>
            </article>
        <?php else: ?>
            <article class="dashboard-action-card">
                <div class="dashboard-action-icon"><i class="fas fa-compass" aria-hidden="true"></i></div>
                <div class="dashboard-action-copy">
                    <h4>Área de administração</h4>
                    <p>As opções disponíveis para a sua conta encontram-se no menu lateral.</p>
                </div>
            </article>
        <?php endif; ?>
    </section>
</div>
