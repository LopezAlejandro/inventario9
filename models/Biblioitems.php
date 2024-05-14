<?php

namespace app\models;

use Yii;
use \app\models\base\Biblioitems as BaseBiblioitems;

/**
 * This is the model class for table "biblioitems".
 */
class Biblioitems extends BaseBiblioitems
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(
            parent::rules(),
            [
                [['biblionumber'], 'integer'],
                [['volume', 'number'], 'string'],

            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'biblioitemnumber' => 'Biblioitemnumber',
            'biblionumber' => 'Biblionumber',
            'volume' => 'Volume',
            'number' => 'Number',
        ];
    }
}
