<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Catsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common','Cat Models');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-model-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<br>
    <p>
     <?= Html::a(Yii::t('common','Create Cat Model'),['create'],['class'=>'btn btn-success'])?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cat_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
