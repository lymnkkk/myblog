<?php
/**
 * Created by PhpStorm.
 * User: lymn
 * Date: 2017/12/28
 * Time: 20:57
 */
use frontend\widgets\zone\ZoneWidget;
use frontend\widgets\info\InfoWidget;
?>

<div class="row">
    <div class="col-lg-9">
        <?=ZoneWidget::widget(['cond'=>['=','user_id',$data['id']],'title'=>$data['username'].'的文章'])?>
    </div>
    <?php if(!Yii::$app->user->isGuest){?>
    <div class="col-lg-3">
        <?=InfoWidget::widget(['id'=>$data['id']])?>
    </div>
    <?php }?>
</div>
