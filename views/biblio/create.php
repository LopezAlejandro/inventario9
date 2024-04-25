<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Biblio */

$this->title = 'Create Biblio';
$this->params['breadcrumbs'][] = ['label' => 'Biblio', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biblio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
