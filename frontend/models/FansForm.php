<?php
//namespace frontend\models;
//use yii\base\Model;
//use common\models\FeedModel;
//
//class FeedForm extends Model
//{
//    public $content;
//
//    public $_lastError;
//
//    public function rules()
//    {
//        return [
//            ['content', 'required'],
//            ['content', 'string', 'max' => 255],
//        ];
//    }
//
//    public function attributeLabels()
//    {
//        return [
//            'id'=>'ID',
//            'content'=>'内容',
//
//        ];
//    }
//
//    public function getList(){
//        $model=new FeedModel();
//        $res=$model->find()
//            ->limit(10)
//            ->with('user','post')
//            ->orderBy(['id'=>SORT_DESC])
//            ->asArray()
//            ->all();
//        return $res?:[];
//    }
//
//    public function create()
//    {
//        try{
//            $model=new FeedModel();
//            $model->user_id=\Yii::$app->user->identity->id;
//            $model->content=$this->content;
//            $model->created_at=time();
//            if(!$model->save()){
//                throw new \Exception('保存失败！');
//            }
//            return true;
//
//        }catch(\Exception $e){
//             $this->_lastError=$e->getMessage();
//             return false;
//        }
//    }
//
//}


namespace frontend\models;

use common\models\FansModel;
use common\models\PostModel;
use Yii;
use yii\base\Model;
use yii\db\Query;
use common\models\FeedModel;
use frontend\controllers\PostController;

/**
 * This is the model class for table "feeds".
 *
 * @property integer $id
 * @property string $content
 */
class FansForm extends Model
{
//    public $content;
//    public $post_id;
//
//    public $_lastError;

    public $fans;
    public $idol;

    /**
     * @inheritdoc
     */
    public function rules(){
//    {
//        return [
//            [['content'], 'required'],
//            [['content'], 'string', 'max' => 255],
////            [['post_id'],'required'],
//            [['post_id'],'integer'],
////            [['save_id'],'integer'],
//        ];

        return [
            [['fans','idol'],'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fans' => '粉丝',
            'idol'=>'爱豆',
        ];
    }


    //创建关注
    public function createAttention($id){
        $model=new FansModel();
        $model->fans=Yii::$app->user->identity->id;
        $model->idol=$id;
        $model->save();//记得save
    }





}