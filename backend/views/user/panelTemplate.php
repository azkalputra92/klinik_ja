<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use kartik\date\DatePicker;
use kartik\datecontrol\DateControl;

$appendBtn = '';
?>
<div class="panel {type}">
    {panelHeading}
    {panelBefore}
    <div style="padding: 24px;">
        <?php $form = ActiveForm::begin(['method'=>'get', 'options'=>['id' => 'form-filter','data-pjax'=>"1"]]); ?>
        <div class="filter-content  mb-5">
            <div class="row mb-2">
                <div class="col-md-6 d-flex align-items-center">
                    <span class="me-3 mb-3">Menampilkan</span>
                    <?= $form->field($searchModel, 'rowdata')->dropdownlist(
                    [20 => 20, 25 => 25, 100 => 100],
                    [
                    'class' => 'w-fit-content',
                    'prompt' => '10',
                    'onchange' => '$("#form-filter").submit();'
                    ],
                    )->label(false) ?>                    <span class="ms-3 mb-3">Data</span>
                </div>
                <div class="col-md-3">
                    <div class="d-flex justify-content-between">
                        <?php if ($isExtraFilter) { ?>                        
                            <?= $form->field($searchModel, 'tanggal')->widget(DateControl::classname(), [
                        'type' => DateControl::FORMAT_DATE,
                        'widgetOptions' => [
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'removeButton' => false,
                        'options' => [
                        'placeholder' => 'dd/mm/yyyy',
                        'class' => 'rounded'
                        ],
                        'pluginOptions' => [
                        'autoclose' => true
                        ]
                        ]
                        ])->label(false); ?>                        
                        <?php } ?>                        
                        <?php if ($isRangeDateFilter) { ?>                        
                            <?= DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'tanggal_dari',
                        'attribute2' => 'tanggal_sampai',
                        'options' => ['placeholder' => 'dd-mm-yyyy', 'autocomplete' => 'off'],
                        'options2' => ['placeholder' => 'dd-mm-yyyy', 'autocomplete' => 'off'],
                        'type' => DatePicker::TYPE_RANGE,
                        'form' => $form,
                        'layout' => $layout3,
                        'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'autoclose' => true,
                        'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
                        ],
                        ]); ?>                        
                        <?php } ?>                        
                        <?php if ($isStatusFilter) { ?>                        
                            <?= $form->field($searchModel, 'status_aktif', ['options' => ['class' => 'mb-2 mb-md-0 w-100']])->dropDownList(
                        [
                        '' => '- Pilih Status -',
                        '1' => 'Aktif', '0' => 'Tidak Aktif'
                        ],
                        )->label(false); ?>                        
                        <?php } ?>                        
                       
                    
                    <?php if($isExtraFilter == false && $isRangeDateFilter == false && $isStatusFilter == false) { ?>
                        <?php } else{ ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex justify-content-between mb-2 mb-md-0">
                        <?= $form->field($searchModel, 'cari',['template' => ('{input}{error}' . $appendBtn),'options'=>['class'=>'input-group']])
                        ->textInput(['placeholder' => 'Pencarian...',
                        'class' => 'form-control rounded'])
                        ->label(false) ?>
                        <?php if($isExtraFilter == false && $isRangeDateFilter == false && $isStatusFilter == false) { ?>                        
                        <?= Html::submitButton(
                        '<span class="text-black"><i data-feather="search" width="9" height="16"></i> Cari</span>',
                        [
                        'class' => 'btn btn-info text-white rounded btn-search mx-2',
                        'style' => 'White-space: nowrap;',
                        'data-pjax' => true
                        ]
                        )
                        ?>
                        <?php } else{ ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
        {items}
    </div>
    {panelFooter}
</div>