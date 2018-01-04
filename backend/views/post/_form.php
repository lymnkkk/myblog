<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\widgets\file_upload\FileUpload;


/* @var $this yii\web\View */
/* @var $model common\models\PostModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <p>
    <a target="_blank"  href="<?='http://dracoooo.cn/web/'.$model['label_img']?>" ><img style="width:50%;height:50%;" src="<?='http://dracoooo.cn/web/'.$model['label_img'] ?>"></a>
    </p>

    <?= Html::a(Yii::t('common','Delete Label Image'), ['deletelabelimg', 'id' => $model['id']], ['class' => 'btn btn-success']) ?>
    <p>
    <br>
    </p>

    <?= $form->field($model, 'is_valid')->dropDownList(['1'=>Yii::t('common','effected'),'0'=>Yii::t('common','uneffected')]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('common','Create') : Yii::t('common','Save'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
