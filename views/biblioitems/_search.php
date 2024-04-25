<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BiblioitemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-biblioitems-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'biblioitemnumber')->textInput(['placeholder' => 'Biblioitemnumber']) ?>

    <?= $form->field($model, 'biblionumber')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Biblio::find()->orderBy('biblionumber')->asArray()->all(), 'biblionumber', 'biblionumber'),
        'options' => ['placeholder' => 'Choose Biblio'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'volume')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'number')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
