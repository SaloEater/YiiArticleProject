<?php

use common\models\Comment;
use yii\helpers\Html;

/* @var $com common\models\Comment*/
/* @var $isOwner boolean*/

echo "<div style='width: 100%;padding: 5px; position:relative;'>";
echo $com->createdBy->username;
if ($isOwner) {
    $title = Yii::t('yii', 'Delete');
    $options = array_merge([
        'title' => $title,
        'aria-label' => $title,
        'data-pjax' => '0',
    ], [
        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
        'data-method' => 'post',
    ],
        [
            'style' => 'position: absolute;right: 5px;'
        ]);
    $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-trash"]);
    echo Html::a($icon, ['/deletecomment', 'id' => $com->id], $options);
}
echo "<br/>";
echo "<div style='border: width: 100%; border: 2px solid black; padding: 5px 5px 5px 15px; margin-left:10px;'>";
echo $com->text;
echo "</div>";
echo "</div>";
echo "<br/>";

?>


