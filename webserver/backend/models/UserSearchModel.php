<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UserModel;

/**
 * UserSearchModel represents the model behind the search form about `backend\models\UserModel`.
 */
class UserSearchModel extends UserModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'audit', 'user_type', 'has_uncomplete_loan', 'login_num', 'expire', 'monthly_journal'], 'integer'],
            [['mobile', 'password', 'idcard', 'city_code', 'company_type', 'current_long', 'income', 'income_patton', 'is_marry', 'education', 'credit_situation', 'success_loan', 'has_car', 'has_creditcard', 'has_house', 'has_reserfund', 'has_resersecur', 'created_time', 'updated_time', 'session_id', 'token', 'real_name', 'operating_years', 'business_license_time', 'business_register_address'], 'safe'],
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
        $query = UserModel::find();

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
            'user_id' => $this->user_id,
            'audit' => $this->audit,
            'user_type' => $this->user_type,
            'has_uncomplete_loan' => $this->has_uncomplete_loan,
            'login_num' => $this->login_num,
            'created_time' => $this->created_time,
            'updated_time' => $this->updated_time,
            'expire' => $this->expire,
            'monthly_journal' => $this->monthly_journal,
        ]);

        $query->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'idcard', $this->idcard])
            ->andFilterWhere(['like', 'city_code', $this->city_code])
            ->andFilterWhere(['like', 'company_type', $this->company_type])
            ->andFilterWhere(['like', 'current_long', $this->current_long])
            ->andFilterWhere(['like', 'income', $this->income])
            ->andFilterWhere(['like', 'income_patton', $this->income_patton])
            ->andFilterWhere(['like', 'is_marry', $this->is_marry])
            ->andFilterWhere(['like', 'education', $this->education])
            ->andFilterWhere(['like', 'credit_situation', $this->credit_situation])
            ->andFilterWhere(['like', 'success_loan', $this->success_loan])
            ->andFilterWhere(['like', 'has_car', $this->has_car])
            ->andFilterWhere(['like', 'has_creditcard', $this->has_creditcard])
            ->andFilterWhere(['like', 'has_house', $this->has_house])
            ->andFilterWhere(['like', 'has_reserfund', $this->has_reserfund])
            ->andFilterWhere(['like', 'has_resersecur', $this->has_resersecur])
            ->andFilterWhere(['like', 'session_id', $this->session_id])
            ->andFilterWhere(['like', 'token', $this->token])
            ->andFilterWhere(['like', 'real_name', $this->real_name])
            ->andFilterWhere(['like', 'operating_years', $this->operating_years])
            ->andFilterWhere(['like', 'business_license_time', $this->business_license_time])
            ->andFilterWhere(['like', 'business_register_address', $this->business_register_address]);

        return $dataProvider;
    }
}
