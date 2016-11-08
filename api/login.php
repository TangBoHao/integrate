<?php
header("Access-Control-Allow-Origin:*");    //允许访问的域名，*表示所有的
header("Access-Control-Allow-Methods:POST,GET");        //允许访问的请求方式
header("Content-type: text/html; charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "news";

$error1 = array('msg' =>'0psw');
$error2=array('msg'=>'0usm');
$error1=json_encode($error1);
$error2=json_encode($error2);

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("数据库连接错误: " . $conn->connect_error);
} 

$sql = "SELECT password,phone,email,userlike FROM users WHERE username='{$_POST['username']}'";
$result = $conn->query($sql);
//echo "{$_POST['username']}";

if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
       // echo "<br> id: ". $row["username"]. " - key: ". $row["password"];
        if ($_POST['password']==$row['password']) {
            session_start();
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['password']=$_POST['password'];
            $success=array('msg'=>'success','phone'=>$row['phone'],'email'=>$row['email'],'userlike'=>$row['userlike']);
            $success=json_encode($success);
            echo "$success";
        }
        else
        {
            echo "$error1";
        
        }
            
    }
} else {
    echo "$error2";
}
//$conn->close();
?>


