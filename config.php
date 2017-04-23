<?php
$link = mysqli_connect('localhost','root','','library');
if(!$link){
    echo '数据库连接失败，错误代码：'.mysqli_connect_errno().'错误信息'.mysqli_connect_error(),'<br>';
}else{
    //echo '数据库连接成功<br />';
}
//2.选择要操作的数据库并且设置字符集
//mysqli_select_db($link,'library');//选择要操作的数据库，连接时已选这里就不用了。
mysqli_set_charset($link,'utf8');//设置字符集；
//mysqli_query($link,'SET NAMES utf8');//也可以设置字符集；
?>

