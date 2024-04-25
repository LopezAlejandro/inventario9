<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Items */

?>
<div class="items-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->itemnumber) ?></h2>
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
</div>