<?php

use yii\db\Migration;

/**
 * Class m191125_160245_INGREDIENTS_LIST
 */
class m191125_160245_INGREDIENTS_LIST extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('INGREDIENTS_LIST', [
            'ID' => $this->primaryKey(),
            'NAME' => $this->string()->unique()->notNull(),
            'UNIT_ID' => $this->integer()->notNull(),
            'PRICE' => $this->integer()->notNull(),
        ]);

        $this->addCommentOnTable('INGREDIENTS_LIST', 'Ингридиенты');
        $this->addCommentOnColumn('INGREDIENTS_LIST', 'ID', 'ID');
        $this->addCommentOnColumn('INGREDIENTS_LIST', 'NAME', 'Наименование');
        $this->addCommentOnColumn(
            'INGREDIENTS_LIST',
            'UNIT_ID',
            'ID единицы измерения fk unit_types_ID'
        );
        $this->addCommentOnColumn('INGREDIENTS_LIST', 'PRICE', 'цена');

        $this->addForeignKey('FK_UNIT_ID', 'INGREDIENTS_LIST', 'UNIT_ID', 'UNIT_TYPES', 'ID');
        $this->alterColumn('INGREDIENTS_LIST', 'ID', $this->integer() . ' NOT NULL AUTO_INCREMENT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191125_160245_INGREDIENTS_LIST cannot be reverted.\n";

        return false;
    }
}
