<?php
include "../database/database_util.php" ;
include "../database/database_insert.php" ;

header('Content-Type: text/html; charset=utf8');
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER_SET_CLIENT='utf8'");
mysql_query("SET CHARACTER_SET_RESULTS='utf8'");

$get_data = json_decode($_POST["get_data"]);

$link = initDatabase();
mysql_query("SET NAMES 'utf8'",$link);

if (mysql_select_db('TeachCourseDB')) {

	$get_array = $get_data->data;
	$response_array = array();

	for ($i = 0; $i < count($get_array); $i++) { 
		$name = $get_array[$i]->name;
		$username = $get_array[$i]->username;
		$department = $get_array[$i]->department;
		$department_id = $get_array[$i]->department_id;
		$course_id = $get_array[$i]->course_id;
		$course_name = $get_array[$i]->course_name;
		$outline = $get_array[$i]->outline;
		$create_time = $get_array[$i]->create_time;
		$update_time = $get_array[$i]->update_time;
		mysql_select_db('TeachCourseDB');
		$result = insertTeachCourse($link,$username,$course_id
			,$course_name,$outline,$create_time,$update_time);

		if (!$result) {
			$message = "新增課程失敗！可能檔案名稱衝突！";
		}
		else {
			$message = "新增課程成功！";
			mysql_select_db('TeachUserDB');
			insertAllCourse($link,"courseData",$name,$username,$department,$department_id,$course_id,$course_name,$outline,$create_time,$update_time); 
		}
		$response_array[$i]["result"] = $result;
		$response_array[$i]["message"] = $message;
	}
	$res["data"] = $response_array;
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