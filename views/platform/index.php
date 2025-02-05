<?php

use app\models\Platform;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PlatformSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Управление платформами';
?>
<div class="platform-index">

    <h1 style="color: LightSlateGray;"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать платформу', ['create'], ['class' => 'btn btn-color']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Platform $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
