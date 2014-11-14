<?php
include "../database/database_util.php" ;
include "../database/database_select.php" ;

header('Content-Type: text/html; charset=utf8');
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER_SET_CLIENT='utf8'");
mysql_query("SET CHARACTER_SET_RESULTS='utf8'");

$link = initDatabase();
mysql_query("SET NAMES 'utf8'",$link);

if (mysql_select_db('TeachUserDB')) {
	$data = array();
	$list = array();
	$i = 0;
	$obj = selectAllTeacherData($link);

	if (mysql_num_rows($obj) != 0) {
		while ($record = mysql_fetch_array($obj)) 
		{
			$name = $record['name'];
			$username = $record['username'];
			$cellphone = $record['cellphone'];
			$email = $record['email'];
			$department = $record['department'];
			$department_id = $record['department_id'];
			
			$data["name"] = $name;
			$data["username"] = $username;
			$data["cellphone"] = $cellphone;
			$data["email"] = $email;
			$data["department"] = $department;
			$data["department_id"] = $department_id;

			$list[$i] = $data;

			$i = $i + 1;
		}
	}

	$arr["result"]= true;
	$arr["message"]="sucess";
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