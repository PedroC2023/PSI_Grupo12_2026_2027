<?php

use common\models\User;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Gestão de utilizadores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backend-users-page">
    <div class="backend-page-intro">
        <div>
            <p>ADMINISTRAÇÃO</p>
            <h2>Contas e permissões</h2>
            <span>Consulte, crie e atualize as contas com acesso à plataforma.</span>
        </div>
        <div class="backend-page-actions">
            <?= Html::a('<i class="fas fa-user-plus mr-2" aria-hidden="true"></i>Novo utilizador', ['create'], [
                'class' => 'btn dashboard-primary-button',
                'encode' => false,
            ]) ?>
            <?= $showDeleted
                ? Html::a('Ocultar eliminados', ['index'], ['class' => 'btn dashboard-secondary-button'])
                : Html::a('Ver eliminados', ['index', 'showDeleted' => 1], ['class' => 'btn dashboard-secondary-button']) ?>
        </div>
    </div>

    <?php foreach (['success', 'error'] as $type): ?>
        <?php if ($message = Yii::$app->session->getFlash($type)): ?>
            <div class="alert alert-<?= $type === 'error' ? 'danger' : 'success' ?> backend-alert" role="alert">
                <?= Html::encode($message) ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

    <section class="backend-page-card">
        <div class="backend-card-heading">
            <div>
                <h3><?= $showDeleted ? 'Todos os utilizadores' : 'Utilizadores ativos e pendentes' ?></h3>
                <p><?= Yii::$app->formatter->asInteger($dataProvider->getTotalCount()) ?> registos</p>
            </div>
            <i class="fas fa-users" aria-hidden="true"></i>
        </div>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => ['class' => 'table table-hover backend-users-table'],
            'summary' => '',
            'emptyText' => 'Não existem utilizadores para apresentar.',
            'rowOptions' => static fn(User $user): array => $user->status === User::STATUS_DELETED
                ? ['class' => 'backend-user-deleted']
                : [],
            'columns' => [
                ['attribute' => 'id', 'label' => 'ID', 'contentOptions' => ['class' => 'backend-user-id']],
                ['attribute' => 'username', 'label' => 'Utilizador'],
                ['attribute' => 'email', 'label' => 'Email'],
                [
                    'label' => 'Estado',
                    'format' => 'raw',
                    'value' => static function (User $user): string {
                        $states = [
                            User::STATUS_ACTIVE => ['Ativo', 'active'],
                            User::STATUS_INACTIVE => ['Inativo', 'inactive'],
                            User::STATUS_DELETED => ['Eliminado', 'deleted'],
                        ];
                        [$label, $class] = $states[$user->status] ?? ['Desconhecido', 'inactive'];
                        return Html::tag('span', Html::encode($label), ['class' => 'user-status user-status--' . $class]);
                    },
                ],
                [
                    'label' => 'Perfil',
                    'value' => static function (User $user): string {
                        $roles = Yii::$app->authManager->getRolesByUser($user->id);
                        return $roles ? implode(', ', array_keys($roles)) : '—';
                    },
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Ações',
                    'template' => '{view} {update} {delete} {restore}',
                    'headerOptions' => ['class' => 'backend-actions-column'],
                    'contentOptions' => ['class' => 'backend-actions-column'],
                    'visibleButtons' => [
                        'update' => static fn(User $user): bool => $user->status !== User::STATUS_DELETED,
                        'delete' => static fn(User $user): bool => $user->status !== User::STATUS_DELETED,
                        'restore' => static fn(User $user): bool => $user->status === User::STATUS_DELETED,
                    ],
                    'buttons' => [
                        'delete' => static fn(string $url): string => Html::a('Eliminar', $url, [
                            'class' => 'btn btn-sm user-action-button user-action-button--danger',
                            'data' => ['method' => 'post', 'confirm' => 'Tem a certeza de que pretende eliminar este utilizador?'],
                        ]),
                        'restore' => static fn(string $url): string => Html::a('Restaurar', $url, [
                            'class' => 'btn btn-sm user-action-button',
                            'data' => ['method' => 'post'],
                        ]),
                        'view' => static fn(string $url): string => Html::a('Ver', $url, [
                            'class' => 'btn btn-sm user-action-button',
                        ]),
                        'update' => static fn(string $url): string => Html::a('Editar', $url, [
                            'class' => 'btn btn-sm user-action-button',
                        ]),
                    ],
                ],
            ],
        ]) ?>
    </section>
</div>
