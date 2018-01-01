<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserModel */

$this->title = Yii::t('common','Control User Login:') . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common','User Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common','Update');
?>
<div class="user-model-update">

    <h2><?= Html::encode($this->title) ?></h2>
<br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
