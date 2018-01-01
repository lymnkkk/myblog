<?php
/**
 * Created by PhpStorm.
 * User: lymn
 * Date: 2017/12/31
 * Time: 16:08
 */

use frontend\widgets\searchPost\SearchPostWidget;
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
        <?=SearchWidget::widget()?>
        <?=SearchPostWidget::widget(['limit'=>6,'keyword'=>$_GET['q']])?>


    </div>
    <div class="col-lg-3">
        <!-- 创建文章-->
        <div class="panel">
            <a href="<?=\yii\helpers\Url::to(['post/create'])?>" class="btn btn-danger btn-quirk btn-block">创建文章</a>
        </div>
        <!-- 热门浏览组件-->
        <?=HotWidget::Widget()?>
        <!--标签云组件-->
        <?=TagWidget::Widget()?>
    </div>
</div>
>>>>>>> 2a77ec048a2ee716dbf8e6ae7b9d8452f107a430
