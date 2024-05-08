<?php

use yii\helpers\Url;
use yii\bootstrap5\Html;
use yii\bootstrap\Modal;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$modelClass = StringHelper::basename($generator->modelClass);
$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();
$actionParams = $generator->generateActionParams();

echo "<?php\n";

?>
use yii\bootstrap5\Html;
use yii\helpers\Url;

return [

    [
        'class' => 'kartik\grid\SerialColumn',
        'header' => 'No',
        'width' => '30px',
    ],

<?php
$count = 0;
foreach ($generator->getColumnNames() as $name) {
    if ($name == 'id' || $name == 'created_at' || $name == 'updated_at') {
        echo "    // [\n";
        echo "        // 'class'=>'\kartik\grid\DataColumn',\n";
        echo "        // 'attribute'=>'" . $name . "',\n";
        echo "    // ],\n";
    } else if (++$count < 6) {
        echo "    [\n";
        echo "        'class'=>'\kartik\grid\DataColumn',\n";
        echo "        'label' => '" . $name . '<i class="icofont icofont-sort-alt"></i>' . "',\n";
        echo "        'attribute'=>'" . $name . "',\n";
        echo "        'vAlign' => 'middle',\n";
        echo "        'encodeLabel' => false,\n";
        echo "    ],\n";
    } else {
        echo "    // [\n";
        echo "        // 'class'=>'\kartik\grid\DataColumn',\n";
        echo "        // 'label' => '" . $name . '<i class="icofont icofont-sort-alt"></i>' . "',\n";
        echo "        // 'attribute'=>'" . $name . "',\n";
        echo "        // 'vAlign' => 'middle',\n";
        echo "        // 'encodeLabel' => false,\n";
        echo "    // ],\n";
    }
}
?>

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