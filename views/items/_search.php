<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ItemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'itemnumber')->textInput(['placeholder' => 'Itemnumber']) ?>

    <?= $form->field($model, 'biblionumber')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Biblio::find()->orderBy('biblionumber')->asArray()->all(), 'biblionumber', 'biblionumber'),
        'options' => ['placeholder' => 'Choose Biblio'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'biblioitemnumber')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Biblioitems::find()->orderBy('biblioitemnumber')->asArray()->all(), 'biblioitemnumber', 'biblioitemnumber'),
        'options' => ['placeholder' => 'Choose Biblioitems'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'barcode')->textInput(['maxlength' => true, 'placeholder' => 'Barcode']) ?>

    <?= $form->field($model, 'damaged')->checkbox() ?>

    <?php /* echo $form->field($model, 'itemcallnumber')->textInput(['maxlength' => true, 'placeholder' => 'Itemcallnumber']) */ ?>

    <?php /* echo $form->field($model, 'itemnotes_nonpublic')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'new_status')->textInput(['maxlength' => true, 'placeholder' => 'New Status']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
