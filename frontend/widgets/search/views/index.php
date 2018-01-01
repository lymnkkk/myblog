<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="panel">
<form  method="get">
    <input type="text" class="form-control" name="q" id="q" placeholder="搜索">
    <script type="text/javascript">
        window.onload=function () {

        }
    </script>
    <?= Html::a('搜索', ['post/search',], ['class' => 'btn btn-success btn-quirk btn-block']) ?>

<!--  <a href="--><?//=Url::to(['post/search'])?><!--"><button type="submit" class="btn btn-warning no-radius btn-sm pull-right">搜索</button></a>-->

</form>
</div>
<?php
//if(isset($_POST['q']))
//    echo $_POST['q'];
//?>


<!--<form id="w0" action="/" method="post">-->
<!--    <div class="form-group input-group field-feed-content required">-->
<!--            <input type="text" class="form-control" name="q" placeholder="搜索">-->
<!---->
<!---->
<!--        <span class="input-group-btn">-->
<!--                 <button type="submit" data-url="--><?//=Url::to(['post/search'])?><!--" class='btn btn-success btn-feed j-feed'>搜索</button>-->
<!--            <!--            <button type="button" data-url="-->--><?////=Url::to(['post/add-feed'])?><!--<!--" class='btn btn-success btn-feed j-feed'>发布</button>-->-->
<!--            </span>-->
<!--    </div>-->
<!--</form>-->


