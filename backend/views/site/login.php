<?php

/** @var yii\web\View $this */ /** @var yii\bootstrap5\ActiveForm $form */ /** @var \common\models\LoginForm $model */

use backend\assets\AppAsset;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

AppAsset::register($this);
$this->title = 'Login';
?>
<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="card mb-3">
                        <div class="card-body row g-3 needs-validation">
                            <div class="pt-2">
                                <h5 class="card-title text-center pb-0 fs-4">Silahkan Login</h5>
                                <p class="text-center small">Input username & password untuk login</p>
                            </div>
                            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                            <div class="col-12">
                                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                            </div>
                            <div class="col-12">

                                <?= $form->field($model, 'password')->passwordInput() ?>
                            </div>

                            <div class="form-group">
                                <?= Html::submitButton('Login', ['class' => 'btn btn-primary w-100', 'name' => 'login-button']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
</div>