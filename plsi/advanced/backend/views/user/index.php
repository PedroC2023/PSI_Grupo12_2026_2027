<?php
use common\models\User;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Gestão de Utilizadores';
$this->params['breadcrumbs'][] = $this->title;

$estados = [User::STATUS_ACTIVE => 'Ativo', User::STATUS_INACTIVE => 'Inativo', User::STATUS_DELETED => 'Eliminado'];
?>
<h1><?= Html::encode($this->title) ?></h1>

<?php foreach (['success', 'error'] as $type): ?>
    <?php if ($msg = Yii::$app->session->getFlash($type)): ?>
        <div class="alert alert-<?= $type === 'error' ? 'danger' : 'success' ?>"><?= Html::encode($msg) ?></div>
    <?php endif; ?>
<?php endforeach; ?>

<p>
    <?= Html::a('Novo utilizador', ['create'], ['class' => 'btn btn-success']) ?>
    <?= $showDeleted
        ? Html::a('Ocultar eliminados', ['index'], ['class' => 'btn btn-outline-secondary'])
        : Html::a('Mostrar eliminados', ['index', 'showDeleted' => 1], ['class' => 'btn btn-outline-secondary']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'rowOptions' => fn($m) => $m->status == User::STATUS_DELETED ? ['class' => 'table-secondary'] : [],
    'columns' => [
        ['attribute' => 'id', 'label' => 'ID'],
        ['attribute' => 'username', 'label' => 'Nome de utilizador'],
        ['attribute' => 'email', 'label' => 'Email'],
        ['label' => 'Estado', 'value' => fn($m) => $estados[$m->status] ?? '—'],
        [
            'label' => 'Role',
            'value' => function ($m) {
                $roles = Yii::$app->authManager->getRolesByUser($m->id);
                return $roles ? implode(', ', array_keys($roles)) : '—';
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete} {restore}',
            'visibleButtons' => [
                'update' => fn($m) => $m->status != User::STATUS_DELETED,
                'delete' => fn($m) => $m->status != User::STATUS_DELETED,
                'restore' => fn($m) => $m->status == User::STATUS_DELETED,
            ],
            'buttons' => [
                'delete' => fn($url) => Html::a('Eliminar', $url, [
                    'class' => 'btn btn-sm btn-danger',
                    'data' => ['method' => 'post', 'confirm' => 'Eliminar este utilizador?'],
                ]),
                'restore' => fn($url) => Html::a('Restaurar', $url, [
                    'class' => 'btn btn-sm btn-warning',
                    'data' => ['method' => 'post'],
                ]),
                'view' => fn($url) => Html::a('Ver', $url, ['class' => 'btn btn-sm btn-info']),
                'update' => fn($url) => Html::a('Editar', $url, ['class' => 'btn btn-sm btn-primary']),
            ],
        ],
    ],
]); ?>