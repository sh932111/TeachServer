<?php
include "../database/database_util.php" ;
include "../database/database_insert.php" ;

header('Content-Type: text/html; charset=utf8');
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER_SET_CLIENT='utf8'");
mysql_query("SET CHARACTER_SET_RESULTS='utf8'");

$username = $_POST["username"];
$course_id = $_POST["course_id"];
$course_name = $_POST["course_name"];
$outline = $_POST["outline"];
$t_name = $_POST["t_name"];
$t_username = $_POST["t_username"];
$create_time = $_POST["create_time"];

$link = initDatabase();
mysql_query("SET NAMES 'utf8'",$link);

if (mysql_select_db('ClientCourseDB')) {
	$message = "新增失敗！可能已有課程";
	$result = false;
	if (insertClientCourse($link,$username,$course_id,$course_name,$outline,$create_time,$t_name,$t_username)) {
		$result = true;
		$message = "新增成功！";
	}
	$res["message"] =$message;
	$res["result"] = $result;
	$s["data"] = $res;
	echo json_encode($s);
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