<?php

use common\models\CommentSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $commentSearchModel common\models\CommentSearch */
/* @var $commentDataProvider yii\data\ActiveDataProvider */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('msg')): ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?= Yii::$app->session->getFlash('msg') ?>
        </div>
    <?php endif; ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'text:ntext',
            [
                'label' => $model->attributeLabels()['created_at'],
                'value' => $model->createdAt,
                'format' => 'raw'
            ],
            [
                'label' => $model->attributeLabels()['updated_at'],
                'value' => $model->updatedAt,
                'format' => 'raw'
            ],
            'slug',
            [
                'label' => $model->getAttributeLabel('created_by'),
                'value' => $model->createdBy->username
            ],
            [
                'label' => $model->getAttributeLabel('updated_by'),
                'value' => $model->updatedBy->username
            ],
        ],
    ]) ?>

<!--    Комментарии пользователей-->
<!--    --><?php
//    foreach ($model->comments as $com) {
//        echo "<div style='border: 2px solid black; width: 100%;padding: 5px; position:relative;'>";
//        echo $com->createdBy->username;
//        echo "<br/>";
//        echo "<div style='border: width: 100%; padding: 5px 5px 5px 15px;'>";
//        echo $com->text;
//        echo "</div>";
//        echo "</div>";
//        echo "<br/>";
//    }
//    ?>
    <?=  GridView::widget([
        'dataProvider' => $commentDataProvider,
        'filterModel' => $commentSearchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label' => 'created_by',
                'value' => function (\common\models\Comment $data) {
                    return $data->createdBy->username;
                }
            ],
            'text:ntext',
            'article_id',

            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'comment'
            ],
        ],
    ]); ?>

</div>
