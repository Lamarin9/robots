<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MissDetailSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="miss-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_miss') ?>

    <?= $form->field($model, 'icon') ?>

    <?= $form->field($model, 'category') ?>

    <?= $form->field($model, 'descritption') ?>

    <?= $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'count') ?>

    <?php // echo $form->field($model, 'name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
