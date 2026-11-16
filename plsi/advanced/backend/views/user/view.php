<?php
use common\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Gestão de Utilizadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$estados = [User::STATUS_ACTIVE => 'Ativo', User::STATUS_INACTIVE => 'Inativo', User::STATUS_DELETED => 'Eliminado'];
?>
<section class="backend-page-card backend-detail-card">
    <div class="backend-card-heading">
        <div>
            <h2><?= Html::encode($model->username) ?></h2>
            <p>Informação da conta e respetivo acesso à plataforma.</p>
        </div>
        <i class="fas fa-id-card" aria-hidden="true"></i>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'table table-bordered detail-view backend-detail-view'],
        'attributes' => [
            ['attribute' => 'id', 'label' => 'Identificador'],
            ['attribute' => 'username', 'label' => 'Nome de utilizador'],
            ['attribute' => 'email', 'label' => 'Email'],
            ['label' => 'Estado', 'value' => $estados[$model->status] ?? '—'],
            ['label' => 'Perfil', 'value' => implode(', ', array_keys(Yii::$app->authManager->getRolesByUser($model->id))) ?: '—'],
            ['attribute' => 'created_at', 'label' => 'Criado em', 'format' => 'datetime'],
            ['attribute' => 'updated_at', 'label' => 'Atualizado em', 'format' => 'datetime'],
        ],
    ]) ?>

    <div class="backend-detail-actions">
        <?= Html::a('Voltar à lista', ['index'], ['class' => 'btn dashboard-secondary-button']) ?>
        <?php if ($model->status !== User::STATUS_DELETED): ?>
            <?= Html::a('Editar utilizador', ['update', 'id' => $model->id], ['class' => 'btn dashboard-primary-button']) ?>
        <?php endif; ?>
    </div>
</section>