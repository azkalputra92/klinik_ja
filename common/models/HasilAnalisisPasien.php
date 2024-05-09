<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "hasil_analisis_pasien".
 *
 * @property int $id
 * @property float|null $id_hasil_analisis
 * @property float|null $meriang
 * @property float|null $sakit_kepala
 * @property float|null $batuk
 * @property float|null $diare
 * @property float|null $nyeri_otot
 * @property float|null $mual
 * @property float|null $endemik
 * @property float|null $demam
 * @property float|null $keringat_dingin
 * @property float|null $dehidrasi
 * @property float|null $tipe
 * @property float|null $hasil
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class HasilAnalisisPasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hasil_analisis_pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hasil_analisis', 'meriang', 'sakit_kepala', 'batuk', 'diare', 'nyeri_otot', 'mual', 'endemik', 'demam', 'keringat_dingin', 'dehidrasi', 'tipe', 'hasil'], 'number'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_hasil_analisis' => 'Id Hasil Analisis',
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
            'tipe' => 'Tipe',
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
}
