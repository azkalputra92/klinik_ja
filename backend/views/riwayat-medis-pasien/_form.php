<?php

use kartik\select2\Select2;
use yii\bootstrap5\Html;
// use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatMedisPasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="riwayat-medis-pasien-form">
    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="card">
            <div class="card-body">
            <?php } ?>
            <?php $form = ActiveForm::begin(); ?>

            <?=
            $form->field($model, 'meriang')->widget(Select2::classname(), [
                'bsVersion' => '5.x',
                'data' => [1 => 'Ya', 0 => 'Tidak'],
                'options' => ['placeholder' => 'Gejala Meriang', 'class' => 'me-auto'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'dropdownParent' => (Yii::$app->request->isAjax ? '#ajaxCrudModal' : null)
                ],
            ]);
            ?>

            <?=
            $form->field($model, 'sakit_kepala')->widget(Select2::classname(), [
                'bsVersion' => '5.x',
                'data' => [1 => 'Ya', 0 => 'Tidak'],
                'options' => ['placeholder' => 'Gejala Sakit Kepala', 'class' => 'me-auto'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'dropdownParent' => (Yii::$app->request->isAjax ? '#ajaxCrudModal' : null)
                ],
            ]);
            ?>


            <?=
            $form->field($model, 'batuk')->widget(Select2::classname(), [
                'bsVersion' => '5.x',
                'data' => [1 => 'Ya', 0 => 'Tidak'],
                'options' => ['placeholder' => 'Gejala Batuk', 'class' => 'me-auto'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'dropdownParent' => (Yii::$app->request->isAjax ? '#ajaxCrudModal' : null)
                ],
            ]);
            ?>

            <?=
            $form->field($model, 'diare')->widget(Select2::classname(), [
                'bsVersion' => '5.x',
                'data' => [1 => 'Ya', 0 => 'Tidak'],
                'options' => ['placeholder' => 'Gejala Diare', 'class' => 'me-auto'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'dropdownParent' => (Yii::$app->request->isAjax ? '#ajaxCrudModal' : null)
                ],
            ]);
            ?>

            <?=
            $form->field($model, 'nyeri_otot')->widget(Select2::classname(), [
                'bsVersion' => '5.x',
                'data' => [1 => 'Ya', 0 => 'Tidak'],
                'options' => ['placeholder' => 'Gejala Nyeri Otot', 'class' => 'me-auto'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'dropdownParent' => (Yii::$app->request->isAjax ? '#ajaxCrudModal' : null)
                ],
            ]);
            ?>

            <?=
            $form->field($model, 'mual')->widget(Select2::classname(), [
                'bsVersion' => '5.x',
                'data' => [1 => 'Ya', 0 => 'Tidak'],
                'options' => ['placeholder' => 'Gejala Mual', 'class' => 'me-auto'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'dropdownParent' => (Yii::$app->request->isAjax ? '#ajaxCrudModal' : null)
                ],
            ]);
            ?>

            <?=
            $form->field($model, 'endemik')->widget(Select2::classname(), [
                'bsVersion' => '5.x',
                'data' => [1 => 'Ya', 0 => 'Tidak'],
                'options' => ['placeholder' => 'Pilih Tipe Penjualan', 'class' => 'me-auto'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'dropdownParent' => (Yii::$app->request->isAjax ? '#ajaxCrudModal' : null)
                ],
            ]);
            ?>

            <?=
            $form->field($model, 'demam')->widget(Select2::classname(), [
                'bsVersion' => '5.x',
                'data' => [1 => 'Ya', 0 => 'Tidak'],
                'options' => ['placeholder' => 'Gejala Demam', 'class' => 'me-auto'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'dropdownParent' => (Yii::$app->request->isAjax ? '#ajaxCrudModal' : null)
                ],
            ]);
            ?>

            <?=
            $form->field($model, 'keringat_dingin')->widget(Select2::classname(), [
                'bsVersion' => '5.x',
                'data' => [1 => 'Ya', 0 => 'Tidak'],
                'options' => ['placeholder' => 'Gejala Keringat Dingin', 'class' => 'me-auto'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'dropdownParent' => (Yii::$app->request->isAjax ? '#ajaxCrudModal' : null)
                ],
            ]);
            ?>

            <?=
            $form->field($model, 'dehidrasi')->widget(Select2::classname(), [
                'bsVersion' => '5.x',
                'data' => [1 => 'Ya', 0 => 'Tidak'],
                'options' => ['placeholder' => 'Gejala Dehidrasi', 'class' => 'me-auto'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'dropdownParent' => (Yii::$app->request->isAjax ? '#ajaxCrudModal' : null)
                ],
            ]);
            ?>


            <?php if (!Yii::$app->request->isAjax) { ?>
                <div class="card-footer form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            <?php } ?>

            <?php ActiveForm::end(); ?>
            <?php if (!Yii::$app->request->isAjax) { ?>
            </div>
        </div>
    <?php } ?>
</div>