<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Detail $model */

$this->title = 'Изменение детали: ' . $model->name;
?>
<div class="detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
