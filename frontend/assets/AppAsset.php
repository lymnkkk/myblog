<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'statics/css/site.css',
        'statics/css/font-awesome-4.7.0/css/font-awesome.css',
        'statics/css/blog.css',
        'statics/css/create.css',
        'statics/css/view.css',
        'statics/css/post-view.css',
        'statics/css/chat-view.css',
        'statics/css/hot-view.css',
        'statics/css/tag-view.css',
    ];
    public $js = [
        'statics/js/site.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
