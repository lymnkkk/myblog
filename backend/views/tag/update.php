<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TagModel */

$this->title = Yii::t('common','Update Tag Model: ') . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tag Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common','Update');
?>
<div class="tag-model-update">

    <h2><?= Html::encode($this->title) ?></h2>
<br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
