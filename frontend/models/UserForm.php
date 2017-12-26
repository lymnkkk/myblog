<?php

namespace  frontend\models;
use common\models\PostModel;
use common\models\RelationPostTagsModel;
use common\models\UserModel;
use yii\base\Model;
use Yii;
use yii\db\Exception;
use yii\db\Query;

/**
 * 文章表单模型
 */
class UserForm extends Model{

    public $email;
    public $username;
    public $sex;
    public $_lastError="";

    //表单规则
    public function rules(){
        return [
            [['email','username'],'string','max'=>255],
            ['sex','integer'],

        ];
    }

    public function  attributeLabels()
    {
        return [
            'email'=>'邮箱',
            'username'=>'用户名',
            'sex'=>'性别',
        ];
    }




    public function getupdate($id)
    {
        $data = PostModel::find()->where(['id'=>$id])->asArray()->one();
//        $data = self::_formatList2($data);
//        $this->title = $data['title'];
//        $this->cat_id = $data['cat_id'];
//        $this->label_img = $data['label_img'];
//        $this->content = $data['content'];
//        $this->tags = $data['tags'];
//        $this->setAttributes($data);
        $this->email=$data['email'];
        $this->username=$data['username'];
        $this->sex=$data['sex'];

    }

    public function update($id)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try{
//            $postmodel = PostModel::find()->with('relate.tag')->where(['id'=>$id])->one();
//            $postmodel->setAttributes($this->attributes);
//            $postmodel->summary = $this->_getSummary(); //生成摘要
//            $postmodel->user_id = Yii::$app->user->identity->id;
//            $postmodel->user_name = Yii::$app->user->identity->username;
//            $postmodel->is_valid = PostModel::IS_VALID;
//            $postmodel->updated_at = time();

            $usermodel=UserModel::find()->where(['id'=>$id])->one();
            $usermodel->email=$this->email;
            $usermodel->username=$this->username;
            $usermodel->sex=$this->sex;
            if (!$usermodel->save()){
                throw new \yii\base\Exception('更改个人信息失败!');
            }
//            $this->id = $postmodel->id;
//
//            //调用事件
//            $data = array_merge($this->getAttributes(),$postmodel->getAttributes());
//
//            $this->_eventAfterCreate($data);

            $transaction->commit();
            return true;
        }catch ( \yii\base\Exception $e)
        {
            $transaction->rollBack();
            $this->_lastError = $e->getMessage();
            return false;

        }
    }







}