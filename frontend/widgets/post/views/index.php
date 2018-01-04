<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<div class="panel">
    <div class="panel-title box-title">
        <span><?=$data['title']?></span>
        <?php if($this->context->more):?>

        <?php endif;?>
    </div>
    <div class="new-list">
        <?php foreach ($data['body'] as $list):?>
            <div class="panel-body border-bottom">
                <div class="row">
                    <div class="col-lg-4 label-img-size">
                        <a href="#" class="post-label">
                            <img src="<?=($list['label_img']?\Yii::$app->params['upload_url'].$list['label_img']:\Yii::$app->params['default_label_img'])?>" alt="<?=$list['title']?>">
                        </a>
                    </div>
                    <div class="col-lg-8 btn-group">
                        <h1><a href="<?=Url::to(['post/view','id'=>$list['id']])?>"><?=$list['title']?></a></h1>
                        <span class="post-tags">
                        <span class="glyphicon glyphicon-user"></span><a href="<?=Url::to(['member/index','id'=>$list['user_id']])?>"><?=$list['user_name']?></a>&nbsp;
                        <span class="glyphicon glyphicon-time"></span><?=date('Y-m-d',$list['created_at'])?>&nbsp;
                        <span class="glyphicon glyphicon-eye-open"></span><?=isset($list['extend']['browser'])?$list['extend']['browser']:0?>&nbsp;

                        <p class="post-content"><?=$list['summary']?></p>
                        <a href="<?=Url::to(['post/view','id'=>$list['id']])?>"><button class="btn  btn-default no-radius btn-sm pull-right " style="color: #6c6a5a;">阅读全文</button></a>
                    </div>
                </div>
                <div class="tags">
                    <?php if(!empty($list['tags'])):?>
                        <span class="fa fa-tags"></span>
                        <?php foreach ($list['tags'] as $lt):?>
                            <a href="#"><?=$lt?></a>，
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <?php if($this->context->page):?>
        <div class="page"><?=LinkPager::widget(['pagination' => $data['page']]);?></div>
    <?php endif;?>
</div>