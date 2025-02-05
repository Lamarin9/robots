<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProjectDetail $model */

$this->title = 'Create Project Detail';
$this->params['breadcrumbs'][] = ['label' => 'Project Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
