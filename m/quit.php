<?php
header("Content-type: text/html; charset=utf-8");
session_start();
$_SESSION['name']=0;
echo "<script language='javascript'>"; 
			echo " location='index.php';"; 
			echo "</script>";





?>