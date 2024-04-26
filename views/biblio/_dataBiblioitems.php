<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

$dataProvider = new ArrayDataProvider([
    'allModels' => $model->biblioitems,
    'key' => 'biblioitemnumber'
]);
$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'attribute' => 'biblioitemnumber',
        'visible' => false,
    ],
    [
        'attribute' => 'volume',
        'label' => 'Volumen'
    ],
    [
        'attribute' => 'number',
        'label' => 'Ejemplar',
    ],

    /* 'itemtype',
    'isbn:ntext',
    'issn:ntext',
    'ean:ntext',
    'publicationyear:ntext',
    'publishercode',
    'volumedate',
    'volumedesc:ntext',
    'collectiontitle:ntext',
    'collectionissn:ntext',
    'collectionvolume:ntext',
    'editionstatement:ntext',
    'editionresponsibility:ntext',
    'illus',
    'pages',
    'size',
    'place',
    'lccn:ntext',
    'url:ntext',
    'cn_source',
    'cn_class',
    'cn_item',
    'cn_suffix',
    'cn_sort',
    'agerestriction',
    'totalissues', */
    [
        'class' => 'yii\grid\ActionColumn',
        'controller' => 'biblioitems',
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
