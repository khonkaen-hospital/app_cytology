<?php

namespace frontend\modules\cytology\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\cytology\models\CytoOut;

/**
 * CytoOutSearch represents the model behind the search form about `frontend\modules\cytology\models\CytoOut`.
 */
class CytoOutSearch extends CytoOut
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref', 'age', 'pttype', 'requester', 'hospcode', 'cyto_type', 'smear_type', 'specimen', 'adequacy', 'cause', 'price', 'result_level', 'cytist1', 'cytist2'], 'integer'],
            [['cn', 'cn_date', 'title', 'name', 'surname', 'birthdate', 'pid', 'pttype_name', 'hospname', 'address', 'tambol', 'amp', 'prov', 'result1', 'result2', 'result3', 'result4', 'result_detail', 'comment', 'result_date', 'last_updated'], 'safe'],
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
        $query = CytoOut::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'cn_date' => $this->cn_date,
            'birthdate' => $this->birthdate,
            'age' => $this->age,
            'pttype' => $this->pttype,
            'requester' => $this->requester,
            'hospcode' => $this->hospcode,
            'cyto_type' => $this->cyto_type,
            'smear_type' => $this->smear_type,
            'specimen' => $this->specimen,
            'adequacy' => $this->adequacy,
            'cause' => $this->cause,
            'price' => $this->price,
            'result_level' => $this->result_level,
            'cytist1' => $this->cytist1,
            'cytist2' => $this->cytist2,
            'result_date' => $this->result_date,
            'last_updated' => $this->last_updated,
        ]);

        $query->andFilterWhere(['like', 'cn', $this->cn])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'pid', $this->pid])
            ->andFilterWhere(['like', 'pttype_name', $this->pttype_name])
            ->andFilterWhere(['like', 'hospname', $this->hospname])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'tambol', $this->tambol])
            ->andFilterWhere(['like', 'amp', $this->amp])
            ->andFilterWhere(['like', 'prov', $this->prov])
            ->andFilterWhere(['like', 'result1', $this->result1])
            ->andFilterWhere(['like', 'result2', $this->result2])
            ->andFilterWhere(['like', 'result3', $this->result3])
            ->andFilterWhere(['like', 'result4', $this->result4])
            ->andFilterWhere(['like', 'result_detail', $this->result_detail])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
