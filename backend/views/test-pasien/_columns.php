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
        'attribute'=>'nama',
        //'vAlign' => 'middle',
        'contentOptions' => ['style'=>'vertical-align: top;'],
        'encodeLabel' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'jenis_kelamin',
        //'vAlign' => 'middle',
        'contentOptions' => ['style'=>'vertical-align: top;'],
        'encodeLabel' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tempat_lahir',
        //'vAlign' => 'middle',
        'contentOptions' => ['style'=>'vertical-align: top;'],
        'encodeLabel' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tanggal_lahir',
        //'vAlign' => 'middle',
        'contentOptions' => ['style'=>'vertical-align: top;'],
        'encodeLabel' => false,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'alamat',
        //'vAlign' => 'middle',
        'contentOptions' => ['style'=>'vertical-align: top;'],
        'encodeLabel' => false,
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label'=> 'Nomor Telepon',
        // 'attribute'=>'nomor_telepon',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label'=> 'Email',
        // 'attribute'=>'email',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label'=> 'Instagram',
        // 'attribute'=>'instagram',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label'=> 'Emergency Nama',
        // 'attribute'=>'emergency_nama',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label'=> 'Emergency Nomor Telepon',
        // 'attribute'=>'emergency_nomor_telepon',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label'=> 'Info Ja',
        // 'attribute'=>'info_ja',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label'=> 'Riwayat Perawatan',
        // 'attribute'=>'riwayat_perawatan',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label'=> 'Riwayat Penyakit',
        // 'attribute'=>'riwayat_penyakit',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label'=> 'Riwayat Obat',
        // 'attribute'=>'riwayat_obat',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label'=> 'Riwayat Alergi',
        // 'attribute'=>'riwayat_alergi',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label'=> 'Keadaan Pasien',
        // 'attribute'=>'keadaan_pasien',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'label'=> 'Status',
        // 'attribute'=>'status',
        // 'vAlign' => 'middle',
        // 'encodeLabel' => false,
    // ],

[
'class' => 'kartik\grid\ActionColumn',
'header' => '',
// jika button aksi berjajar ke samping
'template' => '<div class="d-flex align-items-center w-100 gap-3 justify-content-center">{edit} {delete} </div>',
'width'=>'10%',
// jika button aksi berjajar ke samping
// 'template' => '{edit} {delete} {view} {detail}',
// 'width'=>'28%',
'vAlign' => 'middle',
'buttons' => [
"edit" => function ($url, $model, $key) {
return Html::a(
'<i class="icon" style="margin-left: 4px; ">edit</i>',
['update', 'id' => $model->id],
['role' => 'modal-remote', 'title' => 'ubah', 'class' => 'btn btn-def-warning btn-block btn-sm', 'style' => 'width:40px']
);
},
"delete" => function ($url, $model, $key) {
return Html::a(
'<i class="icon" style="margin-left: 4px; ">delete</i>',
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
//"view" => function ($url, $model, $key) {
//return Html::a('Lihat', ['view', 'id' => $model->id], [
//'class' => 'btn btn-def-info btn-block btn-sm',
//'role' => 'modal-remote',
//'title' => 'Lihat',
//'data-toggle' => 'tooltip'
//]);
//},
//"detail" => function ($url, $model, $key) {
//return Html::a('Detail', ['view', 'id' => $model->id], [
//  'class' => 'btn btn-def-primary btn-block btn-sm',
//'role' => 'modal-remote',
//'title' => 'Lihat',
//'data-toggle' => 'tooltip'
//]);
//},
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