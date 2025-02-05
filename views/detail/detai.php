<?php

use app\models\Detail;
use app\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DetailSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Добавление детали';
?>
<div class="detail-index">

    <h1><?= Html::encode($this->title) ?></h1>




<?   
  $details = $dataProvider->getModels();
echo "<div class='d-flex flex-row flex-wrap justify-content-start align-itemsend'>";
foreach ($details as $detail){
    $count = 0;
  $cat = Category::findOne(['id' => $detail->category_id]);
$c = $detail->count < 0 ? "text-danger" : '';
 echo "<div class='card m-3' style='width: 30%; min-width: 300px;'>
 <a href='/detail/view?id={$detail->id}'><img src='{$detail->icon}' alt='/web/{$detail->icon}' class='card-img-top'
style='height: 300px;' alt='icon'></a>
 <div class='card-body'>
 <h5 class='card-title'>{$detail->name}</h5>
 <p class='card-text'>Категория: {$cat->name}</p> 
 <p class='card-text {$c}'>{$detail->count} шт.</p>
 <p><a href='/detail/view?id={$detail->id}' class='btn-color btn'>Просмотр детали</a></p>
 <p><a href='/project-detail/add?mobi={$detail->id}&modi={$modi}' class='btn-color btn'>Добавить</a></p> ";

 echo "</div>
</div>";
}
echo "</div>"; 
 ?>

<script>
    function red(){
        const button1 = document.getElementById("btn2");
        button1.style.display: none;

    }
</script>


</div>
