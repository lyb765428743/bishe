<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员</title>
    <link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" href="css/duzhe.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/tab.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/tiaozhuan.js"></script>
</head>
<body>
<div class="header">
    <div class="headercon">
        <div class="logo"><img src="images/logo.png" alt=""></div>
        <div class="nav">
            <ul>
                <li><a href="index.php" >图书管理</a></li>
                <li><a href="duzhe.php" style="color:orange;">读者管理</a></li>
                <li><a href="admin.php">管理员</a></li>
            </ul>
        </div>
        <div class="tb"><img src="images/tb.png" alt=""></div>
    </div>
</div>
<div class="box">
    <div class="boxcon">
        <ul class="left">
            <li>新增借阅</li>
            <li>读者查询</li>
            <li>图书归还</li>
        </ul>
        <ul class="right">
            <li>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onSubmit="return check()">
                    <label>书 &nbsp;名:</label><input  name="bookname"><br />
                    <label>学 &nbsp;号:</label><input  name="readerid"><br />
                    <label>姓 &nbsp;名:</label><input  name="readername"><br />
                    <input class="xjy" type="submit" value="确认添加" name="xjy"><br />
                </form>
            </li>
            <li>
                <form action="s_duzhe.php" method="post" onSubmit="return check()">
                    <label>学 &nbsp;号:</label><input  name="s_readerid"><br />
                    <label>姓 &nbsp;名:</label><input  name="s_readername"><br />
                    <input class="ssr" type="submit" value="搜索" name="ssr"><br />
                </form>
            </li>
            <li>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onSubmit="return check()">
                    <label>书 &nbsp;名:</label><input  name="r_bookname"><br />
                    <label>学 &nbsp;号:</label><input  name="r_readerid"><br />
                    <label>姓 &nbsp;名:</label><input  name="r_readername"><br />
                    <input class="hs" type="submit" value="确认还书" name="hs"><br />
                </form>
            </li>
        </ul>
    </div>
</div>
</body>
</html>
<?php
require('config.php');
if(isset($_POST['xjy']) && $_POST['xjy'] ){
    $bookname = $_POST['bookname'];
    $readerid = $_POST['readerid'];
    $readername = $_POST['readername'];
    $sql =  "SELECT * FROM books WHERE bookname = '$bookname'";
    $result = mysqli_query($link,$sql);
    $b = mysqli_fetch_array($result);
    $new_num = $b['num'] - 1;
    $new_borrowednum = $b['borrowednum'] + 1;
    if($b['num'] > 0){
        $SQL = "SELECT * FROM borrow_record WHERE readerid = '$readerid'";
        $result2 = mysqli_query($link,$SQL);
        echo(mysqli_num_rows($result2));
        if(mysqli_num_rows($result2) == 0){
            $sql2 = "INSERT INTO borrow_record VALUES('$bookname','$readerid','$readername',CURRENT_TIMESTAMP )";
            $sql3 = "UPDATE books set borrowednum = '$new_borrowednum' where bookname = '$bookname'";
            $sql4 = "UPDATE books set num = '$new_num' where bookname = '$bookname'";
            mysqli_query($link,$sql2);
            mysqli_query($link,$sql3);
            mysqli_query($link,$sql4);
            echo '<script>alert("借阅成功");window.location.href = "duzhe.php";</script>';
        }else{
            echo '<script>alert("每人只能借阅一本该书");window.location.href = "duzhe.php";</script>';
        }
    }else{
        echo '<script>alert("暂无库存");</script>';
    }
}
if(isset($_POST['hs']) && $_POST['hs'] ){
    $r_bookname = $_POST['r_bookname'];
    $r_readerid = $_POST['r_readerid'];
    $r_readername = $_POST['r_readername'];
    $sql =  "SELECT * FROM borrow_record WHERE bookname = '$r_bookname' && readerid = '$r_readerid' && readername = '$r_readername'";
    $result = mysqli_query($link,$sql);
    if(mysqli_num_rows($result) != 0){
        $sql2 = "INSERT INTO return_record VALUES('$r_bookname','$r_readerid','$r_readername',CURRENT_TIMESTAMP )";
        $sql3 = "DELETE FROM borrow_record where bookname = '$r_bookname' && readerid = $r_readerid";
        $sql4 =  "SELECT * FROM books WHERE bookname = '$r_bookname'";
        $result6 = mysqli_query($link,$sql4);
        $bg = mysqli_fetch_array($result6);
        $new_num = $bg['num'] + 1;
        $new_borrowednum = $bg['borrowednum'] - 1;
        $sql5 = "UPDATE books set borrowednum = '$new_borrowednum' where bookname = '$r_bookname'";
        $sql6 = "UPDATE books set num = '$new_num' where bookname = '$r_bookname'";
        mysqli_query($link,$sql2);
        mysqli_query($link,$sql3);
        mysqli_query($link,$sql5);
        mysqli_query($link,$sql6);
        echo '<script>alert("还书成功");window.location.href = "duzhe.php";</script>';
    }else{
        echo '<script>alert("输入错误或未借阅过该书");window.location.href = "duzhe.php";</script>';
    }
}
?>