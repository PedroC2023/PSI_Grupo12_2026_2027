<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'A empresa';
$this->params['breadcrumbs'][] = $this->title;
$this->params['meta_description'] = 'Conheça a Watertrack e a nossa abordagem às leituras de contadores de água.';
$this->params['meta_keywords'] = 'Watertrack, empresa, leitura de contadores, água';
?>
<section class="container-fluid about overflow-hidden py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-img rounded h-100">
                    <img src="<?= Yii::getAlias('@web') ?>/images/about.jpg" class="img-fluid rounded h-100 w-100" style="object-fit: cover;" alt="Contador de água numa instalação">
                    <div class="about-exp"><span>Precisão em cada leitura</span></div>
                </div>
            </div>
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                <h1 class="h4 text-primary text-uppercase">A empresa</h1>
                <h2 class="display-3 mb-3">Ajudamos a cuidar de cada gota.</h2>
                <p class="mb-4">A Watertrack presta serviços de leitura e acompanhamento de contadores de água. O nosso objetivo é tornar a informação sobre consumos mais acessível, organizada e fácil de compreender.</p>
                <p class="mb-4">Apoiamos clientes particulares, condomínios e empresas com um serviço atento, registos rigorosos e comunicação transparente em cada etapa.</p>
                <div class="row g-4">
                    <div class="col-sm-6">
                        <div class="service-item rounded p-4 h-100">
                            <div class="service-btn mb-3"><i class="fas fa-bullseye text-white fa-2x"></i></div>
                            <h3 class="h4">Rigor</h3>
                            <p class="mb-0">Tratamos cada leitura com cuidado e atenção ao detalhe.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="service-item rounded p-4 h-100">
                            <div class="service-btn mb-3"><i class="fas fa-comments text-white fa-2x"></i></div>
                            <h3 class="h4">Proximidade</h3>
                            <p class="mb-0">Estamos disponíveis para esclarecer dúvidas e apoiar os nossos clientes.</p>
                        </div>
                    </div>
                </div>
                <a href="<?= Url::to(['/site/contact']) ?>" class="btn btn-primary rounded-pill py-3 px-5 mt-4">Fale connosco</a>
            </div>
        </div>
    </div>
</section>
