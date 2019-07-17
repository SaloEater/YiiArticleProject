<?php


namespace common\fixtures;


use yii\test\ActiveFixture;

class ArticleFixture extends ActiveFixture
{
    public $modelClass = 'common\models\Article';
    public $depends =['common\fixtures\UserFixture'];
}