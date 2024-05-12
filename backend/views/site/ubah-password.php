<?php

use yii\bootstrap5\Html;
use kartik\form\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\HasilAnalisisPasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ubah-form">

    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
    <?= $form->field(
        $model,
        'password_old',
    )->passwordInput()->label('Password Lama') ?>

    <?= $form->field(
        $model,
        'password',
    )->passwordInput()->label('Password Baru')  ?>
    <?= $form->field(
        $model,
        'password_repeat',
    )->passwordInput()->label('Ulang Password Baru') ?>
    <?php ActiveForm::end(); ?>
</div>