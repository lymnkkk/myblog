<?php
namespace frontend\controllers;

use frontend\models\FeedForm;
use frontend\models\UserForm;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\LoginForm;
/**教程里没有加下面这个引用*/
use frontend\controllers\base\BaseController;


/**
 * Site controller
 */
class SiteController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','myzone'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','myzone'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

//    //加入上传图片的插件,给头像用
//    public function actions()
//    {
//        return [
//            /**
//             * file_upload配置
//             */
//            'upload'=>[
//                'class' => 'common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
//                'config' => [
//                    //上传图片配置
//                    'imageUrlPrefix' => "", /* 图片访问路径前缀 */
//                    'imagePathFormat' => "/image/avatar/{yyyy}{mm}{dd}/{time}{rand:6}",
//                ]
//            ],
//
//        ];
//    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],


            /**
             * file_upload配置
             */
            'upload'=>[
                'class' => 'common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
                'config' => [
                    //上传图片配置
                    'imageUrlPrefix' => "", /* 图片访问路径前缀 */
                    'imagePathFormat' => "/headimg/{yyyy}{mm}{dd}/{time}{rand:6}",
                ]
            ],



        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
/*    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Displays about page.
     *
     * @return mixed
     */
   /* public function actionAbout()
    {
        return $this->render('about');
    }*/

    //我的空间
    public function actionMyzone()
    {

        return $this->render('myzone');
    }

    //朋友圈
    public function actionFriends()
    {

        return $this->render('friends');
    }
<<<<<<< HEAD
=======


>>>>>>> 8b4a464f9c602228e37c0de20043a6ceb7a2df65

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    //留言板添加
    public function actionAddFeed()
    {
        $model=new FeedForm();
        $model->content=Yii::$app->request->post('content');
        if($model->validate()){
            if($model->create()){
                return json_encode(['status'=>true]);
            }
        }

        return json_decode(['status'=>false,'msg'=>'发布失败!']);
    }

    //个人资料修改
    public function actionCreateinfo($id)
    {
       $model = new UserForm();

       $model->getupdate($id);
      if ($model->load(Yii::$app->request->post()) && $model->validate()){
           if (!$model->update($id)){
               Yii::$app->session->setFlash('warning', $model->_lastError);
            }else{
               return $this->redirect(['site/myzone']);
           }
       }


        return $this->render('createinfo',['data'=>$model]);

    }

//    //编辑个人资料
//    public function actionCreateinfo()
//    {
////        $model['username']=Yii::$app->user->username;
//        return $this->render('createinfo');
//    }

}
