<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<section class="backend-error-card">
    <span class="backend-error-icon"><i class="fas fa-exclamation-triangle" aria-hidden="true"></i></span>
    <div>
        <h2><?= Html::encode($name) ?></h2>
        <p><?= nl2br(Html::encode($message)) ?></p>
        <p>Ocorreu um problema ao processar o pedido. Pode voltar ao painel e tentar novamente.</p>
        <?= Html::a('Voltar ao painel', ['/site/index'], ['class' => 'btn dashboard-primary-button']) ?>
    </div>
</section>
