<?php

use yii\db\Migration;

/**
 * Class m191124_182907_USER_TYPES
 */
class m191124_182907_USER_TYPES extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('USER_TYPES', [
            'ID' => $this->primaryKey(),
            'TYPE' => $this->string()->notNull(),
        ]);

        $this->addCommentOnTable('USER_TYPES', 'типы пользователей');
        $this->addCommentOnColumn('USER_TYPES', 'ID', 'id');
        $this->addCommentOnColumn('USER_TYPES', 'TYPE', 'тип пользователя');

        $this->alterColumn('USER_TYPES', 'ID', $this->integer() . ' NOT NULL AUTO_INCREMENT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191124_182907_USER_TYPES cannot be reverted.\n";

        return false;
    }
}
