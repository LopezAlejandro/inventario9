<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "biblio_metadata".
 *
 * @property integer $id
 * @property integer $biblionumber
 * @property string $format
 * @property string $schema
 * @property string $metadata
 * @property string $timestamp
 *
 * @property \app\models\Biblio $biblionumber0
 */
class BiblioMetadata extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'biblionumber0'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['biblionumber', 'format', 'schema', 'metadata'], 'required'],
            [['biblionumber'], 'integer'],
            [['metadata'], 'string'],
            [['timestamp'], 'safe'],
            [['format', 'schema'], 'string', 'max' => 16],
            [['biblionumber', 'format', 'schema'], 'unique', 'targetAttribute' => ['biblionumber', 'format', 'schema'], 'message' => 'The combination of Biblionumber, Format and Schema has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'biblio_metadata';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'biblionumber' => 'Biblionumber',
            'format' => 'Format',
            'schema' => 'Schema',
            'metadata' => 'Metadata',
            'timestamp' => 'Timestamp',
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
     * @return \app\models\BiblioMetadataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\BiblioMetadataQuery(get_called_class());
    }
}
