<?php
include("database_util.php");
include("database_create.php");
echo "string";
header('Content-Type: text/html; charset=utf8');

$link = initDatabase();
creatDatabase($link,"TeachUserDB");
creatDatabase($link,"TeachCourseDB");
creatDatabase($link,"CourseDataDB");
creatDatabase($link,"CourseUserDataDB");
creatDatabase($link,"ClientCourseDB");
creatDatabase($link,"ClientCourseDataDB");

mysql_query("SET NAMES 'utf8'",$link);

if (!$link) {
	$arr["result"] = FALSE;
	$arr["Message"] = "error open db";
	echo json_encode($arr);
	exit();
}

if (mysql_select_db('TeachUserDB')) {
	creatUserTable($link);
	creatRootTable($link);
}
?>