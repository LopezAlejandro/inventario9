<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Biblioitems */

$this->title = 'Create Biblioitems';
$this->params['breadcrumbs'][] = ['label' => 'Biblioitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biblioitems-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
