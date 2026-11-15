<?php

/* @var $this \yii\web\View */
/* @var $content string */

\hail812\adminlte3\assets\AdminLteAsset::register($this);
\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
$this->registerCssFile('@web/css/site.css', ['depends' => \hail812\adminlte3\assets\AdminLteAsset::class]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= \yii\helpers\Html::encode($this->title ?: 'Acesso ao back-office') ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition login-page backend-login-page">
<?php $this->beginBody() ?>
<main class="backend-login-shell">
    <div class="backend-login-brand">
        <span class="brand-mark" aria-hidden="true"><i class="fas fa-layer-group"></i></span>
        <span>Gestão <strong>Back-office</strong></span>
    </div>
    <?= $content ?>
    <p class="backend-login-caption">Acesso reservado a utilizadores autorizados.</p>
</main>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
