<?php

namespace app\models\ActiveRecord;

use app\models\ActiveRecord\Queries\UsersQuery;
use Yii;
use yii\base\Exception;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "USERS".
 *
 * @property int $ID
 * @property string $LOGIN Логин
 * @property string $PASSWORD Пароль
 * @property int|null $TYPE_ID тип пользователя fk user_types.id
 * @property string $EMAIL Почта
 *
 * @property UserTypes $tYPE
 */
class Users extends ActiveRecord implements IdentityInterface
{

    public $authKey;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'USERS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LOGIN', 'PASSWORD', 'EMAIL'], 'required'],
            [['TYPE_ID'], 'integer'],
            [['LOGIN', 'PASSWORD', 'EMAIL'], 'string', 'max' => 255],
            [['LOGIN'], 'unique'],
            [
                ['TYPE_ID'],
                'exist',
                'skipOnError' => true,
                'targetClass' => UserTypes::className(),
                'targetAttribute' => ['TYPE_ID' => 'ID']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'LOGIN' => 'Логин',
            'PASSWORD' => 'Пароль',
            'TYPE_ID' => 'тип пользователя fk user_types.id',
            'EMAIL' => 'Почта',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(UserTypes::className(), ['ID' => 'TYPE_ID']);
    }

    /**
     * {@inheritdoc}
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }

    /** @inheritDoc */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /** @inheritDoc */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new Exception('Not implemented');
    }

    /** @inheritDoc */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /** @inheritDoc */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }


    /** @inheritDoc */
    public function getId()
    {
        return $this->ID;
    }

    /**
     * проверка пароля
     * @param $username
     * @param $password
     * @return bool
     */
    public static function checkPassword($username, $password)
    {
        $user = Users::find()->cache(300)->andWhere(['LOGIN' => $username])->one();
        if ($user && Yii::$app->getSecurity()->validatePassword($password, $user->PASSWORD)) {
            return true;
        }
        return false;
    }

    /** создание пароля
     * @param string $password
     * @throws Exception
     */
    public function setPassword($password)
    {
        $this->PASSWORD = Yii::$app->getSecurity()->generatePasswordHash($password);
    }


    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->authKey = Yii::$app->security->generateRandomString();
    }
}
