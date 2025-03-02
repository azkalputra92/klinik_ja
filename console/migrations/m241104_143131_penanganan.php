<?php

use yii\db\Migration;

/**
 * Class m241104_143131_penanganan
 */
class m241104_143131_penanganan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%penanganan}}', [
            'id' => $this->primaryKey(),
            'id_pasien' => $this->integer(),
            'tanggal' => $this->date(),
            'status' => $this->string(),
            'harga_total' => $this->decimal(16,2),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);
        $this->createTable('{{%penanganan_pegawai}}', [
            'id' => $this->primaryKey(),
            'id_pegawai' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);
        $this->createTable('{{%penanganan_treatment}}', [
            'id' => $this->primaryKey(),
            'id_penanganan' => $this->integer(),
            'id_pasien' => $this->integer(),
            'id_treatment' => $this->integer(),
            'harga' => $this->decimal(16,2),
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
        echo "m241104_143131_penanganan cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241104_143131_penanganan cannot be reverted.\n";

        return false;
    }
    */
}
