
<?php
/**
 * Created by PhpStorm.
 * User: jx
 * Date: 2017/12/21
 * Time: 18:03
 */
   use yii\bootstrap\ActiveForm;
   use yii\bootstrap\Html;

   $this->title='编辑个人资料';
   $this->params['breadcrumbs'][]=['label'=>'个人空间','url'=>['site/myzone']];
   $this->params['breadcrumbs'][]=$this->title;
?>

<div class="row">
    <div class="col-lg-9">
        <div class="panel-title box-title box-title-style">
            <span>更改个人资料</span>
        </div>
        <div class="panel-body">
            <?php $form=ActiveForm::begin()?>

            <?=$form->field($data,'email')->textinput(['maxlength'=>true])?>
            <?=$form->field($data,'username')->textinput(['maxlength'=>true])?>
            <?=$form->field($data, 'sex')->radioList(['1'=>'男','2'=>'女']) ?>
            <?=$form->field($data,'location')->textinput(['maxlength'=>true])?>
            <?=$form->field($data,'introduction')->textinput(['maxlength'=>true])?>

            <?=Html::submitButton('发布',['class'=>'btn btn-primary'])?>

            <div class="form-group">
            <?php ActiveForm::end()?>
            </div>
        </div>


<!--    <div class="col-lg-3">-->
<!--            <div class="panel-title box-title">-->
<!--                <span>注意事项</span>-->
<!--            </div>-->
<!--            <div class="panel-body">-->
<!--                <p>1.dbfshbfjhbsjh</p>-->
<!--                <p>2.dbfhbhfbsdfh</p>-->
<!--            </div>-->
<!--    </div>-->
</div>
