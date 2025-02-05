<?php

use app\models\ProjectMiss;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProjectMissSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Project Misses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-miss-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Project Miss', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_miss',
            'project_id',
            'id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProjectMiss $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_miss' => $model->id_miss]);
                 }
            ],
        ],
    ]); ?>


</div>
