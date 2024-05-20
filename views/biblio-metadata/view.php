<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\BiblioMetadata */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Biblio Metadata', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biblio-metadata-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Biblio Metadata'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'id',
        [
            'attribute' => 'biblionumber0.biblionumber',
            'label' => 'Biblionumber',
        ],
        'format',
        'schema',
        'metadata:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Biblio<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnBiblio = [
        'frameworkcode',
        'author',
        'title',
        'medium',
        'subtitle',
        'part_number',
        'part_name',
        'unititle',
        'notes',
        'serial',
        'seriestitle',
        'copyrightdate',
        'datecreated',
        'abstract',
    ];
    echo DetailView::widget([
        'model' => $model->biblionumber0,
        'attributes' => $gridColumnBiblio    ]);
    ?>
</div>
