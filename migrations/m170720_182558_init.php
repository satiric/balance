<?php

use yii\db\Migration;

class m170720_182558_init extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->createTable('{{%transactions}}', [
            'id' => $this->primaryKey(),
            'from_account_id' => $this->integer()->notNull(),
            'to_account_id' => $this->integer()->notNull(),
            'amount' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%accounts}}', [
            'id' => $this->primaryKey(),
            'currency_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'balance' => $this->integer()->notNull()->defaultValue(0),
            'is_default' => $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);


        $this->createTable('{{%currencies}}', [
            'id' => $this->primaryKey(),
            'iso_code' => $this->string(4)->null()->defaultValue(null),
            'code' => $this->string(10)->notNull(),
            'title' => $this->string(4)->null()->defaultValue(null),
            'symbol' => $this->string(4)->null()->defaultValue(null)
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%currencies}}');
        $this->dropTable('{{%accounts}}');
        $this->dropTable('{{%transactions}}');
        $this->dropTable('{{%users}}');
    }
}
