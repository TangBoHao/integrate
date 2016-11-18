<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>聚落-轻阅读，回归身边的生活</title>
	<link rel="stylesheet" href="css/set_phone.css">
</head>
<body>
	<!-- 通用 头部 开始 -->
	<div id="header">
		设置
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
	<div class="line"></div>
	<div class="box">
		<h1>用户名

<!-- 登陆模块 -->
<?php
session_start();
$landing='<a href="login.html" id="unuser">点击登录</a>
		<a href="register.html" class="quitnow">注册</a>
		';
if($_SESSION['name'])
{
	echo '<span id="username">'.$_SESSION['name']."</span>";
	echo '<a href="quit.php" class="quitnow">退出</a>';
}else{
	echo $landing;
}



?>


		</h1>
	</div>
	<div class="line"></div>	
	<div class="box">
		<h1>每个关注显示<span>10</span>条</h1>
	</div>
	<div class="line"></div>	
	<div class="box" id="care_box">
		<h1>已关注</h1>
		<div class="care" id="tieba">
			
		</div>
		<div class="care" id="zhihu">
			
		</div>
		<div class="care" id="weibo">
			
		</div>
		<div class="care" id="douban">
			
		</div>
		<div class="care" id="add">
			
		</div>
	</div>
	<div class="line"></div>
	<!-- 内容部分结束 -->
</body>
</html>