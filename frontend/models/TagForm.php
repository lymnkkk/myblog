<?php
/**
 * Created by PhpStorm.
 * User: lymn
 * Date: 2017/12/23
 * Time: 16:09
 */
namespace  frontend\models;

use common\models\TagModel;
use yii\base\Model;

class TagForm extends Model{
    public $id;

    public $tags;

    public function  rules(){
        return[
            ['tags','required'],
            ['tags','each','rule'=>['string']],
        ];
    }


    /**
     * 保存标签集合
     * @return array
     * @throws \Exception
     */
    public function saveTags()
    {
        $ids=[];
        if(!empty($this->tags)){
            foreach($this->tags as $tag){
                $ids[]=$this->_saveTag($tag);
            }
        }

        return $ids;
    }

    /**
     * 保存单个标签
     */
    private function _saveTag($tag){
           $model=new TagModel();
           $res=$model->find()->where(['tag_name'=>$tag])->one();
           //新建标签
           if(!$res)
           {
               $model->tag_name=$tag;
               $model->post_num=1;
               if(!$model->save()){
                   throw new \Exception("保存失败");
               }
               return $model->id;
           }else{
               $res->updateCounters(['post_num'=>1]);
           }

           return $res->id;
    }

    public function deleteTag($tagid){
        $model=new TagModel();
        $res=$model->findOne(['id'=>$tagid]);
        if($res->post_num==1){
                $model->findOne(['id'=>$tagid])->delete();
        }else if($res->post_num>1){
//            $model->post_num=-1;
            $res->updateCounters(['post_num'=>-1]);
        }
    }
}
