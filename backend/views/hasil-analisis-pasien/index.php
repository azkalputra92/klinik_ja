<?php
use yii\helpers\Url;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
use kartik\grid\GridView;
use cangak\ajaxcrud\CrudAsset;
use cangak\ajaxcrud\BulkButtonWidget;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HasilAnalisisPasienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hasil Analisis Pasiens';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

$this->registerJs("$('.modal-dialog').addClass('modal-dialog-centered')");

?>

<div class="hasil-analisis-pasien-index">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="m-0 text-dark">Hasil Analisis Pasien</h5>
                </div>
                <div>
                    <?=
                        Html::a(
                            '<span class="material-symbols-outlined align-middle">add_circle</span> Tambah Data',
                            ['create'],
                            ['role' => 'modal-remote', 'title' => 'Tambah Hasil Analisis Pasien', 'class' => 'btn btn-outline-primary btn-border']
                        )
                    ?>
                </div>
            </div>
        </div>
        <div id="ajaxCrudDatatable" class="card-body">
            <?php $form = ActiveForm::begin(['method' => 'get', 'action'=>'index']); ?>
            <div class="row mb-3">
                <div class="col">
                    <div class="row row-cols-1 field-search">
                        <div class="col">
                            <?=
                                $form->field($searchModel, 'cari')->textInput(
                                    [
                                        'class' => 'form-control',
                                        'placeholder' => 'Pencarian...',    
                                    ]
                                )
                                ->label(false)
                            ?>
                        </div>
                    </div> 
                </div>
                <div class="col-auto ms-auto">
                    <div class="form-group">
                        <?=
                            Html::submitButton(
                                '<span class="material-symbols-outlined align-middle">search</span>', 
                                [
                                    'class' => 'btn btn-primary rounded btn-search',
                                    'data-pjax' => true
                                ]
                            ) 
                        ?>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
            <?=GridView::widget([
                'id'=> 'crud-datatable',
                'dataProvider' => $dataProvider,
                'filterModel' => null,
                'pjax'=> true,
                'export'=> false,
                'summary'=> "Menampilkan <b>{begin}</b> - <b>{end}</b> dari <b>{totalCount}</b> hasil",
                'columns' => require(__DIR__.'/_columns.php'),
                'toolbar'=> [
                    [
                        'content' =>'{export}'
                    ],
                ],
                'striped' => false,
                'condensed' => true,
                'responsive' => true,
                'panel' => [
                    'type' => '',
                    'heading' => false,
                    'before' => false,
                    'after' => false,
                ],
                'panelFooterTemplate'=> '<div class="d-flex justify-content-between">{summary}{pager}</div>',
            ])?>
        </div>
    </div>
</div>

<?php Modal::begin([
        "options" => [
            "id"=>"ajaxCrudModal",
            "tabindex" => false // important for Select2 to work properly
        ],
        "id"=>"ajaxCrudModal",
        "footer"=>"",// always need it for jquery plugin
    ])?>
<?php Modal::end(); ?>