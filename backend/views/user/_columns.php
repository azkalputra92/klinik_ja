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
        'label'=> 'Username',
        'attribute'=>'username',
        //'vAlign' => 'middle',
        'contentOptions' => ['style'=>'vertical-align: top;'],
        'encodeLabel' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label'=> 'Email',
        'attribute'=>'email',
        //'vAlign' => 'middle',
        'contentOptions' => ['style'=>'vertical-align: top;'],
        'encodeLabel' => false,
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label'=> 'Status',
        // 'attribute'=>'status',
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
        // 'label'=> 'Verification Token',
        // 'attribute'=>'verification_token',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],

    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => '',
        // jika button aksi berjajar ke samping
        'template' => '<div class="d-flex align-items-center w-100 gap-3">{delete} </div>',
        'width'=>'10%',
        // jika button aksi berjajar ke samping
        // 'template' => '{edit} {delete} {view} {detail}',
        // 'width'=>'28%',
        'vAlign' => 'middle',
        'buttons' => [
            "delete" => function ($url, $model, $key) {
                return Html::a('Hapus', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-def-danger btn-block btn-sm',
                    'role' => 'modal-remote', 'title' => 'Hapus',
                    'data-confirm' => false, 'data-method' => false, // for overide yii data api
                    'data-request-method' => 'post',
                    'data-toggle' => 'tooltip',
                    'data-confirm-title' => 'Konfirmasi',
                    'data-confirm-ok' => 'Yakin',
                    'data-confirm-cancel' => 'Kembali',
                    'data-confirm-message' => 'Data ini akan dihapus secara permanen. Apakah anda yakin ingin menghapus?'
                ]);
            },
            
        ]
    ],

    //[
        //'class' => 'kartik\grid\ActionColumn',
        //'dropdown' => false,
        //'vAlign' => 'middle',
        //'urlCreator' => function ($action, $model, $key, $index) {
            //return Url::to([$action, 'id' => $key]);
        //},
        //'viewOptions' => ['role' => 'modal-remote', 'title' => 'Lihat', 'data-toggle' => 'tooltip'],
        //'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        //'deleteOptions' => [
            //'role' => 'modal-remote', 'title' => 'Hapus',
            //'data-confirm' => false, 'data-method' => false, // for overide yii data api
            //'data-request-method' => 'post',
            //'data-toggle' => 'tooltip',
            //'data-confirm-title' => 'Anda Yakin?',
            //'data-confirm-message' => 'Apakah Anda yakin akan menghapus data ini?'
        //],
    //],
];