<?php
use yii\bootstrap5\Html;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\PenangananProduk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penanganan-produk-form">
    <?php $form = ActiveForm::begin(); ?>
          
      <?= $form->field($model, 'id_produk')->widget(Select2::classname(), [
                'data' => ArrayHelper::map($model->listProduk, 'id', 'nama'),
                'options' => [
                    'placeholder' => 'Pilih Produk',
                    'class' => 'col-12 mb-3 load_ajax_change'
                ],
                'pluginOptions' => [
                    'dropdownParent' => (Yii::$app->request->isAjax ? '#ajaxCrudModal' : null),
                    'allowClear' => true
                ],

        ]); ?>

      <?= $form->field($model, 'jumlah')->textInput() ?>

    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>
    <?php ActiveForm::end(); ?>
</div>