<?php

use yii\db\Migration;

/**
 * Class m240508_174148_reset_seq
 */
class m240508_174148_reset_seq extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        \Yii::$app->db->createCommand()->resetSequence('pasien')->execute();
        \Yii::$app->db->createCommand()->resetSequence('riwayat_medis_pasien')->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240508_174148_reset_seq cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240508_174148_reset_seq cannot be reverted.\n";

        return false;
    }
    */
}
