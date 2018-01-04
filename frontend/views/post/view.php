<?php
/**
 * Created by PhpStorm.
 * User: lymn
 * Date: 2017/12/23
 * Time: 20:04
 */
     use frontend\widgets\chat\ChatWidget;
     use yii\base\Widget;
     use yii\helpers\Url;
     use frontend\widgets\hot\HotWidget;
     use yii\helpers\Html;

    $this->title=$data['title'];
    $this->params['breadcrumbs'][]=['label'=>'文章','url'=>['post/index']];
    $this->params['breadcrumbs'][]=$this->title;
?>

<div class="row">
    <div class="col-lg-9">
        <div class="page-title">
            <h1><?=$data['title']?></h1>
            <span>作者：<a href="<?=Url::to(['member/index','id'=>$data['user_id']])?>"><?=$data['user_name']?></a></span>
            <span>发布：<?=date('Y-m-d',$data['created_at'])?></span>
            <span>浏览：<?=isset($data['extend']['browser'])?$data['extend']['browser']:0?></span>

        </div>

        <div class="page-content">
            <?=$data['content']?>
        </div>

        <div class="panel">
            <div class="page-tag">
            标签：
                <?php foreach ($data['tags'] as $tag) :?>
                    <span><a href="#"><?=$tag?></a></span>
                <?php endforeach;?>
            </div>
        </div>


        <?=ChatWidget::widget(['id'=>$data['id']])?>



    </div>
    <div class="col-lg-3">
        <!--创建文章和更新文章 -->
        <div class="panel">
            <?php if(!Yii::$app->user->isGuest&&$data['user_id']==Yii::$app->user->identity->id){?>
                <?= Html::a('编辑文章', ['update', 'id' => $data['id']], ['class' => 'btn btn-default btn-quirk btn-block']) ?>
                <?= Html::a('删除文章', ['delete', 'id' => $data['id']], ['class' => 'btn btn-danger btn-quirk btn-block']) ?>
            <?php }?>
<!--            <a href="--><?//=\yii\helpers\Url::to(['post/create'])?><!--" class="btn btn-danger btn-quirk btn-block">创建文章</a>-->
        </div>
        <!--标签云组件 -->
        <?=HotWidget::Widget()?>



     </div>
</div>

