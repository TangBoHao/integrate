<?php
header("Access-Control-Allow-Origin:*");    //������ʵ�������*��ʾ���е�
header("Access-Control-Allow-Methods:POST,GET");		//������ʵ�����ʽ
$content=$_POST['comment'];
$conid=$_GET['conid'];
echo $conid;
session_start();
$username=$_SESSION['name'];
$servername = "localhost";
$dbusername = "root";
$password = "123456";
$databasename='news';

// ��������
$conn = mysqli_connect($servername, $dbusername, $password,$databasename);
mysqli_set_charset($conn,"utf8");
// �������
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO comment(conid, content,username) VALUES ('$conid','$content','$username')";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "Error";
}