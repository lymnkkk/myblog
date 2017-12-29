<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<?php if(!empty($data)):?>
<div class="panel">
    <div class="panel-title box-title">
        <span><strong><?=$data['username']?></strong></span>
        &nbsp;
        <?php if($data['sex']==1){?><i class="fa fa-mars" style="font-weight: bold;color: cornflowerblue;"></i><?php }
        else if($data['sex']==2){?> <i class="fa fa-venus" style="color:pink;font-weight: bold;"></i> <?php }?><br/>
    </div>
    <div class="panel-body hot-body">

        <div class="clearfix hot-list">

            <div class="panel">
            email:<em><?=$data['email']?></em>
            </div>

            <div class="media-right">
                <?php if($data['id']==Yii::$app->user->identity->id){?>
                     <?= Html::a('编辑个人信息', ['site/createinfo','id'=>Yii::$app->user->identity->id], ['class' => 'btn btn-success btn-quirk btn-block']) ?>
               <?php }else{?>
                    <?= Html::a('关注', ['site/createinfo','id'=>Yii::$app->user->identity->id], ['class' => 'btn btn-success btn-quirk btn-block']) ?>
               <?php }?>

<!--             <a href="--><?//=\yii\helpers\Url::to(['site/createinfo'])?><!--" class="btn btn-danger btn-quirk btn-block">编辑资料</a>-->
        </div>
        </div>

    </div>
</div>
<?php endif;?>
