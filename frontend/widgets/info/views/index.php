<?php
use yii\helpers\Url;
use yii\helpers\Html;
use common\models\FansModel;
use yii\db\Query;
?>
<?php if(!empty($data)):?>
<div class="panel">
    <div class="panel-title box-title">
        <span><strong><?=$data['username']?></strong></span>
        &nbsp;
        <?php if($data['sex']==1){?><i class="fa fa-mars" style="font-weight: bold;color: cornflowerblue;"></i><?php }
        else if($data['sex']==2){?> <i class="fa fa-venus" style="color:pink;font-weight: bold;"></i> <?php }?><br/>
    </div>
    <div class="panel-body hot-body">

        <div class="clearfix hot-list">

            <div class="panel">
                <p class="" style="color: #6c6a5a; font-style: normal;">邮箱:&nbsp;<?=$data['email']?></p>
                <p style="color: #6c6a5a; font-style: normal;">所在地:&nbsp;<?=$data['location']?></p>
                <p style="color: #6c6a5a; font-style: normal;">简介:&nbsp;<?=$data['introduction']?></p>

            </div>

            <div class="media-right">
                <?php if($data['id']==Yii::$app->user->identity->id){?>
                     <?= Html::a('编辑个人信息', ['site/createinfo','id'=>Yii::$app->user->identity->id], ['class' => 'btn btn-default btn-quirk btn-block']) ?>
                    <!-- 创建文章-->

               <?php }else{?>
                    <?php if($data['att']=='no'){?>
                    <script type="text/javascript">
                        window.onload=function () {
                                document.getElementById("atten").style.display='block';
                                document.getElementById("noatten").style.display='none';
                        }
                    </script>
                    <?php }?>
                    <button type="button" id="atten" data-url="<?=Url::to(['member/attention','id'=>$data['id']])?>"
                            onclick="compute()" class='btn btn-primary j-feed' >关注</button>
                    <script type="text/javascript">
                     function compute(){
                         document.getElementById("atten").style.display='none';
                         document.getElementById("noatten").style.display='block';
                    }
                    </script>
                    <?php if($data['att']=='yes'){?>
                        <script type="text/javascript">
                            window.onload=function () {
                                document.getElementById("noatten").style.display='block';
                                document.getElementById("atten").style.display='none';
                            }
                        </script>
                    <?php }?>



                    <button type="button" id="noatten" data-url="<?=Url::to(['member/noattention','id'=>$data['id']])?>"
                            onclick="compute2()" class='btn btn-danger j-feed' style="display: none;" >取消关注</button>
                     <script type="text/javascript">
                            function compute2(){

                        // document.getElementById("result_1").value="1234";

                        document.getElementById("noatten").style.display='none';
                        document.getElementById("atten").style.display='block';

                    }
                    </script>



               <?php }?>


        </div>
        </div>

    </div>
    <?php if($data['id']==Yii::$app->user->identity->id){?>
    <!-- 创建文章-->
    <div class="panel a">
        <a href="<?=\yii\helpers\Url::to(['post/create'])?>" class="btn btn-primary btn-quirk btn-block">创建文章</a>
    </div>
    <?php }?>
</div>
<?php endif;?>
