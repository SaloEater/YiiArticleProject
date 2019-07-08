<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="article-view">

    <h1 style="text-align:center;"><?= Html::encode($this->title) ?></h1>

    <?=$model->text?>

</div>
