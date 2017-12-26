<?php
namespace  frontend\models;
use common\models\PostModel;
use common\models\RelationPostTagsModel;
use yii\base\Model;
use Yii;
use yii\db\Exception;
use yii\db\Query;

/**
 * 文章表单模型
 */
class PostForm extends Model{
    public $id;
    public $title;
    public $content;
    public $label_img;
    public $cat_id;
    public $tags;

    public $_lastError="";

    /**
     * 定义场景
     * SCENARIO_CREATE创建
     * SCENARIO_UPDATE更新
     */
    const SCENARIO_CREATE='create';
    const SCENARIO_UPDATE='update';

    /**
     * 定义事件
     * EVENT_AFTER_CREATE 创建之后的事件
     * EVENT_AFTER_UPDATE 更新之后的事件
     */
    const EVENT_AFTER_CREATE='eventAfterCreate';
    const EVENT_AFTER_UPDATE='eventAfterUpdate';

    public function scenarios()
    {
       $scenarios=[
           self::SCENARIO_CREATE=>['title','content','label_img','cat_id','tags'],
           self::SCENARIO_UPDATE=>['title','content','label_img','cat_id','tags'],
       ];
       return array_merge(parent::scenarios(),$scenarios);
    }

    //表单规则
    public function rules(){
        return [
            [['id','title','content','car_id'],'required'],
            [['id','cat_id'],'integer'],
            ['title','string','min'=>4,'max'=>50],
        ];
    }

    public function  attributeLabels()
    {
        return [
            'id'=>Yii::t('common','ID'),
            'title'=>Yii::t('common','Title'),
            'content'=>Yii::t('common','Content'),
            'label_img'=>Yii::t('common','Label_img'),
            'tags'=>Yii::t('common','Tags'),
            'cat_id'=>Yii::t('common','Cat_id'),
        ];
    }

    public static  function  getList($cond, $curPage=1, $pageSize=5, $orderBy= ['id'=>SORT_DESC])
    {
        $model=new PostModel();
        //查询条件
        $select=['id','title','summary','label_img','cat_id','user_id','user_name','is_valid','created_at','updated_at'];
        $query=$model->find()->select($select)
        ->where($cond)
        ->with('relate.tag','extend')
        ->orderBy($orderBy);

        //获取分页数据
        $res=$model->getPages($query,$curPage,$pageSize);
        //格式化
        $res['data']=self::_formatList($res['data']);
        return $res;
    }

    /**
     * 数据格式化
     * @param $data
     * @return mixed
     */
    public static function _formatList($data){
        foreach ($data as &$list){
            $list['tags']=[];
            if(isset($list['relate'])&&!empty($list['relate'])){
                foreach($list['relate'] as $lt){
                    $list['tags'][]=$lt['tag']['tag_name'];
                }
            }
            unset($list['relate']);
        }
        return $data;
    }
    /**
     * 文章创建
     * @return bool
     * @throws Exception
     */
    public function create()
    {
        //事务
        $transaction=Yii::$app->db->beginTransaction();
        try{
            $model=new PostModel();
           $model01=new FeedForm();
            $model->setAttributes($this->attributes);
            $model->summary=$this->_getSummary();
            $model->user_id=Yii::$app->user->identity->id;
            $model->user_name=Yii::$app->user->identity->username;
            $model->created_at=time();
            $model->updated_at=time();
            $model->is_valid=PostModel::IS_VALID;
            if(!$model->save()){
                throw new \Exception('文章创建失败！');
            }

            $this->id=$model->id;
            //传数据给留言板
            $model01->getPageId($this->id);

            //调用事件
            $data=array_merge($this->getAttributes(),$model->getAttributes());
            $this->_eventAfterCreate($data);

            $transaction->commit();
            return true;
        }catch(\Exception $e){
            $transaction->rollBack();
            $this->_lastError=$e->getMessage();
            return false;
        }
    }

