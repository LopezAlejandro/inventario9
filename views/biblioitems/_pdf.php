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
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'biblioitemnumber',
        [
                'attribute' => 'biblionumber0.biblionumber',
                'label' => 'Biblionumber'
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Items'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnItems
    ]);
}
?>
    </div>
</div>
