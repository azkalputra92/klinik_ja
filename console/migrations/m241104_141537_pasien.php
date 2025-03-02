<?php

use yii\db\Migration;

/**
 * Class m241104_141537_pasien
 */
class m241104_141537_pasien extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pasien}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(),
            'jenis_kelamin' => $this->string(),
            'tempat_lahir' => $this->text(),
            'tanggal_lahir' => $this->date(),
            'alamat' => $this->text(),
            'nomor_telepon' => $this->string(),
            'email' => $this->string(),
            'instagram' => $this->string(),
            'instagram' => $this->string(),
            'emergency_nama' => $this->string(),
            'emergency_nomor_telepon' => $this->string(),
            'info_ja' => $this->text(),
            'riwayat_perawatan' => $this->text(),
            'riwayat_penyakit' => $this->text(),
            'riwayat_obat' => $this->text(),
            'riwayat_alergi' => $this->text(),
            'keadaan_pasien' => $this->text(),
            'status' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241104_141537_pasien cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241104_141537_pasien cannot be reverted.\n";

        return false;
    }
    */
}
