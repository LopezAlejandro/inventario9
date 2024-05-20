<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BiblioMetadata;

/**
 * app\models\BiblioMetadataSearch represents the model behind the search form about `app\models\BiblioMetadata`.
 */
 class BiblioMetadataSearch extends BiblioMetadata
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'biblionumber'], 'integer'],
            [['format', 'schema', 'metadata', 'timestamp'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = BiblioMetadata::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'biblionumber' => $this->biblionumber,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'format', $this->format])
            ->andFilterWhere(['like', 'schema', $this->schema])
            ->andFilterWhere(['like', 'metadata', $this->metadata]);

        return $dataProvider;
    }
}
