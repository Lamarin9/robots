<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Detail $model */

$this->title = 'Создание детали';
?>
<div class="detail-create">

    <h1 style="color: LightSlateGray;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
