<?php

function creatDatabase($link,$db_name) {
	$sql = "CREATE DATABASE `$db_name`";
	return mysql_query($sql, $link);
}

function creatUserTable($link,$table_name) {
	$action  ="CREATE TABLE `$table_name`(
		`name` VARCHAR(20)CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
		`username` VARCHAR(20) NOT NULL PRIMARY KEY,
		`password` VARCHAR(20) NOT NULL,
		`cellphone`  VARCHAR(20) NOT NULL,
		`email`  VARCHAR(20) NOT NULL,
		`department`  VARCHAR(20)CHARACTER SET utf8 COLLATE utf8_unicode_ci  NOT NULL,
		`department_id`  VARCHAR(100) NOT NULL,
		`create_time`  VARCHAR(100) NOT NULL,
		`update_time`  VARCHAR(100) NOT NULL
		);";
	return mysql_query($action, $link);
}

function creatRootCourse($link,$table_name) {
	$action  ="CREATE TABLE `$table_name`(
		`course_id` VARCHAR(100) NOT NULL PRIMARY KEY,
		`course_name`  VARCHAR(100) NOT NULL,
		`outline`  VARCHAR(9999) NOT NULL,
		`create_time`  VARCHAR(100) NOT NULL,
		`update_time`  VARCHAR(100) NOT NULL
		);";
	return mysql_query($action, $link);
}

function creatUserCourse($link,$table_name) {
	$action  ="CREATE TABLE `$table_name`(
		`course_id` VARCHAR(100) NOT NULL PRIMARY KEY,
		`course_name`  VARCHAR(100) NOT NULL,
		`outline`  VARCHAR(9999) NOT NULL,
		`create_time`  VARCHAR(100) NOT NULL
		);";
	
	return mysql_query($action, $link);
}

function creatCourseData($link,$table_name) {
	$action  ="CREATE TABLE `$table_name`(
		`week` VARCHAR(100) NOT NULL,
		`week_course`  VARCHAR(100) NOT NULL,
		`create_time`  VARCHAR(100) NOT NULL
		);";
	
	return mysql_query($action, $link);
}

function creatCourseUserData($link,$table_name) {
	$action  ="CREATE TABLE `$table_name`(
		`people` VARCHAR(100) NOT NULL,
		`update_course_hour`  VARCHAR(100) NOT NULL,
		`create_time`  VARCHAR(100) NOT NULL
		);";
	
	return mysql_query($action, $link);
}

function creatClientCourseData($link,$table_name) {
	$action  ="CREATE TABLE `$table_name`(
		`course_id` VARCHAR(100) NOT NULL,
		`course_name`  VARCHAR(100) NOT NULL,
		`weak`  VARCHAR(100) NOT NULL,
		`read_time`  VARCHAR(100) NOT NULL,
		`create_time`  VARCHAR(100) NOT NULL
		);";
	
	return mysql_query($action, $link);
}

?>