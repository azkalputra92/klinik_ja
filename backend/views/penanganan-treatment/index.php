<?php
use yii\helpers\Url;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
use kartik\grid\GridView;
use cangak\ajaxcrud\CrudAsset;
use cangak\ajaxcrud\BulkButtonWidget;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PenangananTreatmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Penanganan Treatment";
$this->params['breadcrumbs'][] = $this->title;
$this->params['judulHalaman'] = $this->title;
$this->params['subJudul'] = "";


CrudAsset::register($this);
$appendBtn = '<span class="ic-search"><i data-feather="search" width="16" height="16"></i></span>';
$this->registerJs("$('.modal-dialog').addClass('modal-dialog-centered')");
?>
<div id="kt_app_content" class="app-content flex-column-fluid">
    <?=GridView::widget(
    [
    'id'=> 'crud-datatable',
    'dataProvider' => $dataProvider,
    'filterModel' => null,
    'pjax'=> true,
    // 'pjaxSettings' => [
    // 'options' => [
    // 'enablePushState' => false,
    // ]
    //],
    'export'=> false,
    'summary'=> "Menampilkan <b>{begin}</b> - <b>{end}</b> dari <b>{totalCount}</b> hasil",
    'columns' => require(__DIR__.'/_columns.php'),
    'toolbar'=> [
    [
    'content' =>'{export}'
    ],
    ],
    'bordered' => false,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'responsiveWrap' => false,
    'panelHeadingTemplate' => '<div class="d-flex justify-content-between w-100">
        <div class="d-flex align-items-center">
            <h5 class="fw-normal mb-2 mb-md-0 fw-500 fs-16">Semua Penanganan Treatment</h5>
        </div>

        <div class="d-flex justify-content-start justify-content-md-end align-items-center">'.
            Html::a(
            'Tambah Penanganan Treatment',
            ['create','id_penanganan'=>$id_penanganan],
            ['role' => 'modal-remote', 'title' => 'Tambah Penanganan Treatment', 'class' => 'btn btn btn-primary', 'style' => 'width: fit-content;']
            ).'
        </div>
    </div>',
    'panel' => [
    'type' => '',
    'heading' => true,
    'before' => false,
    'after' => false,
    'footer' => true,
    ],
    'panelTemplate' => $this->render('panelTemplate',['searchModel'=>$searchModel, 'isExtraFilter' => false, 'isRangeDateFilter' => false, 'isStatusFilter' => false]),
    'panelFooterTemplate'=> '<div class="d-flex justify-content-between align-items-center">{summary} {pager}</div>',
    'pager' => [
    'prevPageLabel' => '<i class="icon fs-16">keyboard_double_arrow_left</i>',
    'maxButtonCount' => 5,
    'nextPageLabel' => '<i class="icon fs-16">keyboard_double_arrow_right</i>',
    ],
    ])
    ?>
</div>
<?php
$request = Yii::$app->request;
if (!$request->isAjax) {
 Modal::begin([
    "size" => "modal-lg",
    "options" => [
        "id" => "ajaxCrudModal",
        "tabindex" => false // important for Select2 to work properly
    ],
    "footer" => "", // always need it for jquery plugin
]) ?>
<?php Modal::end(); 
}
?>