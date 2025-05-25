<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "penanganan_produk".
 *
 * @property int $id
 * @property int|null $id_penanganan
 * @property int|null $id_pasien
 * @property int|null $id_produk
 * @property int|null $jumlah
 * @property float|null $harga
 * @property float|null $harga_total
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class PenangananProduk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penanganan_produk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_penanganan', 'id_pasien', 'id_produk', 'jumlah', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['id_penanganan', 'id_pasien', 'id_produk', 'jumlah', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
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
            'id_produk' => 'Produk',
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
    public function getProduk()
    {
        return Produk::find()->where(['id'=>$this->id_produk])->one();
    }
    public function getListProduk()
    {
        return Produk::find()->all();
    }
    public function beforeSave($insert)
    {
        $this->harga = $this->produk->harga;
        $this->harga_total = $this->harga * $this->jumlah;

        return parent::beforeSave($insert);
    }
    public function afterSave($insert, $changedAttributes)
    {
        $this->penanganan->setHitungTotal();   
    }
    public function beforeDelete()
    {
        $this->penanganan->setHitungTotal();
        return parent::beforeDelete();
    }
}
