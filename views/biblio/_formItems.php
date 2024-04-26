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
            'biblioitemnumber' => [
                'type' => TabularForm::INPUT_HIDDEN,
                'columnOptions' => ['hidden' => true]
            ],
            'barcode' => [
                'type' => TabularForm::INPUT_TEXT,
                'label' => 'Codigo de Barras',
            ],
            'damaged' => [
                'type' => TabularForm::INPUT_DROPDOWN_LIST,
                'label' => 'Estado',
                'items' => [
                    '0' => '<span class="text-success">Excelente</span>',
                    '1' => '<span class="text-success">Bueno</span>',
                    '2' => '<span class="text-warning">Aceptable</span>',
                    '3' => '<span class="text-warning">Regular</span>',
                    '4' => '<span class="text-danger">Malo</span>',
                    '5' => '<span class="text-danger">Pésimo</span>',
                ],
            ],
            'itemcallnumber' => ['type' => TabularForm::INPUT_TEXT],
            'itemnotes_nonpublic' => ['type' => TabularForm::INPUT_TEXTAREA],
            'new_status' => ['type' => TabularForm::INPUT_TEXT],
        ],
        'gridSettings' => [
            'panel' => [
                'heading' => false,
                'type' => GridView::TYPE_DEFAULT,
                'before' => false,
                'footer' => false,
            ]
        ]
    ]);
    echo "    </div>\n\n";
    ?>