<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

$dataProvider = new ArrayDataProvider([
    'allModels' => $model->items,
    'key' => 'itemnumber'
]);
$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    ['attribute' => 'itemnumber', 'visible' => false,],
    [
        'attribute' => 'biblioitemnumber0.biblioitemnumber',
        'visible' => false,
    ],
    [
        'attribute' => 'barcode',
        'label' => 'Codigo de Barras'
    ],
    //'dateaccessioned',
    //'booksellerid:ntext',
    //'homebranch',
    //'price',
    //'replacementprice',
    //'replacementpricedate',
    //'datelastborrowed',
    //'datelastseen',
    //'stack',
    //'notforloan',
    [
        'class' => 'kartik\grid\EnumColumn',
        'attribute' => 'damaged',
        'label' => 'Estado',
        'format' => 'html',
        'enum' => [
            '0' => '<span class="text-success">Excelente</span>',
            '1' => '<span class="text-success">Bueno</span>',
            '2' => '<span class="text-warning">Aceptable</span>',
            '3' => '<span class="text-warning">Regular</span>',
            '4' => '<span class="text-danger">Malo</span>',
            '5' => '<span class="text-danger">Pésimo</span>',
        ]
    ],
    //'damaged_on',
    //'itemlost',
    //'itemlost_on',
    //'withdrawn',
    //'withdrawn_on',
    [
        'attribute' => 'itemcallnumber',
        'label' => 'Ubicación'
    ],
    //'coded_location_qualifier',
    //'issues',
    //'renewals',
    //'reserves',
    //'restricted',
    //'itemnotes:ntext',
    [
        'attribute' => 'itemnotes_nonpublic:ntext',
        'label' => 'Notas privadas'
    ],
    //'holdingbranch',
    //'deleted_on',
    //'location',
    //'permanent_location',
    //'onloan',
    //'cn_source',
    //'cn_sort',
    //'ccode',
    //'materials:ntext',
    //'uri:ntext',
    // 'itype',
    // 'more_subfields_xml:ntext',
    // 'enumchron:ntext',
    // 'copynumber',
    // 'stocknumber',
    [
        'attribute' => 'new_status',
        'label' => 'Nro de Obra'
    ],
    //'exclude_from_local_holds_priority',
    [
        'class' => 'yii\grid\ActionColumn',
        'controller' => 'items',
        'template' => '{update}'
    ],
];

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'containerOptions' => ['style' => 'overflow: auto'],
    'pjax' => true,
    'beforeHeader' => [
        [
            'options' => ['class' => 'skip-export']
        ]
    ],
    'export' => [
        'fontAwesome' => true
    ],
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
    'showPageSummary' => false,
    'persistResize' => false,
]);
