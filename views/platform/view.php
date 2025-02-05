<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Platform $model */

$this->title = $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="platform-view">

    <h1 style="text-align:center"><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
        ],
    ]) ?>

</div>
