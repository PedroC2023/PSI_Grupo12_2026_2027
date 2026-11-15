<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var common\models\User $user */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
Olá <?= $user->username ?>,

Aceda à ligação abaixo para recuperar a sua palavra-passe:

<?= $resetLink ?>
