<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\Option;

/** @var yii\web\View $this */
/** @var app\models\Detail $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icon')->fileInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'category_id')->dropDownList(
        Category::find()->select(['name', 'id'])->indexBy('id')->column(),['value' => Category::findOne(Option::findOne(1)->category_id)]
    )?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-color']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
