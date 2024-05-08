<?php

use yii\db\Migration;

/**
 * Class m240508_171939_add_data_user
 */
class m240508_171939_add_data_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', [
            'username' => 'admin',
            'auth_key' => 'GxetsgBGjTonwmlQIaeezu_nlomsZTa7',
            'password_hash' => '$2y$13$MJI5PQjI3/LUEKWWj3a0KeZZ.zj0/sjTqGgTSmaMdaX28NlSILMWK',
            'password_reset_token' => '123123123',
            'email' => 'admin@mail.co,',
            'status' => '10',
            'created_at' => time(),
            'updated_at' => time()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240508_171939_add_data_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240508_171939_add_data_user cannot be reverted.\n";

        return false;
    }
    */
}
