<?php
use yii\helpers\Url;
use yii\bootstrap\Html;
use yii\widgets\LinkPager;
?>
<div class="panel">
<div class="panel-title box-title" style="border-bottom:none">
    <span><strong>评论</strong></span>
    <span class="pull-right"><a href="" class="font-12">更多>></a></span>
</div>
<div class="pannel-boy">
    <form id="w0" action="/" method="post">
        <div class="form-group input-group field-feed-content required">
            <textarea name="" id="feed-content" cols="30" rows="10" class="form-control" name="content">

            </textarea>
             <span class="input-group-btn">
                 <button type="button" data-url="<?=Url::to(['post/add-feed','id'=>$data['id']])?>" class='btn btn-success btn-feed j-feed'>发布</button>
<!--            <button type="button" data-url="--><?//=Url::to(['post/add-feed'])?><!--" class='btn btn-success btn-feed j-feed'>发布</button>-->
            </span>
        </div>
    </form>

    <?php if(!empty($data['feed'])):?>
        <ul class="media-list media-feed feed-index ps-container ps-active-y">
            <?php foreach($data['feed'] as $list):?>
                <li class="media" style="border-bottom: 1px solid gainsboro">
                    <div class="media-left"><a href="#" rel="author" data-original-title="" title="">
                            <img width="30px" src="<?=($list['user']['avatar'])?$list['user']['avatar']:\Yii::$app->params['default_label_img'];?>"/>
                        </a></div>
                    <div class="media-body" style="font-size: 12px;">
                        <div class="media-content">
                            <?=$list['user']['username']?>说:<?=$list['content']?>
                        </div>
                        <div class="media-action">
                            <?=date('Y-m-d h:i:s',$list['created_at'])?>
                        </div>
                    </div>
                    <?php if($list['user_id']==Yii::$app->user->identity->id){?>
                    <div style="float: left; ">
                        <?= Html::a('删除评论', ['post/deletechat', 'id' => $list['id'],'postid'=>$data['id']]) ?>
                    </div>
                    <?php }?>
                </li>
            <?php endforeach;?>
        </ul>
    <?php endif;?>
    <?php if($this->context->page):?>
        <div class="page"><?=LinkPager::widget(['pagination' => $data['page']]);?></div>
    <?php endif;?>
</div>
</div>