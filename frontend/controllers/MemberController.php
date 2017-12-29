<?php
namespace frontend\controllers;


/**教程里没有加下面这个引用*/
use common\models\PostModel;
use frontend\controllers\base\BaseController;
use yii\db\Query;



/**
 * Site controller
 */
class MemberController extends BaseController
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex($id)
    {
        $data['id']=$id;//这里的id是user_id
//        $cond=['=','user_id',$id];
//        $data['username']=PostModel::find()->select('user_name')->where(['user_id'=>$id])->one();
//        print_r($data);exit;
        $res = PostModel::findOne(['user_id'=>$id]);
        $data['username']=$res->user_name;
        return $this->render('index',['data'=>$data]);
    }




}
