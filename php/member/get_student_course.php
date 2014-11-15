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
if (mysql_select_db('ClientCourseDB')) {
	$obj = selectTeachCourse($link,$username);

	$data = array();
	$list = array();
	$i = 0;
	
	if (mysql_num_rows($obj) != 0) {
		while ($record = mysql_fetch_array($obj)) 
		{
			$t_name = $record['name'];
			$t_username = $record['username'];
			$course_id = $record['course_id'];
			$course_name = $record['course_name'];
			$outline = $record['outline'];
			$create_time = $record['create_time'];
			$path = "../root/".$t_username."/".$course_id."/*.htm";
			$replace_path = "../root/".$t_username."/".$course_id."/";
			$data_list = glob($path);
			$data_res = array();
			for ($x=0; $x < count($data_list); $x++) { 
				$str = $data_list[$x];
				$res_str = str_replace ($replace_path,"",$str);
				$data_res[$x] = $res_str;
			}
			$data["name"] = $t_name;
			$data["username"] = $t_username;
			$data["course_id"] = $course_id;
			$data["course_name"] = $course_name;
			$data["outline"] = $outline;
			$data["create_time"] = $create_time;
			$data["data_list"] = $data_res;

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