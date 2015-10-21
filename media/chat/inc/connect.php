<?
//ค่ากำหนดของฐานข้อมูล
	$db_server = 'db1.favouritehosting.com';
	$db_username = 'c22gcd';
	$db_password = 'th@1gcd*';
	$db_name = 'c22gcd'; //ชื่อของฐานข้อมูล
	//เขื่อมต่อกับ db และ query user ออกมา
	mysql_connect($db_server, $db_username, $db_password);
	mysql_select_db($db_name);
	mysql_query("SET NAMES utf8");
?>