<?php
use yii\bootstrap5\Html;
//use yii\widgets\ActiveForm;
//use yii\bootstrap5\ActiveForm;
use kartik\form\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Penanganan */
/* @var $form yii\widgets\ActiveForm */
use kartik\datecontrol\DateControl;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
?>

<div class="penanganan-form">
    <?php $form = ActiveForm::begin(); ?>
          <?= $form->field($model, 'id_pasien')->widget(Select2::classname(), [
                'data' => ArrayHelper::map($model->listPasien, 'id', 'nama'),
                'options' => [
                    'placeholder' => 'Pilih Pasien',
                    'class' => 'col-12 mb-3 load_ajax_change'
                ],
                'pluginOptions' => [
                    'dropdownParent' => (Yii::$app->request->isAjax ? '#ajaxCrudModal' : null),
                    'allowClear' => true
                ],

            ])->label('Pasien'); ?>

      <?= $form->field($model, 'tanggal', [
            'feedbackIcon' => [
                'type' => 'raw',
                'defaultOptions' => [
                    'class' => 'material-symbols-outlined'
                ]
            ]
        ])->widget(DateControl::classname(), [
            'type' => DateControl::FORMAT_DATE,
            'ajaxConversion' => false,
            'widgetOptions' => [
                'pickerIcon' => '<i class="icon">calendar_today</i>',
                'removeButton' => false,
                'options' => [
                    'placeholder' => 'dd-mm-yyyy',
                    'autocomplete' => 'off',
                ],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ],
        ])
        ?>


    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>
    <?php ActiveForm::end(); ?>
</div>