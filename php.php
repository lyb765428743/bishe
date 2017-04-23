<?php
    //1.连接数据库
    $link = mysqli_connect('localhost','root','','library');
    if(!$link){
        echo '数据库连接失败，错误代码：'.mysqli_connect_errno().'错误信息'.mysqli_connect_error(),'<br>';
    }else{
        echo '数据库连接成功<br />';
    }
    //2.选择要操作的数据库并且设置字符集
    //mysqli_select_db($link,'library');//选择要操作的数据库，连接时已选这里就不用了。
    mysqli_set_charset($link,'utf8');//设置字符集；
    //mysqli_query($link,'SET NAMES utf8');//也可以设置字符集；

    //3.数据库操作（增删改查）

    //查询
    $sql = "SELECT * FROM book_style";

    $bookStyle = mysqli_query($link,$sql);//返回的是一个结果集；
   /* var_dump(mysqli_fetch_array($bookStyle));//返回关联数组和索引数组；
    var_dump(mysqli_fetch_array($bookStyle,MYSQLI_ASSOC));//只返回关联数组
    var_dump(mysqli_fetch_assoc($bookStyle));//同上一行；
    var_dump(mysqli_fetch_array($bookStyle,MYSQLI_NUM));//只返回索引数组；
    var_dump(mysqli_fetch_row($bookStyle));//同上一行；*/
    $book_style = array();
    while($row = mysqli_fetch_assoc($bookStyle)){
        //echo $row['bookstyleno'].$row['bookstyle'];
        echo array_push($book_style,$row['bookstyle']);
        echo '<a href="#">'.$row['bookstyle'].'</a>';
    }
    //print_r($book_style);

    //受影响函数
    echo '查询数据条数：'.mysqli_num_rows($bookStyle),'<br />';

    //插入数据库
    $sql = "INSERT INTO book_style VALUES('8','玄幻小说')";
    $result = mysqli_query($link,$sql);
    if($result){
        echo '新增数据成功<br / >';
    }else{
        echo '新增数据失败，失败原因：'.mysqli_error($link);
    }

    //修改数据库内容
    $sql =  "UPDATE book_style set bookstyle = '玄幻小说2' where bookstyleno = 8";
    $result = mysqli_query($link,$sql);
    if($result){
        echo '修改数据成功<br />';
    }else{
        echo '修改数据失败，失败原因：'.mysqli_error($link);
    }
    //删除数据
    $sql = "DELETE FROM book_style where bookstyleno = 8 LIMIT 1";
    $result = mysqli_query($link,$sql);
    if($result){
        echo '删除数据成功，受影响数据行数：'.mysqli_affected_rows($link).'<br />';
    }else{
        '删除数据失败，失败原因：'.mysqli_error($link);
    }

    //4.释放结果集并且关闭数据库
    // mysqli_free_result($result);//查询时用到
    mysqli_close($link);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        print_r($book_style);
    ?>
</body>
</html>
