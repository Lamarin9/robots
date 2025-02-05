<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Platform $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="platform-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-color']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
