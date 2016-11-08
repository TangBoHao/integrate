<?php
header("Access-Control-Allow-Origin:*");    //允许访问的域名，*表示所有的
header("Access-Control-Allow-Methods:POST,GET");		//允许访问的请求方式
header("Content-type: text/html; charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "123456";
$databasename='news';

// 创建连接
$conn = mysqli_connect($servername, $username, $password,$databasename);
mysqli_set_charset($conn,"utf8");
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name=$_POST['username'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$email=$_POST['email'];

$sql = "INSERT INTO users(username,password,phone,email) VALUES ('$name','$password','$phone','$email')";


if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "failed";
}