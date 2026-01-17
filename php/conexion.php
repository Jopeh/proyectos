<?php
$dns='mysql:dbname=test;host=127.0.0.1';
$user='root';
$password='';
try{
	$conn=new PDO($dns,$user,$password);
}catch(PDOException $err){
	echo $err;
}
?>