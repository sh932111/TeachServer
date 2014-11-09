<?php
include "../database/database_util.php" ;
include "../database/database_select.php" ;
include "../database/databae_update.php" ;

header('Content-Type: text/html; charset=utf8');

mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER_SET_CLIENT='utf8'");
mysql_query("SET CHARACTER_SET_RESULTS='utf8'");

$username = $_POST["username"];//帳號
$password = $_POST["password"];//密碼
$update_time = $_POST["update_time"];
$identity = $_POST["identity"];//身分 1 student 0 teacher

$link = initDatabase();
mysql_query("SET NAMES 'utf8'",$link);

if (mysql_select_db('TeachUserDB')) {
	if ($identity == 1) {
		loginStatus(login($link,"userTable",$username,$password),"userTable");
	}
	else {
		loginStatus(login($link,"rootTable",$username,$password),"rootTable");
	}
}
else {
	$data["message"] = "資料庫不存在!";
	$data["result"] = false;
	$res["data"] = $data;
	echo json_encode($res);
	exit();
}

function loginStatus($row,$table_name) {
	$result = false;
	$message = "登入失敗！";
	if (!empty($row)) {
		$result = true;
	}
	$data = array();
	if ($result) {
		$message = "登入成功！";
		updateLoginTime($link,$table_name,$username,$update_time);
		$data["name"] = $row["name"];
		$data["username"] = $row["username"];
		$data["cellphone"] = $row["cellphone"];
		$data["email"] = $row["email"];
		$data["department"] = $row["department"];
		$data["department_id"] = $row["department_id"];
		$data["create_time"] = $row["create_time"];
		$data["update_time"] = $row["update_time"];
	}
	$data["message"] = $message;
	$data["result"] = $result;
	$res["data"] = $data;
	echo json_encode($res);
	mysql_close($link);
	exit();
}

?>