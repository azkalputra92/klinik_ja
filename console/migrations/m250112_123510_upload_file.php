<?php

use yii\db\Migration;

/**
 * Class m250112_123510_upload_file
 */
class m250112_123510_upload_file extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%uploaded_file}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'filename' => $this->string(),
            'size' => $this->integer(),
            'type' => $this->string(64),
            ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250112_123510_upload_file cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250112_123510_upload_file cannot be reverted.\n";

        return false;
    }
    */
}
