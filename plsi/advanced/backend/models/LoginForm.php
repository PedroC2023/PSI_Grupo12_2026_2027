<?php

declare(strict_types=1);

namespace backend\models;

use Yii;
use common\models\LoginForm as CommonLoginForm;

class LoginForm extends CommonLoginForm
{
    public function validatePassword(string $attribute, array|null $params): void
    {
        parent::validatePassword($attribute, $params);

        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if ($user && !Yii::$app->authManager->checkAccess($user->id, 'acederBackOffice')) {
                $this->addError($attribute, 'Acesso negado. Esta conta não tem permissões para o back-office.');
            }
        }
    }
}
