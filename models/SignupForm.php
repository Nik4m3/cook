<?php

namespace app\models;

use app\models\ActiveRecord\Users;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    /** @var string */
    public $username;
    /** @var string */
    public $email;
    /** @var string */
    public $password;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            [
                'username',
                'unique',
                'targetClass' => Users::className(),
                'targetAttribute' => 'login',
                'message' => 'Такое имя пользователя уже занято.'
            ],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => Users::className(), 'message' => 'Такая почта уже занята.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Пользователь',
            'email' => 'Почта',
            'password' => 'Пароль'
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     * @throws \yii\base\Exception
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new Users();
        $user->LOGIN = $this->username;
        $user->EMAIL = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save();
    }
}