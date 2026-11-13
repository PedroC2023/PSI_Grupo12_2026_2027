<?php
namespace backend\controllers;

use Yii;
use backend\models\UserForm;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    ['allow' => true, 'roles' => ['gerirRoles']],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                    'restore' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex($showDeleted = 0)
    {
        $query = User::find();
        if (!$showDeleted) {
            $query->where(['<>', 'status', User::STATUS_DELETED]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 20],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'showDeleted' => (int) $showDeleted,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', ['model' => $this->findModel($id)]);
    }

    public function actionCreate()
    {
        $model = new UserForm(['scenario' => UserForm::SCENARIO_CREATE]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Utilizador criado.');
            return $this->redirect(['index']);
        }

        return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $user = $this->findModel($id);
        $model = UserForm::fromUser($user);

        if ($model->load(Yii::$app->request->post())) {
            if ($user->id == Yii::$app->user->id && ($model->role !== 'admin' || $model->status != User::STATUS_ACTIVE)) {
                $model->addError('role', 'Não pode retirar o role admin nem desativar a sua própria conta.');
            } elseif ($model->save()) {
                Yii::$app->session->setFlash('success', 'Utilizador atualizado.');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', ['model' => $model, 'user' => $user]);
    }

    // Soft delete: só muda o status para 0
    public function actionDelete($id)
    {
        $user = $this->findModel($id);

        if ($user->id == Yii::$app->user->id) {
            Yii::$app->session->setFlash('error', 'Não pode eliminar a sua própria conta.');
            return $this->redirect(['index']);
        }

        $user->status = User::STATUS_DELETED;
        $user->save(false, ['status', 'updated_at']);

        Yii::$app->session->setFlash('success', 'Utilizador eliminado (pode ser restaurado).');
        return $this->redirect(['index']);
    }

    public function actionRestore($id)
    {
        $user = $this->findModel($id);
        $user->status = User::STATUS_ACTIVE;
        $user->save(false, ['status', 'updated_at']);

        Yii::$app->session->setFlash('success', 'Utilizador restaurado.');
        return $this->redirect(['index', 'showDeleted' => 1]);
    }

    protected function findModel($id): User
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Utilizador não encontrado.');
    }
}