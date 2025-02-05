<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MissDetail $model */

$this->title = 'Create Miss Detail';
$this->params['breadcrumbs'][] = ['label' => 'Miss Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="miss-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
