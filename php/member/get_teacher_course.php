<?php
include "../database/database_util.php" ;
include "../database/database_select.php" ;

header('Content-Type: text/html; charset=utf8');
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER_SET_CLIENT='utf8'");
mysql_query("SET CHARACTER_SET_RESULTS='utf8'");

$username = $_POST["username"];//帳號
$link = initDatabase();
mysql_query("SET NAMES 'utf8'",$link);
if (mysql_select_db('TeachCourseDB')) {
	$obj = selectTeachCourse($link,$username);

	$data = array();
	$list = array();
	$i = 0;
	
	if (mysql_num_rows($obj) != 0) {
		while ($record = mysql_fetch_array($obj)) 
		{
			$course_id = $record['course_id'];
			$course_name = $record['course_name'];
			$outline = $record['outline'];
			
			$data["course_id"] = $course_id;
			$data["course_name"] = $course_name;
			$data["outline"] = $outline;

			$list[$i] = $data;

			$i = $i + 1;
		}
	}

	$arr["message"] = "sucess";
	$arr["result"] = true;
	$arr["list"] = $list;
	$res["data"] = $arr;
	echo json_encode($res);
	mysql_close($link);
	exit();
}

else {
	$data["message"] = "資料庫不存在!";
	$data["result"] = false;
	$res["data"] = $data;
	echo json_encode($res);
	mysql_close($link);
	exit();
}
?>