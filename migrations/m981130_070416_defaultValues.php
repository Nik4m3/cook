<?php

use yii\db\Migration;

/**
 * Class m981130_070416_defaultValues
 */
class m981130_070416_defaultValues extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('USER_TYPES', ['TYPE' => 'admin']);
        $this->insert('USER_TYPES', ['TYPE' => 'super_user']);
        $this->insert('USER_TYPES', ['TYPE' => 'user']);

        $this->insert('USERS', [
            'LOGIN' => 'admin',
            'PASSWORD' => Yii::$app->getSecurity()->generatePasswordHash('admin'),
            'TYPE_ID' => 1,
            'EMAIL' => 'admin@mailru'
        ]);

        $this->insert('UNIT_TYPES', ['NAME' => 'кг']);
        $this->insert('UNIT_TYPES', ['NAME' => 'л']);
        $this->insert('UNIT_TYPES', ['NAME' => 'шт']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m981130_070416_defaultValues cannot be reverted.\n";

        return false;
    }

}
