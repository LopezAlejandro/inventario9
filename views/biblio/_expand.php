<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;

$items = [
    /* [
        'label' => '<i class="fas fa-book"></i> ' . Html::encode('Biblioteca'),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ], */

    /* [
        'label' => '<i class="fas fa-book"></i> ' . Html::encode('Datos de las Obras'),
        'content' => $this->render('_dataBiblioitems', [
            'model' => $model,
            'row' => $model->biblioitems,
        ]),
    ], */
    [
        'label' => '<i class="fas fa-book"></i> ' . Html::encode('Ejemplares'),
        'content' => $this->render('_dataItems', [
            'model' => $model,
            'row' => $model->items,
        ]),
    ],
    [
        'label' => '<i class="fas fa-book"></i> ' . Html::encode('Metadatos'),
        'content' => $this->render('_dataBiblioMetadata', [
            'model' => $model,
            'row' => $model->biblioMetadatas,
        ]),
    ],
];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>