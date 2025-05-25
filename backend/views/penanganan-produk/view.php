<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PenangananProduk */
?>
<div class="penanganan-produk-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                      'id',
          'id_penanganan',
          'id_pasien',
          'id_produk',
          'jumlah',
          'harga',
          'harga_total',
          'created_at',
          'updated_at',
          'created_by',
          'updated_by',
        ],
    ]) ?>

</div>