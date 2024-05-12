<?php

use kartik\select2\Select2;
use yii\bootstrap5\Html;
// use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;
use kartik\number\NumberControl;
use yii\bootstrap5\Modal;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatMedisPasien */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Tambah Data';

$this->registerJsFile(
    '@web/js/form-ajax.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>

<div class="riwayat-medis-pasien-form">
    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="card">
            <div class="card-header">
                <h5>Tambah Analisis</h5>
            </div>
            <div class="card-body">

            <?php } ?>
            <?php $form = ActiveForm::begin(['options' => ['id' => 'form-ajax', 'data-pjax' => true]]); ?>

            <?= $form->field($model, 'nama_pasien')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'umur_pasien')->widget(NumberControl::classname(), [
                'name' => 'umur_pasien',
                'value' => null,
                'options' => ['id' => 'umur_pasien'],

                'displayOptions' =>  [
                    'placeholder' => '',

                ],
                'maskedInputOptions' => [
                    'groupSeparator' => '',
                    'digits' => 0,
                    'rightAlign' => false,
                    'allowMinus' => false
                ]
            ]) ?>
            <?=
            $form->field($model, 'jenis_kelamin')->widget(Select2::classname(), [
                'bsVersion' => '5.x',
                'data' => ['Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan'],
                'options' => ['placeholder' => 'Jenis Kelamin', 'class' => 'me-auto'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'dropdownParent' => (Yii::$app->request->isAjax ? '#ajaxCrudModal' : null)
                ],
            ]);
            ?>

            <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

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
            </div>
            <div class="card-footer float-end">
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
            </div>
        <?php } ?>

        <?php ActiveForm::end(); ?>
        <?php if (!Yii::$app->request->isAjax) { ?>
        </div>
        <?php } ?>
</div>
<?php if (!Yii::$app->request->isAjax) : ?>
    <?php Modal::begin([
        "options" => [
            "id" => "ajaxCrudModal",
            "tabindex" => false // important for Select2 to work properly
        ],
        "id" => "ajaxCrudModal",
        "footer" => "", // always need it for jquery plugin
    ]) ?>
    <?php Modal::end(); ?>
<?php endif ?>