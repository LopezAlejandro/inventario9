<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BiblioMetadata */

$this->title = 'Create Biblio Metadata';
$this->params['breadcrumbs'][] = ['label' => 'Biblio Metadata', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biblio-metadata-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
