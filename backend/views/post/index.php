<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Postsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common','Post Models');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-model-index">

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
            'title'=>[
                'attribute'=>'title',
                'format'=>'raw',
                'value'=>function($model){
                    return '<a target="_blank"  href ="http://localhost/hyii2/frontend/web/post/view?id='.$model->id.'">'.$model->title.'</a>';
                },
                ],
            'summary',
            //'content:ntext',
            'label_img',
            'cat.cat_name',
            // 'user_id',
            // 'user_name',
             'is_valid'=>[
                 'attribute'=>Yii::t('common','is_valid'),
                 'value'=>function($model){

                      return ($model->is_valid ==1)?Yii::t('common','effected'):Yii::t('common','uneffected');

                     },
                 'filter'=>['1'=>Yii::t('common','effected'),'0'=>Yii::t('common','uneffected')],
                 ],
             'created_at:datetime',
             'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
