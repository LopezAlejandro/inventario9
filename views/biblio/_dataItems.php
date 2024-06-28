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
            '0' => '<span class="text-success">Excelente</span>',
            '1' => '<span class="text-success">Bueno</span>',
            '2' => '<span class="text-warning">Aceptable</span>',
            '3' => '<span class="text-warning">Regular</span>',
            '4' => '<span class="text-danger">Malo</span>',
            '5' => '<span class="text-danger">Pésimo</span>',
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
        'attribute' => 'stocknumber',
        'label' => 'Inventario'
    ],
    [
        'attribute' => 'copynumber',
        'label' => 'Ejemplar Nro.'
    ],
    [
        'attribute' => 'enumchron',
        'label' => 'Volumen/Num'
    ],

    [
        'class' => 'kartik\grid\EnumColumn',
        'attribute' => 'itype',
        'label' => 'Tipo de Material',
        'format' => 'html',
        'enum' => [
            'BK' => '<span class="text-primary">Libros</span>',
            'BKD' => '<span class="text-primary">Libros de préstamo a domicilio</span>',
            'BKR' => '<span class="text-primary">Libros reservados</span>',
            'BKS' => '<span class="text-primary">Libros de préstamo en sala</span>',
        ]
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
