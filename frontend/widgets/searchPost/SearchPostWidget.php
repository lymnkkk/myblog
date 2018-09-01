<?php
/**
 * Created by PhpStorm.
 * User: lymn
 * Date: 2017/12/24
 * Time: 11:29
 */
namespace frontend\widgets\searchPost;

/**
 * 文章列表组件
 */
use common\models\PostModel;
use common\models\RelationPostTagsModel;
use common\models\TagModel;
use Yii;
use yii\base\Widget;
use yii\data\Pagination;
use frontend\models\PostForm;
use yii\helpers\Url;

class SearchPostWidget extends Widget{
    /**
     * @var 文章列表总标题
     */
    public $title='';

    /**
     * @var int显示条数
     */
    public $limit=6;

    /**
     * @var bool 是否显示更多
     */
    public $more=true;

    /**
     * @var bool 是否显示分页
     */
    public $page=true;
    public $tag='';


    public $keyword='';


    public function run(){
        //查询条件

        if(empty($this->keyword)) {
            $res = null;
        }
        else{
            //数据库匹配
            $curPage=Yii::$app->request->get('page',1);
            $cond="title like '%{$this->keyword}%' or content like '%{$this->keyword}%'";
            $res=PostForm::getList($cond,$curPage,$this->limit);
        }

        $result['title']=$this->title?:'搜索结果';
        $result['more'] = Url::to(['post/index']);
        $result['body'] = $res['data'] ?: [];

        //分页显示
        if($this->page){
            $pages=new Pagination(['totalCount'=>$res['count'],'pageSize'=>$res['pageSize']]);
            $result['page']=$pages;
        }
        return $this->render('index',['data'=>$result]);
    }
}