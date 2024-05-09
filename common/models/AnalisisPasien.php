<?php

namespace common\models;

use Exception;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "analisis_pasien".
 *
 * @property int $id
 * @property int|null $id_pasien
 * @property string|null $nama_pasien
 * @property int|null $umur_pasien
 * @property string|null $jenis_kelamin
 * @property string|null $alamat
 * @property int|null $meriang
 * @property int|null $sakit_kepala
 * @property int|null $batuk
 * @property int|null $diare
 * @property int|null $nyeri_otot
 * @property int|null $mual
 * @property int|null $endemik
 * @property int|null $demam
 * @property int|null $keringat_dingin
 * @property int|null $dehidrasi
 * @property int|null $hasil
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class AnalisisPasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'analisis_pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasien', 'umur_pasien', 'meriang', 'sakit_kepala', 'batuk', 'diare', 'nyeri_otot', 'mual', 'endemik', 'demam', 'keringat_dingin', 'dehidrasi', 'hasil', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['id_pasien', 'umur_pasien', 'meriang', 'sakit_kepala', 'batuk', 'diare', 'nyeri_otot', 'mual', 'endemik', 'demam', 'keringat_dingin', 'dehidrasi', 'hasil', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['nama_pasien', 'jenis_kelamin','alamat', 'umur_pasien', 'meriang', 'sakit_kepala', 'batuk', 'diare', 'nyeri_otot', 'mual', 'endemik', 'demam', 'keringat_dingin', 'dehidrasi', 'hasil', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['alamat'], 'string'],
            [['nama_pasien', 'jenis_kelamin'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pasien' => 'Id Pasien',
            'nama_pasien' => 'Nama Pasien',
            'umur_pasien' => 'Umur Pasien',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'meriang' => 'Meriang',
            'sakit_kepala' => 'Sakit Kepala',
            'batuk' => 'Batuk',
            'diare' => 'Diare',
            'nyeri_otot' => 'Nyeri Otot',
            'mual' => 'Mual',
            'endemik' => 'Endemik',
            'demam' => 'Demam',
            'keringat_dingin' => 'Keringat Dingin',
            'dehidrasi' => 'Dehidrasi',
            'hasil' => 'Hasil',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
    public function behaviors()
    {
        return [
            BlameableBehavior::class,
            TimestampBehavior::class,
        ];
    }

    public function hitungHasil()
    {
        if ($this->validate()) {
            $connection = Yii::$app->db;
            $transaction = $connection->beginTransaction();
            try {
                if (!$this->save()) {
                    throw new Exception("gagal simpan");
                }
                $query = RiwayatMedisPasien::find();
                $positif = 1;
                $negatif = 0;

                $jumlahData = $query->count();

                $sql = "
                SUM(CASE WHEN hasil = $positif THEN 1 ELSE 0 END) / $jumlahData as prob_positif,
                SUM(CASE WHEN hasil = $negatif THEN 1 ELSE 0 END) / $jumlahData as prob_negatif,

                SUM(CASE WHEN meriang = $this->meriang AND hasil = $positif THEN 1 ELSE 0 END) / $jumlahData as g1_positif,
                SUM(CASE WHEN sakit_kepala = $this->sakit_kepala AND hasil = $positif THEN 1 ELSE 0 END) / $jumlahData as g2_positif,
                SUM(CASE WHEN batuk = $this->batuk AND hasil = $positif  THEN 1 ELSE 0 END) / $jumlahData as g3_positif,
                SUM(CASE WHEN diare = $this->diare AND hasil = $positif  THEN 1 ELSE 0 END) / $jumlahData as g4_positif,
                SUM(CASE WHEN nyeri_otot = $this->nyeri_otot AND hasil = $positif  THEN 1 ELSE 0 END) / $jumlahData as g5_positif,
                SUM(CASE WHEN mual = $this->mual AND hasil = $positif  THEN 1 ELSE 0 END) / $jumlahData as g6_positif,
                SUM(CASE WHEN endemik = $this->endemik AND hasil = $positif  THEN 1 ELSE 0 END) / $jumlahData as g7_positif,
                SUM(CASE WHEN demam = $this->demam AND hasil = $positif  THEN 1 ELSE 0 END) / $jumlahData as g8_positif,
                SUM(CASE WHEN keringat_dingin = $this->keringat_dingin AND hasil = $positif  THEN 1 ELSE 0 END) / $jumlahData as g9_positif,
                SUM(CASE WHEN dehidrasi = $this->dehidrasi AND hasil = $positif  THEN 1 ELSE 0 END) / $jumlahData as g10_positif,

                SUM(CASE WHEN meriang = $this->meriang AND hasil = $negatif THEN 1 ELSE 0 END) / $jumlahData as g1_negatif,
                SUM(CASE WHEN sakit_kepala = $this->sakit_kepala AND hasil = $negatif THEN 1 ELSE 0 END) / $jumlahData as g2_negatif,
                SUM(CASE WHEN batuk = $this->batuk AND hasil = $negatif  THEN 1 ELSE 0 END) / $jumlahData as g3_negatif,
                SUM(CASE WHEN diare = $this->diare AND hasil = $negatif  THEN 1 ELSE 0 END) / $jumlahData as g4_negatif,
                SUM(CASE WHEN nyeri_otot = $this->nyeri_otot AND hasil = $negatif  THEN 1 ELSE 0 END) / $jumlahData as g5_negatif,
                SUM(CASE WHEN mual = $this->mual AND hasil = $negatif  THEN 1 ELSE 0 END) / $jumlahData as g6_negatif,
                SUM(CASE WHEN endemik = $this->endemik AND hasil = $negatif  THEN 1 ELSE 0 END) / $jumlahData as g7_negatif,
                SUM(CASE WHEN demam = $this->demam AND hasil = $negatif  THEN 1 ELSE 0 END) / $jumlahData as g8_negatif,
                SUM(CASE WHEN keringat_dingin = $this->keringat_dingin AND hasil = $negatif  THEN 1 ELSE 0 END) / $jumlahData as g9_negatif,
                SUM(CASE WHEN dehidrasi = $this->dehidrasi AND hasil = $negatif  THEN 1 ELSE 0 END) / $jumlahData as g10_negatif
                ";
                $hasilHitung = $query->select($sql)->asArray()->all();
                $hasilHitung = $hasilHitung[0];

                $hasilAnalisis = new HasilAnalisisPasien();
                $hasilAnalisis->id_hasil_analisis = $this->id;
                $hasilAnalisis->meriang = (float)$hasilHitung['g1_positif'];
                $hasilAnalisis->sakit_kepala = (float) $hasilHitung['g2_positif'];
                $hasilAnalisis->batuk = (float)$hasilHitung['g3_positif'];
                $hasilAnalisis->diare = (float)$hasilHitung['g4_positif'];
                $hasilAnalisis->nyeri_otot = (float) $hasilHitung['g5_positif'];
                $hasilAnalisis->mual = (float)$hasilHitung['g6_positif'];
                $hasilAnalisis->endemik = (float)$hasilHitung['g7_positif'];
                $hasilAnalisis->demam = (float)$hasilHitung['g8_positif'];
                $hasilAnalisis->keringat_dingin = (float)$hasilHitung['g9_positif'];
                $hasilAnalisis->dehidrasi = (float) $hasilHitung['g10_positif'];
                $hasilAnalisis->tipe = 1;

                $hasilAnalisis->hasil =
                    (($hasilAnalisis->meriang *
                        $hasilAnalisis->sakit_kepala *
                        $hasilAnalisis->batuk *
                        $hasilAnalisis->diare *
                        $hasilAnalisis->nyeri_otot *
                        $hasilAnalisis->mual *
                        $hasilAnalisis->endemik *
                        $hasilAnalisis->keringat_dingin *
                        $hasilAnalisis->dehidrasi) * 2) * (float)$hasilHitung['prob_positif'];

                $hasilAnalisis2 = new HasilAnalisisPasien();
                $hasilAnalisis2->id_hasil_analisis = $this->id;
                $hasilAnalisis2->meriang = (float)$hasilHitung['g1_negatif'];
                $hasilAnalisis2->sakit_kepala = (float) $hasilHitung['g2_negatif'];
                $hasilAnalisis2->batuk = (float) $hasilHitung['g3_negatif'];
                $hasilAnalisis2->diare = (float) $hasilHitung['g4_negatif'];
                $hasilAnalisis2->nyeri_otot = (float) $hasilHitung['g5_negatif'];
                $hasilAnalisis2->mual =  (float)$hasilHitung['g6_negatif'];
                $hasilAnalisis2->endemik =  (float)$hasilHitung['g7_negatif'];
                $hasilAnalisis2->demam = (float) $hasilHitung['g8_negatif'];
                $hasilAnalisis2->keringat_dingin = (float) $hasilHitung['g9_negatif'];
                $hasilAnalisis2->dehidrasi = (float) $hasilHitung['g10_negatif'];
                $hasilAnalisis2->tipe = 2;
                $hasilAnalisis2->hasil =
                    (($hasilAnalisis2->meriang *
                        $hasilAnalisis2->sakit_kepala *
                        $hasilAnalisis2->batuk *
                        $hasilAnalisis2->diare *
                        $hasilAnalisis2->nyeri_otot *
                        $hasilAnalisis2->mual *
                        $hasilAnalisis2->endemik *
                        $hasilAnalisis2->keringat_dingin *
                        $hasilAnalisis2->dehidrasi) * 2) * (float)$hasilHitung['prob_negatif'];

                $this->hasil = $hasilAnalisis->hasil > $hasilAnalisis2->hasil ? 1 : 0;

                if ($this->save() && $hasilAnalisis->save() && $hasilAnalisis2->save()) {
                    $transaction->commit();
                    return true;
                }
                throw new Exception("gagal simpan 2");
            } catch (\Exception $e) {
                $transaction->rollBack();
                throw $e;
            } catch (\Throwable $e) {
                $transaction->rollBack();
                throw $e;
            }
        }
        return false;
    }

    public function getHasilAnalisis()
    {
        return $this->hasMany(HasilAnalisisPasien::class, ['id_hasil_analisis' => 'id']);
    }
}
