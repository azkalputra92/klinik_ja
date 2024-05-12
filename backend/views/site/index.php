<?php

/** @var yii\web\View $this */

use backend\assets\AppAsset;
use kartik\grid\GridView;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
use yii\helpers\Url;

$this->title = 'Naive Bayes';
AppAsset::register($this);
$this->registerJs("$('.modal-dialog').addClass('modal-dialog-centered')");

?>
<div class="card">
    <div class="card-body pt-3">
        <!-- Bordered Tabs -->

        <div class="penjelasan-index">
            <h2 class="card-title">Sistem SPK Identifikasi Penyakit Malaria - Naive Bayes</h2>
            <p class="small fst-italic">Naive Bayes adalah algoritma klasifikasi yang menggunakan asumsi sederhana bahwa semua fitur independen satu sama lain. Dalam analisis penyakit malaria,
                Naive Bayes dapat digunakan untuk memprediksi apakah seseorang menderita malaria berdasarkan gejala dan fitur lainnya dengan menghitung probabilitas posterior untuk setiap kelas dan memilih kelas dengan probabilitas tertinggi.</p>
        </div><!-- End Bordered Tabs -->

    </div>
</div>
<?php Modal::begin([
            "options" => [
                "id" => "ajaxCrudModal",
                "tabindex" => false // important for Select2 to work properly
            ],
            "id" => "ajaxCrudModal",
            "footer" => "", // always need it for jquery plugin
        ]) ?>
<?php Modal::end(); ?>