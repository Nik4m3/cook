<?php

use yii\db\Migration;

/**
 * Class m911227_165354_utf8
 */
class m911227_165354_utf8 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $db =  Yii::$app->getDb();
        $tables = $db->createCommand('show tables')->queryAll();

        foreach ($tables as $table) {
            $tableName = $table['Tables_in_helperbase'];
            $db->createCommand("ALTER TABLE {$tableName} CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci")
                ->execute();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m911227_165354_utf8 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m911227_165354_utf8 cannot be reverted.\n";

        return false;
    }
    */
}
