<?php   //获取知乎最新资讯
$zh=curl_init('http://news-at.zhihu.com/api/3/news/latest');
curl_setopt($zh, CURLOPT_RETURNTRANSFER, 1);
$re=curl_exec($zh);

//var_dump(curl_getinfo($zh));
//var_dump($re);
$data=json_decode($re,true);
//var_dump($data);



//将知乎资讯插入数据库

$servername="localhost";
$dbusername="root";
$dbpassword="123456";
$databasename="news";
$conn=new mysqli($servername,$dbusername,$dbpassword,$databasename);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_set_charset($conn,"utf8");
for($i=0;$i<10;$i++)
{
	$conid=$data['stories'][$i]['id'];
	$title=$data['stories'][$i]['title'];
	$url="http://daily.zhihu.com/story/$conid";
//通过知乎日报api获取内容和图片
$zh=curl_init("http://news-at.zhihu.com/api/3/news/$conid");
curl_setopt($zh, CURLOPT_RETURNTRANSFER, 1);
$re=curl_exec($zh);
//var_dump($re);
$newscontent=json_decode($re,true);
//var_dump($newscontent);
$content= addslashes($newscontent['body']);
$pictureurl=$newscontent['image'];



$sql = "
INSERT INTO news(conid,title,url,belong,content,pictureurl)
 VALUES ('$conid','$title','$url','zhihu','{$content}','$pictureurl')";
if ($conn->query($sql) === TRUE) {
    echo $conid.'已插入成功';
} else {
    echo "插入数据出现问题: " . $conn->error;
}
}





