<?php
$mysql_server_name="localhost";    //数据库服务器名称
$mysql_username="root";               // 数据库用户名
$mysql_password="123456";               // 数据库密码
$mysql_database="teach_data";      // 连接数据库名称 
$ftime=50000;


$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password,$mysql_database);

mysql_query("set names 'utf8'",$conn);

mysql_select_db($mysql_database,$conn);


?>