<?php

use app\models\MissDetail;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MissDetailSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Miss Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="miss-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Miss Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_miss',
            'icon',
            'category',
            'descritption',
            'comment',
            //'count',
            //'name',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MissDetail $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_miss' => $model->id_miss]);
                 }
            ],
        ],
    ]); ?>


</div>
