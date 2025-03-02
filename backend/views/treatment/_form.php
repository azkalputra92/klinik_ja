<?php
use yii\bootstrap5\Html;
//use yii\widgets\ActiveForm;
//use yii\bootstrap5\ActiveForm;
use kartik\number\NumberControl;
use kartik\form\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Treatment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treatment-form">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'prosedur')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'durasi')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'harga')->widget(NumberControl::classname(),[
            'maskedInputOptions' => [
                'prefix' => 'Rp. ',
                'alias' => 'numeric',
                'digits' => 2,
                'groupSeparator' => '.',
                'rightAlign' => false
            ],
        ])?>

        
    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>
    <?php ActiveForm::end(); ?>
</div>