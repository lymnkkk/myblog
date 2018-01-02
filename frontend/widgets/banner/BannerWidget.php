<?php
namespace frontend\widgets\banner;

use Yii;
use yii\bootstrap\Widget;

class BannerWidget extends Widget{
    public $items=[];
    public function init(){
        if(empty($this->items)){
            $this->items=[
                    [ 'label'=>'demo',
                        'image_url'=>'/image/banner/001.jpg',
                        'url'=>['site/index'],
                        'html'=>'',
                        'active'=>'active',
                    ],
                    [ 'label'=>'demo',
                        'image_url'=>'/image/banner/002.jpg',
                        'url'=>['site/index'],
                        'html'=>'',
                        'active'=>'',
                    ],
                    [ 'label'=>'demo',
                        'image_url'=>'/image/banner/003.jpg',
                        'url'=>['site/index'],
                        'html'=>'',
                        'active'=>'',
                    ],
            ];
        }
    }

    public function run(){
        $data['items']=$this->items;
        return $this->render('index',['data'=>$data]);
    }
}