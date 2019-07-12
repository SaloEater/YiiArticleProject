<?php

/**
 * @var $com \common\models\Comment
 */

/* @var $header string*/
/* @var $hintMessage string*/
/* @var $glyphicon string*/
/* @var $action string*/

use yii\bootstrap\Modal;
use yii\helpers\Html;

$title = Yii::t('yii', $hintMessage);
$icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-$glyphicon"]);
$link = Html::a($icon, null, [
    'title' => $title,
    'aria-label' => $title,
    'style' => ''
]);

echo '   ';
Modal::begin([
    'header' => $header,
    'toggleButton' => [
        'label' => $link/*Html::tag('span', '', ['class' => "glyphicon glyphicon-pencil"])*/
    ],
    'bodyOptions' => [
        'style' => 'padding: 5px;'
    ]
]);
echo $this->render('\..\comment\_form', [
    'model' => $com,
    'action' => $action??null
]);
Modal::end();