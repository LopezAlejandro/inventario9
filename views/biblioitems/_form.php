<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use \kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Biblioitems */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Items', 
        'relID' => 'items', 
        'value' => \yii\helpers\Json::encode($model->items),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="biblioitems-form">

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

    <?= $form->field($model, 'biblioitemnumber')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'biblionumber')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'volume')->textInput() ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?php
    
    $forms = [
        [
            'label' => '<i class="fas fa-book"></i> ' . Html::encode('Datos del Ejemplar'),
            'content' => $this->render('_formItems', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->items),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
