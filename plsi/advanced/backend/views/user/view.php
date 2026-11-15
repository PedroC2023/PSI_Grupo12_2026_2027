<?php
use common\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Gestão de Utilizadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$estados = [User::STATUS_ACTIVE => 'Ativo', User::STATUS_INACTIVE => 'Inativo', User::STATUS_DELETED => 'Eliminado'];
?>
<h1><?= Html::encode($this->title) ?></h1>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'username',
        'email',
        ['label' => 'Estado', 'value' => $estados[$model->status] ?? '—'],
        ['label' => 'Role', 'value' => implode(', ', array_keys(Yii::$app->authManager->getRolesByUser($model->id))) ?: '—'],
        'created_at:datetime',
        'updated_at:datetime',
    ],
]) ?>

<?= Html::a('Voltar', ['index'], ['class' => 'btn btn-secondary']) ?>