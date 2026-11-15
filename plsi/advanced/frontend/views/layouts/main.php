<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use yii\helpers\Html;

$this->render('_head');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <?php $this->head() ?>
    <title><?= Html::encode($this->title ?: 'Watertrack | Contagem de Água') ?></title>
</head>
<body class="<?= Yii::$app->controller->route === 'site/index' ? 'home-page' : 'inner-page' ?>">
<?php $this->beginBody() ?>

<?= $this->render('_header') ?>

<main id="main" role="main">
    <?php if (Yii::$app->session->hasFlash('success') || Yii::$app->session->hasFlash('error')): ?>
        <div class="container mt-3">
            <?= Alert::widget() ?>
        </div>
    <?php endif; ?>

    <?= $content ?>
</main>

<?= $this->render('_footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
