<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "biblioitems".
 *
 * @property integer $biblioitemnumber
 * @property integer $biblionumber
 * @property string $volume
 * @property string $number
 *
 * @property \app\models\Biblio $biblionumber0
 * @property \app\models\Items[] $items
 */
class Biblioitems extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
     * This function helps \mootensai\relation\RelationTrait runs faster
     * @return array relation names of this model
     */
    public function relationNames()
    {
        return [
            'biblionumber0',
            'items'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['biblionumber'], 'integer'],
            [['volume', 'number'], 'string'],

        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'biblioitems';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'biblioitemnumber' => 'Biblioitemnumber',
            'biblionumber' => 'Biblionumber',
            'volume' => 'Volume',
            'number' => 'Number',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBiblionumber0()
    {
        return $this->hasOne(\app\models\Biblio::className(), ['biblionumber' => 'biblionumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(\app\models\Items::className(), ['biblioitemnumber' => 'biblioitemnumber']);
    }


    /**
     * @inheritdoc
     * @return \app\models\BiblioitemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\BiblioitemsQuery(get_called_class());
    }
}
