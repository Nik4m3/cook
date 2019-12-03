<?php

namespace app\models;

use app\models\ActiveRecord\Users;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property Users|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    /** @var string */
    public $username;
    /** @var string */
    public $password;
    /** @var bool */
    public $rememberMe = true;

    /** @var Users */
    protected $user;


    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'trim'],
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * @param string $attribute
     */
    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            if (Users::checkPassword($this->username, $this->password)
                && ($user = Users::findOne(['LOGIN' => $this->username]))) {
                $this->user = $user;
            } else {
                $this->addError($attribute, 'Неверное имя пользователя или пароль.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            if ($this->rememberMe) {
                $this->user->generateAuthKey();
            }
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return Users|null
     */
    public function getUser()
    {
        return $this->user;
    }
}
