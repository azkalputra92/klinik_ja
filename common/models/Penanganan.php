<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "penanganan".
 *
 * @property int $id
 * @property int|null $id_pasien
 * @property string|null $tanggal
 * @property string|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Penanganan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penanganan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasien', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['id_pasien','harga_total', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['tanggal'], 'safe'],
            [['status'], 'string', 'max' => 255],
            [['status'], 'default', 'value' => 'Antrian'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pasien' => 'Pasien',
            'tanggal' => 'Tanggal',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
    public function getPasien()
    {
        return Pasien::find()->where(['id'=>$this->id_pasien])->one();
    }
    public function getListPasien()
    {
        return Pasien::find()->all();
    }

    public function setHitungTotal()
    {
        $obat = PenangananObat::find()->where(['id_penanganan'=>$this->id])->sum('harga');
        $treatment = PenangananTreatment::find()->where(['id_penanganan'=>$this->id])->sum('harga');

        $this->harga_total = $obat + $treatment;
        $this->save(); 
    }
}
