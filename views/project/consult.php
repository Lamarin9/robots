<?php

use app\models\Project;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProjectSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Проекты';
?>
<div class="project-index">

    <h1 style="color: LightSlateGray;"><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            ['attribute'=>'Иконка', 'format'=>'html', 'value'=>function($data){return Html::img('../'.$data->icon,['class' => 'logo_img']);}],
                'name',
            ['attribute'=>'Платформа', 'value'=> function($data){return $data->getPlatform()->One()->name;}],
            'comment',
            'date_created',
            ['attribute' => 'date_close', 'value' => function ($data) {
                if ($date_close = Project::find()->where(['id' => $data->id])->one()->date_close) {
                return $date_close;
                } else {
                return 'Проект в работе';
                }
                }, 'label' => 'Дата закрытия'],
            ['attribute' => 'user_id', 'value' => function ($data) {
                if (!empty($data->getUser()->One()->username)){
                    return $data->getUser()->One()->username;
                } else {
                return 'Консультант еще не задан(';
                }
                }, 'label' => 'Консультант'],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Project $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                 'template' => '{view}'
            ],
        ],
    ]); ?>


</div>
