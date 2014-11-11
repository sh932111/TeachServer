<?php
include "../database/database_util.php" ;
include "../database/database_delete.php" ;

header('Content-Type: text/html; charset=utf8');
$link = initDatabase();
mysql_query("SET NAMES 'utf8'",$link);

deleteDatabase($link,"TeachUserDB");
deleteDatabase($link,"TeachCourseDB");
deleteDatabase($link,"CourseDataDB");
deleteDatabase($link,"CourseUserDataDB");
deleteDatabase($link,"ClientCourseDB");
deleteDatabase($link,"ClientCourseDataDB");

rm_folder_recursively("../root");
rm_folder_recursively("../user");

function rm_folder_recursively($dir) {
	foreach(scandir($dir) as $file) {
		if ('.' === $file || '..' === $file) continue;
		if (is_dir("$dir/$file")) rm_folder_recursively("$dir/$file");
		else unlink("$dir/$file");
	}
	rmdir($dir);
	return true;
}
?>