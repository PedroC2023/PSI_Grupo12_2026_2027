<?php
namespace common\rbac;

use yii\rbac\Rule;
use common\models\User;

class EmpresaDonaRule extends Rule
{
    public $name = 'isEmpresaDona';

    public function execute($user, $item, $params)
    {
        // $params['model'] = o contador, leitura ou estimativa em causa
        if (!isset($params['model'])) {
            return false;
        }
        $utilizador = User::findOne($user);
        return $utilizador && $params['model']->empresa_id == $utilizador->empresa_id;
    }
}