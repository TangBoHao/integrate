<?php
header("Content-type:text/html;charset=utf-8");
$servername="localhost";
$dbusername="root";
$dbpassword="123456";
$databasename="news";
//连接数据库
$dbcon=mysqli_connect($servername,$dbusername,$dbpassword);
//检测数据库是否连接成功
if(!$dbcon){
	die("database connect failed".mysql_connect_error());
}

//创建数据库
$sql="CREATE DATABASE $databasename
	CHARACTER SET 'utf8'
	
	";
if(mysqli_query($dbcon,$sql))
{
	echo "数据库创建成功";
}
else{
	echo "creating database error".mysqli_error($dbcon);
}

mysqli_close($dbcon);
?>
<?php
$conn=new mysqli($servername,$dbusername,$dbpassword,$databasename);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "CREATE TABLE users (
username VARCHAR(100) NOT NULL PRIMARY KEY,
password VARCHAR(100) NOT NULL,
phone VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL,
userlike VARCHAR(100) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8";

if ($conn->query($sql) === TRUE) {
    echo "用户数据表创建成功";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE news (
conid VARCHAR(100) NOT NULL PRIMARY KEY,
title VARCHAR(100) NOT NULL,
content MEDIUMTEXT NOT NULL,
url VARCHAR(100) NOT NULL,
pictureurl VARCHAR(100) NOT NULL,
belong VARCHAR(100) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8";

if ($conn->query($sql) === TRUE) {
    echo "资讯数据表创建成功";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE comment (
ID INT UNSIGNED NOT NULL PRIMARY KEY  AUTO_INCREMENT,
conid VARCHAR(100) NOT NULL ,
title VARCHAR(100) NOT NULL,
content VARCHAR(200) NOT NULL,
belong VARCHAR(100) NOT NULL,
username VARCHAR(100) NOT NULL,
FOREIGN KEY (username) REFERENCES users(username),
reg_date TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8";

if ($conn->query($sql) === TRUE) {
    echo "资讯数据表创建成功";
} else {
    echo "Error creating table: " . $conn->error;
}

