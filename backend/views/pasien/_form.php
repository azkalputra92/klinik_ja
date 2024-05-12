<?php

use kartik\number\NumberControl;
use kartik\select2\Select2;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
use kartik\form\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\Pasien */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Tambah Pasien';

$this->registerJsFile(
    '@web/js/form-ajax.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>

<div class="pasien-form">
    <?php if (!Yii::$app->request->isAjax) : ?>
        <div class="card">
            <div class="card-header">
                <h5>Tambah Pasien</h5>
            </div>
        <?php endif ?>
        <div class="card-body" style="<?= Yii::$app->request->isAjax ? 'padding:5px;' : '' ?> ">

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

            <?php if (!Yii::$app->request->isAjax) : ?>
        </div>
        <div class="card-footer float-end">
            <?= Html::submitButton('Tambah Pasien', ['class' => 'btn btn-success']) ?>
        </div>
    <?php endif ?>

    <?php ActiveForm::end(); ?>
        </div>
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