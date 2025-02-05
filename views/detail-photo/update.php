<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DetailPhoto $model */

$this->title = 'Update Detail Photo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Detail Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detail-photo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
