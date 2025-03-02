<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "obat".
 *
 * @property int $id
 * @property string|null $nama
 * @property string|null $keterangan
 * @property float|null $harga
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Obat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'obat';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [[ 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['keterangan'], 'string'],
            [['harga'], 'number'],
            [['gambar','url'], 'safe'],
            [['nama'], 'string', 'max' => 255],
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
            'keterangan' => 'Keterangan',
            'harga' => 'Harga',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => 'mdm\upload\UploadBehavior',
                'attribute' => 'file', // required, use to receive input file
                'savedAttribute' => 'gambar', // optional, use to link model with saved file.
                'uploadPath' => '@common/upload', // saved directory. default to '@runtime/upload'
                'autoSave' => true, // when true then uploaded file will be save before ActiveRecord::save()
                'autoDelete' => true, // when true then uploaded file will deleted before ActiveRecord::delete()
            ],
        ];
    }
}
