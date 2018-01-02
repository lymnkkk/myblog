<?php
/**
 * Created by PhpStorm.
 * User: lymn
 * Date: 2017/12/24
 * Time: 11:29
 */
namespace frontend\widgets\post;

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

class PostWidget extends Widget{
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
    public function run(){
        //查询条件
        //通过标签获取文章
        if(!empty($this->tag)){
            $tag_res=TagModel::findOne(['tag_name'=>$this->tag]);//在tags表中获取到id
            $tag_id=$tag_res->id;
            $post_id=RelationPostTagsModel::findAll(['tag_id'=>$tag_id]);
            $amount = count($post_id);  //得到关注用户数量
            $post_id_str = '';   //声明字符串变量
            for($i=0;$i<$amount;$i++){
//            $idols_id_str .= $idols[$i]->idol;  //得到用户id
                $post_id_str.=$post_id[$i]->post_id;  //得到文章id
                if($i==$amount-1){
                    break;   //如果是最后一个id 则不需要添加逗号
                }
                $post_id_str .= ',';   //添加逗号做分割
            }
            $cond='id in('.$post_id_str.')';
        }else{
            //普通的最新文章列表
            $cond=['=','is_valid',PostModel::IS_VALID];
        }
        $curPage=Yii::$app->request->get('page',1);
        $res=PostForm::getList($cond,$curPage,$this->limit);
        $result['title']=$this->title?:'最新文章';
        $result['more']=Url::to(['post/index']);
        $result['body']=$res['data']?:[];
        //分页显示
        if($this->page){
            $pages=new Pagination(['totalCount'=>$res['count'],'pageSize'=>$res['pageSize']]);
            $result['page']=$pages;
        }
        return $this->render('index',['data'=>$result]);
    }
}