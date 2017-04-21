<?php

namespace frontend\modules\pathology\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\pathology\models\Patho;

/**
 * PathoSearch represents the model behind the search form about `frontend\modules\pathology\models\Patho`.
 */
class PathoSearch extends Patho
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref', 'age', 'pttype', 'type', 'ward', 'isresult', 'patho1', 'patho2'], 'integer'],
            [['patho_no', 'hn', 'vn', 'an', 'pid', 'date', 'title', 'name', 'surname', 'date_dx', 'result', 'dep', 'dep_name', 'ward_name', 'hosp', 'hosp_name'], 'safe'],
            [['price', 'paid', 'routine', 'frozen', 'special', 'immuno'], 'number'],
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
        $query = Patho::find();

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
            'date' => $this->date,
            'age' => $this->age,
            'date_dx' => $this->date_dx,
            'price' => $this->price,
            'paid' => $this->paid,
            'pttype' => $this->pttype,
            'type' => $this->type,
            'ward' => $this->ward,
            'isresult' => $this->isresult,
            'routine' => $this->routine,
            'frozen' => $this->frozen,
            'special' => $this->special,
            'immuno' => $this->immuno,
            'patho1' => $this->patho1,
            'patho2' => $this->patho2,
        ]);

        $query->andFilterWhere(['like', 'patho_no', $this->patho_no])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'vn', $this->vn])
            ->andFilterWhere(['like', 'an', $this->an])
            ->andFilterWhere(['like', 'pid', $this->pid])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'result', $this->result])
            ->andFilterWhere(['like', 'dep', $this->dep])
            ->andFilterWhere(['like', 'dep_name', $this->dep_name])
            ->andFilterWhere(['like', 'ward_name', $this->ward_name])
            ->andFilterWhere(['like', 'hosp', $this->hosp])
            ->andFilterWhere(['like', 'hosp_name', $this->hosp_name]);

        return $dataProvider;
    }
}
