<?php

use yii\db\Migration;

/**
 * Class m240508_173837_add_column_pasien
 */
class m240508_173837_add_column_pasien extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('pasien' , 'alamat' , $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240508_173837_add_column_pasien cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240508_173837_add_column_pasien cannot be reverted.\n";

        return false;
    }
    */
}
