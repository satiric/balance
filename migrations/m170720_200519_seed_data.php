<?php

use yii\db\Migration;

class m170720_200519_seed_data extends Migration
{
    public function safeUp()
    {
        $this->insert("currencies",["iso_code" => "USD", "code"=>"usd", "title" => "Dollar USA", "symbol"=>"$"]);
    }

    public function safeDown()
    {
        echo "m170720_200519_seed_data cannot be reverted: can be restricted by constraints. Please, delete it manually.\n";

        return false;
        //$this->delete("currencies", ["iso_code" => "USD", "code"=>"usd", "title" => "Dollar USA", "symbol"=>"$"]);
    }


}
