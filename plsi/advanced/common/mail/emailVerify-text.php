<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var common\models\User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
Olá <?= $user->username ?>,

Aceda à ligação abaixo para confirmar o seu endereço de e-mail:

<?= $verifyLink ?>
