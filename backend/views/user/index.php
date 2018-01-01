<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel common\models\Usersearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common','User Models');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-model-index">
    <p>
    <h2><?= Html::encode($this->title) ?></h2>
    </p>
    <br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'auth_key',

            //'password_hash',
            //'password_reset_token',
            // 'email_validate_token:email',
             'email:email',
            // 'role',

            'status'=>[
                  'label'=>Yii::t('common','Status'),
                 'attribute'=>'status',
                 'value'=>function($model){

                      return ($model->status ==10)?Yii::t('common','active'):Yii::t('common','frozen');

                     },
                 'filter'=>['0'=>Yii::t('common','frozen'),'10'=>Yii::t('common','active')],
             ],
            //'avatar',//头像
            // 'vip_lv',
             'created_at:datetime',//注册时间
            // 'updated_at',
             'sex',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
