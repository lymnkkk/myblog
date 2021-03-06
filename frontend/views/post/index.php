<?php
/**
 * Created by PhpStorm.
 * User: jx
 * Date: 2017/12/12
 * Time: 21:44
 */
use frontend\widgets\post\PostWidget;
use yii\base\Widget;
use frontend\widgets\hot\HotWidget;
use frontend\widgets\tag\TagWidget;
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\widgets\search\SearchWidget;

if(isset($_POST['q']))
    echo $_POST['q'];

?>
<div class="row">
    <div class="col-lg-9">
        <div class="panel">
        <?=SearchWidget::widget()?>
        </div>
        <?=PostWidget::widget(['limit'=>6])?>

    </div>
    <div class="col-lg-3">
        <!-- 创建文章-->
        <div class="panel a">
            <a href="<?=\yii\helpers\Url::to(['post/create'])?>" class="btn btn-primary btn-quirk btn-block">创建文章</a>
        </div>
    <!-- 热门浏览组件-->
        <?=HotWidget::Widget()?>
    <!--标签云组件-->
        <?=TagWidget::Widget()?>
    </div>
</div>
