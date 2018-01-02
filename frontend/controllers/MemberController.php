<?php
namespace frontend\controllers;


/**教程里没有加下面这个引用*/
use common\models\FansModel;
use common\models\PostModel;
use frontend\controllers\base\BaseController;
use frontend\models\FansForm;
use yii\db\Query;
use Yii;



/**
 * Site controller
 */
class MemberController extends BaseController
{

    public $a=0;
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex($id)
    {
        $data['id']=$id;//这里的id是user_id
        $res = PostModel::findOne(['user_id'=>$id]);
        $data['username']=$res->user_name;
        return $this->render('index',['data'=>$data]);
    }

    //添加关注
    public function actionAttention($id){
        $model=new FansForm();
        //是否关注成功
        if($model->validate()) {
            if ($model->createAttention($id)) {
                return json_encode(['status' => true]);
            }
        }
        return json_decode(['status'=>false,'msg'=>'发布失败!']);
    }

    //取消关注
    public function actionNoattention($id){
        FansModel::deleteAll('idol = :idol AND fans = :fans', [':idol' => $id, ':fans' => Yii::$app->user->identity->id]);
    }




}
