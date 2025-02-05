<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\MissDetail $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Miss Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="miss-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_miss' => $model->id_miss], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_miss' => $model->id_miss], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_miss',
            'icon',
            'category',
            'descritption',
            'comment',
            'count',
            'name',
        ],
    ]) ?>

</div>
