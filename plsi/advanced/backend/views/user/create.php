<?php
$this->title = 'Novo utilizador';
$this->params['breadcrumbs'][] = ['label' => 'Gestão de Utilizadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="backend-page-card backend-form-card">
    <div class="backend-card-heading">
        <div>
            <h2>Criar conta</h2>
            <p>Preencha os dados e escolha o perfil de acesso do utilizador.</p>
        </div>
        <i class="fas fa-user-plus" aria-hidden="true"></i>
    </div>
    <?= $this->render('_form', ['model' => $model]) ?>
</section>