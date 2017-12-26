<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<?php if(!empty($data)):?>
<div class="panel">
    <div class="panel-title box-title">
        <span><strong><?=$data['username']?></strong></span>
    </div>
    <div class="panel-body hot-body">

        <div class="clearfix hot-list">

                <a href="#">email:<em><?=$data['email']?></em></a>

            <div class="media-right">
                <?= Html::a('编辑个人信息', ['site/createinfo','id'=>Yii::$app->user->identity->id], ['class' => 'btn btn-success btn-quirk btn-block']) ?>
<!--             <a href="--><?//=\yii\helpers\Url::to(['site/createinfo'])?><!--" class="btn btn-danger btn-quirk btn-block">编辑资料</a>-->
        </div>
        </div>

    </div>
</div>
<?php endif;?>
