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

    [
        'class' => 'kartik\grid\EnumColumn',
        'attribute' => 'damaged',
        'label' => 'Estado',
        'format' => 'html',
        'enum' => [
            '0' => '<span class="text-success">Sin daños</span>',
            '1' => '<span class="text-success">Daño leve</span>',
            '2' => '<span class="text-warning">Dañado</span>',
            '3' => '<span class="text-danger">Daño severo</span>',
            '4' => '<span class="text-danger">De baja</span>',
        ]
    ],

    [
        'attribute' => 'itemcallnumber',
        'label' => 'Ubicación'
    ],

    [
        'attribute' => 'itemnotes_nonpublic:ntext',
        'label' => 'Notas privadas'
    ],

    [
        'attribute' => 'new_status',
        'label' => 'Nro de Obra'
    ],

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
