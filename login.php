<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>宁波工程学院图书管理系统登录</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="l-header">
        <div class="logo"><img src="images/logo.png" alt=""> </div>
        <div class="words">宁波工程学院图书管理系统</div>
        <div class="guanwang"><a href="http://www.nbut.cn/">宁波工程学院官网</a></div>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onSubmit="return check()">
        <div class="login">
            <div class="l-motai">
                <div class="qing">管理员请登录</div>
                <div class="user">账号：<input type="text" name="username" id="username" placeholder="请输入用户名"></div>
                <div class="password">密码：<input type="password" name="pwd" id="pwd" placeholder="请输入密码"></div>
                <div class="button"> <input type="submit" name="Submit" class="submit" value="登录">
                </div>
            </div>
        </div>
    </form>
</body>
</html>
<?php
require('config.php');
if( isset($_POST['Submit']) && $_POST['Submit'])
{
    $username=$_POST["username"];
    $pwd=$_POST["pwd"];
    $SQL ="SELECT * FROM admin WHERE username='$username' AND  password = '$pwd'";
    $rs=mysqli_query($link,$SQL);
    var_dump(mysqli_fetch_array($rs));
    echo mysqli_num_rows($rs);
    if(mysqli_num_rows($rs)==1)
    {
        setcookie('user',$username);
        echo "<script language=javascript>window.location='admin.php'</script>";
    }
    else
    {
        echo "<script language=javascript>alert('用户名或密码错误！');window.location='login.php'</script>";
        ?>
        <?php
        die();
    }
}
?>