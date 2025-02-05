<?php

use app\models\Detail;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DetailSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Управление деталями';
?>
<div class="detail-index">

    <h1 style="color: LightSlateGray;"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать деталь', ['create'], ['class' => 'btn btn-color']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'name',
            ['attribute'=>'Иконка', 'format'=>'html', 'value'=>function($data){return Html::img('../'.$data->icon,['class' => 'logo_img']);}],
            ['attribute'=>'Категория', 'value'=> function($data){return $data->getCategory()->One()->name;}],
            'description',
            'comment',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Detail $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
