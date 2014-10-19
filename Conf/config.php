<?php

return array(
    
'URL_MODEL'=>3, // 如果你的环境不支持PATHINFO 请设置为3
'APP_DEBUG' => true, // 开启调试模式
'DB_TYPE'=> 'mysql', // 数据库类型
'DB_HOST'=> 'localhost', // 数据库朋务器地址
'DB_NAME'=>'teach_data', // 数据库名称
'DB_USER'=>'root', // 数据库用户名
'DB_PORT'=>'3306', // 数据库端口
'DB_PREFIX'=>'', // 数据表前缀
'APP_GROUP_LIST'=>'Admin,Home', //项目分成Home和Admin两个组，分删表示前台和后台功能
'DEFAULT_GROUP'=>'Home',  //默认为Home组
'USER_AUTH_KEY'=>'authId',

);
?>
