<?php
header("Content-type:text/html;charst=utf-8");
$content=$_POST['comment'];
$conid=$_GET['conid'];
//echo $conid;
session_start();
$username=$_SESSION['name'];
$servername = "localhost";
$dbusername = "root";
$password = "123456";
$databasename='news';

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

$content=$_POST['comment'];
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

//调用图灵机器人api进行回复并插入到数据库中
$postdata=[
"key" =>"37e39db187524cb6b377ed50898052ef",
"info" =>"$content",
"userid" =>"$username"
];

$options=[
CURLOPT_URL => 'http://www.tuling123.com/openapi/api ',
CURLOPT_POST => true,
CURLOPT_RETURNTRANSFER =>true,
//CURLOPT_HEADER => true,
CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
CURLOPT_SSL_VERIFYPEER => false,
CURLOPT_SSL_VERIFYHOST => 2,
CURLOPT_POSTFIELDS =>json_encode($postdata)
];
$request=curl_init();
curl_setopt_array($request,$options);

$reponse = curl_exec($request);
//echo $reponse;
$info=curl_getinfo($request);
//var_dump($info);
$reponse=json_decode($reponse);

//var_dump($reponse);



$retext=$reponse->text;



$sql = "INSERT INTO comment(conid, content,username) VALUES ('$conid','回复：$retext','$username')";

if ($conn->query($sql) === TRUE) {
    echo "scuess";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo '<script>';
echo "window.location='newsdetail.php?conid=$conid'";
echo '</script>';