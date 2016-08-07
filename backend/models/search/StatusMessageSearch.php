<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\StatusMessage;

/**
 * StatusMessageSearch represents the model behind the search form about `backend\models\StatusMessage`.
 */
class StatusMessageSearch extends StatusMessage {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['controller_name', 'action_name', 'status_message_name', 'subject', 'body', 'status_message_description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = StatusMessage::find();

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
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'controller_name', $this->controller_name])
                ->andFilterWhere(['like', 'action_name', $this->action_name])
                ->andFilterWhere(['like', 'status_message_name', $this->status_message_name])
                ->andFilterWhere(['like', 'subject', $this->subject])
                ->andFilterWhere(['like', 'body', $this->body])
                ->andFilterWhere(['like', 'status_message_description', $this->status_message_description]);

        return $dataProvider;
    }

}
