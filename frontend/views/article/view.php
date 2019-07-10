<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $comment common\models\Comment*/

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="article-view">

    <h1 style="text-align:center;"><?= Html::encode($this->title) ?></h1>

    <?=$model->text?>
    <br/>
    <br/>
    <div style="text-align: right; font-style: italic;">
        Создано <?= $model->createdAt?> пользователем <?= $model->createdBy->username ?>
    </div>
    <br/>
    <br/>
    Теги:
    <br/>
    <div style="border: 2px solid black; padding: 5px; box-shadow: 5px 5px 2px 0 rgba(0,0,0,0.75); ">
        <?php
            echo implode(", ",
                array_map(function ($item) {
                    return $item->name;
                }, $model->tags)
            );
        ?>
    </div>
    <br/>
    <?= $this->render('\..\comment\_form', [
        'model' => $comment
    ]) ?>
    Комментарии пользователей
    <?php
    $currentUserId = Yii::$app->user->id;
    foreach ($model->comments as $com) {
        echo $this->render('\..\comment\_comment',
            ['com'=>$com,
                'isOwner' => $currentUserId == $com->created_by ?? false]
        );
    }
    ?>

</div>
