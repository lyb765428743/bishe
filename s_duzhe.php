<?php
require('config.php');
if(isset($_POST['ssr']) && $_POST['ssr'] ){
    $s_readerid = $_POST['s_readerid'];
    $s_readername = $_POST['s_readername'];
    $SQL = "SELECT * FROM borrow_record WHERE readerid = '$s_readerid' && readername = '$s_readername'";
    $SQL2 = "SELECT * FROM return_record WHERE readerid = '$s_readerid' && readername = '$s_readername'";
    $result = mysqli_query($link,$SQL);
    $result2 = mysqli_query($link,$SQL2);
    if(mysqli_num_rows($result)==0 && mysqli_num_rows($result2)==0){
        echo '<script>alert("无该人记录");</script>';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        table{width:500px; margin:50px auto}td{border:1px solid #000;}
        
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
    <table>
        <caption>现借阅</caption>
        <tr><td>姓名</td><td>学号</td><td>借阅书本</td><td>借阅时间</td></tr>
        <?php 
            if(mysqli_num_rows($result)!=0){
                while($s1 = mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$s1['readername']."</td><td>".$s1['readerid']."</td><td>".$s1['bookname']."</td><td>".$s1['borrowtime']."</td></tr>";
                }
            }
        ?>
    </table>
    <table>
        <caption>曾借阅</caption>
        <tr><td>姓名</td><td>学号</td><td>曾借阅书本</td><td>归还时间</td></tr>
        <?php 
            if(mysqli_num_rows($result2)!=0){
                while($s2 = mysqli_fetch_assoc($result2)){
                    echo "<tr><td>".$s2['readername']."</td><td>".$s2['readerid']."</td><td>".$s2['bookname']."</td><td>".$s2['returntime']."</td></tr>";
                }
            }
        ?>
    </table>
    <button>返回</button>
</body>
<script>
    $('button').click(function(){
        window.location.href = "duzhe.php";
    })
</script>
</html>
