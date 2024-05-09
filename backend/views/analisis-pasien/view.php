<?php

use yii\bootstrap5\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AnalisisPasien */

$this->title = 'Detail Analisis';
?>
<div class="analisis-pasien-view">
    <?=
    Html::a(
        '<i data-feather="arrow-left"></i><span class = "ms-1">Kembali</span> ',
        ['index'],
        ['class' => 'sidebar-link sidebar-title d-flex align-items-center text-muted']
    );
    ?>
    <div class="card">
        <div class="card-header">
            <h4>Detail Hasil Analisis</h4>
        </div>
        <div class="card-body">
            <div class="row" style="margin-top: 15px;">
                <div class="col-lg-12 col-md-4 col-sm-12">
                    <p class="mb-1">Nama Pasien</p>
                    <p class="fw-bold"><?= $model->nama_pasien ?></p>
                </div>
                <div class="col-lg-12 col-md-4 col-sm-12">
                    <p class="mb-1">Umur Pasien</p>
                    <p class="fw-bold"><?= $model->umur_pasien ?></p>
                </div>
                <div class="col-lg-12 col-md-4 col-sm-12">
                    <p class="mb-1">Jenis Kelamin</p>
                    <p class="fw-bold"><?= $model->jenis_kelamin ?></p>
                </div>
                <div class="col-lg-12 col-md-4 col-sm-12">
                    <p class="mb-1">Alamat</p>
                    <p class="fw-bold"><?= $model->alamat ?></p>
                </div>
                <div class="col-lg-12 col-md-4 col-sm-12">
                    <p class="mb-1">Hasil</p>
                    <p class="fw-bold">Pasien Dinyatakan : <?= $model->hasil == 1 ? 'Positif'  : 'Negatif' ?></p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <table border='1' class="table table-bordered table-striped" style='font-size: 14px;'>
                    <thead>
                        <tr>
                            <th style="vertical-align: middle; ">Nilai</th>
                            <th style="vertical-align: middle;">Meriang</th>
                            <th style="vertical-align: middle;">Sakit Kepala</th>
                            <th style="vertical-align: middle;">Batuk</th>
                            <th style="vertical-align: middle;">Diare</th>
                            <th style="vertical-align: middle;">Nyeri Otot</th>
                            <th style="vertical-align: middle;">Mual</th>
                            <th style="vertical-align: middle;">Endemik</th>
                            <th style="vertical-align: middle;">Demam</th>
                            <th style="vertical-align: middle;">Keringat Dingin</th>
                            <th style="vertical-align: middle;">Dehidrasi</th>
                            <th style="vertical-align: middle;">Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center;">-</td>
                            <td style="text-align: center;"><?= Yii::$app->helper->getYaTidak($model->meriang) ?></td>
                            <td style="text-align: center;"><?= Yii::$app->helper->getYaTidak($model->sakit_kepala) ?></td>
                            <td style="text-align: center;"><?= Yii::$app->helper->getYaTidak($model->batuk) ?></td>
                            <td style="text-align: center;"><?= Yii::$app->helper->getYaTidak($model->diare) ?></td>
                            <td style="text-align: center;"><?= Yii::$app->helper->getYaTidak($model->nyeri_otot) ?></td>
                            <td style="text-align: center;"><?= Yii::$app->helper->getYaTidak($model->mual) ?></td>
                            <td style="text-align: center;"><?= Yii::$app->helper->getYaTidak($model->endemik) ?></td>
                            <td style="text-align: center;"><?= Yii::$app->helper->getYaTidak($model->demam) ?></td>
                            <td style="text-align: center;"><?= Yii::$app->helper->getYaTidak($model->keringat_dingin) ?></td>
                            <td style="text-align: center;"><?= Yii::$app->helper->getYaTidak($model->dehidrasi) ?></td>
                            <td style="text-align: center;">-</td>
                        </tr>
                        <?php foreach ($hasilAnalisis as $key => $hasil) :  ?>
                            <tr>
                                <td><?= $hasil->tipe == 1 ? 'Positif' : 'Negatif' ?></td>
                                <td><?= $hasil->meriang ?></td>
                                <td><?= $hasil->sakit_kepala ?></td>
                                <td><?= $hasil->batuk ?></td>
                                <td><?= $hasil->diare ?></td>
                                <td><?= $hasil->nyeri_otot ?></td>
                                <td><?= $hasil->mual ?></td>
                                <td><?= $hasil->endemik ?></td>
                                <td><?= $hasil->demam ?></td>
                                <td><?= $hasil->keringat_dingin ?></td>
                                <td><?= $hasil->dehidrasi ?></td>
                                <td><?= $hasil->hasil ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>