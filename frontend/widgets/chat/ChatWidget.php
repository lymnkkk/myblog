<?php


namespace frontend\widgets\chat;

use Yii;
use yii\base\Widget;
use yii\base\Object;
use frontend\models\FeedForm;

class ChatWidget extends Widget
{
    public $id;
    public function run(){

        $feed=new FeedForm();
//        $feed->_getPostId($this->id);

        $data['feed']=$feed->getList($this->id);

        return $this->render('index',['data'=>$data]);
    }


}