<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "analisis_pasien".
 *
 * @property int $id
 * @property int|null $id_pasien
 * @property string|null $nama_pasien
 * @property int|null $umur_pasien
 * @property string|null $jenis_kelamin
 * @property string|null $alamat
 * @property int|null $meriang
 * @property int|null $sakit_kepala
 * @property int|null $batuk
 * @property int|null $diare
 * @property int|null $nyeri_otot
 * @property int|null $mual
 * @property int|null $endemik
 * @property int|null $demam
 * @property int|null $keringat_dingin
 * @property int|null $dehidrasi
 * @property int|null $hasil
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class AnalisisPasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'analisis_pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasien', 'umur_pasien', 'meriang', 'sakit_kepala', 'batuk', 'diare', 'nyeri_otot', 'mual', 'endemik', 'demam', 'keringat_dingin', 'dehidrasi', 'hasil', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['id_pasien', 'umur_pasien', 'meriang', 'sakit_kepala', 'batuk', 'diare', 'nyeri_otot', 'mual', 'endemik', 'demam', 'keringat_dingin', 'dehidrasi', 'hasil', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['alamat'], 'string'],
            [['nama_pasien', 'jenis_kelamin'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pasien' => 'Id Pasien',
            'nama_pasien' => 'Nama Pasien',
            'umur_pasien' => 'Umur Pasien',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'meriang' => 'Meriang',
            'sakit_kepala' => 'Sakit Kepala',
            'batuk' => 'Batuk',
            'diare' => 'Diare',
            'nyeri_otot' => 'Nyeri Otot',
            'mual' => 'Mual',
            'endemik' => 'Endemik',
            'demam' => 'Demam',
            'keringat_dingin' => 'Keringat Dingin',
            'dehidrasi' => 'Dehidrasi',
            'hasil' => 'Hasil',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
    public function behaviors()
    {
        return [
            BlameableBehavior::class,
            TimestampBehavior::class,
        ];
    }

    public function hitungHasil()
    {
        if ($this->validate()) {
            $connection = Yii::$app->db;
            $transaction = $connection->beginTransaction();
            try {
                
                

            } catch (\Exception $e) {
                $transaction->rollBack();
                throw $e;
            } catch (\Throwable $e) {
                $transaction->rollBack();
                throw $e;
            }
        }
        return false;
    }
}
