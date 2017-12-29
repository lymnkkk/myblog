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
use common\models\PostExtendModel;
use common\models\PostModel;
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
     * 文章列表
     */
    public function actionIndex(){
        return $this->render('index');
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

        //获取文章留言板数据
        $feed=new FeedForm();
        $feeds['feed']=$feed->getList($id);


       // return $this->redirect(['post/view','id'=>17]);
        return $this->render('view',['data'=>$data,'feeds'=>$feeds]);
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
        PostModel::findOne($id)->delete();

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




}