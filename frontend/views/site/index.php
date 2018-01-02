<?php

/* @var $this yii\web\View */
use frontend\widgets\banner\BannerWidget;
use frontend\widgets\post\PostWidget;
use yii\base\Widget;

use frontend\widgets\hot\HotWidget;
use frontend\widgets\tag\TagWidget;



$this->title='博客-首页';
?>
<div class="row">
    <div class="col-lg-9">
        <div class="panel">
        <?=BannerWidget::widget()?>
        </div>
        <?=PostWidget::widget(['page'=>false])?>
    </div>
    <div class="col-lg-3">

        <!--热门浏览-->
        <?=HotWidget::widget()?>
        <!--标签云-->
        <?=TagWidget::widget()?>


    </div>
</div>


<!--
<div class="main">
    <div class="center">
        <div class="pub">
            <img class = "middle" src="<?= Yii::$app->params['avatar']['smallhead'] ?>" >


            <img class="gra" src="./statics/images/material/text.png"  onMouseOver="this.src='./statics/images/material/text_c.png'" onMouseOut="this.src='./statics/images/material/text.png'">
            <img class="gra" src="./statics/images/material/pic.png"  onMouseOver="this.src='./statics/images/material/pic_c.png'" onMouseOut="this.src='./statics/images/material/pic.png'">
            <img class="gra" src="./statics/images/material/music.png" onMouseOver="this.src='./statics/images/material/music_c.png'" onMouseOut="this.src='./statics/images/material/music.png'">
            <img class="gra" src="./statics/images/material/video.png" onMouseOver="this.src='./statics/images/material/video_c.png'" onMouseOut="this.src='./statics/images/material/video.png'">
            <img class="gra" src="./statics/images/material/article.png" onMouseOver="this.src='./statics/images/material/article_c.png'" onMouseOut="this.src='./statics/images/material/article.png'">

            <ul>
                <li>文字</li>
                <li>图片</li>
                <li>音乐</li>
                <li>视频</li>
                <li>文章</li>
            </ul>

        </div>
        <div class="per">
            <div class="per_one">
                <?php if(!Yii::$app->user->isGuest){?>
                    <a href="../site/personalhp.php"><label class="per_name"><?= Yii::$app->user->identity->username ?><i class="fa fa-arrow-right" style="margin-left:110px;"></i></label></a>

                <?php }?>

            </div>

            <div class="per_child">
                <p><i class="fa fa-bank" style="margin-left: 18px; margin-right: 3px;"></i>首页推荐</p>
            </div>

            <div class="per_child">
                <p><i class="fa fa-file-text" style="margin-left: 20px;margin-right: 5px;"></i>文章</p></a>
            </div>
            <div class="per_child">
                <p><i class="fa fa-user" style="margin-left: 20px; margin-right: 5px;"></i>关注</p>
            </div>
            <div class="per_child">

                <p><i class="fa fa-heart" style="margin-left:20px; margin-right: 5px;"></i>喜欢</p>
            </div>

        </div>

        <div class="content">
            <div class="content_child">
                <img src="<?= Yii::$app->params['avatar']['middle'] ?>" width="60" height="60">
                <div class="text">
                </div>
            </div>

            <div class="content_child">
                <img src="<?= Yii::$app->params['avatar']['middle'] ?>" width="60" height="60">
                <div class="text">
                </div>
            </div>

            <div class="content_child">
                <img src="<?= Yii::$app->params['avatar']['middle'] ?>" width="60" height="60">
                <div class="text">
                </div>
            </div>

            <div class="content_child">
                <img src="<?= Yii::$app->params['avatar']['middle'] ?>" width="60" height="60">
                <div class="text">
                </div>
            </div>
        </div>

    </div>
</div>
-->
<!--<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
-->
