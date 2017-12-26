<?php
namespace  common\models\base;
/**
 * 基础模型
 */
use yii\db\ActiveRecord;

class BaseModel extends ActiveRecord{
    /**
     * 获取分页数据
     * @param $query
     * @param int $curPage
     * @param int $pageSize
     * @param null $search
     * @return array
     */
      public function getPages($query,$curPage = 1,$pageSize = 10,$search = null){
            if($search){
                $query=$query->andFilerWhere($search);
            }
            $data['count']=$query->count();
            //如果查不到数据
            if(!$data['count']){
                return ['count'=>0,'curPage'=>$curPage,'pageSize'=>$pageSize,'start'=>0,'end'=>0,'data'=>[]];
            }

            //有数据的情况下

             //超过实际页数，不取curPage为当前页
             $curPage=(ceil($data['count']/$pageSize)<$curPage)?ceil($data['count']/$pageSize):$curPage;

             $data['curPage']=$curPage;
             $data['pageSize']=$pageSize;
             //起始页
             $data['start']=($curPage-1)*$pageSize+1;
             //末页
             $data['end']=(ceil($data['count']/$pageSize)==$curPage)?$data['count']:($curPage-1)*$pageSize+$pageSize;
             //数据
             $data['data']=$query->offset(($curPage-1)*$pageSize)->limit($pageSize)->asArray()->all();
             //返回数据
             return $data;


      }
}