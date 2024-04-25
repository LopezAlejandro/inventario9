<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Items */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="items-form">

    <?php $form = ActiveForm::begin([
        'id' => 'formbi-horizontal',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => [
            'labelSpan' => 3,
            'deviceSize' => ActiveForm::SIZE_SMALL,
            'showHints' => false,
        ]
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'itemnumber')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'biblionumber')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'biblioitemnumber')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'barcode')->label('Codigo de Barras')->textInput(['maxlength' => true, 'placeholder' => 'Barcode'])?>

    <?= $form->field($model, 'damaged')->label('Estado')->checkbox() ?>

    <?= $form->field($model, 'itemcallnumber')->label('Ubicación')->textInput(['maxlength' => true, 'placeholder' => 'Itemcallnumber']) ?>

    <?= $form->field($model, 'itemnotes_nonpublic')->label('Notas Privadas')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'new_status')->label('Nro de Obra')->textInput(['maxlength' => true, 'placeholder' => 'New Status']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
