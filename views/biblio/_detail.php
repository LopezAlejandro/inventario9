<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Biblio */

?>
<div class="biblio-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->biblionumber) ?></h2>
        </div>
    </div>

    <div class="row">
        <?php
        $gridColumn = [
            ['attribute' => 'biblionumber', 'visible' => false,],
            'title:ntext',
            'subtitle:ntext',
            'author:ntext',
        ];
        echo DetailView::widget([
            'model' => $model,
            'attributes' => $gridColumn
        ]);
        ?>
    </div>
</div>