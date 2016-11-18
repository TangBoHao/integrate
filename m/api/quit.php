<?php
header("Access-Control-Allow-Origin:*");    //允许访问的域名，*表示所有的
header("Access-Control-Allow-Methods:POST,GET");		//允许访问的请求方式
header("Content-type: text/html; charset=utf-8");
session_start();
$_SESSION['name']=0;






?>