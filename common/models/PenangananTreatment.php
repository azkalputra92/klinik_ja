<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "penanganan_treatment".
 *
 * @property int $id
 * @property int|null $id_penanganan
 * @property int|null $id_pasien
 * @property int|null $id_treatment
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class PenangananTreatment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penanganan_treatment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_penanganan', 'id_pasien', 'id_treatment', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['id_penanganan', 'id_pasien', 'id_treatment', 'created_at', 'updated_at', 'created_by', 'updated_by','harga'], 'integer'],
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
            'id_treatment' => 'Treatment',
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
    public function getTreatment()
    {
        return Treatment::find()->where(['id'=>$this->id_treatment])->one();
    }
    public function getListTreatment()
    {
        return Treatment::find()->all();
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
