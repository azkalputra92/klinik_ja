<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PenangananTreatment */
?>
<div class="penanganan-treatment-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                      'id',
          'id_treatment',
        ],
    ]) ?>

</div>