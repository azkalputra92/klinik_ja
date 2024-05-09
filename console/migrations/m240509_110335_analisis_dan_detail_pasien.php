<?php

use yii\db\Migration;

/**
 * Class m240509_110334_analisis_dan_detail_pasien
 */
class m240509_110335_analisis_dan_detail_pasien extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%analisis_pasien}}', [
            'id' => $this->primaryKey(),
            'id_pasien' => $this->integer(),
            'nama_pasien' => $this->string(),
            'umur_pasien' => $this->integer(),
            'jenis_kelamin' => $this->string(),
            'alamat' => $this->text(),
            'meriang' => $this->integer(),
            'sakit_kepala' => $this->integer(),
            'batuk' => $this->integer(),
            'diare' => $this->integer(),
            'nyeri_otot' => $this->integer(),
            'mual' => $this->integer(),
            'endemik' => $this->integer(),
            'demam' => $this->integer(),
            'keringat_dingin' => $this->integer(),
            'dehidrasi' => $this->integer(),
            'hasil' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        $this->createTable('{{%hasil_analisis_pasien}}', [
            'id' => $this->primaryKey(),
            'id_hasil_analisis' => $this->float(),
            'meriang' => $this->float(),
            'sakit_kepala' => $this->float(),
            'batuk' => $this->float(),
            'diare' => $this->float(),
            'nyeri_otot' => $this->float(),
            'mual' => $this->float(),
            'endemik' => $this->float(),
            'demam' => $this->float(),
            'keringat_dingin' => $this->float(),
            'dehidrasi' => $this->float(),
            'tipe' => $this->float(),
            'hasil' => $this->float(),
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
        echo "m240509_110334_analisis_dan_detail_pasien cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240509_110334_analisis_dan_detail_pasien cannot be reverted.\n";

        return false;
    }
    */
}
