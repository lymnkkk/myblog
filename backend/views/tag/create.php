<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TagModel */

$this->title = Yii::t('common','Create Tag Model');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common','Tag Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-model-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
