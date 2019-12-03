<?php

use yii\db\Migration;

/**
 * Class m191124_183030_USERS
 */
class m191124_183030_USERS extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('USERS', [
            'ID' => $this->primaryKey(),
            'LOGIN' => $this->string()->unique()->notNull(),
            'PASSWORD' => $this->string()->notNull(),
            'TYPE_ID' => $this->integer()->defaultValue(3),
            'EMAIL' => $this->string()->notNull(),
        ]);

        $this->addCommentOnTable('USERS', 'пользователи');
        $this->addCommentOnColumn('USERS', 'ID', 'id');
        $this->addCommentOnColumn('USERS', 'LOGIN', 'Логин');
        $this->addCommentOnColumn('USERS', 'PASSWORD', 'Пароль');
        $this->addCommentOnColumn('USERS', 'TYPE_ID', 'тип пользователя fk user_types.id');
        $this->addCommentOnColumn('USERS', 'EMAIL', 'Почта');

        $this->addForeignKey('FK_TYPE', 'USERS', 'TYPE_ID', 'USER_TYPES', 'ID');
        $this->alterColumn('USERS', 'ID', $this->integer() . ' NOT NULL AUTO_INCREMENT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191124_183030_USERS cannot be reverted.\n";

        return false;
    }
}
