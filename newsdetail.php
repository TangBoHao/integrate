<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>详情页</title>
	<style type="text/css">
.newscon{
height: 800px;
overflow: scroll;
	
}
    </style>
</head>
<body>
<!-- 登陆模块 -->
<?php
session_start();
$landing='<div>
		<a href="register.html">注册用户</a>
		<a href="login.html">用户登录</a>
		<span>(登陆后方可发表内容)</span>
	</div>
	<br>';
if($_SESSION['name'])
{
	echo "尊敬的用户".$_SESSION['name']."您好";
}else{
	echo $landing;
}



?>
<!-- 展示内容 -->
<?php
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
    	
        $bookinformation[$i]= "<br>标题: ". $row["title"]."<br>内容: ". "<div class='newscon'>".$row["content"]."</div>"."<br>所属板块: ". $row["belong"]."<br>资讯原地址: ". $row["url"]."<br/>".
       "</div>".
        "<hr>";
    	echo $bookinformation[$i];
    	$i++;

    }
}

?>

<form action="comment.php?conid=<?php echo  $msgid ?>"method="post">
评论：<input type="text" name="comment" size="100"><br>


<input type="submit" value="发表评论">
</form>

<p>以下是用户评论</p>
<?php
	$sql = "SELECT content,username FROM comment WHERE conid=$msgid";
//echo $_GET['conid'];
$result = $conn->query($sql);

if ($result->num_rows >0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
    	
        $bookinformation[$i]= "<br>评论者: ". $row["username"]."<br>内容: ". "<div >".$row["content"]."</div>"."<hr>";
    	echo $bookinformation[$i];
    	$i++;

    }
}
?>
</body>
</html>