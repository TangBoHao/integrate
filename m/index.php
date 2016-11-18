<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>聚落-轻阅读，回归身边的生活</title>
	<link rel="stylesheet" href="css/index_phone.css">
</head>
<body>
	<!-- 通用 头部 开始 -->
	<div id="header">
		聚落
		<a href="about.html">
			<div id="about" class="but_circle">
				
			</div>
		</a>
		<a href="set.php">
			<div id="set" class="but_circle">
				
			</div>
		</a>
	</div>
	<!-- 绝对定位头部 占位空块 -->
	<div id="header_none">
		
	</div>
	<!-- 通用 头部 结束 -->
	<!-- 内容部分开始 -->
	<div class="content">
		<!-- 动态块 开始 -->
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
		$sql = "SELECT conid,title,content,belong,url,reg_date FROM news";
		$result = $conn->query($sql);

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


if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
// 
    	// $row["content"]= gjj($row["content"]);

        $bookinformation[$i]= "<a href='newsdetail.php?conid=$row[conid]'>
			<div class='content_box'>
				<div class='left'>
					<div class='logo_zhihu'>
						
					</div>
				</div>
				<div class='right'>
					<h1>". $row["title"]."</h1>"."<p>".$row["content"]."</p></div><div class='time'>".$row["reg_date"]."</div></div></a>";
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
		<!-- 动态块 结束 -->
	</div>
	<!-- 内容部分结束 -->
	<!-- 底部 开始 -->
	<div id="footer">
		没有更多了！
	</div>
	<!-- 底部 结束 -->
</body>
</html>