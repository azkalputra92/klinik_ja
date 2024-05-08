<?php

use yii\bootstrap5\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DpPenjualan*/

?>
<div class="dp-penjualan-view">
    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'label' => 'Nama Pasien',
                        'value' => $model->pasien->nama_pasien,
                    ],
                    [
                        'label' => 'Umur',
                        'value' => $model->pasien->umur_pasien,
                    ],
                    [
                        'label' => 'Jenis Kelamin',
                        'value' => $model->pasien->jenis_kelamin,
                    ],
                    [
                        'label' => 'Alamat',
                        'value' => $model->pasien->alamat,
                    ],
                    [
                        'label' => 'Gejala Meriang',
                        'value' => Yii::$app->helper->getYaTidak($model->meriang),
                    ],
                    [
                        'label' => 'Gejala Sakit Kepala',
                        'value' => Yii::$app->helper->getYaTidak($model->sakit_kepala),
                    ],
                    [
                        'label' => 'Gejala Batuk',
                        'value' => Yii::$app->helper->getYaTidak($model->batuk),
                    ],
                    [
                        'label' => 'Gejala Diare',
                        'value' => Yii::$app->helper->getYaTidak($model->diare),
                    ],
                    [
                        'label' => 'Gejala Nyeri Otot',
                        'value' => Yii::$app->helper->getYaTidak($model->nyeri_otot),
                    ],
                    [
                        'label' => 'Gejala Mual',
                        'value' => Yii::$app->helper->getYaTidak($model->mual),
                    ],
                    [
                        'label' => 'Gejala Endemik',
                        'value' => Yii::$app->helper->getYaTidak($model->endemik),
                    ],
                    [
                        'label' => 'Gejala Demam',
                        'value' => Yii::$app->helper->getYaTidak($model->demam),
                    ],
                    [
                        'label' => 'Gejala Keringat Dingin',
                        'value' => Yii::$app->helper->getYaTidak($model->keringat_dingin),
                    ],
                    [
                        'label' => 'Gejala Dehidrasi',
                        'value' => Yii::$app->helper->getYaTidak($model->dehidrasi),
                    ],
                    [
                        'label' => 'Hasil',
                        'format' => 'raw',
                        'value' => Yii::$app->helper->getPostifNegatif($model->hasil) ?? Html::a('Tambah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'role' => 'modal-remote']) ,
                    ],
                ],
                'options' => [
                    'class' => 'table table-borderless'
                ],
                'template' => '
                <tr>
                    <th class="text-muted fs-6" >{label}</th><td class = "fw-bold">{value}</td>
                </tr>
        ',
            ]) ?>
        </div>
    </div>
</div>