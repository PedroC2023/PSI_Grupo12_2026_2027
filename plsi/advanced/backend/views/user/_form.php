<?php
use common\models\User;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/** @var backend\models\UserForm $model */
$roles = array_keys(Yii::$app->authManager->getRoles());
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'password')->passwordInput()
    ->hint($model->scenario === 'update' ? 'Deixe em branco para manter a atual.' : '') ?>
<?= $form->field($model, 'status')->dropDownList([
    User::STATUS_ACTIVE => 'Ativo',
    User::STATUS_INACTIVE => 'Inativo',
]) ?>
<?= $form->field($model, 'role')->dropDownList(array_combine($roles, array_map('ucfirst', $roles)), ['prompt' => 'Selecione...']) ?>

<div class="mt-3">
    <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-secondary']) ?>
</div>

<?php ActiveForm::end(); ?>