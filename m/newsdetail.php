<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>聚落-轻阅读，回归身边的生活</title>
	<link rel="stylesheet" href="css/article_phone.css">
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>


	<!-- 通用 头部 开始 -->
	<div id="header">
		文章
		<a href="about.html">
			<div id="about" class="but_circle">
				
			</div>
		</a>
		<a href="set.php">
			<div id="set" class="but_circle">
				
			</div>
		</a>
		<a href="index.php">
			<div id="back" class="but_circle">
					
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
$msgid=$_GET['conid'];
$sql = "SELECT title,content,belong,url,reg_date FROM news WHERE conid=$msgid";
//echo $_GET['conid'];
$result = $conn->query($sql);

if ($result->num_rows >0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
    	
        $bookinformation[$i]= "
	<!-- 内容部分开始 -->
	<div class='content'>
		<!-- 动态块 开始 -->
		<div class='content_box'>
			<div class='left'>
				<div class='logo_zhihu'>
					
				</div>
			</div>
			<div class='right'>
				<h1>". $row["title"]."</h1><p>".$row["content"]."</p>
				<div class='time'>".$row["reg_date"]."</div>
			</div>
		</div>
		<!-- 动态块 结束 -->
	</div>
	<!-- 内容部分结束 -->";
    	echo $bookinformation[$i];
    	$i++;

    }
}

?>


<!-- 评论开始 -->
	<div id='com_but' class='but_circle' onclick='showcom();'></div>
	<div id='comment'>
		<div id='com_left'>
		<form action='comment.php?conid=<?php echo  $msgid ?>'method='post'>
			<textarea id='text_box' name='comment' size='100' rows='1'></textarea>
		</div>
		<div id='com_right'>
		<input type='submit' value='发送' id='com_button' onclick='hidcom();'>
			</form>
		</div>
	</div>
	<!-- 评论结束 -->



	<!-- 显示评论开始 -->
	<div class="right" id="usertalk_box">
		<div id="ut_title">
			评论：
		</div>

<?php
	$sql = "SELECT content,username FROM comment WHERE conid=$msgid";
//echo $_GET['conid'];
$result = $conn->query($sql);

if ($result->num_rows >0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
    	
        $bookinformation[$i]= "<div id='ut_usermsg'>". $row["username"].":</div>
		<div id='ut_msg'><span style='color:#999;'>回复:</span>".$row["content"]."</div>";
    	echo $bookinformation[$i];
    	$i++;

    }
}
?>

		<div id="succeed"></div>
	</div>
	<!-- 显示评论结束 -->


</body>
</html>