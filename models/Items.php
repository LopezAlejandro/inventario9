<?php

namespace app\models;

use Yii;
use \app\models\base\Items as BaseItems;

/**
 * This is the model class for table "items".
 */
class Items extends BaseItems
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(
            parent::rules(),
            [
                [['biblionumber', 'biblioitemnumber'], 'integer'],
                [['barcode'], 'string', 'max' => 20],
                [['damaged'], 'integer'],
                [['itemcallnumber'], 'string', 'max' => 255],
                [['new_status', 'stocknumber', 'copynumber'], 'string', 'max' => 32],
                [['itemnotes_nonpublic', 'enumchron'], 'string'],
                [['barcode'], 'unique'],
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'itemnumber' => 'Itemnumber',
            'biblionumber' => 'Biblionumber',
            'biblioitemnumber' => 'Biblioitemnumber',
            'barcode' => 'Codigo de Barras',
            'damaged' => 'Estado',
            'itemcallnumber' => 'Ubicación',
            'itemnotes_nonpublic' => 'Notas',
            'new_status' => 'Nro de Obra',
            'stocknumber' => 'Nro de Inventario',
            'copynumber' => 'Ejemplar Nro.',
            'enumchron' => 'Volumen/Num',
        ];
    }
}
