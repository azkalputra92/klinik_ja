<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "penanganan_obat".
 *
 * @property int $id
 * @property int|null $id_penanganan
 * @property int|null $id_pasien
 * @property int|null $id_obat
 * @property int|null $jumlah
 * @property float|null $harga
 * @property float|null $harga_total
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class PenangananObat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penanganan_obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_penanganan', 'id_pasien', 'id_obat', 'jumlah', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['id_penanganan', 'id_pasien', 'id_obat', 'jumlah', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['harga', 'harga_total'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_penanganan' => 'Penanganan',
            'id_pasien' => 'Pasien',
            'id_obat' => 'Obat',
            'jumlah' => 'Jumlah',
            'harga' => 'Harga',
            'harga_total' => 'Harga Total',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
    public function getPenanganan()
    {
        return Penanganan::find()->where(['id'=>$this->id_penanganan])->one();
    }
    public function getObat()
    {
        return Obat::find()->where(['id'=>$this->id_obat])->one();
    }
    public function getListObat()
    {
        return Obat::find()->all();
    }
    public function beforeSave($insert)
    {
        $this->harga = $this->obat->harga;
        $this->harga_total = $this->harga * $this->jumlah;

        return parent::beforeSave($insert);
    }
}
