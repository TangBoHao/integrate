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
$sql = "SELECT conid,title,content,belong,url FROM news";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出每行数据
   
    while($row = $result->fetch_assoc()) {
    	$msg["$i"]=array('title'=>$row["title"],
    		'content'=>$row["content"],
    		'belong'=>$row["belong"],
    		'url'=>$row["url"],
    		'conid'=>$row["conid"]);
    	
        // $bookinformation[$i]= "<br>标题: ". $row["title"]."<br>内容: ". "<div class='newscon'>".$row["content"]."</div>"."<br>所属板块: ". $row["belong"]."<br>资讯原地址: ". $row["url"]."<br/>".
        // "<a href='newsdetail.php?conid=$row[conid]'>查看详情</a>".
        // "<hr>";
    	// echo $bookinformation[$i];
    	$i++;

    }
    $result=json_encode($msg);
	echo "$result";
} else {
    echo "none";
}



$conn->close();

