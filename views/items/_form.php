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

    <?= $form->field($model, 'barcode')->label('Codigo de Barras')->textInput(['maxlength' => true, 'placeholder' => 'Código de Barras']) ?>

    <?= $form->field($model, 'damaged')->dropDownList([
        '0' => 'Sin daños',
        '1' => 'Daño leve',
        '2' => 'Dañado',
        '3' => 'Daño severo',
        '4' => 'De baja',
    ])->label('Estado') ?>

    <?= $form->field($model, 'itemcallnumber')->label('Ubicación')->textInput(['maxlength' => true, 'placeholder' => 'Ubicación']) ?>

    <?= $form->field($model, 'itemnotes_nonpublic')->label('Notas')->textarea(['rows' => 2]) ?>

    <?= $form->field($model,'stocknumber')->label('Nro de Inventario')->textInput(['maxlength' => true, 'placeholder' => 'Nro de Inventario']) ?>

    <?= $form->field($model, 'copynumber')->label('Nro de Copia')->textInput(['maxlength' => true, 'placeholder' => 'Nro de Copia']) ?>

    <?= $form->field($model, 'enumchron')->label('Ejemplar')->textInput(['maxlength' => true, 'placeholder' => 'Ejemplar']) ?>

    <?= $form->field($model, 'new_status')->label('Nro de Obra')->textInput(['maxlength' => true, 'placeholder' => 'Nro de Obra']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>