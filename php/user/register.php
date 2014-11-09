<?php
include "../database/database_util.php" ;
include "../database/database_insert.php" ;

header('Content-Type: text/html; charset=utf8');

mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER_SET_CLIENT='utf8'");
mysql_query("SET CHARACTER_SET_RESULTS='utf8'");

$name = $_POST["name"];//使用者名稱
$username = $_POST["username"];//帳號
$password = $_POST["password"];//密碼
$cellphone = $_POST["cellphone"];//手機
$email = $_POST["email"];
$department = $_POST["department"];//科系
$department_id = $_POST["department_id"];//科系id
$create_time = $_POST["create_time"];
$update_time = $_POST["update_time"];
$identity = $_POST["identity"];//身分 1 student 0 teacher

$link = initDatabase();
mysql_query("SET NAMES 'utf8'",$link);

if (mysql_select_db('TeachUserDB')) {
	if ($identity == 1) {
		registerStatus(registerUser($link,"userTable",$name,$username,$password,$cellphone,$email,$department,$department_id,$create_time,$update_time));
	}
	else {
		registerStatus(registerUser($link,"rootTable",$name,$username,$password,$cellphone,$email,$department,$department_id,$create_time,$update_time));
	}
}
else {
	$data["message"] = "資料庫不存在!";
	$data["result"] = false;
	$res["data"] = $data;
	echo json_encode($res);
	exit();
}
function registerStatus($result) {
	$message = "註冊失敗！帳號已存在！";
	if ($result) {
		$message = "註冊成功！請登入試試看！";
	}
	$data["message"] = $message;
	$data["result"] = $result;
	$res["data"] = $data;
	echo json_encode($res);
	mysql_close($link);
	exit();
}
?>
