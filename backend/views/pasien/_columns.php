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
        'label'=> 'Nama',
        'attribute'=>'nama',
        //'vAlign' => 'middle',
        'contentOptions' => ['style'=>'vertical-align: top;'],
        'encodeLabel' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label'=> 'Jenis Kelamin',
        'attribute'=>'jenis_kelamin',
        //'vAlign' => 'middle',
        'contentOptions' => ['style'=>'vertical-align: top;'],
        'encodeLabel' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label'=> 'Tempat Lahir',
        'attribute'=>'tempat_lahir',
        //'vAlign' => 'middle',
        'contentOptions' => ['style'=>'vertical-align: top;'],
        'encodeLabel' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label'=> 'Tanggal Lahir',
        'attribute'=>'tanggal_lahir',
        //'vAlign' => 'middle',
        'contentOptions' => ['style'=>'vertical-align: top;'],
        'encodeLabel' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label'=> 'Alamat',
        'attribute'=>'alamat',
        'contentOptions' => ['style'=>'vertical-align: top;'],
        'encodeLabel' => false,
    ],

    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => '',
        'template' => '<div class="d-flex align-items-center w-100 gap-3 justify-content-center">{edit} {delete} </div>',
        'width'=>'10%',
        'vAlign' => 'middle',
        'buttons' => [
        "edit" => function ($url, $model, $key) {
            return Html::a('<i class="icon" style="margin-left: 4px; ">edit</i>',
            ['update', 'id' => $model->id],
            ['role' => 'modal-remote', 'title' => 'ubah', 'class' => 'btn btn-def-warning btn-block btn-sm', 'style' => 'width:40px']
            );
        },
        "delete" => function ($url, $model, $key) {
            return Html::a('<i class="icon" style="margin-left: 4px; ">delete</i>',
            ['delete', 'id' => $model->id],
            [
                'class' => 'btn btn-def-danger btn-block btn-sm',
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
        },

        ]
    ],

];