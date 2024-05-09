<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\HasilAnalisisPasien;

/**
 * HasilAnalisisPasienSearch represents the model behind the search form about `common\models\HasilAnalisisPasien`.
 */
class HasilAnalisisPasienSearch extends HasilAnalisisPasien
{
    public $cari;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_hasil_analisis', 'meriang', 'sakit_kepala', 'batuk', 'diare', 'nyeri_otot', 'mual', 'endemik', 'demam', 'keringat_dingin', 'dehidrasi', 'hasil', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            ['cari', 'safe'],
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
        $query = HasilAnalisisPasien::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

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
            ['id_hasil_analisis' => $cari_angka],
            ['meriang' => $cari_angka],
            ['sakit_kepala' => $cari_angka],
            ['batuk' => $cari_angka],
            ['diare' => $cari_angka],
            ['nyeri_otot' => $cari_angka],
            ['mual' => $cari_angka],
            ['endemik' => $cari_angka],
            ['demam' => $cari_angka],
            ['keringat_dingin' => $cari_angka],
            ['dehidrasi' => $cari_angka],
            ['hasil' => $cari_angka],
            ['created_at' => $cari_angka],
            ['updated_at' => $cari_angka],
            ['created_by' => $cari_angka],
            ['updated_by' => $cari_angka],
            
        ]);
        // $query->andFilterWhere(['ilike', '', $this->cari]);
        return $dataProvider;
    }
}
