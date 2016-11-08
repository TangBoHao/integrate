<?php
header("Access-Control-Allow-Origin:*");    //允许访问的域名，*表示所有的
header("Access-Control-Allow-Methods:POST,GET");		//允许访问的请求方式
header("Content-type: text/html; charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "news";
$i=0;
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
mysqli_set_charset($conn,"utf8");
$msgid=$_GET['conid'];
$sql = "SELECT title,content,belong,url FROM news WHERE conid=$msgid";
//echo $_GET['conid'];
$result = $conn->query($sql);

if ($result->num_rows >0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
    	$msg["$i"]=array('title'=>$row["title"],
    		'content'=>$row["content"],
    		'belong'=>$row["belong"],
    		'url'=>$row["url"]);
     //    $bookinformation[$i]= "<br>标题: ". $row["title"]."<br>内容: ". "<div class='newscon'>".$row["content"]."</div>"."<br>所属板块: ". $row["belong"]."<br>资讯原地址: ". $row["url"]."<br/>".
     //   "</div>".
     //    "<hr>";
    	// echo $bookinformation[$i];
    	$i++;

    }
}
	$sql = "SELECT content,username FROM comment WHERE conid=$msgid";
//echo $_GET['conid'];
$result = $conn->query($sql);

if ($result->num_rows >0) {
    // 输出每行数据
    $i=0;
    while($row = $result->fetch_assoc()) {
    	$comment["$i"]=array('username' => $row["username"],
    		'content'=>$row["content"]);
     //    $bookinformation[$i]= "<br>评论者: ". $row["username"]."<br>内容: ". "<div >".$row["content"]."</div>"."<hr>";
    	// echo $bookinformation[$i];
    	$i++;

    }
}
$out=array(
    'message'=>$msg,
    'comment'=>$comment
	);
$out=json_encode($out);
echo "$out";
