<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use \kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Biblio */
/* @var $form yii\widgets\ActiveForm */

/* \mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'BiblioMetadata', 
        'relID' => 'biblio-metadata', 
        'value' => \yii\helpers\Json::encode($model->biblioMetadatas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]); */
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Biblioitems', 
        'relID' => 'biblioitems', 
        'value' => \yii\helpers\Json::encode($model->biblioitems),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Items', 
        'relID' => 'items', 
        'value' => \yii\helpers\Json::encode($model->items),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="biblio-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-horizontal',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => [
            'labelSpan' => 3,
            'deviceSize' => ActiveForm::SIZE_SMALL,
            'showHints' => false,
        ]
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'biblionumber')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'title')->staticInput() ?>

    <?= $form->field($model, 'subtitle')->staticInput() ?>

    <?= $form->field($model, 'author')->staticInput() ?>

    <?php
    $forms = [
        /* [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('BiblioMetadata'),
            'content' => $this->render('_formBiblioMetadata', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->biblioMetadatas),
            ]),
        ], */
        [
            'label' => '<i class="fas fa-book"></i> ' . Html::encode('Biblioitems'),
            'content' => $this->render('_formBiblioitems', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->biblioitems),
            ]),
        ],
        [
            'label' => '<i class="fas fa-book"></i> ' . Html::encode('Items'),
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
