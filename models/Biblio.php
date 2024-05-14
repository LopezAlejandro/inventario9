<?php

namespace app\models;

use Yii;
use \app\models\base\Biblio as BaseBiblio;

/**
 * This is the model class for table "biblio".
 */
class Biblio extends BaseBiblio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(
            parent::rules(),
            [
                [['author', 'title', 'subtitle'], 'string'],
                [['biblionumber'], 'safe'],

            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'biblionumber' => 'Biblionumber',
            'author' => 'Autor',
            'title' => 'Titulo',
            'subtitle' => 'Subtitulo',
        ];
    }
}
