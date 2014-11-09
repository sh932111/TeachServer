<?php
function initDatabase() {
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER_SET_CLIENT='utf8'");
	mysql_query("SET CHARACTER_SET_RESULTS='utf8'");
	$link = mysql_connect('localhost','root','sh3599033');
	return $link;	
}

function login($link,$table_name,$username,$password) {
	$action = sprintf("SELECT * FROM `$table_name` WHERE username = '$username' AND password = '$password'");
	$obj = mysql_query($action, $link);
	return mysql_fetch_array($obj);
}

function registerUser($link,$name,$username,$password,$user_id,$telephone,$cellphone,$address,$gender,$born_day,$send_time) {
	$action = sprintf("INSERT INTO `userTable`(
		`name`,`username`,`password`,`user_id`,`telephone`,`cellphone`,`address`,`gender`,`born_day`,`send_time`) 
		VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
		$name,$username,$password,$user_id,$telephone,$cellphone,$address,$gender,$born_day,$send_time);
	return mysql_query($action,$link);
}

function registerRoot($link,$name,$username,$password,$cellphone,$send_time) {
	$action = sprintf("INSERT INTO `rootTable`(
		`name`,`username`,`password`,`cellphone`,`send_time`) 
		VALUES ('%s','%s','%s','%s','%s')",
		$name,$username,$password,$cellphone,$send_time);
	return mysql_query($action,$link);
}

function updateLoginTime($link,$table_name,$username,$send_time) {
	$action = sprintf("UPDATE `$table_name` SET 
		`send_time` = '$send_time'
		WHERE `username` = '$username';");
	return mysql_query($action,$link);
}


?>