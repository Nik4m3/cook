<?php

use yii\db\Migration;

/**
 * Class m191125_155541_UNIT_TYPES
 */
class m191125_155541_UNIT_TYPES extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('UNIT_TYPES', [
            'ID' => $this->primaryKey(),
            'NAME' => $this->string()->unique()->notNull(),
        ]);

        $this->addCommentOnTable('UNIT_TYPES', 'Типы единиц измерения');
        $this->addCommentOnColumn('UNIT_TYPES', 'ID', 'ID');
        $this->addCommentOnColumn('UNIT_TYPES', 'NAME', 'Имя единицы измерения');

        $this->alterColumn('UNIT_TYPES', 'ID', $this->integer() . ' NOT NULL AUTO_INCREMENT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191125_155541_UNIT_TYPES cannot be reverted.\n";

        return false;
    }
}
