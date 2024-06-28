<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "items".
 *
 * @property integer $itemnumber
 * @property integer $biblionumber
 * @property integer $biblioitemnumber
 * @property string $barcode
//  * @property string $dateaccessioned
//  * @property string $booksellerid
//  * @property string $homebranch
//  * @property string $price
//  * @property string $replacementprice
//  * @property string $replacementpricedate
//  * @property string $datelastborrowed
//  * @property string $datelastseen
//  * @property integer $stack
//  * @property integer $notforloan
* @property integer $damaged
//  * @property string $damaged_on
//  * @property integer $itemlost
//  * @property string $itemlost_on
//  * @property integer $withdrawn
//  * @property string $withdrawn_on
* @property string $itemcallnumber
//  * @property string $coded_location_qualifier
//  * @property integer $issues
//  * @property integer $renewals
//  * @property integer $reserves
//  * @property integer $restricted
//  * @property string $itemnotes
* @property string $itemnotes_nonpublic
//  * @property string $holdingbranch
//  * @property string $timestamp
//  * @property string $deleted_on
//  * @property string $location
//  * @property string $permanent_location
//  * @property string $onloan
//  * @property string $cn_source
//  * @property string $cn_sort
//  * @property string $ccode
//  * @property string $materials
//  * @property string $uri
* @property string $itype
//  * @property string $more_subfields_xml
* @property string $enumchron
* @property string $copynumber
* @property string $stocknumber
* @property string $new_status
// * @property integer $exclude_from_local_holds_priority
 *
 * @property \app\models\Biblioitems $biblioitemnumber0
 * @property \app\models\Biblio $biblionumber0
 */
class Items extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
     * This function helps \mootensai\relation\RelationTrait runs faster
     * @return array relation names of this model
     */
    public function relationNames()
    {
        return [
            'biblioitemnumber0',
            'biblionumber0'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['biblionumber', 'biblioitemnumber'], 'integer'],
            [['barcode'], 'string', 'max' => 20],
            [['damaged'], 'integer'],
            [['itemcallnumber'], 'string', 'max' => 255],
            [['new_status', 'stocknumber', 'copynumber'], 'string', 'max' => 32],
            [['itemnotes_nonpublic', 'enumchron'], 'string'],
            [['barcode'], 'unique'],
            [['itype'],'string','max' => 10],

            // [['biblionumber', 'biblioitemnumber', 'issues', 'renewals', 'reserves'], 'integer'],
            // [['dateaccessioned', 'replacementpricedate', 'datelastborrowed', 'datelastseen', 'damaged_on', 'itemlost_on', 'withdrawn_on', 'timestamp', 'deleted_on', 'onloan'], 'safe'],
            // [['booksellerid', 'itemnotes', 'itemnotes_nonpublic', 'materials', 'uri', 'more_subfields_xml', 'enumchron'], 'string'],
            // [['price', 'replacementprice'], 'number'],
            // [['barcode'], 'string', 'max' => 20],
            // [['homebranch', 'coded_location_qualifier', 'holdingbranch', 'cn_source', 'itype'], 'string', 'max' => 10],
            // [['stack', 'notforloan', 'damaged', 'itemlost', 'withdrawn', 'restricted', 'exclude_from_local_holds_priority'], 'string', 'max' => 1],
            // [['itemcallnumber', 'cn_sort'], 'string', 'max' => 255],
            // [['location', 'permanent_location', 'ccode'], 'string', 'max' => 80],
            // [['copynumber', 'stocknumber', 'new_status'], 'string', 'max' => 32],
            // [['barcode'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
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
            'itype' => 'Tipo de material',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBiblioitemnumber0()
    {
        return $this->hasOne(\app\models\Biblioitems::className(), ['biblioitemnumber' => 'biblioitemnumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBiblionumber0()
    {
        return $this->hasOne(\app\models\Biblio::className(), ['biblionumber' => 'biblionumber']);
    }

    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => false,
                'updatedAtAttribute' => 'deleted_on',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\ItemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ItemsQuery(get_called_class());
    }
}
