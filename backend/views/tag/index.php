<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Tagsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common','Tag Models');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-model-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<br>
    <p>

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tag_name',
            'post_num',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
