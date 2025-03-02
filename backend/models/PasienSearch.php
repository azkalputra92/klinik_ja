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
            ['like', 'nama', $this->cari],
            ['like', 'jenis_kelamin', $this->cari],
            ['like', 'tempat_lahir', $this->cari],
            ['like', 'alamat', $this->cari],
            ['like', 'nomor_telepon', $this->cari],
            ['like', 'email', $this->cari],
            ['like', 'instagram', $this->cari],
            ['like', 'emergency_nama', $this->cari],
            ['like', 'emergency_nomor_telepon', $this->cari],
            ['like', 'info_ja', $this->cari],
            ['like', 'riwayat_perawatan', $this->cari],
            ['like', 'riwayat_penyakit', $this->cari],
            ['like', 'riwayat_obat', $this->cari],
            ['like', 'riwayat_alergi', $this->cari],
            ['like', 'keadaan_pasien', $this->cari],
            ['like', 'status', $this->cari],
        ]);
        // $query->andFilterWhere(['like', '', $this->cari]);
        $query->andFilterWhere(['between', 'tanggal', $this->tanggal_dari, $this->tanggal_sampai]);
        $query->andFilterWhere(['status_aktif' => $this->status_aktif]);
        return $dataProvider;
    }
}
