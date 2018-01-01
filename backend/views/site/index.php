<?php

/* @var $this yii\web\View */

$this->title = Yii::t('common','BlogBackend');
$this->params['breadcrumbs'][]=$this->title;?>
<h1><?= 'Hello!'.Yii::$app->user->identity->username;?></h1>

