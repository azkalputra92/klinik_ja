<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\HasilAnalisisPasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hasil-analisis-pasien-form">
    <?php if (!Yii::$app->request->isAjax){ ?>
    <div class="card">
    <div class="card-body">
    <?php } ?>
    <?php $form = ActiveForm::begin(); ?>

          <?= $form->field($model, 'id_hasil_analisis')->textInput() ?>

      <?= $form->field($model, 'meriang')->textInput() ?>

      <?= $form->field($model, 'sakit_kepala')->textInput() ?>

      <?= $form->field($model, 'batuk')->textInput() ?>

      <?= $form->field($model, 'diare')->textInput() ?>

      <?= $form->field($model, 'nyeri_otot')->textInput() ?>

      <?= $form->field($model, 'mual')->textInput() ?>

      <?= $form->field($model, 'endemik')->textInput() ?>

      <?= $form->field($model, 'demam')->textInput() ?>

      <?= $form->field($model, 'keringat_dingin')->textInput() ?>

      <?= $form->field($model, 'dehidrasi')->textInput() ?>

      <?= $form->field($model, 'hasil')->textInput() ?>

      <?= $form->field($model, 'created_at')->textInput() ?>

      <?= $form->field($model, 'updated_at')->textInput() ?>

      <?= $form->field($model, 'created_by')->textInput() ?>

      <?= $form->field($model, 'updated_by')->textInput() ?>

    <?php if (!Yii::$app->request->isAjax){ ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>
    <?php if (!Yii::$app->request->isAjax){ ?>
</div>
</div>
<?php } ?>
</div>