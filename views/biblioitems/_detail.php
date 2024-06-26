<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Biblioitems */

?>
<div class="biblioitems-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->biblioitemnumber) ?></h2>
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
</div>