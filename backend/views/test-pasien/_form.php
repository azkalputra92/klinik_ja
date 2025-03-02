<?php
use yii\bootstrap5\Html;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Pasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pasien-form">
    <?php $form = ActiveForm::begin(); ?>
          <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'tempat_lahir')->textarea(['rows' => 6]) ?>

      <?= $form->field($model, 'tanggal_lahir')->textInput() ?>

      <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

      <?= $form->field($model, 'nomor_telepon')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'emergency_nama')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'emergency_nomor_telepon')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'info_ja')->textarea(['rows' => 6]) ?>

      <?= $form->field($model, 'riwayat_perawatan')->textarea(['rows' => 6]) ?>

      <?= $form->field($model, 'riwayat_penyakit')->textarea(['rows' => 6]) ?>

      <?= $form->field($model, 'riwayat_obat')->textarea(['rows' => 6]) ?>

      <?= $form->field($model, 'riwayat_alergi')->textarea(['rows' => 6]) ?>

      <?= $form->field($model, 'keadaan_pasien')->textarea(['rows' => 6]) ?>

      <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>
    <?php ActiveForm::end(); ?>
</div>