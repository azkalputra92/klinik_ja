<?php
use yii\bootstrap5\Html;
use yii\helpers\Url;

return [

    [
        'class' => 'kartik\grid\SerialColumn',
        'header' => 'No',
        'width' => '30px',
    ],

    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'id_pasien<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'id_pasien',
        'vAlign' => 'middle',
        'encodeLabel' => false,
        
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Meriang<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'meriang',
        'vAlign' => 'middle',
        'encodeLabel' => false,
        'value' => function ($model) {
            return Yii::$app->helper->getYaTidak($model->meriang);
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Sakit Kepala<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'sakit_kepala',
        'vAlign' => 'middle',
        'encodeLabel' => false,
        'value' => function ($model) {
            return Yii::$app->helper->getYaTidak($model->sakit_kepala);
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Batuk<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'batuk',
        'vAlign' => 'middle',
        'encodeLabel' => false,
        'value' => function ($model) {
            return Yii::$app->helper->getYaTidak($model->batuk);
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Diari<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'diare',
        'vAlign' => 'middle',
        'encodeLabel' => false,
        'value' => function ($model) {
            return Yii::$app->helper->getYaTidak($model->diare);
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Nyeri Otot<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'nyeri_otot',
        'vAlign' => 'middle',
        'encodeLabel' => false,
        'value' => function ($model) {
            return Yii::$app->helper->getYaTidak($model->nyeri_otot);
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Mual<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'mual',
        'vAlign' => 'middle',
        'encodeLabel' => false,
        'value' => function ($model) {
            return Yii::$app->helper->getYaTidak($model->mual);
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Endemik<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'endemik',
        'vAlign' => 'middle',
        'encodeLabel' => false,
        'value' => function ($model) {
            return Yii::$app->helper->getYaTidak($model->endemik);
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Demam<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'demam',
        'vAlign' => 'middle',
        'encodeLabel' => false,
        'value' => function ($model) {
            return Yii::$app->helper->getYaTidak($model->demam);
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Keringat Dingin<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'keringat_dingin',
        'vAlign' => 'middle',
        'encodeLabel' => false,
        'value' => function ($model) {
            return Yii::$app->helper->getYaTidak($model->keringat_dingin);
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Dehidrasi<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'dehidrasi',
        'vAlign' => 'middle',
        'encodeLabel' => false,
        'value' => function ($model) {
            return Yii::$app->helper->getYaTidak($model->dehidrasi);
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Hasil<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'hasil',
        'vAlign' => 'middle',
        'encodeLabel' => false,
        'value' => function ($model) {
            return Yii::$app->helper->getYaTidak($model->hasil);
        }
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'created_at',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'updated_at',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label' => 'created_by<i class="icofont icofont-sort-alt"></i>',
        // 'attribute'=>'created_by',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label' => 'updated_by<i class="icofont icofont-sort-alt"></i>',
        // 'attribute'=>'updated_by',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],

    // [
    //     'class' => 'kartik\grid\ActionColumn',
    //     'header' => '',
    //     'template' => '{edit} {delete} {detail}',
    //     'buttons' => [
    //         "edit" => function ($url, $model, $key) {
    //             return Html::a('<span class="material-symbols-outlined align-middle fs-18">edit_square</span>', ['update', 'id' => $model->id], [
    //                 'class' => 'btn btn-warning btn-icon waves-effect waves-light',
    //                 'role' => 'modal-remote',
    //                 'title' => 'Edit',
    //                 'data-toggle' => 'tooltip'
    //             ]);
    //         },
    //         "delete" => function ($url, $model, $key) {
    //             return Html::a('<span class="material-symbols-outlined align-middle fs-18">delete</span>', ['delete', 'id' => $model->id], [
    //                 'class' => 'btn btn-danger btn-icon waves-effect waves-light',
    //                 'role' => 'modal-remote', 'title' => 'Hapus',
    //                 'data-confirm' => false, 'data-method' => false, // for overide yii data api
    //                 'data-request-method' => 'post',
    //                 'data-toggle' => 'tooltip',
    //                 'data-confirm-title' => 'Anda Yakin?',
    //                 'data-confirm-message' => 'Apakah Anda yakin akan menghapus data ini?'
    //                 ]);
    //         },
    //         "detail" => function ($url, $model, $key) {
    //             return Html::a('<span class="material-symbols-outlined align-middle fs-18">more_vert</span>', ['view', 'id' => $model->id], [
    //                 'class' => 'btn btn-info btn-icon waves-effect waves-light',
    //                 'role' => 'modal-remote',
    //                 'title' => 'Lihat',
    //                 'data-toggle' => 'tooltip'
    //             ]);
    //         },
    //     ]
    // ],

];