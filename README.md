本网站采用的是YII2.0框架，YII2是一个基于PHP的MVC框架。如果想要了解，可以参考[文档](https://www.yiichina.com/doc)  
网站分为前台和后台管理，前台的入口文件是frontend/web/index.php，后台的入口文件是backend/web/index.php

文件的基本结构
```
common  
    models/              数据库模型，可以通过/gii创建 
    config/              基本配置
    widgets/             第三方插件
frontend   
    assets/              静态资源引入
    config/              前台配置
    controller/          控制器
    models/              表单模型
    views/               视图
    web/                 前台入口文件(index.php)和静态资源
    widgets/             小控件
backend
    assets/              静态资源引入
    config/              后台配置
    controller/          控制器
    models/              表单模型
    views/               视图
    web/                 后台入口文件(index.php)和静态资源
    widgets/             小控件
```


