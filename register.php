<?php
header("Content-type: text/html; charset=utf-8");
function gjj($str)
{
    $farr = array(
        "/\\s+/",
        "/<(\\/?)(script|i?frame|style|html|body|title|link|meta|object|\\?|\\%)([^>]*?)>/isU",
        "/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU",
    );
    $str = preg_replace($farr,"",$str);
    return addslashes($str);
}

function hg_input_bb($array)
{
    if (is_array($array))
    {
        foreach($array AS $k => $v)
        {
            $array[$k] = hg_input_bb($v);
        }
    }
    else
    {
        $array = gjj($array);
    }
    return $array;
}
$_REQUEST = hg_input_bb($_REQUEST);
$_GET = hg_input_bb($_GET);
$_POST = hg_input_bb($_POST);
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
    echo "注册成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



