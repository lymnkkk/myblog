<?php
namespace frontend\widgets\info;

/**
 * 热门浏览组件
 */
use common\models\FansModel;
use common\models\PostExtendModel;
use common\models\PostModel;
use common\models\UserModel;
use Yii;
use yii\base\Widget;
use yii\db\Query;
use yii\helpers\Url;

class InfoWidget extends Widget{
    /**
     * 标题
     * @var string
     */
    public $title='';

    /**
     * @var int 显示条数
     */
    public $limit=6;

    public $id;
    public function run()
    {
//        $res = (new Query())
//            ->select('a.browser, b.id, b.title')
//            ->from(['a'=>PostExtendModel::tableName()])
//            ->join('LEFT JOIN',['b'=>PostModel::tableName()],'a.post_id = b.id')
//            ->where('b.is_valid ='.PostModel::IS_VALID)
//            ->orderBy('browser DESC, id DESC')
//            ->limit($this->limit)
//            ->all();
        if($this->id==Yii::$app->user->identity->id)//通过id判断是本人，还是其他用户
        {
            $result['id']=Yii::$app->user->identity->id;
            $result['username']=Yii::$app->user->identity->username;
            $result['email']=Yii::$app->user->identity->email;
            $result['location']=Yii::$app->user->identity->location;
            $result['introduction']=Yii::$app->user->identity->introduction;
            $result['sex']=Yii::$app->user->identity->sex?:-1;
        }else{
          $result['id']=$this->id;
            $info=UserModel::findOne(['id'=>$this->id]);
            $result['username']=$info->username;
            $result['email']=$info->email;
            $result['location']=$info->location;
            $result['introduction']=$info->introduction;
            $result['sex']=$info->sex?:-1;
            $att=FansModel::find()->where(['fans'=>Yii::$app->user->identity->id,'idol'=>$this->id])->all();
            //判断是否关注
           if($att){
               $result['att']='yes';//已经关注
            }else{
               $result['att']='no';//还未关注
           }
        }

        return $this->render('index',['data'=>$result]);
    }


}