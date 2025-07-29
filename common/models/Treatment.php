<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "treatment".
 *
 * @property int $id
 * @property string|null $nama
 * @property string|null $prosedur
 * @property string|null $durasi
 * @property string|null $keterangan
 * @property float|null $harga
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Treatment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'treatment';
    }

    /**
     * {@inheritdoc}
     */
    public $file;
    public function rules()
    {
        return [
            [[ 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [[ 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['keterangan'], 'string'],
            [['harga'], 'number'],
            [['gambar','link'], 'safe'],
            [['nama', 'prosedur', 'durasi'], 'string', 'max' => 255],
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
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            
            'nama' => 'Nama',
            'prosedur' => 'Prosedur',
            'durasi' => 'Durasi',
            'keterangan' => 'Keterangan',
            'harga' => 'Harga',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
