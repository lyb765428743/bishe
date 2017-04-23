<?php
require('config.php');
$sql = "SELECT * FROM book_style";
$result = mysqli_query($link,$sql);
$result3 = mysqli_query($link,$sql);
$sm = mysqli_query($link,$sql);
$bookstyleno = [];
while($s = mysqli_fetch_assoc($result3)){
    array_push($bookstyleno,$s['bookstyleno']);
};
$lei_num = end($bookstyleno) + 1;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图书管理</title>

    <link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" href="css/index.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/tab.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/tiaozhuan.js"></script>
    <script src="js/index.js"></script>
</head>
<body>
<div class="header">
    <div class="headercon">
        <div class="logo"><img src="images/logo.png" alt=""></div>
        <div class="nav">
            <ul>
                <li><a href="index.php" style="color:orange;">图书管理</a></li>
                <li><a href="duzhe.php">读者管理</a></li>
                <li><a href="admin.php">管理员</a></li>
            </ul>
        </div>
        <div class="tb"><img src="images/tb.png" alt=""></div>
    </div>
</div>
<div class="box">
    <div class="boxcon">
        <ul class="left">
            <li>图书库</li>
            <li>添加分类</li>
            <li>删除分类</li>
            <li>新增图书</li>
            <li>删除图书</li>
            <li>图书借阅查询</li>
        </ul>
        <ul class="right">
            <li>
                <ul class="sort">
                    <?php
                    while($sort = mysqli_fetch_assoc($result)){
                        echo '<li>'.$sort['bookstyle'].'</li>';
                    }
                    ?>
                </ul>
                <ul class="book" style="display: block;">
                    <?php
                        $SQL = "SELECT * FROM books WHERE bookstyleno = 1";
                        $result2 = mysqli_query($link,$SQL);
                        while($book = mysqli_fetch_assoc($result2)){
                            echo "<li><p class='bookname'>".$book['bookname']."</p><p>库存:".$book['num']."</p></li>";
                        }
                    ?>
                </ul>
                <ul class="book">
                    <?php
                    $SQL = "SELECT * FROM books WHERE bookstyleno = 2";
                    $result2 = mysqli_query($link,$SQL);
                    while($book = mysqli_fetch_assoc($result2)){
                        echo "<li><p class='bookname'>".$book['bookname']."</p><p>库存:".$book['num']."</p></li>";
                    }
                    ?>
                </ul>
                <ul class="book">
                    <?php
                    $SQL = "SELECT * FROM books WHERE bookstyleno = 3";
                    $result2 = mysqli_query($link,$SQL);
                    while($book = mysqli_fetch_assoc($result2)){
                        echo "<li><p class='bookname'>".$book['bookname']."</p><p>库存:".$book['num']."</p></li>";
                    }
                    ?>
                </ul>
                <ul class="book">
                    <?php
                    $SQL = "SELECT * FROM books WHERE bookstyleno = 4";
                    $result2 = mysqli_query($link,$SQL);
                    while($book = mysqli_fetch_assoc($result2)){
                        echo "<li><p class='bookname'>".$book['bookname']."</p><p>库存:".$book['num']."</p></li>";
                    }
                    ?>
                </ul>
                <ul class="book">
                    <?php
                    $SQL = "SELECT * FROM books WHERE bookstyleno = 5";
                    $result2 = mysqli_query($link,$SQL);
                    while($book = mysqli_fetch_assoc($result2)){
                        echo "<li><p class='bookname'>".$book['bookname']."</p><p>库存:".$book['num']."</p></li>";
                    }
                    ?>
                </ul>
                <ul class="book">
                    <?php
                    $SQL = "SELECT * FROM books WHERE bookstyleno = 6";
                    $result2 = mysqli_query($link,$SQL);
                    while($book = mysqli_fetch_assoc($result2)){
                        echo "<li><p class='bookname'>".$book['bookname']."</p><p>库存:".$book['num']."</p></li>";
                    }
                    ?>
                </ul>
                <ul class="book">
                    <?php
                    $SQL = "SELECT * FROM books WHERE bookstyleno = 7";
                    $result2 = mysqli_query($link,$SQL);
                    while($book = mysqli_fetch_assoc($result2)){
                        echo "<li><p class='bookname'>".$book['bookname']."</p><p>库存:".$book['num']."</p></li>";
                    }
                    ?>
                </ul>
                <ul class="book">
                    <?php
                    $SQL = "SELECT * FROM books WHERE bookstyleno = 8";
                    $result2 = mysqli_query($link,$SQL);
                    while($book = mysqli_fetch_assoc($result2)){
                        echo "<li><p class='bookname'>".$book['bookname']."</p><p>库存:".$book['num']."</p></li>";
                    }
                    ?>
                </ul>
                <ul class="book">
                    <?php
                    $SQL = "SELECT * FROM books WHERE bookstyleno = 9";
                    $result2 = mysqli_query($link,$SQL);
                    while($book = mysqli_fetch_assoc($result2)){
                        echo "<li><p class='bookname'>".$book['bookname']."</p><p>库存:".$book['num']."</p></li>";
                    }
                    ?>
                </ul>
                <ul class="book">
                    <?php
                    $SQL = "SELECT * FROM books WHERE bookstyleno = 10";
                    $result2 = mysqli_query($link,$SQL);
                    while($book = mysqli_fetch_assoc($result2)){
                        echo "<li><p class='bookname'>".$book['bookname']."</p><p>库存:".$book['num']."</p></li>";
                    }
                    ?>
                </ul>
            </li>
            <li>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onSubmit="return check()">
                    <label>书类名:</label><input  name="lei_name"><br />
                    <label>书类号:</label><input disabled  name="leinum" value="<?php echo $lei_num ?>"><br />
                    <input class="ltj" type="submit" value="确认添加" name="ltj"><br />
                </form>
            </li>
            <li>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onSubmit="return check()">
                    <label>书类名:</label><input  name="leiname"><br />
                    <input class="lsc" type="submit" value="确认删除" name="lsc"><br />
                </form>
            </li>
            <li>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onSubmit="return check()">
                    <label>书 &nbsp;名:</label><input  name="bookname"><br />
                    <label>书 &nbsp;号:</label><input  name="bookid"><br />
                    <label>分类号:</label><input  name="bookstyleno"><br />
                    <label>借出数:</label><input  name="borrowednum"><br />
                    <label>库 &nbsp;存:</label><input  name="num"><br />
                    <input class="stj" type="submit" value="确认添加" name="stj"><br />
                </form>
                <ul class="sm">
                    <?php
                    while($s2 = mysqli_fetch_assoc($sm)){
                        echo '<li>类号'.$s2['bookstyleno'].':'.$s2['bookstyle'].'</li>';
                    }
                    ?>
                </ul>
            </li>
            <li>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onSubmit="return check()">
                    <label>书名:</label><input  name="book_name"><br />
                    <input class="ssc" type="submit" value="确认删除" name="ssc"><br />
                </form>
            </li>
            <li>
                <form action="s_book.php" method="post" onSubmit="return check()">
                    <label>书名:</label><input  name="s_bookname"><br />
                    <input class="ssc" type="submit" value="搜索" name="ss"><br />
                </form>
            </li>
        </ul>
    </div>
