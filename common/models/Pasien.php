<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "pasien".
 *
 * @property int $id
 * @property string|null $nama_pasien
 * @property int|null $umur_pasien
 * @property string|null $jenis_kelamin
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
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
            [['umur_pasien', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['umur_pasien', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['nama_pasien', 'jenis_kelamin'], 'string', 'max' => 255],
            [['alamat'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_pasien' => 'Nama Pasien',
            'umur_pasien' => 'Umur Pasien',
            'jenis_kelamin' => 'Jenis Kelamin',
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
