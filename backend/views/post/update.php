<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PostModel */

$this->title = Yii::t('common','Update Post Model:') . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common','Post Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common','Update');
?>
<div class="post-model-update">

    <h2><?= Html::encode($this->title) ?></h2>
<br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
