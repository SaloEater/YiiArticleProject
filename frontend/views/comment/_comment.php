<?php

use common\models\Comment;
use yii\helpers\Html;
/* @var $com common\models\Comment*/
/* @var $isOwner boolean*/
/* @var $leftValue integer*/

$leftValue.='px;';

echo "<div style='width: 100%;position:relative;padding: 5px 5px 5px $leftValue'>";

echo $com->createdBy->username;
if ($isOwner) {


    echo $this->render('\..\utility\ActionButton', [
            'com' => $com,
            'header' => 'Изменить комментарий',
            'hintMessage'=> 'Изменить',
            'action' => '/site/editcomment',
            'glyphicon' => 'pencil'
        ]);


    $responseComment = new Comment();
    $responseComment->article_id = $com->article_id;
    $responseComment->parent_id = $com->id;

    echo $this->render('\..\utility\ActionButton', [
            'com' => $responseComment,
            'header' => 'Ответить на комментарий',
            'hintMessage'=> 'Ответить',
            'glyphicon' => 'import'
        ]);

    $deleteTitle = Yii::t('yii', 'Удалить');
    $deleteIcon = Html::tag('span', '', ['class' => "glyphicon glyphicon-trash"]);
    echo Html::a($deleteIcon, ['/deletecomment', 'id' => $com->id], [
        'title' => $deleteTitle,
        'aria-label' => $deleteTitle,
        'data-pjax' => '0',
        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
        'data-method' => 'post',
        'style' => ''
    ]);
}
echo "<br/>";
echo "<div style='width: 100%; border: 2px solid black; padding: 5px 5px 5px 15px;'>";
    echo $com->text;
echo "</div>";
echo "</div>";
echo "<br/>";

?>


