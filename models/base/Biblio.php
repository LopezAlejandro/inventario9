<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "biblio".
 *
 * @property integer $biblionumber
 //* @property string $frameworkcode
 * @property string $author
 * @property string $title
 //* @property string $medium
 * @property string $subtitle
 //* @property string $part_number
 //* @property string $part_name
 //* @property string $unititle
 //* @property string $notes
// * @property integer $serial
// * @property string $seriestitle
// * @property integer $copyrightdate
// * @property string $timestamp
// * @property string $datecreated
// * @property string $abstract
 *
// * @property \app\models\BiblioMetadata[] $biblioMetadatas
 * @property \app\models\Biblioitems[] $biblioitems
 * @property \app\models\Items[] $items
 */
class Biblio extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
//            'biblioMetadatas',
            'biblioitems',
            'items'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author', 'title', 'subtitle'], 'string']
            //[['author', 'title', 'medium', 'subtitle', 'part_number', 'part_name', 'unititle', 'notes', 'seriestitle', 'abstract'], 'string'],
            //[['copyrightdate'], 'integer'],
            //[['timestamp', 'datecreated'], 'safe'],
            //[['datecreated'], 'required'],
            //[['frameworkcode'], 'string', 'max' => 4],
            //[['serial'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'biblio';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'biblionumber' => 'Biblionumber',
//            'frameworkcode' => 'Frameworkcode',
            'author' => 'Autor',
            'title' => 'Titulo',
//            'medium' => 'Medium',
            'subtitle' => 'Subtitulo',
            // 'part_number' => 'Part Number',
            // 'part_name' => 'Part Name',
            // 'unititle' => 'Unititle',
            // 'notes' => 'Notes',
            // 'serial' => 'Serial',
            // 'seriestitle' => 'Seriestitle',
            // 'copyrightdate' => 'Copyrightdate',
            // 'timestamp' => 'Timestamp',
            // 'datecreated' => 'Datecreated',
            // 'abstract' => 'Abstract',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getBiblioMetadatas()
//    {
//        return $this->hasMany(\app\models\BiblioMetadata::className(), ['biblionumber' => 'biblionumber']);
//    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBiblioitems()
    {
        return $this->hasMany(\app\models\Biblioitems::className(), ['biblionumber' => 'biblionumber']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(\app\models\Items::className(), ['biblionumber' => 'biblionumber']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\BiblioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\BiblioQuery(get_called_class());
    }
}
