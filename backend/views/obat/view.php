<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Obat */
?>
<div class="obat-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
          'nama',
          'keterangan:ntext',
          'harga',
          'created_at',
          'updated_at',
          'created_by',
          'updated_by',
        ],
    ]) ?>

</div>