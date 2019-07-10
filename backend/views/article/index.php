<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCss('table {
    table-layout: fixed;
    width: 100%;
}

tbody td:nth-child(4) {
    overflow: scroll;
}

tbody td:nth-child(3) {
    overflow: hidden;
}

table td:nth-child(1),table th:nth-child(1){
    width: 2.5%;
}

table td:nth-child(2),table th:nth-child(2) {
    width: 10%;
}

table td:nth-child(3),table th:nth-child(3) {
    width: 10%;
}

table td:nth-child(4),table th:nth-child(4) {
    width: 70%;
}

table td:nth-child(5),table th:nth-child(5) {
    width: 10%;
}');

?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'text:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
