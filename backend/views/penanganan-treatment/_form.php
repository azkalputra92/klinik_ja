<?php
use yii\bootstrap5\Html;
//use yii\widgets\ActiveForm;
//use yii\bootstrap5\ActiveForm;
use kartik\form\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\PenangananTreatment */
/* @var $form yii\widgets\ActiveForm */
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
?>

<div class="penanganan-treatment-form">
    <?php $form = ActiveForm::begin(); ?>

      <?= $form->field($model, 'id_treatment')->widget(Select2::classname(), [
                'data' => ArrayHelper::map($model->listTreatment, 'id', 'nama'),
                'options' => [
                    'placeholder' => 'Pilih Treatment',
                    'class' => 'col-12 mb-3 load_ajax_change'
                ],
                'pluginOptions' => [
                    'dropdownParent' => (Yii::$app->request->isAjax ? '#ajaxCrudModal' : null),
                    'allowClear' => true
                ],

        ]); ?>

    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>
    <?php ActiveForm::end(); ?>
</div>