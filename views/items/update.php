<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Items */

$this->title = 'Modificando ejemplar : ' . ' ' . $model->itemnumber;
//$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->itemnumber, 'url' => ['view', 'id' => $model->itemnumber]];
$this->params['breadcrumbs'][] = 'Modificando';
?>
<div class="items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>