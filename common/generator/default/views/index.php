<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\bootstrap5\Modal;
use yii\helpers\Url;
use yii\bootstrap5\Html;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();
echo "<?php\n";
?>
use yii\helpers\Url;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
use kartik\grid\GridView;
use cangak\ajaxcrud\CrudAsset;
use cangak\ajaxcrud\BulkButtonWidget;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

$this->registerJs("$('.modal-dialog').addClass('modal-dialog-centered')");

?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="m-0 text-dark"><?= Inflector::camel2words(StringHelper::basename($generator->modelClass)) ?></h5>
                </div>
                <div>
                    <?= "<?=
                        " ?>Html::a(
                            '<span class="material-symbols-outlined align-middle">add_circle</span> Tambah Data',
                            ['create'],
                            ['role' => 'modal-remote', 'title' => 'Tambah <?= Inflector::camel2words(StringHelper::basename($generator->modelClass)) ?>', 'class' => 'btn btn-outline-primary btn-border']
                        )
                    <?= "?>\n" ?>
                </div>
            </div>
        </div>
        <div id="ajaxCrudDatatable" class="card-body">
            <?= "<?php" ?> $form = ActiveForm::begin(['method' => 'get', 'action'=>'index']); <?= "?>\n" ?>
            <div class="row mb-3">
                <div class="col">
                    <div class="row row-cols-1 field-search">
                        <div class="col">
                            <?= "<?=
                                " ?>$form->field($searchModel, 'cari')->textInput(
                                    [
                                        'class' => 'form-control',
                                        'placeholder' => 'Pencarian...',    
                                    ]
                                )
                                ->label(false)
                            <?= "?>\n" ?>
                        </div>
                    </div> 
                </div>
                <div class="col-auto ms-auto">
                    <div class="form-group">
                        <?= "<?=
                            " ?>Html::submitButton(
                                '<span class="material-symbols-outlined align-middle">search</span>', 
                                [
                                    'class' => 'btn btn-primary rounded btn-search',
                                    'data-pjax' => true
                                ]
                            ) 
                        <?= "?>\n" ?>
                    </div>
                </div>
            </div>
            <?= "<?php" ?> ActiveForm::end(); <?= "?>\n" ?>
            <?= "<?=" ?>GridView::widget([
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
            ])<?= "?>\n" ?>
        </div>
    </div>
</div>

<?= '<?php Modal::begin([
        "options" => [
            "id"=>"ajaxCrudModal",
            "tabindex" => false // important for Select2 to work properly
        ],
        "id"=>"ajaxCrudModal",
        "footer"=>"",// always need it for jquery plugin
    ])?>' . "\n" ?>
<?= '<?php Modal::end(); ?>' ?>