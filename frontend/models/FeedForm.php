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

use common\models\PostModel;
use Yii;
use yii\base\Model;
use common\models\FeedModel;
use common\models\UserModel;




/**
 * This is the model class for table "feeds".
 *
 * @property integer $id
 * @property string $content
 */
class FeedForm extends Model
{
    public $content;
    public $post_id;

    public $_lastError;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string', 'max' => 255],
//            [['post_id'],'required'],
            [['post_id'],'integer'],
//            [['save_id'],'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => '内容',
            'post_id'=>'文章ID',
        ];
    }

    public function create()
    {
        try{

            $model = new FeedModel();
            $model->user_id = Yii::$app->user->identity->id;
            $model->post_id=$this->post_id;
            $model->content = $this->content;
            $model->created_at = time();
            if(!$model->save())
                throw new \Exception('保存失败！');

            return true;
        }catch (\Exception $e){
    $this->_lastError = $e->getMessage();
    return false;
}
    }

    public function getList($cond,$curPage=1,$pageSize=10)
    {
        $model = new FeedModel();

        //查询条件
        $select=['id','user_id','post_id','content','created_at'];
        $query=$model->find()->select($select)
            ->where($cond)
            ->with('user')
            ->orderBy(['id'=>SORT_DESC]);

        //获取分页数据
        $res=$model->getPages($query,$curPage,$pageSize);

        return $res?:'';
    }





}
