<?php
/**
 * Created by PhpStorm.
 * User: jx
 * Date: 2017/12/21
 * Time: 18:03
 */
   use yii\bootstrap\ActiveForm;
   use yii\bootstrap\Html;
   $this->title='创建';
   $this->params['breadcrumbs'][]=['label'=>'文章','url'=>['post/index']];
   $this->params['breadcrumbs'][]=$this->title;
?>

<div class="row">
    <div class="col-lg-9">
        <div class="panel-title box-title box-title-style">
            <span>创建文章</span>
        </div>
        <div class="panel-body">
            <?php $form=ActiveForm::begin()?>

            <?=$form->field($model,'title')->textinput(['maxlength'=>true])?>

            <?=$form->field($model,'cat_id')->dropDownList($cat)?>


            <?= $form->field($model, 'label_img')->widget('common\widgets\file_upload\FileUpload',[
                'config'=>[
                ]
            ]) ?>

            <?= $form->field($model, 'content')->widget('common\widgets\ueditor\Ueditor',[
                'options'=>[
                        'initialFrameHeight'=>400,
//                    'toolbar'=>
//                        ['fullscreen', 'source', 'undo', 'redo', 'bold', 'italic',
//                            'underline','fontborder', 'backcolor', 'fontsize', 'fontfamily',
//                            'justifyleft', 'justifyright','justifycenter', 'justifyjustify',
//                            'strikethrough','superscript', 'subscript', 'removeformat',
//                            'formatmatch','autotypeset', 'blockquote', 'pasteplain', '|',
//                            'forecolor', 'backcolor','insertorderedlist', 'insertunorderedlist',
//                            'selectall', 'cleardoc', 'link', 'unlink','emotion', 'help']
//                    ]
                    'toolbars' => [
                        [
                            'anchor', //锚点
                            'undo', //撤销
                            'redo', //重做
                            'bold', //加粗
                            'indent', //首行缩进
                            'italic', //斜体
                            'underline', //下划线
                            'strikethrough', //删除线
                            'subscript', //下标
                            'superscript', //上标
                            'formatmatch', //格式刷
                            'source', //源代码
                            'blockquote', //引用
                            'pasteplain', //纯文本粘贴模式
                            'selectall', //全选
                            'print', //打印
                            'preview', //预览
                            'horizontal', //分隔线
                            'removeformat', //清除格式
                            'time', //时间
                            'date', //日期
                            'unlink', //取消链接
                            'insertrow', //前插入行
                            'insertcol', //前插入列
                            'deleterow', //删除行
                            'deletecol', //删除列
                            'deletecaption', //删除表格标题
                            'inserttitle', //插入标题
                            'cleardoc', //清空文档
                            'insertparagraphbeforetable', //"表格前插入行"
                            'fontfamily', //字体
                            'fontsize', //字号
                            'paragraph', //段落格式
                            'simpleupload', //单图上传
                            'insertimage', //多图上传
                            'link', //超链接
                            'emotion', //表情
                            'spechars', //特殊字符
                            'searchreplace', //查询替换
                            'help', //帮助
                            'justifyleft', //居左对齐
                            'justifyright', //居右对齐
                            'justifycenter', //居中对齐
                            'justifyjustify', //两端对齐
                            'forecolor', //字体颜色
                            'backcolor', //背景色
                            'insertorderedlist', //有序列表
                            'insertunorderedlist', //无序列表
                            'fullscreen', //全屏
                            'directionalityltr', //从左向右输入
                            'directionalityrtl', //从右向左输入
                            'rowspacingtop', //段前距
                            'rowspacingbottom', //段后距
                            'pagebreak', //分页
                            'imagenone', //默认
                            'imageleft', //左浮动
                            'imageright', //右浮动
                            'attachment', //附件
                            'imagecenter', //居中
                            'lineheight', //行间距
                            'edittip ', //编辑提示
                            'customstyle', //自定义标题
                            'autotypeset', //自动排版
                            'webapp', //百度应用
                            'touppercase', //字母大写
                            'tolowercase', //字母小写
                            'background', //背景
                            'template', //模板
                            'scrawl', //涂鸦
                            'music', //音乐
                            'inserttable', //插入表格
                            'drafts', // 从草稿箱加载
                            'charts', // 图表
                        ],
                    ]
                    ]

            ]) ?>

            <?=$form->field($model,'tags')->widget('common\widgets\tags\TagWidget')?>

            <?=Html::submitButton('发布',['class'=>'btn btn-primary'])?>

            <div class="form-group">
            <?php ActiveForm::end()?>
            </div>
        </div>

    </div>
    <div class="col-lg-3">
            <div class="panel-title box-title">
                <span>注意事项</span>
            </div>
            <div class="panel-body">
                <p>1.标题尽量不要出现公司，品牌，产品的

                    名称</p>
                <p>2.不得上传污秽、暴力、色情图片</p>
            </div>
    </div>
</div>
