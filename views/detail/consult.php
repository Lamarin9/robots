<?php

use app\models\Detail;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DetailSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Детали';
?>
<div class="detail-index">

    <h1 style="color: LightSlateGray;"><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php
  $details = Detail::find()->orderBy(['id' => SORT_DESC])->all();
  echo "<div class='d-flex flex-row flex-wrap justify-content-start align-itemsend'>";
  foreach ($details as $detail) {
    if ($detail->count > 0) {
      echo "<div class='card m-1' style='width: 22%; min-width: 300px;'>
 <a><img src='{$detail->icon}' class='card-img-top zoom-effect'
style='height:300px; width:298px; background-position:center; background-size:cover; background-repeat: no-repeat;' alt='image'></a>
 <div class='card-body'>
 <h5 class='card-title'>{$detail->name}</h5>
 <p>Описание: {$detail->description}</p>
 <p class='text-danger'>Количество: {$detail->count}</p>";
    }
  }
  echo "</div>";
  ?>


</div>
