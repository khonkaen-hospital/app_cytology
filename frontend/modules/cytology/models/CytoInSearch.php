<?php

namespace frontend\modules\cytology\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\cytology\models\CytoIn;

/**
 * CytoInSearch represents the model behind the search form about `frontend\modules\cytology\models\CytoIn`.
 */
class CytoInSearch extends CytoIn
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref', 'cyto_type', 'smear_type', 'specimen', 'adequacy', 'cause', 'price', 'result_level', 'cytist1', 'cytist2'], 'integer'],
            [['cn', 'hn', 'vn', 'an', 'result_detail', 'comment', 'result_date', 'last_updated', 'result1', 'result2', 'result3', 'result4'], 'safe'],
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
        $query = CytoIn::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' =>['defaultOrder'=>['ref'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ref' => $this->ref,
            'cyto_type' => $this->cyto_type,
            'smear_type' => $this->smear_type,
            'specimen' => $this->specimen,
            'adequacy' => $this->adequacy,
            'cause' => $this->cause,
            'price' => $this->price,
            'result_level' => $this->result_level,
            'result1' => $this->result1,
            'result2' => $this->result2,
            'result3' => $this->result3,
            'result4' => $this->result4,
            'cytist1' => $this->cytist1,
            'cytist2' => $this->cytist2,
            'result_date' => $this->result_date,
            'last_updated' => $this->last_updated,
        ]);

        $query->andFilterWhere(['like', 'cn', $this->cn])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'vn', $this->vn])
            ->andFilterWhere(['like', 'an', $this->an])
            ->andFilterWhere(['like', 'result_detail', $this->result_detail])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
