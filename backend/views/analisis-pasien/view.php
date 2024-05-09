<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AnalisisPasien */
?>
<div class="analisis-pasien-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                      'id',
          'id_pasien',
          'nama_pasien',
          'umur_pasien',
          'jenis_kelamin',
          'alamat:ntext',
          'meriang',
          'sakit_kepala',
          'batuk',
          'diare',
          'nyeri_otot',
          'mual',
          'endemik',
          'demam',
          'keringat_dingin',
          'dehidrasi',
          'hasil',
          'created_at',
          'updated_at',
          'created_by',
          'updated_by',
        ],
    ]) ?>

</div>