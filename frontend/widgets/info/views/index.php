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
            email:<em><?=$data['email']?></em>
            </div>

            <div class="media-right">
                <?php if($data['id']==Yii::$app->user->identity->id){?>
                     <?= Html::a('编辑个人信息', ['site/createinfo','id'=>Yii::$app->user->identity->id], ['class' => 'btn btn-success btn-quirk btn-block']) ?>
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
                            onclick="compute()" class='btn btn-success btn-feed j-feed' >关注</button>
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
                            onclick="compute2()" class='btn btn-success btn-feed j-feed' style="display: none;" >取消关注</button>
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
</div>
<?php endif;?>
