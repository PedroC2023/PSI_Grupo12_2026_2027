<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$route = Yii::$app->controller->route;
?>
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">A carregar...</span>
    </div>
</div>
<!-- Spinner End -->

<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="<?= Url::to(['/site/index']) ?>" class="navbar-brand p-0">
            <span class="h1 text-primary"><i class="fas fa-hand-holding-water me-3"></i>Watertrack</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-label="Abrir menu">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="<?= Url::to(['/site/index']) ?>" class="nav-item nav-link <?= $route === 'site/index' ? 'active' : '' ?>">Início</a>
                <a href="<?= Url::to(['/site/about']) ?>" class="nav-item nav-link <?= $route === 'site/about' ? 'active' : '' ?>">A empresa</a>
                <a href="<?= Url::to(['/site/index']) ?>#servicos" class="nav-item nav-link">Serviços</a>
                <a href="<?= Url::to(['/site/contact']) ?>" class="nav-item nav-link <?= $route === 'site/contact' ? 'active' : '' ?>">Contactos</a>

                <?php if (Yii::$app->user->isGuest): ?>
                    <a href="<?= Url::to(['/site/signup']) ?>" class="nav-item nav-link <?= $route === 'site/signup' ? 'active' : '' ?>">Criar conta</a>
                    <a href="<?= Url::to(['/site/login']) ?>" class="nav-item nav-link <?= $route === 'site/login' ? 'active' : '' ?>">Área de cliente</a>
                <?php else: ?>
                    <?= Html::a(
                        'Terminar sessão (' . Html::encode(Yii::$app->user->identity?->username) . ')',
                        ['/site/logout'],
                        ['data-method' => 'post', 'class' => 'nav-item nav-link']
                    ) ?>
                <?php endif; ?>
            </div>
            <!-- <button class="btn btn-primary btn-md-square d-flex flex-shrink-0 mb-3 mb-lg-0 rounded-circle me-3" data-bs-toggle="modal" data-bs-target="#searchModal">
                <i class="fas fa-search"></i>
            </button> -->
        </div>
    </nav>

</div>
<!-- Navbar & Hero End -->

<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="exampleModalLabel">Pesquisar</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="Palavras-chave" aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text btn border p-3"><i class="fa fa-search text-white"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->
