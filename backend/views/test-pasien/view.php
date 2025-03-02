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
          'nama',
          'jenis_kelamin',
          'tempat_lahir:ntext',
          'tanggal_lahir',
          'alamat:ntext',
          'nomor_telepon',
          'email:email',
          'instagram',
          'emergency_nama',
          'emergency_nomor_telepon',
          'info_ja:ntext',
          'riwayat_perawatan:ntext',
          'riwayat_penyakit:ntext',
          'riwayat_obat:ntext',
          'riwayat_alergi:ntext',
          'keadaan_pasien:ntext',
          'status',
        ],
    ]) ?>

</div>