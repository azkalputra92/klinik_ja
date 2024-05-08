<?php

use common\models\RiwayatMedisPasien;
use yii\bootstrap5\Html;
use yii\helpers\Url;

return [

    [
        'class' => 'kartik\grid\SerialColumn',
        'header' => 'No',
        'width' => '50px',
    ],

    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Nama Pasien<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'nama_pasien',
        'vAlign' => 'middle',
        'encodeLabel' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Umur<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'umur_pasien',
        'vAlign' => 'middle',
        'encodeLabel' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label' => 'Jenis Kelamin<i class="icofont icofont-sort-alt"></i>',
        'attribute'=>'jenis_kelamin',
        'vAlign' => 'middle',
        'encodeLabel' => false,
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
    //     'class'=>'\kartik\grid\DataColumn',
    //     'label' => 'created_by<i class="icofont icofont-sort-alt"></i>',
    //     'attribute'=>'created_by',
    //     'vAlign' => 'middle',
    //     'encodeLabel' => false,
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'label' => 'updated_by<i class="icofont icofont-sort-alt"></i>',
    //     'attribute'=>'updated_by',
    //     'vAlign' => 'middle',
    //     'encodeLabel' => false,
    // ],

    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => '',
        'width' => '300px',
        'template' => '{rekam_medis}{edit}{delete}',
        'buttons' => [
            "edit" => function ($url, $model, $key) {
                return Html::a('<span class="material-symbols-outlined align-middle fs-18">edit_square</span>', ['update', 'id' => $model->id], [
                    'class' => 'btn btn-warning btn-icon waves-effect waves-light me-2',
                    'role' => 'modal-remote',
                    'title' => 'Edit',
                    'data-toggle' => 'tooltip'
                ]);
            },
            "delete" => function ($url, $model, $key) {
                return Html::a('<span class="material-symbols-outlined align-middle fs-18">delete</span>', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger btn-icon waves-effect waves-light me-2',
                    'role' => 'modal-remote', 'title' => 'Hapus',
                    'data-confirm' => false, 'data-method' => false, // for overide yii data api
                    'data-request-method' => 'post',
                    'data-toggle' => 'tooltip',
                    'data-confirm-title' => 'Anda Yakin?',
                    'data-confirm-message' => 'Apakah Anda yakin akan menghapus data ini?'
                    ]);
            },
            "rekam_medis" => function ($url, $model, $key) {
                if(RiwayatMedisPasien::findOne(['id_pasien' => $model->id])) {
                    return Html::a('<span class="material-symbols-outlined align-middle fs-18">more_vert</span>', ['/riwayat-medis-pasien/view', 'id_pasien' => $model->id], [
                        'class' => 'btn btn-info btn-icon waves-effect waves-light me-2',
                        'role' => 'modal-remote',
                        'title' => 'Lihat',
                        'data-toggle' => 'tooltip'
                    ]);
                }
                return Html::a('<span class="material-symbols-outlined align-middle fs-18">more_vert</span>', ['/riwayat-medis-pasien/create', 'id_pasien' => $model->id], [
                    'class' => 'btn btn-info btn-icon waves-effect waves-light me-2',
                    'role' => 'modal-remote',
                    'title' => 'Lihat',
                    'data-toggle' => 'tooltip'
                ]);
            },
        ]
    ],

];