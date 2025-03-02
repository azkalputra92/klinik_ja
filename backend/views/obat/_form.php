<?php
use yii\bootstrap5\Html;
use kartik\form\ActiveForm;
use kartik\number\NumberControl;
/* @var $this yii\web\View */
/* @var $model common\models\Obat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="obat-form">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

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
        
        <?= $form->field($model, 'url')->textarea(['rows' => 3]) ?>

        <?= $form->field($model, 'file')->fileInput() ?>


    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>
    <?php ActiveForm::end(); ?>
</div>