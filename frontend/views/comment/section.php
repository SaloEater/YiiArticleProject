<?php

use common\models\Comment;
/* @var $userId integer*/
/* @var $comments Comment[]*/
/* @var $nestedLevel integer*/

foreach ($comments as $com) {
    echo $this->render('\..\comment\_comment',
        [
            'com'=>$com,
            'isOwner' => $userId == $com->created_by ?? false,
            'leftValue' => ($nestedLevel*15)
        ]
    );
    echo $this->render('\..\comment\section',
        [
            'userId'=>$userId,
            'comments' => $com->comments,
            'nestedLevel' => $nestedLevel>4?$nestedLevel:$nestedLevel+1
        ]
    );
}
