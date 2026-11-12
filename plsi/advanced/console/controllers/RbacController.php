<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\rbac\EmpresaDonaRule;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        // ---------- REGRA DE PROPRIEDADE ----------
        $rule = new EmpresaDonaRule();
        $auth->add($rule);

        // ---------- PERMISSÕES ----------
        $perms = [
            // back-office
            'acederBackOffice'    => 'Aceder ao back-office',
            'validarLeituras'     => 'Validar leituras e contadores',
            'gerirEmpresas'       => 'Gerir empresas clientes',
            'gerirPlanos'         => 'Gerir planos de subscrição',
            'consultarRelatorios' => 'Consultar relatórios globais',
            'gerirUtilizadores'   => 'Gerir utilizadores',
            'gerirRoles'          => 'Atribuir roles',
            // front-office (só sobre dados da própria empresa)
            'gerirContadores'     => 'Registar e editar contadores',
            'registarLeituras'    => 'Registar leituras periódicas',
            'consultarConsumos'   => 'Consultar consumos',
            'consultarEstimativas'=> 'Consultar estimativas de consumo e custo',
            'gerirSubscricao'     => 'Gerir a subscrição e o plano',
        ];
        $p = [];
        foreach ($perms as $nome => $descricao) {
            $p[$nome] = $auth->createPermission($nome);
            $p[$nome]->description = $descricao;
            $auth->add($p[$nome]);
        }

        // Versões "só da própria empresa" das permissões do front-office
        $own = [];
        foreach (['gerirContadores', 'registarLeituras', 'consultarConsumos',
                  'consultarEstimativas', 'gerirSubscricao'] as $nome) {
            $own[$nome] = $auth->createPermission($nome . 'Propria');
            $own[$nome]->description = $perms[$nome] . ' (apenas da própria empresa)';
            $own[$nome]->ruleName = $rule->name;
            $auth->add($own[$nome]);
            $auth->addChild($own[$nome], $p[$nome]);
        }

        // ---------- ROLES ----------
        $empresa = $auth->createRole('empresa');
        $auth->add($empresa);
        foreach ($own as $perm) {
            $auth->addChild($empresa, $perm);
        }

        $moderador = $auth->createRole('moderador');
        $auth->add($moderador);
        $auth->addChild($moderador, $p['acederBackOffice']);
        $auth->addChild($moderador, $p['validarLeituras']);
        $auth->addChild($moderador, $p['consultarConsumos']);
        $auth->addChild($moderador, $p['consultarEstimativas']);

        $gestor = $auth->createRole('gestor');
        $auth->add($gestor);
        $auth->addChild($gestor, $moderador);
        $auth->addChild($gestor, $p['gerirEmpresas']);
        $auth->addChild($gestor, $p['gerirPlanos']);
        $auth->addChild($gestor, $p['consultarRelatorios']);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $gestor);
        $auth->addChild($admin, $p['gerirUtilizadores']);
        $auth->addChild($admin, $p['gerirRoles']);

        echo "RBAC WaterTrack criado.\n";
    }

    public function actionAssign($role, $userId)
    {
        $auth = Yii::$app->authManager;
        $r = $auth->getRole($role);
        if (!$r) {
            echo "Role '$role' não existe.\n";
            return;
        }
        $auth->assign($r, $userId);
        echo "Role '$role' atribuído ao utilizador $userId.\n";
    }
}