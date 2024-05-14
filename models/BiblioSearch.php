<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Biblio;

/**
 * app\models\BiblioSearch represents the model behind the search form about `app\models\Biblio`.
 */
class BiblioSearch extends Biblio
{
    public $items;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['biblionumber', 'copyrightdate'], 'integer'],
            [['items'], 'safe'],
            [['frameworkcode', 'author', 'title', 'medium', 'subtitle', 'part_number', 'part_name', 'unititle', 'notes', 'serial', 'seriestitle', 'timestamp', 'datecreated', 'abstract'], 'safe'],
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
        $query = Biblio::find();

        $query->joinWith(['items']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['items'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['items.new_status' => SORT_ASC],
            'desc' => ['items.new_status' => SORT_DESC],
        ];

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }


        //$this->load($params);

        $query->andFilterWhere([
            'biblionumber' => $this->biblionumber,
            'copyrightdate' => $this->copyrightdate,
            'timestamp' => $this->timestamp,
            'datecreated' => $this->datecreated,
        ]);

        $query->andFilterWhere(['like', 'frameworkcode', $this->frameworkcode])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'medium', $this->medium])
            ->andFilterWhere(['like', 'subtitle', $this->subtitle])
            ->andFilterWhere(['like', 'part_number', $this->part_number])
            ->andFilterWhere(['like', 'part_name', $this->part_name])
            ->andFilterWhere(['like', 'unititle', $this->unititle])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'serial', $this->serial])
            ->andFilterWhere(['like', 'seriestitle', $this->seriestitle])
            ->andFilterWhere(['like', 'items.new_status', $this->items]);

        return $dataProvider;
    }
}
