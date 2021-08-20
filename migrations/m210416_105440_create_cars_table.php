<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cars}}`.
 */
class m210416_105440_create_cars_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cars', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'model' => $this->string(255)->notNull(),
            'description' => $this->string(500)->null(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cars}}');
    }
}
