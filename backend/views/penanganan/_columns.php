<?php
use yii\bootstrap5\Html;
use yii\helpers\Url;

return [

[
'class' => 'kartik\grid\SerialColumn',
'header' => 'No',
'width' => '30px',
'headerOptions' => ['style' => 'padding-left: 20px;'],
],

    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        // 'label'=> 'Id Pasien',
        'attribute'=>'pasien.nama',
        //'vAlign' => 'middle',
        'contentOptions' => ['style'=>'vertical-align: top;'],
        'encodeLabel' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        // 'label'=> 'Status',
        'attribute'=>'status',
        //'vAlign' => 'middle',
        'contentOptions' => ['style'=>'vertical-align: top;'],
        'encodeLabel' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        // 'label'=> 'Status',
        'attribute'=>'tanggal',
        //'vAlign' => 'middle',
        'contentOptions' => ['style'=>'vertical-align: top;'],
        'encodeLabel' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        // 'label'=> 'Status',
        'attribute'=>'harga_total',
        'format' => 'raw',
        'encodeLabel' => false,
        'value'=> function($model){
            return  number_format($model->harga_total);
        }
    ],

    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => '',
        // 'template' => '<div class="d-flex align-items-center w-100 gap-3 justify-content-center">{treatment}{penanganan}{}{}</div>',
        'template' => '{treatment}{obat}{penanganan}{edit}{delete}{print}',
        'width'=>'10%',
        'vAlign' => 'middle',
        'buttons' => [
        // "print" => function ($url, $model, $key) {
        //     if($model->status == 'Selesai'){
        //         return Html::a(
        //         'Print',
        //         ['#', 'id_penanganan' => $model->id],
        //         ['role' => 'modal-remote', 'title' => 'treatment', 'class' => 'btn btn-primary btn-block mb-2']
        //         );
        //     }
        // },
        "treatment" => function ($url, $model, $key) {
            if($model->status != 'Selesai' && $model->status != 'Selesai Treatment'){
                return Html::a(
                'Treatment',
                ['penanganan-treatment/index', 'id_penanganan' => $model->id],
                ['role' => 'modal-remote', 'title' => 'treatment', 'class' => 'btn btn-primary btn-block mb-2']
                );
            }
        },
        "obat" => function ($url, $model, $key) {
            if($model->status == 'Selesai Treatment'){
                return Html::a(
                'Beli Obat',
                ['penanganan-obat/index', 'id_penanganan' => $model->id],
                ['role' => 'modal-remote', 'title' => 'treatment', 'class' => 'btn btn-primary btn-block mb-2']
                );
            }
        },
        "penanganan" => function ($url, $model, $key) {
            if($model->status != 'Selesai'){
                return Html::a(
                    'Update Status',
                    ['update-status', 'id' => $model->id],
                    [
                        'class' => 'btn btn-primary btn-block mb-2',
                        'role' => 'modal-remote',
                        'title' => 'penanganan',
                        'data-confirm' => false,
                        'data-method' => false, // for overide yii data api
                        'data-request-method' => 'post',
                        'data-toggle' => 'tooltip',
                        'data-confirm-title' => 'Konfirmasi',
                        'data-confirm-ok' => 'Yakin',
                        'data-confirm-cancel' => 'Kembali',
                        'data-confirm-message' => 'Apakah anda yakin ingin update status?'
                    ]
                );
            }
        },
        "edit" => function ($url, $model, $key) {
            if($model->status == 'Antrian'){
                return Html::a(
                '<i class="icon" style="margin-left: 4px; ">edit</i>',
                ['update', 'id' => $model->id],
                ['role' => 'modal-remote', 'title' => 'ubah', 'class' => 'btn btn-warning btn-block mb-2',]
                );
            }
        },
        "delete" => function ($url, $model, $key) {
            if($model->status == 'Antrian'){
                return Html::a(
                    '<i class="icon" style="margin-left: 4px; ">delete</i>',
                    ['delete', 'id' => $model->id],
                    [
                        'class' => 'btn btn-danger btn-block mb-2',
                        'role' => 'modal-remote',
                        'style' => 'width:40px',
                        'title' => 'Hapus',
                        'data-confirm' => false,
                        'data-method' => false, // for overide yii data api
                        'data-request-method' => 'post',
                        'data-toggle' => 'tooltip',
                        'data-confirm-title' => 'Konfirmasi',
                        'data-confirm-ok' => 'Yakin',
                        'data-confirm-cancel' => 'Kembali',
                        'data-confirm-message' => 'Data ini akan dihapus secara permanen. Apakah anda yakin ingin menghapus?'
                    ]
                );
            }
        },
        
        ]
    ],
];