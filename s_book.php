<?php
require('config.php');
if(isset($_POST['ss']) && $_POST['ss'] ){
    $s_bookname = $_POST['s_bookname'];
    $SQL = "SELECT * FROM books WHERE bookname = '$s_bookname'";
    $result = mysqli_query($link,$SQL);
    $sql = "SELECT * FROM borrow_record WHERE bookname = '$s_bookname'";
    $res = mysqli_query($link,$sql);
    if(mysqli_num_rows($result)!=0){
        $s_book = mysqli_fetch_assoc($result);
        echo "<table><tr><td>书号</td><td>书名</td><td>类别</td><td>库存</td><td>借出数</td></tr><tr><td>".$s_book['bookid']."</td><td>".$s_book['bookname']."</td><td>".$s_book['bookstyleno']."</td><td>".$s_book['num']."</td><td>".$s_book['borrowednum']."</td></tr></table>";
    }else{
        echo "<script>alert('该书不存在');window.location.href = 'index.php'</script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        table{width:500px; margin:auto}td{border:1px solid #000;}
        p{
            width:500px;margin:20px auto;
        }
        button{
            width:200px;
            height:30px;
            border:none;
            outline:none;
            background: #f62222;
            color:#fff;
            border-radius: 25px;
            display: block;
            margin:50px auto;
        }
    </style>
    <script src="js/jquery.js"></script>
</head>
<body>
    <p>现借人员：
        <?php
        while($p = mysqli_fetch_array($res)){
            echo $p['readername'].'&nbsp;';
        }
        ?>
    </p>
    <button>返回首页</button>
</body>
<script>
    $('button').click(function(){
        window.location.href = "index.php";
    })
</script>
</html>
