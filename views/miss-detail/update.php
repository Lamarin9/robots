<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MissDetail $model */

$this->title = 'Update Miss Detail: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Miss Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id_miss' => $model->id_miss]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="miss-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
