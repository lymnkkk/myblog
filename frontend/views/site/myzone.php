<?php
/**
 * Created by PhpStorm.
 * User: jx
 * Date: 2017/12/11
 * Time: 17:26
 */

//echo '这是我的空间';
use yii\base\Widget;
use frontend\widgets\zone\ZoneWidget;
use frontend\widgets\info\InfoWidget;


?>

<div class="row">
    <div  class="col-lg-9">
           <?=ZoneWidget::widget()?>
    </div>
    <div class="col-lg-3">
           <?=InfoWidget::widget()?>
    </div>
</div>
