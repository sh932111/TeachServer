<?php

function login($link,$table_name,$username,$password) {
	$action = sprintf("SELECT * FROM `$table_name` WHERE username = '$username' AND password = '$password'");
	$obj = mysql_query($action, $link);
	return mysql_fetch_array($obj);
}

function selectAllTeacherData($link) {
	$action = sprintf("SELECT * FROM rootTable");
	$obj = mysql_query($action, $link);
	return $obj;
}

?>