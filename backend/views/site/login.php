<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
?>
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
            <!--begin::Form-->
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                <!--begin::Wrapper-->
                <div class="w-lg-500px p-10">
                    <!--begin::Form-->
                    <?php $form = ActiveForm::begin(['options' => ['class' => 'form w-100']]); ?>
                    <!--begin::Heading-->
                    <div class="text-center mb-11">
                        <!--begin::Title-->
                        <img src="/admin/images/logo.jpg" alt="Logo JA Medical Skincare" srcset="" width="85px">
                        <h1 class="text-gray-900 fw-bolder mb-3 fw-600 pt-5" style="font-size: 28px;">JA Medical Skincare</h1>
                        <!--end::Title-->
                        <!--begin::Subtitle-->
                        <div class="fs-6">Silahkan masukkan username dan password dengan benar untuk melanjutkan!</div>
                        <!--end::Subtitle=-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group=-->
                    <div class="fv-row mb-7">
                        <!--begin::Email-->
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Masukkan username Anda']) ?>
                        <!--end::Email-->
                    </div>
                    <!--end::Input group=-->
                    <!-- <div class="fv-row mb-3"> -->
                    <!--begin::Password-->
                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Masukkan password Anda']) ?>
                    <!-- <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" /> -->
                    <!--end::Password-->
                    <!-- </div> -->
                    <!--end::Input group=-->
                    <!--begin::Wrapper-->

                    <!--end::Wrapper-->
                    <!--begin::Submit button-->
                    <div class="d-grid mb-10">
                        <?= Html::submitButton(
                            '<span class="indicator-label">Log in</span>
                                                <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>',
                            ['class' => 'btn btn-primary mt-3', 'name' => 'login-button']
                        ) ?>
                    </div>
                    <!--end::Submit button-->
                    <?php ActiveForm::end(); ?>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Form-->
            <!--begin::Footer-->
            <div class="d-flex px-10 mx-auto">
                <!--begin::Links-->
                <div class="d-flex fw-semibold text-primary text-center fs-base gap-5">
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Body-->
        <!--begin::Aside-->
        
        <!--end::Aside-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<?php $this->registerJs("
    sessionStorage.setItem('primaryMenu', 0);
    sessionStorage.setItem('secondaryMenu', 1);
"); ?>