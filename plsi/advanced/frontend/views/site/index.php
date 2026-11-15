<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'Watertrack | Leituras de Contadores de Água';
$this->params['meta_description'] = 'Leituras de contadores de água rigorosas, serviços de apoio e gestão de consumos para casas e empresas.';
$this->params['meta_keywords'] = 'leitura de contadores, água, consumo, Watertrack, gestão de água';
?>
<div class="site-index">
    <div class="carousel-header">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="<?= Yii::getAlias('@web') ?>/images/carousel-1.jpg" class="img-fluid w-100" alt="Água a correr numa torneira">
                    <div class="carousel-caption-1">
                        <div class="carousel-caption-1-content" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4 fadeInLeft animated" data-animation="fadeInLeft" data-delay="1s" style="animation-delay: 1s; letter-spacing: 3px;">Watertrack — Contagem de Água</h4>
                            <h1 class="display-2 text-capitalize text-white mb-4 fadeInLeft animated" data-animation="fadeInLeft" data-delay="1.3s" style="animation-delay: 1.3s;">Cada gota conta. Cada leitura também.</h1>
                            <p class="mb-5 fs-5 text-white fadeInLeft animated" data-animation="fadeInLeft" data-delay="1.5s" style="animation-delay: 1.5s;">Ajudamos famílias, condomínios e empresas a acompanhar o consumo de água com leituras fiáveis e um serviço próximo.</p>
                            <div class="carousel-caption-1-content-btn fadeInLeft animated" data-animation="fadeInLeft" data-delay="1.7s" style="animation-delay: 1.7s;">
                                <a class="btn btn-primary rounded-pill flex-shrink-0 py-3 px-5 me-2" href="<?= Url::to(['/site/contact']) ?>">Peça informações</a>
                                <a class="btn btn-secondary rounded-pill flex-shrink-0 py-3 px-5 ms-2" href="#servicos">Conheça os serviços</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?= Yii::getAlias('@web') ?>/images/carousel-2.jpg" class="img-fluid w-100" alt="Água limpa e transparente">
                    <div class="carousel-caption-2">
                        <div class="carousel-caption-2-content" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4 fadeInRight animated" data-animation="fadeInRight" data-delay="1s" style="animation-delay: 1s; letter-spacing: 3px;">Precisão e transparência</h4>
                            <h1 class="display-2 text-capitalize text-white mb-4 fadeInRight animated" data-animation="fadeInRight" data-delay="1.3s" style="animation-delay: 1.3s;">Mais controlo sobre o seu consumo.</h1>
                            <p class="mb-5 fs-5 text-white fadeInRight animated" data-animation="fadeInRight" data-delay="1.5s" style="animation-delay: 1.5s;">Registamos as leituras e ajudamos a identificar variações para que possa tomar decisões informadas.</p>
                            <div class="carousel-caption-2-content-btn fadeInRight animated" data-animation="fadeInRight" data-delay="1.7s" style="animation-delay: 1.7s;">
                                <a class="btn btn-primary rounded-pill flex-shrink-0 py-3 px-5 me-2" href="<?= Url::to(['/site/signup']) ?>">Criar conta</a>
                                <a class="btn btn-secondary rounded-pill flex-shrink-0 py-3 px-5 ms-2" href="<?= Url::to(['/site/login']) ?>">Área de cliente</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev" aria-label="Apresentação anterior">
                <span class="carousel-control-prev-icon btn btn-primary fadeInLeft animated" aria-hidden="true"><i class="fa fa-angle-left fa-3x"></i></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next" aria-label="Apresentação seguinte">
                <span class="carousel-control-next-icon btn btn-primary fadeInRight animated" aria-hidden="true"><i class="fa fa-angle-right fa-3x"></i></span>
                <span class="visually-hidden">Seguinte</span>
            </button>
        </div>
    </div>

    <section id="empresa" class="container-fluid about overflow-hidden py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="about-img rounded h-100">
                        <img src="<?= Yii::getAlias('@web') ?>/images/about.jpg" class="img-fluid rounded h-100 w-100" style="object-fit: cover;" alt="Profissional a verificar um contador de água">
                        <div class="about-exp"><span>Leituras de confiança</span></div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="about-item">
                        <h2 class="h4 text-primary text-uppercase">A empresa</h2>
                        <h2 class="display-3 mb-3">Água bem gerida começa com uma boa leitura.</h2>
                        <p class="mb-4">Na Watertrack, tratamos cada leitura com rigor e atenção. Trabalhamos com clientes particulares, condomínios e organizações para tornar a contagem e o acompanhamento do consumo mais simples.</p>
                        <div class="bg-light rounded p-4 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="pe-4">
                                    <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;"><i class="fas fa-tint text-white fa-2x"></i></div>
                                </div>
                                <div>
                                    <h3 class="h4 mb-2">Leituras rigorosas</h3>
                                    <p class="mb-0">Registos claros e organizados para acompanhar a evolução dos consumos.</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light rounded p-4 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="pe-4">
                                    <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;"><i class="fas fa-handshake text-white fa-2x"></i></div>
                                </div>
                                <div>
                                    <h3 class="h4 mb-2">Acompanhamento próximo</h3>
                                    <p class="mb-0">Uma equipa disponível para esclarecer dúvidas sobre leituras e consumos.</p>
                                </div>
                            </div>
                        </div>
                        <a href="<?= Url::to(['/site/about']) ?>" class="btn btn-secondary rounded-pill py-3 px-5">Saiba mais sobre nós</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="servicos" class="container-fluid service bg-light overflow-hidden py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h2 class="h4 text-uppercase text-primary">Os nossos serviços</h2>
                <h2 class="display-3 text-capitalize mb-3">Soluções de contagem para cada necessidade.</h2>
            </div>
            <div class="row gx-0 gy-4 align-items-center">
                <div class="col-lg-6 col-xl-4 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="service-item rounded p-4 mb-4">
                        <div class="d-flex">
                            <div class="service-content text-end">
                                <h3 class="h4 mb-3">Leitura de contadores</h3>
                                <p class="mb-0">Recolha e registo periódico das leituras em habitações e espaços comerciais.</p>
                            </div>
                            <div class="ps-4"><div class="service-btn"><i class="fas fa-tachometer-alt text-white fa-2x"></i></div></div>
                        </div>
                    </div>
                    <div class="service-item rounded p-4 mb-4">
                        <div class="d-flex">
                            <div class="service-content text-end">
                                <h3 class="h4 mb-3">Gestão de condomínios</h3>
                                <p class="mb-0">Organização das leituras por fração e apoio à gestão do consumo comum.</p>
                            </div>
                            <div class="ps-4"><div class="service-btn"><i class="fas fa-building text-white fa-2x"></i></div></div>
                        </div>
                    </div>
                    <div class="service-item rounded p-4 mb-4">
                        <div class="d-flex">
                            <div class="service-content text-end">
                                <h3 class="h4 mb-3">Controlo de consumos</h3>
                                <p class="mb-0">Acompanhamento das variações para ajudar a detetar consumos fora do habitual.</p>
                            </div>
                            <div class="ps-4"><div class="service-btn"><i class="fas fa-chart-line text-white fa-2x"></i></div></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                    <img src="<?= Yii::getAlias('@web') ?>/images/water.png" class="img-fluid w-100" alt="Ilustração de uma gota de água">
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="service-item rounded p-4 mb-4">
                        <div class="d-flex">
                            <div class="pe-4"><div class="service-btn"><i class="fas fa-file-alt text-white fa-2x"></i></div></div>
                            <div class="service-content">
                                <h3 class="h4 mb-3">Relatórios de leitura</h3>
                                <p class="mb-0">Informação organizada para acompanhar os registos e comparar períodos.</p>
                            </div>
                        </div>
                    </div>
                    <div class="service-item rounded p-4 mb-4">
                        <div class="d-flex">
                            <div class="pe-4"><div class="service-btn"><i class="fas fa-tools text-white fa-2x"></i></div></div>
                            <div class="service-content">
                                <h3 class="h4 mb-3">Verificação no local</h3>
                                <p class="mb-0">Confirmação da identificação e do estado visível dos contadores.</p>
                            </div>
                        </div>
                    </div>
                    <div class="service-item rounded p-4 mb-4">
                        <div class="d-flex">
                            <div class="pe-4"><div class="service-btn"><i class="fas fa-headset text-white fa-2x"></i></div></div>
                            <div class="service-content">
                                <h3 class="h4 mb-3">Apoio ao cliente</h3>
                                <p class="mb-0">Esclarecimento de questões sobre leituras e acompanhamento de consumos.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="<?= Url::to(['/site/contact']) ?>" class="btn btn-primary rounded-pill py-3 px-5">Fale connosco</a>
            </div>
        </div>
    </section>
</div>
