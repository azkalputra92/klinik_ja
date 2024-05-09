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
        'label' => 'id_hasil_analisis<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'id_hasil_analisis',
        'vAlign' => 'middle',
        'encodeLabel' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'meriang<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'meriang',
        'vAlign' => 'middle',
        'encodeLabel' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'sakit_kepala<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'sakit_kepala',
        'vAlign' => 'middle',
        'encodeLabel' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'batuk<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'batuk',
        'vAlign' => 'middle',
        'encodeLabel' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'diare<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'diare',
        'vAlign' => 'middle',
        'encodeLabel' => false,
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label' => 'nyeri_otot<i class="icofont icofont-sort-alt"></i>',
        // 'attribute'=>'nyeri_otot',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label' => 'mual<i class="icofont icofont-sort-alt"></i>',
        // 'attribute'=>'mual',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label' => 'endemik<i class="icofont icofont-sort-alt"></i>',
        // 'attribute'=>'endemik',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label' => 'demam<i class="icofont icofont-sort-alt"></i>',
        // 'attribute'=>'demam',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label' => 'keringat_dingin<i class="icofont icofont-sort-alt"></i>',
        // 'attribute'=>'keringat_dingin',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label' => 'dehidrasi<i class="icofont icofont-sort-alt"></i>',
        // 'attribute'=>'dehidrasi',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label' => 'hasil<i class="icofont icofont-sort-alt"></i>',
        // 'attribute'=>'hasil',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],
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

    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => '',
        'template' => '{edit} {delete} {detail}',
        'buttons' => [
            "edit" => function ($url, $model, $key) {
                return Html::a('<span class="material-symbols-outlined align-middle fs-18">edit_square</span>', ['update', 'id' => $model->id], [
                    'class' => 'btn btn-warning btn-icon waves-effect waves-light',
                    'role' => 'modal-remote',
                    'title' => 'Edit',
                    'data-toggle' => 'tooltip'
                ]);
            },
            "delete" => function ($url, $model, $key) {
                return Html::a('<span class="material-symbols-outlined align-middle fs-18">delete</span>', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger btn-icon waves-effect waves-light',
                    'role' => 'modal-remote', 'title' => 'Hapus',
                    'data-confirm' => false, 'data-method' => false, // for overide yii data api
                    'data-request-method' => 'post',
                    'data-toggle' => 'tooltip',
                    'data-confirm-title' => 'Anda Yakin?',
                    'data-confirm-message' => 'Apakah Anda yakin akan menghapus data ini?'
                    ]);
            },
            "detail" => function ($url, $model, $key) {
                return Html::a('<span class="material-symbols-outlined align-middle fs-18">more_vert</span>', ['view', 'id' => $model->id], [
                    'class' => 'btn btn-info btn-icon waves-effect waves-light',
                    'role' => 'modal-remote',
                    'title' => 'Lihat',
                    'data-toggle' => 'tooltip'
                ]);
            },
        ]
    ],

];