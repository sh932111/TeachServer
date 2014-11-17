<?php
include "../database/database_create.php" ;
include "../database/database_util.php" ;
include "../database/database_insert.php" ;
require_once '../lib/Excel/reader.php';

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
	creatAllCourseData($link,"courseData");
	if (createUniversityData($link)) {
		$data = new Spreadsheet_Excel_Reader();
		$data->setOutputEncoding('UTF-8');//設定從excel的xls讀取出來的資料，用UTF8輸出
		$data->setUTFEncoder('mb');//設定用mb_convert_encoding取代iconv，用來進行文字編碼的轉換
		$data->read('../lib/ulist.xlsx');

		$dsn = "mysql:dbname=test;host=127.0.0.1";
$user = "root";
$password = "sh3599033";
$driver_options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8");//設定資料庫連線為UTF8
 
try {
    $dbh = new PDO($dsn, $user, $password, $driver_options);
  
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
 
$aa='';
$bb='';
$cc='';
 
$sth = $dbh->prepare('INSERT INTO test SET aa = :aa, bb=:bb, cc=:cc');
$sth->bindParam(':aa', $aa);
$sth->bindParam(':bb', $bb);
$sth->bindParam(':cc', $cc);
 
$numRows = $data->sheets[0]['numRows'];
$numCols = $data->sheets[0]['numCols'];
 
for ($i = 1; $i <= $numRows; $i++) {
 for ($j = 1; $j <= $numCols; $j++) {
  $v = $data->sheets[0]['cells'][$i][$j];//第一列的第三個欄位為NULL，此時這邊會出現notice，可自行加判斷處理
  if(NULL===$v) $v = "";//因為我的資料表結構不能儲存NULL，所以將NULL改為空字串
  switch($j)
  {
   case 1:
    $aa = $v;
   break;
   case 2:
    $bb = $v;
   break;
   case 3:
    $cc = $v;
   break;
  }
 }
 $sth->execute();//寫入資料庫
}
	}
	mkdir("../root/");
	mkdir("../user/");
}

?>