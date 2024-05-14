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
                [['new_status'], 'string', 'max' => 32],
                [['itemnotes_nonpublic'], 'string'],
                [['barcode'], 'unique']
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
            'barcode' => 'Barcode',
            'damaged' => 'Damaged',
            'itemcallnumber' => 'Itemcallnumber',
            'itemnotes_nonpublic' => 'Itemnotes Nonpublic',
            'new_status' => 'New Status',
        ];
    }
}
