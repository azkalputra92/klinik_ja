<?php

use yii\db\Migration;

/**
 * Class m240508_101121_create_import_data_pasien_dan_riwayat_pasien
 */
class m240508_101121_create_import_data_pasien_dan_riwayat_pasien extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pasien}}', [
            'id' => $this->primaryKey(),
            'nama_pasien' => $this->string(),
            'umur_pasien' => $this->integer(),
            'jenis_kelamin' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        $data = [
        ['Dani', 1, 'L'],
        ['padli sembiring', 2, 'L'],
        ['Ame', 2, 'P'],
        ['keysa', 3, 'P'],
        ['Nopita Sari', 3, 'P'],
        ['Kelvin', 4, 'L'],
        ['Adek', 5, 'P'],
        ['Erlita Br Tarigan', 5, 'P'],
        ['Firnando', 6, 'L'],
        ['Meutia Br Sitepu', 6, 'P'],
        ['Sakilah', 6, 'P'],
        ['Ame', 8, 'P'],
        ['Wanta', 8, 'L'],
        ['Serly', 9, 'P'],
        ['Tama', 9, 'L'],
        ['Jacson', 10, 'L'],
        ['Delta', 12, 'P'],
        ['Fiinondang Br Bangun', 12, 'P'],
        ['Aldo', 12, 'L'],
        ['Salsa liasna', 13, 'P'],
        ['Novita Sari', 14, 'P'],
        ['Deni Permana', 16, 'L'],
        ['Danta Purba', 16, 'L'],
        ['Edo', 17, 'L'],
        ['Intan', 17, 'P'],
        ['Sari', 17, 'P'],
        ['Rian', 18, 'L'],
        ['Dian', 18, 'P'],
        ['Emi', 18, 'P'],
        ['Roma Nuel', 19, 'L'],
        ['deniwati br ginting', 20, 'P'],
        ['Prada Dana Pratianta Sbr Pelaw', 22, 'L'],
        ['Prada Gonggom S Sidabuke', 22, 'L'],
        ['Prada Julius Ginting', 23, 'L'],
        ['Novalina', 23, 'P'],
        ['Pratu M. Zikri', 24, 'L'],
        ['Nando', 24, 'L'],
        ['Pratu A.F. Ritonga', 24, 'L'],
        ['Pratu Angga R', 24, 'L'],
        ['Pratu Bayu R', 24, 'L'],
        ['Serda T.F. Wibowo', 24, 'L'],
        ['Fariz Andrean', 25, 'L'],
        ['Pratu Rico Andrian', 25, 'L'],
        ['Pratu Srgle Safei Sihaloho', 25, 'L'],
        ['Pratu Eriwanto Sirait', 26, 'L'],
        ['Pratu Fidrik', 26, 'L'],
        ['Pratu Ganda', 26, 'L'],
        ['Pratu Nasa', 26, 'L'],
        ['Pratu sutomo', 26, 'L'],
        ['Reni Sri Rahayu Br Bangun', 26, 'P'],
        ['Lettu Inf. Agus Dani', 26, 'L'],
        ['Lettu Inf. J.F. Saragih', 26, 'L'],
        ['Praka Romi S', 26, 'L'],
        ['Praka Sadri', 26, 'L'],
        ['Praka Tony Syahputra', 27, 'L'],
        ['Pratu Ali Akbar Gultom', 27, 'L'],
        ['Pratu Doratea Sinaga', 27, 'L'],
        ['Daut Bangun', 27, 'L'],
        ['Praka Maki Saputra', 28, 'L'],
        ['Pratu Frans Situmorang', 28, 'L'],
        ['Pratu Jariyanto', 28, 'L'],
        ['Nia Melin', 28, 'P'],
        ['Dodi Prasetiawan', 29, 'L'],
        ['Praka Hotner P Lubis', 29, 'L'],
        ['Praka Riyandi', 29, 'L'],
        ['Praka Taufik Pramono', 29, 'L'],
        ['Alemina', 29, 'P'],
        ['Nehemia Purba', 29, 'L'],
        ['Lettu Inf Ahmad Kholid', 30, 'L'],
        ['Praka Dendri', 30, 'L'],
        ['Praka Deni', 30, 'L'],
        ['Praka Herianto Saragih', 30, 'L'],
        ['Praka Hery Prasetiyo', 30, 'L'],
        ['Praka Jordan Sembiring', 30, 'L'],
        ['Praka Nofri Hardi', 30, 'L'],
        ['Praka Nurul Setiawan', 30, 'L'],
        ['Pratu S.O Sihaloho', 30, 'L'],
        ['Fetrus', 30, 'L'],
        ['Prada Herza Antoni', 31, 'L'],
        ['Praka Cakra Irawan', 31, 'L'],
        ['Praka Deri Kurnia', 31, 'L'],
        ['Praka Hardian Suhendro', 31, 'L'],
        ['Praka Herdian Sihaloho', 31, 'L'],
        ['Praka Rido Irawan', 31, 'L'],
        ['Praka Sadri', 31, 'L'],
        ['Sertu Adiksyawanto', 31, 'L'],
        ['Kopda Marwaji Pradana', 33, 'L'],
        ['Kopda Sunarto', 33, 'L'],
        ['Kopda Doni Hendra', 34, 'L'],
        ['Bangku Seh Br Ginting', 34, 'P'],
        ['Jenda Malem Sukatendel', 35, 'P'],
        ['Sampe Tegoh', 35, 'L'],
        ['Martiana Br Sitepu', 35, 'P'],
        ['Saleh', 39, 'L'],
        ['Koptu Darmawanta Ginting', 40, 'L'],
        ['Lettu Inf. Agus Dani', 43, 'L'],
        ['Setai Budi Surbakti', 43, 'L'],
        ['budiman bangun', 45, 'L'],
        ['Diana', 46, 'P'],
        ['Rudianta Sinulingga', 46, 'L'],
        ['Johan Ketaren', 50, 'L'],
        ['Najarudin', 51, 'L'],
        ['Morina', 52, 'P'],
        ['Sekula', 55, 'L'],
        ['Manto', 56, 'L'],
        ['Marni', 56, 'P'],
        ['Setia Mimpin', 56, 'L'],
        ['Suwito', 58, 'L'],
        ['Suyanto', 68, 'L'],
        ['Muhammad', 72, 'L'],
        ];


        $this->batchInsert(
        'pasien', 
        ['nama_pasien', 'umur_pasien', 'jenis_kelamin'],
        $data);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240508_101121_create_import_data_pasien_dan_riwayat_pasien cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240508_101121_create_import_data_pasien_dan_riwayat_pasien cannot be reverted.\n";

        return false;
    }
    */
}
