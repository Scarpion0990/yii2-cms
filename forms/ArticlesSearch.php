<?php

<<<<<<< HEAD
namespace abdualiym\cms\forms;
=======
namespace abdualiym\cms\models;
>>>>>>> 8b48ef3ca164c7e9625a53ec14596f9d17e4ff8e

use abdualiym\cms\entities\ArticleCategories;
use abdualiym\cms\entities\Articles;
use yii\base\Model;
use yii\data\ActiveDataProvider;
<<<<<<< HEAD
use yii\helpers\ArrayHelper;
=======
use abdualiym\cms\models\Articles;
>>>>>>> 8b48ef3ca164c7e9625a53ec14596f9d17e4ff8e

/**
 * ArticlesSearch represents the model behind the search form of `Articles`.
 */
class ArticlesSearch extends Articles
{

    public function rules()
    {
        return [
            [['id', 'date', 'status', 'category_id'], 'integer'],
            [['title_0'], 'safe'],
        ];
    }


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
        $query = Articles::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ],
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
            'date' => $this->date,
            'status' => $this->status,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'title_0', $this->title_0]);

        return $dataProvider;
    }

}
