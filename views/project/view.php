<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Project;
use app\models\Document;
use app\models\ProjectDetail;
use app\models\Detail;
use app\models\User;

/** @var yii\web\View $this */
/** @var app\models\Project $model */

$this->title = $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
    <?php     if (Yii::$app->user->identity->isConsultant($model)){
     echo "<a href='/document/create?modi={$model->id}' class='btn-color btn '>Добавить документацию</a>"; 

    echo "<a href='/detail/detai?modi={$model->id}' class='btn-color btn '>Добавить деталь</a>"; 
} ?>
<?php     if (Yii::$app->user->identity->isAdmin($model)){
      echo "<a href='/project/close?id={$model->id}' class='btn-danger btn '>Завершить проект</a>";
} ?>


</p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            ['attribute'=>'Категория', 'value'=> function($data){return $data->getPlatform()->One()->name;}],
            'name',
            ['attribute'=>'Иконка', 'format'=>'html', 'value'=>function($data){return Html::img('../'.$data->icon,['class' => 'logo_img']);}],
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
        ],
    ]) ?>

<? 
   $dops = Document::find()->where(['project_id' => $model->id])->all();


 if (!empty($dops)) {
    echo "<h3>Докуметация </h3>";
    echo "<div class='d-flex flex-row flex-wrap justify-content-start align-itemsend'>";
    foreach ($dops as $dop){
        if (empty($dop->src)){
            echo "<div style='padding:1rem; display:wrap; color:black;'> 
            <a href='/document/view?id={$dop->id}'  style='color:black;'>{$dop->text} </a>
        
            </div>";
        } else {

 echo "<div style='width: 25%; min-width: 300px;'>
 <img src='{$dop->src}'
style='height: 300px;' alt='image'>
</div>";
}
 }
 echo  "</div>";

}

 ?>

<? 
   $pr_details = ProjectDetail::find()->where(['project_id' => $model->id])->all();


 if (!empty($pr_details)) {
    echo "<h3>Детали </h3>";
    echo "<div class='d-flex flex-row flex-wrap justify-content-start align-itemsend'>";
    foreach ($pr_details as $pr_detail){

    $detail = Detail::find()->where(['id' => $pr_detail->id])->one();

    echo "<div class='card m-3' style='width: 30%; min-width: 300px;'>
    <a href='/detail/view?id={$detail->id}'><img src='{$detail->icon}' alt='/web/{$detail->icon}' class='card-img-top'
   style='height: 300px;' alt='icon'></a>
    <div class='card-body'>
    <h5 class='card-title'>{$detail->name}</h5>
    <p class='card-text'>{$pr_detail->count} шт.</p>
    <p><a href='/detail/view?id={$detail->id}' class='btn-color btn'>Просмотр детали</a></p> ";
   
    echo "</div>
   </div>";}
    echo "</div>"; }
else{
    echo "Нет деталей";
}

 ?>

</div>
