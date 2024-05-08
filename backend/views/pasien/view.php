<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pasien */
?>
<div class="pasien-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                      'id',
          'nama_pasien',
          'umur_pasien',
          'jenis_kelamin',
          'created_at',
          'updated_at',
          'created_by',
          'updated_by',
        ],
    ]) ?>

</div>