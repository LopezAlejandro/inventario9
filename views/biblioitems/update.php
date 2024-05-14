<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Biblioitems */

$this->title = 'Actualizando Datos de la obra : ' . ' ' . $model->biblioitemnumber;
$this->params['breadcrumbs'][] = ['label' => 'Biblioitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->biblioitemnumber, 'url' => ['view', 'id' => $model->biblioitemnumber]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="biblioitems-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
