<?php

use yii\db\Migration;

/**
 * Class m191125_160308_product
 */
class m191125_160308_PRODUCT extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('PRODUCT', [
            'ID' => $this->primaryKey(),
            'NAME' => $this->string()->notNull(),
            'MARGIN' => $this->integer()->notNull()->defaultValue(0)
        ]);

        $this->addCommentOnTable('PRODUCT', 'Продукт');
        $this->addCommentOnColumn('PRODUCT', 'ID', 'ID');
        $this->addCommentOnColumn('PRODUCT', 'NAME', 'наименование');
        $this->addCommentOnColumn('PRODUCT', 'MARGIN', 'надбавка за продукт');

        $this->alterColumn('PRODUCT', 'ID', $this->integer() . ' NOT NULL AUTO_INCREMENT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191125_160308_PRODUCT cannot be reverted.\n";

        return false;
    }
}
