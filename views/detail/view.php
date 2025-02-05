<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use app\models\DetailPhoto;

/** @var yii\web\View $this */
/** @var app\models\Detail $model */

$this->title = $model->name;

\yii\web\YiiAsset::register($this);
?>
<div class="detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            ['attribute'=>'Иконка', 'format'=>'html', 'value'=>function($data){return"<img
                src='{$data->icon}' alt='photo' style='width: 200px;'>";}],
            'category_id',
            'description',
            'comment',
            ['attribute'=>'count', 'format'=>'html', 'value'=>function($data){
                $c = $data->count < 0 ? "text-danger" : '';
                return "<p class='{$c}'>$data->count <p/>";}],
        ],
    ]) ?>



<?
        
        if (Yii::$app->user->identity->isAdmin()){
        
            echo (
                "<a href='/detail-photo/create?modi={$model->id}' class='btn-color btn'>Добавить фото</a>");
        }
        ?>

<? 
   $dops = DetailPhoto::find()->where(['detail_id' => $model->id])->all();

echo "<div class='d-flex flex-row flex-wrap justify-content-start align-itemsend'>";
 if (!empty($dops)) {
    foreach ($dops as $dop){

 echo "<div class='card m-3' style='width: 30%; min-width: 300px;'>
 <img src='{$dop->photo}' alt='/web/{$dop->photo}' class='card-img-top'
style='height: 300px;' alt='image'>
</div>";}
}
else{
    echo "Нет фото";
}
echo "</div>"; 
 ?>






</div>
