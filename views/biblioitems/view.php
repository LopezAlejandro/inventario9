<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Biblioitems */

$this->title = $model->biblioitemnumber;
$this->params['breadcrumbs'][] = ['label' => 'Biblioitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biblioitems-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Biblioitems'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model->biblioitemnumber],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>
            
            <?= Html::a('Update', ['update', 'id' => $model->biblioitemnumber], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->biblioitemnumber], [
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
        'biblioitemnumber',
        [
            'attribute' => 'biblionumber0.biblionumber',
            'label' => 'Biblionumber',
        ],
        'volume:ntext',
        'number:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
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
    
    <div class="row">
<?php
if($providerItems->totalCount){
    $gridColumnItems = [
        ['class' => 'yii\grid\SerialColumn'],
            'itemnumber',
            [
                'attribute' => 'biblionumber0.biblionumber',
                'label' => 'Biblionumber'
            ],
                        'barcode',
            'dateaccessioned',
            'booksellerid:ntext',
            'homebranch',
            'price',
            'replacementprice',
            'replacementpricedate',
            'datelastborrowed',
            'datelastseen',
            'stack',
            'notforloan',
            'damaged',
            'damaged_on',
            'itemlost',
            'itemlost_on',
            'withdrawn',
            'withdrawn_on',
            'itemcallnumber',
            'coded_location_qualifier',
            'issues',
            'renewals',
            'reserves',
            'restricted',
            'itemnotes:ntext',
            'itemnotes_nonpublic:ntext',
            'holdingbranch',
            'deleted_on',
            'location',
            'permanent_location',
            'onloan',
            'ccode',
            'materials:ntext',
            'uri:ntext',
            'itype',
            'more_subfields_xml:ntext',
            'enumchron:ntext',
            'copynumber',
            'stocknumber',
            'new_status',
            'exclude_from_local_holds_priority',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerItems,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-items']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Items'),
        ],
        'columns' => $gridColumnItems
    ]);
}
?>

    </div>
</div>
