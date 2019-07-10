<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\assets\AppAsset;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
$counter = 0;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'Name',
                'value' => function($data) {
                    return Html::a($data->name, Url::to('/article/'.($data->slug==''?$data->id:$data->slug)));
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'Text',
                'value' => function ($data) {
                    $result = '';
                    $words = explode(' ', $data->text);
                    $w_length = count($words);
                    $length = 0;
                    $i = -1;
                    while ( $length < 50 && $i++ < $w_length && $i < count($words)) {
                        $length += strlen($words[$i]);
                        $result .= $words[$i] . ' ';
                    }
                    if ($i < count($words)) {
                        $result .= " (...)";
                    }
                    return $result;
                },
            ],
        ],
    ]); ?>


</div>
