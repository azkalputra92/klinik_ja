<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Penanganan */
?>
<div class="penanganan-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                      'id',
          'id_pasien',
          'tanggal',
          'status',
          'created_at',
          'updated_at',
          'created_by',
          'updated_by',
        ],
    ]) ?>

</div>