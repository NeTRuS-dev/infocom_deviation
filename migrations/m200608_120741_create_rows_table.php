<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rows}}`.
 */
class m200608_120741_create_rows_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rows}}', [
            'id' => $this->primaryKey(),
            'value' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rows}}');
    }
}
