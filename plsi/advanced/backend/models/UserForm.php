<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;

class UserForm extends Model
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public $username;
    public $email;
    public $password;
    public $status = User::STATUS_ACTIVE;
    public $role;

    private $_user;

    public function scenarios(): array
    {
        $attributes = ['username', 'email', 'password', 'status', 'role'];

        return [
            self::SCENARIO_CREATE => $attributes,
            self::SCENARIO_UPDATE => $attributes,
        ];
    }

    public static function fromUser(User $user): self
    {
        $form = new self(['scenario' => self::SCENARIO_UPDATE]);
        $form->_user = $user;
        $form->username = $user->username;
        $form->email = $user->email;
        $form->status = $user->status;
        $roles = array_keys(Yii::$app->authManager->getRolesByUser($user->id));
        $form->role = $roles[0] ?? null;
        return $form;
    }

    public function rules()
    {
        $notSelf = function ($query) {
            if ($this->_user) {
                $query->andWhere(['<>', 'id', $this->_user->id]);
            }
        };

        return [
            [['username', 'email', 'status', 'role'], 'required'],
            [['username', 'email'], 'trim'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['username', 'unique', 'targetClass' => User::class, 'filter' => $notSelf,
                'message' => 'Este nome de utilizador já existe.'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::class, 'filter' => $notSelf,
                'message' => 'Este email já existe.'],
            ['password', 'required', 'on' => self::SCENARIO_CREATE],
            ['password', 'string', 'min' => 6],
            ['status', 'in', 'range' => [User::STATUS_ACTIVE, User::STATUS_INACTIVE]],
            ['role', 'in', 'range' => array_keys(Yii::$app->authManager->getRoles())],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Nome de utilizador',
            'email' => 'Email',
            'password' => 'Password',
            'status' => 'Estado',
            'role' => 'Role',
        ];
    }

    public function save(): bool
    {
        if (!$this->validate()) {
            return false;
        }

        $user = $this->_user ?? new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->status = $this->status;

        if ($this->password) {
            $user->setPassword($this->password);
        }
        if ($user->isNewRecord) {
            $user->generateAuthKey();
        }

        $transaction = Yii::$app->db->beginTransaction();
        try {
            if (!$user->save(false)) {
                $transaction->rollBack();
                return false;
            }
            $auth = Yii::$app->authManager;
            $auth->revokeAll($user->id);
            $auth->assign($auth->getRole($this->role), $user->id);
            $transaction->commit();
        } catch (\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }

        $this->_user = $user;
        return true;
    }
}