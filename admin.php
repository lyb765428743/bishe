<?php
    require("config.php");
    if($_COOKIE['user']){
        $user = $_COOKIE['user'];
        $sql = "SELECT * FROM admin WHERE username = '$user'";
        $admin = mysqli_query($link,$sql);
        $zhi = mysqli_fetch_array($admin,MYSQLI_ASSOC);
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员</title>
    <link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" href="css/admin.css" />
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
                <li><a href="index.php">图书管理</a></li>
                <li><a href="duzhe.php">读者管理</a></li>
                <li><a href="admin.php" style="color:orange;">管理员</a></li>
            </ul>
        </div>
        <div class="tb"><img src="images/tb.png" alt=""></div>
    </div>
</div>
<div class="box">
    <div class="boxcon">
        <ul class="left">
            <li>管理员资料</li>
            <li>修改密码</li>
            <li>新增管理员</li>
            <li>删除管理员</li>
        </ul>
        <ul class="right">
            <li>
                <table cellspacing="0">
                    <tr>
                        <td class="bt">姓名</td>
                        <td class="zhi">
                            <?php
                                echo "$zhi[姓名]"
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bt">id</td>
                        <td class="zhi">
                            <?php
                                echo "$zhi[id]"
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bt">性别</td>
                        <td class="zhi">
                            <?php
                                echo "$zhi[性别]"
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bt">用户名</td>
                        <td class="zhi">
                            <?php
                                echo "$zhi[username]"
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bt">学号</td>
                        <td class="zhi">
                            <?php
                                echo "$zhi[学号]"
                            ?>
                        </td>
                    </tr>
                </table>
                <button class="qiehuan">切换用户</button>
            </li>
            <li>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onSubmit="return check()">
                    <label for="yuan">用户名:</label><input disabled name="username" class="user"  value=" <?php
                            echo $user;
                        ?>"><br />
                    <label for="yuan">原密码:</label><input type="password" name="yuan" id="yuan"><br />
                    <label for="xin">新密码:</label><input type="password" name="xin" id="xin"><br />
                    <input class="anniu" type="submit" value="确认修改" name="Xiugai"><br />
                </form>
            </li>
            <li>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label for="t_username">用户名:</label><input type="text" name="new_user"><br />
                    <label for="t_password">密&nbsp; 码:</label><input type="password" name="password"  id="password"><br />
                    <label for="t_xm">姓&nbsp; 名:</label><input type="text" name="new_name"><br />
                    <label for="t_xb">性&nbsp; 别:</label><input type="text" name="new_sex"><br />
                    <label for="t_xh">学&nbsp; 号:</label><input type="text" name="new_xh"><br />
                    <input class="anniu" type="submit" name="tj" value="添加"><br />
                </form>
            </li>
            <li>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label for="s_username">用户名:</label><input type="text" name="sc_user"><br />
                    <input class="anniu" type="submit" name="sc" value="删除"><br />
                </form>
            </li>
        </ul>
    </div>
</div>
</body>
</html>
<?php
    require('config.php');
    if(isset($_POST['Xiugai']) && $_POST['Xiugai']){
        $username = $user;
        $yuan = $_POST['yuan'];
        $xin = $_POST['xin'];
        $SQL = "SELECT * FROM admin WHERE username='$username' AND  password = '$yuan'";
        $rs=mysqli_query($link,$SQL);
        if(mysqli_num_rows($rs)==1) {
            $sql2 = "UPDATE admin set password = '$xin' where username = '$username'";
            mysqli_query($link,$sql2);
            echo "<script>alert('密码修改成功,请重新登录');window.location.href = 'login.php';</script>";
        }
        else {
            echo "<script language=javascript>alert('原密码错误！');window.location.href = 'admin.php';</script>";
        }
    }
    if(isset($_POST['tj']) && $_POST['tj'] ){
        $new_user = $_POST['new_user'];
        $new_sex = $_POST['new_sex'];
        $new_xh = $_POST['new_xh'];
        $password = $_POST['password'];
        $new_name = $_POST['new_name'];
        $SQL = "INSERT INTO admin VALUES('null','$new_user','$password','$new_name','$new_sex',$new_xh)";
        mysqli_query($link,$SQL);
        echo "<script>alert('添加成功');window.location.href = 'admin.php';</script>";
    }
    if(isset($_POST['sc']) && $_POST['sc']){
        if($user == 'lyb'){
            $sc_user = $_POST['sc_user'];
            $SQL = "SELECT * FROM admin WHERE username = '$sc_user'";
            $result = mysqli_query($link,$SQL);
            if($sc_user != 'lyb' && mysqli_num_rows($result) != 0){
                $sql = "DELETE FROM admin where username = '$sc_user'";
                mysqli_query($link,$sql);
                echo "<script>alert('删除成功');window.location.href = 'admin.php';</script>";
            }else{
                echo "<script>alert('无法删除最高权限人或没有该管理员');window.location.href = 'admin.php';</script>";
            }
        }else{
            echo "<script>alert('你没有该权限');window.location.href = 'admin.php';</script>";
        }
    }
?>
