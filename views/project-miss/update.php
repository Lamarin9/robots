<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProjectMiss $model */

$this->title = 'Update Project Miss: ' . $model->id_miss;
$this->params['breadcrumbs'][] = ['label' => 'Project Misses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_miss, 'url' => ['view', 'id_miss' => $model->id_miss]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-miss-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
