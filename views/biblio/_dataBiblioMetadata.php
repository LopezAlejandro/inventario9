<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use Scriptotek\Marc\Record;

$dataProvider = new ArrayDataProvider([
    'allModels' => $model->biblioMetadatas,
    'key' => 'id'
]);
$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'attribute' => 'metadata',
        'label' => 'campo 990',
        'format' => 'raw',
        'value' => function ($model) {
            $c990 = '';
            $campo = Record::fromString($model->metadata);
            foreach ($campo->query('990$a') as $subfield) {
                $c990 = $c990 . $subfield->getData() . "\n";
            }
            return nl2br($c990);
        },
        //'value' => 'metadata'
    ],
    [
        'attribute' => 'metadata',
        'label' => 'Nro de Obra',
        'value' => function ($model) {
            return Record::fromString($model->metadata)->query('001')->text();
    }
],
    
    //'metadata:ntext',
    /* [
        'class' => 'yii\grid\ActionColumn',
        'controller' => 'biblio-metadata'
    ], */
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
