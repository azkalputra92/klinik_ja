<?php

use yii\db\Migration;

/**
 * Class m250112_122607_gambar_produk_treatment
 */
class m250112_122607_gambar_produk_treatment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('produk', 'gambar', $this->integer());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250112_122607_gambar_produk_treatment cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250112_122607_gambar_produk_treatment cannot be reverted.\n";

        return false;
    }
    */
}
