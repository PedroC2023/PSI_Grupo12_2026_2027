<?php

declare(strict_types=1);

use yii\helpers\Url;

?>
<footer id="footer" class="mt-auto py-3 bg-body-tertiary">
    <div class="container-fluid footer py-5">
        <div class="container py-5">
            <div class="row g-5 mb-5 align-items-center">
                <div class="col-lg-7">
                    <h2 class="h3 text-white mb-2">Conte com leituras claras.</h2>
                    <p class="text-white mb-0">Estamos disponíveis para ajudar a acompanhar o seu consumo de água.</p>
                </div>
                <div class="col-lg-5 text-lg-end">
                    <a class="btn btn-secondary rounded-pill py-3 px-5" href="<?= Url::to(['/site/contact']) ?>">Entre em contacto</a>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item">
                        <h3 class="text-white mb-4"><i class="fas fa-hand-holding-water text-primary me-3"></i>Watertrack</h3>
                        <p class="mb-0">Serviços de leitura de contadores e acompanhamento de consumos de água para particulares, condomínios e empresas.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h2 class="h4 text-white mb-4">A Watertrack</h2>
                        <a href="<?= Url::to(['/site/about']) ?>"><i class="fas fa-angle-right me-2"></i> A empresa</a>
                        <a href="<?= Url::to(['/site/index']) ?>#servicos"><i class="fas fa-angle-right me-2"></i> Serviços</a>
                        <a href="<?= Url::to(['/site/contact']) ?>"><i class="fas fa-angle-right me-2"></i> Contactos</a>
                        <a href="<?= Url::to(['/site/login']) ?>"><i class="fas fa-angle-right me-2"></i> Área de cliente</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h2 class="h4 text-white mb-4">Apoio</h2>
                        <p class="mb-3">Para questões sobre leituras ou consumos, envie-nos uma mensagem.</p>
                        <a href="<?= Url::to(['/site/contact']) ?>"><i class="fas fa-angle-right me-2"></i> Pedir apoio</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h2 class="h4 text-white mb-4">Contactos</h2>
                        <a href="<?= Url::to(['/site/contact']) ?>"><i class="fas fa-envelope me-2"></i> Envie-nos uma mensagem</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
