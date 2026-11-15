<?php
use yii\helpers\Html;

$this->title = 'Editar: ' . $user->username;
$this->params['breadcrumbs'][] = ['label' => 'Gestão de Utilizadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="backend-page-card backend-form-card">
    <div class="backend-card-heading">
        <div>
            <h2>Atualizar conta</h2>
            <p>Altere os dados de <?= Html::encode($user->username) ?>. Deixe a palavra-passe vazia para a manter.</p>
        </div>
        <i class="fas fa-user-edit" aria-hidden="true"></i>
    </div>
    <?= $this->render('_form', ['model' => $model]) ?>
</section>