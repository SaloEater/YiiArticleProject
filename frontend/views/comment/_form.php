<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */
/* @var $form yii\widgets\ActiveForm */
/* @var $action string*/
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin([
        'action' => $action ?? null
    ]);
    echo $form->field($model, 'id')->hiddenInput(['value' => $model->id])->label(false);
    echo $form->field($model, 'parent_id')->hiddenInput(['value' => $model->parent_id])->label(false);
    echo $form->field($model, 'article_id')->hiddenInput(['value' => $model->article_id])->label(false);
    echo $form->field($model, 'created_at')->hiddenInput(['value' => $model->created_at])->label(false);
    echo $form->field($model, 'created_by')->hiddenInput(['value' => $model->created_by])->label(false);
    ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 2])->label("Оставьте комментарий") ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
