<?php
/**
 * Created by PhpStorm.
 * User: jx
 * Date: 2017/12/12
 * Time: 21:32
 * 文章控制器
 */
namespace  frontend\controllers;

use common\models\CatModel;
use common\models\FansModel;
use common\models\FeedModel;
use common\models\PostExtendModel;
use common\models\PostModel;
use common\models\RelationPostTagsModel;
use frontend\models\FeedForm;
use Yii;
use frontend\controllers\base\BaseController;
use frontend\models\PostForm;//为表单模型postform添加引用位置
use yii\filters\AccessControl;
use yii\filters\VerbFilter;



class PostController extends BaseController{

    public function behaviors()
{
    return [
        'access' => [
            'class' => AccessControl::className(),
            'only' => ['index', 'create','upload', 'ueditor'],
            'rules' => [
                [
                    'actions' => ['index'],
                    'allow' => true,

                ],
                [
                    'actions' => ['create','upload', 'ueditor'],
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ],
        'verbs' => [
            'class' => VerbFilter::className(),
            'actions' => [
                '*'=>['get','post'],
            ],
        ],
    ];
}

//加入两个插件
    public function actions()
    {
        return [
            /**
         * file_upload配置
         */
            'upload'=>[
                'class' => 'common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
                'config' => [
//                    //上传图片配置
//                    'imageUrlPrefix' => "", /* 图片访问路径前缀 */
                    'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}",
                ]
            ],
            /**
             * ueditor配置
             */
            'ueditor'=>[
                     'class' => 'common\widgets\ueditor\UeditorAction',
                    'config'=>[
                    //上传图片配置
                    'imageUrlPrefix' => "", /* 图片访问路径前缀 */
                    'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
                ]
            ]
        ];
    }




    /**
     * 最新文章列表
     */
    public function actionIndex(){

        return $this->render('index');
    }

    /**
     * 通过标签得出的文章列表
     */
    public function actionTagindex($tag){
        $data['tagname']=$tag;
        return $this->render('tagindex',['data'=>$data]);
    }
    /**     * 创建文章
     * @return mixed
     */
    public function  actionCreate(){
        $model=new PostForm();
        $model->setScenario(PostForm::SCENARIO_CREATE);
        if($model->load(Yii::$app->request->post())&&$model->validate()){
            if(!$model->create()){
                Yii::$app->session->setFlash('warning',$model->_lastError);
            }else{
                return $this->redirect(['post/view','id'=>$model->id]);
            }
        }
    //获取所有分类
$cat=CatModel::getAllCats();
        return $this->render('create',['model'=>$model,'cat'=>$cat]);

    }

    /**
     * 文章详情
     * @param $id
     * @return string
     * @throws \Exception
*/
    public function actionView($id){
        $model=new PostForm();
        $data=$model->getViewById($id);

        $model=new PostExtendModel();
        $model->upCounter(['post_id'=>$id],'browser',1);

//        //获取文章留言板数据
//        $feed=new FeedForm();
//        $feeds['feed']=$feed->getList($id);

//        $att=FansModel::find()->where(['fans'=>Yii::$app->user->identity->id,'idol'=>$id])->all();
//        if($att){
//            $attention['att']='yes';
//        }


       // return $this->redirect(['post/view','id'=>17]);
        return $this->render('view',['data'=>$data]);
    }


    public function actionUpdate($id)
    {
        $model = new PostForm();
        $model->setScenario(PostForm::SCENARIO_CREATE);
        $model->getupdate($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            if (!$model->update($id)){
                Yii::$app->session->setFlash('warning', $model->_lastError);
            }else{
                return $this->redirect(['post/view','id'=>$model->id]);
            }
        }
        $cats = CatModel::getAllCats();

        return $this->render('update',['model'=>$model,'cats' => $cats]);

    }

    public function actionDelete($id){
        PostModel::findOne($id)->delete(); //删除posts的相关数据
        RelationPostTagsModel::deleteAll(['post_id'=>$id]);//删除relation_post_tags表的相关数据
        //删除tags表的相关数据


        return $this->render('delete');
    }

    //留言板添加
    public function actionAddFeed($id)
    {

        $model=new FeedForm();
        $model->content=Yii::$app->request->post('content');
        $model->post_id=$id;

//        print_r($model->post_id);exit;
        if($model->validate()){
            if($model->create()){
                return json_encode(['status'=>true]);
            }
        }

        return json_decode(['status'=>false,'msg'=>'发布失败!']);
    }

    //删除评论，这里的id是评论的id,也就是feeds表的id
    //重新加载文章详情
    public function actionDeletechat($id,$postid){
        if(FeedModel::findOne(['id'=>$id])){
            FeedModel::findOne(['id'=>$id])->delete();
        }

        $model=new PostForm();
        $data=$model->getViewById($postid);

        $model=new PostExtendModel();
        $model->upCounter(['post_id'=>$postid],'browser',1);


        // return $this->redirect(['post/view','id'=>17]);
        return $this->render('view',['data'=>$data]);


    }

    public function actionSearch(){
        $query['content']=Yii::$app->request->post('q');

        return $this->render('search',['data'=>$query]);
    }



}