<div class="form-group" id="add-items">
    <?php
    use kartik\grid\GridView;
    use kartik\builder\TabularForm;
    use yii\data\ArrayDataProvider;
    use yii\helpers\Html;
    use yii\widgets\Pjax;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $row,
        'pagination' => [
            'pageSize' => -1
        ]
    ]);
    echo TabularForm::widget([
        'dataProvider' => $dataProvider,
        'formName' => 'Items',
        'checkboxColumn' => false,
        'actionColumn' => false,
        'attributeDefaults' => [
            'type' => TabularForm::INPUT_TEXT,
        ],
        'attributes' => [
            'itemnumber' => [
                'type' => TabularForm::INPUT_HIDDEN,
                'columnOptions' => ['hidden' => true]
            ],
            'biblionumber' => [
                'type' => TabularForm::INPUT_HIDDEN,
                'columnOptions' => ['hidden' => true]
            ],
            'barcode' => [
                'type' => TabularForm::INPUT_TEXT,
                'label' => 'Codigo de Barras'
            ],
            'damaged' => [
                'type' => TabularForm::INPUT_DROPDOWN_LIST,
                'label' => 'Estado',
                'items' => [
                    '0' => 'Excelente',
                    '1' => 'Bueno',
                    '2' => 'Aceptable',
                    '3' => 'Regular',
                    '4' => 'Malo',
                    '5' => 'Pésimo',
                ],
            ],
            'itemcallnumber' => [
                'type' => TabularForm::INPUT_TEXT,
                'label' => 'Ubicación',
            ],
            'itemnotes_nonpublic' => [
                'type' => TabularForm::INPUT_TEXTAREA,
                'label' => 'Notas'
            ],
            'new_status' => [
                'type' => TabularForm::INPUT_TEXT,
                'label' => 'Nro de Obra'
            ],
        ],
        'gridSettings' => [
            'panel' => [
                'heading' => false,
                //'heading' => '<h3 class="panel-title"><i class="fas fa-book"></i> Edición de Obras</h3>',
                'type' => GridView::TYPE_DEFAULT,
                'before' => false,
                'footer' => false,
            ]
        ]
    ]);
    echo "    </div>\n\n";
    ?>