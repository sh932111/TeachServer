<?php

function registerUser($link,$table_name,$name,$username,$password,$cellphone,$email,$department,$department_id,$create_time,$update_time) {
	$action = sprintf("INSERT INTO `$table_name`(
		`name`,`username`,`password`,`cellphone`,`email`,`department`,`department_id`,`create_time`,`update_time`) 
		VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s')",
		$name,$username,$password,$cellphone,$email,$department,$department_id,$create_time,$update_time);
	return mysql_query($action,$link);
}

function insertTeachCourse($link,$table_name,$course_id,$course_name,$outline,$create_time,$update_time) {
	$action = sprintf("INSERT INTO `$table_name`(
		`course_id`,`course_name`,`outline`,`create_time`,`update_time`) 
		VALUES ('%s','%s','%s','%s','%s')",
		$course_id,$course_name,$outline,$create_time,$update_time);
	return mysql_query($action,$link);
}

function insertAllCourse($link,$table_name,$name,$username,$department,$department_id,$course_id,$course_name,$outline,$create_time,$update_time) {
	$action = sprintf("INSERT INTO `$table_name`(
		`name`,`username`,`department`,`department_id`,
		`course_id`,`course_name`,`outline`,`create_time`,`update_time`) 
		VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s')",
		$name,$username,$department,$department_id,$course_id,$course_name,$outline,$create_time,$update_time);
	return mysql_query($action,$link);
}

function insertClientCourse($link,$table_name,$course_id,$course_name,$outline,$create_time,$t_name,$t_username) {
	$action = sprintf("INSERT INTO `$table_name`(
		`course_id`,`name`,`username`,`course_name`,`outline`,`create_time`) 
		VALUES ('%s','%s','%s','%s','%s','%s')",
		$course_id,$t_name,$t_username,$course_name,$outline,$create_time);
	return mysql_query($action,$link);
}

?>