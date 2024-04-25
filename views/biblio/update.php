<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Biblio */

$this->title = 'Update Biblio: ' . ' ' . $model->biblionumber;
$this->params['breadcrumbs'][] = ['label' => 'Biblio', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->biblionumber, 'url' => ['view', 'id' => $model->biblionumber]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="biblio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
