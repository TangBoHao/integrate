<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>登陆</title>
</head>
<body>



<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "news";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("数据库连接错误: " . $conn->connect_error);
} 

$sql = "SELECT password FROM users WHERE username='{$_POST['username']}'";
$result = $conn->query($sql);
echo "{$_POST['username']}";

if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
       // echo "<br> id: ". $row["username"]. " - key: ". $row["password"];
        if ($_POST['password']==$row['password']) {
            session_start();
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['password']=$_POST['password'];


        	echo "<script language='javascript'>"; 
			echo " location='index.php';"; 
			echo "</script>";
        }
        else
        {
            echo "密码输入错误，请重新输入";
        
        }
        	
    }
} else {
    echo "用户名输入错误，请重新输入";
}
//$conn->close();
?>



</body>
</html>





