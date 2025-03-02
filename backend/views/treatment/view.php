<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Treatment */
?>
<div class="treatment-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                      'id',
          
          'nama',
          'prosedur',
          'durasi',
          'keterangan:ntext',
          'harga',
          'created_at',
          'updated_at',
          'created_by',
          'updated_by',
        ],
    ]) ?>

</div>