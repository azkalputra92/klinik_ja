<?php

use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pasien */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Tambah Pasien';

?>

<div class="pasien-form">
    <div class="card">
        <div class="card-header">
            <h5>Tambah Pasien</h5>
        </div>
        <div class="card-body">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'nama_pasien')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'umur_pasien')->textInput() ?>

            <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

        </div>
        <div class="card-footer float-end">
            <?= Html::submitButton('Tambah Pasien', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>