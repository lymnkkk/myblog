<?php


namespace frontend\widgets\chat;

use common\models\FeedModel;
use Yii;
use yii\base\Widget;
use yii\base\Object;
use frontend\models\FeedForm;
use yii\data\Pagination;

class ChatWidget extends Widget
{
    public $id;       //文章id
    public $page=true;
    public $limit=6;
    public function run(){

        $feed=new FeedForm();

        $curPage=Yii::$app->request->get('page',1);

        $cond=['=','post_id',$this->id];
        $curPage=Yii::$app->request->get('page',1);
        $res=$feed->getList($cond,$curPage,$this->limit);
        $data['feed']=$res['data'];
        $data['id']=$this->id;


        //分页显示
        if($this->page){
            $pages=new Pagination(['totalCount'=>$res['count'],'pageSize'=>$res['pageSize']]);
            $data['page']=$pages;
        }
        return $this->render('index',['data'=>$data]);
    }

}