<?php

use yii\db\Migration;

/**
 * Class m241105_111300_produk
 */
class m241105_111300_produk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%penanganan_produk}}', [
            'id' => $this->primaryKey(),
            'id_penanganan' => $this->integer(),
            'id_pasien' => $this->integer(),
            'id_produk' => $this->integer(),
            'jumlah' => $this->integer(),
            'harga' => $this->decimal(),
            'harga_total' => $this->decimal(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);
        $this->createTable('{{%produk}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(),
            'keterangan' => $this->text(),
            'harga' => $this->decimal(),
            'url' => $this->text(),
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
        echo "m241105_111300_produk cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241105_111300_produk cannot be reverted.\n";

        return false;
    }
    */
}
