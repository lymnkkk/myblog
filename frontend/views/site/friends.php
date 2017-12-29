<?php
/**
 * Created by PhpStorm.
 * User: Draco
 * Date: 2017/12/26
 * Time: 20:26
 */

//echo '这是朋友圈';
use yii\base\Widget;
use frontend\widgets\friends\FriendsWidget;

?>

<div class="row">
    <div  class="col-lg-9">
        <?=FriendsWidget::widget()?>
    </div>
</div>


