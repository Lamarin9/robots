<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Platform $model */

$this->title = 'Создать платформу';
?>
<div class="platform-create">

    <h1 style="color: LightSlateGray;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