    /**
     * 更新文章
     * @param $id
     * @return array|null|\yii\db\ActiveRecord
     * @throws \Exception
     */

    public function getupdate($id)
    {
        $data = PostModel::find()->with('relate.tag')->where(['id'=>$id])->asArray()->one();
        $data = self::_formatList2($data);
//        $this->title = $data['title'];
//        $this->cat_id = $data['cat_id'];
//        $this->label_img = $data['label_img'];
//        $this->content = $data['content'];
//        $this->tags = $data['tags'];
        $this->setAttributes($data);

    }

    public function update($id)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try{
            $postmodel = PostModel::find()->with('relate.tag')->where(['id'=>$id])->one();
            $postmodel->setAttributes($this->attributes);
            $postmodel->summary = $this->_getSummary(); //生成摘要
            $postmodel->user_id = Yii::$app->user->identity->id;
            $postmodel->user_name = Yii::$app->user->identity->username;
            $postmodel->is_valid = PostModel::IS_VALID;
            $postmodel->updated_at = time();
            if (!$postmodel->save()){
                throw new \yii\base\Exception('文章保存失败!');
            }
            $this->id = $postmodel->id;

            //调用事件
            $data = array_merge($this->getAttributes(),$postmodel->getAttributes());

            $this->_eventAfterCreate($data);

            $transaction->commit();
            return true;
        }catch ( \yii\base\Exception $e)
        {
            $transaction->rollBack();
            $this->_lastError = $e->getMessage();
            return false;

        }
    }

    private function _formatList2($data)
    {
        foreach ($data['relate'] as $list){

            $data['tags'][]= $list['tag']['tag_name'];
        }
        unset($data['relate']);
        return $data;
    }

    protected function findModel($id)
    {
        if (($model = PostModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    /**
     * 获取文章详情
     * @param $id
     * @return array|null|\yii\db\ActiveRecord
     * @throws \Exception
     */
    public function getViewById($id){
        $res=PostModel::find()->with('relate.tag','extend')->where(['id'=>$id])->asArray()->one();
        if(!$res){
            throw new \Exception('文章不存在！');
        }
        //标签格式
        $res['tags']=[];
        if(isset($res['relate'])&&!empty($res['relate'])){
             foreach ($res['relate'] as $list){
                 $res['tags'][]=$list['tag']['tag_name'];
             }
        }

        unset($res['relate']);//把没有用的数据去掉

        return $res;
    }

    /**
     * 截取文章摘要
     * @param int $s
     * @param int $e
     * @param string $char
     * @return null|string
     */
    private function _getSummary($s=0,$e=90,$char='utf-8')
    {
          if(empty($this->content)){
              return null;
          }

          return(mb_substr(str_replace('&nbsp;','',strip_tags($this->content)),$s,$e,$char));
    }


    /**
     * 文章创建之后的事件
     */
    public function _eventAfterCreate($data)
    {
        //添加事件
        $this->on(self::EVENT_AFTER_CREATE,[$this,'_eventAddTag'],$data);
        //触发事件
        $this->trigger(self::EVENT_AFTER_CREATE);
    }

    /**
     * 添加标签
     */
    public function _eventAddTag($event)
    {
          //保存标签
          $tag=new TagForm();
          $tag->tags=$event->data['tags'];
          $tagids=$tag->saveTags();

          //删除原先的关联关系
          RelationPostTagsModel::deleteAll(['post_id'=>$event->data['id']]);

           //批量保存文章和标签的关联关系
           if(!empty($tagids)){
                foreach($tagids as $k=>$id){
                    $row[$k]['post_id']=$this->id;
                    $row[$k]['tag_id']=$id;
                }
                //批量插入
                $res=(new Query())->createCommand()
                    ->batchInsert(RelationPostTagsModel::tableName(),['post_id','tag_id'],$row)
                    ->execute();
                //返回结果
                if(!$res){
                    throw new \Exception("关联关系保存失败!");
                }

           }
    }


}