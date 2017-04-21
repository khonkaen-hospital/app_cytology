<?php

namespace frontend\modules\pathology\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\pathology\models\Diagnosis;

/**
 * DiagnosisSearch represents the model behind the search form about `frontend\modules\pathology\models\Diagnosis`.
 */
class DiagnosisSearch extends Diagnosis
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref', 'spc1', 'spc2', 'spc3'], 'integer'],
            [['patho_no', 'hn', 'date', 'dx1', 'dx2', 'dx3', 'diagnosis'], 'safe'],
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
        $query = Diagnosis::find();

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
            'spc1' => $this->spc1,
            'spc2' => $this->spc2,
            'spc3' => $this->spc3,
        ]);

        $query->andFilterWhere(['like', 'patho_no', $this->patho_no])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'dx1', $this->dx1])
            ->andFilterWhere(['like', 'dx2', $this->dx2])
            ->andFilterWhere(['like', 'dx3', $this->dx3])
            ->andFilterWhere(['like', 'diagnosis', $this->diagnosis]);

        return $dataProvider;
    }
}
