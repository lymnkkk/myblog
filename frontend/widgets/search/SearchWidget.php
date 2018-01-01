<?php
/**
 * Created by PhpStorm.
 * User: lymn
 * Date: 2017/12/31
 * Time: 15:32
 */
namespace frontend\widgets\search;
use yii\base\Widget;

class SearchWidget extends Widget
{

    public function run()
    {

        return $this->render('index');

    }
}