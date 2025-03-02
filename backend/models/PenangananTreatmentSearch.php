<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PenangananTreatment;

/**
 * PenangananTreatmentSearch represents the model behind the search form about `common\models\PenangananTreatment`.
 */
class PenangananTreatmentSearch extends PenangananTreatment
{
    public $cari;
    public $rowdata;
    public $tanggal_dari;
    public $tanggal_sampai;
    public $status_aktif;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_penanganan', 'id_pasien', 'id_treatment'], 'integer'],
            [['cari','rowdata','tanggal_dari', 'tanggal_sampai'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PenangananTreatment::find();
        
        $this->load($params);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => (!empty($this->rowdata)) ? $this->rowdata : 10,
            ],
        ]);


        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $cari_angka = '';
        if(is_numeric($this->cari)){
            $cari_angka = $this->cari;
        }

        $query->andFilterWhere(['or',
            ['id' => $cari_angka],
            ['id_penanganan' => $cari_angka],
            ['id_pasien' => $cari_angka],
            ['id_treatment' => $cari_angka],
            
        ]);
        // $query->andFilterWhere(['like', '', $this->cari]);
        $query->andFilterWhere(['between', 'tanggal', $this->tanggal_dari, $this->tanggal_sampai]);
        $query->andFilterWhere(['status_aktif' => $this->status_aktif]);
        return $dataProvider;
    }
}
