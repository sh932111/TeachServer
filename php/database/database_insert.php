<?php

function registerUser($link,$table_name,$name,$username,$password,$cellphone,$email,$department,$department_id,$create_time,$update_time) {
	$action = sprintf("INSERT INTO `$table_name`(
		`name`,`username`,`password`,`cellphone`,`email`,`department`,`department_id`,`create_time`,`update_time`) 
		VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s')",
		$name,$username,$password,$cellphone,$email,$department,$department_id,$create_time,$update_time);
	return mysql_query($action,$link);
}

?>