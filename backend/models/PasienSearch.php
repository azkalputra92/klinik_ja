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
            [['id'], 'integer'],
            [['nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'nomor_telepon', 'email', 'instagram', 'emergency_nama', 'emergency_nomor_telepon', 'info_ja', 'riwayat_perawatan', 'riwayat_penyakit', 'riwayat_obat', 'riwayat_alergi', 'keadaan_pasien', 'status'], 'safe'],
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
        $query = Pasien::find();
        
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
            ['tanggal_lahir' => $cari_angka],
            ['ilike', 'nama', $this->cari],
            ['ilike', 'jenis_kelamin', $this->cari],
            ['ilike', 'tempat_lahir', $this->cari],
            ['ilike', 'alamat', $this->cari],
            ['ilike', 'nomor_telepon', $this->cari],
            ['ilike', 'email', $this->cari],
            ['ilike', 'instagram', $this->cari],
            ['ilike', 'emergency_nama', $this->cari],
            ['ilike', 'emergency_nomor_telepon', $this->cari],
            ['ilike', 'info_ja', $this->cari],
            ['ilike', 'riwayat_perawatan', $this->cari],
            ['ilike', 'riwayat_penyakit', $this->cari],
            ['ilike', 'riwayat_obat', $this->cari],
            ['ilike', 'riwayat_alergi', $this->cari],
            ['ilike', 'keadaan_pasien', $this->cari],
            ['ilike', 'status', $this->cari],
        ]);
        // $query->andFilterWhere(['ilike', '', $this->cari]);
        $query->andFilterWhere(['between', 'tanggal', $this->tanggal_dari, $this->tanggal_sampai]);
        $query->andFilterWhere(['status_aktif' => $this->status_aktif]);
        return $dataProvider;
    }
}
