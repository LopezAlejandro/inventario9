<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\BiblioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Biblioteca';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="biblio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- <?= Html::a('Create Biblio', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button']) ?> -->
    </p>
    <div class="search-form" style="display:none">
        <?= $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php
    $gridColumn = [
        //        ['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true
        ],
        ['attribute' => 'biblionumber', 'visible' => false,],
        'title:ntext',
        'subtitle:ntext',
        'author:ntext',
        /* [
            'attribute' => 'new_status',
            'label' => 'Nro Obra',
            'value' => function ($model) {
                return $model->items;
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\Items::find()->asArray()->one(), 'biblionumber', 'biblionumber'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Biblio', 'id' => 'grid-biblioitems-search-biblionumber']  
        ], */
        //$model->items->new_status,
    ];
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'export' => false,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-biblio']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="fas fa-book"></span>  ' . Html::encode($this->title),
        ],
    ]); ?>

</div>