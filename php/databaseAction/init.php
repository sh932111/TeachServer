<?php
include "../database/database_create.php" ;
include "../database/database_util.php" ;

header('Content-Type: text/html; charset=utf8');
$link = initDatabase();
mysql_query("SET NAMES 'utf8'",$link);

creatDatabase($link,"TeachUserDB");
creatDatabase($link,"TeachCourseDB");
creatDatabase($link,"CourseDataDB");
creatDatabase($link,"CourseUserDataDB");
creatDatabase($link,"ClientCourseDB");
creatDatabase($link,"ClientCourseDataDB");

if (mysql_select_db('TeachUserDB')) {
	creatUserTable($link,"rootTable");
	creatUserTable($link,"userTable");
	mkdir("../root/");
	mkdir("../user/");
}

?>