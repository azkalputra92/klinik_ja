<?php

use yii\bootstrap5\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AnalisisPasien */

$this->title = 'Detail Analisis';
?>
<a class="nav-link  mb-2" href="/analisis-pasien/index">
    <span class="material-symbols-outlined align-middle">
        keyboard_backspace
    </span>
    <span>Kembali</span>
</a>
<div class="analisis-pasien-view">
    <div class="card">
        <div class="card-header">
            <h4>Detail Hasil Analisis</h4>
        </div>
        <div class="card-body" style="padding-bottom: 0px;">
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
                    <?php if ($model->hasil == 1) : ?>
                        <p class="fw-bold" style="color:red">Pasien Dinyatakan : Positif </p>
                    <?php else : ?>
                        <p class="fw-bold">Pasien Dinyatakan : Negatif</p>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h4 style="padding-left: 0px; margin-bottom:0px">Data Medis</h4>
            <div class=" row p-2" style="padding-bottom: 0px;">
                <table border='1' class="table table-bordered table-striped" style='font-size: 14px;'>
                    <thead>
                        <tr>
                            <th style="vertical-align: middle; text-align: center;">Meriang</th>
                            <th style="vertical-align: middle; text-align: center;">Sakit Kepala</th>
                            <th style="vertical-align: middle; text-align: center;">Batuk</th>
                            <th style="vertical-align: middle; text-align: center;">Diare</th>
                            <th style="vertical-align: middle; text-align: center;">Nyeri Otot</th>
                            <th style="vertical-align: middle; text-align: center;">Mual</th>
                            <th style="vertical-align: middle; text-align: center;">Endemik</th>
                            <th style="vertical-align: middle; text-align: center;">Demam</th>
                            <th style="vertical-align: middle; text-align: center;">Keringat Dingin</th>
                            <th style="vertical-align: middle; text-align: center;">Dehidrasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
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
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row p-2">
                <h4 style="padding-left: 0px; ">Hasil Hitung Menggunakan Metode Naive Bayes</h4>
                <table border='1' class="table table-bordered table-striped" style='font-size: 14px;'>
                    <thead>
                        <tr>
                            <th style="vertical-align: middle;" rowspan="2">Nilai</th>
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
                            <th style="vertical-align: middle;" rowspan="2">Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
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