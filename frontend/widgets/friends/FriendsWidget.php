<?php
/**
 * Created by PhpStorm.
 * User: Draco
 * Date: 2017/12/26
 * Time: 20:29
 */
namespace frontend\widgets\friends;

/**
 * 我的文章列表组件
 */
use common\models\PostModel;
use common\models\FansModel;
use Yii;
use yii\base\Widget;
use yii\data\Pagination;
use frontend\models\PostForm;
use yii\helpers\Url;

class FriendsWidget extends Widget{
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
    public function run(){
        //查询条件

        $idols = FansModel::findAll(['fans'=>Yii::$app->user->identity->id]);   //寻找所有关注的用户
        $idols_id_str = '';   //声明字符串变量
        $amount = count($idols);  //得到关注用户数量
        for($i=0;$i<$amount;$i++){
            $idols_id_str .= $idols[$i]->idol;  //得到用户id
            if($i==$amount-1){
                break;   //如果是最后一个id 则不需要添加逗号
            }
            $idols_id_str .= ',';   //添加逗号做分割
        }

        $curPage=Yii::$app->request->get('page',1);
        $cond='user_id in('.$idols_id_str.')';
        $res=PostForm::getList($cond,$curPage,$this->limit);
        $result['title']=$this->title?:'朋友的文章';
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