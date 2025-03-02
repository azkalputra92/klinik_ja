<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int $id
 * @property string|null $nama
 * @property string|null $jenis_kelamin
 * @property string|null $tempat_lahir
 * @property string|null $tanggal_lahir
 * @property string|null $alamat
 * @property string|null $nomor_telepon
 * @property string|null $email
 * @property string|null $instagram
 * @property string|null $emergency_nama
 * @property string|null $emergency_nomor_telepon
 * @property string|null $info_ja
 * @property string|null $riwayat_perawatan
 * @property string|null $riwayat_penyakit
 * @property string|null $riwayat_obat
 * @property string|null $riwayat_alergi
 * @property string|null $keadaan_pasien
 * @property string|null $status
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tempat_lahir', 'alamat', 'info_ja', 'riwayat_perawatan', 'riwayat_penyakit', 'riwayat_obat', 'riwayat_alergi', 'keadaan_pasien'], 'string'],
            [['tanggal_lahir'], 'safe'],
            [['nama', 'jenis_kelamin', 'nomor_telepon', 'email', 'instagram', 'emergency_nama', 'emergency_nomor_telepon', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'nomor_telepon' => 'Nomor Telepon',
            'email' => 'Email',
            'instagram' => 'Instagram',
            'emergency_nama' => 'Emergency Nama',
            'emergency_nomor_telepon' => 'Emergency Nomor Telepon',
            'info_ja' => 'Info Ja',
            'riwayat_perawatan' => 'Riwayat Perawatan',
            'riwayat_penyakit' => 'Riwayat Penyakit',
            'riwayat_obat' => 'Riwayat Obat',
            'riwayat_alergi' => 'Riwayat Alergi',
            'keadaan_pasien' => 'Keadaan Pasien',
            'status' => 'Status',
        ];
    }
}
