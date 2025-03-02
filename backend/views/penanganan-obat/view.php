<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PenangananObat */
?>
<div class="penanganan-obat-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                      'id',
          'id_penanganan',
          'id_pasien',
          'id_obat',
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