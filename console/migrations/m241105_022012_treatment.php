<?php

use yii\db\Migration;

/**
 * Class m241105_022012_treatment
 */
class m241105_022012_treatment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%treatment}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(),
            'prosedur' => $this->string(),
            'durasi' => $this->string(),
            'keterangan' => $this->text(),
            'harga' => $this->decimal(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241105_022012_treatment cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241105_022012_treatment cannot be reverted.\n";

        return false;
    }
    */
}
