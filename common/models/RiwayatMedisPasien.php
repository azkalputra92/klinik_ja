<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "riwayat_medis_pasien".
 *
 * @property int $id
 * @property int|null $id_pasien
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
class RiwayatMedisPasien extends \yii\db\ActiveRecord
{
    public $prob_positif;
    public $prob_negatif;
    public $g1_positif;
    public $g2_positif;
    public $g3_positif;
    public $g4_positif;
    public $g5_positif;
    public $g6_positif;
    public $g7_positif;
    public $g8_positif;
    public $g9_positif;
    public $g10_positif;
    public $g1_negatif;
    public $g2_negatif;
    public $g3_negatif;
    public $g4_negatif;
    public $g5_negatif;
    public $g6_negatif;
    public $g7_negatif;
    public $g8_negatif;
    public $g9_negatif;
    public $g10_negatif;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'riwayat_medis_pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasien', 'meriang', 'sakit_kepala', 'batuk', 'diare', 'nyeri_otot', 'mual', 'endemik', 'demam', 'keringat_dingin', 'dehidrasi', 'hasil', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['id_pasien', 'meriang', 'sakit_kepala', 'batuk', 'diare', 'nyeri_otot', 'mual', 'endemik', 'demam', 'keringat_dingin', 'dehidrasi', 'hasil', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['id_pasien', 'meriang', 'sakit_kepala', 'batuk', 'diare', 'nyeri_otot', 'mual', 'endemik', 'demam', 'keringat_dingin', 'dehidrasi'], 'required'],
            [[
                'g1_positif', 'g2_positif', 'g3_positif', 'g4_positif', 'g5_positif', 'g6_positif', 'g7_positif', 'g8_positif', 'g9_positif', 'g10_positif',
                'g1_negatif', 'g2_negatif', 'g3_negatif', 'g4_negatif', 'g5_negatif', 'g6_negatif', 'g7_negatif', 'g8_negatif', 'g9_negatif', 'g10_negatif',
            ], 'safe'], // Semua atribut dinyatakan 'safe'
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
    public function getPasien()
    {
        return $this->hasOne(Pasien::class, ['id' => 'id_pasien']);
    }
}
