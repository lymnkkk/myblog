<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PostModel */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common','Post Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('common','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('common','Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('common','Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'summary',
            'content:ntext',
            /*'label_img'=>[
                    'format'=>'raw',
                'attribute'=>'label_img',
                'value'=>function($model){
        return Html::img($model['label_img'],['height=>50','wideth=>50']);
                }
            ],*/
            'label_img',
            'cat_id',
            'user_id',
            'user_name',
            'is_valid',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
