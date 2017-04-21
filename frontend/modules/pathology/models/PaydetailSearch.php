<?php

namespace frontend\modules\pathology\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\pathology\models\Paydetail;

/**
 * PaydetailSearch represents the model behind the search form about `frontend\modules\pathology\models\Paydetail`.
 */
class PaydetailSearch extends Paydetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref', 'patho_no', 'p_type', 'r1', 'r2', 'r3', 's1', 's2', 's3', 'i1', 'i2', 'i3', 'f1', 'f2', 'f3'], 'integer'],
            [['hn', 'r1_detail', 'r2_detail', 'r3_detail', 's1_detail', 's2_detail', 's3_detail', 'i1_detail', 'i2_detail', 'i3_detail', 'f1_detail', 'f2_detail', 'f3_detail'], 'safe'],
            [['r1_cost', 'r2_cost', 'r3_cost', 's1_cost', 's2_cost', 's3_cost', 'i1_cost', 'i2_cost', 'i3_cost', 'f1_cost', 'f2_cost', 'f3_cost', 'total'], 'number'],
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
        $query = Paydetail::find();

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
            'patho_no' => $this->patho_no,
            'p_type' => $this->p_type,
            'r1' => $this->r1,
            'r1_cost' => $this->r1_cost,
            'r2' => $this->r2,
            'r2_cost' => $this->r2_cost,
            'r3' => $this->r3,
            'r3_cost' => $this->r3_cost,
            's1' => $this->s1,
            's1_cost' => $this->s1_cost,
            's2' => $this->s2,
            's2_cost' => $this->s2_cost,
            's3' => $this->s3,
            's3_cost' => $this->s3_cost,
            'i1' => $this->i1,
            'i1_cost' => $this->i1_cost,
            'i2' => $this->i2,
            'i2_cost' => $this->i2_cost,
            'i3' => $this->i3,
            'i3_cost' => $this->i3_cost,
            'f1' => $this->f1,
            'f1_cost' => $this->f1_cost,
            'f2' => $this->f2,
            'f2_cost' => $this->f2_cost,
            'f3' => $this->f3,
            'f3_cost' => $this->f3_cost,
            'total' => $this->total,
        ]);

        $query->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'r1_detail', $this->r1_detail])
            ->andFilterWhere(['like', 'r2_detail', $this->r2_detail])
            ->andFilterWhere(['like', 'r3_detail', $this->r3_detail])
            ->andFilterWhere(['like', 's1_detail', $this->s1_detail])
            ->andFilterWhere(['like', 's2_detail', $this->s2_detail])
            ->andFilterWhere(['like', 's3_detail', $this->s3_detail])
            ->andFilterWhere(['like', 'i1_detail', $this->i1_detail])
            ->andFilterWhere(['like', 'i2_detail', $this->i2_detail])
            ->andFilterWhere(['like', 'i3_detail', $this->i3_detail])
            ->andFilterWhere(['like', 'f1_detail', $this->f1_detail])
            ->andFilterWhere(['like', 'f2_detail', $this->f2_detail])
            ->andFilterWhere(['like', 'f3_detail', $this->f3_detail]);

        return $dataProvider;
    }
}
