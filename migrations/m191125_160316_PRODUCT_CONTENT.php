<?php

use yii\db\Migration;

/**
 * Class PRODUCT_CONTENT
 */
class m191125_160316_PRODUCT_CONTENT extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('PRODUCT_CONTENT', [
            'ID' => $this->primaryKey(),
            'PRODUCT_ID' => $this->integer()->notNull(),
            'INGREDIENT_ID' => $this->integer()->notNull(),
            'COUNT' => $this->float()->notNull()
        ]);

        $this->addCommentOnTable('PRODUCT_CONTENT', 'пользователи');
        $this->addCommentOnColumn('PRODUCT_CONTENT', 'ID', 'ID');
        $this->addCommentOnColumn('PRODUCT_CONTENT', 'PRODUCT_ID', 'ID продукта');
        $this->addCommentOnColumn('PRODUCT_CONTENT', 'INGREDIENT_ID', 'ID ингридиента');
        $this->addCommentOnColumn('PRODUCT_CONTENT', 'COUNT', 'количество');

        $this->addForeignKey('FK_PRODUCT_ID', 'PRODUCT_CONTENT', 'PRODUCT_ID', 'PRODUCT', 'ID', 'CASCADE');
        $this->addForeignKey('FK_INGREDIENT_ID', 'PRODUCT_CONTENT', 'INGREDIENT_ID', 'INGREDIENTS_LIST', 'ID');
        $this->alterColumn('PRODUCT_CONTENT', 'ID', $this->integer() . ' NOT NULL AUTO_INCREMENT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "PRODUCT_CONTENT cannot be reverted.\n";

        return false;
    }
}
