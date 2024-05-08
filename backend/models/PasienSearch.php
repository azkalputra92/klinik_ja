<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pasien;

/**
 * PasienSearch represents the model behind the search form about `common\models\Pasien`.
 */
class PasienSearch extends Pasien
{
    public $cari;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'umur_pasien', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['nama_pasien', 'jenis_kelamin'], 'safe'],
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
        $query = Pasien::find();

        $this->load($params);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
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
            // ['id' => $cari_angka],
            ['ilike', 'nama_pasien', $this->cari],
            // ['ilike', 'jenis_kelamin', $this->cari],
        ]);
        // $query->andFilterWhere(['ilike', '', $this->cari]);
        return $dataProvider;
    }
}
