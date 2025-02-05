<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Platform;
use app\models\User;
use app\models\Option;

/** @var yii\web\View $this */
/** @var app\models\Project $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'platform_id')->dropDownList(
        Platform::find()->select(['name', 'id'])->indexBy('id')->column(),['value' => Platform::findOne(Option::findOne(1)->platform_id)]
    )?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icon')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        User::find()->select(['username', 'id'])->indexBy('id')->column(),['prompt'=> 'Выберите консультанта']
    )?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-color']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
