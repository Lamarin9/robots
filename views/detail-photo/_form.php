<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DetailPhoto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detail-photo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'detail_id')->hiddenInput(['value' => $modi])->label(false) ?>

    <?= $form->field($model, 'photo')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
