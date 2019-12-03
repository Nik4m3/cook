<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Class m191130_063128_NOTES
 */
class m191130_063128_NOTES extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('NOTES', [
            'ID' => $this->primaryKey(),
            'DATE' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'VALUE' => $this->string()->notNull(),
            'PRODUCT_ID' => $this->integer()
        ]);

        $this->addCommentOnTable('NOTES', 'Заметки');
        $this->addCommentOnColumn('NOTES', 'ID', 'ID');
        $this->addCommentOnColumn('NOTES', 'VALUE', 'Текст');
        $this->addCommentOnColumn('NOTES', 'PRODUCT_ID', 'ссылка на продукт');

        $this->addForeignKey('FK_PRODUCT_ID_NOTES', 'NOTES', 'PRODUCT_ID', 'PRODUCT', 'ID', 'CASCADE');

        $this->alterColumn('NOTES', 'ID', $this->integer() . ' NOT NULL AUTO_INCREMENT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191130_063128_NOTES cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191130_063128_NOTES cannot be reverted.\n";

        return false;
    }
    */
}
