<?php

use yii\db\Migration;

class m170720_200508_init_relations extends Migration
{
    public function safeUp()
    {
        $this->addForeignKey("transaction_id_from_accounts","transactions","from_account_id","accounts", "id", "RESTRICT", "CASCADE");
        $this->addForeignKey("transaction_id_to_accounts","transactions", "to_account_id","accounts", "id", "RESTRICT", "CASCADE");
        $this->addForeignKey("account_to_currency","accounts", "currency_id","currencies", "id", "RESTRICT", "CASCADE" );
        $this->addForeignKey("account_to_user","accounts", "user_id","users", "id", "RESTRICT", "CASCADE");
    }

    public function safeDown()
    {
        $this->dropForeignKey("account_to_user", "transactions");
        $this->dropForeignKey("account_to_currency", "transactions");
        $this->dropForeignKey("transaction_id_to_accounts", "accounts");
        $this->dropForeignKey("transaction_id_from_accounts", "accounts");
    }
}