</div>

</body>
</html>
<?php
    require('config.php');
    if($lei_num <= 10){
        if(isset($_POST['ltj']) && $_POST['ltj'] ){
            $lei_name = $_POST['lei_name'];
            $SQL = "INSERT INTO book_style VALUES('$lei_num' ,'$lei_name')";
            mysqli_query($link,$SQL);
            echo "<script>alert('添加成功');window.location.href = 'index.php';</script>";
        }
    }else{
        echo "<script>alert('最多10个类，无法继续添加');window.location.href = 'index.php';</script>";
    }
    if(isset($_POST['lsc']) && $_POST['lsc'] ){
        $leiname = $_POST['leiname'];
        $sql2 = "SELECT * FROM book_style WHERE bookstyle = '$leiname'";
        $result5 = mysqli_query($link,$sql2);
        if(mysqli_num_rows($result5)!=0){
            $SQL = "DELETE FROM book_style WHERE bookstyle = '$leiname' ";
            mysqli_query($link,$SQL);
            echo "<script>alert('删除成功');window.location.href = 'index.php';</script>";
        }else{
            echo "<script>alert('不存在该类名');window.location.href = 'index.php';</script>";
        }

    }
    if(isset($_POST['stj']) && $_POST['stj'] ){
        $book_name = $_POST['bookname'];
        $book_id = $_POST['bookid'];
        $bookstyleno = $_POST['bookstyleno'];
        $borrowednum = $_POST['borrowednum'];
        $num = $_POST['num'];
        $SQL = "INSERT INTO books VALUES('$book_id' ,'$book_name','$bookstyleno','$borrowednum','$num')";
        mysqli_query($link,$SQL);
        echo "<script>alert('添加成功');window.location.href = 'index.php';</script>";
    }
    if(isset($_POST['ssc']) && $_POST['ssc'] ){
        $bookname = $_POST['book_name'];
        $sql = "SELECT * FROM books WHERE bookname = '$bookname'";
        $result = mysqli_query($link,$sql);
        if(mysqli_num_rows($result)!=0){
            $SQL = "DELETE FROM books WHERE bookname = '$bookname' ";
            mysqli_query($link,$SQL);
            echo "<script>alert('删除成功');window.location.href = 'index.php';</script>";
        }else{
            echo "<script>alert('不存在该书');window.location.href = 'index.php';</script>";
        }

    }
?>
