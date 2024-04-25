<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Items */

$this->title = $model->itemnumber;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Items'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model->itemnumber],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>
            
            <?= Html::a('Update', ['update', 'id' => $model->itemnumber], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->itemnumber], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'itemnumber',
        [
            'attribute' => 'biblionumber0.biblionumber',
            'label' => 'Biblionumber',
        ],
        [
            'attribute' => 'biblioitemnumber0.biblioitemnumber',
            'label' => 'Biblioitemnumber',
        ],
        'barcode',
        'damaged',
        'itemcallnumber',
        'itemnotes_nonpublic:ntext',
        'new_status',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Biblioitems<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnBiblioitems = [
        [
            'attribute' => 'biblionumber0.biblionumber',
            'label' => 'Biblionumber',
        ],
        'volume',
        'number',
        'itemtype',
        'isbn',
        'issn',
        'ean',
        'publicationyear',
        'publishercode',
        'volumedate',
        'volumedesc',
        'collectiontitle',
        'collectionissn',
        'collectionvolume',
        'editionstatement',
        'editionresponsibility',
        'illus',
        'pages',
        'notes',
        'size',
        'place',
        'lccn',
        'url',
        'cn_class',
        'cn_item',
        'cn_suffix',
        'agerestriction',
        'totalissues',
    ];
    echo DetailView::widget([
        'model' => $model->biblioitemnumber0,
        'attributes' => $gridColumnBiblioitems    ]);
    ?>
    <div class="row">
        <h4>Biblio<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnBiblio = [
        'frameworkcode',
        'author',
        'title',
        'medium',
        'subtitle',
        'part_number',
        'part_name',
        'unititle',
        'notes',
        'serial',
        'seriestitle',
        'copyrightdate',
        'datecreated',
        'abstract',
    ];
    echo DetailView::widget([
        'model' => $model->biblionumber0,
        'attributes' => $gridColumnBiblio    ]);
    ?>
</div>
