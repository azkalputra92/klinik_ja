<?php

use yii\helpers\Url;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
use kartik\grid\GridView;
use cangak\ajaxcrud\CrudAsset;
use cangak\ajaxcrud\BulkButtonWidget;
use common\models\RefCabang;
use yii\widgets\Pjax;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;
use kartik\datecontrol\DateControl;
use kartik\select2\Select2;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $searchModel keuangan\models\TaJurnalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Pasien JA Medical Skincare';
$this->params['breadcrumbs'][] = $this->title;
CrudAsset::register($this);

?>

<div class="car">
    <?php $form = ActiveForm::begin(['options' => [
        'target' => '_blank',
        'id' => 'form-cetak',
    ]]); ?>
    <div class="card">
        <div class="card-header">
            <h3> Laporan Pasien JA Medical Skincare</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'tanggal_dari', [
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
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'tanggal_sampai', [
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
                </div>
            </div>
        </div>
        <div class="card-footer">
        <?= Html::submitButton('Cetak', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

<?php
if (!Yii::$app->request->isAjax) {
    Modal::begin([
        "options" => [
            "id" => "ajaxCrudModal",
            "tabindex" => false // important for Select2 to work properly
        ],
        "id" => "ajaxCrudModal",
        "size" => "modal-lg",
        "footer" => "", // always need it for jquery plugin
    ]) ?>
<?php Modal::end();
}
?>