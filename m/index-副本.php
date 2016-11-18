<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>主页</title>
	<style type="text/css">
.newscon{
	height: 300px;
	overflow: hidden;
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
	echo '<a href="quit.php">退出当前账户</a>';
}else{
	echo $landing;
}



?>

<!-- 内容展示模块 -->

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
$sql = "SELECT conid,title,content,belong,url FROM news";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {

        $bookinformation[$i]= "<br>标题: ". $row["title"]."<br>内容: ". "<div class='newscon'>".$row["content"]."</div>"."<br>所属板块: ". $row["belong"]."<br>资讯原地址: ". $row["url"]."<br/>".
        "<a href='newsdetail.php?conid=$row[conid]'>查看详情</a>".
        "<hr>";
    	// echo $bookinformation[$i];
    	$i++;

    }
} else {
    echo "暂无已发表的内容";
}
$conn->close();

for($in=$i-1;$in>=0;$in--)
{
	echo $bookinformation[$in];
}
?>

	
</body>
</html>