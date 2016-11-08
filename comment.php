<?php
$content=$_POST['comment'];
$conid=$_GET['conid'];
echo $conid;
session_start();
$username=$_SESSION['name'];
$servername = "localhost";
$dbusername = "root";
$password = "123456";
$databasename='news';

// 创建连接
$conn = mysqli_connect($servername, $dbusername, $password,$databasename);
mysqli_set_charset($conn,"utf8");
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO comment(conid, content,username) VALUES ('$conid','$content','$username')";

if ($conn->query($sql) === TRUE) {
    echo "评论发表成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
